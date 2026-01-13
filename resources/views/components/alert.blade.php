@props(['type' => 'info', 'title' => '', 'message' => '', 'show' => false])

@if($show)
<div
    x-data="{
        show: true,
        progress: 100,
        init() {
            const interval = setInterval(() => {
                this.progress -= 2;
                if (this.progress <= 0) {
                    clearInterval(interval);
                    this.show = false;
                }
            }, 50);
        }
    }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    class="fixed top-4 right-4 z-[10001] max-w-sm w-full"
>
    <div class="bg-white rounded-xl shadow-xl border-l-4 p-4 {{
        $type === 'success' ? 'border-l-green-500' :
        ($type === 'error' ? 'border-l-red-500' :
        ($type === 'warning' ? 'border-l-yellow-500' : 'border-l-blue-500'))
    }}">

        <div class="flex items-start">
            <!-- Icon -->
            <div class="flex-shrink-0">
                <i class="text-lg {{
                    $type === 'success' ? 'fas fa-check-circle text-green-500' :
                    ($type === 'error' ? 'fas fa-exclamation-circle text-red-500' :
                    ($type === 'warning' ? 'fas fa-exclamation-triangle text-yellow-500' : 'fas fa-info-circle text-blue-500'))
                }}"></i>
            </div>

            <!-- Content -->
            <div class="ml-3 flex-1">
                @if($title)
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">{{ $title }}</h3>
                @endif
                <p class="text-sm text-gray-600">{{ $message }}</p>
            </div>

            <!-- Close Button -->
            <button
                @click="show = false"
                class="ml-4 text-gray-400 hover:text-gray-600 transition-colors"
            >
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Progress Bar -->
        <div class="mt-3 bg-gray-200 rounded-full h-1">
            <div
                :style="`width: ${progress}%`"
                class="h-1 rounded-full transition-all duration-50 {{
                    $type === 'success' ? 'bg-green-500' :
                    ($type === 'error' ? 'bg-red-500' :
                    ($type === 'warning' ? 'bg-yellow-500' : 'bg-blue-500'))
                }}"
            ></div>
        </div>
    </div>
</div>
@endif