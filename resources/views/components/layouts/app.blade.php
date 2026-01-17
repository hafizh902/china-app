<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ optional(\App\Models\SystemConfig::first())->brand_name ?? config('app.name') }}</title>
    <!-- Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts untuk font Chinese dan Inter -->
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;500;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <script>
        // Konfigurasi Tailwind CSS custom
        tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'chinese-red': '#C41E3A', // Warna merah khas China
                            'chinese-black': '#1A1A1A', // Warna hitam khas China
                            'chinese-gold': '#D4AF37', // Warna emas khas China
                            'chinese-gold-light': '#F0D878', // Warna emas terang
                        },
                        fontFamily: {
                            'chinese': ['Noto Sans SC', 'sans-serif'], // Font untuk teks Chinese
                            'sans': ['Inter', 'sans-serif'], // Font untuk teks umum
                        }
                    }
                }
            }

            
            </script>
    <style>
        [wire\:cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles
</head>

<body class="bg-gray-50 font-sans">
    {{-- Navbar --}}
    <livewire:navbar />

    <main class="relative overflow-visible">
        {{ $slot }}
    </main>

    {{-- Modals --}}
    <livewire:auth.login-modal />
    <livewire:auth.register-modal />
    <livewire:auth.reset-password-modal />
    <livewire:logout-modal />
    <livewire:preview-modal />


    {{-- Alert --}}
    <livewire:alert-manager />

    {{-- LIVEWIRE SCRIPTS WAJIB --}}
    @fluxScripts
    @livewireScripts
    <!-- <script>
        window.addEventListener('debug-modal', () => {
            console.log('Add New Item clicked')
        })

        document.addEventListener('livewire:init', () => {
            Livewire.on('toast', (message) => {
                // Tambahkan notifikasi toast sederhana
                const toast = document.createElement('div');
                toast.className =
                    'fixed top-4 right-4 bg-gray-900 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            });
        });
    </script> -->
</body>

</html>
