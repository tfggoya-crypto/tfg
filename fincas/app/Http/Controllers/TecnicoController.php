<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function index()
    {
        $consultas = Consulta::orderBy('created_at', 'desc')->get();

        return view('tecnico.tecnico', compact('consultas'));
    }
}
