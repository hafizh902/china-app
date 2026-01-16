<div id="preview-modal" class="fixed inset-0 z-[9999] overflow-y-auto flex items-center justify-center"
    style="display: {{ $showModal ? 'flex' : 'none' }}; background-color: rgba(0, 0, 0, {{ $showModal ? '0.5' : '0' }});"
    @click.self="$wire.closeModal()" @keydown.escape="$wire.closeModal()">
        @if($selectedItem)
            {{-- IMAGE --}}
            <div class="relative h-64 bg-gray-100">
                <img
                    src="{{ $selectedItem['image_url'] }}"
                    alt="{{ $selectedItem['name'] }}"
                    class="w-full h-full object-cover"
                >

                {{-- Availability Badge --}}
                <div class="absolute top-4 right-4">
                    @if($selectedItem['is_available'])
                        <span class="bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                            Available
                        </span>
                    @else
                        <span class="bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                            Unavailable
                        </span>
                    @endif
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="p-6">
                {{-- Title --}}
                <div class="mb-2">
                    <h2 class="text-2xl font-bold text-gray-900">
                        {{ $selectedItem['name'] }}
                    </h2>

                    <p class="text-sm text-gray-500 capitalize">
                        {{ $selectedItem['category'] }}
                    </p>
                </div>

                {{-- Description --}}
                <p class="text-gray-700 text-sm leading-relaxed mb-4">
                    {{ $selectedItem['description'] ?? 'No description available.' }}
                </p>

                {{-- Info --}}
                <div class="flex items-center justify-between mb-6">
                    <span class="text-2xl font-extrabold text-chinese-red">
                        Rp{{ number_format($selectedItem['price'], 0, ',', '.') }}
                    </span>

                    @if($selectedItem['prep_time_minutes'] ?? false)
                        <span class="text-sm text-gray-500 flex items-center gap-1">
                            ⏱ {{ $selectedItem['prep_time_minutes'] }} min
                        </span>
                    @endif
                </div>

                {{-- ACTION --}}
                <button
                    class="w-full bg-chinese-red text-white py-3 rounded-xl font-semibold text-lg
                           hover:opacity-90 transition disabled:opacity-50 disabled:cursor-not-allowed"
                    wire:click="$dispatch(
                        'add-to-cart',
                        [
                            {{ $selectedItem['id'] }},
                            '{{ $selectedItem['name'] }}',
                            {{ $selectedItem['price'] }},
                            '{{ $selectedItem['image'] }}'
                        ]
                    ).to('cart-component')"
                    @disabled(!($selectedItem['is_available']))
                >
                    {{ $selectedItem['is_available'] ? 'Add to Cart' : 'Currently Unavailable' }}
                </button>
            </div>
        @endif
    </div>
</div>
