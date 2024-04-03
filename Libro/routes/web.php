<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('libros.Main');
});
/*Route::get('/libros/main', function () {
    return view('libros.Main');
});*/
Route::get('/libros/registro', function () {
    return view('libros.Registro');
});
Route::get('/libros/detalles', function () {
    return view('libros.Detalles');
});
Route::get('/libros/descripcion', function () {
    return view('libros.Descripcion');
});