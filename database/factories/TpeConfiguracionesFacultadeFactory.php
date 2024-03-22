<?php

namespace Database\Factories;

use App\Models\TpeConfiguracionesFacultade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TpeConfiguracionesFacultadeFactory extends Factory
{
    protected $model = TpeConfiguracionesFacultade::class;

    public function definition()
    {
        return [
			'tpe_configuracion_id' => $this->faker->name,
			'codigo_facultad' => $this->faker->name,
        ];
    }
}
