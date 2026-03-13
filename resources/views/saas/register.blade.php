<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#030b14]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Your Workspace | Mekong CyberUnit SaaS</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --bg-color: #030b14;
            --primary: #3b82f6;
            --primary-glow: rgba(59, 130, 246, 0.5);
            --secondary: #8b5cf6;
            --text-light: #f8fafc;
            --text-muted: #94a3b8;
            --card-bg: rgba(15, 23, 42, 0.6);
            --card-border: rgba(51, 65, 85, 0.5);
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: var(--bg-color);
            color: var(--text-light);
            background-image: 
                radial-gradient(circle at 15% 50%, rgba(59, 130, 246, 0.15), transparent 25%),
                radial-gradient(circle at 85% 30%, rgba(139, 92, 246, 0.15), transparent 25%);
        }

        .heading-font {
            font-family: 'Outfit', sans-serif;
        }

        /* Glassmorphism Classes */
        .glass-panel {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--card-border);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .glass-input {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(71, 85, 105, 0.5);
            color: white;
            transition: all 0.3s ease;
        }

        .glass-input:focus {
            background: rgba(30, 41, 59, 0.8);
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
            outline: none;
        }

        /* Animations */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        @keyframes pulse-glow {
            0% { box-shadow: 0 0 0 0 var(--primary-glow); }
            70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        .slide-up-fade {
            animation: slideUpFade 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes slideUpFade {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Staggered delays */
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }
        .delay-400 { animation-delay: 400ms; }

        .gradient-text {
            background: linear-gradient(135deg, #60a5fa, #c084fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(15, 23, 42, 0.5);
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(71, 85, 105, 0.8);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(100, 116, 139, 1);
        }
    </style>
</head>
<body class="h-full antialiased flex overflow-hidden selection:bg-blue-500/30">
    
    <!-- Left Pattern/Image side (hidden on small) -->
    <div class="hidden lg:flex lg:w-5/12 relative flex-col justify-between overflow-hidden border-r border-slate-800/50">
        
        <!-- Abstract glowing orbs -->
        <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] rounded-full bg-blue-600/20 blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[400px] h-[400px] rounded-full bg-purple-600/20 blur-[80px] pointer-events-none"></div>

        <div class="relative z-10 p-12 slide-up-fade">
            <a href="{{ url('/') }}" class="flex items-center gap-3 w-fit hover:opacity-80 transition-opacity group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/30 group-hover:scale-105 transition-transform duration-300">
                    <i class="fa-solid fa-bolt-lightning text-white"></i>
                </div>
                <span class="heading-font font-extrabold text-2xl tracking-tight text-white leading-none">Mekong<span class="text-blue-500">CyberUnit</span></span>
            </a>
        </div>

        <div class="relative z-10 p-12 pb-24">
            <div class="mb-6 slide-up-fade delay-100">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 text-xs font-bold uppercase tracking-widest shadow-inner backdrop-blur-sm">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    Auto-Provisioning
                </div>
            </div>
            
            <h1 class="heading-font text-5xl font-black text-white tracking-tight leading-[1.1] mb-6 slide-up-fade delay-200">
                Your isolated <br>
                <span class="gradient-text">workspace</span> is<br>
                almost ready.
            </h1>
            
            <p class="text-lg text-slate-300 font-medium max-w-md leading-relaxed slide-up-fade delay-300">
                You've selected the <strong class="text-white bg-slate-800/50 px-2 py-0.5 rounded-md border border-slate-700">{{ $plan->name }}</strong> plan. 
                @if($plan->price <= 0)
                    This is a free plan to get you started.
                @else
                    Register your company below to start your premium experience.
                @endif
                Our engine will instantly deploy your dedicated database schema and admin portal.
            </p>

            <!-- Decorative Mockup Element -->
            <div class="mt-12 w-full max-w-sm glass-panel rounded-2xl p-5 slide-up-fade delay-400 floating">
                <div class="flex items-center gap-4 mb-4 pb-4 border-b border-slate-700/50">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500/20 to-purple-500/20 flex items-center justify-center border border-slate-600/50">
                        <i class="fa-solid fa-building text-blue-400"></i>
                    </div>
                    <div>
                        <div class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-1">Status</div>
                        <div class="text-sm font-bold text-emerald-400 flex items-center gap-2">
                            <span class="relative flex h-2 w-2">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                            Ready to Provision
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="h-2 w-full bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-slate-600 w-1/3 rounded-full"></div>
                    </div>
                    <div class="h-2 w-3/4 bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-slate-600 w-1/2 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Form Side -->
    <div class="flex-1 w-full lg:w-7/12 flex flex-col relative overflow-y-auto px-6 py-12 md:px-12 scroll-smooth">
        
        <div class="w-full max-w-xl mx-auto my-auto flex flex-col w-full">
            <!-- Mobile Logo -->
            <a href="{{ url('/') }}" class="lg:hidden flex items-center justify-center gap-3 w-full mb-10 text-white slide-up-fade">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/30 text-white">
                    <i class="fa-solid fa-bolt-lightning"></i>
                </div>
                <span class="heading-font font-bold text-2xl tracking-tight leading-none">Mekong<span class="text-blue-500">CyberUnit</span></span>
            </a>

            <div class="w-full glass-panel rounded-3xl p-8 md:p-10 slide-up-fade delay-100 relative">
                
                <!-- Decorative accent line -->
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-1/3 h-1 bg-gradient-to-r from-transparent via-blue-500 to-transparent opacity-50 rounded-b-full"></div>

                <div class="mb-8 text-center sm:text-left">
                    <h2 class="heading-font text-3xl font-extrabold text-white mb-2 tracking-tight">Create workspace</h2>
                    <p class="text-slate-400 font-medium text-sm">Set up the admin account for the <span class="text-blue-400 font-bold px-1 py-0.5 rounded bg-blue-500/10">{{ $plan->name }}</span> plan.</p>
                </div>

                @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-200 flex items-start gap-3 animate-pulse">
                    <div class="w-6 h-6 rounded-full bg-red-500/20 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-circle-exclamation text-red-400 text-xs"></i>
                    </div>
                    <span class="font-medium text-sm leading-relaxed">{{ session('error') }}</span>
                </div>
                @endif

                <form action="{{ route('register.company.store', $plan->id) }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- 1. Company Info -->
                    <div class="space-y-5">
                        <div class="flex items-center gap-3 pb-3 border-b border-slate-700/50">
                            <div class="w-6 h-6 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center text-xs font-bold">1</div>
                            <h3 class="text-sm font-bold text-white uppercase tracking-wider">Company Profile</h3>
                        </div>
                        
                        <div>
                            <label for="company_name" class="block text-sm font-semibold text-slate-300 mb-2">Company Name <span class="text-rose-400">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-regular fa-building"></i>
                                </div>
                                <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" required autofocus
                                    class="glass-input block w-full pl-11 pr-4 py-3.5 rounded-xl sm:text-sm placeholder-slate-500"
                                    placeholder="e.g. Acme Corporation">
                            </div>
                            @error('company_name')<span class="text-rose-400 text-xs mt-1.5 block font-medium flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>@enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="company_email" class="block text-sm font-semibold text-slate-300 mb-2">Company Email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>
                                    <input type="email" name="company_email" id="company_email" value="{{ old('company_email') }}"
                                        class="glass-input block w-full pl-11 pr-4 py-3.5 rounded-xl sm:text-sm placeholder-slate-500"
                                        placeholder="hello@acme.com">
                                </div>
                                @error('company_email')<span class="text-rose-400 text-xs mt-1.5 block font-medium flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-slate-300 mb-2">Phone Number</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                        class="glass-input block w-full pl-11 pr-4 py-3.5 rounded-xl sm:text-sm placeholder-slate-500"
                                        placeholder="+1 (555) 000-0000">
                                </div>
                                @error('phone')<span class="text-rose-400 text-xs mt-1.5 block font-medium flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <!-- Billing Cycle: auto from payment request -->
                    <input type="hidden" name="billing_cycle" value="{{ $billingCycle }}">
                    <input type="hidden" name="months" value="{{ $months }}">
                    @if($plan->price > 0)
                    <div class="pt-2">
                        <p class="block text-sm font-semibold text-slate-300 mb-2">Billing Cycle</p>
                        <div class="flex items-center gap-3 px-4 py-3 bg-blue-500/10 border border-blue-500/20 rounded-xl">
                            <i class="fa-solid fa-clock-rotate-left text-blue-400 text-sm"></i>
                            <div>
                                <span class="text-sm font-bold text-white">
                                    @if($months >= 12)
                                        {{ $months / 12 }} Year{{ $months > 12 ? 's' : '' }} Plan
                                    @else
                                        {{ $months }} Month{{ $months > 1 ? 's' : '' }} Plan
                                    @endif
                                </span>
                                <span class="ml-2 text-xs text-blue-300">(from your payment selection)</span>
                            </div>
                            @if($months >= 12)
                            <span class="ml-auto bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-[9px] font-bold px-1.5 py-0.5 rounded">SAVE 10%</span>
                            @endif
                        </div>
                    </div>
                    @endif


                    <!-- 2. Admin Info -->
                    <div class="space-y-5 pt-4">
                        <div class="flex items-center gap-3 pb-3 border-b border-slate-700/50">
                            <div class="w-6 h-6 rounded-full bg-purple-500/20 text-purple-400 flex items-center justify-center text-xs font-bold">2</div>
                            <h3 class="text-sm font-bold text-white uppercase tracking-wider">Administrator Setup</h3>
                        </div>

                        <div>
                            <label for="name" class="block text-sm font-semibold text-slate-300 mb-2">Your Full Name <span class="text-rose-400">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="glass-input block w-full pl-11 pr-4 py-3.5 rounded-xl sm:text-sm placeholder-slate-500"
                                    placeholder="John Doe">
                            </div>
                            @error('name')<span class="text-rose-400 text-xs mt-1.5 block font-medium flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-300 mb-2">Admin Login Email <span class="text-rose-400">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-solid fa-at"></i>
                                </div>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="glass-input block w-full pl-11 pr-4 py-3.5 rounded-xl sm:text-sm placeholder-slate-500"
                                    placeholder="john@acme.com">
                            </div>
                            @error('email')<span class="text-rose-400 text-xs mt-1.5 block font-medium flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>@enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="password" class="block text-sm font-semibold text-slate-300 mb-2">Password <span class="text-rose-400">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-lock"></i>
                                    </div>
                                    <input type="password" name="password" id="password" required
                                        class="glass-input block w-full pl-11 pr-4 py-3.5 rounded-xl sm:text-sm placeholder-slate-500"
                                        placeholder="Min. 8 characters">
                                </div>
                                @error('password')<span class="text-rose-400 text-xs mt-1.5 block font-medium flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-sm font-semibold text-slate-300 mb-2">Confirm Password <span class="text-rose-400">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-lock-keyhole"></i>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required
                                        class="glass-input block w-full pl-11 pr-4 py-3.5 rounded-xl sm:text-sm placeholder-slate-500"
                                        placeholder="Match password">
                                </div>
                                @error('password_confirmation')<span class="text-rose-400 text-xs mt-1.5 block font-medium flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="pt-8">
                        <button type="submit" class="w-full flex items-center justify-center gap-3 px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold rounded-xl text-base shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-1 transition-all group relative overflow-hidden">
                            <span class="relative z-10 flex items-center gap-2">
                                Launch Workspace
                                <i class="fa-solid fa-rocket group-hover:translate-x-1 transition-transform"></i>
                            </span>
                            <!-- Subtle shine effect -->
                            <div class="absolute inset-0 -translate-x-full group-hover:animate-[shimmer_1.5s_infinite] bg-gradient-to-r from-transparent via-white/20 to-transparent z-0"></div>
                        </button>
                        
                        <p class="text-[12px] text-slate-500 font-medium text-center mt-6 p-4 rounded-xl bg-slate-800/20 border border-slate-700/30">
                            <i class="fa-solid fa-shield-halved text-slate-400 mr-1"></i>
                            By launching, you agree to our <a href="#" class="text-blue-400 hover:text-blue-300 hover:underline transition-colors">Terms of Service</a> and <a href="#" class="text-blue-400 hover:text-blue-300 hover:underline transition-colors">Privacy Policy</a>.
                        </p>
                    </div>
                </form>
            </div>
            
            <!-- Subtle Footer -->
            <div class="mt-8 text-center text-xs text-slate-500 slide-up-fade delay-400">
                &copy; {{ date('Y') }} Mekong CyberUnit. All rights reserved.
            </div>
        </div>
    </div>
    
    <style>
        @keyframes shimmer {
            100% { transform: translateX(100%); }
        }
    </style>
</body>
</html>
