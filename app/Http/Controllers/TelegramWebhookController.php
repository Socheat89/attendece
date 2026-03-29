<?php

namespace App\Http\Controllers;

use App\Models\CompanySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramWebhookController extends Controller
{
    /** Max /start attempts per chat per hour (prevents token brute-force) */
    private const START_RATE_LIMIT  = 10;
    private const START_RATE_WINDOW = 3600; // 1 hour

    public function handle(Request $request): \Illuminate\Http\JsonResponse
    {
        $payload = $request->input();

        $message = $payload['message'] ?? null;

        if ($message && isset($message['text'])) {
            $text   = (string) $message['text'];
            $chatId = $message['chat']['id'] ?? null;

            if ($chatId && str_starts_with($text, '/start')) {
                $this->handleStart($text, (int) $chatId);
            }
        }

        // Always return 200 — Telegram will retry non-200 responses indefinitely
        return response()->json(['ok' => true]);
    }

    // ── Handlers ──────────────────────────────────────────────────────────────

    private function handleStart(string $text, int $chatId): void
    {
        // ── Rate limit per chat (prevent token brute-force) ───────────────────
        $rateCacheKey = "tg_start_rate_{$chatId}";
        $attempts     = (int) Cache::get($rateCacheKey, 0);

        if ($attempts >= self::START_RATE_LIMIT) {
            Log::notice('[Telegram] /start rate limit hit', ['chat_id' => $chatId]);
            $this->sendMessage($chatId, '⏳ Too many attempts. Please wait 1 hour before trying again.');
            return;
        }

        Cache::put($rateCacheKey, $attempts + 1, self::START_RATE_WINDOW);

        // ── Parse & sanitize token ────────────────────────────────────────────
        $parts = explode(' ', $text, 3);
        if (count($parts) < 2) {
            return; // bare /start with no token — ignore silently
        }

        $rawToken = $parts[1];

        // Strip bot username suffix e.g. "A1B2C3@MyBot" → "A1B2C3"
        if (str_contains($rawToken, '@')) {
            $rawToken = explode('@', $rawToken)[0];
        }

        // Allow only alphanumeric + hyphen/underscore (≤ 64 chars)
        $token = preg_replace('/[^A-Za-z0-9\-_]/', '', $rawToken);
        $token = substr($token, 0, 64);

        if (strlen($token) < 6) {
            $this->sendMessage($chatId, '❌ Invalid connection code.');
            return;
        }

        // ── DB lookup ─────────────────────────────────────────────────────────
        $setting = CompanySetting::where('telegram_connection_token', $token)->first();

        if (! $setting) {
            // Always respond after same simulated delay to prevent timing attacks
            usleep(random_int(80_000, 150_000));
            $this->sendMessage($chatId, '❌ Invalid connection code. Please check and try again.');
            return;
        }

        // ── Connect ───────────────────────────────────────────────────────────
        $setting->telegram_chat_id      = (string) $chatId;
        $setting->telegram_scan_enabled = true;
        $setting->save();

        Log::info('[Telegram] Group connected', [
            'company_id' => $setting->company_id,
            'chat_id'    => $chatId,
        ]);

        $this->sendMessage(
            $chatId,
            "✅ Connected successfully to *" . e($setting->company_name) . "*.\nAttendance scan data will be sent here."
        );
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    private function sendMessage(int $chatId, string $text): void
    {
        $botToken = config('services.telegram.bot_token');

        if (! $botToken) {
            Log::error('[Telegram] Bot token not configured');
            return;
        }

        try {
            $res = Http::asForm()
                ->timeout(8)
                ->post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                    'chat_id'    => $chatId,
                    'text'       => $text,
                    'parse_mode' => 'Markdown',
                ]);
            $res->throw();
        } catch (\Throwable $e) {
            Log::warning('[Telegram] Failed to send message', [
                'chat_id' => $chatId,
                'error'   => $e->getMessage(),
            ]);
        }
    }
}

