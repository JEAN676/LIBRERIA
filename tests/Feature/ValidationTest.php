<?php

namespace Tests\Feature;
use App\Models\Libro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Database\Factories;
use Illuminate\Support\Facades\Session;
use Mockery;



class ValidationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    /** @test */
    public function puede_ver_formulario_para_crear_un_libro()
    {
        $response = $this->get('/libros/create');

        $response->assertStatus(200);
        $response->assertViewIs('libros.create');
    }


    public function test_historial_store_validation(): void
    {
        $invalidData = [
            'libro_id' => null,
            'accion' => '',
        ];

        $response = $this->post(route('historiales.store'), $invalidData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['libro_id', 'accion']);
    }

    public function test_libro_store_validation(): void
    {
        $invalidData = [
            'titulo' => '',
            'autor' => '',
            'ISBN' => '',
            'editorial' => '',
            'num_paginas' => null,
            'genero' => '',
        ];

        $response = $this->post(route('libros.store'), $invalidData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['titulo', 'autor', 'ISBN', 'editorial', 'num_paginas', 'genero']);
    }
}