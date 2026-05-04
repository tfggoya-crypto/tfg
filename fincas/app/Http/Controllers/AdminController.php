<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }
}

// TODO implementar en la pantalla principal listado de incidencias y edificios mediante JS
