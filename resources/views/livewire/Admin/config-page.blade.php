<div class="p-6 grid grid-cols-1 lg:grid-cols-10 gap-6">

    {{-- LEFT MENU --}}
    <div class="lg:col-span-2 bg-white rounded-lg shadow p-4 space-y-2">
        @foreach([
            'page' => 'Page Settings',
            'operational' => 'Operational',
            'reservation' => 'Reservation',
            'payment' => 'Payment'
        ] as $key => $label)
            <button
                wire:click="$set('activeTab', '{{ $key }}')"
                class="w-full text-left px-3 py-2 rounded
                    {{ $activeTab === $key ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-100' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>

    {{-- CONTENT --}}
    <div class="lg:col-span-8 bg-white rounded-lg shadow p-6">

        {{-- PAGE SETTINGS --}}
        @if ($activeTab === 'page')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium">Brand Name</label>
                <input wire:model="config.brand_name" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="text-sm font-medium">Brand Logo</label>
                <input type="file" wire:model="brand_logo" class="w-full text-sm">
            </div>

            <div class="md:col-span-2">
                <label class="text-sm font-medium">Footer Address</label>
                <textarea wire:model="config.footer_address" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <div>
                <label class="text-sm font-medium">Footer Phone</label>
                <input wire:model="config.footer_phone" class="w-full border rounded px-3 py-2">
            </div>
        </div>
        @endif

        {{-- OPERATIONAL --}}
        @if ($activeTab === 'operational')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium">Active From</label>
                <input type="time" wire:model="config.active_from" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="text-sm font-medium">Active Until</label>
                <input type="time" wire:model="config.active_until" class="w-full border rounded px-3 py-2">
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" wire:model="config.site_closed">
                <span class="text-sm font-medium">Close Site</span>
            </div>

            <div>
                <label class="text-sm font-medium">Tax (%)</label>
                <input type="number" wire:model="config.tax_percent" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="text-sm font-medium">Delivery Fee</label>
                <input type="number" wire:model="config.delivery_fee" class="w-full border rounded px-3 py-2">
            </div>
        </div>
        @endif

        {{-- UPCOMING --}}
        @if (in_array($activeTab, ['reservation','payment']))
            <div class="text-gray-500 text-sm italic">
                Upcoming feature.
            </div>
        @endif

        <div class="mt-6 flex justify-end">
            <button wire:click="save" class="px-5 py-2 bg-blue-600 text-white rounded">
                Save Settings
            </button>
        </div>
    </div>
</div>
