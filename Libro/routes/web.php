<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return view('libros.Main');
});
/*Route::get('/libros/main', function () {
    return view('libros.Main');
});*/


//  NUEVAS RUTAS
Route::controller(LibroController::class)->group(function () {
    Route::get('/libros/index','index');
    Route::get('/libros/create','create');
    Route::post('/libros/index','store');
    Route::get('/libros/{id}','show');
    Route::get('/libros/{id}/edit','edit');
    Route::put('/libros/{id}','update');
    Route::delete('/libros/{id}','destroy');
    Route::get('/libros/search','search')->name('libros.search');
});

Route::get('/main',function() {return view('layouts.main');});

// Route::get('/libros/registro', function () {
    //     return view('libros.Registro');
    // });
    
    Route::get('/libros/registro', [LibroController::class, 'create'])->name('libros.create');

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