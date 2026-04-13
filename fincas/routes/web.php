<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VecinoController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\RoleVecino;
use App\Http\Middleware\RoleAdmin;

// Página principal
Route::get('/', fn() => view('welcome'));

// Login
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout']);

// Rutas de vecinos
Route::middleware([RoleVecino::class])->group(function () {
    Route::get('/vecino', [VecinoController::class, 'panel']);
    Route::get('/vecino/incidencia/nueva', [VecinoController::class, 'createIncidenciaForm']);
    Route::post('/vecino/incidencia', [VecinoController::class, 'storeIncidencia']);
    Route::get('/vecino/incidencia/{id}', [VecinoController::class, 'showIncidencia']);
    Route::post('/vecino/incidencia/{id}/comentario', [VecinoController::class, 'storeComentario']);
});

// Rutas de admin
Route::middleware([RoleAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'panel']);
    Route::get('/admin/incidencia/{id}', [AdminController::class, 'showIncidencia']);
    Route::post('/admin/incidencia/{id}/estado', [AdminController::class, 'updateEstado']);
    Route::post('/admin/incidencia/{id}/prioridad', [AdminController::class, 'updatePrioridad']);
    Route::post('/admin/incidencia/{id}/comentario', [AdminController::class, 'storeComentario']);
});
