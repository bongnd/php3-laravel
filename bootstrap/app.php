<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckAdminMiddleware;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
                'role' => CheckAdminMiddleware::class,
                'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
                'guest' => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
                'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
                'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
                'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
                'checkAdmin' => CheckAdminMiddleware::class,    
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
