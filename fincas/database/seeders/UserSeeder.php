<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::create([
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'subrole' => null,
        ]);

        // PROPIETARIO
        User::create([
            'username' => 'prop1',
            'email' => 'prop1@test.com',
            'password' => Hash::make('password'),
            'role' => 'propietario',
            'subrole' => 'vecino',
        ]);

        // EMPLEADO
        User::create([
            'username' => 'empleado1',
            'email' => 'emp1@test.com',
            'password' => Hash::make('password'),
            'role' => 'empleado',
            'subrole' => 'conserje',
        ]);
    }
}