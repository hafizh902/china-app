<div x-data="{ open: false }" 
     @cart-updated.window="open = true" 
     class="relative">
    
    <button @click="open = true" class="relative p-2 text-gray-700 hover:text-red-700 transition-colors">
        <i class="fas fa-shopping-cart text-xl"></i>
        @if($count > 0)
            <span class="absolute -top-1 -right-1 bg-amber-400 text-red-900 text-[10px] rounded-full h-5 w-5 flex items-center justify-center font-bold shadow-sm border border-white">
                {{ $count }}
            </span>
        @endif
    </button>

    {{-- Menggunakan wire:click.self agar hanya klik pada area kosong (backdrop) yang memicu tutup --}}
    <div 
        x-show="open" 
        style="display: none;"
        class="fixed inset-0 z-[9999] flex justify-end transition-all duration-300"
        tabindex="0"
        @keydown.escape.window="open = false" {{-- Alpine version for instant feel --}}
        wire:keydown.escape="closeCart" {{-- Livewire version to sync state --}}
        wire:click.self="closeCart" {{-- Klik di luar sidebar (pada self/overlay) akan menutup --}}
        x-init="$watch('open', value => { if(!value) $wire.closeCart() })">
        
        <div class="fixed inset-0 bg-stone-900/60 backdrop-blur-sm -z-10"></div>

        {{-- Kita tidak menaruh click.self di sini agar klik di dalam keranjang tidak menutup --}}
        <div 
            x-show="open"
            x-transition:enter="transition transform ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition transform ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="bg-[#fdfcf8] w-full max-w-sm h-full shadow-2xl border-l border-amber-100 flex flex-col">
            
            <div class="p-6 border-b border-amber-100 flex justify-between items-center bg-white">
                <div class="flex items-center gap-2">
                    <span class="text-red-700 font-serif text-xl font-bold">福</span>
                    <h2 class="text-lg font-serif font-bold text-stone-800 tracking-widest uppercase">Keranjang</h2>
                </div>
                <button @click="open = false" class="text-stone-400 hover:text-red-700 text-2xl">&times;</button>
            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-4">
                @forelse($cart as $item)
                    <div class="flex items-center gap-4 p-4 bg-white rounded-xl border border-amber-50 shadow-sm transition-hover hover:border-amber-200">
                        <div class="flex-1">
                            <h4 class="font-bold text-stone-800 text-sm leading-tight">{{ $item['name'] }}</h4>
                            <p class="text-red-700 font-bold text-xs mt-1">Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                        </div>
                        
                        <div class="flex items-center bg-stone-100 rounded-lg p-1">
                            <button class="w-6 h-6 flex items-center justify-center bg-white rounded shadow-sm text-[10px]" wire:click="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] - 1 }})">-</button>
                            <span class="text-xs font-bold px-3">{{ $item['quantity'] }}</span>
                            <button class="w-6 h-6 flex items-center justify-center bg-white rounded shadow-sm text-[10px]" wire:click="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] + 1 }})">+</button>
                        </div>

                        <button wire:click="removeItem({{ $item['id'] }})" class="text-stone-300 hover:text-red-600 transition-colors">
                            <i class="fas fa-trash-alt text-xs"></i>
                        </button>
                    </div>
                @empty
                    <div class="h-full flex flex-col items-center justify-center opacity-40">
                        <i class="fas fa-shopping-basket text-4xl mb-4"></i>
                        <p class="text-xs italic tracking-widest">Belum ada hidangan terpilih</p>
                    </div>
                @endforelse
            </div>

            @if($count > 0)
                <div class="p-6 bg-white border-t border-amber-100 space-y-4">
                    <div class="flex justify-between text-lg font-serif font-bold text-stone-900 uppercase">
                        <span>Total Rejeki</span>
                        <span class="text-red-700">Rp{{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                    <button class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-4 rounded-xl shadow-lg shadow-red-100 uppercase tracking-widest text-xs transition-all active:scale-95" 
                            wire:navigate href="{{ route('checkout') }}">
                        Selesaikan Pesanan
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>