<!DOCTYPE html>
<html lang="km" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>លក្ខខណ្ឌប្រើប្រាស់ | Mekong CyberUnit</title>
    <meta name="description" content="លក្ខខណ្ឌប្រើប្រាស់សេវាកម្ម Mekong CyberUnit SaaS Platform">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Hanuman:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Hanuman', serif; background-color: #0F172A; }
        .heading-font { font-family: 'Outfit', sans-serif; }
        .prose-km h2 { font-size: 1.2rem; font-weight: 700; color: #93c5fd; margin-top: 2rem; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem; }
        .prose-km p { color: #94a3b8; line-height: 2; margin-bottom: 1rem; font-size: 0.95rem; }
        .prose-km ul { list-style: none; padding: 0; margin-bottom: 1rem; }
        .prose-km ul li { color: #94a3b8; padding: 0.35rem 0 0.35rem 1.5rem; position: relative; font-size: 0.95rem; line-height: 1.9; }
        .prose-km ul li::before { content: "•"; position: absolute; left: 0; color: #3b82f6; font-weight: bold; }
    </style>
</head>
<body class="antialiased min-h-screen text-white">

    <!-- Background -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-[20%] -right-[10%] w-[60vw] h-[60vw] rounded-full bg-blue-900/20 blur-[120px]"></div>
        <div class="absolute bottom-0 -left-[10%] w-[40vw] h-[40vw] rounded-full bg-indigo-900/20 blur-[100px]"></div>
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
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 text-xs font-bold uppercase tracking-widest mb-6">
                <i class="fa-solid fa-file-contract"></i> ឯកសារផ្លូវការ
            </div>
            <h1 class="heading-font text-4xl font-extrabold text-white mb-4">លក្ខខណ្ឌប្រើប្រាស់</h1>
            <p class="text-slate-400 text-sm">បានធ្វើបច្ចុប្បន្នភាព៖ {{ date('d/m/Y') }} &nbsp;|&nbsp; Mekong CyberUnit SaaS Platform</p>
        </div>

        <!-- Card -->
        <div class="bg-slate-800/40 border border-slate-700/50 rounded-3xl p-8 md:p-12 backdrop-blur-sm prose-km">

            <div class="p-4 rounded-xl bg-blue-500/10 border border-blue-500/20 mb-8 flex gap-3">
                <i class="fa-solid fa-circle-info text-blue-400 mt-1 flex-shrink-0"></i>
                <p class="!mb-0 !text-blue-200 text-sm">សូមអានលក្ខខណ្ឌទាំងនេះដោយប្រុងប្រយ័ត្ន មុននឹងប្រើប្រាស់ Platform របស់យើង។ ការប្រើប្រាស់ Platform គឺជាការទទួលស្គាល់ថាអ្នកយល់ព្រមជាមួយលក្ខខណ្ឌទាំងនេះ។</p>
            </div>

            <h2><i class="fa-solid fa-building text-blue-400"></i> ១. អំពី Mekong CyberUnit</h2>
            <p>Mekong CyberUnit គឺជា Platform គ្រប់គ្រងធនធានមនុស្ស (HRM) ប្រភេទ SaaS ដែលផ្តល់ជូននូវដំណោះស្រាយសម្រាប់ស្ថាប័ន និងក្រុមហ៊ុននានា។ Platform នេះត្រូវបានរចនា និងអភិវឌ្ឍដោយក្រុមការងារ MekongCyberUnit ជាមួយគោលបំណងជួយអ្នកគ្រប់គ្រងធ្វើការងារបានកាន់តែឆ្លាតវៃ។</p>

            <h2><i class="fa-solid fa-handshake text-blue-400"></i> ២. ការទទួលស្គាល់លក្ខខណ្ឌ</h2>
            <p>ដោយការចូលប្រើ បង្កើតគណនី ឬប្រើប្រាស់ Platform យើង អ្នកយល់ព្រមថាអ្នកបានអាន យល់ ហើយព្រមទទួលខ្លួនតាមលក្ខខណ្ឌប្រើប្រាស់ទាំងអស់។ ប្រសិនបើអ្នកមិនយល់ព្រម សូមមិនប្រើ Platform របស់យើង។</p>

            <h2><i class="fa-solid fa-user-shield text-blue-400"></i> ៣. គណនី និងសុវត្ថិភាព</h2>
            <ul>
                <li>អ្នកទទួលខុសត្រូវក្នុងការរក្សាទុកពាក្យសម្ងាត់ និងព័ត៌មានចូល (Credentials) ជាសម្ងាត់</li>
                <li>ក្រុមហ៊ុននីមួយៗនឹងទទួលបាន Workspace ដាច់ដោយឡែក ហើយទិន្នន័យរបស់ក្រុមហ៊ុនមួយ មិនអាចមើលឃើញដោយក្រុមហ៊ុនផ្សេង</li>
                <li>អ្នកត្រូវប្រគល់ជូនភ្លាមៗ ប្រសិនបើជឿថាគណនីត្រូវបានចូលដោយអ្នកមិនមានសិទ្ធ</li>
                <li>យើងរក្សាសិទ្ធលុបចោលគណនី ដែលបំពានលក្ខខណ្ឌ ឬប្រព្រឹត្តខុសច្បាប់</li>
            </ul>

            <h2><i class="fa-solid fa-credit-card text-blue-400"></i> ៤. ការបង់ថ្លៃ និងការជាវ</h2>
            <ul>
                <li>ថ្លៃជាវត្រូវបង់ជាមុន ហើយមិនអាចដក្ (Refund) វិញបានក្រោយការបង់</li>
                <li>ការអនុម័ត Payment ត្រូវធ្វើដោយ Admin ក្នុងរយៈពេល ១ ថ្ងៃការងារ</li>
                <li>យើងអាចផ្លាស់ប្តូរតម្លៃ ដោយជូនដំណឹងជាមុន ១ ខែ</li>
                <li>Plan Trial (ឥតបង់ថ្លៃ) មានរយៈពេល ៧ ថ្ងៃ ហើយអាចដំឡើង Plan ពេលណាក៏បាន</li>
                <li>ក្រុមហ៊ុនដែល Subscription ផុតកំណត់ ស្ថានការណ៍ Data នឹងត្រូវបានរក្សាទុករយៈពេល ៣០ ថ្ងៃ</li>
            </ul>

            <h2><i class="fa-solid fa-ban text-blue-400"></i> ៥. អ្វីដែលមិនត្រូវធ្វើ</h2>
            <ul>
                <li>ប្រើ Platform ដើម្បីផ្ទុកទិន្នន័យខុសច្បាប់ ឬធ្វើការ Hack</li>
                <li>ព្យាយាមចូលទៅ Workspace ក្រុមហ៊ុនផ្សេង</li>
                <li>ចែករំលែក Login ជាមួយអ្នកផ្សេង ដែលមិនមែនជាបុគ្គលិក</li>
                <li>Reverse engineer ឬ Copy ប្រព័ន្ធ Platform</li>
                <li>ផ្ញើ Spam ឬ Malware តាម Platform</li>
            </ul>

            <h2><i class="fa-solid fa-database text-blue-400"></i> ៦. ភាពជាម្ចាស់ទិន្នន័យ</h2>
            <p>ទិន្នន័យដែលអ្នក Upload ចូល Platform (ព័ត៌មានបុគ្គលិក ឯកសារ ។ល។) ជាកម្មសិទ្ធិរបស់ <strong class="text-white">ក្រុមហ៊ុនរបស់អ្នកផ្ទាល់</strong>។ យើងនឹង មិនប្រើ ឬ លក់ ទិន្នន័យដែលជាកម្មសិទ្ធិអ្នកជូនភាគីទីបី ដោយគ្មានការអនុញ្ញាត លើកលែងតែករណីដែលតម្រូវដោយច្បាប់។</p>

            <h2><i class="fa-solid fa-triangle-exclamation text-blue-400"></i> ៧. ដែនកំណត់ទំនួលខុសត្រូវ</h2>
            <p>Mekong CyberUnit នឹងខិតខំផ្តល់ Uptime ៩៩% ។ ប៉ុន្តែ យើងមិនទទួលខុសត្រូវចំពោះការខាតបង់ ឬការបំផ្លាញ ដែលកើតឡើងដោយ:</p>
            <ul>
                <li>ភាពខ្លាំងស្វ័យ (Force Majeure) ដូចជា គ្រោះធម្មជាតិ ឬ ទំនាស់</li>
                <li>ការខូចខាតខ្សែអ៊ិនធឺណិត ឬ Server ផ្នែកភាគីទីបី</li>
                <li>ទិន្នន័យបាត់ ដែលមកពីការប្រើប្រាស់មិនត្រឹមត្រូវ</li>
            </ul>

            <h2><i class="fa-solid fa-gavel text-blue-400"></i> ៨. ច្បាប់ជំនះ</h2>
            <p>លក្ខខណ្ឌប្រើប្រាស់ទាំងនេះ ស្ថិតក្រោមច្បាប់ <strong class="text-white">ព្រះរាជាណាចក្រកម្ពុជា</strong>។ ករណីដែលមានជម្លោះ ត្រូវដោះស្រាយតាមលទ្ធភាពសុក្រិតក្នុងដំបូង ហើយប្រសិនបើមិនដោះស្រាយបាន ត្រូវយកទៅ ស្ថាប័នផ្លូវការ ដែលស្ថិតនៅក្នុងរាជធានីភ្នំពេញ ដើម្បីដោះស្រាយ។</p>

            <h2><i class="fa-solid fa-envelope text-blue-400"></i> ៩. ទំនាក់ទំនង</h2>
            <p>ប្រសិនបើអ្នកមានសំណួរអំពីលក្ខខណ្ឌប្រើប្រាស់ទាំងនេះ សូមទំនាក់ទំនងមកយើង:</p>
            <ul>
                <li>អ៊ីមែល: <strong class="text-white">support@besthrm.app</strong></li>
                <li>Telegram: <strong class="text-white">@MekongCyberUnit</strong></li>
            </ul>

        </div>

        <!-- Back Button -->
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
            <a href="{{ route('privacy') }}" class="hover:text-blue-400 transition-colors">គោលការណ៍ភាពឯកជន</a>
        </div>
    </footer>

</body>
</html>
