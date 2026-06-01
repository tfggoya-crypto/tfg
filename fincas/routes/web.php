<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PresidenteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\EdificioController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\TecnicoController;
use App\Http\Middleware\RoleAdminMiddleware;
use App\Http\Middleware\RolePropietarioMiddleware;
use App\Http\Middleware\RolePresidenteMiddleware;
use App\Http\Middleware\RoleEmpleadoMiddleware;
use App\Http\Middleware\RoleTecnicoMiddleware;

// Página principal
Route::get('/', fn() => view('welcome'));
Route::get('/contacto', fn() => view('contacto'))->name('contacto');
Route::get('/acercade', fn() => view('acercade'))->name('acercade');
Route::post('/contacto', [ConsultaController::class, 'store'])->name('contacto.store');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware(RoleAdminMiddleware::class);

// Presidente
Route::get('/presidente', [PresidenteController::class, 'index'])
    ->middleware(RolePresidenteMiddleware::class)
    ->name('presidente.index');

Route::post('/presidente/incidencias', [PresidenteController::class, 'crearIncidencia'])
    ->middleware(['auth', RolePresidenteMiddleware::class])
    ->name('presidente.incidencias.store');

Route::post('/presidente/cambiar-password', [AuthController::class, 'changePassword'])
    ->middleware(['auth', RolePresidenteMiddleware::class])
    ->name('presidente.password.update');


// Propietario
Route::get('/propietario', [PropietarioController::class, 'index'])->middleware(RolePropietarioMiddleware::class);
Route::post('/propietario/incidencias/{incidencia}/comentarios', [PropietarioController::class, 'guardarComentario'])
    ->middleware(['auth', RolePropietarioMiddleware::class])
    ->name('propietario.comentarios.store');
Route::post('/propietario/incidencias', [IncidenciaController::class, 'store'])
    ->middleware(['auth', RolePropietarioMiddleware::class])
    ->name('propietario.incidencias.store');
    Route::post('/propietario/cambiar-password', [AuthController::class, 'changePassword'])
    ->middleware(['auth', RolePropietarioMiddleware::class])
    ->name('propietario.password.update');
// Empleado
Route::get('/empleado', [EmpleadoController::class, 'index'])
    ->middleware(RoleEmpleadoMiddleware::class)
    ->name('empleado.index');
Route::post('/empleado/facturas', [EmpleadoController::class, 'storeFactura'])
    ->middleware(['auth', RoleEmpleadoMiddleware::class])
    ->name('empleado.facturas.store');
Route::post('/empleado/cambiar-password', [AuthController::class, 'changePassword'])
    ->middleware(['auth', RoleEmpleadoMiddleware::class])
    ->name('empleado.password.update');
Route::post('/incidencias', [IncidenciaController::class, 'store'])
    ->middleware(['auth', RoleEmpleadoMiddleware::class])
    ->name('incidencias.store');
    
// Edificio
Route::get('/edificios', [EdificioController::class, 'index'])
    ->name('edificios.index');

Route::get('/edificios/{edificio}', [EdificioController::class, 'show'])
    ->middleware(['auth'])
    ->name('edificios.show');

Route::post('/edificios', [EdificioController::class, 'store'])
    ->middleware(['auth', RoleAdminMiddleware::class])
    ->name('edificios.store');

Route::put('/edificios/{edificio}', [EdificioController::class, 'update'])
    ->middleware(['auth', RoleAdminMiddleware::class])
    ->name('edificios.update');
    
Route::delete('/edificios/{edificio}', [EdificioController::class, 'destroy'])
    ->middleware(['auth', RoleAdminMiddleware::class])
    ->name('edificios.destroy');


// Incidencia
Route::put('/incidencias/{incidencia}', [IncidenciaController::class, 'update'])
    ->middleware(['auth'])
    ->name('incidencias.update');

Route::patch('/incidencias/{incidencia}/estado', [IncidenciaController::class, 'cambiarEstado'])
    ->middleware(['auth', RoleAdminMiddleware::class])
    ->name('incidencias.estado');

Route::patch('/incidencias/{incidencia}/prioridad', [IncidenciaController::class, 'cambiarPrioridad'])
    ->middleware(['auth', RoleAdminMiddleware::class])
    ->name('incidencias.prioridad');

Route::post('/admin/incidencias', [IncidenciaController::class, 'storeAdmin'])
    ->middleware(['auth', RoleAdminMiddleware::class])
    ->name('admin.incidencias.store');

Route::delete('/incidencias/{incidencia}', [IncidenciaController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('incidencias.destroy');

    //Comentarios
    Route::post(
    '/incidencias/{incidencia}/comentarios',
        [IncidenciaController::class, 'guardarComentario']
        )
            ->middleware(['auth', RoleAdminMiddleware::class])
            ->name('comentarios.store');

// Usuario
Route::post('/users', [UserController::class, 'store'])
    ->middleware(['auth', RoleAdminMiddleware::class])
    ->name('users.store');
Route::put('/users/{user}', [UserController::class, 'update'])
    ->middleware(['auth', RoleAdminMiddleware::class])
    ->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->middleware(['auth', RoleAdminMiddleware::class])
    ->name('users.destroy');


// Técnico
Route::get('/tecnico', [TecnicoController::class, 'index'])->middleware(RoleTecnicoMiddleware::class);