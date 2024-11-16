<?php

namespace Database\Factories;

use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyTypeFactory extends Factory
{
    protected $model = PropertyType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word, // Genera un nombre único para el tipo de propiedad
        ];
    }
}
