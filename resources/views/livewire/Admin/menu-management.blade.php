<div>
    <div class="flex justify-between items-center mb-6 mx-2">
        <h1 class="text-3xl font-bold text-gray-900">Menu Management</h1>
        <button type="button"
            class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg shadow-md hover:shadow-lg transition-all duration-200 font-medium flex items-center"
            wire:click="openCreateModal(); $dispatch('debug-modal')">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Item
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @foreach ($items as $item)
            <div
                class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-200 overflow-hidden relative border border-gray-100 mx-4">
                <span
                    class="absolute top-2 right-2 z-10 px-2.5 py-1 rounded text-white text-xs font-medium shadow-sm {{ $item->is_available ? 'bg-green-600' : 'bg-gray-500' }}">
                    {{ $item->is_available ? 'Available' : 'Unavailable' }}
                </span>

                <div class="flex">
                    <div class="w-24 h-24 flex-shrink-0 bg-gray-100 overflow-hidden">
                        @if($item->image)
                            <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100">
                                <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            @endif
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $item->name }}</td>
                    <td class="px-4 py-3 text-sm text-gray-500 max-w-xs truncate">{{ $item->description }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <span class="inline-block px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded">
                            {{ ucfirst($item->category) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm font-semibold text-red-600">
                        Rp{{ number_format($item->price, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <span class="px-2.5 py-1 rounded text-white text-xs font-medium {{ $item->is_available ? 'bg-green-600' : 'bg-gray-500' }}">
                            {{ $item->is_available ? 'Available' : 'Unavailable' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap text-center text-sm">
                        <button
                            type="button"
                            class="px-3 py-1.5 bg-gray-900 hover:bg-black text-white rounded text-xs font-medium transition-colors duration-150"
                            wire:click="edit({{ $item->id }})">
                            Edit
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 mx-2 flex justify-center">
        {{ $items->links() }}
    </div>

    <flux:modal wire:model.live="showCreateModal" class="max-w-xl">
        <div class="p-6">
            <div class="flex items-center">
                <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl mr-4">
                    <svg class="w-7 h-7 text-re-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Add New Menu Item </h2>
                </div>
            </div>

            <div class="space-y-4">

                {{-- Image Upload --}}
<div class="mb-5">
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Menu Image
    </label>

    <div class="flex items-start gap-4">
        {{-- Preview --}}
        <div class="w-28 h-28 rounded border border-dashed border-gray-300 flex items-center justify-center bg-white overflow-hidden">
            @if ($image)
                <img
                    src="{{ $image->temporaryUrl() }}"
                    class="w-full h-full object-cover"
                >
            @else
                <span class="text-xs text-gray-400 text-center px-2">
                    No image selected
                </span>
            @endif
        </div>

        {{-- Input --}}
        <div class="flex-1">
            <input
                type="file"
                wire:model="image"
                accept="image/*"
                class="block w-full text-sm text-gray-700
                       file:mr-3 file:py-2 file:px-4
                       file:rounded file:border-0
                       file:text-sm file:font-semibold
                       file:bg-red-50 file:text-red-600
                       hover:file:bg-red-100"
            >

            <div wire:loading wire:target="image" class="text-xs text-gray-500 mt-1">
                Uploading preview...
            </div>

            @error('image')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>


                <div>
                    <flux:input
                        label="Item Name"
                        wire:model.defer="name"
                        placeholder="e.g., Nasi Goreng Spesial"
                        class="w-full" />
                </div>

                <div>
                    <flux:input
                        label="Description"
                        wire:model.defer="description"
                        placeholder="e.g., Makanan ini enak sekali tau"
                        class="w-full" />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <flux:input
                            label="Category"
                            wire:model.defer="category"
                            placeholder="e.g., Main Course" />
                    </div>
                    <div>
                        <flux:input
                            type="number"
                            label="Price (Rp)"
                            wire:model.defer="price"
                            placeholder="25000" />
                    </div>
                </div>

                <div class="bg-gray-50 p-3 rounded border border-gray-200">
                    <flux:checkbox
                        label="Available for order"
                        wire:model.defer="is_available"
                        class="text-green-600" />
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-6 pt-4 border-t border-gray-200">
                <flux:button
                    type="button"
                    variant="ghost"
                    wire:click="$set('showCreateModal', false)"
                    class="px-5 py-2">
                    Cancel
                </flux:button>
                <flux:button
                    type="button"
                    wire:click="store"
                    class="px-5 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white">
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
                        class="w-full" />
                </div>

                <div>
                    <flux:input
                        label="Description"
                        wire:model.defer="description"
                        placeholder="e.g., Makanan ini enak sekali tau"
                        class="w-full" />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <flux:input
                            label="Category"
                            wire:model.defer="category"
                            placeholder="e.g., Main Course" />
                    </div>
                    <div>
                        <flux:input
                            type="number"
                            label="Price (Rp)"
                            wire:model.defer="price"
                            placeholder="25000" />
                    </div>
                </div>

                <div class="bg-gray-50 p-3 rounded border border-gray-200">
                    <flux:checkbox
                        label="Available for order"
                        wire:model.defer="is_available"
                        class="text-green-600" />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <flux:input label="Category" wire:model.defer="category" placeholder="e.g., Main Course" />
                    </div>
                    <div>
                        <flux:input type="number" label="Price (Rp)" wire:model.defer="price" placeholder="25000" />
                    </div>
                </div>
                {{-- 
                <div class="flex items-center gap-3 bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <flux:checkbox wire:model.defer="is_available"
                        class="w-5 h-5 text-green-600 focus:ring-green-500" />
                    <span class="text-sm font-medium text-gray-700">
                        Available for order
                    </span>
                </div> --}}

            </div>

            <div class="flex justify-end gap-2 mt-6 pt-4 border-t border-gray-200">
                <flux:button
                    type="button"
                    variant="ghost"
                    wire:click="$set('showEditModal', false)"
                    class="px-5 py-2">
                    Cancel
                </flux:button>
                <flux:button
                    type="button"
                    wire:click="update"
                    class="px-5 py-2 bg-gradient-to-r from-gray-900 to-black hover:from-black hover:to-gray-900 text-white">
                    Update Item
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
