<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 — Halaman Tidak Ditemukan</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css'])
    
    <style>
        :root {
            --black: #000000;
            --white: #ffffff;
            --yellow: #FFE500;
        }
    </style>
</head>
<body class="mono antialiased" style="background: var(--white); height: 100vh; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;">
    <div style="max-width: 600px; width: 100%; border: 6px solid var(--black); background: var(--white); box-shadow: 16px 16px 0 var(--black); padding: 60px 40px; position: relative; z-index: 10;">
        <div style="position: absolute; top: -30px; left: 40px; background: var(--yellow); border: 4px solid var(--black); padding: 8px 16px; font-weight: 700; font-size: 24px; font-family: 'Bebas Neue', sans-serif;">
            ERROR 404
        </div>
        
        <h1 style="font-family: 'Bebas Neue', sans-serif; font-size: 80px; line-height: 0.9; margin-bottom: 24px; color: var(--black);">
            😕 OPS! HALAMAN<br>TIDAK ADA.
        </h1>
        
        <p style="font-size: 18px; line-height: 1.6; margin-bottom: 40px; font-weight: 700; opacity: 0.7;">
            Username atau halaman yang kamu cari mungkin sudah pindah atau memang tidak pernah ada di sini.
        </p>
        
        <a href="{{ url('/') }}" class="btn" style="padding: 16px 32px; font-size: 16px; display: inline-block; text-decoration: none; text-align: center;">
            [← KEMBALI KE BERANDA]
        </a>
    </div>
    
    <!-- Background Decor -->
    <div style="position: fixed; bottom: -50px; right: -50px; font-size: 400px; font-family: 'Bebas Neue', sans-serif; color: rgba(0,0,0,0.03); z-index: 1; user-select: none;">404</div>
    <div style="position: fixed; top: 10%; left: 10%; font-size: 150px; font-family: 'Bebas Neue', sans-serif; color: rgba(0,0,0,0.02); z-index: 1; user-select: none; transform: rotate(-15deg);">MISSING</div>
</body>
</html>
