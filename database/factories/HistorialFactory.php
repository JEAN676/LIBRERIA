<?php

namespace Database\Factories;

use App\Models\Historial;
use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistorialFactory extends Factory
{
    protected $model = Historial::class;

    public function definition()
    {
        return [
            'libro_id' => Libro::factory(),
            'accion' => $this->faker->randomElement(['agregar', 'actualizar', 'eliminar']),
            'descripcion' => $this->faker->sentence,
        ];
    }
}