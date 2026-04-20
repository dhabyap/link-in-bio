# 🔗 Link-in-Bio & Mini Portfolio

> Platform "Link-in-Bio" ringan yang bisa di-deploy ke **Shared Hosting (cPanel)** — tanpa server khusus, tanpa Redis, tanpa konfigurasi rumit.

[![Tests](https://github.com/dhabyap/link-in-bio/actions/workflows/laravel.yml/badge.svg)](https://github.com/dhabyap/link-in-bio/actions)

---

## 🌟 Fitur Utama

| Fitur | Keterangan |
|---|---|
| 🔗 **Custom URL** | Setiap user punya link profil unik: `domain.com/username` |
| 👤 **Profil Lengkap** | Upload avatar, isi bio, dan pilih warna tema |
| 📎 **Manajemen Link** | Tambah, edit, hapus, dan atur urutan semua link sosmed Anda |
| 🖼️ **Mini Portfolio** | Tampilkan karya terbaik Anda dengan gambar & deskripsi |
| 🔒 **Autentikasi Aman** | Login, registrasi, reset password, dan verifikasi email |
| ⚡ **Hosting-Friendly** | Berjalan di cPanel Shared Hosting standar, PHP 8.1+ |

---

## 🛠️ Teknologi yang Digunakan

- **Framework**: Laravel 10 (PHP 8.1+)
- **Database**: MySQL (production) / SQLite (testing)
- **Frontend**: Blade Templates + Tailwind CSS + Alpine.js
- **Build Tool**: Vite
- **Auth**: Laravel Breeze

---

## 🚀 Panduan Instalasi (Localhost / Developer)

### Prasyarat

Pastikan software berikut sudah terinstal di komputer Anda:

- [PHP](https://www.php.net/downloads) minimal versi **8.1**
- [Composer](https://getcomposer.org/) (PHP Package Manager)
- [Node.js](https://nodejs.org/) v16+ dan NPM
- [MySQL](https://dev.mysql.com/) atau gunakan SQLite untuk lebih praktis

---

### Langkah 1 — Clone Repositori

```bash
git clone https://github.com/dhabyap/link-in-bio.git
cd link-in-bio
```

### Langkah 2 — Install Dependensi

```bash
composer install
npm install
```

### Langkah 3 — Konfigurasi Environment

Copy file konfigurasi contoh, lalu buka dan sesuaikan isinya:

```bash
cp .env.example .env
```

Buka file `.env` dan atur bagian database. Untuk lokal dengan **MySQL**:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=link_in_bio
DB_USERNAME=root
DB_PASSWORD=
```

> **💡 Praktis pakai SQLite?** Ubah `DB_CONNECTION=sqlite`, buat filenya dengan `touch database/database.sqlite`, lalu hapus/komentari baris `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.

### Langkah 4 — Generate Key & Migrasi Database

```bash
php artisan key:generate
php artisan migrate
```

### Langkah 5 — Symlink Storage (WAJIB untuk Foto/Gambar)

```bash
php artisan storage:link
```

> Perintah ini menghubungkan folder penyimpanan gambar ke folder `public` agar bisa diakses melalui browser.

### Langkah 6 — Kompilasi Aset & Jalankan Aplikasi

Buka **2 tab terminal** secara bersamaan:

**Tab 1 — Laravel Server:**
```bash
php artisan serve
```

**Tab 2 — Vite (Frontend):**
```bash
npm run dev
```

Buka browser dan akses: **http://localhost:8000** ✅

---

## 📖 Cara Penggunaan

### 1. Buat Akun
Buka halaman `/register` dan isi formulir:
- **Name**: Nama lengkap Anda
- **Username**: Ini akan jadi URL profil Anda (wajib huruf, angka, atau `-` dan `_`, **tanpa spasi**)
- **Email** dan **Password**

### 2. Atur Profil Anda
Setelah login, klik nama Anda di pojok kanan atas → pilih **Profile**.
- Upload **Foto Profil (Avatar)**
- Isi **Bio** singkat
- Pilih **Warna Tema** untuk tampilan publik Anda

Klik **Save** setelah selesai.

### 3. Tambah Link
Di menu navigasi atas, klik **Links** → **Add New Link**.
- **Title**: Nama link (contoh: `Instagram Saya`)
- **URL**: Alamat lengkap (contoh: `https://instagram.com/username`)
- **Icon**: Opsional, bisa emoji (🔗) atau kelas FontAwesome (`fas fa-instagram`)
- **Sort Order**: Angka urutan tampil (1 muncul paling atas)
- Centang **Active** agar tampil di profil publik

### 4. Tambah Portofolio
Di menu navigasi atas, klik **Portfolios** → **Add New Portfolio Item**.
- **Title**: Nama karya Anda
- **Description**: Deskripsi singkat
- **Thumbnail**: Upload gambar karya (maks. 2MB)
- **External API URL**: Opsional, link ke demo atau repositori

### 5. Lihat Profil Publik Anda
Buka tab baru di browser dan ketik:

```
http://localhost:8000/{username-Anda}
```

Inilah tampilan yang akan dilihat oleh siapapun yang mengunjungi profil Anda!

---

## 🌍 Deployment ke cPanel (Shared Hosting)

1. **Upload semua file** (kecuali folder `node_modules`) ke server via FTP.
2. **Konten folder `public/`** disalin ke `public_html/`.
3. Sesuaikan file `public/index.php` agar path-nya menunjuk ke lokasi Laravel yang benar.
4. Buat database MySQL baru di cPanel, lalu konfigurasikan `.env` di server.
5. Pastikan versi PHP di **cPanel → Select PHP Version** disetel minimal ke **PHP 8.1**.
6. Jalankan via SSH (jika tersedia): `php artisan migrate` dan `php artisan storage:link`.

---

## 🧪 Menjalankan Testing

```bash
php artisan test
```

Pastikan semua **25 test** berhasil dijalankan sebelum melakukan deployment.

---

## 📄 Lisensi

Proyek ini adalah open-source dan tersedia di bawah lisensi [MIT](https://opensource.org/licenses/MIT).
