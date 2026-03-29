<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

/**
 * Verifies that incoming POST requests to /api/telegram/webhook
 * genuinely come from Telegram's servers.
 *
 * Two complementary layers:
 *  1. IP allowlist  — Telegram publishes its CIDR ranges; we check them.
 *  2. Secret token  — setWebhook registers a secret header that Telegram
 *                     sends on every call; we verify it.
 *
 * If either check fails the request is silently dropped with 200 OK
 * (so Telegram won't keep retrying on a bad-actor spoof attempt).
 */
class VerifyTelegramWebhook
{
    /**
     * Telegram's published IP ranges (IPv4 + IPv6).
     * Source: https://core.telegram.org/bots/webhooks#the-short-version
     */
    private const TELEGRAM_CIDRS = [
        '149.154.160.0/20',
        '91.108.4.0/22',
        '91.108.8.0/22',
        '91.108.12.0/22',
        '91.108.16.0/22',
        '91.108.56.0/22',
        '185.76.151.0/24',
        '2001:b28:f23d::/48',
        '2001:b28:f23f::/48',
        '2001:67c:4e8::/48',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        // ── Layer 1: IP range check ──────────────────────────────────────────
        $ip = $request->ip();

        if (! $this->isTelegramIp($ip)) {
            Log::warning('[Telegram] Webhook request from unknown IP', ['ip' => $ip]);
            // Return 200 so spoofed sources don't know they're detected
            return response()->json(['ok' => true]);
        }

        // ── Layer 2: Secret-token header check ───────────────────────────────
        $secret = config('services.telegram.webhook_secret');

        if ($secret) {
            $headerToken = $request->header('X-Telegram-Bot-Api-Secret-Token');

            if (! hash_equals($secret, (string) $headerToken)) {
                Log::warning('[Telegram] Webhook secret mismatch', ['ip' => $ip]);
                return response()->json(['ok' => true]);
            }
        }

        return $next($request);
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    private function isTelegramIp(string $ip): bool
    {
        // Local dev: allow localhost & private ranges
        if (app()->environment('local')) {
            if ($ip === '127.0.0.1' || $ip === '::1') {
                return true;
            }
        }

        foreach (self::TELEGRAM_CIDRS as $cidr) {
            if ($this->ipInCidr($ip, $cidr)) {
                return true;
            }
        }

        return false;
    }

    private function ipInCidr(string $ip, string $cidr): bool
    {
        [$subnet, $bits] = explode('/', $cidr);
        $bits = (int) $bits;

        // IPv6
        if (str_contains($cidr, ':')) {
            if (! str_contains($ip, ':')) {
                return false; // different family
            }
            $ipBin     = $this->ipv6ToBits($ip);
            $subnetBin = $this->ipv6ToBits($subnet);
            return substr($ipBin, 0, $bits) === substr($subnetBin, 0, $bits);
        }

        // IPv4
        if (str_contains($ip, ':')) {
            return false; // IPv6 vs IPv4 range
        }
        $ipLong     = ip2long($ip);
        $subnetLong = ip2long($subnet);
        $mask       = ~((1 << (32 - $bits)) - 1);

        return ($ipLong & $mask) === ($subnetLong & $mask);
    }

    private function ipv6ToBits(string $ip): string
    {
        $packed = inet_pton($ip);
        $bits   = '';
        for ($i = 0; $i < strlen($packed); $i++) {
            $bits .= str_pad(decbin(ord($packed[$i])), 8, '0', STR_PAD_LEFT);
        }
        return $bits;
    }
}
