<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Usuario con rol Administrador
        User::create([
            'name'     => 'Administrador Stay Costa',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'rol'      => 'administrador',
        ]);

        // 2. Usuario con rol Cliente
        User::create([
            'name'     => 'Néstor Martínez',
            'email'    => 'nestor@gmail.com',
            'password' => Hash::make('cliente123'),
            'rol'      => 'cliente',
        ]);
    }
}
