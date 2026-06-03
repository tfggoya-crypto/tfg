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
            'email'       => 'admin@fynkoo.es',
            'password'    => Hash::make('admin1234'),
            'role'        => 'admin',
            'subrole'     => null,
            'edificio_id' => null,
        ]);

        // ── TÉCNICO ────────────────────────────────────────────────
        User::create([
            'nombre'      => 'Técnico Soporte',
            'username'    => 'tecnico',
            'email'       => 'tecnico@fynkoo.es',
            'password'    => Hash::make('tecnico1234'),
            'role'        => 'tecnico',
            'subrole'     => null,
            'edificio_id' => null,
        ]);

        // ── PRESIDENTES ────────────────────────────────────────────
        User::create([
            'nombre'      => 'María García López',
            'username'    => 'maria',
            'email'       => 'maria@fynkoo.es',
            'password'    => Hash::make('maria1234'),
            'role'        => 'propietario',
            'subrole'     => 'presidente',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Elena Torres Vega',
            'username'    => 'elena',
            'email'       => 'elena@fynkoo.es',
            'password'    => Hash::make('elena1234'),
            'role'        => 'propietario',
            'subrole'     => 'presidente',
            'edificio_id' => 2,
        ]);

        User::create([
            'nombre'      => 'Isabel Romero Díaz',
            'username'    => 'isabel',
            'email'       => 'isabel@fynkoo.es',
            'password'    => Hash::make('isabel1234'),
            'role'        => 'propietario',
            'subrole'     => 'presidente',
            'edificio_id' => 3,
        ]);

        // ── PROPIETARIOS (VECINOS) ─────────────────────────────────
        User::create([
            'nombre'      => 'Carlos Martínez Ruiz',
            'username'    => 'carlos',
            'email'       => 'carlos@fynkoo.es',
            'password'    => Hash::make('carlos1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Ana Fernández Soto',
            'username'    => 'ana',
            'email'       => 'ana@fynkoo.es',
            'password'    => Hash::make('ana1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Luis Sánchez Mora',
            'username'    => 'luis',
            'email'       => 'luis@fynkoo.es',
            'password'    => Hash::make('luis1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Pedro Jiménez Alba',
            'username'    => 'pedro',
            'email'       => 'pedro@fynkoo.es',
            'password'    => Hash::make('pedro1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 2,
        ]);

        User::create([
            'nombre'      => 'Rosa Navarro Gil',
            'username'    => 'rosa',
            'email'       => 'rosa@fynkoo.es',
            'password'    => Hash::make('rosa1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 2,
        ]);

        User::create([
            'nombre'      => 'Antonio Moreno Cruz',
            'username'    => 'antonio',
            'email'       => 'antonio@fynkoo.es',
            'password'    => Hash::make('antonio1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 3,
        ]);

        User::create([
            'nombre'      => 'Manuel Herrera Leal',
            'username'    => 'manuel',
            'email'       => 'manuel@fynkoo.es',
            'password'    => Hash::make('manuel1234'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 4,
        ]);

        // ── EMPLEADOS ──────────────────────────────────────────────
        User::create([
            'nombre'      => 'Jorge Blanco Pérez',
            'username'    => 'jorge',
            'email'       => 'jorge@fynkoo.es',
            'password'    => Hash::make('jorge1234'),
            'role'        => 'empleado',
            'subrole'     => 'conserje',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Carmen Rubio Santos',
            'username'    => 'carmen',
            'email'       => 'carmen@fynkoo.es',
            'password'    => Hash::make('carmen1234'),
            'role'        => 'empleado',
            'subrole'     => 'limpieza',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Raúl Ortega Fuentes',
            'username'    => 'raul',
            'email'       => 'raul@fynkoo.es',
            'password'    => Hash::make('raul1234'),
            'role'        => 'empleado',
            'subrole'     => 'jardinero',
            'edificio_id' => 2,
        ]);

        User::create([
            'nombre'      => 'Lucía Castro Bravo',
            'username'    => 'lucia',
            'email'       => 'lucia@fynkoo.es',
            'password'    => Hash::make('lucia1234'),
            'role'        => 'empleado',
            'subrole'     => 'conserje',
            'edificio_id' => 3,
        ]);

        User::create([
            'nombre'      => 'Sergio Molina Ramos',
            'username'    => 'sergio',
            'email'       => 'sergio@fynkoo.es',
            'password'    => Hash::make('sergio1234'),
            'role'        => 'empleado',
            'subrole'     => 'limpieza',
            'edificio_id' => 4,
        ]);

        // ── USUARIOS GENÉRICOS ORIGINALES ─────────────────────────
        User::create([
            'nombre'      => 'Propietario 1',
            'username'    => 'prop1',
            'email'       => 'prop1@test.com',
            'password'    => Hash::make('password'),
            'role'        => 'propietario',
            'subrole'     => 'vecino',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Juan Cuesta',
            'username'    => 'presidente',
            'email'       => 'presidente@test.com',
            'password'    => Hash::make('password'),
            'role'        => 'propietario',
            'subrole'     => 'presidente',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Empleado 1',
            'username'    => 'empleado1',
            'email'       => 'emp1@test.com',
            'password'    => Hash::make('password'),
            'role'        => 'empleado',
            'subrole'     => 'conserje',
            'edificio_id' => 1,
        ]);

        User::create([
            'nombre'      => 'Tecnico',
            'username'    => 'tecnico',
            'email'       => 'tecnico@test.com',
            'password'    => Hash::make('password'),
            'role'        => 'tecnico',
            'subrole'     => null,
            'edificio_id' => null,
        ]);
    }
}