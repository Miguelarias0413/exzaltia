<?php

use App\Http\Middleware\CheckIfIsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
         // Registrar el middleware de administrador
         $middleware->alias([
            'admin'=> CheckIfIsAdmin::class
         ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
