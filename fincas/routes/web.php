<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EdificioController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\UserController;

// Página principal
Route::get('/', fn() => view('welcome'));

// Login
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout']);

// Grupo de rutas solo para administradores (requiere login + rol admin)
Route::middleware(['auth', 'role.admin'])->prefix('admin')->group(function () {

    // Panel principal del administrador
    Route::get('/', [AdminController::class, 'panel']);



    // ========================
    // 🏢 EDIFICIOS
    // ========================

    // Ver todos los edificios
    Route::get('/edificios', [EdificioController::class, 'index']);

    // Mostrar formulario para crear edificio
    Route::get('/edificios/create', [EdificioController::class, 'create']);

    // Guardar nuevo edificio
    Route::post('/edificios', [EdificioController::class, 'store']);

    // Ver un edificio concreto
    Route::get('/edificios/{id}', [EdificioController::class, 'show']);

    // Mostrar formulario para editar edificio
    Route::get('/edificios/{id}/edit', [EdificioController::class, 'edit']);

    // Actualizar edificio
    Route::put('/edificios/{id}', [EdificioController::class, 'update']);

    // Eliminar edificio
    Route::delete('/edificios/{id}', [EdificioController::class, 'destroy']);



    // ========================
    // 🛠️ INCIDENCIAS
    // ========================

    // Ver todas las incidencias (se puede filtrar por edificio)
    Route::get('/incidencias', [IncidenciaController::class, 'index']);

    // Crear incidencia
    Route::post('/incidencias', [IncidenciaController::class, 'store']);

    // Ver detalle de una incidencia
    Route::get('/incidencias/{id}', [IncidenciaController::class, 'show']);

    // Cambiar estado de la incidencia
    Route::patch('/incidencias/{id}/estado', [IncidenciaController::class, 'updateEstado']);

    // Cambiar prioridad de la incidencia
    Route::patch('/incidencias/{id}/prioridad', [IncidenciaController::class, 'updatePrioridad']);

    // Añadir comentario a la incidencia
    Route::post('/incidencias/{id}/comentario', [IncidenciaController::class, 'storeComentario']);



    // ========================
    // 👥 USUARIOS
    // ========================

    // Ver todos los usuarios
    Route::get('/usuarios', [UserController::class, 'index']);

    // Crear usuario
    Route::post('/usuarios', [UserController::class, 'store']);

    // Editar usuario
    Route::put('/usuarios/{id}', [UserController::class, 'update']);

    // Eliminar usuario
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy']);

});
