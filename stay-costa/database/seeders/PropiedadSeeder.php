<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Propiedades;

class PropiedadSeeder extends Seeder
{
    public function run(): void
    {
        Propiedades::create([
            'titulo' => 'Villa del Sol',
            'descripcion' => 'Hermosa villa frente al mar con piscina privada y acceso directo a la playa.',
            'precio_noche' => 180.00,
            'ubicacion' => 'Playa El Tunco',
            'habitaciones' => 3,
            'imagen_url' => 'https://via.placeholder.com/400x250'
        ]);

        Propiedades::create([
            'titulo' => 'Rancho Costa Linda',
            'descripcion' => 'Espacioso rancho ideal para familias, amplia vegetación y zona de barbacoa.',
            'precio_noche' => 220.00,
            'ubicacion' => 'Costa del Sol',
            'habitaciones' => 4,
            'imagen_url' => 'https://via.placeholder.com/400x250'
        ]);

        Propiedades::create([
            'titulo' => 'Apartamento Brisas Marinas',
            'descripcion' => 'Moderno apartamento con vista panorámica al océano y aire acondicionado.',
            'precio_noche' => 95.00,
            'ubicacion' => 'El Zonte',
            'habitaciones' => 2,
            'imagen_url' => 'https://via.placeholder.com/400x250'
        ]);
    }
}
