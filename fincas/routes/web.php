<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\EmpleadoController;

// Página principal
Route::get('/', fn() => view('welcome'));

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

// Admin
Route::get('/admin', [AdminController::class, 'index']);

// Propietario
Route::get('/propietario', [PropietarioController::class, 'index']);

// Empleado
Route::get('/empleado', [EmpleadoController::class, 'index']);
