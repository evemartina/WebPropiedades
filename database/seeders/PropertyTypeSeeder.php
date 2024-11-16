<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypeSeeder extends Seeder
{
    public function run()
    {

        $types = [
            'casa',
            'apartamento',
            'oficina',
            'local comercial',
            'terreno',
            'parcela',
            'bodega'
        ];

        foreach ($types as $type) {
            PropertyType::create(['name' => $type]);
        }
    }
}
