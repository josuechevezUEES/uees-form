<?php

namespace Database\Factories;

use App\Models\InsInstrumentosPregunta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InsInstrumentosPreguntaFactory extends Factory
{
    protected $model = InsInstrumentosPregunta::class;

    public function definition()
    {
        return [
			'cuestionario_id' => $this->faker->name,
			'tipo_pregunta_id' => $this->faker->name,
			'sub_numeral' => $this->faker->name,
			'requerido' => $this->faker->name,
        ];
    }
}
