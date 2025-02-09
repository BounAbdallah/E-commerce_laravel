<?php

use App\Http\Middleware\CheckSession;
use Illuminate\Foundation\Application;
use App\Http\Middleware\EnsureUserIsClient;
use App\Http\Middleware\VerificationClient;
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
            'VerificationClient' => VerificationClient::class,
            'CheckSession' => CheckSession::class,

        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
