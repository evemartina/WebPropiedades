<?php

namespace Database\Factories;

use App\Models\PropertyImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyImageFactory extends Factory
{
    protected $model = PropertyImage::class;

    public function definition()
    {
        return [
            'property_id' => null, // Se asignará más tarde en el seeder
            'imagen' => $this->faker->imageUrl(640, 480, 'house', true),
        ];
    }
}
