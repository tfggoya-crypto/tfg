<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'prioridad' => ['required', 'in:baja,media,alta'],
        ]);

        $user = $request->user();

        if (! $user || ! $user->edificio_id) {
            return back()->withErrors([
                'edificio' => 'No tienes un edificio asignado para crear una incidencia.',
            ]);
        }

        Incidencia::create([
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'],
            'prioridad' => $validated['prioridad'],
            'estado' => 'pendiente',
            'user_id' => $user->id,
            'edificio_id' => $user->edificio_id,
        ]);

        return back()->with('success', 'Incidencia creada correctamente.');
    }

    public function cambiarEstado(Request $request, Incidencia $incidencia)
    {
        $user = $request->user();

        if (! $user || ! $user->edificio_id || $incidencia->edificio_id !== $user->edificio_id) {
            abort(403);
        }

        $validated = $request->validate([
            'estado' => ['required', 'in:pendiente,en_proceso,resuelta'],
        ]);

        $incidencia->update([
            'estado' => $validated['estado'],
        ]);

        return back()->with('success', 'Estado de la incidencia actualizado correctamente.');
    }

    public function destroy(Request $request, Incidencia $incidencia)
    {
        $user = $request->user();

        if (! $user || ! $user->edificio_id || $incidencia->edificio_id !== $user->edificio_id) {
            abort(403);
        }

        $incidencia->delete();

        return back()->with('success', 'Incidencia eliminada correctamente.');
    }
}