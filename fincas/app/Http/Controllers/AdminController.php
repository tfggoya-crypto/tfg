<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
   public function index()
    {
        $admin = auth()->user();

        $edificiosIds = $admin->edificiosAdmin->pluck('id');

        $usuarios = User::whereIn('edificio_id', $edificiosIds)
            ->get();

        $empleados = User::where('role', 'empleado')
            ->whereIn('edificio_id', $edificiosIds)
            ->count();

        $vecinos = User::where('role', 'propietario')
            ->whereIn('edificio_id', $edificiosIds)
            ->count();

        $presidentes = User::where('role', 'presidente')
            ->whereIn('edificio_id', $edificiosIds)
            ->count();

        return view('admin.admin', compact(
            'empleados',
            'vecinos',
            'presidentes',
            'usuarios'
        ));
    }
}