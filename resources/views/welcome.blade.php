<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'LinkBio') }} — Satu Link untuk Semua</title>
    <meta name="description" content="Buat halaman profil link-in-bio kamu yang profesional dalam hitungan menit. Kelola semua link, tampilkan portfolio, dan bagikan ke semua orang.">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        * { font-family: 'Inter', sans-serif; }

        /* ===== BACKGROUND ===== */
        .bg-hero {
            background: linear-gradient(135deg, #0a0a14 0%, #12102a 40%, #0f1020 70%, #0a0a14 100%);
            min-height: 100vh;
        }

        /* ===== GLASS ===== */
        .glass-card {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1rem;
        }

        /* ===== GRADIENT TEXT ===== */
        .gradient-text {
            background: linear-gradient(135deg, #ffffff 0%, #a5b4fc 45%, #818cf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.45);
        }

        .btn-outline {
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: rgba(255, 255, 255, 0.75);
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            background: transparent;
        }
        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(255, 255, 255, 0.3);
            color: white;
        }

        /* ===== FEATURE CARDS ===== */
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 48px rgba(99, 102, 241, 0.12);
            border-color: rgba(99, 102, 241, 0.3);
        }

        /* ===== FLOAT ANIMATION ===== */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-14px); }
        }
        .float-animation {
            animation: float 5s ease-in-out infinite;
        }

        /* ===== GLOW ===== */
        .hero-glow {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(80px);
        }

        /* ===== STEP CIRCLE ===== */
        .step-number {
            width: 3rem;
            height: 3rem;
            border-radius: 9999px;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.1rem;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
        }

        /* ===== SCROLL SMOOTH ===== */
        html { scroll-behavior: smooth; }

        /* ===== BADGE ===== */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(99, 102, 241, 0.12);
            border: 1px solid rgba(99, 102, 241, 0.25);
            color: #a5b4fc;
            padding: 0.3rem 0.9rem;
            border-radius: 9999px;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: rgba(10, 10, 20, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* ===== CTA SECTION ===== */
        .cta-section {
            background: linear-gradient(135deg, rgba(99,102,241,0.12) 0%, rgba(79,70,229,0.08) 100%);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 2rem;
        }

        /* ===== PULSE DOT ===== */
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.85); }
        }
        .pulse-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: #4ade80;
            animation: pulse-dot 2s ease-in-out infinite;
        }
    </style>
</head>
<body class="antialiased">

<div class="bg-hero relative overflow-hidden">

    {{-- ===== BACKGROUND GLOW DECORATIONS ===== --}}
    <div class="hero-glow" style="width:700px;height:700px;top:-200px;left:-150px;background:radial-gradient(circle, rgba(99,102,241,0.13) 0%, transparent 70%);"></div>
    <div class="hero-glow" style="width:500px;height:500px;bottom:0;right:-100px;background:radial-gradient(circle, rgba(139,92,246,0.1) 0%, transparent 70%);"></div>
    <div class="hero-glow" style="width:400px;height:400px;top:50%;left:50%;transform:translate(-50%,-50%);background:radial-gradient(circle, rgba(99,102,241,0.06) 0%, transparent 70%);"></div>

    {{-- ===== NAVBAR ===== --}}
    <nav class="navbar sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            {{-- Logo --}}
            <a href="/" class="flex items-center gap-2 text-white font-extrabold text-xl tracking-tight">
                <div class="w-8 h-8 rounded-lg bg-indigo-500 flex items-center justify-center">
                    <i class="fas fa-link text-white text-sm"></i>
                </div>
                {{ config('app.name', 'LinkBio') }}
            </a>

            {{-- Nav buttons --}}
            @if (Route::has('login'))
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary text-sm px-5 py-2">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-outline text-sm px-5 py-2">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-primary text-sm px-5 py-2">
                                Daftar Gratis <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    {{-- ===== HERO SECTION ===== --}}
    <section class="max-w-6xl mx-auto px-6 pt-20 pb-28">
        <div class="flex flex-col lg:flex-row items-center gap-16">

            {{-- Hero Text --}}
            <div class="flex-1 text-center lg:text-left">
                <div class="badge mb-6">
                    <span class="pulse-dot"></span>
                    Gratis & Siap Pakai
                </div>

                <h1 class="gradient-text text-5xl sm:text-6xl lg:text-7xl font-black leading-tight mb-6">
                    Satu Link<br>untuk Semua
                </h1>

                <p class="text-white/60 text-lg sm:text-xl leading-relaxed mb-10 max-w-lg mx-auto lg:mx-0">
                    Buat halaman profil link-in-bio kamu yang terlihat
                    <strong class="text-white/80">profesional</strong> dalam hitungan menit.
                    Kelola link, tampilkan portofolio, dan bagikan ke siapa saja.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" id="cta-register-hero" class="btn-primary text-base px-8 py-3.5">
                            <i class="fas fa-rocket"></i> Mulai Gratis
                        </a>
                    @endif
                    <a href="#features" id="cta-lihat-demo" class="btn-outline text-base px-8 py-3.5">
                        Lihat Fitur <i class="fas fa-chevron-down text-xs"></i>
                    </a>
                </div>

                {{-- Social proof mini --}}
                <div class="mt-10 flex items-center gap-4 justify-center lg:justify-start">
                    <div class="flex -space-x-2">
                        @foreach(['A','B','C','D'] as $i => $letter)
                        <div class="w-8 h-8 rounded-full border-2 border-indigo-900 flex items-center justify-center text-white text-xs font-bold"
                             style="background: hsl({{ 220 + $i * 30 }}, 70%, 55%)">{{ $letter }}</div>
                        @endforeach
                    </div>
                    <p class="text-white/50 text-sm">
                        Bergabung dengan <span class="text-white/80 font-semibold">1,000+</span> pengguna
                    </p>
                </div>
            </div>

            {{-- Hero Preview Card --}}
            <div class="flex-1 flex justify-center lg:justify-end">
                <div class="float-animation glass-card p-6 w-72 shadow-2xl" style="box-shadow: 0 30px 60px rgba(99,102,241,0.2);">
                    {{-- Avatar --}}
                    <div class="flex flex-col items-center mb-5">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-indigo-500 to-violet-600 flex items-center justify-center text-white text-2xl font-bold mb-3 ring-4 ring-indigo-500/20">
                            A
                        </div>
                        <h3 class="text-white font-bold text-lg">Alex Designer</h3>
                        <p class="text-white/50 text-sm">UI/UX Designer & Developer</p>
                        <div class="mt-2 flex items-center gap-1 text-white/30 text-xs">
                            <i class="fas fa-map-marker-alt text-indigo-400"></i>
                            Jakarta, Indonesia
                        </div>
                    </div>

                    {{-- Sample Links --}}
                    <div class="space-y-2.5">
                        <div class="glass-card p-3 flex items-center gap-3 rounded-xl cursor-pointer hover:border-pink-400/30 transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-pink-500 to-rose-500 flex items-center justify-center text-white text-sm">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <span class="text-white/80 text-sm font-medium">Instagram</span>
                            <i class="fas fa-chevron-right text-white/20 ml-auto text-xs"></i>
                        </div>
                        <div class="glass-card p-3 flex items-center gap-3 rounded-xl cursor-pointer hover:border-white/20 transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center text-white text-sm">
                                <i class="fab fa-github"></i>
                            </div>
                            <span class="text-white/80 text-sm font-medium">GitHub</span>
                            <i class="fas fa-chevron-right text-white/20 ml-auto text-xs"></i>
                        </div>
                        <div class="glass-card p-3 flex items-center gap-3 rounded-xl cursor-pointer hover:border-blue-400/30 transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-indigo-500 flex items-center justify-center text-white text-sm">
                                <i class="fas fa-globe"></i>
                            </div>
                            <span class="text-white/80 text-sm font-medium">Website</span>
                            <i class="fas fa-chevron-right text-white/20 ml-auto text-xs"></i>
                        </div>
                        <div class="glass-card p-3 flex items-center gap-3 rounded-xl cursor-pointer hover:border-blue-300/30 transition-colors">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-sky-400 to-blue-500 flex items-center justify-center text-white text-sm">
                                <i class="fab fa-linkedin"></i>
                            </div>
                            <span class="text-white/80 text-sm font-medium">LinkedIn</span>
                            <i class="fas fa-chevron-right text-white/20 ml-auto text-xs"></i>
                        </div>
                    </div>

                    {{-- Footer Card --}}
                    <div class="mt-5 pt-4 border-t border-white/5 flex items-center justify-center gap-1.5 text-white/20 text-xs">
                        <i class="fas fa-link text-indigo-400/60"></i>
                        <span>linkbio.app/<span class="text-indigo-400/70">alexdesigner</span></span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ===== FEATURES SECTION ===== --}}
    <section id="features" class="max-w-6xl mx-auto px-6 py-24">
        <div class="text-center mb-16">
            <div class="badge mb-4">Fitur Unggulan</div>
            <h2 class="text-white text-4xl font-bold mb-4">Semua yang Kamu Butuhkan</h2>
            <p class="text-white/50 text-lg max-w-xl mx-auto">Platform sederhana tapi lengkap untuk membangun kehadiran digitalmu.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Feature 1 --}}
            <div class="feature-card glass-card p-8">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center text-white text-2xl mb-6 shadow-lg shadow-indigo-500/25">
                    <i class="fas fa-link"></i>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Kelola Link</h3>
                <p class="text-white/50 text-sm leading-relaxed">
                    Tambah, edit, dan atur urutan link sosial media atau website kamu dengan mudah. Drag &amp; drop reordering yang intuitif.
                </p>
            </div>

            {{-- Feature 2 --}}
            <div class="feature-card glass-card p-8">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-violet-500 to-purple-600 flex items-center justify-center text-white text-2xl mb-6 shadow-lg shadow-violet-500/25">
                    <i class="fas fa-images"></i>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Portfolio</h3>
                <p class="text-white/50 text-sm leading-relaxed">
                    Tampilkan karya terbaikmu langsung di halaman profil yang elegan. Lengkap dengan thumbnail, deskripsi, dan link project.
                </p>
            </div>

            {{-- Feature 3 --}}
            <div class="feature-card glass-card p-8">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-pink-500 to-rose-500 flex items-center justify-center text-white text-2xl mb-6 shadow-lg shadow-pink-500/25">
                    <i class="fas fa-palette"></i>
                </div>
                <h3 class="text-white font-bold text-xl mb-3">Tema Custom</h3>
                <p class="text-white/50 text-sm leading-relaxed">
                    Pilih warna tema yang sesuai dengan brand atau kepribadianmu. Setiap profil bisa punya tampilan uniknya sendiri.
                </p>
            </div>
        </div>
    </section>

    {{-- ===== HOW IT WORKS ===== --}}
    <section class="max-w-6xl mx-auto px-6 py-24">
        <div class="text-center mb-16">
            <div class="badge mb-4">Cara Kerja</div>
            <h2 class="text-white text-4xl font-bold mb-4">Mulai dalam 3 Langkah</h2>
            <p class="text-white/50 text-lg max-w-xl mx-auto">Tidak perlu keahlian teknis. Bisa langsung jalan dalam hitungan menit.</p>
        </div>

        <div class="max-w-2xl mx-auto space-y-6">
            {{-- Step 1 --}}
            <div class="glass-card p-6 flex items-start gap-5">
                <div class="step-number">1</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Daftar Akun Gratis</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Buat akun dalam 30 detik. Tidak perlu kartu kredit atau data berlebihan.</p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="glass-card p-6 flex items-start gap-5">
                <div class="step-number">2</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Tambahkan Link-mu</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Masukkan semua link penting kamu — Instagram, GitHub, website, atau apapun.</p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="glass-card p-6 flex items-start gap-5">
                <div class="step-number">3</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Bagikan Satu URL</h3>
                    <p class="text-white/50 text-sm leading-relaxed">Dapatkan URL pendek unik dan bagikan ke semua orang. Satu link untuk semua kebutuhan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== CTA SECTION ===== --}}
    <section class="max-w-6xl mx-auto px-6 py-16 pb-32">
        <div class="cta-section p-12 text-center">
            <div class="text-5xl mb-6">🚀</div>
            <h2 class="text-white text-4xl font-bold mb-4">Siap Memulai?</h2>
            <p class="text-white/55 text-lg mb-8 max-w-md mx-auto">
                Buat halaman profil kamu sekarang — gratis selamanya!
            </p>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" id="cta-register-bottom" class="btn-primary text-base px-10 py-4">
                    Daftar Sekarang <i class="fas fa-arrow-right"></i>
                </a>
            @endif
        </div>
    </section>

    {{-- ===== FOOTER ===== --}}
    <footer class="border-t border-white/5">
        <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2 text-white/30 text-sm">
                <i class="fas fa-link text-indigo-400/60"></i>
                <span>© {{ date('Y') }} {{ config('app.name', 'LinkBio') }}</span>
                <span>·</span>
                <span>Dibuat dengan <span class="text-red-400">❤</span> di Indonesia</span>
            </div>
            <div class="flex items-center gap-5 text-white/25 text-sm">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="hover:text-white/60 transition-colors">Masuk</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hover:text-white/60 transition-colors">Daftar</a>
                @endif
            </div>
        </div>
    </footer>

</div>

</body>
</html>
