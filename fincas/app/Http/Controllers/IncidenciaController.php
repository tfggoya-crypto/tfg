<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\Comentario;
use App\Models\ComentarioIncidencia;

class IncidenciaController extends Controller
{

    // 📄 LISTAR INCIDENCIAS

    public function index(Request $request)
    {
        $query = Incidencia::with(['usuario', 'edificio', 'comentarios']);

        // 🔎 Filtro por edificio (si viene por URL)
        if ($request->edificio_id) {
            $query->where('edificio_id', $request->edificio_id);
        }

        $incidencias = $query->get();

        return view('admin.incidencias.index', compact('incidencias'));
    }


    // CREAR INCIDENCIA

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'edificio_id' => 'required|exists:edificios,id',
        ]);

        Incidencia::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'edificio_id' => $request->edificio_id,
            'usuario_id' => session('usuario_id'), // o auth()->id() si usas auth real
            'estado' => 'pendiente',
            'prioridad' => 'normal',
        ]);

        return redirect('/admin/incidencias')->with('success', 'Incidencia creada correctamente');
    }


    // VER DETALLE INCIDENCIA

    public function show($id)
    {
        $incidencia = Incidencia::with(['usuario', 'edificio', 'comentarios'])
            ->findOrFail($id);

        return view('admin.incidencias.show', compact('incidencia'));
    }


    // CAMBIAR ESTADO

    public function updateEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,en_proceso,resuelta,cerrada',
        ]);

        $incidencia = Incidencia::findOrFail($id);

        $incidencia->estado = $request->estado;
        $incidencia->save();

        return back()->with('success', 'Estado actualizado');
    }


    // CAMBIAR PRIORIDAD

    public function updatePrioridad(Request $request, $id)
    {
        $request->validate([
            'prioridad' => 'required|in:baja,normal,alta,urgente',
        ]);

        $incidencia = Incidencia::findOrFail($id);

        $incidencia->prioridad = $request->prioridad;
        $incidencia->save();

        return back()->with('success', 'Prioridad actualizada');
    }


    // AÑADIR COMENTARIO

    public function storeComentario(Request $request, $id)
    {
        $request->validate([
            'texto' => 'required|string',
        ]);

        $incidencia = Incidencia::findOrFail($id);

        ComentarioIncidencia::create([
            'texto' => $request->texto,
            'incidencia_id' => $incidencia->id,
            'usuario_id' => session('usuario_id'), // admin logueado
        ]);

        return back()->with('success', 'Comentario añadido');
    }
}