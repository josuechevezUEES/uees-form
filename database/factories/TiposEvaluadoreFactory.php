<?php

namespace Database\Factories;

use App\Models\TiposEvaluadore;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TiposEvaluadoreFactory extends Factory
{
    protected $model = TiposEvaluadore::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
