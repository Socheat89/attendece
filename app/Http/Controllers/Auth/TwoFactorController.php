<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class TwoFactorController extends Controller
{
    protected Google2FA $google2fa;

    public function __construct()
    {
        $this->google2fa = new Google2FA();
    }

    /** Show 2FA setup page with QR code */
    public function setup()
    {
        $user = auth()->user();

        // Generate a new secret if not already set
        if (! $user->two_factor_secret) {
            $secret = $this->google2fa->generateSecretKey();
            $user->update(['two_factor_secret' => encrypt($secret)]);
        } else {
            $secret = decrypt($user->two_factor_secret);
        }

        $qrCodeUrl = $this->google2fa->getQRCodeUrl(
            config('app.name'),
            $user->email,
            $secret
        );

        // Generate SVG QR code
        $renderer = new ImageRenderer(
            new RendererStyle(200),
            new SvgImageBackEnd()
        );
        $writer = new Writer($renderer);
        $qrSvg = $writer->writeString($qrCodeUrl);

        return view('auth.two-factor.setup', compact('secret', 'qrSvg'));
    }

    /** Enable 2FA after verifying first OTP */
    public function enable(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $user   = auth()->user();
        $secret = decrypt($user->two_factor_secret);

        $valid = $this->google2fa->verifyKey($secret, $request->otp);

        if (! $valid) {
            return back()->withErrors(['otp' => 'Invalid OTP code. Please try again.']);
        }

        $user->update([
            'two_factor_enabled'      => true,
            'two_factor_confirmed_at' => now(),
        ]);

        return redirect()->route('profile.edit')
            ->with('success', '2FA has been enabled on your account! 🔐');
    }

    /** Disable 2FA */
    public function disable(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $user   = auth()->user();
        $secret = decrypt($user->two_factor_secret);

        if (! $this->google2fa->verifyKey($secret, $request->otp)) {
            return back()->withErrors(['otp' => 'Invalid OTP code.']);
        }

        $user->update([
            'two_factor_secret'       => null,
            'two_factor_enabled'      => false,
            'two_factor_confirmed_at' => null,
        ]);

        return redirect()->route('profile.edit')
            ->with('success', '2FA has been disabled.');
    }

    /** Show OTP challenge page (after login) */
    public function challenge()
    {
        if (! session()->has('2fa_user_id')) {
            return redirect()->route('login');
        }

        return view('auth.two-factor.challenge');
    }

    /** Verify OTP on challenge page */
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $userId = session('2fa_user_id');
        if (! $userId) {
            return redirect()->route('login');
        }

        $user   = \App\Models\User::findOrFail($userId);
        $secret = decrypt($user->two_factor_secret);

        if (! $this->google2fa->verifyKey($secret, $request->otp)) {
            return back()->withErrors(['otp' => 'Invalid OTP code. Please try again.']);
        }

        // Complete login
        auth()->login($user);
        session()->forget('2fa_user_id');
        session()->regenerate();

        return redirect()->intended('/dashboard');
    }
}
