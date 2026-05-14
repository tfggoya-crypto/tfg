<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PresidenteController extends Controller
{
    public function index()
    {
        $presidente = auth()->user();

        $edificio = $presidente->edificio;

        if (!$edificio) {
            return view('presidente.presidente', [
                'edificio'    => null,
                'incidencias' => collect(),
                'usuarios'    => collect(),
                'vecinos'     => 0,
                'empleados'   => 0,
                'presidentes' => 0,
            ]);
        }

        $incidencias = $edificio->incidencias()
            ->with(['user', 'comentarios.user'])
            ->latest()
            ->get();

        $usuarios = User::where('edificio_id', $edificio->id)
            ->where('id', '!=', $presidente->id)
            ->get();

        $vecinos     = $usuarios->where('role', 'propietario')->where('subrole', 'vecino')->count();
        $empleados   = $usuarios->where('role', 'empleado')->count();
        $presidentes = $usuarios->where('subrole', 'presidente')->count();

        return view('presidente.presidente', compact(
            'edificio',
            'incidencias',
            'usuarios',
            'vecinos',
            'empleados',
            'presidentes',
        ));
    }
}