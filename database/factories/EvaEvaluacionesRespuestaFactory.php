<?php

namespace Database\Factories;

use App\Models\EvaEvaluacionesRespuesta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EvaEvaluacionesRespuestaFactory extends Factory
{
    protected $model = EvaEvaluacionesRespuesta::class;

    public function definition()
    {
        return [
			'usuario_id' => $this->faker->name,
			'evaluacion_id' => $this->faker->name,
			'seccion_id' => $this->faker->name,
			'pregunta_id' => $this->faker->name,
			'opcion_id' => $this->faker->name,
			'comentario' => $this->faker->name,
        ];
    }
}
