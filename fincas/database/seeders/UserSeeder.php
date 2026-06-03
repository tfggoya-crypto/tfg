<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ── ADMIN ──────────────────────────────────────────────────
        User::create([
            'nombre'      => 'Administrador Principal',
            'username'    => 'admin',
            'email'       => 'admin@fincapp.es',
            'password'    => Hash::make('admin1234'),
            'role'        => 'admin',
            'subrole'     => null,
            'edificio_id' => null,
        ]);

        // ── TÉCNICO ────────────────────────────────────────────────
        User::create([
            'nombre'      => 'Técnico Soporte',
            'username'    => 'tecnico',
            'email'       => 'tecnico@fincapp.es',
            'password'    => Hash::make('tecnico1234'),
            'role'        => 'tecnico',
            'subrole'     => null,
            'edificio_id' => null,
        ]);

        // ── PRESIDENTES ────────────────────────────────────────────
        User::create([
            'nombre'      => 'María García López',
            'username'    => 'maria',
            'email'       => 'maria@fincapp.es',
            'password'    => Hash::make('maria1234'),
            'role'        => 'propietario',
            'subrole'     => 'presidente',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Elena Torres Vega',
            'username'    => 'elena',
            'email'       => 'elena@fincapp.es',
            'password'    => Hash::make('elena1234'),
            'role'        => 'propietario',
            'subrole'     => 'presidente',
            'edificio_id' => 2,
        ]);

        User::create([
            'nombre'      => 'Isabel Romero Díaz',
            'username'    => 'isabel',
            'email'       => 'isabel@fincapp.es',
            'password'    => Hash::make('isabel1234'),
            'role'        => 'propietario',
            'subrole'     => 'presidente',
            'edificio_id' => 3,
        ]);

        // ── PROPIETARIOS (VECINOS) ─────────────────────────────────
        User::create([
            'nombre'      => 'Carlos Martínez Ruiz',
            'username'    => 'carlos',
            'email'       => 'carlos@fincapp.es',
            'password'    => Hash::make('carlos1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Ana Fernández Soto',
            'username'    => 'ana',
            'email'       => 'ana@fincapp.es',
            'password'    => Hash::make('ana1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Luis Sánchez Mora',
            'username'    => 'luis',
            'email'       => 'luis@fincapp.es',
            'password'    => Hash::make('luis1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Pedro Jiménez Alba',
            'username'    => 'pedro',
            'email'       => 'pedro@fincapp.es',
            'password'    => Hash::make('pedro1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 2,
        ]);

        User::create([
            'nombre'      => 'Rosa Navarro Gil',
            'username'    => 'rosa',
            'email'       => 'rosa@fincapp.es',
            'password'    => Hash::make('rosa1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 2,
        ]);

        User::create([
            'nombre'      => 'Antonio Moreno Cruz',
            'username'    => 'antonio',
            'email'       => 'antonio@fincapp.es',
            'password'    => Hash::make('antonio1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 3,
        ]);

        User::create([
            'nombre'      => 'Manuel Herrera Leal',
            'username'    => 'manuel',
            'email'       => 'manuel@fincapp.es',
            'password'    => Hash::make('manuel1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 4,
        ]);

        // ── EMPLEADOS ──────────────────────────────────────────────
        User::create([
            'nombre'      => 'Jorge Blanco Pérez',
            'username'    => 'jorge',
            'email'       => 'jorge@fincapp.es',
            'password'    => Hash::make('jorge1234'),
            'role'        => 'empleado',
            'subrole'     => 'conserje',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Carmen Rubio Santos',
            'username'    => 'carmen',
            'email'       => 'carmen@fincapp.es',
            'password'    => Hash::make('carmen1234'),
            'role'        => 'empleado',
            'subrole'     => 'limpieza',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Raúl Ortega Fuentes',
            'username'    => 'raul',
            'email'       => 'raul@fincapp.es',
            'password'    => Hash::make('raul1234'),
            'role'        => 'empleado',
            'subrole'     => 'jardinero',
            'edificio_id' => 2,
        ]);

        User::create([
            'nombre'      => 'Lucía Castro Bravo',
            'username'    => 'lucia',
            'email'       => 'lucia@fincapp.es',
            'password'    => Hash::make('lucia1234'),
            'role'        => 'empleado',
            'subrole'     => 'conserje',
            'edificio_id' => 3,
        ]);

        User::create([
            'nombre'      => 'Sergio Molina Ramos',
            'username'    => 'sergio',
            'email'       => 'sergio@fincapp.es',
            'password'    => Hash::make('sergio1234'),
            'role'        => 'empleado',
            'subrole'     => 'limpieza',
            'edificio_id' => 4,
        ]);
    }
}