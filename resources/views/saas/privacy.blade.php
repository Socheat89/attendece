<!DOCTYPE html>
<html lang="km" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>គោលការណ៍ភាពឯកជន | Mekong CyberUnit</title>
    <meta name="description" content="គោលការណ៍ភាពឯកជន Mekong CyberUnit SaaS Platform">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Hanuman:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Hanuman', serif; background-color: #0F172A; }
        .heading-font { font-family: 'Outfit', sans-serif; }
        .prose-km h2 { font-size: 1.2rem; font-weight: 700; color: #a78bfa; margin-top: 2rem; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem; }
        .prose-km p { color: #94a3b8; line-height: 2; margin-bottom: 1rem; font-size: 0.95rem; }
        .prose-km ul { list-style: none; padding: 0; margin-bottom: 1rem; }
        .prose-km ul li { color: #94a3b8; padding: 0.35rem 0 0.35rem 1.5rem; position: relative; font-size: 0.95rem; line-height: 1.9; }
        .prose-km ul li::before { content: "•"; position: absolute; left: 0; color: #8b5cf6; font-weight: bold; }
    </style>
</head>
<body class="antialiased min-h-screen text-white">

    <!-- Background -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-[20%] -right-[10%] w-[60vw] h-[60vw] rounded-full bg-purple-900/20 blur-[120px]"></div>
        <div class="absolute bottom-0 -left-[10%] w-[40vw] h-[40vw] rounded-full bg-blue-900/15 blur-[100px]"></div>
    </div>

    <!-- Navbar -->
    <nav class="relative z-20 w-full border-b border-white/10 bg-slate-900/60 backdrop-blur-md sticky top-0">
        <div class="max-w-4xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <i class="fa-solid fa-bolt-lightning text-white text-sm"></i>
                </div>
                <span class="heading-font font-bold text-lg text-white leading-none">Mekong<span class="text-blue-400">CyberUnit</span></span>
            </a>
            <a href="{{ url('/') }}" class="text-sm text-slate-400 hover:text-white transition-colors flex items-center gap-2">
                <i class="fa-solid fa-arrow-left text-xs"></i> ត្រឡប់ទៅផ្ទះ
            </a>
        </div>
    </nav>

    <!-- Content -->
    <main class="relative z-10 max-w-4xl mx-auto px-6 py-16">

        <!-- Header -->
        <div class="mb-12 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-purple-500/10 border border-purple-500/30 text-purple-400 text-xs font-bold uppercase tracking-widest mb-6">
                <i class="fa-solid fa-shield-halved"></i> ភាពឯកជន & សុវត្ថិភាព
            </div>
            <h1 class="heading-font text-4xl font-extrabold text-white mb-4">គោលការណ៍ភាពឯកជន</h1>
            <p class="text-slate-400 text-sm">បានធ្វើបច្ចុប្បន្នភាព៖ {{ date('d/m/Y') }} &nbsp;|&nbsp; Mekong CyberUnit SaaS Platform</p>
        </div>

        <!-- Card -->
        <div class="bg-slate-800/40 border border-slate-700/50 rounded-3xl p-8 md:p-12 backdrop-blur-sm prose-km">

            <div class="p-4 rounded-xl bg-purple-500/10 border border-purple-500/20 mb-8 flex gap-3">
                <i class="fa-solid fa-lock text-purple-400 mt-1 flex-shrink-0"></i>
                <p class="!mb-0 !text-purple-200 text-sm">ភាពឯកជនរបស់អ្នកមានសារៈសំខាន់ខ្លាំងណាស់សម្រាប់យើង។ គោលការណ៍នេះពន្យល់ពីរបៀបដែលយើងប្រមូល ប្រើប្រាស់ និងការពារព័ត៌មានរបស់អ្នក។</p>
            </div>

            <h2><i class="fa-solid fa-database text-purple-400"></i> ១. ព័ត៌មានយើងប្រមូល</h2>
            <p>នៅពេលអ្នកប្រើ Platform យើងប្រមូលព័ត៌មានដូចខាងក្រោម:</p>
            <ul>
                <li><strong class="text-white">ព័ត៌មានក្រុមហ៊ុន</strong>: ឈ្មោះ អ៊ីមែល លេខទូរស័ព្ទ</li>
                <li><strong class="text-white">ព័ត៌មានបុគ្គលិក</strong>: ដែល Admin បញ្ចូលក្នុង Platform</li>
                <li><strong class="text-white">ទិន្នន័យប្រើប្រាស់</strong>: Log ចូល វត្តមាន ការទូទាត់</li>
                <li><strong class="text-white">ព័ត៌មានបច្ចេកទេស</strong>: Browser, IP Address, Device</li>
            </ul>

            <h2><i class="fa-solid fa-circle-check text-purple-400"></i> ២. របៀបយើងប្រើព័ត៌មាន</h2>
            <p>យើងប្រើព័ត៌មានរបស់អ្នក <strong class="text-white">តែ</strong> សម្រាប់:</p>
            <ul>
                <li>ផ្តល់ និងអភិវឌ្ឍ Platform និងសេវាកម្ម</li>
                <li>ដំណើរការ Payment និងការគ្រប់គ្រង Subscription</li>
                <li>ផ្ញើការជូនដំណឹងជាចាំបាច់ (ការ Update, Security Alert)</li>
                <li>ជួយដោះស្រាយបញ្ហា Support</li>
                <li>ធ្វើការវិភាគ Anonymous ដើម្បីកែលម្អ Platform</li>
            </ul>

            <h2><i class="fa-solid fa-lock text-purple-400"></i> ៣. ការផ្ទុក និងការការពារទិន្នន័យ</h2>
            <ul>
                <li>ទិន្នន័យរបស់ក្រុមហ៊ុននីមួយៗ ត្រូវបានបំបែកដោយ <strong class="text-white">Multi-Tenant Architecture</strong></li>
                <li>ព័ត៌មានសម្ងាត់ (Password) ត្រូវបាន Encrypt ដោយ <strong class="text-white">bcrypt algorithm</strong></li>
                <li>ការចូល Platform ប្រើ HTTPS/SSL ដើម្បីការពារ</li>
                <li>Server ត្រូវបានការពារ Firewall ហើយ Backup ទៀងទាត់រៀងរាល់ ២៤ម៉ោង</li>
            </ul>

            <h2><i class="fa-solid fa-users-slash text-purple-400"></i> ៤. ការចែករំលែកជាមួយភាគីទីបី</h2>
            <p>យើង <strong class="text-white">មិនលក់ ឬ ចែករំលែក</strong> ព័ត៌មានរបស់អ្នកជាមួយភាគីទីបី លើកលែងករណីដូចខាងក្រោម:</p>
            <ul>
                <li>ការតម្រូវតាមច្បាប់ ឬ ដីការតុលាការ</li>
                <li>ដៃគូ Infrastructure (Server, Hosting) ក្រោមកិច្ចសន្យាភាពសម្ងាត់</li>
                <li>ករណីបញ្ជូន Telegram Notification ជូន Admin (ដែល Admin ជ្រើសរើសដោយខ្លួនឯង)</li>
            </ul>

            <h2><i class="fa-solid fa-clock-rotate-left text-purple-400"></i> ៥. រយៈពេលរក្សាទុកទិន្នន័យ</h2>
            <ul>
                <li>ទិន្នន័យ Active Account ត្រូវបានរក្សាពេញ Subscription</li>
                <li>ក្រោយ Account ផុត ទិន្នន័យត្រូវរក្សា <strong class="text-white">៣០ ថ្ងៃ</strong> បន្ទាប់មកលុបចោល</li>
                <li>ប្រសិនបើ Account ត្រូវបានសុំ Delete ជម្រើស ទិន្នន័យនឹងត្រូវលុបក្នុង ៧ ថ្ងៃ</li>
            </ul>

            <h2><i class="fa-solid fa-user-check text-purple-400"></i> ៦. សិទ្ធិរបស់អ្នក</h2>
            <p>អ្នកមានសិទ្ធ:</p>
            <ul>
                <li>ស្នើសុំ Export ទិន្នន័យរបស់ក្រុមហ៊ុនអ្នក</li>
                <li>កែប្រែ ឬ លុបព័ត៌មានបុគ្គលិក</li>
                <li>ស្នើសុំ Delete Account ក្នុងពេលណាក៏បាន</li>
                <li>ទទួល Privacy Report អំពីទិន្នន័យដែលយើងផ្ទុក</li>
            </ul>

            <h2><i class="fa-solid fa-cookie-bite text-purple-400"></i> ៧. Cookies</h2>
            <p>Platform ប្រើ Cookie ដើម្បី:</p>
            <ul>
                <li>រក្សា Session Login (ចាំបាច់)</li>
                <li>ចងចាំ Setting ដែលអ្នកបានជ្រើស</li>
                <li>ការពារ CSRF Security</li>
            </ul>
            <p>យើង <strong class="text-white">មិន</strong>ប្រើ Cookie សម្រាប់ Tracking ឬ Advertising។</p>

            <h2><i class="fa-solid fa-child-reaching text-purple-400"></i> ៨. ការការពារកុមារ</h2>
            <p>Platform នេះ មិនត្រូវបានបម្រើឱ្យអ្នកដែលអាយុក្រោម <strong class="text-white">១៨ ឆ្នាំ</strong>។ ប្រសិនបើយើងដឹងថាបានប្រមូលព័ត៌មានពីកុមារ យើងនឹងលុបជាបន្ទាន់។</p>

            <h2><i class="fa-solid fa-pen-to-square text-purple-400"></i> ៩. ការផ្លាស់ប្តូរគោលការណ៍</h2>
            <p>យើងអាចធ្វើបច្ចុប្បន្នភាពគោលការណ៍ឯកជននេះ ហើយនឹងជូនដំណឹងដល់អ្នកប្រើប្រាស់តាមរយៈ អ៊ីមែល ឬការជូនដំណឹងក្នុង Platform។ ការប្រើ Platform ជាបន្តបន្ទាប់ ក្រោយការផ្លាស់ប្ដូរ ចាត់ទុកថាបានយល់ព្រម។</p>

            <h2><i class="fa-solid fa-envelope text-purple-400"></i> ១០. ទំនាក់ទំនង</h2>
            <p>ប្រសិនបើអ្នកមានសំណួរអំពីគោលការណ៍ភាពឯកជន ឬ ចង់ស្នើសុំ Data Export:</p>
            <ul>
                <li>អ៊ីមែល: <strong class="text-white">privacy@besthrm.app</strong></li>
                <li>Telegram: <a href="https://t.me/SOCHEAT_DOEM" target="_blank" class="text-blue-400 hover:text-blue-300">@SOCHEAT_DOEM</a></li>
            </ul>

        </div>

        <!-- Back -->
        <div class="mt-8 text-center">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white border border-slate-700 rounded-xl font-medium transition-all">
                <i class="fa-solid fa-arrow-left text-xs"></i> ត្រឡប់ទៅទំព័រដើម
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 border-t border-white/10 py-8 mt-16">
        <div class="max-w-4xl mx-auto px-6 text-center text-slate-500 text-sm">
            &copy; {{ date('Y') }} Mekong CyberUnit. រក្សាសិទ្ធគ្រប់យ៉ាង។
            <span class="mx-2">|</span>
            <a href="{{ route('terms') }}" class="hover:text-blue-400 transition-colors">លក្ខខណ្ឌប្រើប្រាស់</a>
        </div>
    </footer>

</body>
</html>
