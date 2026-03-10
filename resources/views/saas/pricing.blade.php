<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pricing & Plans | Mekong CyberUnit SaaS</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0F172A; }
    </style>
</head>
<body class="antialiased min-h-screen relative overflow-x-hidden selection:bg-blue-500 selection:text-white">
    
    <!-- Background Effects -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-[30%] -right-[10%] w-[70vw] h-[70vw] rounded-full bg-blue-900/20 blur-[120px]"></div>
        <div class="absolute bottom-[10%] -left-[10%] w-[50vw] h-[50vw] rounded-full bg-indigo-900/20 blur-[100px]"></div>
    </div>

    <!-- Navigation -->
    <nav class="relative z-20 w-full border-b border-white/10 bg-slate-900/50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/30 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <span class="font-bold text-xl tracking-tight text-white leading-none">Flow<span class="text-blue-400">HR</span></span>
            </div>
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-300">
                <a href="#" class="hover:text-white transition-colors">Features</a>
                <a href="#" class="text-white">Pricing</a>
                <a href="{{ route('login') }}" class="hover:text-white transition-colors">Sign in</a>
                <a href="#plans" class="px-5 py-2.5 bg-white text-slate-900 rounded-full hover:bg-blue-50 transition-colors font-bold">Get Started</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="relative z-10 pt-20 pb-32">
        <div class="max-w-7xl mx-auto px-6">
            
            <!-- Header section -->
            <div class="text-center max-w-3xl mx-auto mb-20 space-y-4">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight">
                    Simple, transparent <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">pricing</span>
                </h1>
                <p class="text-lg md:text-xl text-slate-400 font-medium">
                    Choose the perfect plan for your business. Upgrade or downgrade at any time as your team grows.
                </p>
                <!-- Pricing Type Selector (Range Choose) -->
                <div class="mt-8 flex justify-center">
                    <div class="relative w-full max-w-[280px]">
                        <select onchange="setSaasMonths(this.value)" 
                                class="w-full bg-slate-800/50 border-2 border-blue-500/30 rounded-2xl px-6 py-3.5 font-bold text-slate-100 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all appearance-none outline-none cursor-pointer">
                            <optgroup label="Monthly Plans">
                                <option value="1" selected>1 Month Plan</option>
                                <option value="3">3 Months Plan</option>
                                <option value="6">6 Months Plan</option>
                            </optgroup>
                            <optgroup label="Yearly Plans (Discounted)">
                                <option value="12">1 Year Plan (-10%)</option>
                                <option value="24">2 Years Plan (-10%)</option>
                                <option value="36">3 Years Plan (-10%)</option>
                            </optgroup>
                        </select>
                        <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-blue-400">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing Cards -->
            <div id="plans" class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center">
                
                @forelse($plans as $index => $plan)
                    @php
                        // Determine styling based on position/price logic. Middle plan is "Popular".
                        $isPopular = ($plans->count() == 3 && $index == 1) || ($plan->price > 0 && $plan->price < 100 && $plans->count() != 3);
                        $cardBg = $isPopular ? 'bg-gradient-to-b from-blue-600 to-indigo-900 border-blue-500/50 shadow-2xl shadow-blue-900/50 scale-105 z-10 transform' : 'bg-slate-800/50 border-white/10 backdrop-blur-sm';
                        $btnClass = $isPopular ? 'bg-white text-blue-600 hover:bg-slate-50 shadow-lg' : 'bg-slate-700 hover:bg-slate-600 text-white border border-slate-600';
                        $textColor = $isPopular ? 'text-blue-100' : 'text-slate-400';
                        $titleColor = $isPopular ? 'text-white' : 'text-slate-100';
                    @endphp

                    <div class="relative rounded-3xl border p-8 flex flex-col h-full transition-transform hover:-translate-y-2 {{ $cardBg }}">
                        
                        @if($isPopular)
                        <div class="absolute -top-4 left-0 right-0 flex justify-center">
                            <span class="px-4 py-1 bg-gradient-to-r from-blue-400 to-indigo-400 text-white text-xs font-bold uppercase tracking-widest rounded-full shadow-lg">Most Popular</span>
                        </div>
                        @endif

                        <div class="mb-8">
                            <h3 class="text-xl font-bold {{ $titleColor }} mb-2">{{ $plan->name }}</h3>
                            <div class="flex items-baseline gap-1">
                                @if($plan->price <= 0)
                                    <span class="text-4xl md:text-5xl font-extrabold text-white">Free</span>
                                    <span class="{{ $textColor }} font-medium">/ 7 days</span>
                                @else
                                    <span class="text-4xl md:text-5xl font-extrabold text-white price-display-{{ $plan->id }}" 
                                          data-monthly="{{ number_format($plan->price, 0) }}" 
                                          data-yearly="{{ number_format($plan->yearly_price ?? ($plan->price * 12 * 0.9), 0) }}">
                                        ${{ number_format($plan->price, 0) }}
                                    </span>
                                    <span class="{{ $textColor }} font-medium period-display-{{ $plan->id }}">/ month</span>
                                @endif
                            </div>
                        </div>

                        <!-- Info/Limits -->
                        <div class="mb-8 space-y-4 flex-1">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <span class="{{ $titleColor }} font-medium text-sm">Up to {{ $plan->employee_limit ?? 'Unlimited' }} Employees</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                                <span class="{{ $titleColor }} font-medium text-sm">Up to {{ $plan->branch_limit ?? 'Unlimited' }} Branches</span>
                            </div>
                            
                            <!-- Features Checkmarks -->
                            <div class="pt-4 mt-6 border-t border-white/10 space-y-3">
                                @php
                                    $features = [
                                        'Core HR Management',
                                        'Attendance Tracking',
                                        'Leave Management',
                                        'Basic Reporting',
                                    ];
                                    if ($plan->price > 0) $features[] = 'Payroll System';
                                    if ($plan->price > 50) $features[] = 'Custom Roles & APIs';
                                    if ($plan->price > 100) $features[] = 'Dedicated Account Manager';
                                @endphp

                                @foreach($features as $feature)
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 flex-shrink-0 {{ $isPopular ? 'text-blue-300' : 'text-emerald-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                    <span class="text-sm {{ $textColor }}">{{ $feature }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <a href="{{ route('register.company', $plan->id) }}" class="w-full block py-3.5 px-6 rounded-xl font-bold text-center transition-all flex items-center justify-center gap-2 group {{ $btnClass }}">
                            @if($plan->price <= 0)
                                Start 7-Day Free Trial
                            @else
                                Choose {{ $plan->name }}
                            @endif
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>

                @empty
                    <div class="col-span-3 text-center py-20 bg-slate-800/30 rounded-3xl border border-white/5 backdrop-blur-md">
                        <svg class="w-16 h-16 text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="text-xl font-bold text-white mb-2">No Subscription Plans Available</h3>
                        <p class="text-slate-400">The platform administrator hasn't configured any plans yet. Please check back later.</p>
                    </div>
                @endforelse

            </div>

            <!-- FAQ Section or Social Proof can go here -->
            @if($plans->count() > 0)
            <div class="mt-32 border-t border-white/10 pt-20">
                <div class="flex flex-col md:flex-row items-center justify-between gap-10">
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold text-white mb-4">Enterprise Grade Security & Isolation</h2>
                        <p class="text-slate-400 leading-relaxed text-lg mb-6">Our SaaS architecture ensures complete data isolation. Every tenant receives their own dedicated workspace guarded by global scopes. Your data is never cross-contaminated.</p>
                        <div class="flex items-center gap-4 text-sm font-semibold text-white">
                            <div class="flex items-center gap-1.5"><svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg> SOC2 Compliant</div>
                            <div class="flex items-center gap-1.5"><svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg> End-to-End Encryption</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </main>

    <script>
        function setSaasMonths(months) {
            const selectedMonths = parseInt(months);
            @foreach($plans as $plan)
                @if($plan->price > 0)
                    const price{{ $plan->id }} = document.querySelector('.price-display-{{ $plan->id }}');
                    const period{{ $plan->id }} = document.querySelector('.period-display-{{ $plan->id }}');
                    
                    const monthlyVal = parseFloat(price{{ $plan->id }}.dataset.monthly.replace(/,/g, ''));
                    const yearlyVal = parseFloat(price{{ $plan->id }}.dataset.yearly.replace(/,/g, ''));
                    
                    let total;
                    if (selectedMonths >= 12) {
                        total = (yearlyVal / 12) * selectedMonths;
                    } else {
                        total = monthlyVal * selectedMonths;
                    }
                    
                    price{{ $plan->id }}.innerText = '$' + total.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0});
                    
                    let periodText = "";
                    if (selectedMonths === 12) periodText = "/ year";
                    else if (selectedMonths === 24) periodText = "/ 2 years";
                    else if (selectedMonths === 36) periodText = "/ 3 years";
                    else periodText = `/ ${selectedMonths} ${selectedMonths > 1 ? 'months' : 'month'}`;
                    
                    period{{ $plan->id }}.innerText = periodText;
                @endif
            @endforeach
        }
    </script>
</body>
</html>
