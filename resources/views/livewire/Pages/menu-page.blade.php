<div>
    {{-- Category & Sort Filter --}}
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-6 space-y-6">

            {{-- Title --}}
            <h2 class="text-xl font-semibold text-gray-800 tracking-tight">
                Browse Categories
            </h2>

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
    <div class="px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($menuItems as $item)
            <div class="relative">
                <!-- Card menu item -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer"
                    wire:click="$dispatch('add-to-cart', {{ json_encode($item) }})">
                    <img src="{{ $item->image_url }}" alt="{{ $item->name }}"
                        class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">{{ $item->name }}</h3>
                        <p class="text-red-600 font-bold mt-2">
                            Rp{{ number_format($item['price'], 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                {{-- Tombol Add to Cart --}}
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
            </div>
        @endforeach
    </div>
</div>
