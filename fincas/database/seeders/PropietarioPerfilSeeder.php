<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PropietarioPerfil;

class PropietarioPerfilSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role', 'propietario')->first();

        PropietarioPerfil::create([
            'user_id' => $user->id,
            'dni' => '12345678A',
            'telefono' => '600123123',
            'numero_vivienda' => '3A',
        ]);
    }
}