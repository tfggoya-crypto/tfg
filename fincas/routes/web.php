<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Middleware\RoleAdminMiddleware;

// Página principal
Route::get('/', fn() => view('welcome'));

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware(RoleAdminMiddleware::class);

// Propietario
Route::get('/propietario', [PropietarioController::class, 'index']);

// Empleado
Route::get('/empleado', [EmpleadoController::class, 'index']);
