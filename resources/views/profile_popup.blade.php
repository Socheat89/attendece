<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Profile Popup (Static)</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 p-6">

  <div class="max-w-4xl mx-auto">
    <button id="openProfile" class="px-4 py-2 bg-blue-600 text-white rounded-md">Open Profile</button>
  </div>

  <!-- Modal backdrop -->
  <div id="profileModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="w-full max-w-2xl mx-4 bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
      <div class="p-4 flex items-start justify-between">
        <div class="flex items-center gap-4">
          <img class="w-20 h-20 rounded-full border-4 border-white shadow-md" src="/images/avatar-default.jpg" alt="Avatar">
          <div>
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Sokha Chan</h2>
            <p class="text-sm text-gray-500 dark:text-gray-300">Frontend Developer · Phnom Penh</p>
          </div>
        </div>
        <button id="closeProfile" class="text-gray-500 hover:text-gray-700">✕</button>
      </div>

      <div class="px-6 pb-6">
        <p class="text-sm text-gray-600 dark:text-gray-300">Bio: Passionate about building clean, accessible interfaces. Loves coffee and Khmer music.</p>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
          <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center">
            <div class="text-sm text-gray-500 dark:text-gray-300">Attendance</div>
            <div class="mt-1 text-xl font-bold text-gray-900 dark:text-white">98%</div>
          </div>
          <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center">
            <div class="text-sm text-gray-500 dark:text-gray-300">Leaves</div>
            <div class="mt-1 text-xl font-bold text-gray-900 dark:text-white">2 / 12</div>
          </div>
          <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-center">
            <div class="text-sm text-gray-500 dark:text-gray-300">Overtime</div>
            <div class="mt-1 text-xl font-bold text-gray-900 dark:text-white">5h</div>
          </div>
        </div>

        <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-4">
          <div class="lg:col-span-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <h3 class="font-medium text-gray-800 dark:text-gray-100">Recent Activity</h3>
            <ul class="mt-3 space-y-3 text-sm text-gray-600 dark:text-gray-300">
              <li class="flex justify-between"><span>Checked in</span><span class="text-gray-500">Today · 08:02</span></li>
              <li class="flex justify-between"><span>Requested leave</span><span class="text-gray-500">Mar 01</span></li>
              <li class="flex justify-between"><span>Overtime approved</span><span class="text-gray-500">Feb 27</span></li>
            </ul>
          </div>

          <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <h3 class="font-medium text-gray-800 dark:text-gray-100">Contact</h3>
            <div class="mt-3 text-sm text-gray-600 dark:text-gray-300 space-y-2">
              <div>Email: sokha@example.com</div>
              <div>Phone: +855 12 345 678</div>
              <div>Department: Marketing</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const openBtn = document.getElementById('openProfile');
    const closeBtn = document.getElementById('closeProfile');
    const modal = document.getElementById('profileModal');
    openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
    closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
    modal.addEventListener('click', (e) => { if (e.target === modal) modal.classList.add('hidden'); });
  </script>
</body>
</html>
