<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Incidencia;
use App\Models\User;
use App\Models\Edificio;

class IncidenciaSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $edificio = Edificio::first();

        Incidencia::create([
            'titulo' => 'Fuga de agua',
            'descripcion' => 'Hay una fuga en el portal',
            'estado' => 'pendiente',
            'prioridad' => 'alta',
            'user_id' => $user->id,
            'edificio_id' => $edificio->id,
            'asignado_a' => null,
        ]);
    }
}