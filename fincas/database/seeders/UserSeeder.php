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
            'nombre' => 'Administrador',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'subrole' => null,
            'edificio_id' => null,
        ]);

        // PROPIETARIO
        User::create([
            'nombre' => 'Propietario 1',
            'username' => 'prop1',
            'email' => 'prop1@test.com',
            'password' => Hash::make('password'),
            'role' => 'propietario',
            'subrole' => 'vecino',
            'edificio_id' => 1,
        ]);

        // EMPLEADO
        User::create([
            'nombre' => 'Empleado 1',
            'username' => 'empleado1',
            'email' => 'emp1@test.com',
            'password' => Hash::make('password'),
            'role' => 'empleado',
            'subrole' => 'conserje',
            'edificio_id' => 1,
        ]);
    }
}