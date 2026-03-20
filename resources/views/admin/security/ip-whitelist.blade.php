<x-layouts.admin>
    <div class="space-y-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">🌐 {{ __('IP Whitelist') }}</h1>
            <p class="text-sm text-slate-500 mt-1">{{ __('Restrict access to specific IP addresses only. Leave empty to allow all IPs.') }}</p>
        </div>

        {{-- Current IP notice --}}
        <div class="flex items-start gap-3 bg-blue-50 border border-blue-200 rounded-2xl p-4">
            <i class="fa-solid fa-circle-info text-blue-500 mt-0.5"></i>
            <p class="text-sm text-blue-700">
                {{ __('Your current IP address is') }}:
                <strong class="font-mono bg-white px-2 py-0.5 rounded-lg border border-blue-200 ml-1">{{ $currentIp }}</strong>
                <span class="ml-2 text-blue-500 text-xs">({{ __('Make sure to whitelist it before saving!') }})</span>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Add IP Form --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                    <h3 class="text-base font-bold text-slate-800 mb-5">{{ __('Add IP Address') }}</h3>
                    <form method="POST" action="{{ route('admin.security.ip-whitelist.store') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('IP Address') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="ip_address" value="{{ old('ip_address') }}" required
                                placeholder="e.g. 192.168.1.100"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-blue-400">
                            @error('ip_address') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Label / Description') }}</label>
                            <input type="text" name="label" value="{{ old('label') }}"
                                placeholder="{{ __('e.g. Office WiFi') }}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <button type="submit"
                            class="w-full px-4 py-2.5 rounded-xl bg-blue-600 text-white text-sm font-bold hover:bg-blue-700 transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-plus"></i> {{ __('Add IP') }}
                        </button>
                    </form>

                    {{-- Quick add current IP --}}
                    <form method="POST" action="{{ route('admin.security.ip-whitelist.store') }}" class="mt-3">
                        @csrf
                        <input type="hidden" name="ip_address" value="{{ $currentIp }}">
                        <input type="hidden" name="label" value="My Current IP">
                        <button type="submit"
                            class="w-full px-4 py-2.5 rounded-xl border border-green-200 bg-green-50 text-green-700 text-sm font-bold hover:bg-green-100 transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-location-crosshairs"></i> {{ __('Add My Current IP') }}
                        </button>
                    </form>
                </div>
            </div>

            {{-- IP List --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="font-bold text-slate-800">{{ __('Whitelisted IPs') }}</h3>
                        <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-bold">{{ $ips->count() }} {{ __('total') }}</span>
                    </div>
                    @forelse($ips as $ip)
                        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-50 last:border-0 hover:bg-slate-50 transition">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl {{ $ip->is_active ? 'bg-green-100' : 'bg-slate-100' }} flex items-center justify-center">
                                    <i class="fa-solid fa-network-wired text-sm {{ $ip->is_active ? 'text-green-600' : 'text-slate-400' }}"></i>
                                </div>
                                <div>
                                    <p class="font-mono font-semibold text-slate-800 text-sm">{{ $ip->ip_address }}</p>
                                    <p class="text-xs text-slate-400">{{ $ip->label ?? __('No label') }} · {{ $ip->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                @if($ip->ip_address === $currentIp)
                                    <span class="px-2 py-0.5 rounded-full bg-blue-100 text-blue-600 text-xs font-bold">{{ __('You') }}</span>
                                @endif
                                <span class="px-2 py-0.5 rounded-full text-xs font-bold {{ $ip->is_active ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $ip->is_active ? __('Active') : __('Disabled') }}
                                </span>
                                <form method="POST" action="{{ route('admin.security.ip-whitelist.toggle', $ip) }}">
                                    @csrf @method('PATCH')
                                    <button type="submit" title="{{ __('Toggle') }}"
                                        class="p-2 text-slate-400 hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition">
                                        <i class="fa-solid fa-power-off text-sm"></i>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.security.ip-whitelist.destroy', $ip) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" title="{{ __('Delete') }}"
                                        onclick="return confirm('Remove this IP?')"
                                        class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
                                        <i class="fa-solid fa-trash text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="py-16 text-center text-slate-400">
                            <i class="fa-solid fa-shield-halved text-3xl mb-3 block opacity-30"></i>
                            <p class="text-sm font-medium">{{ __('No IP restrictions set. All IPs are currently allowed.') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
