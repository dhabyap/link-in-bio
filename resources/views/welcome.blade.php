<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LinkBio') }} — Satu Link untuk Semua</title>
    <meta name="description" content="Buat halaman profil link-in-bio kamu yang profesional dalam hitungan menit. Kelola semua link, tampilkan portfolio, dan bagikan ke semua orang.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="mono antialiased">

<div id="page-landing" class="page active">

  <nav class="nav">
    <a class="nav-logo" href="{{ url('/') }}">LINK<span>BRUT</span></a>
    <div class="nav-links">
      @auth
        <a href="{{ route('dashboard') }}" class="btn">DASHBOARD →</a>
      @else
        <a href="{{ route('login') }}" class="btn btn-white">MASUK</a>
        <a href="{{ route('register') }}" class="btn">DAFTAR GRATIS →</a>
      @endauth
    </div>
  </nav>

  <section class="hero">
    <div class="hero-left">
      <div class="hero-badge">⚡ Link-in-Bio Platform #1</div>
      <h1 class="hero-title">
        SATU<br>
        <span class="outline">LINK.</span><br>
        <span class="fill-yellow">SEMUA</span><br>
        KAMU.
      </h1>
      <p class="hero-desc">
        Buat halaman profil yang brutal, jujur, dan benar-benar milikmu. Tanpa template membosankan. Tanpa batasan. Langsung di-deploy ke hosting kamu.
      </p>
      <div class="hero-actions">
        <a href="{{ route('register') }}" class="btn">MULAI SEKARANG →</a>
        <a href="#" class="btn btn-black">LIHAT DEMO</a>
      </div>
    </div>
    <div class="hero-right">
      <div class="phone-mockup">
        <div class="phone-header">
          <div class="phone-avatar">🔥</div>
          <div class="phone-name">@dhabyap</div>
          <div class="phone-bio">designer · developer · creator</div>
        </div>
        <div class="phone-links">
          <div class="phone-link">🚀 Portfolio Saya</div>
          <div class="phone-link">📸 Instagram</div>
          <div class="phone-link">💼 Hire Me!</div>
          <div class="phone-link" style="background:var(--yellow);color:var(--black);box-shadow:3px 3px 0 var(--black);">🎨 Karya Terbaru</div>
        </div>
      </div>
    </div>
  </section>

  <div class="marquee-wrap">
    <div class="marquee-track">
      <span>LINK-IN-BIO</span><span>●</span>
      <span>MINI PORTFOLIO</span><span>●</span>
      <span>CUSTOM URL</span><span>●</span>
      <span>CEPAT & RINGAN</span><span>●</span>
      <span>SHARED HOSTING READY</span><span>●</span>
      <span>BRUTALIST DESIGN</span><span>●</span>
      <span>LINK-IN-BIO</span><span>●</span>
      <span>MINI PORTFOLIO</span><span>●</span>
      <span>CUSTOM URL</span><span>●</span>
      <span>CEPAT & RINGAN</span><span>●</span>
      <span>SHARED HOSTING READY</span><span>●</span>
      <span>BRUTALIST DESIGN</span><span>●</span>
    </div>
  </div>

  <div class="stats-strip">
    <div class="stat-item">
      <div class="stat-number">12<span>K+</span></div>
      <div class="stat-label">Pengguna Aktif</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">4<span>M+</span></div>
      <div class="stat-label">Klik per Bulan</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">99<span>%</span></div>
      <div class="stat-label">Uptime SLA</div>
    </div>
  </div>

  <div class="section-header">
    <h2 class="section-title">FITUR</h2>
    <span class="section-num">— 06 FITUR UTAMA</span>
  </div>

  <div class="features-grid">
    <div class="feature-card">
      <span class="feature-icon">🔗</span>
      <div class="feature-title">Custom URL</div>
      <p class="feature-desc">Setiap akun punya URL unik: <strong>domain.com/username</strong>. Singkat, personal, dan mudah dibagikan ke mana saja.</p>
    </div>
    <div class="feature-card">
      <span class="feature-icon">🎨</span>
      <div class="feature-title">Tema Dinamis</div>
      <p class="feature-desc">Pilih warna tema yang mencerminkan kepribadianmu. Tidak ada dua halaman yang terlihat sama.</p>
    </div>
    <div class="feature-card">
      <span class="feature-icon">🖼️</span>
      <div class="feature-title">Mini Portfolio</div>
      <p class="feature-desc">Tampilkan karya terbaikmu dengan tampilan glassmorphism yang memukau. Bukan sekedar galeri biasa.</p>
    </div>
    <div class="feature-card">
      <span class="feature-icon">⚡</span>
      <div class="feature-title">Ultra Cepat</div>
      <p class="feature-desc">Server-side caching membuat halamanmu dimuat dalam milidetik. Pengunjung tidak akan kabur karena loading lama.</p>
    </div>
    <div class="feature-card">
      <span class="feature-icon">📱</span>
      <div class="feature-title">Mobile First</div>
      <p class="feature-desc">Didesain dari layar kecil ke besar. Semua terlihat sempurna di mana saja dan kapan saja.</p>
    </div>
    <div class="feature-card">
      <span class="feature-icon">🔒</span>
      <div class="feature-title">Aman & Terenkripsi</div>
      <p class="feature-desc">Authentication solid dengan deployment token terenkripsi. Akunmu aman dari tangan yang tidak berwenang.</p>
    </div>
  </div>

  <div class="cta-section">
    <div>
      <div class="cta-title">SIAP<br>BUAT<br><em>LINKMU?</em></div>
    </div>
    <div style="display:flex;flex-direction:column;gap:12px;align-items:flex-start">
      <p style="color:rgba(255,255,255,0.6);font-size:14px;max-width:400px;line-height:1.7;">Bergabung dengan ribuan creator, freelancer, dan profesional yang sudah pakai LINKBRUT.</p>
      <div style="display:flex;gap:12px;flex-wrap:wrap">
        <a href="{{ route('register') }}" class="btn">DAFTAR GRATIS →</a>
        <a href="#" class="btn btn-white">LIHAT DEMO</a>
      </div>
    </div>
  </div>

  <footer class="footer">
    <span>© {{ date('Y') }} LINKBRUT — Dibuat dengan ☕ dan keberanian</span>
    <span>MIT License · Open Source</span>
  </footer>

</div>

</body>
</html>
