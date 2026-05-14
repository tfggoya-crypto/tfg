<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Incidencia;
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

    public function crearIncidencia(Request $request)
    {
        $request->validate([
            'titulo'      => 'required|string|max:255',
            'descripcion' => 'required|string',
            'prioridad'   => 'required|in:baja,media,alta',
        ]);

        Incidencia::create([
            'titulo'      => $request->titulo,
            'descripcion' => $request->descripcion,
            'prioridad'   => $request->prioridad,
            'estado'      => 'pendiente',
            'user_id'     => auth()->id(),
            'edificio_id' => auth()->user()->edificio_id,
        ]);

        return back()->with('success', 'Incidencia creada correctamente.');
    }
}