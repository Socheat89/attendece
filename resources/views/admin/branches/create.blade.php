<x-layouts.admin>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.min.css">
<style>
    #branch-map { height: 380px; border-radius: 0.5rem; border: 1px solid #e2e8f0; z-index: 10; }
    .map-coords { font-size: 0.875rem; color: #64748b; margin-top: 0.25rem; }
    .leaflet-control-container .leaflet-routing-container-hide { display: none; }
</style>

<div class="mb-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-slate-800 tracking-tight">{{ isset($branch) ? __('Edit Branch') : __('Create Branch') }}</h2>
        <a href="{{ route('admin.branches.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            {{ __('Back to List') }}
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <form method="POST" action="{{ isset($branch) ? route('admin.branches.update', $branch) : route('admin.branches.store') }}" id="branchForm">
        @csrf @if(isset($branch)) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">{{ __('Name') }}</label>
                <input name="name" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="{{ old('name', ($branch ?? null)?->name ?? '') }}" required placeholder="{{ __('e.g. Headquarters') }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">{{ __('Address') }}</label>
                <input name="address" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="{{ old('address', ($branch ?? null)?->address ?? '') }}" placeholder="{{ __('Full physical address') }}">
            </div>
        </div>

        {{-- Map Picker --}}
        <div class="mb-6">
            <label class="block text-sm font-medium text-slate-700 mb-1">
                {{ __('Location') }} <span class="text-slate-500 font-normal ml-1">({{ __('Click on map or drag marker to set') }})</span>
            </label>
            <div class="flex items-center gap-3 mb-3">
                <button type="button" class="inline-flex items-center px-3 py-1.5 border border-slate-300 shadow-sm text-xs font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors" id="locateBtn">
                    📍 {{ __('Use My Location') }}
                </button>
                <span class="map-coords font-mono" id="coordsDisplay"></span>
            </div>
            <div id="branch-map" class="shadow-inner relative z-0"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">{{ __('Latitude') }}</label>
                <input name="latitude" id="latInput" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm font-mono" value="{{ old('latitude', ($branch ?? null)?->latitude ?? '') }}" placeholder="e.g. 11.5564" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">{{ __('Longitude') }}</label>
                <input name="longitude" id="lngInput" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm font-mono" value="{{ old('longitude', ($branch ?? null)?->longitude ?? '') }}" placeholder="e.g. 104.9282" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">{{ __('allowed_radius_meters') }}</label>
                <div class="relative rounded-md shadow-sm">
                    <input name="allowed_radius_meters" id="radiusInput" type="number" min="10" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm pr-12" value="{{ old('allowed_radius_meters', ($branch ?? null)?->allowed_radius_meters ?? 300) }}">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-slate-500 sm:text-sm">{{ __('meters') }}</span>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">{{ __('Scan Mode') }}</label>
                <select name="scan_mode" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                    <option value="gps" @selected(old('scan_mode', ($branch ?? null)?->scan_mode ?? 'gps') === 'gps')>{{ __('GPS Only') }}</option>
                    <option value="qr" @selected(old('scan_mode', ($branch ?? null)?->scan_mode) === 'qr')>{{ __('QR Only') }}</option>
                    <option value="gps_qr" @selected(old('scan_mode', ($branch ?? null)?->scan_mode) === 'gps_qr')>{{ __('GPS + QR') }}</option>
                </select>
                <p class="mt-1 text-xs text-slate-500">{{ __('Method for employee verification.') }}</p>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
            <a href="{{ route('admin.branches.index') }}" class="bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium py-2 px-4 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-1">{{ __('Cancel') }}</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-6 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">{{ __('Save Branch') }}</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.min.js"></script>
<script>
(function () {
    // Initial position: use saved value, or Phnom Penh as default
    const initLat  = parseFloat(document.getElementById('latInput').value)  || 11.5564;
    const initLng  = parseFloat(document.getElementById('lngInput').value)  || 104.9282;
    const initZoom = document.getElementById('latInput').value ? 15 : 12;

    // Build map
    const map = L.map('branch-map').setView([initLat, initLng], initZoom);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
        maxZoom: 19
    }).addTo(map);

    // Marker
    const marker = L.marker([initLat, initLng], { draggable: true }).addTo(map);

    // Radius circle
    const radiusInput = document.getElementById('radiusInput');
    let circle = L.circle([initLat, initLng], {
        radius: parseInt(radiusInput.value) || 300,
        color: '#0f4c81', fillColor: '#0f4c81', fillOpacity: 0.12
    }).addTo(map);

    const latInput   = document.getElementById('latInput');
    const lngInput   = document.getElementById('lngInput');
    const display    = document.getElementById('coordsDisplay');

    function updateFields(lat, lng) {
        const lt = parseFloat(lat.toFixed(7));
        const ln = parseFloat(lng.toFixed(7));
        latInput.value = lt;
        lngInput.value = ln;
        display.textContent = `${lt}, ${ln}`;
        circle.setLatLng([lt, ln]);
        marker.setLatLng([lt, ln]);
    }

    // Click map → move marker
    map.on('click', function (e) {
        updateFields(e.latlng.lat, e.latlng.lng);
    });

    // Drag marker → update fields
    marker.on('dragend', function (e) {
        const pos = e.target.getLatLng();
        updateFields(pos.lat, pos.lng);
    });

    // Typing in inputs → move marker
    function onInputChange() {
        const lt = parseFloat(latInput.value);
        const ln = parseFloat(lngInput.value);
        if (!isNaN(lt) && !isNaN(ln)) {
            marker.setLatLng([lt, ln]);
            circle.setLatLng([lt, ln]);
            map.setView([lt, ln], map.getZoom());
            display.textContent = `${lt}, ${ln}`;
        }
    }
    latInput.addEventListener('input', onInputChange);
    lngInput.addEventListener('input', onInputChange);

    // Radius input → resize circle
    radiusInput.addEventListener('input', function () {
        const r = parseInt(this.value);
        if (!isNaN(r) && r > 0) circle.setRadius(r);
    });

    // Use My Location
    document.getElementById('locateBtn').addEventListener('click', function () {
        if (!navigator.geolocation) { alert('Geolocation not supported.'); return; }
        this.disabled = true;
        this.textContent = '⏳ Locating…';
        const btn = this;
        navigator.geolocation.getCurrentPosition(
            function (pos) {
                updateFields(pos.coords.latitude, pos.coords.longitude);
                map.setView([pos.coords.latitude, pos.coords.longitude], 16);
                btn.disabled = false;
                btn.textContent = '📍 Use My Location';
            },
            function () {
                alert('Could not get your location. Please pick manually on the map.');
                btn.disabled = false;
                btn.textContent = '📍 Use My Location';
            }
        );
    });

    // Show initial coords if pre-filled
    if (document.getElementById('latInput').value) {
        display.textContent = `${latInput.value}, ${lngInput.value}`;
    }
})();
</script>
</x-layouts.admin>
