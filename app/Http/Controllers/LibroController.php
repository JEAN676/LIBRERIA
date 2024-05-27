<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Utils\LogHelper;
use Illuminate\Http\Request;
use App\Models\Libro;
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
                  ->orWhere('ISBN', 'like', '%' . $search . '%'); // Suponiendo que ISBN es el DNI
        }

        // Ejecutar la consulta y obtener los resultados
        $libros = $query->get();

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
            'ISBN' => 'required|string|unique:libros,ISBN|max:13',
            'editorial' => 'required|string|max:20',
            'anio_publicacion' => 'nullable|numeric|between:1901,2155',
            'genero' => 'required|string',
            'num_paginas' => 'required|numeric',
            'idioma' => 'nullable|string|max:10',
            'descripcion' => 'nullable|string|max:150',
        ]);
    
        DB::beginTransaction();
    
        try {
            // Crear un registro de libro
            $libro = Libro::create($request->all());
    
            // Crear un registro en el historial con la acción de agregar
            Historial::create([
                'libro_id' => $libro->id,
                'accion' => 'agregar',
                'descripcion' => 'Agregado nuevo libro: ' . $libro->titulo,
            ]);
    
            DB::commit();
    
            // Redireccionar a la vista principal
            return redirect()->route('main')->with('msn_success', 'Libro creado correctamente');
        } catch (\Exception $e) {
            LogHelper::logError($this, $e);
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
