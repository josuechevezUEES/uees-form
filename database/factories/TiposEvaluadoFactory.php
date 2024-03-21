<?php

namespace Database\Factories;

use App\Models\TiposEvaluado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TiposEvaluadoFactory extends Factory
{
    protected $model = TiposEvaluado::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
