<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\ComentarioIncidencia;
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

    public function cambiarPrioridad(Request $request, Incidencia $incidencia)
    {
        $user = $request->user();

        if (! $user || ! $user->edificio_id || $incidencia->edificio_id !== $user->edificio_id) {
            abort(403);
        }

        $validated = $request->validate([
            'prioridad' => ['required', 'in:baja,media,alta'],
        ]);

        $incidencia->update([
            'prioridad' => $validated['prioridad'],
        ]);

        return back()->with('success', 'Prioridad actualizada correctamente.');
    }

    public function destroy(Request $request, Incidencia $incidencia)
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        $tieneAcceso = false;

        // ADMIN
        if ($user->role === 'admin') {

            $tieneAcceso = $user->edificiosAdmin()
                ->where('edificios.id', $incidencia->edificio_id)
                ->exists();
        }

        // EMPLEADO
        if ($user->role !== 'admin') {

            $tieneAcceso = $user->edificio_id
                && $incidencia->edificio_id === $user->edificio_id;
        }

        if (! $tieneAcceso) {
            abort(403);
        }

        $incidencia->delete();

        return back()->with('success', 'Incidencia eliminada correctamente.');
    }

    public function update(Request $request, Incidencia $incidencia)
    {
        $data = [];

        if ($request->has('titulo')) {
            $data['titulo'] = $request->titulo;
        }

        if ($request->has('descripcion')) {
            $data['descripcion'] = $request->descripcion;
        }

        if ($request->has('estado')) {
            $data['estado'] = $request->estado;
        }

        if ($request->has('prioridad')) {
            $data['prioridad'] = $request->prioridad;
        }

        $incidencia->update($data);

        return redirect('/admin')
            ->with('success', 'Incidencia actualizada correctamente');
    }

    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'prioridad' => ['required', 'in:baja,media,alta'],
            'edificio_id' => ['required', 'exists:edificios,id'],
        ]);

        $user = $request->user();

        if (!$user->edificiosAdmin->contains('id', $validated['edificio_id'])) {
            abort(403);
        }

        Incidencia::create([
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'],
            'prioridad' => $validated['prioridad'],
            'estado' => 'pendiente',
            'user_id' => $user->id,
            'edificio_id' => $validated['edificio_id'],
        ]);

        return back()->with('success', 'Incidencia creada correctamente');
    }

    public function guardarComentario(Request $request, Incidencia $incidencia)
    {
        $user = auth()->user();

        // Solo puede comentar incidencias
        // de edificios que administra
        if (
            ! $user->edificiosAdmin
                ->contains($incidencia->edificio_id)
        ) {
            abort(403);
        }

        $request->validate([
            'texto' => 'required|string|max:1000',
        ]);

        ComentarioIncidencia::create([
            'texto'         => $request->texto,
            'incidencia_id' => $incidencia->id,
            'user_id'       => auth()->id(),
        ]);

        return back()->with(
            'success',
            'Comentario añadido correctamente.'
        );
    }
}