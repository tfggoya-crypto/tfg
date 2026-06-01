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

        Edificio::create([
            'nombre' => 'Conjunto Alameda',
            'direccion' => 'Plaza Nueva 3',
            'ciudad' => 'Sevilla',
            'codigo_postal' => '41001',
        ]);

        Edificio::create([
            'nombre' => 'Torres del Lago',
            'direccion' => 'Paseo del Lago 12',
            'ciudad' => 'Valencia',
            'codigo_postal' => '46002',
        ]);

        Edificio::create([
            'nombre' => 'Edificio Río',
            'direccion' => 'Calle del Río 7',
            'ciudad' => 'Zaragoza',
            'codigo_postal' => '50003',
        ]);

        Edificio::create([
            'nombre' => 'Residencial Sol',
            'direccion' => 'Calle Sol 21',
            'ciudad' => 'Málaga',
            'codigo_postal' => '29004',
        ]);

        Edificio::create([
            'nombre' => 'Urbanización VistaMar',
            'direccion' => 'Camino del Mar 2',
            'ciudad' => 'Alicante',
            'codigo_postal' => '03005',
        ]);

        Edificio::create([
            'nombre' => 'Plaza Mayor Tower',
            'direccion' => 'Plaza Mayor 1',
            'ciudad' => 'Salamanca',
            'codigo_postal' => '37006',
        ]);

        Edificio::create([
            'nombre' => 'Residencial Altos',
            'direccion' => 'Calle Alta 9',
            'ciudad' => 'Granada',
            'codigo_postal' => '18007',
        ]);

        Edificio::create([
            'nombre' => 'Edificio Central Park',
            'direccion' => 'Avenida Central 100',
            'ciudad' => 'Barcelona',
            'codigo_postal' => '08008',
        ]);

        Edificio::create([
            'nombre' => 'Residencial La Fuensanta',
            'direccion' => 'Camino Viejo 45',
            'ciudad' => 'Murcia',
            'codigo_postal' => '30009',
        ]);
    }
}