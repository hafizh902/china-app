<!-- Register Modal -->
<div id="register-modal" class="fixed inset-0 z-[9999] overflow-y-auto flex items-center justify-center"
    style="display: {{ $showModal ? 'flex' : 'none' }}; background-color: rgba(0, 0, 0, {{ $showModal ? '0.5' : '0' }});"
    @click.self="$wire.closeModal()" @keydown.escape="$wire.closeModal()">

    <!-- Modal Content -->
    <div class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl overflow-hidden mx-4">

        <!-- Chinese Pattern Header -->
        <div class="relative bg-gradient-to-r from-red-600 via-red-700 to-red-800 p-8 text-center">
            <!-- Decorative Chinese Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-4 left-4 text-yellow-400 text-6xl">🍜</div>
                <div class="absolute top-2 right-8 text-yellow-400 text-4xl">🥢</div>
                <div class="absolute bottom-4 left-8 text-yellow-400 text-5xl">🍲</div>
                <div class="absolute bottom-2 right-4 text-yellow-400 text-3xl">🥟</div>
            </div>

            <!-- Close Button -->
            <button wire:click="closeModal"
                class="absolute top-6 right-6 text-white hover:text-yellow-300 transition-colors z-20 bg-red-700 rounded-full w-10 h-10 flex items-center justify-center">
                <i class="fas fa-times text-lg"></i>
            </button>

            <!-- Header Content -->
            <div class="relative z-10">
                <div
                    class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border-4 border-white">
                    <i class="fas fa-user-plus text-red-600 text-3xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white mb-2" style="font-family: 'Noto Sans SC', sans-serif;">
                    {{ __('language.join_us') }}
                </h2>
                <p class="text-yellow-100 text-sm">
                    {{ __('language.register_title') }}
                </p>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-8 max-h-[70vh] overflow-y-auto">
            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-triangle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <ul class="text-sm text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Register Form -->
            @if ($step === 1)
                <form wire:submit.prevent="sendVerificationCode" class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-2 text-red-500"></i> {{ __('language.email_address') }}
                        </label>

                        <input wire:model="email" type="email"
                            class="w-full pl-12 py-3 border-2 rounded-xl focus:border-red-500" placeholder="your@email.com">

                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <button type="submit"
                            class="mt-4 w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-xl">
                             {{ __('language.send_verification_code') }}
                        </button>
                    </div>
                </form>
            @endif
            @if ($step === 2)
                <form wire:submit.prevent="verifyCode" class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-shield-alt mr-2 text-red-500"></i> {{ __('language.verification_code') }}
                        </label>

                        <input wire:model="verification_code" type="text"
                            class="w-full text-center tracking-widest text-xl py-3 border-2 rounded-xl">

                        @error('verification_code')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <button type="submit"
                            class="mt-4 w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-xl">
                            {{ __('language.verify_code') }}
                        </button>

                        <button type="button" wire:click="sendVerificationCode"
                            class="mt-2 text-sm text-gray-500 underline w-full">
                            {{ __('language.resend_code') }}
                        </button>
                    </div>
                </form>
            @endif
            @if ($step === 3)
                <form wire:submit.prevent="register" class="space-y-6">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('language.name') }}</label>
                        <input wire:model="name" type="text" class="w-full py-3 border-2 rounded-xl">
                        @error('name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('language.password_label') }}</label>
                        <input wire:model="password" type="password" class="w-full py-3 border-2 rounded-xl">
                        @error('password') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('language.confirm') }}</label>
                        <input wire:model="password_confirmation" type="password" class="w-full py-3 border-2 rounded-xl">
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-red-600 to-red-700 text-white font-bold py-4 rounded-xl">
                       {{ __('language.create_account') }}
                    </button>

                </form>
            @endif




            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    {{ __('language.already_have_account') }}
                    <button type="button" wire:click=" 
                        $dispatch('close-register-modal');
                        $dispatch('open-login-modal');"
                        class="font-semibold text-red-600 hover:text-red-700 transition-colors underline">
                       {{ __('language.login_here') }}
                    </button>
                </p>
            </div>

            <!-- Chinese Food Benefits -->
            <div class="mt-6 bg-gradient-to-r from-yellow-50 to-red-50 p-4 rounded-xl border border-yellow-200">
                <div class="text-center">
                    <h4 class="text-sm font-semibold text-gray-800 mb-2"
                        style="font-family: 'Noto Sans SC', sans-serif;">
                              {{ __('language.join_benefits_title') }}
                    </h4>
                    <div class="flex justify-center space-x-4 text-xs text-gray-600">
                        <span class="flex items-center">
                            <i class="fas fa-utensils text-red-500 mr-1"></i>{{ __('language.special_menu') }}
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-star text-yellow-500 mr-1"></i>{{ __('language.member_discount') }}
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-truck text-green-500 mr-1"></i>{{ __('language.free_delivery') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>