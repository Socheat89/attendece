<x-layouts.admin page-title="Live Map">
    <div class="px-4 py-6 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Live Employee Map</h1>
                <p class="mt-2 text-sm text-slate-500">Real-time view of employees who have checked in today.</p>
            </div>
            <div class="flex gap-2">
                <span class="inline-flex items-center rounded-md bg-green-50 px-2.5 py-1.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                    <span class="w-2 h-2 mr-1.5 bg-green-500 rounded-full animate-pulse"></span>
                    Live Tracking
                </span>
            </div>
        </div>

        <div class="bg-white shadow-sm ring-1 ring-slate-200 rounded-xl overflow-hidden relative z-0" style="height: 600px; min-height: 600px;">
            <div id="map" style="width: 100%; height: 100%; min-height: 600px;"></div>
        </div>
    </div>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
    
    <style>
        /* Modern tooltip/popup styling */
        .leaflet-popup-content-wrapper {
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }
        .leaflet-popup-content {
            margin: 12px 16px;
        }
        .custom-div-icon {
            background: transparent;
            border: none;
        }
    </style>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize map with a default center (Phnom Penh)
            var map = L.map('map').setView([11.5564, 104.9282], 12);

            // Use a clean, modern map tile layer (CartoDB Voyager)
            L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; OpenStreetMap contributors &copy; CARTO',
                subdomains: 'abcd',
                maxZoom: 20
            }).addTo(map);

            var markers = {};
            var firstLoad = true;

            function fetchLocations() {
                fetch('{{ route("admin.live-map.data") }}', {
                    headers: { 'Accept': 'application/json' }
                })
                .then(response => response.json())
                .then(data => {
                    data.forEach(location => {
                        var emp = location.employee;
                        var name = emp?.user?.name || 'Unknown';
                        var employeeId = emp?.employee_id || '#';
                        var time = new Date(location.tracked_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                        var latLng = [location.latitude, location.longitude];
                        
                        var popupContent = `
                            <div class="font-sans min-w-[150px]">
                                <div class="font-bold text-slate-800 text-sm tracking-tight">${name}</div>
                                <div class="text-xs text-slate-400 font-medium">${employeeId}</div>
                                <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-xs text-slate-500">Updated</span>
                                    <span class="text-xs font-semibold text-slate-700">${time}</span>
                                </div>
                            </div>
                        `;

                        // Create a nicer marker icon with initials
                        var initials = name.substring(0,2).toUpperCase();
                        var customIcon = L.divIcon({
                            className: 'custom-div-icon',
                            html: `
                                <div style="translate: -50% -100%" class="relative cursor-pointer group">
                                    <div class="w-10 h-10 bg-blue-600 rounded-full border-2 border-white shadow-md flex items-center justify-center text-white font-bold text-sm z-10 relative group-hover:bg-blue-700 transition-colors">
                                        ${initials}
                                    </div>
                                    <!-- Tail pointer -->
                                    <div class="absolute bottom-[-6px] left-1/2 -mt-1 w-3 h-3 bg-blue-600 border-r-2 border-b-2 border-white transform -translate-x-1/2 rotate-45 z-0 group-hover:bg-blue-700 transition-colors"></div>
                                </div>
                            `,
                            iconSize: [40, 48],
                            iconAnchor: [0, 0] // Adjusted via translate
                        });

                        if (markers[location.employee_id]) {
                            // Update existing marker
                            markers[location.employee_id].setLatLng(latLng);
                            markers[location.employee_id].setPopupContent(popupContent);
                        } else {
                            // Create new marker
                            markers[location.employee_id] = L.marker(latLng, { icon: customIcon })
                                .bindPopup(popupContent)
                                .addTo(map);
                        }
                    });
                    
                    // Fit map bounds on first load if markers exist
                    if(firstLoad && Object.keys(markers).length > 0) {
                        var group = new L.featureGroup(Object.values(markers));
                        map.fitBounds(group.getBounds().pad(0.1));
                        firstLoad = false;
                    }
                })
                .catch(error => console.error('Error fetching map data:', error));
            }

            // Fetch immediately
            fetchLocations();

            // Refresh data every 30 seconds
            setInterval(fetchLocations, 30000);
        });
    </script>
</x-layouts.admin>
