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
        
        // YAHAN FIX KIYA HAI: Middleware ko web par force apply kiya
        $middleware->web(append: [
            \App\Http\Middleware\PreventBackHistory::class,
        ]);

        $middleware->alias([
            'check.approval' => \App\Http\Middleware\CheckApprovalStatus::class,
            'otp.verified' => \App\Http\Middleware\EnsureOtpIsVerified::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'prevent-back-history' => \App\Http\Middleware\PreventBackHistory::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();