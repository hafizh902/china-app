<div class="bg-[#fdfcf8] min-h-screen pb-20">
    {{-- Header Section --}}
    <div class="relative py-12 mb-10 bg-red-800 overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"30\" viewBox=\"0 0 60 30\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M0 15Q15 0 30 15Q45 30 60 15\" stroke=\"%23fff\" fill=\"none\"/></svg>');">
        </div>
        <div class="relative z-10 text-center">
            <h1 class="text-4xl font-serif font-black text-amber-400 tracking-[0.2em] uppercase">HISTORY ORDER</h1>
            <p class="text-red-100 italic mt-2 text-sm uppercase tracking-widest">
                Your Order History</p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 space-y-8">
        @forelse ($orders as $order)
            <div
                class="group bg-white rounded-[2rem] border border-amber-100 shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden">

                {{-- HEADER ORDER (Imperial Style) --}}
                <div class="flex flex-wrap justify-between items-center bg-stone-50 px-8 py-5 border-b border-amber-50">
                    <div class="flex gap-8">
                        <div>
                            <p class="text-[10px] text-stone-400 uppercase font-bold tracking-widest mb-1">Tanggal Pesan
                            </p>
                            <p class="font-serif font-bold text-stone-800 italic">
                                {{ $order->created_at->format('d M, Y') }}
                            </p>
                        </div>
                        <div>
                            <p class="text-[10px] text-stone-400 uppercase font-bold tracking-widest mb-1">Total</p>
                            <p class="font-bold text-red-700">
                                Rp{{ number_format($order->total, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="hidden sm:block">
                            <p class="text-[10px] text-stone-400 uppercase font-bold tracking-widest mb-1">ID Pesanan
                            </p>
                            <p class="font-mono text-xs font-bold text-stone-600">#{{ $order->order_number }}</p>
                        </div>
                    </div>

                    <div class="mt-4 sm:mt-0">
                        {{-- Status Badge as a Chinese Stamp --}}
                        <div
                            class="relative inline-block px-4 py-2 border-2 rotate-[-2deg] font-serif font-bold uppercase tracking-tighter
                            {{ $order->status === 'completed' ? 'border-green-600 text-green-600' : '' }}
                            {{ $order->status === 'pending' || $order->status === 'preparing' ? 'border-amber-500 text-amber-500' : '' }}
                            {{ $order->status === 'cancelled' ? 'border-red-600 text-red-600' : '' }}
                        ">
                            <span class="text-xs">{{ $order->status }}</span>
                            <div class="absolute -top-1 -right-1 w-2 h-2 bg-white border border-inherit"></div>
                        </div>
                    </div>
                </div>

                {{-- ITEM LIST --}}
                <div class="px-8 py-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($order->items as $item)
                            <div
                                class="flex items-center gap-4 p-3 rounded-2xl hover:bg-amber-50/50 transition-colors border border-transparent hover:border-amber-100">
                                {{-- Placeholder for Menu Image --}}
                                <div
                                    class="w-16 h-16 bg-stone-100 rounded-xl flex-shrink-0 border border-stone-200 overflow-hidden">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                        class="w-full h-full object-cover opacity-80" alt="menu">
                                </div>

                                <div class="flex-1">
                                    <p class="font-serif font-bold text-stone-800 leading-tight">{{ $item->menu_name }}
                                    </p>
                                    <p class="text-xs text-stone-400 mt-1 uppercase tracking-widest">Jumlah:
                                        {{ $item->quantity }}</p>
                                </div>

                                <div class="text-right">
                                    <p class="text-sm font-bold text-stone-700">
                                        Rp{{ number_format($item->subtotal, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Footer Order Detail --}}
                    <div class="mt-8 pt-6 border-t border-dashed border-stone-200 flex justify-end">
                        <button wire:click="viewInvoice({{ $order->id }})"
                            class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-red-700 hover:text-red-900 transition-colors">
                            <i class="fas fa-file-invoice"></i> Unduh Nota Digital
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="py-20 text-center">
                <div class="w-24 h-24 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-scroll text-3xl text-stone-300"></i>
                </div>
                <p class="font-serif italic text-stone-400 tracking-widest uppercase">
                    There are no traces of Orders recorded.</p>
                <a wire:navigate href="/menu"
                    class="inline-block mt-6 text-red-700 font-bold border-b-2 border-red-700 pb-1 hover:text-red-900">Mulai
                    Pesan Sekarang</a>
            </div>
        @endforelse
    </div>
    {{-- Modal Container --}}
    <div x-data="{ open: @entangle('showModal') }" x-show="open" style="display: none;"
        class="fixed inset-0 z-[10000] flex items-center justify-center p-4">

        {{-- Backdrop --}}
        <div class="fixed inset-0 bg-stone-900/80 backdrop-blur-sm" @click="$wire.closeModal()"></div>

        {{-- Isi Nota --}}
        <div class="relative w-full max-w-2xl max-h-[90vh] overflow-y-auto bg-white shadow-2xl rounded-sm"
            x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">

            @if ($selectedOrder)
                <div class="max-w-2xl mx-auto my-12 p-8 bg-white shadow-2xl border-t-8 border-red-800 relative overflow-hidden"
                    id="invoice">

                    {{-- Watermark Ornamen --}}
                    <div class="absolute inset-0 opacity-[0.03] pointer-events-none flex items-center justify-center">
                        <span class="text-[20rem] font-serif">福</span>
                    </div>

                    {{-- Header Nota --}}
                    <div class="flex justify-between items-start border-b-2 border-stone-100 pb-8 relative z-10">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <div class="w-8 h-8 bg-red-800 rounded flex items-center justify-center">
                                    <span class="text-amber-400 font-serif font-bold text-xl">龍</span>
                                </div>
                                <h1 class="text-2xl font-serif font-black tracking-tighter text-stone-800 uppercase">
                                 金龍閣</h1>
                            </div>
                            <p class="text-xs text-stone-500 italic">Imperial Dining & Banquet Hall</p>
                            <p class="text-[10px] text-stone-400 mt-1 uppercase tracking-widest">Lt. 88, Golden Dragon
                                Tower, Balikpapan</p>
                        </div>
                        <div class="text-right">
                            <h2 class="text-xl font-serif font-bold text-red-800 uppercase tracking-widest">Nota
                                Pembayaran</h2>
                            <p class="text-xs font-mono text-stone-500 mt-1">#{{ $order->order_number }}</p>
                        </div>
                    </div>

                    {{-- Detail Pelanggan & Waktu --}}
                    <div class="grid grid-cols-2 gap-8 py-8 text-sm relative z-10">
                        <div>
                            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-2">Ditujukan
                                Untuk:</p>
                            <p class="font-bold text-stone-800 text-base">{{ auth()->user()->name }}</p>
                            <p class="text-stone-500 text-xs">{{ auth()->user()->email }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-2">Waktu
                                Transaksi:</p>
                            <p class="font-bold text-stone-800">{{ $order->created_at->format('d F Y') }}</p>
                            <p class="text-stone-500 text-xs italic">{{ $order->created_at->format('H:i T') }}</p>
                        </div>
                    </div>

                    {{-- Tabel Item --}}
                    <div class="relative z-10">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr
                                    class="border-y-2 border-stone-800 text-[10px] font-black uppercase tracking-widest text-stone-400">
                                    <th class="py-4 px-2">Deskripsi Hidangan</th>
                                    <th class="py-4 px-2 text-center">Jumlah</th>
                                    <th class="py-4 px-2 text-right">Harga Satuan</th>
                                    <th class="py-4 px-2 text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-stone-700">
                                @foreach ($order->items as $item)
                                    <tr class="border-b border-stone-100">
                                        <td class="py-4 px-2 font-serif font-bold">{{ $item->menu_name }}</td>
                                        <td class="py-4 px-2 text-center font-mono">{{ $item->quantity }}</td>
                                        <td class="py-4 px-2 text-right text-xs">
                                            Rp{{ number_format($item->menu_price, 0, ',', '.') }}</td>
                                        <td class="py-4 px-2 text-right font-bold text-stone-900">
                                            Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Perhitungan --}}
                    <div class="mt-8 flex justify-end relative z-10">
                        <div class="w-full max-w-[250px] space-y-3">
                            <div class="flex justify-between text-xs text-stone-500">
                                <span>Subtotal</span>
                                <span>Rp{{ number_format($order->subtotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-xs text-stone-500">
                                <span>Pajak Restoran (10%)</span>
                                <span>Rp{{ number_format($order->tax, 0, ',', '.') }}</span>
                            </div>
                            <div class="pt-4 border-t-2 border-stone-800 flex justify-between items-end">
                                <span class="text-[10px] font-black uppercase text-red-800">Total </span>
                                <span
                                    class="text-2xl font-black text-stone-900 tracking-tighter">Rp{{ number_format($order->total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Footer & Stempel --}}
                    <div class="mt-16 flex justify-between items-end relative z-10">
                        <div class="text-[10px] text-stone-400 italic max-w-[300px]">
                            <p>* Nota ini adalah bukti pembayaran yang sah.</p>
                            <p>* Terima kasih telah mengadakan perjamuan di kediaman kami. Semoga keberuntungan
                                menyertai Anda.</p>
                        </div>

                    </div>

                    {{-- Dekorasi Bawah --}}
                    <div class="mt-12 h-2 w-full bg-stone-100 flex gap-1 overflow-hidden">
                        @for ($i = 0; $i < 20; $i++)
                            <div class="h-full w-4 bg-red-800 rotate-45 transform -translate-y-1"></div>
                        @endfor
                    </div>
                </div>

                {{-- Tombol Cetak (Hanya muncul di layar, tidak saat di-print) --}}
                <div class="max-w-2xl mx-auto flex justify-center mt-6 print:hidden">
                    <button onclick="window.print()"
                        class="bg-stone-900 text-white px-8 py-3 rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-red-800 transition-all flex items-center gap-3">
                        <i class="fas fa-print"></i> Cetak Nota
                    </button>
                </div>

                <style>
                    @media print {
                        body {
                            background: white;
                        }

                        .print\:hidden {
                            display: none;
                        }

                        #invoice {
                            box-shadow: none;
                            border: 1px solid #eee;
                            margin: 0;
                            width: 100%;
                        }
                    }
                </style>

                {{-- Tombol Tutup Khusus Modal --}}
                <button @click="$wire.closeModal()"
                    class="absolute top-4 right-4 text-stone-400 hover:text-red-700 print:hidden">
                    <i class="fas fa-times text-xl"></i>
                </button>
            @endif
        </div>
    </div>
</div>
