<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Edificio;

class EdificioSeeder extends Seeder
{
    public function run(): void
    {
        Edificio::create([
            'nombre' => 'Edificio Central',
            'direccion' => 'Calle Mayor 10',
            'ciudad' => 'Madrid',
            'codigo_postal' => '28001',
        ]);

        Edificio::create([
            'nombre' => 'Residencial Norte',
            'direccion' => 'Avenida Europa 5',
            'ciudad' => 'Madrid',
            'codigo_postal' => '28002',
        ]);
    }
}