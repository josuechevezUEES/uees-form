<?php

namespace Database\Factories;

use App\Models\TiposEvaluacione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TiposEvaluacioneFactory extends Factory
{
    protected $model = TiposEvaluacione::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
