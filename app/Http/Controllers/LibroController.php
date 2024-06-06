<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Utils\LogHelper;
use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Archivo;
use App\Models\Historial;
use Carbon\Carbon;

class LibroController extends Controller
{
    // Muestra la vista principal con el contador de libros y el gráfico de líneas
    public function main()
    {
        $librosCount = Libro::count();
        $acciones = ['Registro', 'Actualización', 'Eliminación'];
        $accionesData = [];

        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->startOfWeek()->addDays($i);
            $accionesData[$date->format('l')] = [
                'Registro' => Libro::whereDate('created_at', $date)->count(),
                'Actualización' => Historial::whereDate('created_at', $date)->where('accion', 'actualizar')->count(),
                'Eliminación' => Historial::whereDate('created_at', $date)->where('accion', 'eliminar')->count()
            ];
        }

        return view('main', compact('librosCount', 'acciones', 'accionesData'));
    }

    // Muestra todos los libros
    public function index(Request $request)
    {
        // Obtener el parámetro de búsqueda
        $search = $request->input('search');

        // Construir la consulta
        $query = Libro::query();

        if ($search) {
            $query->where('titulo', 'like', '%' . $search . '%')
                  ->orWhere('autor', 'like', '%' . $search . '%')
                  ->orWhere('ISBN', 'like', '%' . $search . '%'); 
        }

        // Ejecutar la consulta y obtener los resultados
        // $libros = $query->get();
        $libros = $query->paginate(3);

        // Pasar los resultados a la vista
        return view('libros.index', compact('libros'));
        // $libros = Libro::all();
        // return view('libros.index', compact('libros'));
    }

    // Muestra el formulario para crear un nuevo libro
    public function create()
    {
        return view('libros.create');
    }

        // Almacena un nuevo libro y redirige a la vista de crear historial
        public function store(Request $request)
        {
            $request->validate([
                'titulo' => 'required|string|max:30',
                'autor' => 'required|string|max:20',
                'ISBN' => 'required|string|unique:libros,ISBN|between:10,13',
                'editorial' => 'required|string|max:20',
                'anio_publicacion' => 'nullable|numeric|between:1901,2155',
                'genero' => 'required|string',
                'num_paginas' => 'required|numeric|min:1|max:600',
                'idioma' => 'nullable|string|max:10',
                'descripcion' => 'nullable|string|max:150',
                'pdf' => 'required|file|mimes:pdf|max:5120',
                'img' => 'required|file|mimes:jpeg,png,jpg,gif|max:5120',
            ]);
        
            DB::beginTransaction();
        
            try {
                // dd($request->all());
                // Crear un registro de libro
                $libro = Libro::create($request->except(['pdf', 'img']));
                // dd($libro);
                // Cargar y convertir archivos a binarios
                $pdf = file_get_contents($request->file('pdf')->getRealPath());
                // dd($pdf);
                $img = file_get_contents($request->file('img')->getRealPath());
                // dd($img);
                // dd(['pdfPath' => $pdf, 'imgPath' => $img]);
                // Crear un registro de archivo asociado con el libro
                Archivo::create([
                    'libro_id' => $libro->id,
                    'imagen_path' => $img,
                    'pdf_path' => $pdf,
                ]);
                // dd('archivo creado');
                // Crear un registro en el historial con la acción de agregar
                Historial::create([
                    'libro_id' => $libro->id,
                    'accion' => 'agregar',
                    'descripcion' => 'Agregado nuevo libro: ' . $libro->titulo,
                ]);
                // dd('Historial creado');
                DB::commit();
        
                // Redireccionar a la vista principal
                return redirect()->route('main')->with('msn_success', 'Libro creado correctamente');
            } catch (\Exception $e) {
                LogHelper::logError($this, $e);
                dd('mensaje de error'.$e);
                DB::rollBack();
                return redirect()->back()->with('msn_error', 'Fallo la creación del libro: ' . $e->getMessage());
            }
        }

    // Muestra los detalles de un libro específico
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.show', compact('libro'));
    }

    // Muestra el formulario para editar un libro específico
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.edit', compact('libro'));
    }

    // Actualiza un libro específico
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:50',
            'autor' => 'required|string|max:50',
            'ISBN' => 'required|string|unique:libros,ISBN,'.$id,
            'editorial' => 'required|string|max:50',
            'anio_publicacion' => 'nullable|numeric',
            'genero' => 'required|string',
            'num_paginas' => 'required|numeric',
            'idioma' => 'nullable|string|max:50',
            'descripcion' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {

        $libro = Libro::findOrFail($id);
        $libro->update($request->all());

        // Registrar en el historial
        Historial::create([
            'libro_id' => $libro->id,
            'accion' => 'actualizar',
            'descripcion' => 'Actualización de libro'
        ]);

        DB::commit();

        return redirect()->route('libros.index')->with('msn_success', 'Libro actualizado correctamente.');
        } catch (\Exception $e) {
            LogHelper::logError($this, $e);
            DB::rollBack();
            return redirect()->back()->with('msn_error', 'Error al actualizar el libro: '. $e->getMessage());
        }
    }

    // Elimina un libro específico
    public function destroy($id)
    {   
        DB::beginTransaction();

        try {
            $libro = Libro::findOrFail($id);
            $libro_id = $libro->id;
    
            // Crear historial antes de eliminar el libro
            Historial::create([
                'libro_id' => $libro_id,
                'accion' => 'eliminacion',
                'descripcion' => 'Eliminación de libro'
            ]);
    
            // Eliminar el libro después de crear el historial
            $libro->delete();
    
            DB::commit();
            return redirect()->route('libros.index')->with('msn_success', 'Libro eliminado correctamente.');
        } catch (\Exception $e) {
            LogHelper::logError($this, $e);
            DB::rollBack();
            return redirect()->back()->with('msn_error', 'Error al eliminar el libro: ' . $e->getMessage());
        }
    }      
}
