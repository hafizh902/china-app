<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ optional(\App\Models\SystemConfig::first())->brand_name ?? config('app.name') }}</title>
    
    {{-- favicon dinamis --}}
    @php
    $brandLogo = \App\Models\SystemConfig::value('brand_logo');
    @endphp

    @if ($brandLogo)
    <link rel="icon" href="https://bbbvjqzpktarmsblmblv.supabase.co/storage/v1/object/public/chinaon/{{ $brandLogo }}?v={{ time() }}">
    @endif

    <!-- Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts untuk font Chinese dan Inter -->
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;500;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <script>
        // Konfigurasi Tailwind CSS custom
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
                        'chinese': ['Noto Sans SC', 'sans-serif'],
                        'sans': ['Inter', 'sans-serif'],
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

    <!-- Ai Chat Assistant -->
    <livewire:chat-assistant />

    {{-- LIVEWIRE SCRIPTS --}}
    @fluxScripts
@livewireScripts

<script>
    // Intercept Livewire 419 error SEBELUM dialog muncul
    document.addEventListener('livewire:init', () => {
        Livewire.hook('request', ({ fail }) => {
            fail(({ status, content, preventDefault }) => {
                if (status === 419) {
                    preventDefault(); // BLOCK dialog
                    
                    // Cek apakah user baru login (ada auth session)
                    fetch('/check-auth')
                        .then(r => r.json())
                        .then(data => {
                            if (data.authenticated) {
                                window.location.href = '/home';
                            } else {
                                window.location.reload();
                            }
                        });
                }
            });
        });
    });
</script>
</body>
</html>