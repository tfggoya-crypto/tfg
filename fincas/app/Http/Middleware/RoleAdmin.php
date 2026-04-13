<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleAdmin
{
    public function handle(Request $request, Closure $next)
{
    $rol = $request->session()->get('rol');

    if (!$rol || strtolower($rol) !== 'administrador_fincas') {
        return redirect('/login')->with('error', 'Acceso denegado');
    }

    return $next($request);
}
}
