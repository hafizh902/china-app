<div class="p-8 bg-stone-100 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <header class="mb-10 flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-serif font-bold text-stone-800 uppercase tracking-tighter">Table monitoring</h1>
                <p class="text-stone-500 text-sm italic">Restaurant Status Today: {{ date('d M Y') }}</p>
            </div>
            <div class="flex gap-4">
                <div class="bg-white px-4 py-2 rounded-lg shadow-sm border border-stone-200">
                    <span class="text-[10px] block uppercase font-bold text-stone-400">Total Reservations</span>
                    <span class="text-xl font-bold text-red-700">{{ $totalReservations }}</span>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            {{-- JADWAL RESERVASI --}}
            <div class="lg:col-span-8 bg-white p-10 rounded-[2.5rem] shadow-sm border border-stone-200 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-10 opacity-5 text-9xl font-serif">監</div>

                <h2 class="text-xl font-bold mb-6 text-stone-800">Today's Reservation Schedule</h2>

                @if($reservationsByTime->isEmpty())
                    <div class="text-center py-20 text-stone-400">
                        <i class="fas fa-calendar-times text-6xl mb-4"></i>
                        <p>No reservations today</p>
                    </div>
                @else
                    <div class="space-y-6">
                        @foreach($reservationsByTime as $time => $reservations)
                            <div class="border-l-4 border-red-700 pl-6">
                                <h3 class="text-lg font-bold text-stone-800 mb-4">{{ $time }}</h3>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                    @foreach($reservations as $reservation)
                                        <button wire:click="$set('selectedReservation', {{ $reservation->id }})"
                                            class="bg-stone-50 border border-stone-200 rounded-lg p-4 hover:bg-stone-100 transition-colors text-left">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="font-bold text-stone-800">#{{ $reservation->table->number }}</span>
                                                <span class="px-2 py-0.5 rounded text-[10px] font-bold {{ $reservation->status == 'pending' ? 'bg-amber-500 text-white' : 'bg-green-600 text-white' }}">
                                                    {{ strtoupper($reservation->status) }}
                                                </span>
                                            </div>
                                            <p class="text-sm text-stone-600">{{ $reservation->user->name }}</p>
                                            <p class="text-xs text-stone-400">{{ $reservation->table->position }}</p>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- PANEL DETAIL --}}
            <div class="lg:col-span-4">
                @if($selectedReservation)
                    @php $detail = \App\Models\Reservation::find($selectedReservation); @endphp
                    <div class="bg-stone-900 rounded-[2rem] p-8 text-white shadow-2xl sticky top-8 border-t-4 border-red-700">
                        <h3 class="font-serif text-xl font-bold text-amber-400 mb-6 uppercase tracking-widest">Reservation Detail</h3>
                        
                        <div class="space-y-4 text-sm mb-10">
                            <div class="flex justify-between border-b border-stone-800 pb-2">
                                <span class="text-stone-500 uppercase text-[10px]">Orderer</span>
                                <span class="font-bold">{{ $detail->user->name }}</span>
                            </div>
                            <div class="flex justify-between border-b border-stone-800 pb-2">
                                <span class="text-stone-500 uppercase text-[10px]">Table</span>
                                <span class="font-bold text-amber-400">#{{ $detail->table->number }} ({{ $detail->table->position }})</span>
                            </div>
                            <div class="flex justify-between border-b border-stone-800 pb-2">
                                <span class="text-stone-500 uppercase text-[10px]">Time</span>
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
                                    Payment Confirmation
                                </button>
                            @endif
                            <button wire:click="releaseTable({{ $detail->id }})" 
                                class="w-full bg-red-700/20 hover:bg-red-700 text-red-500 hover:text-white border border-red-700/50 font-bold py-3 rounded-xl transition-all uppercase text-xs tracking-widest">Cancel & Free Table
                            </button>
                        </div>
                    </div>
                @else
                    <div class="h-full border-2 border-dashed border-stone-300 rounded-[2rem] flex flex-col items-center justify-center p-10 text-center opacity-40">
                        <i class="fas fa-mouse-pointer text-4xl mb-4"></i>
                        <p class="text-sm font-medium">Select a table to view customer reservation details</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>