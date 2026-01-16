<div wire:cloak x-data="{ open: @entangle('showLogoutConfirm') }">
    <div
        x-show="open"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
    >        <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden mx-4">
            <!-- Header Modal -->
            <div class="relative bg-gradient-to-r from-red-600 via-red-700 to-red-800 p-8 text-center">
                <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border-4 border-white">
                    <i class="fas fa-sign-out-alt text-red-600 text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2" style="font-family: 'Noto Sans SC', sans-serif;">
                    Konfirmasi Logout
                </h2>
                <p class="text-yellow-100 text-sm">Apakah Anda yakin ingin keluar?</p>
            </div>

            <!-- Content -->
            <div class="p-8">
                <p class="text-gray-600 text-center mb-6">Anda akan diarahkan kembali ke halaman utama setelah logout.</p>

                <!-- Buttons -->
                <div class="flex space-x-4">
                    <button wire:click="closeModal" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-xl hover:bg-gray-300 transition-colors">
                        <i class="fas fa-times mr-2"></i>Batal
                    </button>
                    <button wire:click="confirmLogout" class="flex-1 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-sign-out-alt mr-2"></i>Ya, Logout
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
