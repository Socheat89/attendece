<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Header Section with Animated Background Glow -->
        <div class="relative overflow-hidden bg-white rounded-[40px] border border-slate-100 shadow-2xl shadow-slate-200/50 p-8 md:p-12 mb-4">
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-8">
                <div class="space-y-3">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-[10px] font-black uppercase tracking-wider">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                        </span>
                        {{ __('Security Center') }}
                    </div>
                    <h2 class="text-4xl font-black text-slate-900 tracking-tight leading-tight">
                        {{ __('Account Settings.') }}
                    </h2>
                    <p class="text-slate-500 font-medium max-w-xl text-lg leading-relaxed">
                        {{ __('Fine-tune your personal experience, secure your credentials, and manage your digital workspace.') }}
                    </p>
                </div>
                
                <div class="flex-shrink-0">
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-[28px] blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                        <div class="relative w-24 h-24 rounded-[24px] bg-white shadow-xl flex items-center justify-center text-blue-600 border border-slate-100 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff&size=128" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('status') === 'profile-updated' || session('status') === 'password-updated')
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                 class="bg-emerald-500 text-white px-8 py-4 rounded-[24px] flex items-center gap-4 shadow-xl shadow-emerald-200 animate-in fade-in slide-in-from-top-4 duration-500">
                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                    <i class="fa-solid fa-check text-xl"></i>
                </div>
                <div>
                    <p class="font-bold">Configuration Updated</p>
                    <p class="text-xs text-white/80">Your changes have been synchronized successfully across the system.</p>
                </div>
                <button @click="show = false" class="ml-auto hover:scale-110 transition-transform">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Sidebar Navigation (Desktop/Responsive) -->
            <div class="lg:col-span-4 space-y-4" x-data="{ open: false }">
                <!-- mobile toggle -->
                <div class="lg:hidden flex justify-end">
                    <button @click="open = !open" class="p-2 rounded-md bg-blue-600 text-white focus:outline-none">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>

                <nav :class="open ? 'block' : 'hidden lg:block'" class="sticky top-10 space-y-2 p-2 bg-white/50 backdrop-blur-xl rounded-[32px] border border-white shadow-inner">
                    <button @click="document.getElementById('profile-info').scrollIntoView({behavior: 'smooth'}); open = false" class="w-full flex items-center gap-4 p-4 rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-200 transition-all font-bold text-sm">
                        <i class="fa-solid fa-user-gear w-5"></i>
                        {{ __('Profile Details') }}
                    </button>
                    <button @click="document.getElementById('security').scrollIntoView({behavior: 'smooth'}); open = false" class="w-full flex items-center gap-4 p-4 rounded-2xl text-slate-500 hover:bg-slate-100 transition-all font-bold text-sm">
                        <i class="fa-solid fa-shield-halved w-5"></i>
                        {{ __('Security & Login') }}
                    </button>
                    <button @click="document.getElementById('danger-zone').scrollIntoView({behavior: 'smooth'}); open = false" class="w-full flex items-center gap-4 p-4 rounded-2xl text-red-500 hover:bg-red-50 transition-all font-bold text-sm">
                        <i class="fa-solid fa-trash-can w-5"></i>
                        {{ __('Termination') }}
                    </button>
                </nav>

                <div class="p-6 bg-gradient-to-br from-slate-900 to-slate-800 rounded-[32px] text-white shadow-2xl relative overflow-hidden group">
                    <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-blue-500/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-1000"></div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">{{ __('Workspace Info') }}</p>
                    <div class="space-y-4 relative z-10">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-xs">
                                <i class="fa-solid fa-building"></i>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">{{ __('Company') }}</p>
                                <p class="text-sm font-bold">{{ $uiCompanySetting->company_name ?? 'HRM Portal' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-xs">
                                <i class="fa-solid fa-user-tag"></i>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">{{ __('Role') }}</p>
                                <p class="text-sm font-bold">{{ Auth::user()->roles->pluck('name')->first() ?? 'Employee' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-8 space-y-10">
                
                <!-- Personal Info Card -->
                <div id="profile-info" class="bg-white rounded-[40px] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/20 group hover:shadow-2xl transition-all duration-500">
                    <div class="bg-slate-50 px-10 py-8 border-b border-slate-100 flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div class="w-14 h-14 rounded-2xl bg-white shadow-lg flex items-center justify-center text-blue-600 group-hover:scale-110 transition-transform duration-500">
                                <i class="fa-solid fa-address-card text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-slate-900 tracking-tight">{{ __('Personal Profile') }}</h3>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-[0.15em] mt-1">{{ __('Basic identification details') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-10">
                        <form method="POST" action="{{ route('profile.update') }}" class="space-y-8">
                            @csrf
                            @method('PATCH')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-2">
                                    <x-input-label for="name" :value="__('Display Name')" />
                                    <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" />
                                </div>

                                <div class="space-y-2">
                                    <x-input-label for="email" :value="__('Work Email Address')" />
                                    <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" />
                                </div>

                                <div class="md:col-span-2 space-y-2">
                                    <x-input-label for="phone" :value="__('Personal Phone Number')" />
                                    <x-text-input id="phone" name="phone" type="text" :value="old('phone', $user->phone)" placeholder="e.g. +855 12 345 678" />
                                    <x-input-error :messages="$errors->get('phone')" />
                                </div>
                            </div>

                            <div class="pt-4 border-t border-slate-50 flex items-center justify-end">
                                <x-primary-button class="px-10 py-4 rounded-2xl shadow-blue-200 group-hover:scale-[1.02] transition-transform">
                                    <i class="fa-solid fa-cloud-arrow-up mr-2"></i>
                                    {{ __('Save Changes') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Security Credentials Card -->
                <div id="security" class="bg-white rounded-[40px] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/20 group hover:shadow-2xl transition-all duration-500">
                    <div class="bg-emerald-50/50 px-10 py-8 border-b border-emerald-100 flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div class="w-14 h-14 rounded-2xl bg-white shadow-lg flex items-center justify-center text-emerald-600 group-hover:scale-110 transition-transform duration-500">
                                <i class="fa-solid fa-shield-halved text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-slate-900 tracking-tight">{{ __('Security & Login') }}</h3>
                                <p class="text-xs font-bold text-emerald-600/60 uppercase tracking-[0.15em] mt-1">{{ __('Authentication Management') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-10">
                        <form method="POST" action="{{ route('password.update') }}" class="space-y-8">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 gap-8">
                                <div class="space-y-2">
                                    <x-input-label for="current_password" :value="__('Current Authentication Key')" />
                                    <x-text-input id="current_password" name="current_password" type="password" autocomplete="current-password" placeholder="••••••••" />
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" />
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div class="space-y-2">
                                        <x-input-label for="password" :value="__('New Security Password')" />
                                        <x-text-input id="password" name="password" type="password" autocomplete="new-password" placeholder="••••••••" />
                                        <x-input-error :messages="$errors->updatePassword->get('password')" />
                                    </div>

                                    <div class="space-y-2">
                                        <x-input-label for="password_confirmation" :value="__('Verify New Credentials')" />
                                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" placeholder="••••••••" />
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-slate-50 flex items-center justify-end">
                                <x-primary-button class="bg-emerald-600 hover:bg-emerald-700 shadow-emerald-200 px-10 py-4 rounded-2xl group-hover:scale-[1.02] transition-transform">
                                    <i class="fa-solid fa-key mr-2"></i>
                                    {{ __('Update Security') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Termination Zone Card -->
                <div id="danger-zone" class="bg-red-50/20 rounded-[40px] overflow-hidden border border-red-100 shadow-xl shadow-red-200/5 group">
                    <div class="bg-red-50/50 px-10 py-8 border-b border-red-100 flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div class="w-14 h-14 rounded-2xl bg-white shadow-lg flex items-center justify-center text-red-600 group-hover:rotate-12 transition-transform duration-500">
                                <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-red-900 tracking-tight">{{ __('System Exit') }}</h3>
                                <p class="text-[10px] font-black text-red-400 uppercase tracking-[0.2em] mt-1">{{ __('Termination Zone') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-10 space-y-8">
                        <div class="p-6 bg-white rounded-3xl border border-red-100 shadow-sm">
                            <p class="text-slate-600 font-medium leading-relaxed">
                                Once your account is deactivated, all associated data, logs, and resources will be permanently purged from our primary production environment. 
                                <span class="text-red-600 font-bold underline">{{ __('This action is irreversible.') }}</span>
                            </p>
                        </div>
                        
                        <div class="flex justify-end">
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" 
                                    class="px-10 py-4 bg-red-600 hover:bg-red-700 text-white font-bold text-sm tracking-widest uppercase rounded-2xl shadow-xl shadow-red-200 transition-all hover:scale-[1.02] active:scale-95">
                                <i class="fa-solid fa-user-xmark mr-2"></i>
                                {{ __('Request Deactivation') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deletion Verification Modal (Premium Stylization) -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-10 space-y-8">
            @csrf
            @method('delete')

            <div class="space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-2xl animate-bounce">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>
                <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-tight">
                    {{ __('Confirm Identity.') }}
                </h2>
                <p class="text-slate-500 font-medium text-lg leading-relaxed">
                    {{ __('For your protection, please verify your credentials to authorize the permanent deletion of this account.') }}
                </p>
            </div>

            <div class="space-y-3">
                <x-input-label for="password" value="{{ __('Verification Password') }}" class="ml-2" />
                <x-text-input id="password" name="password" type="password" class="block w-full" placeholder="{{ __('••••••••') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" />
            </div>

            <div class="pt-6 flex justify-end gap-6 border-t border-slate-50">
                <button type="button" x-on:click="$dispatch('close')" class="px-8 py-3 text-sm font-black text-slate-500 hover:text-slate-900 transition-colors uppercase tracking-widest">
                    {{ __('Abort') }}
                </button>
                <button type="submit" class="px-10 py-4 bg-red-600 hover:bg-red-700 text-white font-bold text-sm rounded-2xl shadow-xl shadow-red-200 transition-all">
                    {{ __('Authorize Deletion') }}
                </button>
            </div>
        </form>
    </x-modal>
</x-app-layout>

