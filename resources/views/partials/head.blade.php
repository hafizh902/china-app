<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

{{-- <link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png"> --}}

<link rel="preconnect" href="https://fonts.bunny.net">
@if(app()->getLocale() == 'cn')
<link href="https://fonts.bunny.net/css?family=noto-sans-sc:400,500,600" rel="stylesheet" />
@else
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
@endif

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance

<style>
:root {
    --font-sans: '{{ app()->getLocale() == 'cn' ? 'Noto Sans SC' : 'Instrument Sans' }}', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
}
</style>
