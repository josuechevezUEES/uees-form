<?php

namespace Database\Factories;

use App\Models\InsInstrumentosComentario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InsInstrumentosComentarioFactory extends Factory
{
    protected $model = InsInstrumentosComentario::class;

    public function definition()
    {
        return [
			'pregunta_id' => $this->faker->name,
			'comentario' => $this->faker->name,
			'entrada' => $this->faker->name,
        ];
    }
}
