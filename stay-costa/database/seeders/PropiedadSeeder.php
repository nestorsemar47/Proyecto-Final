<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Propiedades;

class PropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Propiedades::create([
            'titulo' => 'Villa del Sol',
            'descripcion' => 'Hermosa villa frente al mar con piscina privada y acceso directo a la playa.',
            'precio_noche' => 180.00,
            'ubicacion' => 'Playa El Tunco',
            'habitaciones' => 3,
            'imagen_url' => 'https://www.viajeroselsalvador.com/uploads/5/6/1/0/5610753/9496817_orig.jpg'
        ]);

        Propiedades::create([
            'titulo' => 'Rancho Costa Linda',
            'descripcion' => 'Espacioso rancho ideal para familias, amplia vegetación y zona de barbacoa.',
            'precio_noche' => 220.00,
            'ubicacion' => 'Costa del Sol',
            'habitaciones' => 4,
            'imagen_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/216189458.jpg?k=2f87b5a35ebe3d206a2601fabdb8d821027b7002a426305cf99705d6fef1088f&o='
        ]);

        Propiedades::create([
            'titulo' => 'Apartamento Brisas Marinas',
            'descripcion' => 'Moderno apartamento con vista panorámica al océano y aire acondicionado.',
            'precio_noche' => 95.00,
            'ubicacion' => 'El Zonte',
            'habitaciones' => 2,
            'imagen_url' => 'https://www.lavidaesplaya.com/fotos_ranchos/casaadriatikaplayacostadelsolelsalvador82021.jpg'
        ]);

        Propiedades::create([
            'titulo' => 'Villa Mar Azul',
            'descripcion' => 'Moderna propiedad con piscina infinita frente al mar y acceso privado a la playa.',
            'precio_noche' => 310.00,
            'ubicacion' => 'El Tunco',
            'habitaciones' => 3,
            'imagen_url' => 'https://www.lavidaesplaya.com/fotos_ranchos/ranchocostadoradaplayabarradesantiagoelsalvador2.jpg'
        ]);

        Propiedades::create([
            'titulo' => 'Bungalow Palmeras',
            'descripcion' => 'Acogedor bungalow de estilo tropical rodeado de cocoteros, perfecto para parejas.',
            'precio_noche' => 125.50,
            'ubicacion' => 'Playa El Zonte',
            'habitaciones' => 1,
            'imagen_url' => 'https://www.lavidaesplaya.com/includes/foto_galeria.php?t=2&id=4389'
        ]);

        Propiedades::create([
            'titulo' => 'Casa Club Las Olas',
            'descripcion' => 'Espectacular residencia con terraza panorámica, ideal para surfistas y grupos grandes.',
            'precio_noche' => 275.00,
            'ubicacion' => 'Playa Las Flores',
            'habitaciones' => 5,
            'imagen_url' => 'https://www.lavidaesplaya.com/includes/foto_galeria.php?t=2&id=3850'
        ]);

        Propiedades::create([
            'titulo' => 'Eco-Rancho Brisas del Mar',
            'descripcion' => 'Propiedad ecológica con energía solar, rancho hamaquero y piscina de agua natural.',
            'precio_noche' => 180.00,
            'ubicacion' => 'Barra de Santiago',
            'habitaciones' => 3,
            'imagen_url' => 'https://www.lavidaesplaya.com/includes/foto_galeria.php?t=2&id=4102'
        ]);

        Propiedades::create([
            'titulo' => 'Residencial Sol y Arena',
            'descripcion' => 'Casa totalmente amueblada en complejo privado con seguridad 24/7 y áreas recreativas.',
            'precio_noche' => 195.00,
            'ubicacion' => 'Playa Salinitas',
            'habitaciones' => 4,
            'imagen_url' => 'https://www.lavidaesplaya.com/includes/foto_galeria.php?t=2&id=4428'
        ]);

        Propiedades::create([
            'titulo' => 'Refugio del Surf',
            'descripcion' => 'Estudio rústico a pocos pasos de la playa con excelente conexión Wi-Fi para nómadas digitales.',
            'precio_noche' => 85.00,
            'ubicacion' => 'Playa El Sunzal',
            'habitaciones' => 2,
            'imagen_url' => 'https://www.lavidaesplaya.com/includes/foto_galeria.php?t=2&id=4350'
        ]);

        Propiedades::create([
            'titulo' => 'Vista Esmeralda Luxury',
            'descripcion' => 'Exclusivo rancho de playa de dos pisos con acabados de lujo y muelle privado al estero.',
            'precio_noche' => 450.00,
            'ubicacion' => 'Costa del Sol',
            'habitaciones' => 10,
            'imagen_url' => 'https://www.viajeroselsalvador.com/uploads/5/6/1/0/5610753/6565825_orig.jpg'
        ]);

        Propiedades::create([
            'titulo' => 'Nido de Pelícanos',
            'descripcion' => 'Acogedora cabaña sobre un acantilado con una vista inigualable del amanecer salvadoreño.',
            'precio_noche' => 110.00,
            'ubicacion' => 'Playa Mizata',
            'habitaciones' => 2,
            'imagen_url' => 'https://www.lavidaesplaya.com/fotos_ranchos/rancholamisionplayacangrejeraelsalvador1.jpg'
        ]);

        Propiedades::create([
            'titulo' => 'Villa Coral Reef',
            'descripcion' => 'Propiedad con salida directa a arrecife de coral, perfecta para hacer snorkel y descansar.',
            'precio_noche' => 240.00,
            'ubicacion' => 'Playa Los Cóbanos',
            'habitaciones' => 3,
            'imagen_url' => 'https://www.lavidaesplaya.com/includes/foto_galeria.php?t=2&id=408'
        ]);

        Propiedades::create([
            'titulo' => 'Sunset Paradise Lodge',
            'descripcion' => 'Hermosa casa de playa con glorietas frente al mar, ideal para celebrar eventos pequeños.',
            'precio_noche' => 350.00,
            'ubicacion' => 'Playa San Diego',
            'habitaciones' => 5,
            'imagen_url' => 'https://www.lavidaesplaya.com/includes/foto_galeria.php?t=2&id=4265'
        ]);

        Propiedades::create([
            'titulo' => 'Casita Escondida tropical',
            'descripcion' => 'Un rincón secreto y tranquilo rodeado de palmeras con piscina privada y barbacoa.',
            'precio_noche' => 140.00,
            'ubicacion' => 'Playa El Majahual',
            'habitaciones' => 2,
            'imagen_url' => 'https://www.lavidaesplaya.com/includes/foto_galeria.php?t=2&id=4316'
        ]);
    }
}