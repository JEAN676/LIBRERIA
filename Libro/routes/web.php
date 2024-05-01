<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return view('libros.Main');
});
/*Route::get('/libros/main', function () {
    return view('libros.Main');
});*/

Route::get('/libros/registro', [LibroController::class, 'create'])->name('libros.create');

//  NUEVAS RUTAS
Route::get('/libros/index',[LibroController::class,'index']);
Route::get('/libros/create'.[LibroController::class,'create']);

// Route::get('/libros/registro', function () {
//     return view('libros.Registro');
// });


Route::get('/libros/detalles', function () {
    return view('libros.Detalles');
});
Route::get('/libros/descripcion', function () {
    return view('libros.Descripcion');
});
Route::get('/libros/historial', function () {
    return view('libros.Historial');
});

Route::get('/libros/libros', function () {
    return view('libros.Libros');
});

Route::get('/libros/busqueda', function () {
    return view('libros.Busqueda');
});