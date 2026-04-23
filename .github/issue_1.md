## 🎯 Tujuan

Halaman utama (`/`) saat ini masih menggunakan tampilan **default Laravel** (logo Laravel merah, link ke dokumentasi, Laracasts, dll). Halaman ini harus diganti dengan landing page yang menarik dan profesional untuk aplikasi **Link in Bio**.

## 📋 Masalah

- Halaman `/` masih menampilkan default Laravel welcome page
- Tidak menjelaskan apa itu aplikasi Link in Bio
- Tidak ada CTA untuk mendaftar
- Tidak profesional sebagai first impression

## 📁 File yang Diubah

| File | Aksi |
|------|------|
| `resources/views/welcome.blade.php` | **GANTI SELURUH ISI** dengan desain baru |

## 🎨 Desain yang Diinginkan

Buat landing page modern dengan **dark theme** bergradien ungu/indigo.

### A. Navbar / Header
```
[Logo/Brand Name]                    [Log In]  [Register →]
```
- Logo: teks dari `config('app.name')` atau **"LinkBio"**
- Tombol **Log In**: `route('login')`, style outline
- Tombol **Register**: `route('register')`, style filled
- Tampilkan hanya jika `Route::has('login')`

### B. Hero Section
```
        ✨ Satu Link untuk Semua
   Buat halaman profil link-in-bio kamu
   yang terlihat profesional dalam hitungan menit.

         [🚀 Mulai Gratis]  [Lihat Demo ↓]
```
- Judul besar, gradient text putih ke ungu/indigo
- Subtitle singkat menjelaskan value proposition
- **Mulai Gratis** → `route('register')` tombol utama
- **Lihat Demo** → scroll ke `#features` anchor
- Preview card animasi floating yang mensimulasikan tampilan profil

### C. Features Section - `id="features"`

3 feature cards dalam grid 3 kolom (1 kolom di mobile):

| Icon | Judul | Deskripsi |
|------|-------|-----------|
| 🔗 | **Kelola Link** | Tambah, edit, dan atur urutan link sosial media atau website kamu |
| 🖼️ | **Portfolio** | Tampilkan karya terbaikmu langsung di halaman profil yang elegan |
| 🎨 | **Tema Custom** | Pilih warna tema yang sesuai dengan brand atau kepribadianmu |

Style: glassmorphism (background putih transparan, border, backdrop blur), hover effect naik.

### D. How It Works - Opsional
3 langkah:
1. **Daftar** — Buat akun gratis dalam 30 detik
2. **Tambah Link** — Masukkan semua link penting kamu
3. **Bagikan** — Satu URL pendek untuk semua kebutuhan

### E. CTA Section Penutup
```
  🚀 Siap memulai?
  Buat halaman profil kamu sekarang — gratis!
         [Daftar Sekarang →]
```

### F. Footer
```
© 2026 LinkBio · Dibuat dengan ❤️ di Indonesia
```

## 💻 Panduan Teknis

### Font dan Stylesheet

Tambahkan di `<head>`:
```html
<!-- Google Fonts: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Tailwind CSS via CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

### Tailwind Config inline
```html
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: { sans: ['Inter', 'sans-serif'] },
        colors: {
          primary: { 400: '#818cf8', 500: '#6366f1', 600: '#4f46e5' }
        }
      }
    }
  }
</script>
```

### CSS Custom yang Dibutuhkan

```css
body { font-family: 'Inter', sans-serif; }

.bg-hero {
  background: linear-gradient(135deg, #0f0f1a 0%, #1a1035 50%, #0f0f1a 100%);
  min-height: 100vh;
}

.glass-card {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 1rem;
}

.gradient-text {
  background: linear-gradient(135deg, #ffffff 0%, #818cf8 50%, #6366f1 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.btn-primary {
  background: linear-gradient(135deg, #6366f1, #4f46e5);
  color: white; padding: 0.75rem 2rem;
  border-radius: 9999px; font-weight: 600;
  transition: all 0.3s ease;
}
.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(99, 102, 241, 0.4);
}

.btn-outline {
  border: 1px solid rgba(255,255,255,0.2);
  color: rgba(255,255,255,0.8);
  padding: 0.75rem 2rem; border-radius: 9999px;
  transition: all 0.3s ease;
}
.btn-outline:hover {
  background: rgba(255,255,255,0.1);
  color: white;
}

.feature-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
.feature-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 20px 40px rgba(99, 102, 241, 0.15);
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
}
.float-animation { animation: float 4s ease-in-out infinite; }

.hero-glow {
  position: absolute; width: 600px; height: 600px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(99,102,241,0.15) 0%, transparent 70%);
  pointer-events: none;
}
```

### Preview Card Mockup untuk Hero

```html
<div class="float-animation glass-card p-6 max-w-xs mx-auto">
  <div class="w-16 h-16 rounded-full bg-indigo-500 flex items-center justify-center text-white text-2xl font-bold mx-auto mb-3">A</div>
  <h3 class="text-white font-bold text-center text-lg">Alex Designer</h3>
  <p class="text-white/60 text-center text-sm mb-4">UI/UX Designer and Developer</p>
  <div class="space-y-2">
    <div class="glass-card p-3 flex items-center gap-3 rounded-xl">
      <i class="fab fa-instagram text-pink-400"></i>
      <span class="text-white/80 text-sm">Instagram</span>
    </div>
    <div class="glass-card p-3 flex items-center gap-3 rounded-xl">
      <i class="fab fa-github text-white/80"></i>
      <span class="text-white/80 text-sm">GitHub</span>
    </div>
    <div class="glass-card p-3 flex items-center gap-3 rounded-xl">
      <i class="fas fa-globe text-blue-400"></i>
      <span class="text-white/80 text-sm">Website</span>
    </div>
  </div>
</div>
```

## ✅ Checklist

- [ ] Ganti isi `resources/views/welcome.blade.php` dengan struktur baru
- [ ] Tambahkan CDN: Tailwind, Alpine.js, Font Awesome, Google Fonts
- [ ] Buat section **Navbar** dengan link Login dan Register
- [ ] Buat section **Hero** dengan judul gradient, subtitle, dan 2 tombol CTA
- [ ] Buat **Preview Card** mockup floating di hero section
- [ ] Buat section **Features** dengan 3 glassmorphism cards
- [ ] Buat section **How It Works** 3 langkah
- [ ] Buat section **CTA penutup** dengan tombol Register
- [ ] Buat **Footer**
- [ ] Test: tampilan desktop 1280px
- [ ] Test: tampilan mobile 375px
- [ ] Test: klik Login menuju halaman login
- [ ] Test: klik Register menuju halaman register

## 🏁 Definition of Done

- Halaman `/` tidak lagi menampilkan tampilan default Laravel
- Terdapat navbar dengan tombol Login dan Register yang berfungsi
- Ada hero section dengan headline dan dua tombol CTA
- Ada minimal 3 feature cards
- Tampilan responsive di mobile dan desktop
- Tidak ada error PHP atau JavaScript di console
