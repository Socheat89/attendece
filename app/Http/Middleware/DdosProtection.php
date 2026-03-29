<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

/**
 * DDoS / Brute-force protection middleware.
 *
 * Layer 1 — Global rate limit:  300 req / 60s per IP  (flood protection)
 * Layer 2 — Sensitive endpoints: 30 req / 60s per IP  (login, register, API scan)
 * Layer 3 — Sustained abuse block: IP banned for 10 min after 3 consecutive violations
 *
 * Uses file cache (no Redis dependency), progressive back-off,
 * and logs every block event for admin review.
 */
class DdosProtection
{
    // ── Tuneable constants ────────────────────────────────────────────────────
    private const GLOBAL_MAX      = 300;  // requests per window
    private const GLOBAL_WINDOW   = 60;   // seconds
    private const SENSITIVE_MAX   = 30;   // requests per window
    private const SENSITIVE_WINDOW = 60;  // seconds
    private const BAN_THRESHOLD   = 3;    // violations before temp-ban
    private const BAN_DURATION    = 600;  // seconds (10 min)

    // Routes that get the tighter limit
    private const SENSITIVE_PATTERNS = [
        'login', 'register', 'password',
        'two-factor', 'checkout', 'attendance/scan',
        'api/', 'telegram',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip() ?? '0.0.0.0';

        // ── Layer 3: check temp-ban first (cheapest check) ────────────────────
        if (Cache::has("ddos_ban_{$ip}")) {
            $remaining = Cache::get("ddos_ban_ttl_{$ip}", self::BAN_DURATION);
            return $this->blocked($ip, $remaining);
        }

        $path      = strtolower($request->path());
        $sensitive = $this->isSensitive($path);

        if ($sensitive) {
            [$max, $window] = [self::SENSITIVE_MAX, self::SENSITIVE_WINDOW];
            $key = "ddos_sens_{$ip}";
        } else {
            [$max, $window] = [self::GLOBAL_MAX, self::GLOBAL_WINDOW];
            $key = "ddos_glob_{$ip}";
        }

        // ── Atomic increment ──────────────────────────────────────────────────
        $count = Cache::get($key, 0);

        if ($count === 0) {
            Cache::put($key, 1, $window);
        } else {
            Cache::increment($key);
            $count++;
        }

        // ── Over limit? ───────────────────────────────────────────────────────
        if ($count > $max) {
            $violations = Cache::increment("ddos_viol_{$ip}");

            if ($violations >= self::BAN_THRESHOLD) {
                // Temp-ban the IP
                Cache::put("ddos_ban_{$ip}", true, self::BAN_DURATION);
                Cache::put("ddos_ban_ttl_{$ip}", self::BAN_DURATION, self::BAN_DURATION);
                Cache::forget("ddos_viol_{$ip}");

                Log::warning('[DDoS] IP temp-banned', [
                    'ip'   => $ip,
                    'path' => $request->path(),
                    'ua'   => $request->userAgent(),
                ]);

                return $this->blocked($ip, self::BAN_DURATION);
            }

            Log::notice('[DDoS] Rate limit exceeded', [
                'ip'         => $ip,
                'count'      => $count,
                'limit'      => $max,
                'sensitive'  => $sensitive,
                'path'       => $request->path(),
            ]);

            return response()->json([
                'message'     => 'Too many requests. Please slow down.',
                'retry_after' => $window,
            ], 429)->withHeaders([
                'Retry-After'         => $window,
                'X-RateLimit-Limit'   => $max,
                'X-RateLimit-Reset'   => time() + $window,
            ]);
        }

        $response = $next($request);

        // Inject rate-limit headers so client can self-throttle
        $response->headers->set('X-RateLimit-Limit',     $max);
        $response->headers->set('X-RateLimit-Remaining', max(0, $max - $count));

        return $response;
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    private function isSensitive(string $path): bool
    {
        foreach (self::SENSITIVE_PATTERNS as $pattern) {
            if (str_contains($path, $pattern)) {
                return true;
            }
        }
        return false;
    }

    private function blocked(string $ip, int $seconds): Response
    {
        $minutes = ceil($seconds / 60);
        return response()->view('errors.429', [
            'ip'      => $ip,
            'minutes' => $minutes,
        ], 429)->withHeaders([
            'Retry-After' => $seconds,
        ]);
    }
}
