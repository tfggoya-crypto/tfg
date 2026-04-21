<?php

namespace Database\Seeders;

use App\Models\Documento;
use App\Models\Edificio;
use App\Models\User;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    public function run(): void
    {
        $edificio = Edificio::first();
        $usuario = User::where('role', 'admin')->first() ?? User::first();

        if (! $edificio || ! $usuario) {
            return;
        }

        Documento::create([
            'edificio_id' => $edificio->id,
            'subido_por' => $usuario->id,
            'nombre' => 'Acta junta abril',
            'archivo_url' => '/storage/documentos/acta-junta-abril.pdf',
            'tipo' => 'acta',
        ]);

        Documento::create([
            'edificio_id' => $edificio->id,
            'subido_por' => $usuario->id,
            'nombre' => 'Factura mantenimiento ascensor',
            'archivo_url' => '/storage/documentos/factura-ascensor.pdf',
            'tipo' => 'factura',
        ]);
    }
}
