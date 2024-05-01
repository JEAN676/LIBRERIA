<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    //

    public function index()
    {   
        $libros=Libro::all();
        return view('libros.index',compact('libros'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        Libro::create($request->all());
        return redirect('/libros/index');
    }

    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.show', compact('libro'));
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.edit',compact('libro'));
    }
    
    public function update(Request $request,$id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return redirect('/libros/index');
    }

    
    // public function show($id){
    //     $libro=Libro::findOrFail($id);
    //     return view('libros.show',compact('libro'));
    // }
    
}   

// public function store1(Request $request)
//     {
//         // Validar los datos del formulario
//         $request->validate([
//             'titulo' => 'required|max:50',
//             'autor' => 'required|max:50',
//             'editorial' => 'required|max:50',
//             'anio_publicacion' => 'required|integer',
//             'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Opcional: Validar la imagen
//             'descripcion' => 'required',
//         ]);
    
//         // Guardar el libro en la base de datos
//         $libro = new Libro();
//         $libro->titulo = $request->titulo;
//         $libro->autor = $request->autor;
//         $libro->editorial = $request->editorial;
//         $libro->anio_publicacion = $request->anio_publicacion;
//         $libro->descripcion = $request->descripcion;
    
//         // Manejar la imagen si se envió
//         if ($request->hasFile('imagen')) {
//             $imagenNombre = time() . '_' . $request->imagen->getClientOriginalName();
//             $request->imagen->storeAs('public/imagenes', $imagenNombre);
//             $libro->imagen = $imagenNombre;
//         }
    
//         $libro->save();
    
//         return redirect()->route('libros.create')->with('success', 'Libro registrado correctamente.');
//     }
