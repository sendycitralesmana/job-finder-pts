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
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'is-admin' => \App\Http\Middleware\IsAdmin::class,
            'is-applicant' => \App\Http\Middleware\IsApplicant::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
