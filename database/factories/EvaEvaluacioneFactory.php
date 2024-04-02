<?php

namespace Database\Factories;

use App\Models\EvaEvaluacione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EvaEvaluacioneFactory extends Factory
{
    protected $model = EvaEvaluacione::class;

    public function definition()
    {
        return [
			'tipo_evaluacion_id' => $this->faker->name,
			'instrumento_id' => $this->faker->name,
			'fecha_inicio_evaluacion' => $this->faker->name,
			'fecha_fin_evaluacion' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
