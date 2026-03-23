<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class TelegramWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->all();
        
        // Log::info('Telegram Webhook:', $payload); // For debugging if needed

        $message = $payload['message'] ?? null;

        if ($message && isset($message['text'])) {
            $text = $message['text'];
            $chatId = $message['chat']['id'] ?? null;

            if (str_starts_with($text, '/start')) {
                // Examples: "/start A1B2C3D4" or "/start A1B2C3D4@MekongCyberUnit_Bot"
                $parts = explode(' ', $text);
                
                if (count($parts) >= 2) {
                    $token = $parts[1];
                    
                    if (str_contains($token, '@')) {
                        $token = explode('@', $token)[0];
                    }

                    $setting = CompanySetting::where('telegram_connection_token', $token)->first();

                    if ($setting && $chatId) {
                        $setting->telegram_chat_id = (string) $chatId;
                        $setting->telegram_scan_enabled = true;
                        $setting->save();

                        $this->sendMessage($chatId, "✅ ប្រព័ន្ធបានភ្ជាប់ដោយជោគជ័យជាមួយក្រុមហ៊ុន: *" . $setting->company_name . "*។ ទិន្នន័យ Check-in នឹងត្រូវបានផ្ញើមកទីនេះ។");
                    } else {
                        $this->sendMessage($chatId, "❌ បរាជ័យក្នុងការភ្ជាប់។ លេខកូដក្រុមហ៊ុនមិនត្រឹមត្រូវ។");
                    }
                }
            }
        }

        // Return empty 200 OK so Telegram knows we received it
        return response()->json(['status' => 'ok']);
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
