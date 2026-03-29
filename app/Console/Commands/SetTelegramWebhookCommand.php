<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SetTelegramWebhookCommand extends Command
{
    protected $signature = 'telegram:set-webhook {url}';

    protected $description = 'Register the Telegram Webhook URL with IP validation + secret token';

    public function handle(): void
    {
        $url      = rtrim($this->argument('url'), '/') . '/api/telegram/webhook';
        $botToken = config('services.telegram.bot_token');
        $secret   = config('services.telegram.webhook_secret');

        if (! $botToken) {
            $this->error('TELEGRAM_BOT_TOKEN is missing in .env');
            return;
        }

        $payload = ['url' => $url];

        if ($secret) {
            // Only alphanumeric + hyphen/underscore, 1–256 chars (Telegram requirement)
            $payload['secret_token'] = substr(preg_replace('/[^A-Za-z0-9\-_]/', '_', $secret), 0, 256);
            $this->info("Secret token will be registered.");
        }

        /** @var \Illuminate\Http\Client\Response $response */
        $response = Http::post("https://api.telegram.org/bot{$botToken}/setWebhook", $payload);

        if ($response->successful() && ($response->json('ok') === true)) {
            $this->info("✅ Webhook registered successfully at: {$url}");
        } else {
            $this->error("❌ Failed to set webhook:");
            $this->error((string) $response->body());
        }
    }
}
