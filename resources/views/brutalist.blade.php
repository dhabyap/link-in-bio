<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LINKBRUT — Your Links, Unfiltered</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  <!-- PAGE 1: LANDING -->
  <div id="page-landing" class="page active">
    <nav class="nav">
      <a href="#" class="nav-logo">LINK<span>BRUT</span></a>
      <div class="nav-links">
        <a href="{{ route('login') }}" class="btn btn-white" style="padding: 10px 20px; font-size: 11px;">Login</a>
        <a href="{{ route('register') }}" class="btn" style="padding: 10px 20px; font-size: 11px;">Daftar</a>
      </div>
    </nav>

    <main>
      <section class="hero">
        <div class="hero-left">
          <span class="hero-badge">Beta Version 0.1</span>
          <h1 class="hero-title">
            <span class="outline">SHARING</span><br>
            <span class="fill-yellow">WITHOUT</span><br>
            <span>BULLSHIT.</span>
          </h1>
          <p class="hero-desc">
            Bosan dengan link-in-bio yang terlalu "rapi" dan lambat? 
            <strong>LINKBRUT</strong> hadir dengan estetika brutalist untuk Anda yang berani tampil beda. Cepat, tajam, dan tanpa kompromi.
          </p>
          <div class="hero-actions">
            <a href="{{ route('register') }}" class="btn">Mulai Sekarang — Gratis</a>
            <a href="#features" class="btn btn-white">Lihat Fitur</a>
          </div>
        </div>
        <div class="hero-right">
          <div class="phone-mockup">
            <div class="phone-header">
              <div class="phone-avatar">💀</div>
              <div class="phone-name">@PUNK_DEV</div>
              <div class="phone-bio">Building chaos since 2024.</div>
            </div>
            <div class="phone-links">
              <div class="phone-link">Latest Project</div>
              <div class="phone-link">Github Repo</div>
              <div class="phone-link">Buy Me a Coffee</div>
            </div>
          </div>
        </div>
      </section>

      <div class="marquee-wrap">
        <div class="marquee-track">
          <span>NO TRACKERS • NO ALGORITHMS • JUST LINKS • BRUTALIST DESIGN • HIGH CONTRAST • FAST LOAD • NO TRACKERS • NO ALGORITHMS • JUST LINKS • BRUTALIST DESIGN • HIGH CONTRAST • FAST LOAD</span>
        </div>
      </div>

      <section id="features">
        <div class="section-header">
          <span class="section-num">01/03</span>
          <h2 class="section-title">WHY BRUTAL?</h2>
        </div>
        <div class="features-grid">
          <div class="feature-card">
            <span class="feature-icon">⚡</span>
            <h3 class="feature-title">Ultra Fast</h3>
            <p class="feature-desc">Tanpa framework berat. Hanya kode murni yang dimuat dalam sekejap mata.</p>
          </div>
          <div class="feature-card">
            <span class="feature-icon">🎯</span>
            <h3 class="feature-title">Zero Distraction</h3>
            <p class="feature-desc">Fokus pada apa yang penting: link Anda. Tanpa iklan, tanpa popup mengganggu.</p>
          </div>
          <div class="feature-card">
            <span class="feature-icon">🎨</span>
            <h3 class="feature-title">Unique Style</h3>
            <p class="feature-desc">Desain brutalist yang membuat profil Anda menonjol di antara ribuan lainnya.</p>
          </div>
        </div>
      </section>

      <section class="cta-section">
        <h2 class="cta-title">SIAP TAMPIL <em>BERBEDA?</em></h2>
        <a href="{{ route('register') }}" class="btn btn-blue" style="font-size: 18px; padding: 20px 40px;">GABUNG SEKARANG</a>
      </section>
    </main>

    <footer class="footer">
      <div>&copy; 2024 LINKBRUT. NO RIGHTS RESERVED.</div>
      <div>BUILT WITH PAIN & PIXELS.</div>
    </footer>
  </div>

</body>
</html>
