<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Incidencia;
use App\Models\Comentario;

class VecinoController extends Controller
{
    // Panel principal
    public function panel()
    {
        $user = Usuario::find(session('usuario_id'));
        $incidencias = $user->incidencias; // relación hasMany

        return view('vecino_panel', compact('incidencias'));
    }

    // Formulario crear incidencia
    public function createIncidenciaForm()
    {
        return view('vecino_nueva_incidencia');
    }

    // Guardar nueva incidencia
    public function storeIncidencia(Request $request)
    {
        $user = Usuario::find(session('usuario_id'));

        $incidencia = new Incidencia();
        $incidencia->descripcion = $request->descripcion;
        $incidencia->prioridad = $request->prioridad ?? 'media';
        $incidencia->estado = 'abierta';
        $incidencia->usuario_id = $user->id;
        $incidencia->edificio_id = $user->edificio_id;
        $incidencia->save();

        return redirect('/vecino');
    }

    // Ver detalle de incidencia
    public function showIncidencia($id)
    {
        $incidencia = Incidencia::with('comentarios')->findOrFail($id);

        // Validación: solo el dueño
        if($incidencia->usuario_id != session('usuario_id')){
            abort(403);
        }

        return view('vecino_detalle', compact('incidencia'));
    }

    // Añadir comentario
    public function storeComentario(Request $request, $id)
    {
        $incidencia = Incidencia::findOrFail($id);

        // Solo dueño
        if($incidencia->usuario_id != session('usuario_id')){
            abort(403);
        }

        $comentario = new Comentario();
        $comentario->texto = $request->texto;
        $comentario->usuario_id = session('usuario_id');
        $comentario->incidencia_id = $incidencia->id;
        $comentario->save();

        return back();
    }
}
