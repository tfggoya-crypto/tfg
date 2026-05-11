<?php

namespace Database\Seeders;

use App\Models\Consulta;
use Illuminate\Database\Seeder;

class ConsultaSeeder extends Seeder
{
    public function run(): void
    {
        Consulta::insert([
            [
                'nombre' => 'María',
                'apellidos' => 'Gómez López',
                'email' => 'maria.gomez@example.com',
                'telefono' => '600123456',
                'tipo_consulta' => 'facturacion_pagos',
                'asunto' => 'Duda sobre el último recibo',
                'mensaje' => 'Quisiera revisar el importe del último recibo porque no me coincide con el anterior.',
                'privacidad' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Javier',
                'apellidos' => 'Santos Pérez',
                'email' => 'javier.santos@example.com',
                'telefono' => null,
                'tipo_consulta' => 'informacion_general',
                'asunto' => 'Acceso a la plataforma',
                'mensaje' => 'Necesito ayuda para acceder al panel de usuario desde el móvil.',
                'privacidad' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Laura',
                'apellidos' => 'Martín Ruiz',
                'email' => 'laura.martin@example.com',
                'telefono' => '611987654',
                'tipo_consulta' => 'sugerencias_mejoras',
                'asunto' => 'Propuesta de mejora para avisos',
                'mensaje' => 'Propongo añadir notificaciones automáticas por correo para los nuevos avisos de la comunidad.',
                'privacidad' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}