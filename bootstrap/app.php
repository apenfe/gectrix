<?php

use App\Http\Middleware\AlwaysAcceptJsonMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->statefulApi();  // se asegura de solicitar autenticación en cada petición
        $middleware->prependToGroup('api', AlwaysAcceptJsonMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
