<div class="bg-[#fdfcf8] min-h-screen pb-20">
    {{-- Header Dekoratif --}}
    <div class="relative py-10 mb-10 bg-red-800 text-center overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,<svg width=\" 60\" height=\"30\" viewBox=\"0 0 60 30\" xmlns=\"http://www.w3.org/2000/svg\">
            <path d=\"M0 15Q15 0 30 15Q45 30 60 15\" stroke=\"%23fff\" fill=\"none\" /></svg>');">
        </div>
        <h1 class="text-3xl font-serif font-black text-amber-400 tracking-[0.3em] uppercase relative z-10">{{ __('language.order_completion') }}</h1>
        <div class="flex justify-center gap-4 mt-2 relative z-10">
            <span class="h-px w-12 bg-amber-400/50 self-center"></span>
            <span class="text-red-100 text-[10px] uppercase tracking-[0.4em] font-bold">{{ __('language.imperial_banquet') }}</span>
            <span class="h-px w-12 bg-amber-400/50 self-center"></span>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 lg:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <div class="lg:col-span-8 space-y-8">

                {{-- Delivery Information Card --}}
                <div class="bg-white rounded-[2rem] shadow-sm border border-amber-100 p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-[0.05] pointer-events-none">
                        <i class="fas fa-shuttle-van text-6xl"></i>
                    </div>

                    <h2 class="text-xl font-serif font-bold mb-8 flex items-center gap-3 text-stone-800">
                        <span class="w-8 h-8 bg-red-700 text-white rounded-lg flex items-center justify-center text-sm italic">1</span>
                        {{ __('language.delivery_information') }}
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2">{{ __('language.first_name') }}</label>
                            <input type="text" wire:model.defer="firstName"
                                class="w-full px-5 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all placeholder:text-stone-300 text-sm font-bold @error('firstName') ring-2 ring-red-500 @enderror"
                                placeholder="Example: John">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2">{{ __('language.last_name') }}</label>
                            <input type="text" wire:model.defer="lastName"
                                class="w-full px-5 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all placeholder:text-stone-300 text-sm font-bold @error('lastName') ring-2 ring-red-500 @enderror"
                                placeholder="Example: Doe">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2">{{ __('language.banquet_email') }}</label>
                            <input type="email" wire:model.defer="email"
                                class="w-full px-5 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all placeholder:text-stone-300 text-sm font-bold @error('email') ring-2 ring-red-500 @enderror"
                                placeholder="JohnDoe@email.com">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2">{{ __('language.phone_number') }}</label>
                            <div class="flex gap-2">
                                <select wire:model="phoneCode" class="bg-stone-50 border-none rounded-2xl text-sm font-bold focus:ring-2 focus:ring-red-700">
                                    <option value="+62">+62</option>
                                </select>
                                <input type="text" wire:model.defer="phone"
                                    class="flex-1 px-5 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all placeholder:text-stone-300 text-sm font-bold @error('phone') ring-2 ring-red-500 @enderror"
                                    placeholder="812xxxxxx">
                            </div>
                        </div>
                    </div>

                    {{-- Order Type Selection --}}
                    <div class="mt-8 flex gap-4">
                        <label class="flex-1 cursor-pointer group">
                            <input type="radio" wire:model.live="orderType" value="delivery" class="hidden peer">
                            <div class="p-4 border-2 border-stone-100 rounded-2xl peer-checked:border-red-700 peer-checked:bg-red-50 transition-all group-hover:bg-stone-50">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-motorcycle text-stone-400"></i>
                                    <span class="text-sm font-bold text-stone-600">{{ __('language.delivery') }}</span>
                                </div>
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer group">
                            <input type="radio" wire:model.live="orderType" value="pickup" class="hidden peer">
                            <div class="p-4 border-2 border-stone-100 rounded-2xl peer-checked:border-red-700 peer-checked:bg-red-50 transition-all group-hover:bg-stone-50">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-store text-stone-400"></i>
                                    <span class="text-sm font-bold text-stone-600">{{ __('language.pickup') }}</span>
                                </div>
                            </div>
                        </label>
                    </div>

                    @if($orderType === 'delivery')
                    <div class="mt-6 space-y-2 animate-fade-in-down">
                        <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2">{{ __('language.full_address') }}</label>
                        <textarea wire:model.defer="address" rows="3"
                            class="w-full px-5 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all text-sm font-bold"
                            placeholder="Jl. Naga Emas No. 88, Cluster Jade..."></textarea>
                    </div>
                    @endif

                    <div class="mt-6 space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-2">{{ __('language.special_notes') }}</label>
                        <textarea wire:model="instructions" rows="2"
                            class="w-full px-5 py-4 bg-stone-50 border-none rounded-2xl focus:ring-2 focus:ring-red-700 transition-all text-sm font-bold italic"
                            placeholder="Example: Reduce MSG, add extra chili sauce..."></textarea>
                    </div>
                </div>

                {{-- Payment Method Card --}}
                <div class="bg-white rounded-[2rem] shadow-sm border border-amber-100 p-8">
                    <h2 class="text-xl font-serif font-bold mb-8 flex items-center gap-3 text-stone-800">
                        <span class="w-8 h-8 bg-red-700 text-white rounded-lg flex items-center justify-center text-sm italic">2</span>
                        {{ __('language.payment_method') }}
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="relative cursor-pointer group">
                            <input type="radio" wire:model="payment" value="cash" class="hidden peer">
                            <div class="p-6 border-2 border-stone-100 rounded-2xl peer-checked:border-red-700 peer-checked:bg-red-50 transition-all">
                                <i class="fas fa-money-bill-wave text-2xl text-stone-300 peer-checked:text-red-700 mb-3 block"></i>
                                <p class="text-sm font-bold text-stone-800 uppercase tracking-tighter">{{ __('language.cash_cod') }}</p>
                                <p class="text-[10px] text-stone-400 mt-1 uppercase">{{ __('language.pay_on_arrival') }}</p>
                            </div>
                        </label>
                        <label class="relative cursor-pointer group">
                            <input type="radio" wire:model="payment" value="card" class="hidden peer">
                            <div class="p-6 border-2 border-stone-100 rounded-2xl peer-checked:border-red-700 peer-checked:bg-red-50 transition-all">
                                <i class="fas fa-credit-card text-2xl text-stone-300 peer-checked:text-red-700 mb-3 block"></i>
                                <p class="text-sm font-bold text-stone-800 uppercase tracking-tighter">{{ __('language.card_payment') }}</p>
                                <p class="text-[10px] text-stone-400 mt-1 uppercase">{{ __('language.secure_payment') }}</p>
                            </div>
                        </label>
                        <label class="relative cursor-pointer group">
                            <input type="radio" wire:model="payment" value="xendit" class="hidden peer">
                            <div class="p-6 border-2 border-stone-100 rounded-2xl peer-checked:border-red-700 peer-checked:bg-red-50 transition-all">
                                <i class="fas fa-qrcode text-2xl text-stone-300 peer-checked:text-red-700 mb-3 block"></i>
                                <p class="text-sm font-bold text-stone-800 uppercase tracking-tighter">QRIS / E-Wallet</p>
                                <p class="text-[10px] text-stone-400 mt-1 uppercase">Pembayaran Online</p>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="sticky top-10 space-y-6">
                    <div class="bg-stone-900 rounded-[2.5rem] p-8 text-white relative overflow-hidden shadow-2xl">
                        {{-- Ornamen background --}}
                        <div class="absolute -right-10 -bottom-10 opacity-10 text-[12rem] font-serif italic pointer-events-none text-amber-400">福</div>

                        <h2 class="text-lg font-serif font-bold mb-6 tracking-widest uppercase flex items-center gap-3">
                            {{ __('language.order_summary') }}
                            <span class="h-px flex-1 bg-white/20"></span>
                        </h2>

                        <div class="space-y-4 mb-8 max-h-[30vh] overflow-y-auto custom-scrollbar pr-2">
                            @foreach($cart as $item)
                            <div class="flex justify-between items-start gap-4 animate-fade-in text-sm">
                                <div class="flex-1">
                                    <p class="font-bold text-amber-50 leading-tight">{{ $item['name'] }}</p>
                                    <p class="text-[10px] text-stone-400 uppercase tracking-widest mt-1">{{ __('language.portion') }} × {{ $item['quantity'] }}</p>
                                </div>
                                <span class="font-mono text-xs text-amber-400">Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="space-y-3 border-t border-white/10 pt-6">
                            <div class="flex justify-between text-xs text-stone-400 font-medium tracking-wide">
                                <span>{{ __('language.subtotal') }}</span>
                                <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-xs text-stone-400 font-medium tracking-wide">
                                <span>{{ __('language.restaurant_tax') }}</span>
                                <span>Rp{{ number_format($tax, 0, ',', '.') }}</span>
                            </div>
                            @if($deliveryFee > 0)
                            <div class="flex justify-between text-xs text-amber-500 font-medium tracking-wide">
                                <span>{{ __('language.delivery_fee') }}</span>
                                <span>Rp{{ number_format($deliveryFee, 0, ',', '.') }}</span>
                            </div>
                            @endif

                            <div class="pt-4 mt-4 border-t border-white/10 flex justify-between items-end">
                                <div>
                                    <p class="text-[10px] text-red-500 uppercase font-black tracking-widest mb-1">{{ __('language.total_payment') }}</p>
                                    <p class="text-3xl font-serif font-black text-amber-400 tracking-tighter">
                                        Rp{{ number_format($total, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <button
                            wire:click="placeOrder"
                            wire:loading.attr="disabled"
                            class="w-full mt-10 bg-red-700 hover:bg-red-600 text-white py-5 rounded-2xl font-black uppercase tracking-[0.3em] text-[11px] transition-all active:scale-95 shadow-lg shadow-red-900/20 flex items-center justify-center gap-3 overflow-hidden relative group">

                            <div wire:loading.remove wire:target="placeOrder" class="flex items-center gap-3">
                                <span>{{ __('language.complete_payment') }}</span>
                                <i class="fas fa-dragon group-hover:translate-x-1 transition-transform"></i>
                            </div>

                            <div wire:loading wire:target="placeOrder" class="flex items-center gap-3">
                                <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>{{ __('language.processing_payment') }}</span>
                            </div>
                        </button>
                    </div>

                    <p class="text-[10px] text-stone-400 text-center uppercase tracking-widest">
                        <i class="fas fa-lock mr-1"></i> {{ __('language.secure_encrypted') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.3s ease-out;
        }
    </style>
</div>