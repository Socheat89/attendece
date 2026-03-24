<x-modal name="profile-modal" maxWidth="2xl">
    <div x-data="{ activeTab: 'profile' }" 
         class="relative bg-[#0a0a0a] rounded-[2rem] overflow-hidden shadow-[0_40px_100px_rgba(0,0,0,0.8)] border border-white/5 group">
        
        <!-- Sophisticated Linear Background Glow -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[120%] h-[300px] bg-gradient-to-b from-indigo-500/10 to-transparent blur-3xl opacity-50"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-600/5 rounded-full blur-[100px]"></div>
        </div>
        
        <div class="relative z-10 flex flex-col h-full uppercase tracking-tighter">
            
            <!-- Minimalist Top Bar -->
            <div class="flex items-center justify-between px-8 py-6 border-b border-white/5 bg-white/[0.02]">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse shadow-[0_0_10px_rgba(99,102,241,0.8)]"></div>
                    <span class="text-[10px] font-black text-white/40 tracking-[0.3em] uppercase">{{ __('System // Core_Identity') }}</span>
                </div>
                <button x-on:click="$dispatch('close')" class="p-2 text-white/20 hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>

            <div class="flex flex-col md:flex-row min-h-[500px]">
                
                <!-- Sidebar Navigation (Raycast Style) -->
                <div class="w-full md:w-64 border-r border-white/5 p-6 space-y-2 bg-black/20">
                    <button @click="activeTab = 'profile'"
                            :class="activeTab === 'profile' ? 'bg-white/5 text-white border border-white/10' : 'text-white/40 hover:text-white hover:bg-white/[0.02] border border-transparent'"
                            class="w-full px-5 py-3.5 rounded-xl text-[10px] font-black transition-all flex items-center justify-between group/nav">
                        <span class="flex items-center gap-3">
                            <i class="fa-solid fa-user-gear text-xs" :class="activeTab === 'profile' ? 'text-indigo-400' : ''"></i>
                            {{ __('General') }}
                        </span>
                        <span class="text-[8px] opacity-0 group-hover/nav:opacity-100 transition-opacity bg-white/10 px-1.5 py-0.5 rounded text-white/60">⌘1</span>
                    </button>
                    <button @click="activeTab = 'security'"
                            :class="activeTab === 'security' ? 'bg-white/5 text-white border border-white/10' : 'text-white/40 hover:text-white hover:bg-white/[0.02] border border-transparent'"
                            class="w-full px-5 py-3.5 rounded-xl text-[10px] font-black transition-all flex items-center justify-between group/nav">
                        <span class="flex items-center gap-3">
                            <i class="fa-solid fa-shield-halved text-xs" :class="activeTab === 'security' ? 'text-indigo-400' : ''"></i>
                            {{ __('Security') }}
                        </span>
                        <span class="text-[8px] opacity-0 group-hover/nav:opacity-100 transition-opacity bg-white/10 px-1.5 py-0.5 rounded text-white/60">⌘2</span>
                    </button>
                </div>

                <!-- Main Content (Linear Bento Style) -->
                <div class="flex-1 p-10 bg-black/10 overflow-y-auto custom-scrollbar">
                    
                    <!-- Tab: Profile -->
                    <div x-show="activeTab === 'profile'" 
                         x-transition:enter="transition cubic-bezier(0,0,0,1) duration-500"
                         x-transition:enter-start="opacity-0 translate-x-4"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         class="space-y-10">
                        
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            @method('PATCH')

                            <!-- Header Bento Card with Photo Upload -->
                            <div class="flex items-center gap-8 mb-4 border-b border-white/5 pb-6"
                                 x-data="{ 
                                     photoPreview: null,
                                     updatePreview(event) {
                                         const file = event.target.files[0];
                                         if(file) {
                                             this.photoPreview = URL.createObjectURL(file);
                                         }
                                     }
                                 }">
                                <div class="relative group/avatar cursor-pointer" @click="$refs.photoInput.click()">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-indigo-500 to-blue-500 rounded-2xl blur opacity-0 group-hover/avatar:opacity-30 transition duration-500"></div>
                                    <div class="relative w-20 h-20 rounded-2xl bg-white/5 p-1 border @error('photo') border-red-500/50 @else border-white/10 @enderror ring-1 ring-white/5 shadow-2xl overflow-hidden flex items-center justify-center">
                                        <img :src="photoPreview ?? '{{ Auth::user()->photo_path ? route('users.photo', Auth::user()) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=111&color=6366f1&size=200' }}'" 
                                             class="w-full h-full rounded-xl object-cover grayscale group-hover/avatar:grayscale-0 transition-all duration-700">
                                        <div class="absolute inset-0 bg-black/60 rounded-xl flex flex-col items-center justify-center opacity-0 group-hover/avatar:opacity-100 transition-opacity duration-300">
                                            <i class="fa-solid fa-camera text-white/90 text-lg mb-1"></i>
                                            <span class="text-[8px] font-black text-white/90 uppercase tracking-[0.2em]">{{ __('Upload') }}</span>
                                        </div>
                                    </div>
                                    <input type="file" name="photo" x-ref="photoInput" @change="updatePreview" class="hidden" accept="image/*">
                                </div>
                                <div>
                                    <h3 class="text-xl font-black text-white italic tracking-tighter">{{ Auth::user()->name }}</h3>
                                    <div class="flex items-center gap-3 mt-1.5">
                                        <span class="text-[9px] font-black text-indigo-400 tracking-[0.2em] uppercase">{{ Auth::user()->roles->first()->name ?? 'Operator' }}</span>
                                        <div class="w-1 h-1 rounded-full bg-white/10"></div>
                                        <span class="text-[9px] font-black text-white/20 tracking-[0.2em]">ID:{{ Auth::user()->id }}</span>
                                    </div>
                                    @error('photo')
                                        <p class="text-[10px] text-red-400 font-bold mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label class="text-[9px] font-black text-white/30 ml-1 tracking-[0.2em]">{{ __('Identity_Name') }}</label>
                                    <input name="name" type="text" value="{{ old('name', Auth::user()->name) }}" required 
                                        class="w-full px-5 py-4 bg-white/[0.03] border @error('name') border-red-500/50 @else border-white/5 @enderror rounded-xl text-white font-bold text-xs focus:border-indigo-500/50 focus:bg-white/[0.05] transition-all outline-none placeholder-white/10 ring-1 ring-transparent focus:ring-indigo-500/10 shadow-inner" />
                                    @error('name')
                                        <p class="text-[10px] text-red-400 font-bold ml-1 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="text-[9px] font-black text-white/30 ml-1 tracking-[0.2em]">{{ __('Identity_Email') }}</label>
                                    <input name="email" type="email" value="{{ old('email', Auth::user()->email) }}" required 
                                        class="w-full px-5 py-4 bg-white/[0.03] border @error('email') border-red-500/50 @else border-white/5 @enderror rounded-xl text-white font-bold text-xs focus:border-indigo-500/50 focus:bg-white/[0.05] transition-all outline-none placeholder-white/10 ring-1 ring-transparent focus:ring-indigo-500/10 shadow-inner" />
                                    @error('email')
                                        <p class="text-[10px] text-red-400 font-bold ml-1 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="w-full py-4 bg-white text-black hover:bg-indigo-50 hover:scale-[1.02] rounded-xl text-[9px] font-black uppercase tracking-[0.3em] transition-all active:scale-[0.98] shadow-[0_10px_20px_rgba(255,255,255,0.05)] border border-white/20">
                                {{ __('Commit Changes') }}
                            </button>
                        </form>
                    </div>

                    <!-- Tab: Security -->
                    <div x-show="activeTab === 'security'" 
                         x-transition:enter="transition cubic-bezier(0,0,0,1) duration-500"
                         x-transition:enter-start="opacity-0 translate-x-4"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         class="space-y-8" x-cloak>
                        
                        <div class="p-6 bg-white/[0.02] border border-white/5 rounded-2xl flex items-center gap-5">
                            <div class="w-12 h-12 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 border border-indigo-500/20">
                                <i class="fa-solid fa-lock-open text-lg"></i>
                            </div>
                            <div>
                                <h4 class="text-xs font-black text-white tracking-[0.1em]">{{ __('Security Protocol') }}</h4>
                                <p class="text-[9px] text-white/30 font-bold mt-1 tracking-tight">{{ __('Update your access credentials to secure your terminal.') }}</p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label class="text-[9px] font-black text-white/30 ml-1 tracking-[0.2em]">{{ __('Access_Password') }}</label>
                                    <input name="current_password" type="password" placeholder="••••••••••••"
                                        class="w-full px-5 py-4 bg-white/[0.03] border @error('current_password', 'updatePassword') border-red-500/50 @else border-white/5 @enderror rounded-xl text-white font-bold text-xs focus:border-indigo-500/50 focus:bg-white/[0.05] transition-all outline-none ring-1 ring-transparent focus:ring-indigo-500/10 shadow-inner" />
                                    @error('current_password', 'updatePassword')
                                        <p class="text-[10px] text-red-400 font-bold ml-1 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label class="text-[9px] font-black text-white/30 ml-1 tracking-[0.2em]">{{ __('New_Key') }}</label>
                                        <input name="password" type="password" placeholder="••••••••"
                                            class="w-full px-5 py-4 bg-white/[0.03] border @error('password', 'updatePassword') border-red-500/50 @else border-white/5 @enderror rounded-xl text-white font-bold text-xs focus:border-indigo-500/50 focus:bg-white/[0.05] transition-all outline-none" />
                                        @error('password', 'updatePassword')
                                            <p class="text-[10px] text-red-400 font-bold ml-1 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-[9px] font-black text-white/30 ml-1 tracking-[0.2em]">{{ __('Verify_Key') }}</label>
                                        <input name="password_confirmation" type="password" placeholder="••••••••"
                                            class="w-full px-5 py-4 bg-white/[0.03] border border-white/5 rounded-xl text-white font-bold text-xs focus:border-indigo-500/50 focus:bg-white/[0.05] transition-all outline-none" />
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="w-full py-4 bg-white text-black hover:bg-indigo-50 hover:scale-[1.02] rounded-xl text-[9px] font-black uppercase tracking-[0.3em] transition-all active:scale-[0.98] shadow-[0_10px_20px_rgba(255,255,255,0.05)] border border-white/20">
                                {{ __('Fortify Account') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sleek Bar Footer -->
            <div class="px-8 py-6 border-t border-white/5 bg-black/40 flex items-center justify-between text-[8px] font-black text-white/10 tracking-[0.4em] uppercase">
                <span>{{ __('Authorized // Mekong.CyberUnit') }}</span>
                <div class="flex items-center gap-6">
                    <span class="text-white/20">v.4.0.0_STABLE</span>
                    <div class="w-1.5 h-1.5 rounded-full bg-emerald-500/30"></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
        .custom-scrollbar::-webkit-scrollbar { width: 3px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.05); border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.1); }
    </style>
</x-modal>





