<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetTelegramWebhookCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:set-webhook {url}';

    protected $description = 'Set the Telegram Webhook URL globally';

    public function handle()
    {
        $url = rtrim($this->argument('url'), '/') . '/api/telegram/webhook';
        $botToken = config('services.telegram.bot_token');

        if (!$botToken) {
            $this->error('TELEGRAM_BOT_TOKEN is missing in .env');
            return;
        }

        /** @var \Illuminate\Http\Client\Response $response */
        $response = \Illuminate\Support\Facades\Http::post("https://api.telegram.org/bot{$botToken}/setWebhook", [
            'url' => $url,
        ]);

        if ($response->successful() && current($response->json()) === true) {
            $this->info("Webhook registered successfully at: {$url}");
        } else {
            $this->error("Failed to set webhook:");
            $this->error((string) $response->body());
        }
    }
}
