<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
class ArchivoController extends Controller
{
     public function index(Request $request)
  {
     // Get the search query from the request
     $search = $request->input('search');

     // Query the books with their associated files, filtering by title or author if a search query is present
     $libros = Libro::with('archivo')
         ->when($search, function ($query, $search) {
             return $query->where('titulo', 'like', "%{$search}%")
                          ->orWhere('autor', 'like', "%{$search}%");
         })
         ->paginate(6); // Pagination with 6 items per page
        // Obtén todos los libros con sus archivos asociados
        // $libros = Libro::with('archivo')->get();

            // Convierte los datos binarios de vuelta a imágenes y PDFs
        foreach ($libros as $libro) {
            if ($libro->archivo) {
                // Convierte los datos binarios de la imagen a una cadena de base64
                $libro->archivo->imagen_path = 'data:image/jpeg;base64,' . base64_encode($libro->archivo->imagen_path);
                // Convierte los datos binarios del PDF a una cadena de base64
                $libro->archivo->pdf_path = 'data:application/pdf;base64,' . base64_encode($libro->archivo->pdf_path);
            }
        }

        // Pasa los datos a la vista
        return view('archivos.index', compact('libros'));
    }

        public function showPdf($id)
    {
        $libro = Libro::with('archivo')->findOrFail($id);
        $libro->archivo->pdf_path = 'data:application/pdf;base64,' . base64_encode($libro->archivo->pdf_path);
        return view('archivos.pdf', compact('libro'));
    }
}


