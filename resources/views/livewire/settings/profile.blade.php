{{-- resources/views/livewire/settings/profile.blade.php --}}

<section class="w-full bg-white **:min-h-screen">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Profile Settings') }}</flux:heading>

    {{-- Kontainer Utama dengan Lebar Maksimum dan Tengah --}}
    <div class="max-w-5xl mx-auto my-8 px-4 sm:px-6 lg:px-8">
        
        {{-- KARTU UTAMA: Informasi Profil --}}
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-8">
            
            {{-- Header Kartu dengan Latar Merah --}}
            <div class="bg-gradient-to-r from-red-700 to-red-600 p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl mr-4">
                        <svg class="w-7 h-7 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">Informasi Profil</h2>
                        <p class="text-red-100">Kelola identitas Anda di platform kami.</p>
                    </div>
                </div>
            </div>

            {{-- Isi Kartu Profil --}}
            <div class="p-8">
                <form wire:submit="updateProfileInformation" class="space-y-6">
                    {{-- Input Nama --}}
                    <div>
                        <flux:input 
                            wire:model="name" 
                            :label="__('Name')" 
                            type="text" 
                            required 
                            autofocus 
                            autocomplete="name" 
                            class="w-full text-lg"
                            style="--tw-ring-color: rgb(185 28 28);" // Custom ring color for focus
                        />
                    </div>

                    {{-- Input Email & Notifikasi --}}
                    <div>
                        <flux:input 
                            wire:model="email" 
                            :label="__('Email')" 
                            type="email" 
                            required 
                            autocomplete="email" 
                            class="w-full text-lg"
                            style="--tw-ring-color: rgb(185 28 28);"
                        />

                        {{-- Notifikasi Verifikasi Email --}}
                        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                            <div class="mt-4 p-4 bg-yellow-50 border-l-4 border-yellow-400 rounded-md">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-yellow-700">
                                            {{ __('Your email address is unverified.') }}
                                            <flux:link class="font-semibold cursor-pointer underline" wire:click.prevent="resendVerificationNotification">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </flux:link>
                                        </p>
                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 text-sm text-green-600 font-medium">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Tombol Simpan dan Pesan Sukses --}}
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-700">
                        <x-action-message class="text-sm font-medium text-green-600 dark:text-green-400" on="profile-updated">
                            {{ __('Saved.') }}
                        </x-action-message>
                        <flux:button variant="primary" type="submit" class="bg-red-700 hover:bg-red-800 font-semibold py-3 px-8 rounded-lg transition-colors">
                            {{ __('Save Changes') }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </div>

        {{-- KARTU PERINGATAN: Hapus Akun --}}
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl border border-red-200 dark:border-red-900 overflow-hidden">
            
            {{-- Header Kartu dengan Latar Merah Muda --}}
            <div class="bg-red-50 dark:bg-red-950/50 p-6 border-b border-red-200 dark:border-red-900">
                <div class="flex items-center">
                    <div class="p-2 bg-red-100 dark:bg-red-900/50 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-red-800 dark:text-red-400">Hapus Akun</h3>
                </div>
            </div>
            
            <div class="p-6">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                    Tindakan ini tidak dapat dibatalkan. Ini akan menghapus akun Anda secara permanent dan menghapus semua data Anda dari server kami.
                </p>

                {{-- Form Hapus Akun (Fungsionalitas Tidak Diubah) --}}
                <livewire:settings.delete-user-form />
            </div>
        </div>
        
    </div>
</section>