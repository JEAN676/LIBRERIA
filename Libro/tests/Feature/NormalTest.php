<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NormalTest extends TestCase
{
    // use RefreshDatabase;

    public function test_index(): void
    {
        $response = $this->get('/libros/index');
        $response->assertStatus(200);
        // Añade más aserciones según lo necesario para verificar la respuesta.
    }

    public function test_create(): void
    {
        $response = $this->get('/libros/create');
        $response->assertStatus(200);
        // Añade más aserciones según lo necesario para verificar la respuesta.
    }

    public function test_store(): void
    {
        // Simula el envío de datos válidos para almacenar un libro.
        $response = $this->post('/libros/index', [
            'id' => 1, // Especifica un ID específico para el libro
            'titulo' => 'Título del libro',
            'autor' => 'Autor del libro',
            'editorial' => 'Editorial del libro',
            'anio_publicacion' => 2022,
            'descripcion' => 'Descripción del libro',
        ]);
        $response->assertRedirect('/libros/index');
        // Verifica que el libro se haya creado correctamente.
    }

    public function test_show(): void
    {
        // Simula mostrar un libro existente.
        $response = $this->get('/libros/1');
        $response->assertStatus(200); // Corregido para esperar un código de estado 200
    }
    
    public function test_edit(): void
    {
        // Simula editar un libro existente.
        $response = $this->get('/libros/1/edit');
        $response->assertStatus(200); // Corregido para esperar un código de estado 200
    }

    public function test_update(): void
    {
        // Simula actualizar un libro existente.
        $response = $this->put('/libros/1', [
            'titulo' => 'Nuevo título del libro',
            // Agrega los demás campos que se están actualizando.
        ]);
        $response->assertRedirect('/libros/index'); // Corregido para redirigir a /libros/index
    }

    public function test_destroy(): void
    {
        // Simula eliminar un libro existente.
        $response = $this->delete('/libros/1');
        $response->assertRedirect('/libros/index'); // Corregido para redirigir a /libros/index
    }
}
