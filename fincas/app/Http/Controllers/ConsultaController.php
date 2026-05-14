<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:25'],
            'tipo_consulta' => ['required', 'string', 'max:255'],
            'asunto' => ['required', 'string', 'max:255'],
            'mensaje' => ['required', 'string'],
            'privacidad' => ['accepted'],
        ]);

        Consulta::create($validated);

        return redirect()
            ->route('contacto')
            ->with('success', 'Consulta enviada correctamente.');
    }
}