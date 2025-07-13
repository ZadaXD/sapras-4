<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 📦 Sistem Informasi SAPRAS AMIK Taruna

Sistem informasi ini digunakan untuk **pengawasan**, **pengendalian**, dan **pengalihan** SAPRAS (Sarana dan Prasarana) oleh berbagai role di lingkungan AMIK Taruna. Dibangun dengan Laravel 10 dan menggunakan template dashboard **STISLA**.

---

## 🔧 Fitur Utama

- Manajemen SAPRAS (CRUD) oleh Kabag
- Pengajuan mutasi SAPRAS oleh Calon Pengguna
- Verifikasi pengajuan oleh Wadir II
- Cetak Formulir Mutasi & Berita Acara
- Pengawasan SAPRAS per LabKom (1–4)
- Update kondisi barang oleh Penanggung Jawab Lab
- Informasi umum SAPRAS
- Dashboard dinamis sesuai **role**
- Login & autentikasi Laravel bawaan
- Responsive layout dengan STISLA + Bootstrap 4
- Tabel interaktif dengan **DataTables**

---

## 👥 Role & Hak Akses

| Role                  | Akses                                                                 |
|-----------------------|----------------------------------------------------------------------|
| Calon Pengguna        | Pengajuan mutasi, cetak formulir, lihat SAPRAS & pengawasan          |
| Wadir II              | Verifikasi pengajuan (Setujui/Tolak)                                 |
| Kabag                 | Kelola pengguna, data SAPRAS, buat dan cetak berita acara            |
| Penanggung Jawab Lab  | Lihat SAPRAS berdasarkan lokasi LabKom, update kondisi barang        |

---

## ⚙️ Teknologi

- Laravel 10.x
- STISLA Admin Template
- Bootstrap 4.6
- Font Awesome 5
- jQuery & DataTables
- MySQL / MariaDB

---

## 🚀 Instalasi Lokal

```bash
git clone https://github.com/yourusername/sapras-amik.git
cd sapras-amik

# Install dependencies
composer install
npm install && npm run dev

# Setup file .env
cp .env.example .env
php artisan key:generate

# Konfigurasi database lalu jalankan migrasi
php artisan migrate --seed

# Jalankan aplikasi
php artisan serve
```
## 🧪 Login Dummy (Seeder)
Role	Email	Password
Kabag	kabag@amik.test	password
Wadir II	wadir@amik.test	password
Calon Pengguna	calon@amik.test	password
Penanggung Jawab Lab	pjlab@amik.test	password

## 📁 Struktur Direktori
bash
Copy
Edit
app/
├── Http/Controllers/
│   ├── SaprasController.php
│   ├── PengajuanController.php
│   ├── VerifikasiController.php
│   ├── DashboardController.php
│   └── ...
resources/views/
├── sapras/
├── pengajuan/
├── users/
└── layouts/
routes/
└── web.php
## 📸 Tampilan
Tambahkan screenshot pada folder screenshots/ dan tampilkan seperti berikut:

yaml
Copy
Edit
📊 Dashboard Role Kabag:
![Dashboard Kabag](screenshots/dashboard-kabag.png)

📥 Form Pengajuan:
![Form Pengajuan](screenshots/form-pengajuan.png)
## 📄 Lisensi
MIT License © 2025 - AMIK Taruna & Contributors



