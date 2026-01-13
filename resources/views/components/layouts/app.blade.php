<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China Street Food</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >

    {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;500;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'chinese-red': '#C41E3A',
                        'chinese-black': '#1A1A1A',
                        'chinese-gold': '#D4AF37',
                        'chinese-gold-light': '#F0D878',
                    },
                    fontFamily: {
                        chinese: ['Noto Sans SC', 'sans-serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    {{-- LIVEWIRE STYLES WAJIB --}}
    @livewireStyles
</head>

<body class="bg-gray-50 font-sans">
    {{-- Navbar --}}
    <livewire:navbar />
    {{ $slot }} {{-- Isi halaman akan dimuat di sini --}}
    
    {{-- Modals --}}
    <livewire:auth.login-modal />
    <livewire:auth.register-modal />
    
    {{-- Alert --}}
    <livewire:alert-manager />
    
    @fluxScripts
    @livewireScripts
    <script>
        window.addEventListener('debug-modal', () => {
            console.log('Add New Item clicked')
        })

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
