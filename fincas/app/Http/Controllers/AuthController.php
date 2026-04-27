<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar login
    public function showLogin()
    {
        return view('login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {

            $request->session()->regenerate();

            // Redirección según rol
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin');
            }

            if ($user->role === 'propietario') {
                return redirect('/propietario');
            }

            if ($user->role === 'empleado') {
                return redirect('/empleado');
            }

            return redirect('/');
        }

        return back()->withErrors([
            'username' => 'Credenciales incorrectas'
        ]);
    }
}