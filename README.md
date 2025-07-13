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

| Role                  | Akses                                                                |
|-----------------------|----------------------------------------------------------------------|
| Calon Pengguna        | Pengajuan mutasi, cetak formulir, lihat SAPRAS & pengawasan          |
| Wadir II              | Verifikasi pengajuan (Setujui/Tolak)                                 |
| Kabag                 | Kelola pengguna, data SAPRAS, buat dan cetak berita acara            |
| Penanggung Jawab Lab  | Lihat SAPRAS berdasarkan lokasi LabKom, update kondisi barang        |

---

## ⚙️ Teknologi

- Laravel 10.x
- AdminLTE3
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
| Role	                | Email	                     | Password |
|-----------------------|----------------------------|----------|
| Kabag	                | kabag@amiktaruna.ac.id	 | password |
| Wadir II	            | wadir@amiktaruna.ac.id	 | password |
| Calon Pengguna	    | calon@amiktaruna.ac.id	 | password |
| Penanggung Jawab Lab  | pjlab@amiktaruna.ac.id     | password |


## 📸 Tampilan : 

📊 Dashboard Role Login:
<img width="1851" height="902" alt="image" src="https://github.com/user-attachments/assets/275d4a5e-510e-4df0-aad7-df4650a1996c" />

📊 Dashboard Role Calon Pengguna / Dosen:
<img width="1851" height="912" alt="image" src="https://github.com/user-attachments/assets/85384743-ff66-4f08-9f7f-ec6e209b41cd" />

📊 Dashboard Role Wadir II:
<img width="1850" height="917" alt="image" src="https://github.com/user-attachments/assets/9ff360be-42b1-4873-a220-5d21f7244e7d" />

📊 Dashboard Role Kabag:
<img width="1851" height="916" alt="image" src="https://github.com/user-attachments/assets/fbfecc73-67d2-49d4-94f2-44b472fbdd5a" />

📊 Dashboard Role Penanggung Jawab Lab:
<img width="1850" height="915" alt="image" src="https://github.com/user-attachments/assets/3f910b74-0a87-483b-9b11-7955e9928330" />


## 📄 Lisensi
MIT License © 2025 - AMIK Taruna & Contributors
