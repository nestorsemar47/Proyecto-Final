<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Administrador Stay Costa',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'rol'      => 'administrador',
        ]);

        User::create([
            'name'     => 'Néstor Martínez',
            'email'    => 'nestor@gmail.com',
            'password' => Hash::make('cliente123'),
            'rol'      => 'cliente',
        ]);
    }
}
