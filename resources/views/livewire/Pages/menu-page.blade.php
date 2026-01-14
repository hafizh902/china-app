<div>
    {{-- Category Filter --}}
    <div class="px-6 py-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-red-600" style="font-family: 'Noto Sans SC', sans-serif;">
                Browse Categories
            </h2>

            <div class="flex flex-wrap gap-3">
                @php
                $categories = [
                'all' => ['All Items', null],
                'noodles' => ['Noodles', 'fa-utensils'],
                'dumplings' => ['Dumplings', 'fa-cookie-bite'],
                'rice' => ['Rice Dishes', 'fa-bowl-rice'],
                'drinks' => ['Drinks', 'fa-mug-hot'],
                'desserts' => ['Desserts', 'fa-ice-cream'],
                ];
                @endphp

                @foreach($categories as $key => [$label, $icon])
                <button
                    wire:click="$set('category', '{{ $key }}')"
                    class="
                        flex items-center gap-2
                        px-6 py-3
                        rounded-full
                        font-medium
                        transition-all
                        duration-200
                        {{ $category === $key
                            ? 'bg-red-600 text-white shadow-md'
                            : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                        }}
                    ">
                    @if($icon)
                    <i class="fas {{ $icon }}"></i>
                    @endif
                    {{ $label }}
                </button>
                @endforeach
            </div>
        </div>
    </div>


    {{-- Search & Sort --}}
    <div class="px-6 mb-6 flex flex-wrap gap-4 items-center">
        {{-- Sorting Segmented Button --}}
        <div class="flex items-center gap-2 bg-gray-100 p-1 rounded-full shadow-inner">
            @php
            $options = [
            'popular' => 'Popular',
            'price-low' => 'Low Price',
            'price-high' => 'High Price',
            'name' => 'A–Z',
            ];
            @endphp

            @foreach ($options as $value => $label)
            <button
                wire:click="setSort('{{ $value }}')"
                class="
                relative px-5 py-2 rounded-full text-sm font-semibold
                transition-all duration-300
                {{ $sort === $value
                    ? 'bg-red-500 text-white shadow'
                    : 'text-gray-600 hover:text-red-500'
                }}
            ">
                {{ $label }}
            </button>
            @endforeach
        </div>

    </div>

    {{-- Menu Grid --}}
    <div class="px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($menuItems as $item)
        <!-- Card menu item - klik untuk tambah ke keranjang -->
        <div class="relative bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <img
                src="{{ $item['image'] }}"
                alt="{{ $item['name'] }}"
                class="w-full h-48 object-cover rounded-t-lg">

            <div class="p-4">
                <h3 class="font-semibold text-lg">{{ $item['name'] }}</h3>
                <p class="text-red-600 font-bold mt-2">
                    Rp{{ number_format($item['price'], 0, ',', '.') }}
                </p>
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