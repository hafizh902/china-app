@php
    $hasSpendingThisMonth = collect($totals)->sum() > 0;
    $currentMonthLabel = now()->format('M Y');
@endphp

<div class="space-y-6 font-sans">
    {{-- FILTER & HEADER --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
        <div class="space-y-1">
            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-red-50 text-red-600 uppercase tracking-wider">
                Laporan Bulanan
            </span>
            <h2 class="text-xl font-extrabold text-gray-900 tracking-tight">{{ $monthLabel }}</h2>
            @if ($autoSelectedMonth)
                <p class="text-[11px] text-amber-500 font-medium italic">
                    <i class="fas fa-info-circle mr-1"></i> Data {{ $currentMonthLabel }} kosong. Menampilkan data terakhir.
                </p>
            @endif
        </div>

        <form method="GET" action="{{ url()->current() }}" class="flex items-center gap-2 bg-gray-50 p-1.5 rounded-xl border border-gray-100">
            <input
                type="month"
                name="month"
                value="{{ $month }}"
                class="h-9 border-none bg-transparent text-sm font-bold text-gray-700 focus:ring-0 cursor-pointer"
            />
            <button
                type="submit"
                class="h-9 px-4 rounded-lg bg-gray-900 text-xs font-bold text-white uppercase tracking-widest transition-all hover:bg-black active:scale-95 shadow-sm"
            >
                Filter
            </button>
        </form>
    </div>

    {{-- SUMMARY CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="group relative overflow-hidden bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="relative z-10">
                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-gray-400 mb-2">Total Pengeluaran</p>
                <p class="text-3xl font-black text-gray-900">
                    <span class="text-sm font-bold text-red-500 mr-1">Rp</span>{{ number_format($totalSpent, 0, ',', '.') }}
                </p>
            </div>
            <div class="absolute -right-2 -bottom-2 text-gray-100 group-hover:text-red-50 group-hover:scale-110 transition-all duration-500">
                <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
            </div>
        </div>

        <div class="group relative overflow-hidden bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="relative z-10">
                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-gray-400 mb-2">Volume Transaksi</p>
                <p class="text-3xl font-black text-gray-900">
                    {{ number_format($orderCount, 0, ',', '.') }} <span class="text-sm font-bold text-gray-400 italic">Orders</span>
                </p>
            </div>
            <div class="absolute -right-2 -bottom-2 text-gray-100 group-hover:text-gray-200 group-hover:scale-110 transition-all duration-500">
                <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
            </div>
        </div>
    </div>

    {{-- CHART CONTAINER --}}
    <div
        x-data="spendingChart"
        x-init="initChart(@js($dates), @js($totals))"
        class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100"
    >
        <div class="flex items-center justify-between mb-8">
            <div>
                <h3 class="font-black text-gray-900 tracking-tight">Grafik Pengeluaran Harian</h3>
                <p class="text-[11px] text-gray-400 font-medium">Data pengeluaran harian dalam IDR</p>
            </div>
            <div class="flex items-center gap-2 px-3 py-1 bg-gray-50 rounded-lg border border-gray-100">
                <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                <span class="text-[10px] font-bold text-gray-600 uppercase">Live Data</span>
            </div>
        </div>
        
        @if (!$hasSpendingThisMonth)
            <div class="mb-6 flex items-center gap-4 rounded-xl bg-orange-50 border border-orange-100 p-4">
                <div class="bg-orange-100 p-2 rounded-lg text-orange-600 italic font-bold">!</div>
                <div class="text-xs">
                    <p class="font-bold text-orange-800 uppercase tracking-wide">Belum ada aktivitas</p>
                    <p class="text-orange-700/80">Silahkan lakukan pemesanan untuk melihat grafik.</p>
                </div>
            </div>
        @endif
        
        <div x-ref="chartContainer" class="min-h-[340px]"></div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('spendingChart', () => ({
        chart: null,
        
        initChart(dates, totals) {
            // Helper Internal untuk format IDR
            const formatRupiah = (val) => {
                if (!val) return 'Rp 0';
                return 'Rp ' + Math.round(val).toLocaleString('id-ID');
            };

            const maxValue = Math.max(...totals);

            const options = {
                chart: {
                    type: 'area',
                    height: 360,
                    fontFamily: 'Inter, sans-serif',
                    toolbar: { show: false },
                    zoom: { enabled: false }
                },
                series: [{
                    name: 'Total Pengeluaran',
                    data: totals
                }],
                colors: ['#dc2626'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.02,
                        stops: [0, 90, 100]
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                xaxis: {
                    categories: dates,
                    axisBorder: { show: false },
                    axisTicks: { show: false },
                    labels: {
                        style: { colors: '#94a3b8', fontSize: '11px', fontWeight: 600 },
                        formatter: (val) => val ? val.split('-')[2] : ''
                    }
                },
                yaxis: {
                    min: 0,
                    max: maxValue > 0 ? maxValue * 1.25 : 100000, // Memberi ruang di atas agar label tidak terpotong
                    labels: {
                        style: { colors: '#94a3b8', fontSize: '10px', fontWeight: 600 },
                        formatter: (v) => {
                            if (v >= 1000000) return 'Rp' + (v/1000000).toFixed(1) + 'jt';
                            if (v >= 1000) return 'Rp' + Math.round(v/1000) + 'rb';
                            return 'Rp' + v;
                        }
                    }
                },
                grid: {
                    borderColor: '#f1f5f9',
                    strokeDashArray: 4,
                    padding: { top: 0, right: 20, bottom: 0, left: 10 }
                },
                dataLabels: {
                    enabled: true,
                    formatter: (val) => val > 0 ? formatRupiah(val) : '',
                    offsetY: -5, // Mengurangi jarak agar label mendekat ke titik data
                    style: {
                        fontSize: '10px',
                        fontWeight: 800,
                        colors: ['#dc2626']
                    },
                    background: {
                        enabled: true,
                        foreColor: '#fff',
                        padding: 3,
                        borderRadius: 4,
                        borderWidth: 1,
                        borderColor: '#dc2626',
                        opacity: 1,
                        dropShadow: { enabled: false }
                    }
                },
                tooltip: {
                    x: { show: false },
                    y: {
                        formatter: (v) => formatRupiah(v),
                        title: { formatter: () => 'Total:' }
                    }
                }
            };

            this.chart = new ApexCharts(this.$refs.chartContainer, options);
            this.chart.render();
        }
    }));
});
</script>