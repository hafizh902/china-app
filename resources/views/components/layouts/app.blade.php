<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China Street Food</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50 font-sans">
    {{ $slot }} {{-- Isi halaman akan dimuat di sini --}}
    @livewireScripts
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('toast', (message) => {
                // Tambahkan notifikasi toast sederhana
                const toast = document.createElement('div');
                toast.className = 'fixed top-4 right-4 bg-gray-900 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            });
        });
    </script>
</body>
</html>