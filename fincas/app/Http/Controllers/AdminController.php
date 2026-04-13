<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\Usuario;
use App\Models\Edificio;
use App\Models\Comentario;

class AdminController extends Controller
{
    // Panel con incidencias por edificio
    public function panel(Request $request)
    {
        $edificios = Edificio::all();

        $edificio_id = $request->edificio_id ?? $edificios->first()->id ?? null;
        $incidencias = Incidencia::with('usuario', 'comentarios')
                                 ->where('edificio_id', $edificio_id)
                                 ->get();

        return view('admin_panel', compact('edificios', 'incidencias', 'edificio_id'));
    }

    // Detalle incidencia
    public function showIncidencia($id)
    {
        $incidencia = Incidencia::with('comentarios', 'usuario', 'edificio')->findOrFail($id);
        return view('admin_detalle', compact('incidencia'));
    }

    // Cambiar estado
    public function updateEstado(Request $request, $id)
    {
        $incidencia = Incidencia::findOrFail($id);
        $incidencia->estado = $request->estado;
        $incidencia->save();

        return back();
    }

    // Cambiar prioridad
    public function updatePrioridad(Request $request, $id)
    {
        $incidencia = Incidencia::findOrFail($id);
        $incidencia->prioridad = $request->prioridad;
        $incidencia->save();

        return back();
    }

    // Añadir comentario
    public function storeComentario(Request $request, $id)
    {
        $incidencia = Incidencia::findOrFail($id);

        $comentario = new Comentario();
        $comentario->texto = $request->texto;
        $comentario->usuario_id = session('usuario_id'); // admin logueado
        $comentario->incidencia_id = $incidencia->id;
        $comentario->save();

        return back();
    }
}
