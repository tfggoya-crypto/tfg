<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\EmpleadoPerfil;

class EmpleadoPerfilSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role', 'empleado')->first();

        EmpleadoPerfil::create([
            'user_id' => $user->id,
            'horario' => '08:00 - 16:00',
            'salario' => 1200.00,
        ]);
    }
}