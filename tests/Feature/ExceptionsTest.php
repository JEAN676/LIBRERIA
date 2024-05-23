<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExceptionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_nonexistent(): void
    {
        // Simula mostrar un libro que no existe.
        $response = $this->get('/libros/show/1000'); // Suponiendo que 1000 es un ID inexistente.
        $response->assertStatus(404);
        // Verifica que se reciba una respuesta 404 Not Found.
    }

    // Repite este patrón para cada acción del controlador que pueda generar excepciones.
}
