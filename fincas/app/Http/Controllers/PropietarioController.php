<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\ComentarioIncidencia;

class PropietarioController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $incidencias = Incidencia::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('propietario', compact('user', 'incidencias'));
    }

    public function guardarComentario(Request $request, Incidencia $incidencia)
    {
        // Solo puede comentar en sus propias incidencias
        if ($incidencia->user_id !== auth()->id()) {
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

        return back()->with('success', 'Comentario añadido correctamente.');
    }
}