<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
class ArchivoController extends Controller
{
     public function index()
    {
        // Obtén todos los libros con sus archivos asociados
        $libros = Libro::with('archivo')->get();
        
        // Pasa los datos a la vista
        return view('archivos.index', compact('libros'));
    }
}
