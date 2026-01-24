<div class="bg-[#fdfcf8] min-h-screen pb-20">
    
    <div class="relative py-10 mb-10 bg-red-800 text-center overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,<svg width=\" 60\" height=\"30\" viewBox=\"0 0 60 30\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M0 15Q15 0 30 15Q45 30 60 15\" stroke=\"%23fff\" fill=\"none\" /></svg>');">
        </div>
        <h1 class="text-3xl font-serif font-black text-amber-400 tracking-[0.3em] uppercase relative z-10"><?php echo e(__('language.order_completion')); ?></h1>
        <div class="flex justify-center gap-4 mt-2 relative z-10">
            <span class="h-px w-12 bg-amber-400/50 self-center"></span>
            <span class="text-red-100 text-[10px] uppercase tracking-[0.4em] font-bold"><?php echo e(__('language.imperial_banquet')); ?></span>
            <span class="h-px w-12 bg-amber-400/50 self-center"></span>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 lg:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <div class="lg:col-span-8 space-y-8">

                
                <div class="bg-white rounded-[2rem] shadow-sm border border-amber-100 p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-[0.05] pointer-events-none">
                        <i class="fas fa-shuttle-van text-6xl"></i>
                    </div>

                    <h2 class="text-xl font-serif font-bold mb-8 flex items-center gap-3 text-stone-800">
                        <span class="w-8 h-8 bg-red-700 text-white rounded-lg flex items-center justify-center text-sm italic">1</span>
                        <?php echo e(__('language.delivery_information')); ?>

                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2"><?php echo e(__('language.first_name')); ?> <span class="text-red-500">*</span></label>
                            <input type="text" wire:model.blur="firstName"
                                class="w-full px-5 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all placeholder:text-stone-300 text-sm font-bold <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ring-2 ring-red-500 bg-red-50 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Example: John">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-[10px] ml-2 font-bold italic"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2"><?php echo e(__('language.last_name')); ?> <span class="text-red-500">*</span></label>
                            <input type="text" wire:model.blur="lastName"
                                class="w-full px-5 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all placeholder:text-stone-300 text-sm font-bold <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ring-2 ring-red-500 bg-red-50 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Example: Doe">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-[10px] ml-2 font-bold italic"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2"><?php echo e(__('language.banquet_email')); ?> <span class="text-red-500">*</span></label>
                            <input type="email" wire:model.blur="email"
                                class="w-full px-5 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all placeholder:text-stone-300 text-sm font-bold <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ring-2 ring-red-500 bg-red-50 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="JohnDoe@email.com">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-[10px] ml-2 font-bold italic"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2"><?php echo e(__('language.phone_number')); ?> <span class="text-red-500">*</span></label>
                            <div class="flex gap-2">
                                <select wire:model="phoneCode" class="bg-stone-50 border-none rounded-2xl text-sm font-bold focus:ring-2 focus:ring-red-700">
                                    <option value="+62">+62</option>
                                </select>
                                <input type="text" wire:model.blur="phone"
                                    class="flex-1 px-5 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all placeholder:text-stone-300 text-sm font-bold <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ring-2 ring-red-500 bg-red-50 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="812xxxxxx">
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-[10px] ml-2 font-bold italic"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="mt-8 flex gap-4">
                        <label class="flex-1 cursor-pointer group">
                            <input type="radio" wire:model.live="orderType" value="delivery" class="hidden peer">
                            <div class="p-4 border-2 border-stone-100 rounded-2xl peer-checked:border-red-700 peer-checked:bg-red-50 transition-all group-hover:bg-stone-50">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-motorcycle text-stone-400"></i>
                                    <span class="text-sm font-bold text-stone-600"><?php echo e(__('language.delivery')); ?></span>
                                </div>
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer group">
                            <input type="radio" wire:model.live="orderType" value="pickup" class="hidden peer">
                            <div class="p-4 border-2 border-stone-100 rounded-2xl peer-checked:border-red-700 peer-checked:bg-red-50 transition-all group-hover:bg-stone-50">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-store text-stone-400"></i>
                                    <span class="text-sm font-bold text-stone-600"><?php echo e(__('language.pickup')); ?></span>
                                </div>
                            </div>
                        </label>
                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orderType === 'delivery'): ?>
                    <div class="mt-6 space-y-4 animate-fade-in-down"
                        
                        x-data="mapPicker($wire.entangle('address'))"
                        x-init="initMap(<?php echo \Illuminate\Support\Js::from($restaurantLat)->toHtml() ?>, <?php echo \Illuminate\Support\Js::from($restaurantLng)->toHtml() ?>)">

                        
                        <div class="relative">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2 mb-1 block">
                                <?php echo e(__('language.search_location')); ?> <span class="text-red-500">*</span>
                            </label>

                            <div class="relative group">
                                
                                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-stone-300 group-focus-within:text-red-700 transition-colors"></i>
                                </div>

                                
                                <input
                                    type="text"
                                    x-model="search"
                                    @input.debounce.500ms="getSuggestions()"
                                    @keydown.escape="suggestions = []"
                                    class="w-full pl-12 pr-12 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all placeholder:text-stone-300 text-sm font-bold shadow-sm <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ring-2 ring-red-500 bg-red-50 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e(__('language.search_placeholder')); ?> (Cth: Jalan Sudirman No. 10, Jakarta...)">

                                
                                <div x-show="loading" class="absolute inset-y-0 right-0 pr-5 flex items-center" style="display: none;">
                                    <svg class="animate-spin h-5 w-5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </div>

                                
                                <button
                                    x-show="!loading && search && search.length > 0"
                                    @click="search = ''; suggestions = []"
                                    class="absolute inset-y-0 right-0 pr-5 flex items-center text-stone-300 hover:text-red-600 transition-colors cursor-pointer"
                                    style="display: none;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-[10px] ml-2 mt-2 font-bold italic"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['lat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-[10px] ml-2 mt-1 font-bold italic">Mohon pilih lokasi tepat di peta.</p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            
                            <div
                                x-show="suggestions.length > 0"
                                @click.outside="suggestions = []"
                                class="absolute w-full mt-2 bg-white rounded-2xl shadow-xl border border-stone-100 overflow-hidden z-50 max-h-64 overflow-y-auto custom-scrollbar"
                                style="display: none;">
                                <ul class="py-2">
                                    <template x-for="(item, index) in suggestions" :key="index">
                                        <li>
                                            <button
                                                @click="selectSuggestion(item)"
                                                class="w-full text-left px-5 py-3 hover:bg-red-50 hover:text-red-700 transition-colors group flex items-start gap-3">
                                                <i class="fas fa-map-marker-alt mt-1 text-stone-300 group-hover:text-red-500"></i>
                                                <div>
                                                    <p class="text-sm font-bold text-stone-700 group-hover:text-red-800" x-text="item.display_name.split(',')[0]"></p>
                                                    <p class="text-[10px] text-stone-400 uppercase tracking-wide leading-tight mt-0.5 group-hover:text-red-400" x-text="item.display_name"></p>
                                                </div>
                                            </button>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>

                        
                        <div wire:ignore>
                            <div id="map" class="h-80 w-full rounded-3xl border-4 border-stone-50 shadow-inner z-10"></div>
                            <div class="flex justify-between mt-2 px-2">
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-red-600"></span>
                                    <span class="text-[9px] text-stone-400 uppercase font-bold tracking-widest">Restoran</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-blue-600"></span>
                                    <span class="text-[9px] text-stone-400 uppercase font-bold tracking-widest">Lokasi Pengiriman</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Menerima parameter entangledAddress
                        function mapPicker(entangledAddress) {
                            return {
                                map: null,
                                userMarker: null,
                                restaurantMarker: null,
                                routeLine: null,
                                restLat: null,
                                restLng: null,

                                blueIcon: null,
                                redIcon: null,

                                // Bind search ke Livewire variable 'address'
                                search: entangledAddress, 
                                suggestions: [],
                                loading: false,

                                initMap(lat, lng) {
                                    this.restLat = parseFloat(lat);
                                    this.restLng = parseFloat(lng);

                                    // Setup Icon Config
                                    const iconConfig = {
                                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                                        iconSize: [25, 41],
                                        iconAnchor: [12, 41],
                                        popupAnchor: [1, -34],
                                        shadowSize: [41, 41]
                                    };

                                    this.redIcon = new L.Icon({
                                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                                        ...iconConfig
                                    });

                                    this.blueIcon = new L.Icon({
                                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
                                        ...iconConfig
                                    });

                                    setTimeout(() => {
                                        if (this.map) this.map.remove();
                                        this.map = L.map('map').setView([this.restLat, this.restLng], 17);
                                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OSM' }).addTo(this.map);
                                        this.map.invalidateSize();

                                        // Restaurant Marker
                                        this.restaurantMarker = L.marker([this.restLat, this.restLng], { icon: this.redIcon })
                                            .addTo(this.map)
                                            .bindPopup("<b class='font-serif'>Giri Resto China</b>").openPopup();

                                        // Klik Map -> Update Marker & Cari Alamat
                                        this.map.on('click', (e) => {
                                            this.updateUserMarker(e.latlng.lat, e.latlng.lng, false, true);
                                        });

                                        // Load saved location (jika validasi gagal dan reload)
                                        <?php if($lat && $lng): ?>
                                            this.updateUserMarker(<?php echo \Illuminate\Support\Js::from($lat)->toHtml() ?>, <?php echo \Illuminate\Support\Js::from($lng)->toHtml() ?>, true, false);
                                        <?php endif; ?>
                                    }, 300);
                                },

                                async getSuggestions() {
                                    // Cek null safety sebelum length
                                    if (!this.search || this.search.length < 3) {
                                        this.suggestions = [];
                                        return;
                                    }
                                    this.loading = true;
                                    try {
                                        const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(this.search)}&countrycodes=id&limit=5`);
                                        this.suggestions = await response.json();
                                    } catch (error) {
                                        console.error(error);
                                    } finally {
                                        this.loading = false;
                                    }
                                },

                                async reverseGeocode(lat, lng) {
                                    this.loading = true;
                                    try {
                                        const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`);
                                        const data = await response.json();
                                        if (data && data.display_name) {
                                            this.search = data.display_name; 
                                            // Karena 'search' di-entangle, perubahan ini otomatis update $address di Livewire
                                        }
                                    } catch (error) {
                                        this.search = `${lat}, ${lng}`;
                                    } finally {
                                        this.loading = false;
                                    }
                                },

                                selectSuggestion(item) {
                                    const lat = parseFloat(item.lat);
                                    const lng = parseFloat(item.lon);
                                    this.search = item.display_name; // Update Textbox & Livewire Address
                                    this.suggestions = [];
                                    this.updateUserMarker(lat, lng, true, false);
                                },

                                updateUserMarker(lat, lng, zoom = false, fetchAddress = false) {
                                    if (this.userMarker) this.map.removeLayer(this.userMarker);
                                    if (this.routeLine) this.map.removeLayer(this.routeLine);

                                    if (fetchAddress) {
                                        this.reverseGeocode(lat, lng);
                                    }

                                    this.userMarker = L.marker([lat, lng], {
                                        draggable: true,
                                        icon: this.blueIcon
                                    }).addTo(this.map);

                                    this.routeLine = L.polyline([
                                        [this.restLat, this.restLng],
                                        [lat, lng]
                                    ], { color: '#b91c1c', weight: 3, dashArray: '10, 10', opacity: 0.6 }).addTo(this.map);

                                    if (zoom) {
                                        const group = new L.featureGroup([this.restaurantMarker, this.userMarker]);
                                        this.map.fitBounds(group.getBounds(), { padding: [50, 50], maxZoom: 18 });
                                    }

                                    // Update Lat/Lng di Livewire Component (bukan address, karena address via entangle)
                                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').setLocation(lat, lng);

                                    this.userMarker.on('dragend', (e) => {
                                        const pos = e.target.getLatLng();
                                        this.updateUserMarker(pos.lat, pos.lng, false, true);
                                    });
                                }
                            }
                        }
                    </script>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div class="mt-6 space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2"><?php echo e(__('language.special_notes')); ?></label>
                        <textarea wire:model="instructions" rows="2"
                            class="w-full px-5 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all text-sm font-bold italic"
                            placeholder="Example: Reduce MSG, add extra chili sauce..."></textarea>
                    </div>
                </div>

                
                <div class="bg-white rounded-[2rem] shadow-sm border border-amber-100 p-8">
                    <h2 class="text-xl font-serif font-bold mb-8 flex items-center gap-3 text-stone-800">
                        <span class="w-8 h-8 bg-red-700 text-white rounded-lg flex items-center justify-center text-sm italic">2</span>
                        <?php echo e(__('language.payment_method')); ?>

                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="relative cursor-pointer group">
                            <input type="radio" wire:model="payment" value="cash" class="hidden peer">
                            <div class="p-6 border-2 border-stone-100 rounded-2xl peer-checked:border-red-700 peer-checked:bg-red-50 transition-all">
                                <i class="fas fa-money-bill-wave text-2xl text-stone-300 peer-checked:text-red-700 mb-3 block"></i>
                                <p class="text-sm font-bold text-stone-800 uppercase tracking-tighter"><?php echo e(__('language.cash_cod')); ?></p>
                                <p class="text-[10px] text-stone-400 mt-1 uppercase"><?php echo e(__('language.pay_on_arrival')); ?></p>
                            </div>
                        </label>
                        
                        <label class="relative cursor-pointer group">
                             <input type="radio" wire:model="payment" value="card" class="hidden peer">
                             <div class="p-6 border-2 border-stone-100 rounded-2xl peer-checked:border-red-700 peer-checked:bg-red-50 transition-all">
                                 <i class="fas fa-credit-card text-2xl text-stone-300 peer-checked:text-red-700 mb-3 block"></i>
                                 <p class="text-sm font-bold text-stone-800 uppercase tracking-tighter"><?php echo e(__('language.card_payment')); ?></p>
                                 <p class="text-[10px] text-stone-400 mt-1 uppercase"><?php echo e(__('language.secure_payment')); ?></p>
                             </div>
                         </label>
                         <label class="relative cursor-pointer group">
                             <input type="radio" wire:model="payment" value="xendit" class="hidden peer">
                             <div class="p-6 border-2 border-stone-100 rounded-2xl peer-checked:border-red-700 peer-checked:bg-red-50 transition-all">
                                 <i class="fas fa-qrcode text-2xl text-stone-300 peer-checked:text-red-700 mb-3 block"></i>
                                 <p class="text-sm font-bold text-stone-800 uppercase tracking-tighter">QRIS / E-Wallet</p>
                                 <p class="text-[10px] text-stone-400 mt-1 uppercase">Pembayaran Online</p>
                             </div>
                         </label>
                    </div>
                </div>
            </div>

            
            <div class="lg:col-span-4">
                <div class="sticky top-10 space-y-6">
                    <div class="bg-stone-900 rounded-[2.5rem] p-8 text-white relative overflow-hidden shadow-2xl">
                        
                        <div class="absolute -right-10 -bottom-10 opacity-10 text-[12rem] font-serif italic pointer-events-none text-amber-400">福</div>

                        <h2 class="text-lg font-serif font-bold mb-6 tracking-widest uppercase flex items-center gap-3">
                            <?php echo e(__('language.order_summary')); ?>

                            <span class="h-px flex-1 bg-white/20"></span>
                        </h2>

                        <div class="space-y-4 mb-8 max-h-[30vh] overflow-y-auto custom-scrollbar pr-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex justify-between items-start gap-4 animate-fade-in text-sm">
                                <div class="flex-1">
                                    <p class="font-bold text-amber-50 leading-tight"><?php echo e($item['name']); ?></p>
                                    <p class="text-[10px] text-stone-400 uppercase tracking-widest mt-1"><?php echo e(__('language.portion')); ?> × <?php echo e($item['quantity']); ?></p>
                                </div>
                                <span class="font-mono text-xs text-amber-400">Rp<?php echo e(number_format($item['price'] * $item['quantity'], 0, ',', '.')); ?></span>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <div class="space-y-3 border-t border-white/10 pt-6">
                            <div class="flex justify-between text-xs text-stone-400 font-medium tracking-wide">
                                <span><?php echo e(__('language.subtotal')); ?></span>
                                <span>Rp<?php echo e(number_format($subtotal, 0, ',', '.')); ?></span>
                            </div>
                            <div class="flex justify-between text-xs text-stone-400 font-medium tracking-wide">
                                <span><?php echo e(__('language.restaurant_tax')); ?></span>
                                <span>Rp<?php echo e(number_format($tax, 0, ',', '.')); ?></span>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deliveryFee > 0): ?>
                            <div class="flex justify-between text-xs text-amber-500 font-medium tracking-wide">
                                <span><?php echo e(__('language.delivery_fee')); ?></span>
                                <span>Rp<?php echo e(number_format($deliveryFee, 0, ',', '.')); ?></span>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <div class="pt-4 mt-4 border-t border-white/10 flex justify-between items-end">
                                <div>
                                    <p class="text-[10px] text-red-500 uppercase font-black tracking-widest mb-1"><?php echo e(__('language.total_payment')); ?></p>
                                    <p class="text-3xl font-serif font-black text-amber-400 tracking-tighter">
                                        Rp<?php echo e(number_format($total, 0, ',', '.')); ?>

                                    </p>
                                </div>
                            </div>
                        </div>

                        <button
                            wire:click="placeOrder"
                            wire:loading.attr="disabled"
                            class="w-full mt-10 bg-red-700 hover:bg-red-600 text-white py-5 rounded-2xl font-black uppercase tracking-[0.3em] text-[11px] transition-all active:scale-95 shadow-lg shadow-red-900/20 flex items-center justify-center gap-3 overflow-hidden relative group">

                            <div wire:loading.remove wire:target="placeOrder" class="flex items-center gap-3">
                                <span><?php echo e(__('language.complete_payment')); ?></span>
                                <i class="fas fa-dragon group-hover:translate-x-1 transition-transform"></i>
                            </div>

                            <div wire:loading wire:target="placeOrder" class="flex items-center gap-3">
                                <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span><?php echo e(__('language.processing_payment')); ?></span>
                            </div>
                        </button>
                    </div>

                    <p class="text-[10px] text-stone-400 text-center uppercase tracking-widest">
                        <i class="fas fa-lock mr-1"></i> <?php echo e(__('language.secure_encrypted')); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.1); border-radius: 10px; }
        @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-down { animation: fade-in-down 0.3s ease-out; }
    </style>
</div><?php /**PATH D:\laragon\www\china-app\resources\views/livewire/Pages/checkout-page.blade.php ENDPATH**/ ?>