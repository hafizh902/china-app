<section class="w-full bg-[#fdfcf8] min-h-screen pb-20">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Profile Settings') }}</flux:heading>

    <div class="max-w-3xl mx-auto mt-10 px-4 space-y-8">

        {{-- KARTU UTAMA: PROFILE INFORMATION --}}
        <div
            class="group bg-white rounded-[2.5rem] shadow-sm hover:shadow-xl hover:shadow-red-900/5 border border-stone-100 transition-all duration-500 overflow-hidden">

            {{-- Header dengan Aksen Gradien --}}
            <div class="relative bg-gradient-to-r from-stone-900 to-stone-800 p-8">
                {{-- Ornamen Latar Belakang --}}
                <div class="absolute inset-0 opacity-10 pointer-events-none overflow-hidden">
                    <div class="absolute -right-4 -top-4 text-white text-6xl rotate-12 uppercase font-black italic">
                        Profile</div>
                </div>

                <div class="relative z-10 flex items-center gap-5">
                    <div
                        class="w-14 h-14 bg-amber-400 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-400/20 transform -rotate-3 group-hover:rotate-0 transition-transform duration-500">
                        <i class="fas fa-user-edit text-2xl text-red-800"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-serif font-bold text-white tracking-tight uppercase italic">
                            {{ __('Profile Information') }}
                        </h2>
                        <p class="text-[10px] text-amber-200 uppercase tracking-[0.3em] font-black opacity-80">Personal
                            Details</p>
                    </div>
                </div>
            </div>

            <div class="p-8 md:p-10">
                <form wire:submit="updateProfileInformation" class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- Input Nama --}}
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1">Full
                                Name</label>
                            <flux:input wire:model="name" type="text" required {{-- Gunakan style untuk memaksa warna placeholder --}}
                                style="--flux-input-placeholder: #78716c; opacity: 1 !important;"
                                class="w-full !bg-stone-100 !border-stone-200 shadow-inner focus:!bg-white focus:!border-red-600 focus:!ring-red-600 rounded-2xl transition-all duration-300 font-bold text-stone-800 py-3.5"
                                placeholder="Masukkan nama lengkap" />
                        </div>
                        {{-- Input Email --}}
                        {{-- <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-stone-400 ml-1">Email
                                Address</label>
                            <flux:input wire:model="email" type="email" required
                                style="--flux-input-placeholder: #78716c; opacity: 1 !important;"
                                class="w-full !bg-stone-100 !border-stone-200 shadow-inner focus:!bg-white focus:!border-red-600 focus:!ring-red-600 rounded-2xl transition-all duration-300 font-bold text-stone-800 py-3.5"
                                placeholder="alamat@email.com" />
                        </div> --}}

                        {{-- Info Box --}}
                        {{-- @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                            <div class="p-4 bg-amber-50/50 rounded-2xl border border-amber-100 flex items-center gap-4">
                                <div
                                    class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-red-600 border border-amber-100">
                                    <i class="fas fa-envelope-open-text text-sm"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span
                                        class="text-[9px] font-black text-amber-800 uppercase tracking-tighter">Verification
                                        Required</span>
                                    <button wire:click.prevent="resendVerificationNotification"
                                        class="text-xs text-red-700 font-black hover:text-red-800 underline decoration-red-200 underline-offset-4 tracking-tight uppercase transition-colors">
                                        {{ __('Resend Verification Email') }}
                                    </button>
                                </div>
                            </div>
                        @endif --}}

                        {{-- Footer Action --}}
                        <div class="flex items-center justify-between pt-8 border-t border-stone-100">
                            <x-action-message
                                class="text-[10px] font-black text-green-600 flex items-center gap-2 uppercase tracking-[0.2em]"
                                on="profile-updated">
                                <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-[8px]"></i>
                                </div>
                                {{ __('Saved') }}
                            </x-action-message>

                            <button type="submit"
                                class="group relative overflow-hidden bg-red-700 hover:bg-stone-900 text-white font-black py-4 px-10 rounded-2xl transition-all duration-500 shadow-xl shadow-red-700/20 active:scale-95 text-[10px] tracking-[0.2em] uppercase">
                                <span class="relative z-10 flex items-center gap-3">
                                    <i class="fas fa-save opacity-50"></i> {{ __('Update Profile') }}
                                </span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shimmer_2s_infinite]">
                                </div>
                            </button>
                        </div>
                </form>
            </div>
        </div>

        {{-- SEKSI KEAMANAN --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- KARTU: Ubah Password --}}
            <div
                class="bg-white rounded-[2rem] shadow-sm border border-stone-100 p-8 flex flex-col justify-between hover:shadow-lg transition-all duration-500 group">
                <div class="flex items-start gap-4 mb-8">
                    <div
                        class="p-4 bg-red-50 rounded-2xl border border-red-100 group-hover:bg-red-700 group-hover:text-white transition-colors duration-500 text-red-700">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-serif font-bold text-stone-800 tracking-tight leading-none mb-2">
                            {{ __('Security') }}
                        </h2>
                        <p class="text-[10px] text-stone-400 font-medium italic">
                            Update your account password regularly.</p>
                    </div>
                </div>

                <button wire:click="openPasswordModal"
                    class="w-full bg-stone-100 hover:bg-amber-400 text-stone-600 hover:text-red-900 font-black py-4 rounded-2xl text-[10px] uppercase tracking-widest transition-all active:scale-95 shadow-sm">
                    {{ __('Change Password') }}
                </button>
            </div>

            {{-- DANGER ZONE --}}
            <div class="bg-stone-50 rounded-[2rem] border border-stone-200 p-8 flex flex-col justify-between group">
                <div class="flex items-start gap-4 mb-8 text-stone-400">
                    <div
                        class="p-4 bg-stone-200/50 rounded-2xl border border-stone-200 group-hover:bg-red-100 group-hover:text-red-600 transition-colors duration-500">
                        <i class="fas fa-trash-alt text-2xl"></i>
                    </div>
                    <div>
                        <h2
                            class="text-lg font-serif font-bold text-stone-600 group-hover:text-red-800 transition-colors duration-500 tracking-tight leading-none mb-2">
                            {{ __('Danger Zone') }}
                        </h2>
                        <p class="text-[10px] italic font-medium">
                            Account data will be lost forever.</p>
                    </div>
                </div>

                <div class="w-full">
                    <livewire:settings.delete-user-form />
                </div>
            </div>
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
