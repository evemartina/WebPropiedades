<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\PropertyImage;

class PropertySeeder extends Seeder
{
    public function run()    {
        // Crear 10 propiedades aleatorias
        Property::factory(20)->create()->each(function ($property) {
            // Crear imágenes adicionales para cada propiedad
            PropertyImage::factory(5)->create(['property_id' => $property->id]);
        });

    }
}
