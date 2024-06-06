<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ArchivoController;

Route::controller(LibroController::class, 'libros')->group(function (){
    Route::get('/','main')->name('main'); // Vista principal
    Route::get('/libros','index')->name('libros.index'); // Vista de todos los libros
    Route::get('/libros/create','create')->name('libros.create'); // Formulario de creación de libro
    Route::post('/libros', 'store')->name('libros.store'); // Almacenar nuevo libro
    Route::get('/libros/{id}', 'show')->name('libros.show'); // Detalles de un libro
    Route::get('/libros/{id}/edit','edit')->name('libros.edit'); // Formulario de edición de libro
    Route::put('/libros/{id}','update')->name('libros.update'); // Actualizar un libro
    Route::delete('/libros/{id}','destroy')->name('libros.destroy'); // Eliminar un libro


});
Route::controller(HistorialController::class,'historiales')->group(function (){
    Route::get('/historiales','index')->name('historiales.index'); // Vista de todos los historiales
    Route::get('/historiales/create','create')->name('historiales.create'); // Formulario de creación de historial
    Route::post('/historiales','store')->name('historiales.store'); // Almacenar nuevo historial
    Route::get('/historiales/{id}','show')->name('historiales.show'); // Detalles de un historial
    Route::get('/historiales/{id}/download','downloadPDF')->name('historiales.pdf');
});

Route::controller(ArchivoController::class,'archivos')->group(function(){
    Route::get('/catalogo', 'index')->name('archivos.index');
    Route::get('/libros/{id}/pdf','showPdf')->name('libros.pdf');    
});
