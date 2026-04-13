<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Excluir rutas de login y welcome
        if ($request->is('login') || $request->is('/')) {
            return $next($request);
        }

        // Si no hay usuario logueado
        if (!$request->session()->has('usuario_id')) {
            return redirect('/login')->with('error', 'Debes iniciar sesión');
        }

        return $next($request);
    }
}
