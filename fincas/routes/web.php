<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\EdificioController;
use App\Http\Middleware\RoleAdminMiddleware;
use App\Http\Middleware\RolePropietarioMiddleware;
use App\Http\Middleware\RoleEmpleadoMiddleware;

// Página principal
Route::get('/', fn() => view('welcome'));
Route::get('/contacto', fn() => view('contacto'))->name('contacto');
Route::get('/acercade', fn() => view('acercade'))->name('acercade');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware(RoleAdminMiddleware::class);

// Propietario
Route::get('/propietario', [PropietarioController::class, 'index'])->middleware(RolePropietarioMiddleware::class);

// Empleado
Route::get('/empleado', [EmpleadoController::class, 'index'])->middleware(RoleEmpleadoMiddleware::class);
Route::post('/empleado/cambiar-password', [AuthController::class, 'changePassword'])
    ->middleware(['auth', RoleEmpleadoMiddleware::class])
    ->name('empleado.password.update');
Route::post('/incidencias', [IncidenciaController::class, 'store'])
    ->middleware(['auth', RoleEmpleadoMiddleware::class])
    ->name('incidencias.store');
Route::patch('/incidencias/{incidencia}/estado', [IncidenciaController::class, 'cambiarEstado'])
    ->middleware(['auth', RoleEmpleadoMiddleware::class])
    ->name('incidencias.estado');

    
// Edificio
Route::get('/edificios', [EdificioController::class, 'index'])
    ->name('edificios.index');

Route::get('/edificios/{edificio}', [EdificioController::class, 'show'])
    ->middleware(['auth'])
    ->name('edificios.show');

Route::post('/edificios', [EdificioController::class, 'store'])
    ->name('edificios.store');

Route::put('/edificios/{edificio}', [EdificioController::class, 'update'])
    ->name('edificios.update');
    
Route::delete('/edificios/{edificio}', [EdificioController::class, 'destroy'])
    ->name('edificios.destroy');


// Incidencia
Route::put('/incidencias/{incidencia}', [IncidenciaController::class, 'update'])
    ->name('incidencias.update');

Route::patch('/incidencias/{incidencia}/estado', [IncidenciaController::class, 'cambiarEstado'])
    ->name('incidencias.estado');

Route::patch('/incidencias/{incidencia}/prioridad', [IncidenciaController::class, 'cambiarPrioridad'])
    ->name('incidencias.prioridad');

Route::post('/admin/incidencias', [IncidenciaController::class, 'storeAdmin'])
    ->middleware(['auth', RoleAdminMiddleware::class])
    ->name('admin.incidencias.store');

Route::delete('/incidencias/{incidencia}', [IncidenciaController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('incidencias.destroy');