<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enterprise Registration | Mekong CyberUnit</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --blue: #3b82f6; --indigo: #6366f1; --purple: #8b5cf6;
            --dark: #040d1a; --dark2: #071428; --dark3: #0c1f38;
            --card: #0e1e35; --border: rgba(59,130,246,0.18);
            --text: #94a3b8; --white: #f0f6ff;
        }
        body {
            font-family: 'Kantumruy Pro', sans-serif;
            background: var(--dark);
            color: var(--text);
            margin: 0; min-height: 100vh;
        }
        .num { font-family: 'Outfit', sans-serif; }
        
        .grad-text {
            background: linear-gradient(90deg, var(--blue), var(--purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .input-field {
            background: rgba(12, 31, 56, 0.5);
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--white);
            padding: 0.85rem 1rem 0.85rem 2.8rem;
            width: 100%;
            transition: all 0.3s;
            outline: none;
        }
        .input-field:focus {
            border-color: var(--blue);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.2);
            background: rgba(12, 31, 56, 0.8);
        }
        
        .label-text {
            color: var(--text);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
            display: block;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--blue), var(--indigo));
            color: white;
            padding: 1rem;
            border-radius: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            width: 100%;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
            transition: all 0.3s;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.5);
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }

        .left-panel {
            background: radial-gradient(circle at top left, var(--dark2), var(--dark));
        }
        
        .step-circle {
            width: 28px; height: 28px;
            border-radius: 8px;
            background: rgba(59, 130, 246, 0.1);
            color: var(--blue);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem; font-weight: 800;
        }
        
        /* Custom Radio */
        .plan-option input:checked + .plan-box {
            border-color: var(--blue);
            background: rgba(59, 130, 246, 0.05);
        }
        .plan-box {
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1rem;
            transition: all 0.2s;
            cursor: pointer;
        }
    </style>
</head>
<body class="antialiased">

    <div class="min-h-screen flex flex-col lg:flex-row">
        
        <!-- Left Visual -->
        <div class="hidden lg:flex lg:w-5/12 left-panel relative flex-col justify-between p-12 overflow-hidden border-r border-white/5">
            <!-- Glows -->
            <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-600/10 blur-[100px] rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-80 h-80 bg-purple-600/10 blur-[100px] rounded-full"></div>

            <div class="relative z-10">
                <a href="/" class="logo" style="text-decoration:none">
                    <div style="display:flex;align-items:center;gap:0.75rem">
                        <div style="width:40px;height:40px;border-radius:12px;background:linear-gradient(135deg,var(--blue),var(--indigo));display:flex;align-items:center;justify-content:center;color:white;box-shadow:0 0 20px rgba(59,130,246,.4)">
                            <i class="fa-solid fa-microchip"></i>
                        </div>
                        <span style="font-family:'Outfit',sans-serif;font-size:1.5rem;font-weight:800;color:var(--white)">Mekong <span class="grad-text">CyberUnit</span></span>
                    </div>
                </a>
            </div>

            <div class="relative z-10">
                <div class="inline-block px-3 py-1 bg-blue-500/10 border border-blue-500/20 rounded-full text-[10px] font-bold text-blue-400 uppercase tracking-widest mb-6">
                    Autonomous Deployment Ready
                </div>
                <h1 class="text-5xl font-black text-white leading-tight mb-8">
                    Elevate your <br><span class="grad-text">Workforce</span> <br>Intelligence.
                </h1>
                
                <div class="bg-white/5 border border-white/5 backdrop-blur-md rounded-2xl p-6 mb-12 flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/20 flex items-center justify-center text-blue-400 shrink-0">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                    <div>
                        <h4 class="text-white font-bold text-sm mb-1">Configuration: {{ $plan->name }}</h4>
                        <p class="text-slate-400 text-xs leading-relaxed">System parameters are optimized for high-scale enterprise operations.</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex -space-x-2">
                        <img src="https://ui-avatars.com/api/?name=JS&background=3b82f6&color=fff" class="w-10 h-10 rounded-full border-2 border-dark shadow-xl">
                        <img src="https://ui-avatars.com/api/?name=MK&background=6366f1&color=fff" class="w-10 h-10 rounded-full border-2 border-dark shadow-xl">
                        <div class="w-10 h-10 rounded-full bg-slate-800 border-2 border-dark flex items-center justify-center text-[10px] font-bold text-white">1k+</div>
                    </div>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-wider">Trusted by Industry Leaders</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Form -->
        <div class="flex-1 p-6 md:p-12 lg:p-20 overflow-y-auto flex items-center justify-center">
            <div class="w-full max-w-2xl mx-auto">
                <div class="mb-10">
                    <h2 class="text-3xl font-black text-white mb-2">Create Workspace</h2>
                    <p class="text-slate-400 font-medium">Provision your dedicated HRM environment below.</p>
                </div>

                @if(session('error'))
                <div class="mb-8 p-4 bg-red-500/10 border border-red-500/20 rounded-xl text-red-400 text-xs font-bold">
                    <i class="fa-solid fa-triangle-exclamation mr-2"></i> {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('register.company.store', $plan->id) }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Group 1: Company -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3">
                            <div class="step-circle">1</div>
                            <h3 class="text-xs font-black text-white uppercase tracking-widest">Company Protocol</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="md:col-span-2">
                                <label class="label-text">Company Name <span class="text-blue-500">*</span></label>
                                <div class="relative">
                                    <i class="fa-solid fa-building absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>
                                    <input type="text" name="company_name" value="{{ old('company_name') }}" required autofocus class="input-field" placeholder="Full Legal Name">
                                </div>
                                @error('company_name')<p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="label-text">Business Email</label>
                                <div class="relative">
                                    <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>
                                    <input type="email" name="company_email" value="{{ old('company_email') }}" class="input-field" placeholder="hq@company.com">
                                </div>
                            </div>

                            <div>
                                <label class="label-text">Contact Link</label>
                                <div class="relative">
                                    <i class="fa-solid fa-phone absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="input-field" placeholder="+855...">
                                </div>
                            </div>
                        </div>

                        @if($plan->price > 0)
                        <div>
                            <label class="label-text">Billing Frequency</label>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="plan-option">
                                    <input type="radio" name="billing_cycle" value="monthly" checked class="hidden">
                                    <div class="plan-box flex flex-col items-center text-center">
                                        <span class="text-xs font-black text-white mb-1 uppercase">Monthly</span>
                                        <span class="num text-blue-400 font-bold text-sm">${{ number_format($plan->price, 2) }}</span>
                                    </div>
                                </label>
                                <label class="plan-option">
                                    <input type="radio" name="billing_cycle" value="yearly" class="hidden">
                                    <div class="plan-box flex flex-col items-center text-center relative">
                                        <span class="absolute -top-2 -right-2 bg-blue-600 text-white text-[8px] font-black px-2 py-0.5 rounded-full uppercase">Value</span>
                                        <span class="text-xs font-black text-white mb-1 uppercase">Yearly</span>
                                        <span class="num text-blue-400 font-bold text-sm">${{ number_format($plan->yearly_price ?? ($plan->price * 12 * 0.9), 2) }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @else
                            <input type="hidden" name="billing_cycle" value="trial">
                        @endif
                    </div>

                    <!-- Group 2: Admin -->
                    <div class="space-y-6 pt-6 border-t border-white/5">
                        <div class="flex items-center gap-3">
                            <div class="step-circle">2</div>
                            <h3 class="text-xs font-black text-white uppercase tracking-widest">Access Credentials</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="md:col-span-2">
                                <label class="label-text">Administrator Full Name <span class="text-blue-500">*</span></label>
                                <div class="relative">
                                    <i class="fa-solid fa-user-tie absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>
                                    <input type="text" name="name" value="{{ old('name') }}" required class="input-field" placeholder="Primary System Admin">
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <label class="label-text">Authentication Email <span class="text-blue-500">*</span></label>
                                <div class="relative">
                                    <i class="fa-solid fa-at absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>
                                    <input type="email" name="email" value="{{ old('email') }}" required class="input-field" placeholder="admin@domain.com">
                                </div>
                            </div>

                            <div>
                                <label class="label-text">Password <span class="text-blue-500">*</span></label>
                                <div class="relative">
                                    <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>
                                    <input type="password" name="password" required class="input-field" placeholder="••••••••">
                                </div>
                            </div>

                            <div>
                                <label class="label-text">Verify Password <span class="text-blue-500">*</span></label>
                                <div class="relative">
                                    <i class="fa-solid fa-shield-check absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>
                                    <input type="password" name="password_confirmation" required class="input-field" placeholder="••••••••">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-10">
                        <button type="submit" class="btn-submit">
                            Initialize Deployment
                        </button>
                        <p class="text-[9px] text-center text-slate-600 font-bold uppercase tracking-widest mt-6">
                            By proceeding, you authorize system provisioning under the MCU Governance framework.
                        </p>
                    </div>

                </form>
            </div>
        </div>

    </div>

</body>
</html>
