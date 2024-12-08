<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->paragraph,
            'direccion' => $this->faker->address,
            'property_type_id' => $this->faker->numberBetween(1, 7), // Genera un tipo de propiedad
            'imagen_principal' => $this->faker->imageUrl(640, 480, 'house', true),
            'precio' => $this->faker->randomFloat(2, 100000, 1000000),
            'habitaciones' => $this->faker->numberBetween(1, 9),
            'banos' => $this->faker->numberBetween(1, 6),
            'metros_totales' => $this->faker->numberBetween(50, 300),
        ];
    }
}
