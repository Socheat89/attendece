<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout | {{ $plan->name }} Plan</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-outfit { font-family: 'Outfit', sans-serif; }
        .card-bg {
            background: linear-gradient(135deg, #0e1e35, #040d1a);
        }
        .mesh-bg {
            background-color: #f8fafc;
            background-image: radial-gradient(at 40% 20%, hsla(228,100%,74%,0.15) 0px, transparent 50%),
                              radial-gradient(at 80% 0%, hsla(189,100%,56%,0.15) 0px, transparent 50%),
                              radial-gradient(at 0% 50%, hsla(355,100%,93%,0.1) 0px, transparent 50%);
        }
    </style>
</head>
<body class="h-full antialiased text-slate-600 mesh-bg min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="w-full bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="/" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                        <i class="fa-solid fa-bolt-lightning"></i>
                    </div>
                    <span class="font-outfit text-xl font-bold text-slate-800">Mekong<span class="text-blue-600">CyberUnit</span></span>
                </a>
                <div class="flex items-center gap-2 text-sm font-medium text-slate-500 bg-slate-100 px-4 py-2 rounded-full">
                    <i class="fa-solid fa-lock text-slate-400"></i> Secure Checkout
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center p-4 py-12">
        <div class="max-w-5xl w-full grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            
            <!-- Left Side: Order Summary -->
            <div class="flex flex-col">
                <a href="/" class="text-slate-500 hover:text-blue-600 font-medium text-sm flex items-center gap-2 w-fit mb-8 transition-colors">
                    <i class="fa-solid fa-arrow-left"></i> Back to Pricing
                </a>
                
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Complete your purchase</h1>
                <p class="text-slate-500 mb-6 font-medium">You are upgrading to the <span class="text-blue-600 font-bold bg-blue-50 px-2 py-0.5 rounded-md">{{ $plan->name }}</span> plan.</p>

                <!-- Duration Selector -->
                <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-sm mb-8">
                    <label class="block text-sm font-bold text-slate-700 mb-3 flex items-center gap-2">
                        <i class="fa-regular fa-calendar-check text-blue-500"></i> Select Subscription Duration
                    </label>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center border-2 border-slate-100 rounded-xl overflow-hidden bg-slate-50">
                            <button type="button" onclick="changeMonths(-1)" class="px-4 py-3 hover:bg-slate-100 text-slate-500 transition-colors border-r border-slate-100">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="number" id="input-months" value="1" min="1" max="60" readonly
                                class="w-16 text-center bg-transparent font-extrabold text-slate-900 border-none focus:ring-0">
                            <button type="button" onclick="changeMonths(1)" class="px-4 py-3 hover:bg-slate-100 text-slate-500 transition-colors border-l border-slate-100">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                        <div class="flex-1">
                            <span class="text-sm font-medium text-slate-500" id="duration-text">1 Month</span>
                            <div id="discount-badge" class="hidden mt-1">
                                <span class="bg-emerald-100 text-emerald-600 text-[10px] px-2 py-0.5 rounded-full font-bold uppercase tracking-tighter">Yearly Discount -10% Applied</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-4 gap-2 mt-4">
                        <button type="button" onclick="setMonths(1)" class="preset-btn py-2 rounded-lg text-xs font-bold border border-slate-200 hover:border-blue-500 transition-all bg-blue-50 text-blue-600 border-blue-500" data-months="1">1m</button>
                        <button type="button" onclick="setMonths(3)" class="preset-btn py-2 rounded-lg text-xs font-bold border border-slate-200 hover:border-blue-500 transition-all text-slate-600" data-months="3">3m</button>
                        <button type="button" onclick="setMonths(6)" class="preset-btn py-2 rounded-lg text-xs font-bold border border-slate-200 hover:border-blue-500 transition-all text-slate-600" data-months="6">6m</button>
                        <button type="button" onclick="setMonths(12)" class="preset-btn py-2 rounded-lg text-xs font-bold border border-slate-200 hover:border-blue-500 transition-all text-slate-600" data-months="12">12m</button>
                    </div>
                </div>
                
                <div class="card-bg rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden">
                    <!-- Decor -->
                    <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-500 rounded-full blur-3xl opacity-20 pointer-events-none"></div>
                    
                    <h3 class="font-outfit font-bold text-xl mb-6 flex items-center gap-3">
                        <i class="fa-solid fa-receipt text-blue-400"></i> Order Summary
                    </h3>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center text-slate-300">
                            <span class="font-medium">Mekong CyberUnit System</span>
                            <span class="font-bold text-white"><span class="summary-price">${{ number_format($plan->price, 2) }}</span></span>
                        </div>
                        <div class="flex justify-between items-center text-slate-400 text-sm">
                            <span>Subscription Plan</span>
                            <span>{{ $plan->name }} Tier</span>
                        </div>
                        <div class="flex justify-between items-center text-slate-400 text-sm">
                            <span>Billing Cycle</span>
                            <span id="summary-cycle">Monthly</span>
                        </div>
                    </div>
                    
                    <div class="border-t border-white/10 pt-6 flex justify-between items-end">
                        <div>
                            <p class="text-slate-400 text-sm font-medium mb-1">Total due today</p>
                            <p class="text-xs text-slate-500">Includes all applicable taxes.</p>
                        </div>
                        <div class="font-outfit text-4xl font-extrabold text-white">
                            <span class="summary-price">${{ number_format($plan->price, 2) }}</span>
                        </div>
                    </div>

                    <div class="mt-8 bg-white/5 rounded-2xl p-4 border border-white/10">
                        <h4 class="text-sm font-bold text-blue-300 mb-2">What's included:</h4>
                        <ul class="text-sm text-slate-300 space-y-2">
                            <li class="flex gap-2 items-start">
                                <i class="fa-solid fa-check text-green-400 mt-0.5"></i>
                                <span>Up to {{ $plan->employee_limit ?? 'Unlimited' }} Employees</span>
                            </li>
                            <li class="flex gap-2 items-start">
                                <i class="fa-solid fa-check text-green-400 mt-0.5"></i>
                                <span>Up to {{ $plan->branch_limit ?? 'Unlimited' }} Branches</span>
                            </li>
                            @if($plan->feature_list)
                                @foreach(array_slice($plan->feature_list, 0, 3) as $feature)
                                <li class="flex gap-2 items-start">
                                    <i class="fa-solid fa-check text-green-400 mt-0.5"></i>
                                    <span>{{ $feature }}</span>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Right Side: Payment Form -->
            <div class="bg-white rounded-3xl p-8 shadow-xl border border-slate-100/60 lg:mt-16 relative">
                <h3 class="text-xl font-bold text-slate-800 mb-6">Payment Method</h3>
                
                <div class="flex gap-3 mb-8">
                    <button type="button" onclick="switchMethod('khqr')" id="tab-khqr" class="flex-1 border-2 border-blue-600 bg-blue-50 rounded-xl p-3 flex items-center justify-center gap-2 text-blue-700 font-bold transition-colors">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 4H10V10H4V4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M4 14H10V20H4V14Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M14 4H20V10H14V4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M14 14H17V17H14V14Z" fill="currentColor"/><path d="M17 17H20V20H17V17Z" fill="currentColor"/><path d="M14 17H17V20H14V17Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M17 14H20V17H17V14Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
                        KHQR Payment
                    </button>
                    <button type="button" onclick="switchMethod('card')" id="tab-card" class="flex-1 border-2 border-slate-100 hover:border-slate-200 rounded-xl p-3 flex items-center justify-center gap-2 text-slate-500 font-bold transition-colors">
                        <i class="fa-solid fa-credit-card"></i> Card
                    </button>
                </div>
                
                <!-- KHQR Method -->
                <div id="method-khqr" class="block animate-fade-in text-center">
                    <p class="text-sm text-slate-500 mb-4">Scan with any standard KHQR mobile banking app to complete your payment.</p>
                    
                    <div class="inline-block p-4 border border-slate-200 rounded-2xl bg-white shadow-sm mb-4">
                        <div class="flex justify-between items-center mb-4">
                           <div class="flex gap-1.5"><img src="https://ui-avatars.com/api/?name=KHQR&background=ef4444&color=fff&rounded=true&size=24" alt="KHQR"> <span class="text-sm font-bold text-slate-700">Scan to Pay</span></div>
                        </div>
                        <div class="w-64 h-64 mx-auto relative group overflow-hidden rounded-2xl ring-4 ring-blue-50 bg-white">
                             <div class="absolute inset-0 bg-white"></div>
                             <!-- Simulated QR Image (cropped via css) -->
                             <img src="{{ asset('images/KHQR.jpg') }}" alt="KHQR Code" class="absolute inset-0 w-full h-full object-cover object-center scale-[1.3] rounded-xl mix-blend-multiply transition-transform hover:scale-[1.35]">
                             
                             <!-- Scanner line animation -->
                             <div id="qr-scanner" class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-blue-500 to-transparent shadow-[0_0_15px_blue] z-10 hidden"></div>
                        </div>
                    </div>
                    
                    <div class="text-center mb-4">
                        <p class="font-outfit text-2xl font-black text-blue-600 mb-1 summary-price">${{ number_format($plan->price, 2) }}</p>
                        <p class="text-xs font-mono text-slate-400">Order ID: MCU{{ mt_rand(100000, 999999) }}</p>
                    </div>

                    <form id="khqr-form" onsubmit="submitKHQR(event)" class="text-left mt-4 border-t border-slate-100 pt-4">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1.5">Your Name</label>
                                <input type="text" id="khqr-name" required placeholder="Ex: John Doe" 
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1.5">Telegram Username / Phone</label>
                                <input type="text" id="khqr-contact" required placeholder="Ex: @johndoe or 012345678" 
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none">
                            </div>
                            <button type="submit" id="btn-submit-khqr" class="w-full py-4 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-extrabold rounded-xl shadow-lg shadow-blue-500/30 transition-all hover:shadow-blue-500/50 hover:-translate-y-0.5 outline-none focus:ring-2 focus:ring-blue-500/50 flex flex-col items-center justify-center">
                                <span>I have paid via KHQR</span>
                                <span class="text-[10px] text-blue-200 font-normal mt-0.5">We will verify and approve your access</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Credit Card Method -->
                <div id="method-card" class="hidden animate-fade-in">
                    <form id="payment-form" onsubmit="handlePayment(event, 'card')">
                        <div class="space-y-5">
                            <!-- Card Name -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1.5">Name on Card</label>
                                <input type="text" required placeholder="John Doe" 
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none">
                            </div>
                            
                            <!-- Card Number -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1.5">Card Number</label>
                                <div class="relative">
                                    <input type="text" required placeholder="0000 0000 0000 0000" maxlength="19" onkeyup="formatCard(this)"
                                        class="w-full pl-4 pr-12 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none font-mono">
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 flex gap-1">
                                        <i class="fa-brands fa-cc-visa text-slate-400 text-lg"></i>
                                        <i class="fa-brands fa-cc-mastercard text-slate-400 text-lg"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-5">
                                <!-- Expiry -->
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-1.5">Expiration</label>
                                    <input type="text" required placeholder="MM/YY" maxlength="5" onkeyup="formatExpiry(this)"
                                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none text-center tracking-widest font-mono">
                                </div>
                                <!-- CVC -->
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-1.5">CVC</label>
                                    <input type="text" required placeholder="123" maxlength="4"
                                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium text-slate-800 outline-none text-center tracking-widest font-mono">
                                </div>
                            </div>
                        </div>

                        <p class="text-xs text-slate-500 mt-6 mb-6 flex items-start gap-2">
                            <i class="fa-solid fa-lock text-slate-400 mt-0.5"></i>
                            <span>This is a secure 256-bit SSL encrypted payment. Your card details are not stored on our servers.</span>
                        </p>
                        
                        <button type="submit" id="submit-btn" class="w-full py-4 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-extrabold rounded-xl shadow-lg shadow-blue-500/30 transition-all hover:shadow-blue-500/50 hover:-translate-y-0.5 outline-none focus:ring-2 focus:ring-blue-500/50 flex items-center justify-center gap-2 group relative overflow-hidden">
                            <span id="btn-text">Pay <span class="summary-price">${{ number_format($plan->price, 2) }}</span> & Continue</span>
                            <i id="btn-icon" class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                            
                            <!-- Loading spinner -->
                            <div id="btn-loader" class="hidden absolute inset-0 bg-indigo-700 flex items-center justify-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Processing Payment...</span>
                            </div>
                        </button>
                    </form>
                </div>
                
                <!-- Success Overlay -->
                <div id="success-overlay" class="absolute inset-0 bg-white/95 backdrop-blur-sm rounded-3xl z-10 hidden flex-col items-center justify-center p-8 text-center">
                    <div class="w-16 h-16 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center text-3xl mb-4 border-4 border-white shadow-lg shadow-blue-500/20 scale-0 transition-transform duration-500" id="success-icon">
                        <i class="fa-solid fa-spinner fa-spin"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2 opacity-0 transition-opacity duration-500 delay-100" id="success-text">Waiting for Approval</h3>
                    <p class="text-slate-500 opacity-0 transition-opacity duration-500 delay-200 mb-6" id="success-sub">Admin is reviewing your payment. Please wait <span id="cooldown-timer" class="font-bold text-blue-600">60s</span>...</p>
                    <a href="https://t.me/admin" target="_blank" class="hidden opacity-0 transition-opacity duration-500 delay-300 px-6 py-2 bg-slate-100 text-slate-700 font-bold rounded-lg hover:bg-slate-200" id="success-btn"><i class="fa-brands fa-telegram mr-2"></i> Contact Admin</a>
                </div>
            </div>
            
        </div>
    </main>

    <footer class="text-center py-6 text-slate-400 text-sm border-t border-slate-200/50 mt-auto bg-white/50">
        &copy; {{ date('Y') }} Mekong CyberUnit. Mockup Checkout Process.
    </footer>

    <style>
        .animate-fade-in { animation: fadeIn 0.3s ease-in-out forwards; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
        
        .scanner-animate { animation: scan 2.5s ease-in-out infinite; display: block !important; }
        @keyframes scan {
            0% { transform: translateY(0); opacity: 0; }
            5% { opacity: 1; }
            95% { opacity: 1; transform: translateY(250px); }
            100% { opacity: 0; transform: translateY(256px); }
        }
    </style>

    <script>
        let selectedMonths = 1;
        const monthlyPrice = {{ $plan->price }};
        const baseYearlyPrice = {{ $plan->yearly_price ?? ($plan->price * 12 * 0.9) }};
        const monthlyPriceForYear = baseYearlyPrice / 12;

        function changeMonths(delta) {
            let val = parseInt(document.getElementById('input-months').value);
            val += delta;
            if (val < 1) val = 1;
            if (val > 60) val = 60;
            setMonths(val);
        }

        function setMonths(months) {
            selectedMonths = months;
            document.getElementById('input-months').value = months;
            
            // Update UI text
            const durationText = document.getElementById('duration-text');
            durationText.innerText = months + (months > 1 ? ' Months' : ' Month');
            
            // Update summary cycle
            const summaryCycle = document.getElementById('summary-cycle');
            summaryCycle.innerText = months + (months > 1 ? ' Months' : ' Month');

            // Handle discount logic
            const discountBadge = document.getElementById('discount-badge');
            let unitPrice = monthlyPrice;
            
            if (months >= 12) {
                discountBadge.classList.remove('hidden');
                unitPrice = monthlyPriceForYear;
            } else {
                discountBadge.classList.add('hidden');
            }

            const totalPrice = unitPrice * months;
            
            // Update all price elements
            document.querySelectorAll('.summary-price').forEach(el => {
                el.innerText = '$' + totalPrice.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
            });

            // Update preset buttons styling
            document.querySelectorAll('.preset-btn').forEach(btn => {
                if (parseInt(btn.dataset.months) === months) {
                    btn.className = 'preset-btn py-2 rounded-lg text-xs font-bold border transition-all bg-blue-50 text-blue-600 border-blue-500';
                } else {
                    btn.className = 'preset-btn py-2 rounded-lg text-xs font-bold border border-slate-200 hover:border-blue-500 transition-all text-slate-600';
                }
            });
        }

        function switchMethod(method) {
            // Update tabs
            const tabKhqr = document.getElementById('tab-khqr');
            const tabCard = document.getElementById('tab-card');
            
            if (method === 'khqr') {
                tabKhqr.className = 'flex-1 border-2 border-blue-600 bg-blue-50 rounded-xl p-3 flex items-center justify-center gap-2 text-blue-700 font-bold transition-colors';
                tabCard.className = 'flex-1 border-2 border-slate-100 hover:border-slate-200 rounded-xl p-3 flex items-center justify-center gap-2 text-slate-500 font-bold transition-colors';
                document.getElementById('method-khqr').classList.remove('hidden');
                document.getElementById('method-khqr').classList.add('block');
                document.getElementById('method-card').classList.add('hidden');
                document.getElementById('method-card').classList.remove('block');
            } else {
                tabCard.className = 'flex-1 border-2 border-blue-600 bg-blue-50 rounded-xl p-3 flex items-center justify-center gap-2 text-blue-700 font-bold transition-colors';
                tabKhqr.className = 'flex-1 border-2 border-slate-100 hover:border-slate-200 rounded-xl p-3 flex items-center justify-center gap-2 text-slate-500 font-bold transition-colors';
                document.getElementById('method-card').classList.remove('hidden');
                document.getElementById('method-card').classList.add('block');
                document.getElementById('method-khqr').classList.add('hidden');
                document.getElementById('method-khqr').classList.remove('block');
            }
        }

        // Simple input formatters
        function formatCard(e) {
            let v = e.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            let matches = v.match(/\d{4,16}/g);
            let match = matches && matches[0] || '';
            let parts = [];
            for (i=0, len=match.length; i<len; i+=4) {
                parts.push(match.substring(i, i+4))
            }
            if (parts.length) { e.value = parts.join(' ') } else { e.value = v }
        }
        function formatExpiry(e) {
            let v = e.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            if (v.length >= 2 && !v.includes('/')) {
                e.value = v.substring(0,2) + '/' + v.substring(2);
            }
        }
        
        let pollInterval;
        let cooldown = 60;
        let pToken = '';

        function submitKHQR(e) {
            e.preventDefault();
            const scanner = document.getElementById('qr-scanner');
            const btn = document.getElementById('btn-submit-khqr');
            const name = document.getElementById('khqr-name').value;
            const contact = document.getElementById('khqr-contact').value;
            
            scanner.classList.add('scanner-animate');
            btn.innerHTML = '<span><i class="fa-solid fa-spinner fa-spin mr-2"></i> Sending to Admin...</span>';
            btn.classList.add('opacity-70', 'pointer-events-none');
            
            setTimeout(() => {
                notifyServerAndSuccess('KHQR', name, contact);
            }, 1000);
        }

        function handlePayment(e, type) {
            if(e) e.preventDefault();
            
            const btnLoader = document.getElementById('btn-loader');
            btnLoader.classList.remove('hidden');
            
            const name = e.target.querySelector('input[placeholder="John Doe"]').value;
            
            setTimeout(() => {
                notifyServerAndSuccess('Credit Card', name, 'N/A');
            }, 1000);
        }
        
        function notifyServerAndSuccess(method, name, contact) {
            fetch("{{ route('checkout.notify', $plan->id) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ 
                    method: method, 
                    name: name, 
                    contact: contact,
                    billing_cycle: selectedMonths >= 12 ? 'yearly' : 'monthly',
                    months: selectedMonths,
                    total_amount: document.querySelector('.summary-price').innerText.replace('$', '').replace(',', '')
                })
            }).then(response => response.json())
            .then(data => {
                if (data.success && data.token) {
                    pToken = data.token;
                    showWaiting();
                    startPolling();
                } else {
                    showErrorState('Request failed to send.');
                }
            }).catch(() => {
                showErrorState('Network Error: Failed to contact server.');
            });
        }
        
        function showWaiting() {
            const overlay = document.getElementById('success-overlay');
            const icon = document.getElementById('success-icon');
            const text = document.getElementById('success-text');
            const sub = document.getElementById('success-sub');
            
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
            
            setTimeout(() => {
                icon.classList.remove('scale-0');
                text.classList.remove('opacity-0');
                sub.classList.remove('opacity-0');
            }, 50);
        }

        function startPolling() {
            const timerEl = document.getElementById('cooldown-timer');
            const intervalTimer = setInterval(() => {
                cooldown--;
                timerEl.innerText = cooldown + 's';
                if (cooldown <= 0) {
                    clearInterval(intervalTimer);
                    clearInterval(pollInterval);
                    showTimeoutState();
                }
            }, 1000);

            pollInterval = setInterval(() => {
                fetch("/checkout/{{ $plan->id }}/status/" + pToken)
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'approved') {
                            clearInterval(intervalTimer);
                            clearInterval(pollInterval);
                            showApprovedState();
                        } else if (data.status === 'rejected') {
                            clearInterval(intervalTimer);
                            clearInterval(pollInterval);
                            showRejectedState();
                        }
                    }).catch(e => console.error(e));
            }, 3000); // poll every 3 seconds
        }

        function showApprovedState() {
            const icon = document.getElementById('success-icon');
            const text = document.getElementById('success-text');
            const sub = document.getElementById('success-sub');
            
            icon.className = "w-16 h-16 bg-green-100 text-green-500 rounded-full flex items-center justify-center text-3xl mb-4 border-4 border-white shadow-lg shadow-green-500/20 transition-all duration-500";
            icon.innerHTML = '<i class="fa-solid fa-check"></i>';
            text.innerText = "Payment Approved!";
            sub.innerText = "Redirecting you to registration securely...";
            
            setTimeout(() => {
                window.location.href = "/register-company/{{ $plan->id }}?token=" + pToken;
            }, 1500);
        }

        function showRejectedState() {
            const icon = document.getElementById('success-icon');
            const text = document.getElementById('success-text');
            const sub = document.getElementById('success-sub');
            const btn = document.getElementById('success-btn');
            
            icon.className = "w-16 h-16 bg-red-100 text-red-500 rounded-full flex items-center justify-center text-3xl mb-4 border-4 border-white shadow-lg shadow-red-500/20";
            icon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
            text.innerText = "Payment Rejected";
            sub.innerHTML = "Your payment was not approved. Please contact the administrator.";
            btn.classList.remove('hidden', 'opacity-0');
        }

        function showTimeoutState() {
            const icon = document.getElementById('success-icon');
            const text = document.getElementById('success-text');
            const sub = document.getElementById('success-sub');
            const btn = document.getElementById('success-btn');
            
            icon.className = "w-16 h-16 bg-yellow-100 text-yellow-500 rounded-full flex items-center justify-center text-3xl mb-4 border-4 border-white shadow-lg shadow-yellow-500/20";
            icon.innerHTML = '<i class="fa-solid fa-clock"></i>';
            text.innerText = "Still Waiting...";
            sub.innerHTML = "The administrator hasn't replied yet. You can keep waiting or contact them directly via Telegram.";
            btn.classList.remove('hidden', 'opacity-0');

            // keep polling slowly
            pollInterval = setInterval(() => {
                fetch("/checkout/{{ $plan->id }}/status/" + pToken)
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'approved') showApprovedState();
                        else if (data.status === 'rejected') { clearInterval(pollInterval); showRejectedState(); }
                    }).catch(e => console.error(e));
            }, 5000);
        }

        function showErrorState(message) {
            showWaiting();
            const icon = document.getElementById('success-icon');
            const text = document.getElementById('success-text');
            const sub = document.getElementById('success-sub');
            const btn = document.getElementById('success-btn');
            
            icon.className = "w-16 h-16 bg-red-100 text-red-500 rounded-full flex items-center justify-center text-3xl mb-4 border-4 border-white shadow-lg shadow-red-500/20";
            icon.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i>';
            text.innerText = "Error Occurred";
            sub.innerHTML = message;
            btn.classList.remove('hidden', 'opacity-0');
        }
    </script>
</body>
</html>
