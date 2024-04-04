<?php

namespace Database\Factories;

use App\Models\ModelHasRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModelHasRoleFactory extends Factory
{
    protected $model = ModelHasRole::class;

    public function definition()
    {
        return [
			'role_id' => $this->faker->name,
			'model_type' => $this->faker->name,
			'model_id' => $this->faker->name,
        ];
    }
}
