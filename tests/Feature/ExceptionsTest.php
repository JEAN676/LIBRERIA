<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Libro;

class ExceptionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_historial_store_exception(): void
    {
        $libro = Libro::create(
            [
                    'titulo' => 'Ad enim eveniet est qui.',
        'autor' => 'Clair Frami',
        'ISBN' => '9791136608222',
        'editorial' => 'Grant, Dibbert', // Campo acortado
        'anio_publicacion' => '1985',
        'genero' => 'id',
        'num_paginas' => 897,
        'idioma' => 'id',
        'descripcion' => 'Quo qui optio pariatur qui ea occaecati sit. Itaque libero officia provident mollitia corrupti.',
                 
            ]
        );

        $historialData = [
            'libro_id' => $libro->id,
            'accion' => str_repeat('a', 256),
        ];

        $response = $this->post(route('historiales.store'), $historialData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors();
    }

    public function test_historial_show_nonexistent_exception(): void
    {
        $response = $this->get(route('historiales.show', 999));

        $response->assertStatus(404);
    }

    public function test_libro_store_exception(): void
    {
        $libroData = [
            'titulo' => str_repeat('a', 256),
            'autor' => 'Autor de ejemplo',
            'ISBN' => '1234567890',
            'editorial' => 'Editorial de ejemplo',
            'anio_publicacion' => 2023,
            'genero' => 'Ficción',
            'num_paginas' => 300,
            'idioma' => 'Español',
            'descripcion' => 'Descripción del libro de ejemplo',
        ];

        $response = $this->post(route('libros.store'), $libroData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors();
    }

    public function test_libro_show_nonexistent_exception(): void
    {
        $response = $this->get(route('libros.show', 999));

        $response->assertStatus(404);
    }
}