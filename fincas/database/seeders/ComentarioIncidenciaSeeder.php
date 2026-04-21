<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComentarioIncidencia;
use App\Models\Incidencia;
use App\Models\User;

class ComentarioIncidenciaSeeder extends Seeder
{
    public function run(): void
    {
        $incidencia = Incidencia::first();
        $user = User::first();

        ComentarioIncidencia::create([
            'texto' => 'Estamos revisando el problema',
            'incidencia_id' => $incidencia->id,
            'user_id' => $user->id,
        ]);
    }
}