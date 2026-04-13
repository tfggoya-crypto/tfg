<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleVecino
{
    public function handle(Request $request, Closure $next)
{
    $rol = $request->session()->get('rol'); // coger el rol directamente

    if (!$rol || strtolower($rol) !== 'vecino') {
        return redirect('/login')->with('error', 'Acceso denegado');
    }

    return $next($request);
}
}
