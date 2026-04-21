<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            EdificioSeeder::class,
            UserSeeder::class,
            AdminEdificioSeeder::class,
            IncidenciaSeeder::class,
            ComentarioIncidenciaSeeder::class,
            PropietarioPerfilSeeder::class,
            EmpleadoPerfilSeeder::class,
            AvisoSeeder::class,
            DocumentoSeeder::class,
        ]);
    }
}