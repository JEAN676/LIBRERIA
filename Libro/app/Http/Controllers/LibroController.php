<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    //

    public function create()
    {
        return view('libros.Registro');
    }

    public function show($id)
    {
    $libro = Libro::findOrFail($id);
    return view('libros.Registro', compact('libro'));
    }


    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|max:50',
            'autor' => 'required|max:50',
            'editorial' => 'required|max:50',
            'anio_publicacion' => 'required|integer',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Opcional: Validar la imagen
            'descripcion' => 'required',
        ]);

        // Guardar el libro en la base de datos
        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->anio_publicacion = $request->anio_publicacion;
        $libro->descripcion = $request->descripcion;

        // Manejar la imagen si se envió
        if ($request->hasFile('imagen')) {
            $imagenNombre = time() . '_' . $request->imagen->getClientOriginalName();
            $request->imagen->storeAs('public/imagenes', $imagenNombre);
            $libro->imagen = $imagenNombre;
        }

        $libro->save();

        return redirect()->route('libros.create')->with('success', 'Libro registrado correctamente.');
    }

}   
