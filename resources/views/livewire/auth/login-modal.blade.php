<div id="login-modal" class="fixed inset-0 z-[9999] overflow-y-auto flex items-center justify-center p-4"
    style="display: {{ $showModal ? 'flex' : 'none' }}; background-color: rgba(0, 0, 0, 0.6); backdrop-blur: 4px;"
    @click.self="$wire.closeModal()" @keydown.escape="$wire.closeModal()">

    <div class="relative w-full max-w-4xl bg-white rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col md:flex-row animate-zoom-in">
        
        <div class="relative w-full md:w-5/12 bg-gradient-to-br from-red-600 via-red-700 to-red-800 p-10 flex flex-col items-center justify-center text-center">
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <div class="absolute top-10 left-10 text-yellow-400 text-4xl">🍜</div>
                <div class="absolute bottom-10 right-10 text-yellow-400 text-4xl">🥟</div>
            </div>

            <div class="relative z-10">
                <div class="w-24 h-24 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl border-4 border-white/20">
                    <i class="fas fa-user-circle text-red-700 text-4xl"></i>
                </div>
                <h2 class="text-4xl font-bold text-white mb-3" style="font-family: 'Noto Sans SC', sans-serif;">
                    欢迎回来
                </h2>
                <p class="text-yellow-100 text-sm leading-relaxed uppercase tracking-widest font-medium">
                    Autentik Chinese Food<br>Cita Rasa Dinasti
                </p>
            </div>
        </div>

        <div class="w-full md:w-7/12 p-8 md:p-12 bg-white relative">
            <button wire:click="closeModal"
                class="absolute top-6 right-6 text-gray-400 hover:text-red-600 transition-colors z-20">
                <i class="fas fa-times text-2xl"></i>
            </button>

            <div class="mb-8">
                <h3 class="text-2xl font-black text-gray-800">Masuk Akun</h3>
                <p class="text-gray-500 text-sm">Silakan masukkan detail akun Anda</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-r-4 border-red-500 p-3 rounded-xl flex items-start gap-3">
                    <i class="fas fa-exclamation-circle text-red-500 mt-1"></i>
                    <ul class="text-[11px] text-red-700 font-bold leading-tight uppercase">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form wire:submit.prevent="login" novalidate class="space-y-4">
                <div class="grid grid-cols-1 gap-1">
                    <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 ml-1">Email Address</label>
                    <div class="relative">
                        <input wire:model.defer="email" type="email"
                            class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-red-500 focus:ring-0 transition-all font-bold text-gray-800"
                            placeholder="nama@email.com">
                        <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-300"></i>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-1">
                    <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 ml-1">Password</label>
                    <div class="relative">
                        <input wire:model.defer="password" type="password"
                            class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-red-500 focus:ring-0 transition-all font-bold text-gray-800"
                            placeholder="••••••••">
                        <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-300"></i>
                    </div>
                </div>

                <div class="flex items-center justify-between pb-4">
                    <label class="flex items-center cursor-pointer group">
                        <input wire:model="remember" type="checkbox" class="h-4 w-4 text-red-600 rounded border-gray-300 focus:ring-0">
                        <span class="ml-2 text-xs font-bold text-gray-500 group-hover:text-gray-700">Ingat Saya</span>
                    </label>
                    <a href="javascript:void(0);" 
                       wire:click="$dispatch('close-login-modal'); $dispatch('open-reset-password-modal');"
                       class="text-xs font-bold text-red-600 hover:underline">Lupa Password?</a>
                </div>

                <button type="submit" wire:loading.attr="disabled"
                    class="w-full bg-red-700 hover:bg-red-800 text-white font-black py-4 rounded-2xl transition-all shadow-lg shadow-red-700/20 active:scale-95 flex items-center justify-center gap-3">
                    <span wire:loading.remove wire:target="login" class="uppercase tracking-widest text-sm">Masuk Sekarang</span>
                    <span wire:loading wire:target="login" class="flex items-center gap-2">
                        <i class="fas fa-circle-notch fa-spin"></i> Loading...
                    </span>
                </button>
            </form>
        </div>
    </div>
    <style>
        .animate-zoom-in { animation: zoom 0.3s cubic-bezier(0.34, 1.56, 0.64, 1); }
        @keyframes zoom { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }
    </style>
</div>
