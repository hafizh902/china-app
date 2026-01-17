<div class="p-8 bg-stone-100 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <header class="mb-10 flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-serif font-bold text-stone-800 uppercase tracking-tighter">Monitoring Meja</h1>
                <p class="text-stone-500 text-sm italic">Status Restoran Hari Ini: {{ date('d M Y') }}</p>
            </div>
            <div class="flex gap-4">
                <div class="bg-white px-4 py-2 rounded-lg shadow-sm border border-stone-200">
                    <span class="text-[10px] block uppercase font-bold text-stone-400">Total Reservasi</span>
                    <span class="text-xl font-bold text-red-700">{{ $currentReservations->count() }}</span>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            {{-- GRID DENAH MEJA --}}
            <div class="lg:col-span-8 bg-white p-10 rounded-[2.5rem] shadow-sm border border-stone-200 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-10 opacity-5 text-9xl font-serif">監</div>
                
                <div class="grid grid-cols-4 sm:grid-cols-6 gap-10 relative z-10">
                    @foreach($tables as $table)
                        @php 
                            $res = $currentReservations[$table->id] ?? null; 
                        @endphp
                        
                        <button wire:click="$set('selectedReservation', {{ $res ? $res->id : 'null' }})"
                            class="flex flex-col items-center gap-3 transition-transform hover:scale-105">
                            <div class="w-20 h-20 rounded-full flex items-center justify-center border-4 relative
                                {{ !$res ? 'border-stone-100 bg-stone-50' : ($res->status == 'pending' ? 'border-amber-400 bg-amber-50 animate-pulse' : 'border-red-700 bg-red-50') }}">
                                
                                <span class="font-black text-lg {{ !$res ? 'text-stone-300' : 'text-stone-800' }}">
                                    {{ $table->number }}
                                </span>

                                @if($res)
                                    <div class="absolute -top-2 -right-2 w-6 h-6 rounded-full flex items-center justify-center shadow-lg
                                        {{ $res->status == 'pending' ? 'bg-amber-500 text-white' : 'bg-green-500 text-white' }}">
                                        <i class="fas {{ $res->status == 'pending' ? 'fa-clock' : 'fa-check' }} text-[10px]"></i>
                                    </div>
                                @endif
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-stone-400">
                                {{ $res ? $res->user->name : 'Kosong' }}
                            </span>
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- PANEL DETAIL --}}
            <div class="lg:col-span-4">
                @if($selectedReservation)
                    @php $detail = \App\Models\Reservation::find($selectedReservation); @endphp
                    <div class="bg-stone-900 rounded-[2rem] p-8 text-white shadow-2xl sticky top-8 border-t-4 border-red-700">
                        <h3 class="font-serif text-xl font-bold text-amber-400 mb-6 uppercase tracking-widest">Detail Reservasi</h3>
                        
                        <div class="space-y-4 text-sm mb-10">
                            <div class="flex justify-between border-b border-stone-800 pb-2">
                                <span class="text-stone-500 uppercase text-[10px]">Pemesan</span>
                                <span class="font-bold">{{ $detail->user->name }}</span>
                            </div>
                            <div class="flex justify-between border-b border-stone-800 pb-2">
                                <span class="text-stone-500 uppercase text-[10px]">Meja</span>
                                <span class="font-bold text-amber-400">#{{ $detail->table->number }} ({{ $detail->table->position }})</span>
                            </div>
                            <div class="flex justify-between border-b border-stone-800 pb-2">
                                <span class="text-stone-500 uppercase text-[10px]">Waktu</span>
                                <span class="font-bold">{{ $detail->reservation_time }}</span>
                            </div>
                            <div class="flex justify-between border-b border-stone-800 pb-2">
                                <span class="text-stone-500 uppercase text-[10px]">Status</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold {{ $detail->status == 'pending' ? 'bg-amber-500' : 'bg-green-600' }}">
                                    {{ strtoupper($detail->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            @if($detail->status == 'pending')
                                <button wire:click="confirmPayment({{ $detail->id }})" 
                                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl transition-all uppercase text-xs tracking-widest">
                                    Konfirmasi Pembayaran
                                </button>
                            @endif
                            <button wire:click="releaseTable({{ $detail->id }})" 
                                class="w-full bg-red-700/20 hover:bg-red-700 text-red-500 hover:text-white border border-red-700/50 font-bold py-3 rounded-xl transition-all uppercase text-xs tracking-widest">
                                Batalkan & Bebaskan Meja
                            </button>
                        </div>
                    </div>
                @else
                    <div class="h-full border-2 border-dashed border-stone-300 rounded-[2rem] flex flex-col items-center justify-center p-10 text-center opacity-40">
                        <i class="fas fa-mouse-pointer text-4xl mb-4"></i>
                        <p class="text-sm font-medium">Pilih meja yang terisi untuk melihat detail pesanan pelanggan</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>