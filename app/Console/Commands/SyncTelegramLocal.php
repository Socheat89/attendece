<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\CompanySetting;

class SyncTelegramLocal extends Command
{
    protected $signature = 'telegram:sync';
    protected $description = 'Manually fetch telegram updates (for localhost testing without webhook)';

    public function handle()
    {
        $botToken = config('services.telegram.bot_token');

        if (!$botToken) {
            $this->error('TELEGRAM_BOT_TOKEN is missing in .env');
            return;
        }

        $this->info("Fetching updates from Telegram...");

        /** @var \Illuminate\Http\Client\Response $response */
        $response = Http::get("https://api.telegram.org/bot{$botToken}/getUpdates");

        if (!$response->successful()) {
            $this->error("Failed to fetch updates.");
            return;
        }

        $updates = $response->json('result') ?? [];
        $connectedCount = 0;

        foreach ($updates as $update) {
            $message = $update['message'] ?? null;
            
            if ($message && isset($message['text'])) {
                $text = $message['text'];
                $chatId = $message['chat']['id'] ?? null;

                if (str_starts_with($text, '/start')) {
                    $parts = explode(' ', $text);
                    
                    if (count($parts) >= 2) {
                        $token = $parts[1];
                        
                        if (str_contains($token, '@')) {
                            $token = explode('@', $token)[0];
                        }

                        $setting = CompanySetting::where('telegram_connection_token', $token)->first();

                        if ($setting && $chatId && $setting->telegram_chat_id !== (string) $chatId) {
                            $setting->telegram_chat_id = (string) $chatId;
                            $setting->telegram_scan_enabled = true;
                            $setting->save();

                            $this->sendMessage($chatId, "✅ ភ្ជាប់ដោយជោគជ័យតាមរយៈការ Sync Local! Company: *" . $setting->company_name . "*");
                            $this->info("Linked Chat ID {$chatId} to Company: {$setting->company_name}");
                            $connectedCount++;
                        }
                    }
                }
            }
        }

        if ($connectedCount > 0) {
            $this->info("Successfully processed {$connectedCount} new connections.");
        } else {
            $this->info("No new webhook connections found. Make sure to click the new button in UI first!");
        }
    }

    private function sendMessage($chatId, $text)
    {
        $botToken = config('services.telegram.bot_token');
        if (!$botToken) return;

        Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'Markdown',
        ]);
    }
}
