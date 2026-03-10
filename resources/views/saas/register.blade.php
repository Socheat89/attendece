<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#030712]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enterprise Registration | Mekong CyberUnit</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        .main-container {
            background-color: #030712;
            background-image: 
                radial-gradient(at 0% 0%, hsla(217,100%,13%,1) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(224,71%,18%,1) 0, transparent 50%), 
                radial-gradient(at 50% 100%, hsla(217,100%,13%,1) 0, transparent 50%);
            min-height: 100vh;
        }

        .glass-container {
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(24px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .input-v2 {
            background: rgba(3, 7, 18, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-v2:focus {
            background: rgba(3, 7, 18, 0.8);
            border-color: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: translateY(-1px);
        }

        .grad-blue {
            background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .step-badge {
            background: rgba(59, 130, 246, 0.1);
            color: #60A5FA;
            border: 1px solid rgba(59, 130, 246, 0.2);
            font-size: 10px;
            font-weight: 800;
            padding: 4px 12px;
            border-radius: 99px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        
        /* Custom radio styling */
        .plan-radio:checked + .plan-label {
            border-color: #3B82F6;
            background: rgba(59, 130, 246, 0.05);
            box-shadow: 0 0 0 1px #3B82F6, 0 10px 15px -3px rgba(59, 130, 246, 0.1);
        }
        
        .plan-radio:checked + .plan-label .radio-circle {
            background: #3B82F6;
            border-color: #3B82F6;
        }

        .plan-radio:checked + .plan-label .radio-dot {
            opacity: 1;
            transform: scale(1);
        }
    </style>
</head>
<body class="h-full antialiased text-slate-300 main-container overflow-x-hidden">
    
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-[20%] left-[10%] w-[400px] h-[400px] bg-blue-600/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[20%] right-[10%] w-[500px] h-[500px] bg-indigo-600/10 blur-[150px] rounded-full"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 py-12 lg:py-20 h-full flex flex-col lg:flex-row gap-16 items-center">
        
        <!-- Left: Experience Section -->
        <div class="w-full lg:w-5/12 text-center lg:text-left">
            <a href="/" class="inline-flex items-center gap-3 group mb-12">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white shadow-2xl shadow-blue-500/20 group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-microchip text-xl"></i>
                </div>
                <div class="flex flex-col">
                    <span class="font-black text-2xl tracking-tight leading-none text-white">Mekong</span>
                    <span class="font-bold text-xs tracking-[0.3em] uppercase text-blue-400">CyberUnit</span>
                </div>
            </a>

            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-8">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                Automated Infrastructure
            </div>

            <h1 class="text-5xl lg:text-6xl font-black text-white leading-[1.1] tracking-tight mb-8">
                Deploy your <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-400 to-purple-400">workspace</span> <br>
                in seconds.
            </h1>

            <div class="glass-container rounded-3xl p-6 mb-12 border-l-[6px] border-l-blue-500 max-w-md mx-auto lg:mx-0">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-500/10 flex items-center justify-center text-blue-400">
                        <i class="fa-solid fa-layer-group text-xl"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Current Selection</p>
                        <h4 class="text-white font-black text-lg">{{ $plan->name }} Tier</h4>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-6">
                <div class="flex -space-x-3">
                    <img src="https://ui-avatars.com/api/?name=JS&background=random" class="w-12 h-12 rounded-full border-4 border-[#030712] shadow-xl" alt="User">
                    <img src="https://ui-avatars.com/api/?name=AK&background=random" class="w-12 h-12 rounded-full border-4 border-[#030712] shadow-xl" alt="User">
                    <img src="https://ui-avatars.com/api/?name=MB&background=random" class="w-12 h-12 rounded-full border-4 border-[#030712] shadow-xl" alt="User">
                </div>
                <div class="text-slate-400 font-bold text-xs leading-relaxed text-center lg:text-left">
                    "The fastest onboarding experience we've<br>ever seen in HRM software."
                </div>
            </div>
        </div>

        <!-- Right: Registration Form Card -->
        <div class="w-full lg:w-7/12">
            <div class="glass-container rounded-[2.5rem] p-8 md:p-12 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 opacity-50"></div>
                
                <div class="mb-12">
                    <h2 class="text-3xl font-black text-white mb-2 tracking-tight">Organization Profile</h2>
                    <p class="text-slate-400 font-medium">Please provide your operational details to begin provisioning.</p>
                </div>

                @if(session('error'))
                <div class="mb-10 p-5 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-400 flex items-start gap-4">
                    <i class="fa-solid fa-circle-exclamation text-xl mt-1"></i>
                    <div class="flex-1">
                        <h5 class="font-black text-sm uppercase mb-1">Provisioning Error</h5>
                        <p class="text-xs font-semibold leading-relaxed opacity-80">{{ session('error') }}</p>
                    </div>
                </div>
                @endif

                <form action="{{ route('register.company.store', $plan->id) }}" method="POST" class="space-y-10">
                    @csrf

                    <!-- Section 1 -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 mb-8">
                            <span class="step-badge">Phase 01</span>
                            <h3 class="text-xs font-black text-white uppercase tracking-[0.2em]">Company Identity</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="company_name" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 ml-2">Company Name <span class="text-blue-500">*</span></label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-500 group-focus-within:text-blue-500 transition-colors">
                                        <i class="fa-solid fa-building"></i>
                                    </div>
                                    <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" required autofocus
                                        class="block w-full pl-12 pr-6 py-4 rounded-2xl input-v2 font-bold text-sm outline-none placeholder:text-slate-700"
                                        placeholder="e.g. Mekong CyberUnit Co., Ltd">
                                </div>
                                @error('company_name')<span class="text-rose-500 text-[10px] mt-2 ml-2 block font-black uppercase tracking-widest">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="company_email" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 ml-2">Official Email</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-500 group-focus-within:text-blue-500 transition-colors">
                                        <i class="fa-solid fa-at"></i>
                                    </div>
                                    <input type="email" name="company_email" id="company_email" value="{{ old('company_email') }}"
                                        class="block w-full pl-12 pr-6 py-4 rounded-2xl input-v2 font-bold text-sm outline-none placeholder:text-slate-700"
                                        placeholder="contact@hq.com">
                                </div>
                            </div>

                            <div>
                                <label for="phone" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 ml-2">Phone System</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-500 group-focus-within:text-blue-500 transition-colors">
                                        <i class="fa-solid fa-phone-volume"></i>
                                    </div>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                        class="block w-full pl-12 pr-6 py-4 rounded-2xl input-v2 font-bold text-sm outline-none placeholder:text-slate-700"
                                        placeholder="+855 ...">
                                </div>
                            </div>
                        </div>

                        @if($plan->price > 0)
                        <div class="pt-6">
                            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4 ml-2">Subscription Protocol <span class="text-blue-500">*</span></label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <label class="relative cursor-pointer group">
                                    <input type="radio" name="billing_cycle" value="monthly" checked class="sr-only plan-radio">
                                    <div class="plan-label border border-white/5 rounded-2xl p-5 bg-white/5 transition-all flex items-center gap-4">
                                        <div class="radio-circle w-6 h-6 rounded-full border-2 border-white/10 flex items-center justify-center transition-all">
                                            <div class="radio-dot w-2 h-2 rounded-full bg-white opacity-0 transform scale-50 transition-all"></div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-white font-black text-sm uppercase tracking-tight">Monthly</div>
                                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">${{ number_format($plan->price, 2) }} / Month</div>
                                        </div>
                                    </div>
                                </label>
                                
                                <label class="relative cursor-pointer group">
                                    <input type="radio" name="billing_cycle" value="yearly" class="sr-only plan-radio">
                                    <div class="plan-label border border-white/5 rounded-2xl p-5 bg-white/5 transition-all flex items-center gap-4">
                                        <div class="radio-circle w-6 h-6 rounded-full border-2 border-white/10 flex items-center justify-center transition-all">
                                            <div class="radio-dot w-2 h-2 rounded-full bg-white opacity-0 transform scale-50 transition-all"></div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2">
                                                <div class="text-white font-black text-sm uppercase tracking-tight">Yearly</div>
                                                <span class="bg-emerald-500/10 text-emerald-400 text-[8px] font-black px-1.5 py-0.5 rounded-full uppercase">Save 10%</span>
                                            </div>
                                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">${{ number_format($plan->yearly_price ?? ($plan->price * 12 * 0.9), 2) }} / Year</div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @else
                            <input type="hidden" name="billing_cycle" value="trial">
                        @endif
                    </div>

                    <!-- Section 2 -->
                    <div class="space-y-6 pt-6 border-t border-white/5">
                        <div class="flex items-center gap-3 mb-8">
                            <span class="step-badge">Phase 02</span>
                            <h3 class="text-xs font-black text-white uppercase tracking-[0.2em]">Administrative Control</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="name" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 ml-2">Full Name <span class="text-blue-500">*</span></label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-500 group-focus-within:text-blue-500 transition-colors">
                                        <i class="fa-solid fa-user-shield"></i>
                                    </div>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                        class="block w-full pl-12 pr-6 py-4 rounded-2xl input-v2 font-bold text-sm outline-none placeholder:text-slate-700"
                                        placeholder="Fleet Admiral Name">
                                </div>
                                @error('name')<span class="text-rose-500 text-[10px] mt-2 ml-2 block font-black uppercase tracking-widest">{{ $message }}</span>@enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="email" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 ml-2">Login Identifier <span class="text-blue-500">*</span></label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-500 group-focus-within:text-blue-500 transition-colors">
                                        <i class="fa-solid fa-key"></i>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                        class="block w-full pl-12 pr-6 py-4 rounded-2xl input-v2 font-bold text-sm outline-none placeholder:text-slate-700"
                                        placeholder="admin@instance.com">
                                </div>
                                @error('email')<span class="text-rose-500 text-[10px] mt-2 ml-2 block font-black uppercase tracking-widest">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="password" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 ml-2">Access Key <span class="text-blue-500">*</span></label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-500 group-focus-within:text-blue-500 transition-colors">
                                        <i class="fa-solid fa-lock"></i>
                                    </div>
                                    <input type="password" name="password" id="password" required
                                        class="block w-full pl-12 pr-6 py-4 rounded-2xl input-v2 font-bold text-sm outline-none placeholder:text-slate-700"
                                        placeholder="••••••••">
                                </div>
                                @error('password')<span class="text-rose-500 text-[10px] mt-2 ml-2 block font-black uppercase tracking-widest">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 ml-2">Verify Key <span class="text-blue-500">*</span></label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-500 group-focus-within:text-blue-500 transition-colors">
                                        <i class="fa-solid fa-shield-halved"></i>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required
                                        class="block w-full pl-12 pr-6 py-4 rounded-2xl input-v2 font-bold text-sm outline-none placeholder:text-slate-700"
                                        placeholder="••••••••">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-10">
                        <button type="submit" class="w-full relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                            <div class="relative h-16 w-full flex items-center justify-center bg-blue-600 hover:bg-blue-500 text-white font-black rounded-2xl text-base tracking-widest uppercase shadow-xl transition-all active:scale-95">
                                Initialize System Deployment
                                <i class="fa-solid fa-chevron-right ml-4 group-hover:translate-x-2 transition-transform"></i>
                            </div>
                        </button>
                        
                        <p class="text-[9px] text-slate-500 font-bold text-center mt-8 uppercase tracking-[0.2em] leading-relaxed">
                            Secured and Encrypted Lifecycle End-to-End. By proceeding, you agree to the <br>
                            <a href="#" class="text-blue-500 hover:text-blue-400 underline underline-offset-4">Governance Protocol</a> and <a href="#" class="text-blue-500 hover:text-blue-400 underline underline-offset-4">Security Policy</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Background Decoration -->
    <div class="fixed bottom-0 left-0 right-0 h-[30vh] bg-gradient-to-t from-blue-600/5 to-transparent pointer-events-none z-0"></div>

</body>
</html>
