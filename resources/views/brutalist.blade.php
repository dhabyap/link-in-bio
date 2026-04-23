<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LINKBRUT — Your Links, Unfiltered</title>
<link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
<style>
  /* ===== RESET & BASE ===== */
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  
  :root {
    --black: #0a0a0a;
    --white: #f5f0e8;
    --yellow: #FFE500;
    --red: #FF2B2B;
    --blue: #0033FF;
    --border: 3px solid var(--black);
    --border-thick: 5px solid var(--black);
    --shadow: 6px 6px 0px var(--black);
    --shadow-lg: 10px 10px 0px var(--black);
  }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'Space Mono', monospace;
    background: var(--white);
    color: var(--black);
    overflow-x: hidden;
    cursor: crosshair;
  }

  /* ===== NOISE TEXTURE OVERLAY ===== */
  body::before {
    content: '';
    position: fixed;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
    pointer-events: none;
    z-index: 9999;
    opacity: 0.4;
  }

  /* ===== PAGES ===== */
  .page { display: none; min-height: 100vh; }
  .page.active { display: block; }

  /* ===== TYPOGRAPHY ===== */
  .display { font-family: 'Bebas Neue', sans-serif; letter-spacing: 0.02em; }
  .serif { font-family: 'Instrument Serif', serif; }
  .mono { font-family: 'Space Mono', monospace; }

  /* ===== BUTTONS ===== */
  .btn {
    display: inline-block;
    font-family: 'Space Mono', monospace;
    font-weight: 700;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 14px 28px;
    border: var(--border-thick);
    background: var(--yellow);
    color: var(--black);
    cursor: pointer;
    text-decoration: none;
    transition: transform 0.08s, box-shadow 0.08s;
    box-shadow: var(--shadow);
    position: relative;
    white-space: nowrap;
  }
  .btn:hover { transform: translate(-3px, -3px); box-shadow: 9px 9px 0px var(--black); }
  .btn:active { transform: translate(3px, 3px); box-shadow: 3px 3px 0px var(--black); }
  .btn-black { background: var(--black); color: var(--white); }
  .btn-red { background: var(--red); color: var(--white); }
  .btn-white { background: var(--white); color: var(--black); }
  .btn-blue { background: var(--blue); color: var(--white); }

  /* ===== INPUTS ===== */
  .input {
    width: 100%;
    font-family: 'Space Mono', monospace;
    font-size: 14px;
    padding: 14px 16px;
    border: var(--border-thick);
    background: var(--white);
    color: var(--black);
    outline: none;
    transition: box-shadow 0.1s;
  }
  .input:focus { box-shadow: var(--shadow); background: var(--yellow); }
  .input::placeholder { color: #888; }
  .input-label {
    display: block;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    margin-bottom: 8px;
  }

  /* ===== MARQUEE ===== */
  .marquee-wrap {
    background: var(--black);
    color: var(--yellow);
    padding: 12px 0;
    overflow: hidden;
    border-top: var(--border-thick);
    border-bottom: var(--border-thick);
  }
  .marquee-track {
    display: flex;
    white-space: nowrap;
    animation: marquee 18s linear infinite;
  }
  .marquee-track span {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 22px;
    letter-spacing: 0.15em;
    padding: 0 40px;
  }
  @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }

  /* ===== SCROLLBAR ===== */
  ::-webkit-scrollbar { width: 8px; }
  ::-webkit-scrollbar-track { background: var(--white); }
  ::-webkit-scrollbar-thumb { background: var(--black); border: 2px solid var(--white); }

  /* ===================================================
     PAGE 1 — LANDING
  =================================================== */
  #page-landing {
    background: var(--white);
  }

  /* NAV */
  .nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 40px;
    border-bottom: var(--border-thick);
    background: var(--white);
    position: sticky;
    top: 0;
    z-index: 100;
  }
  .nav-logo {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 36px;
    letter-spacing: 0.05em;
    color: var(--black);
    text-decoration: none;
  }
  .nav-logo span { color: var(--red); }
  .nav-links { display: flex; gap: 8px; align-items: center; }

  /* HERO */
  .hero {
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: calc(100vh - 82px);
  }
  .hero-left {
    padding: 60px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    border-right: var(--border-thick);
  }
  .hero-badge {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    background: var(--red);
    color: var(--white);
    padding: 6px 14px;
    border: var(--border);
    margin-bottom: 28px;
    box-shadow: 4px 4px 0 var(--black);
    width: fit-content;
  }
  .hero-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(72px, 10vw, 130px);
    line-height: 0.92;
    letter-spacing: 0.01em;
    margin-bottom: 28px;
  }
  .hero-title .outline {
    -webkit-text-stroke: 3px var(--black);
    color: transparent;
  }
  .hero-title .fill-yellow { color: var(--yellow); -webkit-text-stroke: 3px var(--black); }
  .hero-desc {
    font-size: 15px;
    line-height: 1.7;
    max-width: 420px;
    margin-bottom: 40px;
    opacity: 0.8;
  }
  .hero-actions { display: flex; gap: 16px; flex-wrap: wrap; }

  .hero-right {
    background: var(--black);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px;
    position: relative;
    overflow: hidden;
  }
  .hero-right::before {
    content: '';
    position: absolute;
    inset: 0;
    background: repeating-linear-gradient(
      -45deg, transparent, transparent 20px,
      rgba(255,229,0,0.04) 20px, rgba(255,229,0,0.04) 21px
    );
  }

  /* PHONE MOCKUP */
  .phone-mockup {
    width: 240px;
    background: var(--white);
    border: 4px solid var(--yellow);
    border-radius: 0;
    box-shadow: 14px 14px 0px var(--yellow);
    position: relative;
    z-index: 2;
    overflow: hidden;
    animation: float 3s ease-in-out infinite;
  }
  @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }
  .phone-header {
    background: var(--yellow);
    padding: 16px;
    text-align: center;
    border-bottom: 3px solid var(--black);
  }
  .phone-avatar {
    width: 56px; height: 56px;
    background: var(--black);
    border-radius: 50%;
    border: 3px solid var(--black);
    margin: 0 auto 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px;
  }
  .phone-name {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 20px;
    letter-spacing: 0.05em;
  }
  .phone-bio {
    font-size: 9px;
    opacity: 0.7;
    margin-top: 2px;
  }
  .phone-links { padding: 14px; display: flex; flex-direction: column; gap: 8px; }
  .phone-link {
    background: var(--black);
    color: var(--white);
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 10px 12px;
    border: 2px solid var(--black);
    text-align: center;
    box-shadow: 3px 3px 0 var(--yellow);
  }
  .phone-link:nth-child(2) { background: var(--white); color: var(--black); box-shadow: 3px 3px 0 var(--black); }
  .phone-link:nth-child(3) { background: var(--red); box-shadow: 3px 3px 0 var(--black); }

  /* STATS STRIP */
  .stats-strip {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    border-top: var(--border-thick);
  }
  .stat-item {
    padding: 36px 32px;
    border-right: var(--border-thick);
    position: relative;
  }
  .stat-item:last-child { border-right: none; }
  .stat-number {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 72px;
    line-height: 1;
    color: var(--black);
  }
  .stat-number span { color: var(--red); }
  .stat-label {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    opacity: 0.6;
    margin-top: 4px;
  }

  /* FEATURES */
  .section-header {
    padding: 60px 40px 0;
    display: flex;
    align-items: baseline;
    gap: 20px;
  }
  .section-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 64px;
    letter-spacing: 0.02em;
  }
  .section-num {
    font-size: 12px;
    opacity: 0.4;
    letter-spacing: 0.1em;
    text-transform: uppercase;
  }

  .features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    border-top: var(--border-thick);
    margin-top: 40px;
  }
  .feature-card {
    padding: 36px 32px;
    border-right: var(--border-thick);
    border-bottom: var(--border-thick);
    position: relative;
    transition: background 0.15s;
  }
  .feature-card:hover { background: var(--yellow); }
  .feature-card:nth-child(3), .feature-card:nth-child(6) { border-right: none; }
  .feature-icon {
    font-size: 36px;
    margin-bottom: 20px;
    display: block;
  }
  .feature-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 28px;
    letter-spacing: 0.03em;
    margin-bottom: 12px;
  }
  .feature-desc { font-size: 13px; line-height: 1.7; opacity: 0.75; }

  /* CTA SECTION */
  .cta-section {
    background: var(--black);
    color: var(--white);
    padding: 80px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
    border-top: var(--border-thick);
    flex-wrap: wrap;
  }
  .cta-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(48px, 7vw, 96px);
    line-height: 0.95;
  }
  .cta-title em {
    font-style: normal;
    color: var(--yellow);
    -webkit-text-stroke: 0;
  }

  /* FOOTER */
  .footer {
    padding: 28px 40px;
    border-top: var(--border-thick);
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 12px;
    opacity: 0.6;
    flex-wrap: wrap;
    gap: 12px;
  }

  /* RESPONSIVE */
  @media (max-width: 1024px) {
    .hero { grid-template-columns: 1fr; }
    .hero-right { display: none; }
    .stats-strip, .features-grid { grid-template-columns: 1fr; }
    .stat-item, .feature-card { border-right: none; }
    .nav { padding: 15px 20px; }
    .hero-left, .section-header, .features-grid, .cta-section, .footer { padding-left: 20px; padding-right: 20px; }
  }

</style>
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
