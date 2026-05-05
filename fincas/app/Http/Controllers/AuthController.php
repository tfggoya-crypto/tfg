<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.min' => 'La contraseña tiene que tener 8 caracteres.',
            'password.confirmed' => 'La contraseña nueva no coincide con la confirmación.',
        ]);

        $user = $request->user();

        if (! Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors([
                'current_password' => 'La contraseña actual no es correcta.',
            ]);
        }

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Contraseña actualizada correctamente.');
    }
}