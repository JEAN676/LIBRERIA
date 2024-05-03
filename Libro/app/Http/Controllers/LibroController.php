<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;


use Illuminate\Database\Eloquent\ModelNotFoundException;

// use Illuminate\Database\QueryException; 
use Illuminate\Database\QueryException;
use Exception;  
// use Illuminate\Foundation\Exceptions\Exception;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    //

    // public function index()
    // {   
    //     $libros=Libro::all();
    //     return view('libros.index',compact('libros'));
    // }

    // public function create()
    // {
    //     return view('libros.create');
    // }

        public function index()
    {   
        try {
            $libros = Libro::all();
            return view('libros.index', compact('libros'));
        } catch (QueryException $e) {
            // Manejar la excepción de problemas de conexión a la base de datos
            // Mostrar un mensaje al usuario
            $mensaje = 'Lo sentimos, ha ocurrido un problema al cargar los libros. Por favor, inténtelo de nuevo más tarde.';
            session()->flash('error', $mensaje);

            // Registrar el error en el archivo de registro
            Log::error('Error de base de datos: ' . $e->getMessage() . ' en ' . $e->getFile() . ' en línea ' . $e->getLine());

            // Redirigir al usuario a la página anterior o a una página de inicio
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            return view('libros.create');
        } catch (Exception $e) {
            // Manejar otras excepciones que puedan ocurrir aquí

            // Mostrar un mensaje genérico al usuario
            $mensaje = 'Lo sentimos, ha ocurrido un error. Por favor, inténtelo de nuevo más tarde.';
            session()->flash('error', $mensaje);

            // Registrar el error en el archivo de registro
            Log::error('Error: ' . $e->getMessage() . ' en ' . $e->getFile() . ' en línea ' . $e->getLine());

            // Redirigir al usuario a la página anterior o a una página de inicio
            return redirect()->back();
        }
    }

    // public function store(Request $request)
    // {
    //     Libro::create($request->all());
    //     return redirect('/libros/index');
    // }

    public function store(Request $request)
    {
        // Validar los datos recibidos del formulario
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'autor' => 'required',
            'anio_publicacion' => 'required|numeric',
        ]);
    
        // Si la validación falla, redirigir de vuelta al formulario con los errores
        if ($validator->fails()) {
            return redirect('/libros/create')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        // Si la validación pasa, crear el libro
        Libro::create($request->all());
    
        // Redirigir a la página de lista de libros con un mensaje de éxito
        return redirect('/libros/index')->with('success', '¡El libro se ha creado exitosamente!');
    }


    // public function show($id)
    // {
    //     $libro = Libro::findOrFail($id);
    //     return view('libros.show', compact('libro'));
    // }

    // public function edit($id)
    // {
    //     $libro = Libro::findOrFail($id);
    //     return view('libros.edit',compact('libro'));
    // }
    
    public function show($id)
    {
        try {
            $libro = Libro::findOrFail($id);
            return view('libros.show', compact('libro'));
        } catch (ModelNotFoundException $e) {
            // Manejar el caso en el que el libro no se encuentre
            abort(404);
        }
    }
    
    public function edit($id)
    {
        try {
            $libro = Libro::findOrFail($id);
            return view('libros.edit', compact('libro'));
        } catch (ModelNotFoundException $e) {
            // Manejar el caso en el que el libro no se encuentre
            abort(404);
        }
    }


    // public function update(Request $resquest,$id)
    // {
    //     $libro = Libro::findOrFail($id);
    //     $libro->update($resquest->all());
    //     return redirect('/libros/index');
    // }

    // public function destroy($id)
    // {
    //     $libro = Libro::findOrFail($id);
    //     $libro->delete();
    //     return redirect('/libros/index');
    // }
    public function update(Request $request, $id)
    {
        try {
            $libro = Libro::findOrFail($id);
            $libro->update($request->all());
            return redirect('/libros/index'); // Corregido para redirigir a /libros/index
        } catch (Exception $e) {
            // Manejar cualquier excepción que pueda ocurrir durante la actualización
            // Por ejemplo, errores de validación o problemas de base de datos
            // Registrar el error en el archivo de registro
            Log::error('Error al actualizar el libro: ' . $e->getMessage() . ' en ' . $e->getFile() . ' en línea ' . $e->getLine());
            // Mostrar un mensaje genérico al usuario
            session()->flash('error', 'Error al actualizar el libro. Por favor, inténtelo de nuevo más tarde.');
            // Redirigir al usuario a la página anterior o a una página de inicio
            return redirect()->back();
        }
    }
    
    public function destroy($id)
    {
        try {
            $libro = Libro::findOrFail($id);
            $libro->delete();
            return redirect('/libros/index'); // Corregido para redirigir a /libros/index
        } catch (Exception $e) {
            // Manejar cualquier excepción que pueda ocurrir durante la eliminación
            // Por ejemplo, problemas de base de datos o errores de autorización
            // Registrar el error en el archivo de registro
            Log::error('Error al eliminar el libro: ' . $e->getMessage() . ' en ' . $e->getFile() . ' en línea ' . $e->getLine());
            // Mostrar un mensaje genérico al usuario
            session()->flash('error', 'Error al eliminar el libro. Por favor, inténtelo de nuevo más tarde.');
            // Redirigir al usuario a la página anterior o a una página de inicio
            return redirect()->back();
        }
    }
    

}