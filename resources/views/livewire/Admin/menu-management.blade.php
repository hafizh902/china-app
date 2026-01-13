<div>
    <div class="flex justify-between items-center mb-6 mx-2">
        <h1 class="text-3xl font-bold text-gray-900">Menu Management</h1>
        <button
            type="button"
            class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg shadow-md hover:shadow-lg transition-all duration-200 font-medium flex items-center"
            wire:click="openCreateModal(); $dispatch('debug-modal')"
        >
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Item
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @foreach($items as $item)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-200 overflow-hidden relative border border-gray-100 mx-4">
                <span class="absolute top-2 right-2 z-10 px-2.5 py-1 rounded text-white text-xs font-medium shadow-sm {{ $item->is_available ? 'bg-green-600' : 'bg-gray-500' }}">
                    {{ $item->is_available ? 'Available' : 'Unavailable' }}
                </span>
                
                <div class="flex">
                    <div class="w-24 h-24 flex-shrink-0 bg-gray-100 overflow-hidden">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100">
                                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex-1 p-3 pr-2">
                        <h3 class="font-bold text-sm text-gray-900 mb-0.5 line-clamp-1">{{ $item->name }}</h3>
                        <p class="text-xs text-gray-500 mb-1 line-clamp-1">{{ $item->description }}</p>
                        <span class="inline-block px-2 py-0.5 bg-gray-100 text-gray-700 text-xs rounded mb-1.5">
                            {{ ucfirst($item->category) }}
                        </span>
                        <p class="text-red-600 font-bold text-base mb-2">
                            Rp{{ number_format($item->price, 0, ',', '.') }}
                        </p>
                        <button
                            type="button"
                            class="w-full px-3 py-1.5 bg-gray-900 hover:bg-black text-white rounded text-xs font-medium transition-colors duration-150"
                            wire:click="edit({{ $item->id }})"
                        >
                            Edit Menu
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <flux:modal wire:model.live="showCreateModal" class="max-w-xl">
        <div class="p-6">
            <div class="flex items-center mb-6 pb-4 border-b-2 border-red-600">
                <div class="w-1 h-8 bg-red-600 mr-3"></div>
                <flux:heading class="text-2xl font-bold text-gray-900">Add New Menu Item</flux:heading>
            </div>
            
            <div class="space-y-4">
                <div>
                    <flux:input 
                        label="Item Name" 
                        wire:model.defer="name" 
                        placeholder="e.g., Nasi Goreng Spesial"
                        class="w-full"
                    />
                </div>
                
                <div>
                    <flux:input 
                        label="Description" 
                        wire:model.defer="description" 
                        placeholder="e.g., Makanan ini enak sekali tau"
                        class="w-full"
                    />
                </div>
                
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <flux:input 
                            label="Category" 
                            wire:model.defer="category" 
                            placeholder="e.g., Main Course"
                        />
                    </div>
                    <div>
                        <flux:input 
                            type="number" 
                            label="Price (Rp)" 
                            wire:model.defer="price" 
                            placeholder="25000"
                        />
                    </div>
                </div>

                <div class="bg-gray-50 p-3 rounded border border-gray-200">
                    <flux:checkbox 
                        label="Available for order" 
                        wire:model.defer="is_available"
                        class="text-green-600"
                    />
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-6 pt-4 border-t border-gray-200">
                <flux:button 
                    type="button" 
                    variant="ghost" 
                    wire:click="$set('showCreateModal', false)"
                    class="px-5 py-2"
                >
                    Cancel
                </flux:button>
                <flux:button 
                    type="button" 
                    wire:click="store"
                    class="px-5 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white"
                >
                    Save Item
                </flux:button>
            </div>
        </div>
    </flux:modal>

    <flux:modal wire:model.live="showEditModal" class="max-w-xl">
        <div class="p-6">
            <div class="flex items-center mb-6 pb-4 border-b-2 border-red-600">
                <div class="w-1 h-8 bg-red-600 mr-3"></div>
                <flux:heading class="text-2xl font-bold text-gray-900">Edit Menu Item</flux:heading>
            </div>
            
            <div class="space-y-4">
                <div>
                    <flux:input 
                        label="Item Name" 
                        wire:model.defer="name" 
                        placeholder="e.g., Nasi Goreng Spesial"
                        class="w-full"
                    />
                </div>
                
                <div>
                    <flux:input 
                        label="Description" 
                        wire:model.defer="description" 
                        placeholder="e.g., Makanan ini enak sekali tau"
                        class="w-full"
                    />
                </div>
                
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <flux:input 
                            label="Category" 
                            wire:model.defer="category" 
                            placeholder="e.g., Main Course"
                        />
                    </div>
                    <div>
                        <flux:input 
                            type="number" 
                            label="Price (Rp)" 
                            wire:model.defer="price" 
                            placeholder="25000"
                        />
                    </div>
                </div>

                <div class="bg-gray-50 p-3 rounded border border-gray-200">
                    <flux:checkbox 
                        label="Available for order" 
                        wire:model.defer="is_available"
                        class="text-green-600"
                    />
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-6 pt-4 border-t border-gray-200">
                <flux:button 
                    type="button" 
                    variant="ghost" 
                    wire:click="$set('showEditModal', false)"
                    class="px-5 py-2"
                >
                    Cancel
                </flux:button>
                <flux:button 
                    type="button" 
                    wire:click="update"
                    class="px-5 py-2 bg-gradient-to-r from-gray-900 to-black hover:from-black hover:to-gray-900 text-white"
                >
                    Update Item
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>