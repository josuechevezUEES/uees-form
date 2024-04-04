<?php

namespace Database\Factories;

use App\Models\InsInstrumentosSeccione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InsInstrumentosSeccioneFactory extends Factory
{
    protected $model = InsInstrumentosSeccione::class;

    public function definition()
    {
        return [
			'instrumento_id' => $this->faker->name,
			'nombre' => $this->faker->name,
			'literal' => $this->faker->name,
			'fondo_img' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
