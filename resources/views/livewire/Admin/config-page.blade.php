<div class="min-h-screen bg-slate-50 text-slate-800 font-sans selection:bg-indigo-500 selection:text-white pb-20">

    {{-- Inline CSS untuk Font (Sama dengan Home Page) --}}
    <style>
        @font-face {
            font-family: 'Coolvetica';
            src: url('/fonts/coolvetica.otf') format('opentype');
            font-weight: normal;
        }

        @font-face {
            font-family: 'CreatoDisplay';
            src: url('/fonts/CreatoDisplay-Regular.otf') format('opentype');
            font-weight: normal;
        }

        @font-face {
            font-family: 'CreatoDisplay';
            src: url('/fonts/CreatoDisplay-Bold.otf') format('opentype');
            font-weight: bold;
        }

        .font-brand {
            font-family: 'Coolvetica', sans-serif;
        }

        .font-body {
            font-family: 'CreatoDisplay', sans-serif;
        }

        /* Custom Scrollbar untuk sidebar */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    {{-- Container Utama --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Header Page --}}
        <div class="mb-8">
            <h1 class="text-3xl font-brand text-slate-900">Store Configuration</h1>
            <p class="text-slate-500 font-body">Manage your store settings, appearance, and operational details.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            {{-- SIDEBAR NAVIGATION (Discord Style with Dropdown) --}}
            <div class="lg:col-span-3 lg:sticky lg:top-10">
                <nav class="space-y-1" x-data="{ 
        openDropdown: null,
        activeTab: @entangle('activeTab')
    }">
                    {{-- Appearance Dropdown --}}
                    <div class="space-y-1">
                        <button
                            @click="openDropdown = openDropdown === 'appearance' ? null : 'appearance'"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 font-body font-bold text-sm group"
                            :class="['page', 'website'].includes(activeTab) 
                    ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30 ring-1 ring-indigo-500' 
                    : 'text-slate-500 hover:bg-slate-200/50 hover:text-slate-900'">

                            <i class="fas fa-palette w-5 text-center"
                                :class="['page', 'website'].includes(activeTab) ? 'text-indigo-100' : 'text-slate-400 group-hover:text-slate-600'"></i>
                            <span class="flex-1 text-left">Appearance</span>

                            <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                                :class="openDropdown === 'appearance' ? 'rotate-180' : ''"></i>
                        </button>

                        {{-- Submenu Appearance --}}
                        <div x-show="openDropdown === 'appearance'"
                            x-collapse
                            class="ml-4 space-y-1 border-l-2 border-slate-200 pl-2">

                            <button
                                wire:click="$set('activeTab', 'page')"
                                class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all duration-200 font-body text-sm"
                                :class="activeTab === 'page' 
                        ? 'bg-indigo-50 text-indigo-700 font-bold' 
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900'">
                                <i class="fas fa-info-circle w-4 text-center text-xs"></i>
                                Site Information
                            </button>

                            <button
                                wire:click="$set('activeTab', 'website')"
                                class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all duration-200 font-body text-sm"
                                :class="activeTab === 'website' 
                        ? 'bg-indigo-50 text-indigo-700 font-bold' 
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900'">
                                <i class="fas fa-paint-brush w-4 text-center text-xs"></i>
                                Website Customization
                            </button>
                        </div>
                    </div>

                    {{-- Other Menu Items --}}
                    @foreach([
                    'operational' => ['icon' => 'store', 'label' => 'Operational & Map'],
                    'reservation' => ['icon' => 'calendar-check', 'label' => 'Reservations'],
                    'payment' => ['icon' => 'credit-card', 'label' => 'Payment Methods']
                    ] as $key => $menu)
                    <button
                        wire:click="$set('activeTab', '{{ $key }}')"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 font-body font-bold text-sm group"
                        :class="activeTab === '{{ $key }}' 
                    ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30 ring-1 ring-indigo-500' 
                    : 'text-slate-500 hover:bg-slate-200/50 hover:text-slate-900'">

                        <i class="fas fa-{{ $menu['icon'] }} w-5 text-center"
                            :class="activeTab === '{{ $key }}' ? 'text-indigo-100' : 'text-slate-400 group-hover:text-slate-600'"></i>
                        {{ $menu['label'] }}

                        <i class="fas fa-chevron-right ml-auto text-xs opacity-50"
                            x-show="activeTab === '{{ $key }}'"></i>
                    </button>
                    @endforeach
                </nav>

                {{-- Quick Status Widget --}}
                <div class="mt-8 p-5 bg-white rounded-2xl border border-slate-200 shadow-sm">
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Store Status</h4>
                    <div class="flex items-center gap-3">
                        <span class="relative flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $form['site_closed'] ? 'bg-red-400' : 'bg-emerald-400' }} opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 {{ $form['site_closed'] ? 'bg-red-500' : 'bg-emerald-500' }}"></span>
                        </span>
                        <span class="text-sm font-bold text-slate-700 font-body">
                            {{ $form['site_closed'] ? 'Currently Closed' : 'Open for Business' }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- CONTENT AREA --}}
            <div class="lg:col-span-9">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden relative min-h-[500px]">

                    {{-- Section Title --}}
                    <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50 backdrop-blur-sm">
                        <h2 class="text-xl font-brand text-slate-800">
                            @if ($activeTab === 'page') Appearance Settings
                            @elseif ($activeTab === 'operational') Operational & Delivery
                            @elseif ($activeTab === 'reservation') Reservation Rules
                            @else Payment Configuration
                            @endif
                        </h2>

                        {{-- Save Button (Top Right Header) --}}
                        <button wire:click="save" wire:loading.attr="disabled"
                            class="hidden md:inline-flex items-center gap-2 px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-lg shadow-md shadow-indigo-500/20 transition-all transform active:scale-95">
                            <i class="fas fa-save" wire:loading.remove></i>
                            <i class="fas fa-spinner fa-spin" wire:loading></i>
                            <span>Save Changes</span>
                        </button>
                    </div>

                    <div class="p-8">
                        {{-- 1. PAGE SETTINGS --}}
                        @if ($activeTab === 'page')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            {{-- Brand Logo Upload --}}
                            <div class="space-y-4">
                                <label class="block text-sm font-bold text-slate-700 font-body">Brand Logo</label>

                                <div x-data="{ isDragging: false }"
                                    @dragover.prevent="isDragging = true"
                                    @dragleave.prevent="isDragging = false"
                                    @drop.prevent="isDragging = false; $refs.fileInput.files = $event.dataTransfer.files; $refs.fileInput.dispatchEvent(new Event('change'))"
                                    :class="isDragging ? 'border-indigo-500 bg-indigo-50' : 'border-slate-200 hover:border-indigo-300 hover:bg-slate-50'"
                                    class="relative border-2 border-dashed rounded-2xl p-6 transition-all duration-200 flex flex-col items-center justify-center min-h-[240px] group cursor-pointer"
                                    @click="$refs.fileInput.click()">

                                    <input x-ref="fileInput" type="file" wire:model="brand_logo" accept="image/*" class="hidden">

                                    @if ($brand_logo)
                                    <img src="{{ $brand_logo->temporaryUrl() }}" class="h-32 object-contain mb-3 drop-shadow-md">
                                    @elseif ($config->brand_logo_url)
                                    <img src="{{ $config->brand_logo_url }}" class="h-32 object-contain mb-3 drop-shadow-md">
                                    @else
                                    <div class="w-16 h-16 bg-indigo-50 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                        <i class="fas fa-image text-indigo-400 text-2xl"></i>
                                    </div>
                                    @endif

                                    <p class="text-sm font-bold text-slate-600">Click to upload or drag image</p>
                                    <p class="text-xs text-slate-400 mt-1">PNG, JPG up to 2MB</p>
                                </div>
                            </div>

                            {{-- Form Inputs --}}
                            <div class="space-y-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-slate-700 font-body">Store Name</label>
                                    <input type="text" wire:model.defer="form.brand_name"
                                        class="w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3 font-body placeholder-slate-400 transition-colors"
                                        placeholder="e.g. Ukita Store">
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-slate-700 font-body">Footer Address</label>
                                    <textarea wire:model.defer="form.footer_address" rows="4"
                                        class="w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-3 font-body placeholder-slate-400 transition-colors"
                                        placeholder="Complete address..."></textarea>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-slate-700 font-body">Contact Number</label>
                                    <div class="flex">
                                        <span class="inline-flex items-center px-4 text-sm text-slate-500 bg-slate-100 border border-r-0 border-slate-200 rounded-l-xl font-bold">
                                            <select wire:model="phoneCode" class="bg-transparent border-none text-slate-700 focus:ring-0 text-sm p-0 font-bold pr-1 cursor-pointer">
                                                <option value="+62">+62</option>
                                                <option value="+1">+1</option>
                                            </select>
                                        </span>
                                        <input type="text" wire:model="phoneNumber"
                                            class="rounded-none rounded-r-xl bg-slate-50 border border-slate-200 text-slate-900 focus:ring-indigo-500 focus:border-indigo-500 block flex-1 min-w-0 w-full text-sm p-3 font-body"
                                            placeholder="8123456789">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- 2. OPERATIONAL SETTINGS --}}
                        @if ($activeTab === 'operational')
                        <div class="space-y-8">
                            {{-- Leaflet Dependencies --}}
                            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

                            {{-- Time & Tax Grid --}}
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500">Opening Time</label>
                                    <input type="time" wire:model.defer="form.active_from"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl p-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500">Closing Time</label>
                                    <input type="time" wire:model.defer="form.active_until"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl p-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500">Tax / PPN (%)</label>
                                    <div class="relative">
                                        <input type="number" wire:model.defer="form.tax_percent"
                                            class="w-full bg-slate-50 border border-slate-200 rounded-xl p-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500 pr-8">
                                        <span class="absolute right-3 top-2.5 text-slate-400 font-bold text-sm">%</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Store Status Toggle --}}
                            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800">Force Close Store</h4>
                                    <p class="text-xs text-slate-500 mt-1">Prevent customers from creating new orders temporarily.</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" wire:model.defer="form.site_closed" class="sr-only peer">
                                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                </label>
                            </div>

                            <hr class="border-slate-100">

                            {{-- Map Section (Re-styled) --}}
                            <div x-data="{
                                map: null, marker: null, search: '', suggestions: [], lat: @entangle('form.restaurant_lat'), lng: @entangle('form.restaurant_lng'),
                                init() { this.$nextTick(() => { this.initMap(); }); Livewire.on('update-map-view', (data) => { const coords = Array.isArray(data) ? data[0] : data; this.updateMapPosition(coords.lat, coords.lng); }); },
                                initMap() { if(this.map || !document.getElementById('admin-map')) return; if(!this.lat) this.lat = -6.200000; if(!this.lng) this.lng = 106.816666; this.map = L.map('admin-map').setView([this.lat, this.lng], 15); L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; OSM' }).addTo(this.map); const redIcon = new L.Icon({ iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-violet.png', shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png', iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34], shadowSize: [41, 41] }); this.marker = L.marker([this.lat, this.lng], { icon: redIcon, draggable: true }).addTo(this.map); this.marker.on('dragend', (e) => { const pos = e.target.getLatLng(); this.lat = pos.lat; this.lng = pos.lng; @this.updateCoordinates(pos.lat, pos.lng); }); },
                                updateMapPosition(lat, lng) { if(!this.map) return; const newLatLng = new L.LatLng(lat, lng); this.marker.setLatLng(newLatLng); this.map.setView(newLatLng, 16); this.lat = lat; this.lng = lng; },
                                async getSuggestions() { if (this.search.length < 3) { this.suggestions = []; return; } try { const res = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(this.search)}&countrycodes=id&limit=5`); this.suggestions = await res.json(); } catch (e) { console.error(e); } },
                                selectSuggestion(item) { const lat = parseFloat(item.lat); const lng = parseFloat(item.lon); this.search = ''; this.suggestions = []; this.updateMapPosition(lat, lng); @this.updateCoordinates(lat, lng); }
                            }">
                                <div class="flex items-center gap-2 mb-4">
                                    <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <h3 class="text-lg font-bold text-slate-800 font-brand">Location & Delivery</h3>
                                </div>

                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                    <div class="lg:col-span-2 space-y-4">
                                        {{-- Map Container --}}
                                        <div wire:ignore class="relative rounded-2xl overflow-hidden shadow-sm border border-slate-200">
                                            <div id="admin-map" class="h-80 w-full z-0"></div>
                                            <div class="absolute top-3 right-3 bg-white/90 backdrop-blur px-3 py-1.5 rounded-lg border border-slate-200 text-xs text-slate-600 shadow-sm z-[400] font-bold">
                                                <i class="fas fa-arrows-alt text-indigo-500 mr-1"></i> Drag marker to adjust
                                            </div>
                                        </div>

                                        {{-- Search --}}
                                        <div class="relative" @click.away="suggestions = []">
                                            <div class="relative">
                                                <i class="fas fa-search absolute left-4 top-3.5 text-slate-400"></i>
                                                <input type="text" x-model="search" @input.debounce.500ms="getSuggestions()"
                                                    placeholder="Search location (e.g. Monas)..."
                                                    class="w-full pl-10 bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                            </div>
                                            {{-- Dropdown --}}
                                            <div x-show="suggestions.length > 0" class="absolute z-[1000] left-0 right-0 bg-white mt-1 rounded-xl shadow-xl border border-slate-100 max-h-60 overflow-y-auto" style="display: none;" x-transition>
                                                <template x-for="item in suggestions" :key="item.place_id">
                                                    <div @click="selectSuggestion(item)" class="px-4 py-3 hover:bg-indigo-50 cursor-pointer border-b border-slate-50 last:border-0 transition-colors">
                                                        <span class="font-bold block text-slate-800 text-sm" x-text="item.display_name.split(',')[0]"></span>
                                                        <span class="text-xs text-slate-500 truncate block mt-0.5" x-text="item.display_name"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-y-5">
                                        <div class="bg-indigo-50 p-4 rounded-xl border border-indigo-100">
                                            <label class="text-[10px] font-bold text-indigo-600 uppercase tracking-widest mb-1 block">Quick Link</label>
                                            <input type="text" wire:model.live.debounce.1000ms="googleMapsLink"
                                                placeholder="Paste Google Maps URL..."
                                                class="w-full bg-white border border-indigo-200 rounded-lg px-3 py-2 text-xs focus:ring-indigo-500 focus:border-indigo-500 text-indigo-900 placeholder-indigo-300">
                                        </div>

                                        <div class="grid grid-cols-2 gap-3">
                                            <div>
                                                <label class="text-[10px] font-bold text-slate-400 uppercase">Latitude</label>
                                                <input type="text" wire:model="form.restaurant_lat" readonly class="w-full bg-slate-100 border-none rounded-lg px-3 py-2 text-xs text-slate-600 font-mono">
                                            </div>
                                            <div>
                                                <label class="text-[10px] font-bold text-slate-400 uppercase">Longitude</label>
                                                <input type="text" wire:model="form.restaurant_lng" readonly class="w-full bg-slate-100 border-none rounded-lg px-3 py-2 text-xs text-slate-600 font-mono">
                                            </div>
                                        </div>

                                        <div class="space-y-3 pt-2">
                                            <div class="space-y-1">
                                                <label class="text-xs font-bold text-slate-700">Fee per KM (Rp)</label>
                                                <input type="number" wire:model.defer="form.price_per_km" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                            </div>
                                            <div class="space-y-1">
                                                <label class="text-xs font-bold text-slate-700">Flat Fee (Fallback)</label>
                                                <input type="number" wire:model.defer="form.delivery_fee" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($activeTab === 'website')
                        <livewire:admin.website-customization />
                        @endif

                        {{-- 3. PLACEHOLDERS (Upcoming) --}}
                        @if (in_array($activeTab, ['reservation','payment']))
                        <div class="flex flex-col items-center justify-center py-16 text-center">
                            <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-4 animate-pulse">
                                <i class="fas fa-layer-group text-slate-300 text-3xl"></i>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 font-brand">Feature Coming Soon</h3>
                            <p class="text-slate-500 max-w-sm mx-auto mt-2">
                                We are currently working on advanced settings for {{ $activeTab }}. Stay tuned for updates!
                            </p>
                        </div>
                        @endif
                    </div>

                    {{-- Floating Footer Mobile --}}
                    <div class="md:hidden border-t border-slate-100 p-4 bg-white sticky bottom-0 z-10">
                        <button wire:click="save" class="w-full py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 active:scale-95 transition-transform">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODERN TOAST NOTIFICATION --}}
    <div x-data="{ show: false, message: '' }"
        @notify-success.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)"
        @page-refresh.window="setTimeout(() => window.location.reload(), 1500)"
        class="fixed bottom-6 right-6 z-50 flex flex-col gap-2"
        style="display: none;"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2">

        <div class="bg-indigo-900 text-white shadow-2xl rounded-xl p-4 flex items-center gap-4 pr-10 relative overflow-hidden">
            <div class="absolute inset-0 bg-indigo-600/20"></div>
            <div class="relative z-10 flex-shrink-0 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center shadow-lg shadow-green-500/40">
                <i class="fas fa-check text-xs"></i>
            </div>
            <div class="relative z-10">
                <h4 class="text-xs font-bold uppercase tracking-wider text-indigo-200">System</h4>
                <p class="text-sm font-semibold" x-text="message"></p>
            </div>
            <button @click="show = false" class="absolute top-2 right-2 text-indigo-400 hover:text-white transition-colors p-1">
                <i class="fas fa-times text-xs"></i>
            </button>
        </div>
    </div>
</div>