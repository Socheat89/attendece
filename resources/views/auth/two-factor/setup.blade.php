<x-layouts.admin>
    <div class="max-w-2xl mx-auto space-y-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">🔐 {{ __('Two-Factor Authentication Setup') }}</h1>
            <p class="text-sm text-slate-500 mt-1">{{ __('Secure your account with Google Authenticator.') }}</p>
        </div>

        @if(auth()->user()->two_factor_enabled)
            {{-- 2FA Enabled State --}}
            <div class="bg-green-50 border border-green-200 rounded-2xl p-6 flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-shield-check text-2xl text-green-600"></i>
                </div>
                <div>
                    <h3 class="font-bold text-green-800">{{ __('2FA is Active') }} ✅</h3>
                    <p class="text-sm text-green-700 mt-1">{{ __('Your account is protected with two-factor authentication.') }}</p>
                    <p class="text-xs text-green-600 mt-1">{{ __('Enabled since') }}: {{ auth()->user()->two_factor_confirmed_at?->format('d M Y H:i') }}</p>
                </div>
            </div>

            {{-- Disable 2FA --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <h3 class="font-bold text-slate-800 mb-4">{{ __('Disable Two-Factor Authentication') }}</h3>
                <p class="text-sm text-slate-500 mb-4">{{ __('Enter your current OTP code to disable 2FA.') }}</p>
                <form method="POST" action="{{ route('two-factor.disable') }}" class="flex gap-3">
                    @csrf
                    <input type="text" name="otp" required maxlength="6" minlength="6" placeholder="000000"
                        class="flex-1 rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-mono font-bold tracking-widest text-center focus:outline-none focus:ring-2 focus:ring-red-400">
                    <button type="submit"
                        onclick="return confirm('Disable 2FA? Your account will be less secure.')"
                        class="px-5 py-2.5 rounded-xl bg-red-600 text-white text-sm font-bold hover:bg-red-700 transition">
                        {{ __('Disable 2FA') }}
                    </button>
                </form>
                @error('otp') <p class="text-xs text-red-500 mt-2">{{ $message }}</p> @enderror
            </div>

        @else
            {{-- Setup Steps --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- QR Code --}}
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col items-center">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center mb-4">
                        <span class="text-blue-600 font-bold text-lg">1</span>
                    </div>
                    <h3 class="font-bold text-slate-800 mb-2 text-center">{{ __('Scan QR Code') }}</h3>
                    <p class="text-xs text-slate-500 mb-5 text-center">{{ __('Open Google Authenticator and scan this QR code.') }}</p>

                    {{-- QR SVG --}}
                    <div class="p-4 bg-white border-2 border-slate-200 rounded-2xl inline-block shadow-inner">
                        {!! $qrSvg !!}
                    </div>

                    <p class="text-xs text-slate-400 mt-4">{{ __('Or enter manually:') }}</p>
                    <code class="mt-1 px-3 py-1.5 bg-slate-100 rounded-lg text-xs font-mono text-slate-700 tracking-widest select-all">{{ $secret }}</code>
                </div>

                {{-- Verify OTP --}}
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center mb-4">
                        <span class="text-blue-600 font-bold text-lg">2</span>
                    </div>
                    <h3 class="font-bold text-slate-800 mb-2">{{ __('Verify & Enable') }}</h3>
                    <p class="text-xs text-slate-500 mb-5">{{ __('Enter the 6-digit code shown in your authenticator app to confirm setup.') }}</p>

                    <form method="POST" action="{{ route('two-factor.enable') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('OTP Code') }}</label>
                            <input type="text" name="otp" required maxlength="6" minlength="6"
                                placeholder="000000" autofocus autocomplete="off"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-xl font-mono font-bold text-center tracking-widest focus:outline-none focus:ring-2 focus:ring-blue-400 {{ $errors->has('otp') ? 'border-red-400' : '' }}">
                            @error('otp') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <button type="submit"
                            class="w-full py-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-bold shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2">
                            <i class="fa-solid fa-lock"></i> {{ __('Enable 2FA') }}
                        </button>
                    </form>

                    <div class="mt-6 bg-amber-50 border border-amber-200 rounded-xl p-4">
                        <p class="text-xs font-semibold text-amber-800 mb-1"><i class="fa-solid fa-triangle-exclamation mr-1"></i>{{ __('Important') }}</p>
                        <p class="text-xs text-amber-700">{{ __('Once enabled, you will need to enter this code every time you log in.') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-layouts.admin>
