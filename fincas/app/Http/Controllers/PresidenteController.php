<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresidenteController extends Controller
{
    public function index()
    {
        return view('presidente.presidente');
    }
}
