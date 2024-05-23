<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'ISBN',
        'editorial',
        'anio_publicacion',
        'genero',
        'num_paginas',
        'idioma',
        'descripcion',
    ];
}
