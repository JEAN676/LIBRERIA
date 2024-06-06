<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Libro;
use App\Models\Historial;

class SuccessTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_historial_store_success(): void
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
            'accion' => 'agregar',
            'descripcion' => 'Descripción de prueba',
        ];

        $response = $this->post(route('historiales.store'), $historialData);

        $response->assertStatus(302);
        $response->assertRedirect(route('libros.index'));
        $response->assertSessionHas('success', 'Historial creado correctamente.');

        $this->assertDatabaseHas('historial', $historialData);
    }

    public function test_historial_index_success(): void
    {
        $response = $this->get(route('historiales.index'));

        $response->assertStatus(200);
        $response->assertViewIs('historiales.index');
    }

    public function test_historial_show_success()
    {
        // Crear un libro para asociarlo con el historial
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
    
        // Crear un historial con un valor permitido en el enum 'accion'
        $historial = Historial::create([
            'libro_id' => $libro->id,
            'accion' => 'eliminacion',
            'descripcion' => 'Expedita similique voluptatem dicta ipsum consectetur dolor temporibus.',
        ]);
    
        $response = $this->get(route('historiales.show', $historial->id));
    
        $response->assertStatus(200);
        $response->assertViewIs('historiales.show');
        $response->assertViewHas('historial', $historial);
    }

    public function test_libro_store_success(): void
    {
        $libroData = [
            'titulo' => 'Libro de prueba',
            'autor' => 'Autor de prueba',
            'ISBN' => '1234567890123',
            'editorial' => 'Editorial de prueba',
            'anio_publicacion' => 2021,
            'genero' => 'Ficción',
            'num_paginas' => 300,
            'idioma' => 'Español',
            'descripcion' => 'Descripción de prueba',
        ];
    
        $response = $this->post(route('libros.store'), $libroData);
    
        $response->assertStatus(302);
    
        // Obtener el libro recién creado
        $libro = Libro::where('titulo', 'Libro de prueba')->first();
    
        // Asegurarse de que la redirección sea correcta
        $response->assertRedirect(route('main'));
    
        // Verificar que el mensaje de éxito esté en la sesión
        $response->assertSessionHas('msn_success', 'Libro creado correctamente');
    
        // Verificar que el libro esté en la base de datos
        $this->assertDatabaseHas('libros', $libroData);
    }
    public function test_libro_index_success(): void
    {
        $response = $this->get(route('libros.index'));

        $response->assertStatus(200);
        $response->assertViewIs('libros.index');
    }

    public function test_libro_show_success(): void
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
 
        $response = $this->get(route('libros.show', $libro->id));
 
        $response->assertStatus(200);
        $response->assertViewIs('libros.show');
        $response->assertViewHas('libro', $libro);
    }
}
