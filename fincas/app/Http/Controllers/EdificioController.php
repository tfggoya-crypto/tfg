<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edificio;

class EdificioController extends Controller
{

    // LISTAR EDIFICIOS
   
    public function index()
    {
        $edificios = Edificio::all();

        return view('admin.edificios.index', compact('edificios'));
    }


    //  FORMULARIO CREAR

    public function create()
    {
        return view('admin.edificios.create');
    }


    //  GUARDAR EDIFICIO

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
        ]);

        Edificio::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
        ]);

        return redirect('/admin/edificios')->with('success', 'Edificio creado correctamente');
    }


    //  VER EDIFICIO

    public function show($id)
    {
        $edificio = Edificio::findOrFail($id);

        return view('admin.edificios.show', compact('edificio'));
    }


    //  FORMULARIO EDITAR

    public function edit($id)
    {
        $edificio = Edificio::findOrFail($id);

        return view('admin.edificios.edit', compact('edificio'));
    }


    //  ACTUALIZAR EDIFICIO

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
        ]);

        $edificio = Edificio::findOrFail($id);

        $edificio->update([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
        ]);

        return redirect('/admin/edificios')->with('success', 'Edificio actualizado correctamente');
    }


    // ELIMINAR EDIFICIO

    public function destroy($id)
    {
        $edificio = Edificio::findOrFail($id);

        $edificio->delete();

        return redirect('/admin/edificios')->with('success', 'Edificio eliminado correctamente');
    }
}