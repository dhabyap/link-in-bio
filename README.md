# 🔗 Link-in-Bio & Mini Portfolio

> Platform "Link-in-Bio" ringan yang bisa di-deploy ke **Shared Hosting (cPanel)** — tanpa server khusus, tanpa Redis, tanpa konfigurasi rumit.

[![Tests](https://github.com/dhabyap/link-in-bio/actions/workflows/laravel.yml/badge.svg)](https://github.com/dhabyap/link-in-bio/actions)

---

## 🌟 Fitur Utama

| Fitur | Keterangan |
|---|---|
| 🔗 **Custom URL** | Setiap user punya link profil unik: `domain.com/username` |
| 👤 **Profil Lengkap** | Upload avatar, isi bio, dan pilih warna tema dinamis |
| 📎 **Manajemen Link** | Tambah, edit, hapus, dan atur urutan semua link Anda |
| 🖼️ **Mini Portfolio** | Tampilkan karya terbaik dengan efek glassmorphism |
| 🔄 **Auto-Caching** | Performa ultra cepat dengan server-side caching |
| 🔒 **Auth & Security** | Login, registrasi, dan Deployment Token terenkripsi |
| ⚡ **Hosting-Friendly** | Pengaturan otomatis via browser (tanpa butuh SSH) |

---

## 🛠️ Teknologi yang Digunakan

- **Framework**: Laravel 10 (PHP 8.1+)
- **Database**: MySQL (production) / SQLite (testing)
- **Frontend**: Blade + Tailwind CSS + Alpine.js (Premium UI)
- **Build Tool**: Vite
- **Auth**: Laravel Breeze

---

## 🚀 Panduan Instalasi Lokal

### Langkah 1 — Clone & Install

```bash
git clone https://github.com/dhabyap/link-in-bio.git
cd link-in-bio
composer install
npm install
```

### Langkah 2 — Konfigurasi

```bash
cp .env.example .env
php artisan key:generate
```

Sesuaikan `DB_DATABASE` di `.env`, lalu jalankan:

```bash
php artisan migrate
php artisan storage:link
```

### Langkah 3 — Jalankan

Buka 2 tab terminal:
- Tab 1: `php artisan serve`
- Tab 2: `npm run dev`

Akses: **http://localhost:8000** ✅

---

## 🌍 Panduan Deployment cPanel (Manual / Tanpa SSH)

Jika Anda menggunakan Shared Hosting tanpa akses terminal/SSH, ikuti langkah berikut:

### 1. Persiapan Aset
Di komputer lokal Anda, jalankan perintah kompilasi:
```bash
npm run build
```
Ini akan menghasilkan folder `public/build`.

### 2. Upload File ke cPanel
1. Upload semua folder (kecuali `node_modules`, `.git`, `tests`) ke folder Laravel Anda (misal: `/home/user/laravel-app`).
2. Pindahkan isi folder `public/` (termasuk folder `build`) ke `public_html/`.
3. Buka `public_html/index.php` dan sesuaikan path `vendor/autoload.php` serta `bootstrap/app.php`.

### 3. Konfigurasi Keamanan Deployment
Buka file `.env` di server dan tambahkan token rahasia:
```dotenv
DEPLOYMENT_TOKEN=isi_dengan_token_acak_yang_panjang
```

### 4. Setup Otomatis via Browser
Tanpa SSH, Anda bisa menjalankan perintah Artisan melalui browser dengan bantuan token di atas:

- **Migrasi Database:** 
  `https://domain.com/deploy/setup?action=migrate&token=TOKEN_ANDA`
- **Simbolik Link (Penting!)**: 
  `https://domain.com/deploy/setup?action=storage-link&token=TOKEN_ANDA`
- **Optimasi Performa**: 
  `https://domain.com/deploy/setup?action=optimize&token=TOKEN_ANDA`

---

## 🧪 Menjalankan Testing

```bash
php artisan test
```

Pastikan semua test (termasuk `DeploymentTest`) berhasil dijalankan.

---

## 📄 Lisensi

Proyek ini tersedia di bawah lisensi [MIT](https://opensource.org/licenses/MIT).
