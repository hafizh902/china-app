<section class="w-full bg-[#fdfcf8] min-h-screen pb-10">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Profile Settings') }}</flux:heading>

    <div class="max-w-3xl mx-auto my-6 px-4">

        {{-- KARTU UTAMA --}}
        <div class="bg-white rounded-[1.5rem] shadow-lg border border-amber-100 overflow-hidden mb-6">

            <div class="relative bg-gradient-to-r from-red-800 to-red-700 p-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="p-2.5 bg-white/10 backdrop-blur-md rounded-lg border border-white/20">
                            <i class="fas fa-user-edit text-xl text-amber-400"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-serif font-bold text-white tracking-tight">
                                {{ __('Profile Information') }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <form wire:submit="updateProfileInformation" class="space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Input Nama dengan Highlight --}}
                        <div class="space-y-1">
                            <flux:input wire:model="name" :label="__('Name')" type="text" required
                                class="w-full !bg-amber-50/30 border-amber-200/60 focus:!bg-white focus:border-red-600 focus:ring-1 focus:ring-red-600 rounded-xl transition-all duration-300 shadow-inner"
                                placeholder="Masukkan nama lengkap" />
                        </div>

                        {{-- Input Email dengan Highlight --}}
                        <div class="space-y-1">
                            <flux:input wire:model="email" :label="__('Email')" type="email" required
                                class="w-full !bg-amber-50/30 border-amber-200/60 focus:!bg-white focus:border-red-600 focus:ring-1 focus:ring-red-600 rounded-xl transition-all duration-300 shadow-inner"
                                placeholder="alamat@email.com" />
                        </div>

                    </div>

                    {{-- Info Box (Tampil jika email belum verifikasi) --}}
                    @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                        <div class="p-3 bg-red-50/50 rounded-xl border border-red-100 flex items-center gap-3">
                            <i class="fas fa-envelope-open-text text-red-600 text-xs"></i>
                            <button wire:click.prevent="resendVerificationNotification"
                                class="text-[11px] text-red-700 font-bold hover:underline italic">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    @endif

                    <div class="flex items-center justify-between pt-5 border-t border-amber-50">
                        <x-action-message class="text-xs font-bold text-green-600 flex items-center gap-1"
                            on="profile-updated">
                            <i class="fas fa-check-circle"></i> {{ __('Saved.') }}
                        </x-action-message>

                        <button type="submit"
                            class="group relative overflow-hidden bg-red-700 hover:bg-red-800 text-white font-bold py-2.5 px-8 rounded-xl transition-all shadow-md active:scale-95 text-xs tracking-[0.2em] uppercase">
                            <span class="relative z-10 flex items-center gap-2">
                                {{ __('Update Profile') }}
                            </span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shimmer_2s_infinite]">
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        {{-- KARTU: Ubah Password --}}
        <div class="bg-white rounded-[1.5rem] shadow-lg border border-amber-100 overflow-hidden mb-6">
            <div class="p-5 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="p-2.5 bg-red-50 rounded-lg border border-red-100">
                        <i class="fas fa-shield-alt text-xl text-red-700"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-serif font-bold text-slate-800 tracking-tight">
                            {{ __('Security & Password') }}</h2>
                        <p class="text-[11px] text-gray-400 italic">Pastikan akun Anda tetap aman.</p>
                    </div>
                </div>

                <button wire:click="openPasswordModal"
                    class="bg-amber-400 hover:bg-amber-500 text-red-900 font-bold py-2 px-5 rounded-xl text-xs uppercase tracking-widest transition-all shadow-sm active:scale-95">
                    {{ __('Change Password') }}
                </button>
            </div>
        </div>

        {{-- DANGER ZONE --}}
        <div
            class="bg-gray-50/50 rounded-[1.2rem] border border-red-100 p-4 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-red-100/50 rounded-full flex items-center justify-center text-red-700">
                    <i class="fas fa-trash-alt text-[10px]"></i>
                </div>
                <div class="text-[11px]">
                    <p class="font-bold text-red-800 uppercase tracking-tighter leading-none mb-1">Hapus Akun</p>
                    <p class="text-gray-400 italic">Data akan dihapus permanen.</p>
                </div>
            </div>
            <livewire:settings.delete-user-form />
        </div>


    </div>

    <style>
        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }
    </style>
</section>
