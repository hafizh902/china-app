<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold chinese-font">Menu Management</h1>
        <button class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600" wire:click="$dispatch('open-add-menu-modal')">
            <i class="fas fa-plus mr-2"></i> Add New Item
        </button>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex flex-wrap gap-4">
            <input type="text" placeholder="Search..." class="flex-1 min-w-[200px] px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" />
            <select class="w-48 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                <option>All Categories</option>
                <option>Noodles</option>
            </select>
            <select class="w-48 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                <option>All Status</option>
                <option>Available</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($items as $item)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="font-bold">{{ $item['name'] }}</h3>
                <p class="text-gray-600">{{ ucfirst($item['category']) }}</p>
                <p class="text-red-600 font-bold mt-2">Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                <div class="mt-4 flex space-x-2">
                    <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded">Edit</button>
                    <button class="px-3 py-1 {{ $item['available'] ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }} rounded">
                        {{ $item['available'] ? 'Disable' : 'Enable' }}
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>