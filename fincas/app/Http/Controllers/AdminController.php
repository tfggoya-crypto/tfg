<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\Edificio;

class AdminController extends Controller
{
    // Panel principal del administrador
    public function panel(Request $request)
    {

        //  ESO FALLA PQ FALTA POR IMPLEMENTAR EL AUTH, DESCOMENTAR TRAS SOLUCIONAR
        //              |
        //              |
        //              V


/*

        // Usuario logueado 
        $user = auth()->user();

        // Obtener SOLO los edificios que gestiona el admin
        // (requiere relación belongsToMany en User)
        $edificios = $user->edificiosAdmin;


        // Obtener edificio seleccionado (por filtro)
        $edificio_id = $request->edificio_id ?? ($edificios->first()->id ?? null);


        
        // Inicializar incidencias
        $incidencias = [];

        // Si hay edificio seleccionado, cargar incidencias
        if ($edificio_id) {
            $incidencias = Incidencia::with(['usuario', 'comentarios'])
                ->where('edificio_id', $edificio_id)
                ->get();
        }

        // Devolver vista del panel
        return view('admin.panel', compact(
            'edificios',
            'incidencias',
            'edificio_id'
        ));


*/

    }
}
    