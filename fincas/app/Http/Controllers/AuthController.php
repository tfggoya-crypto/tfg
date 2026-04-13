<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // Mostrar formulario login
    public function showLogin()
    {
        return view('login'); // resources/views/login.blade.php
    }

    // Procesar login
    public function login(Request $request)
{
    $username = $request->input('username');
    $password = $request->input('password');

    $user = DB::table('usuarios')
        ->where('username', $username)
        ->where('password', $password)
        ->first();

    if ($user) {
        // Guardar en la sesión de Laravel
        $request->session()->put('usuario_id', $user->id);
        $request->session()->put('rol', $user->rol);
        $request->session()->put('edificio_id', $user->edificio_id);
        $request->session()->put('nombre', $user->nombre);

        if($user->rol == 'vecino'){
            return redirect('/vecino');
        } else {
            return redirect('/admin');
        }
    } else {
        return back()->with('error', 'Usuario o contraseña incorrectos');
    }
}


    // Logout
    public function logout(Request $request)
    {
        $request->session()->flush(); // Elimina toda la sesión
        return redirect('/login');
    }
}
