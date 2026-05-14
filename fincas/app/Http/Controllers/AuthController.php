<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private function redirigirSegunRol($user)
    {
        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        if ($user->role === 'tecnico') {
            return redirect('/tecnico');
        }

        if ($user->role === 'propietario') {

            if($user->subrole === 'presidente') {
                return redirect('/presidente');
            }
            
            if($user->subrole === 'vecino') {
            
                return redirect('/propietario');
            }
        }

        if ($user->role === 'empleado') {
            return redirect('/empleado');
        }

        return redirect('/');
    }

    private function redirigirSiSesionActiva()
    {
        if (!Auth::check()) {
            return null;
        }

        return $this->redirigirSegunRol(Auth::user());
    }

    // Mostrar login
    public function showLogin()
    {
        if ($redireccion = $this->redirigirSiSesionActiva()) {
            return $redireccion;
        }

        return view('login.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        if ($redireccion = $this->redirigirSiSesionActiva()) {
            return $redireccion;
        }

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('username', 'password'), $request->filled('remember_user'))) {

            $request->session()->regenerate();

            if ($request->filled('remember_user')) {
                Cookie::queue('remember_username',$request->username, 60 * 24 * 30 );
            } else {
                Cookie::queue(Cookie::forget('remember_username'));
            }

            return $this->redirigirSegunRol(Auth::user());
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