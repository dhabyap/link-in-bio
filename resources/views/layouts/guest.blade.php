<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div id="page-login" class="page active" style="display: flex;">
            <div class="login-container">
                <div class="login-left">
                    <div>
                        <a class="login-brand" href="/">LINK<span>BRUT</span></a>
                        <p class="login-tagline">Satu link<br>untuk semua<br><em>hal tentang kamu.</em></p>
                    </div>
                    <div class="login-visual">
                        <div class="big-arrow">→</div>
                    </div>
                    <p class="login-footnote">Platform link-in-bio untuk creator Indonesia</p>
                </div>
                <div class="login-right">
                    <a href="/" class="login-back">← Kembali ke Home</a>
                    
                    <div class="w-full">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
