<?php

use App\Http\Middleware\EnsureRole;
use App\Http\Middleware\LogActivity;
use App\Http\Middleware\IpRestriction;
use App\Http\Middleware\RequiresTwoFactor;
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
    ->withMiddleware(function (Middleware $middleware): void {
        // Trust all proxies (required for ngrok / reverse-proxy HTTPS tunnels)
        $middleware->trustProxies(at: '*');

        $middleware->alias([
            'role'                 => EnsureRole::class,
            'company_subscription' => \App\Http\Middleware\CheckCompanySubscription::class,
            'super_admin'          => \App\Http\Middleware\CheckSuperAdmin::class,
            'two_factor'           => RequiresTwoFactor::class,
            'ip_restrict'          => IpRestriction::class,
        ]);

        $middleware->web(append: [
            \App\Http\Middleware\SetLocale::class,
            LogActivity::class,
            IpRestriction::class,
            RequiresTwoFactor::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
