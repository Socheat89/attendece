<?php

namespace App\Http\Controllers\Saas;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegistrationController extends Controller
{
    public function pricing()
    {
        $plans = SubscriptionPlan::where('is_active', true)->orderBy('price')->get();
        return view('saas.pricing', compact('plans'));
    }

    /**
     * Show checkout mockup before registration for paid plans.
     */
    public function checkout(SubscriptionPlan $plan)
    {
        if (!$plan->is_active) {
            abort(404, 'This plan is not available.');
        }

        if ($plan->price <= 0) {
            return redirect()->route('register.company', $plan->id);
        }

        return view('saas.checkout', compact('plan'));
    }

    /**
     * Handle payment notification
     */
    public function notifyPayment(Request $request, SubscriptionPlan $plan)
    {
        $botToken = config('telegram.bot_token');
        $chatId = config('telegram.chat_id');
        $method = $request->input('method', 'Unknown');
        $name = $request->input('name', 'Unknown User');
        $contact = $request->input('contact', 'No Contact');
        $months = $request->input('months', 1);
        $amount = $request->input('total_amount', number_format($plan->price, 2));
        $token = \Illuminate\Support\Str::random(40);

        \App\Models\PaymentRequest::create([
            'name' => $name,
            'contact' => $contact,
            'subscription_plan_id' => $plan->id,
            'method' => $method,
            'status' => 'pending',
            'access_token' => $token,
            'months' => $months,
            'amount' => $amount,
        ]);

        if ($botToken && $chatId) {
            $message = "🔔 *New Registration Payment*\n\n";
            $message .= "🏢 *Business:* {$name}\n";
            $message .= "💰 *Amount:* \${$amount}\n";
            $message .= "📦 *Plan:* {$plan->name}\n";
            $message .= "⏳ *Duration:* {$months} Months\n";
            $message .= "💳 *Method:* {$method}\n";
            $message .= "🔑 *Ref:* `{$token}`\n";
            $message .= "⏰ *Time:* " . now()->format('Y-m-d H:i:s') . "\n\n";
            $message .= "Please verify and approve this transaction.";

            $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

            $keyboard = [
                'inline_keyboard' => [
                    [
                        ['text' => '✅ Approve', 'callback_data' => 'approve_'.$token],
                        ['text' => '❌ Reject', 'callback_data' => 'reject_'.$token]
                    ]
                ]
            ];

            try {
                \Illuminate\Support\Facades\Http::withoutVerifying()->post($url, [
                    'chat_id' => $chatId,
                    'text' => $message,
                    'parse_mode' => 'Markdown',
                    'reply_markup' => $keyboard
                ]);
            } catch (\Exception $e) {
                // Ignore API failure for mockup
            }
        }

        return response()->json(['success' => true, 'token' => $token]);
    }

    /**
     * Poll Payment Status from Telegram
     */
    public function checkPaymentStatus(Request $request, SubscriptionPlan $plan, $token)
    {
        $botToken = config('telegram.bot_token');
        
        $paymentRequest = \App\Models\PaymentRequest::where('access_token', $token)
            ->where('subscription_plan_id', $plan->id)
            ->first();

        if (!$paymentRequest) {
            return response()->json(['status' => 'not_found']);
        }

        // If not pending, it was already decided
        if ($paymentRequest->status !== 'pending') {
            return response()->json(['status' => $paymentRequest->status]);
        }

        // Only poll Telegram if still pending
        if ($botToken) {
            try {
                $url = "https://api.telegram.org/bot{$botToken}/getUpdates";
                $response = \Illuminate\Support\Facades\Http::withoutVerifying()->get($url, [
                    'allowed_updates' => ['callback_query']
                ]);
                
                if ($response->successful()) {
                    $updates = $response->json('result') ?? [];
                    
                    foreach ($updates as $update) {
                        if (isset($update['callback_query'])) {
                            $cb = $update['callback_query'];
                            $data = $cb['data'] ?? '';
                            
                            $parts = explode('_', $data, 2);
                            if (count($parts) === 2 && $parts[1] === $token && in_array($parts[0], ['approve', 'reject'])) {
                                $newStatus = ($parts[0] === 'approve') ? 'approved' : 'rejected';
                                $paymentRequest->update(['status' => $newStatus]);
                                
                                // Acknowledge button click
                                \Illuminate\Support\Facades\Http::withoutVerifying()->post("https://api.telegram.org/bot{$botToken}/answerCallbackQuery", [
                                    'callback_query_id' => $cb['id'],
                                    'text' => "Request " . ucfirst($newStatus) . "!"
                                ]);

                                // Edit the orginal message to remove buttons and show completion
                                $msgId = $cb['message']['message_id'] ?? null;
                                $chatId = $cb['message']['chat']['id'] ?? null;
                                if ($msgId && $chatId) {
                                    $emoji = $newStatus === 'approved' ? '✅' : '❌';
                                    \Illuminate\Support\Facades\Http::withoutVerifying()->post("https://api.telegram.org/bot{$botToken}/editMessageText", [
                                        'chat_id' => $chatId,
                                        'message_id' => $msgId,
                                        'text' => $cb['message']['text'] . "\n\n{$emoji} *Decision:* " . ucfirst($newStatus),
                                        'parse_mode' => 'Markdown'
                                    ]);
                                }

                                // Offset the getUpdates so we don't process it again next time
                                $offsetId = $update['update_id'] + 1;
                                \Illuminate\Support\Facades\Http::withoutVerifying()->get($url, ['offset' => $offsetId]);

                                return response()->json(['status' => $newStatus]);
                            }
                        }
                    }
                }
            } catch (\Exception $e) {
                // Ignore silent API loop errors
            }
        }

        return response()->json(['status' => $paymentRequest->fresh()->status]);
    }

    /**
     * Show the company registration form for a specific plan.
     */
    public function register(SubscriptionPlan $plan)
    {
        if (!$plan->is_active) {
            abort(404, 'This plan is not available.');
        }

        // Only require payment check if plan is not free
        if ($plan->price > 0) {
            $token = request()->query('token');
            if (!$token) {
                // If they have no token, deny access and maybe offer contact
                abort(403, 'Unauthorized. Please complete payment or wait for your approval link.');
            }

            $paymentRequest = \App\Models\PaymentRequest::where('access_token', $token)
                ->where('subscription_plan_id', $plan->id)
                ->first();

            if (!$paymentRequest) {
                abort(403, 'Invalid or expired approval link.');
            }
        }

        return view('saas.register', compact('plan'));
    }

    /**
     * Handle incoming registration request.
     */
    public function store(Request $request, SubscriptionPlan $plan)
    {
        if (!$plan->is_active) {
            return back()->with('error', 'The selected plan is currently unavailable.');
        }

        $request->validate([
            // Company Validations
            'company_name' => ['required', 'string', 'max:255', 'unique:companies,name'],
            'company_email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:500'],
            // Admin User Validations
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            DB::beginTransaction();

            // 1. Create the Company with the selected Plan
            // Setting expiry date based on plan and billing cycle
            $billingCycle = $request->input('billing_cycle', 'monthly');
            
            if ($plan->price <= 0) {
                // Free/Trial plan: 7 days as requested
                $expiryDate = now()->addDays(7);
                $billingCycle = 'trial';
            } else {
                // Paid plans - Check if we have a payment request status
                $paymentRequest = null;
                if ($request->query('token')) {
                    $paymentRequest = \App\Models\PaymentRequest::where('access_token', $request->query('token'))->first();
                }

                if ($paymentRequest) {
                    $months = $paymentRequest->months ?? 1;
                    $expiryDate = now()->addMonths($months);
                    $billingCycle = ($months >= 12) ? 'yearly' : 'monthly';
                } else {
                    if ($billingCycle === 'yearly') {
                        $expiryDate = now()->addYear();
                    } else {
                        $expiryDate = now()->addMonth();
                        $billingCycle = 'monthly';
                    }
                }
            }
            
            // For a newly registered company, TenantScope is not yet active since no user is logged in.
            // We use Company::withoutGlobalScopes() just to be safe, though not strictly required manually.
            $company = Company::create([
                'name' => $request->company_name,
                'email' => $request->company_email,
                'phone' => $request->phone,
                'address' => $request->address,
                'subscription_plan_id' => $plan->id,
                'billing_cycle' => $billingCycle,
                'status' => 'active',
                'expiry_date' => $expiryDate,
            ]);

            // 2. Create the Primary Admin User for this Company
            $user = User::create([
                'company_id' => $company->id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(),
                'is_active' => true,
            ]);

            // Optional: Assign Spatie role "Super Admin" (within the company, typically 'Admin' or 'Super Admin' but bounded by TenantScope later)
            // You might need a seeder that ensures roles exist per company, or globally.
            // For now, we assume roles are global and we assign 'Admin / HR' or similar.
            // If roles don't exist yet, we should wrap this in a try-catch or ensure standard roles are created during registration.
            try {
               $user->assignRole('Super Admin'); 
               // Note: This 'Super Admin' is the Company's owner, not the global SaaS Super Admin.
               // Adjust role name based on your spatie/roles setup.
            } catch (\Exception $e) {
                // Ignore if role doesn't exist
            }

            // 3. Initialize default settings for the company
            \App\Models\CompanySetting::create([
                'company_id' => $company->id,
                'company_name' => $company->name,
                'timezone' => 'Asia/Phnom_Penh',
                'currency' => 'USD',
                'current_plan_name' => $plan->name,
            ]);

            DB::commit();

            // Log the new user in
            Auth::login($user);

            // Clear UI settings cache to ensure it's reloaded for the new tenant
            \Illuminate\Support\Facades\Cache::forget('ui_company_setting_' . $company->id);

            // Invalidate the payment access token if they used one
            if ($plan->price > 0 && request()->query('token')) {
                \App\Models\PaymentRequest::where('access_token', request()->query('token'))
                    ->update([
                        'status' => 'approved_and_used',
                        'access_token' => null // Prevent reuse
                    ]);
            }

            return redirect()->route('dashboard')->with('success', 'Your company workspace has been created successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Registration failed. Please try again. Error: ' . $e->getMessage());
        }
    }
}
