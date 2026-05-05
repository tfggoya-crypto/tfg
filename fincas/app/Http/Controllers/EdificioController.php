<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/* 

    ****IMPORTANTE****

    Los métodos si existen da error por una mala interpretacion de intelephase que devuelve algo que VSCode no interpreta muy bien pero funciona correctamente.
*/

class EdificioController extends Controller
{
    // Listar
    public function index()
    {
        $edificios = Edificio::whereHas('admins', function ($q) {
            $q->where('users.id', auth()->id());
        })->latest()->get();

        return view('edificios.index', compact('edificios'));
    }

    // Mostrar
    public function show(Edificio $edificio)
    {
        $edificio->load('admins');

        if (!$edificio->admins->contains(auth()->id())) {
            abort(403);
        }

        return view('edificios.show', compact('edificio'));
    }

    // Crear
    public function create()
    {
        return view('edificios.create');
    }

    // Guardar
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:10',
        ]);

        DB::transaction(function () use ($request) {

            $edificio = Edificio::create([
                'nombre' => $request->nombre,
                'direccion' => $request->direccion,
                'ciudad' => $request->ciudad,
                'codigo_postal' => $request->codigo_postal,
            ]);

            $edificio->admins()->attach(auth()->id());
        });

        return redirect('/admin')
            ->with('success', 'Edificio creado correctamente');
    }

    // Editar
    public function edit(Edificio $edificio)
    {
        if (!$edificio->admins->contains(auth()->id())) {
            abort(403);
        }

        return view('edificios.edit', compact('edificio'));
    }

    // Actualizar
    public function update(Request $request, Edificio $edificio)
    {
        if (!$edificio->admins->contains(auth()->id())) {
            abort(403);
        }

        $edificio->update($request->only([
            'nombre',
            'direccion',
            'ciudad',
            'codigo_postal'
        ]));

        return redirect('/admin')
            ->with('success', 'Edificio actualizado correctamente');
    }

    // Eliminar
    public function destroy(Edificio $edificio)
{
    if (!$edificio->admins->contains(auth()->id())) {
        abort(403);
    }

    $edificio->admins()->detach();
    $edificio->delete();

    return redirect('/admin')
        ->with('success', 'Edificio eliminado correctamente');
}
}