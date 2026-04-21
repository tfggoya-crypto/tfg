<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aviso;
use App\Models\User;
use App\Models\Edificio;

class AvisoSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $edificio = Edificio::first();

        Aviso::create([
            'edificio_id' => $edificio->id,
            'user_id' => $user->id,
            'titulo' => 'Mantenimiento ascensor',
            'mensaje' => 'El ascensor estará fuera de servicio mañana',
            'prioridad' => 'media',
        ]);
    }
}