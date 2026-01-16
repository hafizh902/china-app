<div>
    {{-- Category & Sort Filter --}}
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-6 space-y-6">

            {{-- Title --}}
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800 tracking-tight">
                    Browse Categories
                </h2>

                {{-- Search Input --}}
                <div class="relative w-72">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 pointer-events-none">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search food..."
                        class="w-full pl-11 pr-10 py-2 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition" />

                    @if ($search)
                        <button wire:click="$set('search', '')"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    @endif
                </div>
            </div>

            {{-- Category Filter --}}
            <div class="flex flex-wrap gap-2">
                @php
                    $categories = [
                        'all' => ['All', null],
                        'noodles' => ['Noodles', 'fa-utensils'],
                        'dumplings' => ['Dumplings', 'fa-cookie-bite'],
                        'rice' => ['Rice', 'fa-bowl-rice'],
                        'drinks' => ['Drinks', 'fa-mug-hot'],
                        'desserts' => ['Desserts', 'fa-ice-cream'],
                    ];
                @endphp

                @foreach ($categories as $key => [$label, $icon])
                    <button wire:click="$set('category', '{{ $key }}')"
                        class="
                        inline-flex items-center gap-2
                        px-4 py-2 rounded-full text-sm font-medium
                        transition-all duration-200
                        {{ $category === $key
                            ? 'bg-red-500 text-white ring-2 ring-red-500/30'
                            : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}
                    ">
                        @if ($icon)
                            <i class="fas {{ $icon }} text-xs"></i>
                        @endif
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            {{-- Sort Filter --}}
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">Sort by:</span>

                <div class="flex gap-1 bg-gray-100 p-1 rounded-full">
                    @php
                        $options = [
                            'popular' => 'Popular',
                            'price-low' => 'Low Price',
                            'price-high' => 'High Price',
                            'name' => 'A–Z',
                        ];
                    @endphp

                    @foreach ($options as $value => $label)
                        <button wire:click="setSort('{{ $value }}')"
                            class="
                            px-4 py-1.5 text-sm rounded-full
                            transition-all duration-200
                            {{ $sort === $value ? 'bg-white text-red-500 font-semibold shadow-sm' : 'text-gray-600 hover:text-gray-900' }}
                        ">
                            {{ $label }}
                        </button>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    {{-- Menu Grid --}}
    <div class="px-6">
        @if ($menuItems->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($menuItems as $item)
                    <div class="relative">
                        <!-- Card menu item -->
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow {{ $item->is_available ? 'cursor-pointer' : 'cursor-not-allowed' }}"
                            @if($item->is_available)
                                wire:click="$dispatch('preview-modal', {{ json_encode($item) }})"
                            @endif>
                            <img src="{{ $item->image_url }}" alt="{{ $item->name }}"
                                class="w-full h-48 object-cover rounded-t-lg {{ !$item->is_available ? 'opacity-50' : '' }}">
                            <div class="absolute top-3 right-3">
                                <span class="px-2.5 py-1 rounded text-white text-xs font-medium shadow-sm {{ $item->is_available ? 'bg-green-600' : 'bg-gray-500' }}">
                                    {{ $item->is_available ? 'Available' : 'Unavailable' }}
                                </span>
                            </div>
                            @if(!$item->is_available)
                                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">Currently Unavailable</span>
                                </div>
                            @endif
                            <div class="p-4">
                                <h3 class="font-semibold text-lg">{{ $item->name }}</h3>
                                <p class="text-red-600 font-bold mt-2">
                                    Rp{{ number_format($item['price'], 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        {{-- Tombol Add to Cart --}}
                        @if($item->is_available)
                            <button
                                wire:click="$dispatch(
                                    'add-to-cart',
                                    [
                                        {{ $item['id'] }},
                                        '{{ $item['name'] }}',
                                        {{ $item['price'] }},
                                        '{{ $item['image'] }}'
                                    ]
                                ).to('cart-component')"
                                class="absolute bottom-3 right-3 bg-chinese-red text-white p-3 rounded-full">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            {{-- No items found --}}
            <div class="text-center py-12">
                <div class="max-w-md mx-auto">
                    <i class="fas fa-search text-gray-300 text-6xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Item not found</h3>
                    <p class="text-gray-500 mb-6">
                        We couldn't find any items matching "{{ $search }}".
                    </p>
                    <button wire:click="$set('search', '')"
                        class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>
                        Clear search
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>
