<div>
    @foreach ($alerts as $alert)
        <div class="alert alert-{{ $alert['type'] }}" id="alert-{{ $alert['id'] }}">
            <strong>{{ $alert['title'] }}</strong>: {{ $alert['message'] }}
        </div>
    @endforeach
</div>

<script>
    // Mendengarkan event hide-alert dari Livewire
    window.addEventListener('hide-alert', event => {
        const alertId = event.detail.id;
        
        // Menunda penghapusan alert setelah 5 detik
        setTimeout(() => {
            Livewire.emit('hideAlert', alertId);  // Mengirimkan event ke Livewire untuk menghapus alert
            const alertElement = document.getElementById('alert-' + alertId);
            if (alertElement) {
                alertElement.remove();  // Menghapus elemen alert dari DOM
            }
        }, 5000);  // Delay 5 detik
    });
</script>
