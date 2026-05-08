<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RolePresidenteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->role !== 'propietario' || $user->subrole !== 'presidente') {
            return redirect('/login')->withErrors([
                'username' => 'No tienes permiso para acceder a esta sección'
            ]);
        }

        return $next($request);
    }
}
