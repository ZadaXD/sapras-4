<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

📦 Sistem Informasi SAPRAS AMIK Taruna
Sistem berbasis web untuk mendukung proses pengawasan, pengendalian, dan pengalihan barang sarana dan prasarana (SAPRAS) di AMIK Taruna. Dibangun menggunakan Laravel 10 dan template dashboard STISLA.

🎯 Fitur Utama
🔐 Login Multi-role (Calon Pengguna, Kabag, Wadir II, PJ Lab)

📊 Dashboard Role-Based (statistik & akses khusus)

🗂️ Master Data SAPRAS (CRUD oleh Kabag)

📨 Pengajuan Mutasi oleh Calon Pengguna

✅ Verifikasi Pengajuan oleh Wadir II

🖨️ Cetak Formulir & Berita Acara

📍 Pengawasan SAPRAS per Lokasi (LabKom1–4) oleh PJ Lab & Calon Pengguna (read-only)

🛠️ Update Kondisi Barang oleh PJ Lab (Baik / Rusak / Diperbaiki)

👥 Role & Hak Akses
Role	Akses
Calon Pengguna	Buat & cetak pengajuan, lihat SAPRAS dan pengawasan
Wadir II	Verifikasi pengajuan (disetujui / ditolak)
Kabag	Kelola user, data SAPRAS, dan buat berita acara
Penanggung Jawab Lab	Cek SAPRAS per LabKom & update kondisi

🚀 Teknologi
Laravel 10.x

Template AdminLTE3

Bootstrap 4

jQuery, DataTables

Blade Templating

MySQL/MariaDB

⚙️ Instalasi
bash
Copy
Edit
git clone https://github.com/yourusername/sapras-amik.git
cd sapras-amik

# Install dependensi
composer install
npm install && npm run dev

# Copy file env & generate key
cp .env.example .env
php artisan key:generate

# Atur koneksi DB lalu migrasi & seed
php artisan migrate --seed

# Jalankan server lokal
php artisan serve
🧪 Login Dummy (Seeder)
Role	Email	Password
Kabag	kabag@amik.test	password
Wadir II	wadir@amik.test	password
Calon Pengguna	calon@amik.test	password
Penanggung Jawab Lab	pjlab@amik.test	password

📁 Struktur Fitur
Copy
Edit
app/
├── Http/
│   ├── Controllers/
│   │   ├── PengajuanController.php
│   │   ├── VerifikasiController.php
│   │   ├── SaprasController.php
│   │   └── ...
├── Models/
│   ├── Pengajuan.php
│   ├── Sapras.php
│   └── User.php
resources/
├── views/
│   ├── dashboard/
│   ├── pengajuan/
│   ├── sapras/
│   └── ...
routes/
└── web.php
📃 Lisensi
MIT License © 2025 — AMIK Taruna & Contributors

🤝 Kontribusi
Pull request terbuka! Silakan fork dan buat branch baru untuk perbaikan, refactor, atau fitur tambahan.

📸 Screenshot



