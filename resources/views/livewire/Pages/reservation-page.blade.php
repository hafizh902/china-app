<div class="w-full bg-[#fdfcf8] min-h-screen pb-20">
    @if($step == 1)
        {{-- BAGIAN PILIH MEJA (Denah Bioskop) --}}
        <div class="max-w-6xl mx-auto px-4 pt-10">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white rounded-[2.5rem] shadow-xl border border-amber-100 p-8">
                    <h2 class="font-serif font-bold text-2xl text-slate-800 mb-10">Denah Restoran</h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($tables as $table)
                            <div class="bg-amber-50 rounded-2xl p-4 border border-amber-100">
                                <div class="text-center mb-3">
                                    <div class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center mx-auto mb-2">
                                        <span class="text-sm font-bold text-amber-800">{{ $table->number }}</span>
                                    </div>
                                    <span class="text-xs uppercase font-bold text-stone-500">{{ $table->capacity }} Pax</span>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    @php $availableTimes = $this->availableTimes->get($table->id, []); @endphp
                                    @foreach(['12:00', '18:00', '19:00', '20:00'] as $time)
                                        @php $isAvailable = in_array($time, $availableTimes); @endphp
                                        @php $isSelected = $selectedTable == $table->id && $selectedTime == $time; @endphp
                                        <button wire:click="selectTableAndTime({{ $table->id }}, '{{ $time }}')"
                                            @disabled(!$isAvailable)
                                            class="py-1 px-2 text-xs font-bold rounded border transition-all
                                                {{ $isSelected ? 'bg-red-700 text-white border-red-700' :
                                                   ($isAvailable ? 'bg-white text-amber-800 border-amber-200 hover:bg-amber-100' :
                                                   'bg-gray-100 text-gray-400 border-gray-200 cursor-not-allowed') }}">
                                            {{ $time }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Sidebar Input --}}
                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-[2rem] shadow-lg border border-amber-100">
                        <input type="date" wire:model.live="booking_date" class="w-full mb-4 border-amber-100 rounded-xl">
                        @if($selectedTable && $selectedTime)
                            <div class="mb-4 p-3 bg-amber-50 rounded-lg">
                                <p class="text-sm font-bold text-amber-800">Meja {{ $tables->where('id', $selectedTable)->first()->number ?? '' }} - {{ $selectedTime }}</p>
                            </div>
                        @endif
                        <button wire:click="confirmReservation" class="w-full mt-6 bg-red-700 text-white py-4 rounded-xl font-bold uppercase tracking-widest text-xs" {{ !$selectedTable || !$selectedTime ? 'disabled' : '' }}>
                            Booking Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>

    @else
        {{-- BAGIAN PEMBAYARAN DP --}}
        <div class="max-w-md mx-auto pt-20 px-4" x-data="{ timer: 900 }" x-init="setInterval(() => { if(timer > 0) timer-- }, 1000)">
            <div class="bg-white rounded-[2.5rem] shadow-2xl border border-amber-100 overflow-hidden">
                <div class="bg-red-800 p-8 text-center">
                    <h2 class="text-white font-serif font-bold text-xl tracking-widest uppercase">Konfirmasi DP</h2>
                </div>
                <div class="p-8">
                    <div class="text-center mb-6">
                        <p class="text-xs text-stone-400 uppercase">Selesaikan Pembayaran Dalam</p>
                        <p class="text-3xl font-mono font-bold text-red-700" x-text="Math.floor(timer/60) + ':' + (timer%60).toString().padStart(2, '0')"></p>
                    </div>
                    
                    <div class="bg-amber-50 p-4 rounded-2xl mb-6">
                        <p class="text-xs text-amber-800 font-bold mb-2">Transfer ke Rekening BCA:</p>
                        <p class="text-xl font-mono font-bold text-stone-800">121 333 4444</p>
                        <p class="text-[10px] text-amber-600 italic">a/n The Dragon Kitchen</p>
                    </div>

                    <div class="flex justify-between font-bold text-lg mb-8">
                        <span>Total Deposit:</span>
                        <span class="text-red-700">Rp200.000</span>
                    </div>

                    <button class="w-full bg-stone-900 text-white py-4 rounded-xl font-bold uppercase text-xs tracking-widest">
                        Kirim Bukti Bayar
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>