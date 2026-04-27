<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    public function index()
    {
        return view('propietario');
    }
}
