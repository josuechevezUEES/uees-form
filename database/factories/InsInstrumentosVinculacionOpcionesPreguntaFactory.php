<?php

namespace Database\Factories;

use App\Models\InsInstrumentosVinculacionOpcionesPregunta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InsInstrumentosVinculacionOpcionesPreguntaFactory extends Factory
{
    protected $model = InsInstrumentosVinculacionOpcionesPregunta::class;

    public function definition()
    {
        return [
			'opcion_id' => $this->faker->name,
			'pregunta_id' => $this->faker->name,
        ];
    }
}
