<div>
    <div class="mb-6 mx-2">
        <h1 class="text-3xl font-bold text-gray-900">Menu Management</h1>
    </div>

    <div class="grid grid-cols-12 gap-4 mx-2">
        <!-- Kolom 1: Menu Cards -->
        <div class="col-span-9">
            <div class="grid grid-cols-6 gap-4 mb-6">
                @foreach ($items as $item)
                <div
                    wire:key="menu-{{ $item->id }}"
                    class="bg-white rounded-lg shadow hover:shadow-xl transition-shadow duration-200 overflow-hidden border border-gray-100 flex flex-col relative">

                    @if ($deleteMode)
                    <div class="absolute top-2 left-2 z-20">
                        <input type="checkbox"
                            wire:model="selectedItems"
                            value="{{ $item->id }}"
                            class="w-5 h-5 text-red-600 bg-white border-2 border-gray-300 rounded focus:ring-2 focus:ring-red-500 cursor-pointer">
                    </div>
                    @endif

                    <div class="relative">
                        <span
                            class="absolute top-2 right-2 z-10 px-2 py-1 rounded text-white text-xs font-medium shadow-sm {{ $item->is_available ? 'bg-green-600' : 'bg-gray-500' }}">
                            {{ $item->is_available ? 'Available' : 'Unavailable' }}
                        </span>

                        <div class="w-full h-40 bg-gray-100 overflow-hidden">
                            @if ($item->image)
                            <img src="{{ $item->image_url }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16"></path>
                                </svg>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="p-4 flex-1 flex flex-col">
                        <h3 class="font-semibold text-gray-900 text-sm truncate">{{ $item->name }}</h3>
                        <p class="text-xs text-gray-500 line-clamp-2 flex-1">{{ $item->description }}</p>

                        <div class="flex justify-between my-3">
                            <span class="text-xs bg-gray-100 px-2 py-1 rounded">
                                {{ $item->category_label }}
                            </span>
                            <span class="font-bold text-red-600 text-sm">
                                Rp{{ number_format($item->price, 0, ',', '.') }}
                            </span>
                        </div>

                        @if (!$deleteMode)
                        <button wire:click="edit({{ $item->id }})"
                            class="w-full px-3 py-2 bg-gray-900 text-white rounded text-xs">
                            Edit Item
                        </button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <div class="flex justify-end">
                {{ $items->links() }}
            </div>
        </div>

        <!-- Action Panel -->
        <div class="col-span-3 space-y-3">
            <div class="bg-white rounded-lg shadow p-4 space-y-2">
                <button wire:click="openCreateModal"
                    class="w-full px-3 py-2 bg-red-600 text-white rounded">
                    Add New Item
                </button>

                <button wire:click="toggleDeleteMode"
                    class="w-full px-3 py-2 border border-red-600 text-red-600 rounded">
                    {{ $deleteMode ? 'Cancel' : 'Delete Items' }}
                </button>

                @if ($deleteMode)
                <button wire:click="deleteSelected"
                    class="w-full px-3 py-2 bg-red-600 text-white rounded">
                    Confirm Delete
                </button>
                @endif
            </div>

            <!-- Filters -->
            <div class="bg-white rounded-lg shadow p-4 space-y-2">
                <input type="text"
                    wire:model.live.debounce.500ms="search"
                    placeholder="Search items..."
                    class="w-full px-3 py-2 border rounded text-xs">

                <select wire:model.live="filterCategory"
                    class="w-full px-3 py-2 border rounded text-xs">
                    <option value="">All Categories</option>
                    <option value="main_course">Main Course</option>
                    <option value="snacks">Snacks</option>
                    <option value="drinks">Drinks</option>
                    <option value="desserts">Desserts</option>
                </select>

                <div class="grid grid-cols-2 gap-2">
                    <input type="number" wire:model.live="minPrice" placeholder="Min"
                        class="px-3 py-2 border rounded text-xs">
                    <input type="number" wire:model.live="maxPrice" placeholder="Max"
                        class="px-3 py-2 border rounded text-xs">
                </div>

                <select wire:model.live="sortBy"
                    class="w-full px-3 py-2 border rounded text-xs">
                    <option value="name_asc">Name (A-Z)</option>
                    <option value="name_desc">Name (Z-A)</option>
                    <option value="price_asc">Price ↑</option>
                    <option value="price_desc">Price ↓</option>
                </select>

                <div class="grid grid-cols-2 gap-2">
                    <button wire:click="applyFilter"
                        class="px-3 py-2 bg-red-600 text-white rounded text-xs">
                        Apply
                    </button>
                    <button wire:click="resetFilter"
                        class="px-3 py-2 bg-gray-200 rounded text-xs">
                        Reset
                    </button>
                </div>
            </div>
        </div>
    </div>

    <flux:modal wire:model.live="showCreateModal" class="max-w-3xl">
        <div class="p-6 bg-white text-black rounded-xl shadow-sm">
            <h2 class="text-xl font-semibold mb-6">Add New Menu Item</h2>

            <div class="grid grid-cols-2 gap-6">

                {{-- IMAGE --}}
                <div
                    x-data
                    x-on:dragover.prevent="$el.classList.add('ring-2','ring-red-400')"
                    x-on:dragleave.prevent="$el.classList.remove('ring-2','ring-red-400')"
                    x-on:drop.prevent="
                    $el.classList.remove('ring-2','ring-red-400');
                    $refs.file.files = $event.dataTransfer.files;
                    $refs.file.dispatchEvent(new Event('change'));
                "
                    class="flex flex-col gap-3">
                    <label class="text-sm font-medium">Menu Image</label>

                    <div
                        class="w-full h-60 border border-dashed border-gray-300 rounded-lg flex items-center justify-center bg-gray-50 overflow-hidden">
                        @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                        @else
                        <span class="text-sm text-gray-400">Drag & drop image here</span>
                        @endif
                    </div>

                    <input type="file" wire:model="image" x-ref="file" accept="image/*"
                        class="block w-full text-sm text-black border border-gray-300 rounded-md
                    file:mr-3 file:py-2 file:px-4
                    file:border-0 file:bg-gray-100 file:text-black hover:file:bg-gray-200">
                </div>

                {{-- FORM --}}
                <div class="space-y-4">

                    <div>
                        <label class="block text-sm font-medium mb-1">Item Name</label>
                        <input type="text" wire:model.defer="name"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-black">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Description</label>
                        <input type="text" wire:model.defer="description"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-black">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Category</label>
                        <select wire:model.defer="category"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-black">
                            <option value="">-- Select --</option>
                            <option value="main_course">Main Course</option>
                            <option value="snacks">Snacks</option>
                            <option value="drinks">Drinks</option>
                            <option value="desserts">Dessert</option>
                        </select>
                    </div>

                    {{-- PRICE (FIXED) --}}
                    <div
                        x-data="{
                        display: '',
                        format(v) {
                            return v.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        }
                    }">
                        <label class="block text-sm font-medium mb-1">Price (Rp)</label>

                        <input type="text"
                            x-model="display"
                            x-on:input="
                            let raw = display.replace(/\D/g,'');
                            $wire.price = raw;
                            display = format(raw);
                        "
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-black"
                            placeholder="10.000">
                    </div>

                    <div class="flex items-center gap-2 pt-2">
                        <input type="checkbox" wire:model.defer="is_available"
                            class="w-5 h-5 border border-gray-300 rounded text-green-600">
                        <span class="text-sm">Available for order</span>
                    </div>

                </div>
            </div>

            <div class="flex justify-end gap-3 mt-8">
                <flux:button type="button" variant="ghost"
                    wire:click="$set('showCreateModal', false)">
                    Cancel
                </flux:button>

                <flux:button type="button" wire:click="store"
                    class="bg-red-600 hover:bg-red-700 text-white px-6">
                    Save Item
                </flux:button>
            </div>
        </div>
    </flux:modal>


    <flux:modal wire:model.live="showEditModal" class="max-w-3xl">
        <div class="p-6 bg-white text-black rounded-xl shadow-sm">
            <h2 class="text-xl font-semibold mb-6">Edit Menu Item</h2>

            <div class="grid grid-cols-2 gap-6">

                {{-- IMAGE --}}
                <div
                    x-data
                    x-on:dragover.prevent="$el.classList.add('ring-2','ring-red-400')"
                    x-on:dragleave.prevent="$el.classList.remove('ring-2','ring-red-400')"
                    x-on:drop.prevent="
                    $el.classList.remove('ring-2','ring-red-400');
                    $refs.file.files = $event.dataTransfer.files;
                    $refs.file.dispatchEvent(new Event('change'));
                "
                    class="flex flex-col gap-3">
                    <label class="text-sm font-medium">Menu Image</label>

                    <div
                        class="w-full h-60 border border-dashed border-gray-300 rounded-lg flex items-center justify-center bg-gray-50 overflow-hidden">
                        @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                        @elseif(isset($menu) && $menu->image_url)
                        <img src="{{ $menu->image_url }}" class="w-full h-full object-cover">
                        @else
                        <span class="text-sm text-gray-400">Drag & drop image here</span>
                        @endif
                    </div>

                    <input
                        type="file"
                        wire:model="image"
                        x-ref="file"
                        accept="image/*"
                        class="block w-full text-sm text-black border border-gray-300 rounded-md
                    file:mr-3 file:py-2 file:px-4
                    file:border-0 file:bg-gray-100 file:text-black hover:file:bg-gray-200">
                </div>

                {{-- FORM --}}
                <div class="space-y-4">

                    <div>
                        <label class="block text-sm font-medium mb-1">Item Name</label>
                        <input
                            type="text"
                            wire:model.defer="name"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-black">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Description</label>
                        <input
                            type="text"
                            wire:model.defer="description"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-black">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Category</label>
                        <select
                            wire:model.defer="category"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-black">
                            <option>Main Course</option>
                            <option>Snacks</option>
                            <option>Drinks</option>
                            <option>Dessert</option>
                        </select>
                    </div>

                    {{-- PRICE (SYNCED & FIXED) --}}
                    <div
                        x-data="{
                        display: '',
                        format(v) {
                            return v.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        },
                        init() {
                            if ($wire.price) {
                                this.display = this.format(String($wire.price));
                            }
                        }
                    }">
                        <label class="block text-sm font-medium mb-1">Price (Rp)</label>

                        <input
                            type="text"
                            x-model="display"
                            x-on:input="
                            let raw = display.replace(/\D/g,'');
                            $wire.price = raw;
                            display = format(raw);
                        "
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-black"
                            placeholder="10.000">
                    </div>

                    <div class="flex items-center gap-2 pt-2">
                        <input
                            type="checkbox"
                            wire:model.defer="is_available"
                            class="w-5 h-5 border border-gray-300 rounded text-green-600">
                        <span class="text-sm">Available for order</span>
                    </div>

                </div>
            </div>

            <div class="flex justify-end gap-3 mt-8">
                <flux:button
                    type="button"
                    variant="ghost"
                    wire:click="$set('showEditModal', false)">
                    Cancel
                </flux:button>

                <flux:button
                    type="button"
                    wire:click="update"
                    class="bg-black hover:bg-gray-900 text-white px-6">
                    Update Item
                </flux:button>
            </div>
        </div>
    </flux:modal>


</div>