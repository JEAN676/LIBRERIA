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
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /** @test */
    public function puede_ver_formulario_para_crear_un_libro()
    {
        $response = $this->get('/libros/create');

        $response->assertStatus(200);
        $response->assertViewIs('libros.create');
    }

    public function puede_crear_un_libro()
    {
        $data = [
            'titulo' => 'El Gran Gatsby',
            'autor' => 'F. Scott Fitzgerald',
            'anio_publicacion' => 1925,
        ];

        $response = $this->post('/libros/index', $data);

        $response->assertRedirect('/libros/index');
        $this->assertDatabaseHas('libros', $data);
    }

    /** @test */
    public function requiere_titulo_para_crear_un_libro()
    {
        $response = $this->post('/libros/index', []);

        $response->assertSessionHasErrors('titulo');
    }

    /** @test */
    public function requiere_autor_para_crear_un_libro()
    {
        $response = $this->post('/libros/index', []);

        $response->assertSessionHasErrors('autor');
    }

    /** @test */
    public function requiere_anio_publicacion_para_crear_un_libro()
    {
        $response = $this->post('/libros/index', []);

        $response->assertSessionHasErrors('anio_publicacion');
    }
// /** @test */
// /** @test */
// public function puede_actualizar_un_libro()
// {
//     // Crear un mock para el modelo Libro
//     $libroMock = Mockery::mock(Libro::class);
//     $libroMock->shouldReceive('update')->atLeast()->once()->andReturn(true);

//     // Usar el mock en lugar del modelo real
//     $this->app->instance(Libro::class, $libroMock);

//     // Enviar una solicitud PUT para actualizar el libro
//     $response = $this->put("/libros/1", []);

//     // Verificar que el método 'update' se llame al menos una vez
//     $libroMock->shouldHaveReceived('update')->atLeast()->once();

//     // Verificar que la respuesta sea una redirección
//     $response->assertRedirect();
// }

// /** @test */
// public function puede_eliminar_un_libro()
// {
//     // Crear un mock para el modelo Libro
//     $libroMock = Mockery::mock(Libro::class);
//     $libroMock->shouldReceive('delete')->atLeast()->once()->andReturn(true);

//     // Usar el mock en lugar del modelo real
//     $this->app->instance(Libro::class, $libroMock);

//     // Enviar una solicitud DELETE para eliminar el libro
//     $response = $this->delete("/libros/1");

//     // Verificar que el método 'delete' se llame al menos una vez
//     $libroMock->shouldHaveReceived('delete')->atLeast()->once();

//     // Verificar que la respuesta sea una redirección
//     $response->assertRedirect();
// }
}