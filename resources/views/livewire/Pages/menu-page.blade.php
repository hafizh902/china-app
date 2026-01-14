<div>
    {{-- Category Filter --}}
    <div class="mb-8 px-6">
        <div class="flex flex-wrap gap-3">
            @foreach(['all' => 'All Items', 'noodles' => 'Noodles', 'dumplings' => 'Dumplings', 'rice' => 'Rice', 'drinks' => 'Drinks', 'desserts' => 'Desserts'] as $cat => $label)
                <!-- Tombol filter kategori - aktif jika kategori dipilih -->
                <button
                    @if($category === $cat) class="bg-red-500 text-white" @else class="bg-gray-200 text-gray-700" @endif
                    wire:click="$set('category', '{{ $cat }}')"
                    class="px-6 py-3 rounded-full font-medium hover:bg-red-600 transition"
                >
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- Search & Sort --}}
    <div class="px-6 mb-6 flex flex-wrap gap-4 items-center">
        <!-- Input pencarian dengan debounce 300ms -->
        <input
            type="text"
            placeholder="Search..."
            wire:model.live.debounce.300ms="search"
            class="flex-1 min-w-[200px] px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
        />
        <!-- Dropdown untuk sorting -->
        <select wire:model="sort" class="w-48 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
            <option value="popular">Popular</option>
            <option value="price-low">Price: Low to High</option>
            <option value="price-high">Price: High to Low</option>
            <option value="name">Name</option>
        </select>
    </div>

    {{-- Menu Grid --}}
    <div class="px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($menuItems as $item)
            <!-- Card menu item - klik untuk tambah ke keranjang -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer" wire:click="$dispatch('add-to-cart', {{ json_encode($item) }})">
                <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">{{ $item->name }}</h3>
                    <p class="text-red-600 font-bold mt-2">Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>