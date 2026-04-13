<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Middlewares del grupo web
        $middleware->web(append: \Illuminate\Session\Middleware\StartSession::class);
        $middleware->web(append: \Illuminate\View\Middleware\ShareErrorsFromSession::class);
        $middleware->web(append: \Illuminate\Routing\Middleware\SubstituteBindings::class);
        $middleware->web(append: \App\Http\Middleware\SessionAuth::class);


        // Los middlewares de rol se aplican solo desde web.php en grupo de rutas
        // No se añaden globalmente aquí para evitar bucles
        // $middleware->web(append: \App\Http\Middleware\RoleVecino::class);
        // $middleware->web(append: \App\Http\Middleware\RoleAdmin::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
