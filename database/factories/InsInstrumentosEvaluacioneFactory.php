<?php

namespace Database\Factories;

use App\Models\InsInstrumentosEvaluacione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InsInstrumentosEvaluacioneFactory extends Factory
{
    protected $model = InsInstrumentosEvaluacione::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
