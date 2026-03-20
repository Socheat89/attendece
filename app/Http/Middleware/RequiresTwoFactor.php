<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequiresTwoFactor
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return $next($request);
        }

        // If user has 2FA enabled and hasn't verified this session yet
        if (
            $user->two_factor_enabled &&
            ! session()->has('2fa_verified') &&
            ! $request->routeIs('two-factor.*') &&
            ! $request->routeIs('logout')
        ) {
            // Store user ID, log them out temporarily
            if (auth()->check()) {
                session(['2fa_user_id' => $user->id]);
                auth()->logout();
            }

            return redirect()->route('two-factor.challenge');
        }

        return $next($request);
    }
}
