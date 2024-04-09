<?php

namespace Database\Factories;

use App\Models\InsInstrumentosOpcione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InsInstrumentosOpcioneFactory extends Factory
{
    protected $model = InsInstrumentosOpcione::class;

    public function definition()
    {
        return [
			'pregunta_id' => $this->faker->name,
			'nombre' => $this->faker->name,
			'entrada' => $this->faker->name,
        ];
    }
}
