<div class="space-y-6" x-data="{ 
    activeSubTab: 'hero',
    previewMode: @entangle('previewMode')
}">

    {{-- Sub Navigation Tabs --}}
    <div class="flex gap-2 p-2 bg-slate-100 rounded-xl overflow-x-auto no-scrollbar">
        @foreach([
            'hero' => ['icon' => 'image', 'label' => 'Hero Section'],
            'features' => ['icon' => 'star', 'label' => 'Features'],
            'catalog' => ['icon' => 'grid', 'label' => 'Catalog'],
            'sections' => ['icon' => 'layer-group', 'label' => 'Custom Sections'],
            'design' => ['icon' => 'palette', 'label' => 'Design & Theme'],
            'seo' => ['icon' => 'search', 'label' => 'SEO & Meta'],
            'social' => ['icon' => 'share-nodes', 'label' => 'Social Links'],
        ] as $key => $tab)
            <button 
                @click="activeSubTab = '{{ $key }}'"
                :class="activeSubTab === '{{ $key }}' ? 'bg-white text-indigo-600 shadow-sm font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-white/50'"
                class="flex items-center gap-2 px-4 py-2 rounded-lg transition-all text-sm whitespace-nowrap">
                <i class="fas fa-{{ $tab['icon'] }} text-xs"></i>
                <span>{{ $tab['label'] }}</span>
            </button>
        @endforeach
    </div>

    {{-- Preview Toggle --}}
    <div class="flex justify-end">
        <button 
            @click="previewMode = !previewMode"
            wire:click="togglePreview"
            class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 rounded-lg text-sm font-bold transition-all">
            <i class="fas" :class="previewMode ? 'fa-edit' : 'fa-eye'"></i>
            <span x-text="previewMode ? 'Edit Mode' : 'Preview Mode'"></span>
        </button>
    </div>

    {{-- Content Sections --}}
    <div class="space-y-8">

        {{-- HERO SECTION --}}
        <div x-show="activeSubTab === 'hero'" x-transition class="space-y-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-image text-indigo-600"></i>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 font-brand">Hero Section</h3>
                    <p class="text-xs text-slate-500">Customize your homepage banner and call-to-action</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Background Image --}}
                <div class="space-y-3">
                    <label class="block text-sm font-bold text-slate-700">Background Image</label>
                    <div x-data="{ isDragging: false }"
                        @dragover.prevent="isDragging = true"
                        @dragleave.prevent="isDragging = false"
                        @drop.prevent="isDragging = false; $refs.heroInput.files = $event.dataTransfer.files; $refs.heroInput.dispatchEvent(new Event('change'))"
                        :class="isDragging ? 'border-indigo-500 bg-indigo-50' : 'border-slate-200 hover:border-indigo-300'"
                        class="relative border-2 border-dashed rounded-xl p-6 transition-all cursor-pointer group"
                        @click="$refs.heroInput.click()">
                        
                        <input x-ref="heroInput" type="file" wire:model="hero_background" accept="image/*" class="hidden">
                        
                        @if ($hero_background)
                            <img src="{{ $hero_background->temporaryUrl() }}" class="w-full h-48 object-cover rounded-lg mb-3">
                        @elseif ($customization->hero_background_image)
                            <img src="{{ $customization->getHeroBackgroundUrlAttribute() }}" class="w-full h-48 object-cover rounded-lg mb-3">
                        @else
                            <div class="flex flex-col items-center justify-center h-48">
                                <i class="fas fa-cloud-upload-alt text-4xl text-slate-300 mb-2"></i>
                                <p class="text-sm text-slate-600 font-bold">Upload Hero Image</p>
                                <p class="text-xs text-slate-400">Recommended: 2070x500px</p>
                            </div>
                        @endif
                    </div>

                    {{-- Overlay Opacity --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700">Overlay Opacity (%)</label>
                        <input type="range" wire:model.live="form.hero_overlay_opacity" min="0" max="100" 
                            class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-indigo-600">
                        <div class="text-xs text-slate-500 text-right font-bold">{{ $form['hero_overlay_opacity'] }}%</div>
                    </div>
                </div>

                {{-- Text Content --}}
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Hero Title</label>
                        <input type="text" wire:model.defer="form.hero_title" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Temukan Produk">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Hero Subtitle</label>
                        <input type="text" wire:model.defer="form.hero_subtitle" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Favorit Anda Disini.">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Hero Description</label>
                        <textarea wire:model.defer="form.hero_description" rows="3"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Brief description of your store..."></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Primary CTA Text</label>
                            <input type="text" wire:model.defer="form.hero_cta_text" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Belanja Sekarang">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Secondary CTA Text</label>
                            <input type="text" wire:model.defer="form.hero_secondary_cta_text" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Pelajari Lebih Lanjut">
                        </div>
                    </div>

                    {{-- Store Badge --}}
                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg">
                        <div>
                            <p class="text-sm font-bold text-slate-700">Show Store Badge</p>
                            <p class="text-xs text-slate-500">Display store name badge on hero</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model.defer="form.show_store_badge" class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-200 peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Custom Badge Text (Optional)</label>
                        <input type="text" wire:model.defer="form.store_badge_text" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Leave empty to use store name">
                    </div>
                </div>
            </div>
        </div>

        {{-- FEATURES SECTION --}}
        <div x-show="activeSubTab === 'features'" x-transition class="space-y-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-star text-cyan-600"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 font-brand">Features Section</h3>
                        <p class="text-xs text-slate-500">Highlight your store's key features</p>
                    </div>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" wire:model.defer="form.show_features_section" class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                </label>
            </div>

            {{-- Existing Features --}}
            @if(!empty($form['features']))
                <div class="space-y-3">
                    @foreach($form['features'] as $index => $feature)
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 hover:border-indigo-200 transition-all group">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex items-start gap-4 flex-1">
                                    <div class="w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0
                                        {{ $feature['color'] === 'indigo' ? 'bg-indigo-100 text-indigo-600' : '' }}
                                        {{ $feature['color'] === 'cyan' ? 'bg-cyan-100 text-cyan-600' : '' }}
                                        {{ $feature['color'] === 'emerald' ? 'bg-emerald-100 text-emerald-600' : '' }}
                                        {{ $feature['color'] === 'amber' ? 'bg-amber-100 text-amber-600' : '' }}
                                        {{ $feature['color'] === 'rose' ? 'bg-rose-100 text-rose-600' : '' }}">
                                        <i class="fas fa-{{ $feature['icon'] }}"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-slate-900 mb-1">{{ $feature['title'] }}</h4>
                                        <p class="text-sm text-slate-600">{{ $feature['description'] }}</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    @if($index > 0)
                                        <button wire:click="moveFeature({{ $index }}, 'up')" 
                                            class="w-8 h-8 bg-white hover:bg-slate-100 rounded-lg flex items-center justify-center text-slate-600 transition-all">
                                            <i class="fas fa-arrow-up text-xs"></i>
                                        </button>
                                    @endif
                                    @if($index < count($form['features']) - 1)
                                        <button wire:click="moveFeature({{ $index }}, 'down')" 
                                            class="w-8 h-8 bg-white hover:bg-slate-100 rounded-lg flex items-center justify-center text-slate-600 transition-all">
                                            <i class="fas fa-arrow-down text-xs"></i>
                                        </button>
                                    @endif
                                    <button wire:click="removeFeature({{ $index }})" 
                                        class="w-8 h-8 bg-red-50 hover:bg-red-100 rounded-lg flex items-center justify-center text-red-600 transition-all">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Add New Feature Form --}}
            <div class="p-5 bg-white border-2 border-dashed border-slate-200 rounded-xl hover:border-indigo-300 transition-all">
                <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-plus-circle text-indigo-600"></i>
                    Add New Feature
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Icon</label>
                        <select wire:model.defer="newFeature.icon" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="shield">Shield (Protection)</option>
                            <option value="truck-fast">Fast Delivery</option>
                            <option value="tags">Price Tag</option>
                            <option value="heart">Heart (Favorite)</option>
                            <option value="star">Star (Quality)</option>
                            <option value="lock">Security</option>
                            <option value="clock">24/7 Service</option>
                            <option value="gift">Gift/Bonus</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Color</label>
                        <select wire:model.defer="newFeature.color" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="indigo">Indigo</option>
                            <option value="cyan">Cyan</option>
                            <option value="emerald">Emerald</option>
                            <option value="amber">Amber</option>
                            <option value="rose">Rose</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Title</label>
                        <input type="text" wire:model.defer="newFeature.title" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="e.g., Kualitas Terjamin">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Description</label>
                        <input type="text" wire:model.defer="newFeature.description" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Short description...">
                    </div>
                </div>
                <button wire:click="addFeature" 
                    class="mt-4 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-bold transition-all">
                    <i class="fas fa-plus mr-2"></i>Add Feature
                </button>
            </div>
        </div>

        {{-- CATALOG SECTION --}}
        <div x-show="activeSubTab === 'catalog'" x-transition class="space-y-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-grid text-emerald-600"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 font-brand">Catalog Section</h3>
                        <p class="text-xs text-slate-500">Configure product showcase on homepage</p>
                    </div>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" wire:model.defer="form.show_catalog_section" class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                </label>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Section Title</label>
                    <input type="text" wire:model.defer="form.catalog_title" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Produk Unggulan">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Section Subtitle</label>
                    <input type="text" wire:model.defer="form.catalog_subtitle" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Pilihan Pelanggan">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Products to Display</label>
                    <input type="number" wire:model.defer="form.catalog_product_limit" min="1" max="12"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <p class="text-xs text-slate-500 mt-1">Recommended: 4-8 products</p>
                </div>
            </div>
        </div>

        {{-- CUSTOM SECTIONS --}}
        <div x-show="activeSubTab === 'sections'" x-transition class="space-y-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-layer-group text-purple-600"></i>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 font-brand">Custom Sections</h3>
                    <p class="text-xs text-slate-500">Add additional content sections to your homepage</p>
                </div>
            </div>

            {{-- Existing Custom Sections --}}
            @if(!empty($form['custom_sections']))
                <div class="space-y-3">
                    @foreach($form['custom_sections'] as $index => $section)
                        <div class="p-4 bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl border border-purple-200">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-slate-900">{{ $section['title'] }}</h4>
                                <button wire:click="removeCustomSection({{ $index }})" 
                                    class="text-red-600 hover:text-red-700 text-sm">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <p class="text-sm text-slate-600">{{ Str::limit($section['content'], 100) }}</p>
                            <span class="inline-block mt-2 px-2 py-1 bg-white rounded text-xs font-bold text-purple-600">
                                {{ ucfirst($section['type']) }} Section
                            </span>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Add Custom Section Form --}}
            <div class="p-5 bg-white border-2 border-dashed border-purple-200 rounded-xl">
                <h4 class="font-bold text-slate-900 mb-4">Add Custom Section</h4>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Section Type</label>
                        <select wire:model.defer="newSection.type" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="text">Text Content</option>
                            <option value="text-image">Text + Image</option>
                            <option value="banner">Full Width Banner</option>
                            <option value="cta">Call to Action</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Section Title</label>
                        <input type="text" wire:model.defer="newSection.title" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Section title...">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Content</label>
                        <textarea wire:model.defer="newSection.content" rows="4"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Section content..."></textarea>
                    </div>
                    <button wire:click="addCustomSection" 
                        class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg text-sm font-bold transition-all">
                        <i class="fas fa-plus mr-2"></i>Add Section
                    </button>
                </div>
            </div>
        </div>

        {{-- DESIGN & THEME --}}
        <div x-show="activeSubTab === 'design'" x-transition class="space-y-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-palette text-pink-600"></i>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 font-brand">Design & Theme</h3>
                    <p class="text-xs text-slate-500">Customize colors and visual style</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-3">Primary Color</label>
                    <div class="flex gap-3">
                        <input type="color" wire:model.live="form.primary_color" 
                            class="w-16 h-16 rounded-xl border-2 border-slate-200 cursor-pointer">
                        <input type="text" wire:model.defer="form.primary_color" 
                            class="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-mono">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-3">Secondary Color</label>
                    <div class="flex gap-3">
                        <input type="color" wire:model.live="form.secondary_color" 
                            class="w-16 h-16 rounded-xl border-2 border-slate-200 cursor-pointer">
                        <input type="text" wire:model.defer="form.secondary_color" 
                            class="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-mono">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-3">Accent Color</label>
                    <div class="flex gap-3">
                        <input type="color" wire:model.live="form.accent_color" 
                            class="w-16 h-16 rounded-xl border-2 border-slate-200 cursor-pointer">
                        <input type="text" wire:model.defer="form.accent_color" 
                            class="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm font-mono">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Theme Style</label>
                    <select wire:model.defer="form.theme" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="modern">Modern</option>
                        <option value="minimal">Minimal</option>
                        <option value="bold">Bold</option>
                        <option value="elegant">Elegant</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Font Family</label>
                    <select wire:model.defer="form.font_family" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="default">Default (Coolvetica + Creato)</option>
                        <option value="serif">Serif</option>
                        <option value="mono">Monospace</option>
                        <option value="sans">Sans-serif</option>
                    </select>
                </div>
            </div>

            {{-- Feature Toggles --}}
            <div class="space-y-3">
                <h4 class="font-bold text-slate-900">Feature Toggles</h4>
                @foreach([
                    'enable_chat' => 'Enable Live Chat',
                    'enable_reviews' => 'Enable Product Reviews',
                    'enable_reservations' => 'Enable Reservations',
                ] as $key => $label)
                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg">
                        <span class="text-sm font-bold text-slate-700">{{ $label }}</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model.defer="form.{{ $key }}" class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-200 peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- SEO & META --}}
        <div x-show="activeSubTab === 'seo'" x-transition class="space-y-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-search text-green-600"></i>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 font-brand">SEO & Meta Tags</h3>
                    <p class="text-xs text-slate-500">Optimize your site for search engines</p>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Meta Title</label>
                    <input type="text" wire:model.defer="form.meta_title" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Your Store Name - Best Products Online">
                    <p class="text-xs text-slate-500 mt-1">Recommended: 50-60 characters</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Meta Description</label>
                    <textarea wire:model.defer="form.meta_description" rows="3"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Shop the best products with fast shipping and great prices..."></textarea>
                    <p class="text-xs text-slate-500 mt-1">Recommended: 150-160 characters</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Meta Keywords</label>
                    <input type="text" wire:model.defer="form.meta_keywords" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="online shop, products, delivery, etc">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">OG Image (Social Media)</label>
                        <div class="border-2 border-dashed border-slate-200 rounded-xl p-4 hover:border-indigo-300 transition-all cursor-pointer"
                            @click="$refs.ogImageInput.click()">
                            <input x-ref="ogImageInput" type="file" wire:model="og_image_file" accept="image/*" class="hidden">
                            @if ($og_image_file)
                                <img src="{{ $og_image_file->temporaryUrl() }}" class="w-full h-32 object-cover rounded-lg">
                            @elseif ($customization->og_image)
                                <img src="{{ $customization->og_image_url }}" class="w-full h-32 object-cover rounded-lg">
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-image text-2xl text-slate-300 mb-2"></i>
                                    <p class="text-sm text-slate-600">Upload OG Image</p>
                                    <p class="text-xs text-slate-400">1200x630px recommended</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Favicon</label>
                        <div class="border-2 border-dashed border-slate-200 rounded-xl p-4 hover:border-indigo-300 transition-all cursor-pointer"
                            @click="$refs.faviconInput.click()">
                            <input x-ref="faviconInput" type="file" wire:model="favicon_file" accept="image/png,image/x-icon" class="hidden">
                            @if ($favicon_file)
                                <img src="{{ $favicon_file->temporaryUrl() }}" class="w-16 h-16 object-contain mx-auto">
                            @elseif ($customization->favicon)
                                <img src="{{ $customization->favicon_url }}" class="w-16 h-16 object-contain mx-auto">
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-star text-2xl text-slate-300 mb-2"></i>
                                    <p class="text-sm text-slate-600">Upload Favicon</p>
                                    <p class="text-xs text-slate-400">32x32px or 16x16px</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SOCIAL LINKS --}}
        <div x-show="activeSubTab === 'social'" x-transition class="space-y-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-share-nodes text-blue-600"></i>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 font-brand">Social Media Links</h3>
                    <p class="text-xs text-slate-500">Connect your social media profiles</p>
                </div>
            </div>

            <div class="space-y-4">
                @foreach([
                    'facebook' => ['icon' => 'facebook-f', 'placeholder' => 'https://facebook.com/yourpage'],
                    'instagram' => ['icon' => 'instagram', 'placeholder' => 'https://instagram.com/yourprofile'],
                    'twitter' => ['icon' => 'twitter', 'placeholder' => 'https://twitter.com/yourhandle'],
                    'tiktok' => ['icon' => 'tiktok', 'placeholder' => 'https://tiktok.com/@youraccount'],
                    'whatsapp' => ['icon' => 'whatsapp', 'placeholder' => 'https://wa.me/628123456789'],
                ] as $platform => $data)
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2 capitalize flex items-center gap-2">
                            <i class="fab fa-{{ $data['icon'] }}"></i>
                            {{ ucfirst($platform) }}
                        </label>
                        <input type="url" wire:model.defer="socialLinks.{{ $platform }}" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="{{ $data['placeholder'] }}">
                    </div>
                @endforeach
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Footer Text</label>
                <textarea wire:model.defer="form.footer_text" rows="2"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Custom footer text or tagline..."></textarea>
            </div>
        </div>

    </div>

    {{-- Save Button (Bottom) --}}
    <div class="flex justify-end pt-6 border-t border-slate-200">
        <button wire:click="save" wire:loading.attr="disabled"
            class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 transition-all transform active:scale-95 flex items-center gap-2">
            <i class="fas fa-save" wire:loading.remove></i>
            <i class="fas fa-spinner fa-spin" wire:loading></i>
            <span>Save Website Customization</span>
        </button>
    </div>
</div>