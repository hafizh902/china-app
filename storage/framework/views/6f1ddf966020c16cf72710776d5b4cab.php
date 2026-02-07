<div class="p-4 grid grid-cols-1 lg:grid-cols-10 gap-4">

    
    <div class="lg:col-span-2 bg-gradient-to-b from-chinese-red to-red-800 rounded-lg shadow-xl p-1">
        <div class="bg-chinese-black rounded-lg p-3 space-y-1.5">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
            'page' => 'Page Settings',
            'operational' => 'Operations',
            'reservation' => 'Reservations',
            'payment' => 'Payment'
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button
                wire:click="$set('activeTab', '<?php echo e($key); ?>')"
                class="w-full text-left px-3 py-2 rounded-lg transition-all duration-300 text-sm
                        <?php echo e($activeTab === $key 
                            ? 'bg-gradient-to-r from-chinese-gold to-chinese-gold-light text-chinese-black font-bold shadow-lg border-2 border-chinese-gold' 
                            : 'text-chinese-gold-light hover:bg-chinese-red/30 hover:text-white border-2 border-transparent'); ?>">
                <?php echo e($label); ?>

            </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <div class="lg:col-span-8 bg-white rounded-lg shadow-xl border-2 border-chinese-gold overflow-hidden">

        
        <div class="bg-gradient-to-r from-chinese-red via-red-700 to-chinese-red p-4 border-b-2 border-chinese-gold">
            <h2 class="text-lg font-bold text-chinese-gold-light flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                </svg>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'page'): ?> Page Settings
                <?php elseif($activeTab === 'operational'): ?> Operational Config
                <?php elseif($activeTab === 'reservation'): ?> Reservation Management
                <?php else: ?> Payment Settings
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </h2>
        </div>

        <div class="p-4 bg-gradient-to-br from-gray-50 to-gray-100">

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'page'): ?>
            <div class="grid grid-cols-2 gap-4">

                
                <div class="space-y-2">
                    <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                        <span class="w-0.5 h-3 bg-chinese-red"></span>
                        Brand Logo
                    </label>

                    
                    <div
                        x-data="{ isDragging: false }"
                        @dragover.prevent="isDragging = true"
                        @dragleave.prevent="isDragging = false"
                        @drop.prevent="isDragging = false; $refs.fileInput.files = $event.dataTransfer.files; $refs.fileInput.dispatchEvent(new Event('change'))"
                        :class="isDragging ? 'border-chinese-red bg-chinese-red/5' : 'border-chinese-gold/30'"
                        class="border-2 border-dashed rounded-lg p-4 transition-all duration-200 flex flex-col items-center justify-center min-h-[200px]">

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($brand_logo): ?>
                        <img src="<?php echo e($brand_logo->temporaryUrl()); ?>"
                            class="max-h-32 w-auto object-contain rounded-lg mb-2">
                        <?php elseif($config->brand_logo_url): ?>
                        <img src="<?php echo e($config->brand_logo_url); ?>"
                            class="max-h-32 w-auto object-contain rounded-lg mb-2">
                        <?php else: ?>
                        <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <p class="text-xs text-gray-500 text-center mb-1">
                            Drag & drop image here
                        </p>
                        <p class="text-xs text-gray-400 text-center">
                            or click button below
                        </p>
                    </div>

                    
                    <label class="block">
                        <input
                            x-ref="fileInput"
                            type="file"
                            wire:model="brand_logo"
                            accept="image/*"
                            class="hidden">
                        <span class="w-full cursor-pointer inline-flex items-center justify-center gap-2 px-4 py-2 
                                     bg-chinese-red text-white text-xs font-semibold rounded-lg 
                                     hover:bg-red-700 transition-all duration-200 border-2 border-chinese-gold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            Choose Image
                        </span>
                    </label>
                </div>

                
                <div class="space-y-3">

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                            <span class="w-0.5 h-3 bg-chinese-red"></span>
                            Brand Name
                        </label>
                        <input
                            type="text"
                            wire:model.defer="form.brand_name"
                            class="w-full border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm
                                   focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                                   transition-all duration-200">
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                            <span class="w-0.5 h-3 bg-chinese-red"></span>
                            Footer Address
                        </label>
                        <textarea
                            wire:model.defer="form.footer_address"
                            rows="3"
                            class="w-full border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm
                                   focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 
                                   transition-all duration-200"></textarea>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                            <span class="w-0.5 h-3 bg-chinese-red"></span>
                            Footer Phone
                        </label>
                        <div class="flex gap-2">
                            <select
                                wire:model="phoneCode"
                                class="border-2 border-chinese-gold/30 rounded-lg px-2 py-1.5 text-sm
                                       focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 transition-all duration-200">
                                <option value="+62">+62</option>
                                <option value="+1">+1</option>
                                <option value="+44">+44</option>
                            </select>

                            <input
                                type="text"
                                wire:model="phoneNumber"
                                class="flex-1 border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm
                                       focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 transition-all duration-200"
                                placeholder="81234567890">
                        </div>
                    </div>

                </div>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'operational'): ?>
            <div class="space-y-8">

                
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                            <span class="w-0.5 h-3 bg-chinese-red"></span>
                            Active From
                        </label>
                        <input type="time" wire:model.defer="form.active_from"
                            class="w-full border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 transition-all duration-200">
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                            <span class="w-0.5 h-3 bg-chinese-red"></span>
                            Active Until
                        </label>
                        <input type="time" wire:model.defer="form.active_until"
                            class="w-full border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 transition-all duration-200">
                    </div>

                    <div class="flex items-center gap-2 p-3 bg-white border-2 border-chinese-gold/30 rounded-lg">
                        <input type="checkbox" wire:model.defer="form.site_closed"
                            class="w-4 h-4 text-chinese-red border-chinese-gold/50 rounded focus:ring-2 focus:ring-chinese-gold/20">
                        <span class="text-xs font-bold text-chinese-black">Close Site</span>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                            <span class="w-0.5 h-3 bg-chinese-red"></span>
                            Tax (%)
                        </label>
                        <input type="number" wire:model.defer="form.tax_percent"
                            class="w-full border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 transition-all duration-200">
                    </div>
                </div>

                <hr class="border-chinese-gold/30 border-dashed">

                
                
                <div x-data="{
        map: null,
        marker: null,
        search: '',
        suggestions: [],
        lat: <?php if ((object) ('form.restaurant_lat') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('form.restaurant_lat'->value()); ?>')<?php echo e('form.restaurant_lat'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('form.restaurant_lat'); ?>')<?php endif; ?>,
        lng: <?php if ((object) ('form.restaurant_lng') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('form.restaurant_lng'->value()); ?>')<?php echo e('form.restaurant_lng'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('form.restaurant_lng'); ?>')<?php endif; ?>,

        init() {
            // Tunggu sebentar agar elemen DOM map tersedia
            this.$nextTick(() => {
                this.initMap();
            });

            // Listener untuk update dari Backend (Link Paste)
            Livewire.on('update-map-view', (data) => {
                // data mungkin dibungkus array tergantung versi Livewire
                const coords = Array.isArray(data) ? data[0] : data; 
                this.updateMapPosition(coords.lat, coords.lng);
            });
        },

        initMap() {
            if (this.map) return; // Mencegah double init
            
            // Cek apakah element ada
            const mapEl = document.getElementById('admin-map');
            if(!mapEl) return;

            // Default fallback jika lat/lng null/0
            if(!this.lat) this.lat = -6.200000;
            if(!this.lng) this.lng = 106.816666;

            this.map = L.map('admin-map').setView([this.lat, this.lng], 15);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OSM'
            }).addTo(this.map);

            const redIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34], shadowSize: [41, 41]
            });

            this.marker = L.marker([this.lat, this.lng], {
                icon: redIcon,
                draggable: true
            }).addTo(this.map);

            this.marker.on('dragend', (e) => {
                const pos = e.target.getLatLng();
                this.lat = pos.lat;
                this.lng = pos.lng;
                
                // Update ke Livewire Controller
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').updateCoordinates(pos.lat, pos.lng);
            });
        },

        updateMapPosition(lat, lng) {
            if(!this.map) return;
            const newLatLng = new L.LatLng(lat, lng);
            this.marker.setLatLng(newLatLng);
            this.map.setView(newLatLng, 16);
            this.lat = lat;
            this.lng = lng;
        },

        async getSuggestions() {
            if (this.search.length < 3) {
                this.suggestions = []; return;
            }
            try {
                const res = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(this.search)}&countrycodes=id&limit=5`);
                this.suggestions = await res.json();
            } catch (e) { console.error(e); }
        },

        selectSuggestion(item) {
            const lat = parseFloat(item.lat);
            const lng = parseFloat(item.lon);
            
            this.search = '';
            this.suggestions = [];
            
            this.updateMapPosition(lat, lng);
            window.Livewire.find('<?php echo e($_instance->getId()); ?>').updateCoordinates(lat, lng);
        }
    }">
                    <h3 class="text-sm font-bold text-chinese-red mb-4 uppercase tracking-wider flex items-center gap-2">
                        <i class="fas fa-map-marked-alt"></i> Location & Delivery
                    </h3>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        
                        <div class="lg:col-span-2 space-y-4">

                            
                            <div class="relative group">
                                
                                <div wire:ignore>
                                    <div id="admin-map" class="h-80 w-full rounded-xl border-4 border-chinese-gold/20 shadow-inner z-0"></div>
                                </div>

                                <div class="absolute top-2 right-2 bg-white/90 backdrop-blur px-3 py-1.5 rounded-lg border border-chinese-gold/30 text-[10px] text-chinese-black shadow-sm z-[400]">
                                    <i class="fas fa-arrows-alt text-chinese-red mr-1"></i> Drag marker to adjust
                                </div>
                            </div>

                            
                            <div class="relative" @click.away="suggestions = []">
                                <div class="flex gap-2">
                                    <div class="relative flex-1">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-chinese-red">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <input type="text"
                                            x-model="search"
                                            @input.debounce.500ms="getSuggestions()"
                                            placeholder="Search location (e.g. Monas, Jakarta)..."
                                            class="w-full pl-9 border-2 border-chinese-gold/30 rounded-lg px-3 py-2 text-sm focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20 transition-all duration-200">
                                    </div>
                                </div>

                                
                                <div x-show="suggestions.length > 0"
                                    class="absolute z-[1000] left-0 right-0 bg-white mt-1 rounded-lg shadow-xl border border-chinese-gold/20 max-h-60 overflow-y-auto"
                                    style="display: none;"
                                    x-transition>
                                    <template x-for="item in suggestions" :key="item.place_id">
                                        <div @click="selectSuggestion(item)"
                                            class="px-4 py-2 hover:bg-chinese-red/5 cursor-pointer border-b border-gray-100 last:border-0 text-xs text-gray-700">
                                            <span class="font-bold block" x-text="item.display_name.split(',')[0]"></span>
                                            <span class="text-[10px] text-gray-500 truncate block" x-text="item.display_name"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>

                        
                        <div class="space-y-4">

                            
                            <div class="bg-chinese-red/5 p-4 rounded-xl border border-chinese-red/10 space-y-2">
                                <label class="text-[10px] font-black text-chinese-red uppercase tracking-widest">
                                    Option A: Paste Link
                                </label>
                                <input type="text"
                                    wire:model.live.debounce.1000ms="googleMapsLink"
                                    placeholder="Paste Google Maps URL..."
                                    class="w-full bg-white border-2 border-chinese-gold/30 rounded-lg px-3 py-2 text-xs focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20">
                                <p class="text-[9px] text-gray-500 leading-tight">
                                    Copy the full URL from browser address bar. The map will update automatically.
                                </p>
                            </div>

                            
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="text-[10px] font-bold text-gray-500 uppercase">Lat</label>
                                    <input type="text" wire:model="form.restaurant_lat" readonly
                                        class="w-full bg-gray-100 border border-gray-200 rounded px-2 py-1 text-xs text-gray-600">
                                </div>
                                <div>
                                    <label class="text-[10px] font-bold text-gray-500 uppercase">Lng</label>
                                    <input type="text" wire:model="form.restaurant_lng" readonly
                                        class="w-full bg-gray-100 border border-gray-200 rounded px-2 py-1 text-xs text-gray-600">
                                </div>
                            </div>

                            <hr class="border-chinese-gold/30 border-dashed">

                            
                            <div class="space-y-3">
                                <div class="space-y-1">
                                    <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                                        <span class="w-0.5 h-3 bg-chinese-red"></span>
                                        Fee per KM
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs font-bold">Rp</span>
                                        <input type="number" wire:model.defer="form.price_per_km"
                                            class="w-full pl-8 border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20">
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label class="text-xs font-bold text-chinese-black flex items-center gap-1.5">
                                        <span class="w-0.5 h-3 bg-chinese-red"></span>
                                        Flat Fee
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs font-bold">Rp</span>
                                        <input type="number" wire:model.defer="form.delivery_fee"
                                            class="w-full pl-8 border-2 border-chinese-gold/30 rounded-lg px-3 py-1.5 text-sm focus:border-chinese-red focus:ring-2 focus:ring-chinese-gold/20">
                                    </div>
                                    <p class="text-[9px] text-gray-400 italic">Used if coordinates fail or pickup.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($activeTab, ['reservation','payment'])): ?>
            <div class="text-center py-8">
                <div class="inline-block p-6 bg-gradient-to-br from-chinese-gold/10 to-chinese-red/10 
                            rounded-lg border-2 border-dashed border-chinese-gold">
                    <svg class="w-12 h-12 mx-auto text-chinese-gold mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-chinese-black font-bold text-base">Coming Soon</p>
                    <p class="text-gray-600 text-xs mt-1 italic">Upcoming feature</p>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>

        
        <div class="px-4 py-3 bg-gradient-to-r from-gray-100 to-gray-200 border-t-2 border-chinese-gold/30">
            <div class="flex justify-end">
                <button
                    wire:click="save"
                    class="px-6 py-2 bg-gradient-to-r from-chinese-red to-red-700 
                           text-white text-sm font-bold rounded-lg shadow-lg 
                           hover:from-red-700 hover:to-chinese-red 
                           transform hover:scale-105 transition-all duration-300
                           border-2 border-chinese-gold
                           flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Save Settings
                </button>
            </div>
        </div>
    </div>

    
    <div
        x-data="{ show: false, message: '' }"
        @notify-success.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)"
        @page-refresh.window="setTimeout(() => window.location.reload(), 1500)"
        class="fixed top-6 right-6 z-50 w-full max-w-sm"
        style="display: none;"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-10"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-10">

        <div class="bg-white/90 backdrop-blur-lg border-l-4 border-green-500 shadow-2xl rounded-2xl p-4 flex items-center gap-4 border border-stone-200">
            <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-check-circle text-green-600 text-lg"></i>
            </div>
            <div class="flex-1">
                <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-stone-400">Success</h4>
                <p class="text-xs font-bold text-stone-800 leading-tight" x-text="message"></p>
            </div>
            <button @click="show = false" class="text-stone-300 hover:text-stone-600 transition-colors px-2">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div><?php /**PATH E:\12 RPL\china-app\resources\views/livewire/Admin/config-page.blade.php ENDPATH**/ ?>