<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Injects HTTP security headers on every response.
 * These headers defend against XSS, clickjacking, MIME sniffing,
 * information leakage, and protocol-downgrade attacks.
 */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Prevent browser from guessing content type (MIME sniffing)
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Block page from being embedded in <iframe> (clickjacking)
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // Enable browser XSS filter (legacy, still useful for older browsers)
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Force HTTPS for 1 year and include subdomains (production only)
        if (app()->environment('production')) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        // Stop Referer leakage to external sites
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Permissions policy — disable features we don't need
        $response->headers->set(
            'Permissions-Policy',
            'geolocation=(self), camera=(), microphone=(), payment=(), usb=()'
        );

        // Content Security Policy — restrict resource origins
        $csp = implode('; ', [
            "default-src 'self'",
            // Scripts: allow CDNs used by Leaflet map + app
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://unpkg.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://fonts.googleapis.com",
            // Styles: allow CDNs + Leaflet on unpkg
            "style-src 'self' 'unsafe-inline' https://unpkg.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://fonts.googleapis.com",
            // Fonts
            "font-src 'self' data: https://cdnjs.cloudflare.com https://fonts.gstatic.com",
            // Images: allow map tiles (CartoDB, OpenStreetMap) + data URIs + blobs
            "img-src 'self' data: blob: https: https://*.basemaps.cartocdn.com https://*.cartocdn.com https://*.tile.openstreetmap.org https://unpkg.com",
            // Fetch/XHR: allow tile servers + own API
            "connect-src 'self' https://*.basemaps.cartocdn.com https://*.cartocdn.com https://*.tile.openstreetmap.org",
            "frame-ancestors 'self'",
            "base-uri 'self'",
            "form-action 'self'",
        ]);
        $response->headers->set('Content-Security-Policy', $csp);

        // Remove server signature (don't reveal PHP / web server version)
        $response->headers->remove('X-Powered-By');
        $response->headers->remove('Server');

        return $response;
    }
}
