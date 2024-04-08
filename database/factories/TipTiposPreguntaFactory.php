<?php

namespace Database\Factories;

use App\Models\TipTiposPregunta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TipTiposPreguntaFactory extends Factory
{
    protected $model = TipTiposPregunta::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'entrada' => $this->faker->name,
			'comentario' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
