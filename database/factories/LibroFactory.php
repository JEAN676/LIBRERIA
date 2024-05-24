<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */

 class LibroFactory extends Factory
 {
     protected $model = Libro::class;
 
     public function definition()
     {
         return [
             'titulo' => $this->faker->text(30),  // Ajusta la longitud según sea necesario
             'autor' => $this->faker->name,
             'ISBN' => $this->faker->unique()->isbn13,
             'editorial' => $this->faker->company,
             'anio_publicacion' => $this->faker->year,
             'genero' => $this->faker->word,
             'num_paginas' => $this->faker->numberBetween(100, 1000),
             'idioma' => $this->faker->languageCode,
             'descripcion' => $this->faker->paragraph,
         ];
     }
 } 
