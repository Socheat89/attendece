<?php

namespace App\Http\Middleware;

use App\Models\IpWhitelist;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IpRestriction
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Only apply to authenticated users
        if (! $user || ! $user->company_id) {
            return $next($request);
        }

        // Check if company has any active IP restrictions
        $whitelist = IpWhitelist::where('company_id', $user->company_id)
            ->where('is_active', true)
            ->pluck('ip_address');

        // If no IPs configured — no restriction applied
        if ($whitelist->isEmpty()) {
            return $next($request);
        }

        $clientIp = $request->ip();

        // Allow if IP is in whitelist
        if ($whitelist->contains($clientIp)) {
            return $next($request);
        }

        // Allow access to IP management page and logout
        if ($request->routeIs('admin.ip-whitelist.*') || $request->routeIs('logout')) {
            return $next($request);
        }

        // Blocked
        return response()->view('errors.ip-blocked', [
            'ip' => $clientIp,
        ], 403);
    }
}
