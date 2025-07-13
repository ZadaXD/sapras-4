<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaprasController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\PengawasanController;

Route::get('/', fn () => redirect('/login'));

Auth::routes();

Route::middleware(['auth'])->group(function () {

    // === DASHBOARD UTAMA ===
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // === CALON PENGGUNA ===
    Route::middleware('role:calon_pengguna')->group(function () {
        Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
        Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
        Route::put('/pengajuan/{id}', [PengajuanController::class, 'update'])->name('pengajuan.update');
        Route::delete('/pengajuan/{id}', [PengajuanController::class, 'destroy'])->name('pengajuan.destroy');
        Route::get('/pengajuan/print/{id}', [PengajuanController::class, 'print'])->name('pengajuan.print');
    });

    // === WADIR II ===
    Route::middleware('role:wadir_ii')->group(function () {
        Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('verifikasi.index');
        Route::put('/verifikasi/{id}/setujui', [VerifikasiController::class, 'setujui'])->name('verifikasi.setujui');
        Route::put('/verifikasi/{id}/tolak', [VerifikasiController::class, 'tolak'])->name('verifikasi.tolak');
    });

    // === KABAG ===
    Route::middleware('role:kabag')->group(function () {
        // Pengguna
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        // Berita Acara
        Route::get('/berita-acara', [BeritaAcaraController::class, 'index'])->name('berita-acara.index');
        Route::post('/berita-acara', [BeritaAcaraController::class, 'store'])->name('berita-acara.store');
        Route::get('/berita-acara/pengajuan/{id}/print', [BeritaAcaraController::class, 'printFromPengajuan'])->name('berita-acara.print.pengajuan');
    });

    // === PENGAWASAN SAPRAS PER LOKASI (PJ LAB & CALON PENGGUNA) ===
    Route::get('/pengawasan', [PengawasanController::class, 'dashboard'])->name('pengawasan.dashboard');
    Route::get('/sapras/lokasi/{lokasi}', [PengawasanController::class, 'saprasPerLokasi'])->name('pengawasan.sapras_lokasi');
    Route::put('/sapras/{id}/kondisi', [PengawasanController::class, 'updateKondisi'])->name('pengawasan.update_kondisi');

    // === MASTER DATA SAPRAS (UMUM) ===
    Route::get('/sapras', [SaprasController::class, 'index'])->name('sapras.index');
    Route::post('/sapras', [SaprasController::class, 'store'])->name('sapras.store');
    Route::put('/sapras/{id}', [SaprasController::class, 'update'])->name('sapras.update');
    Route::delete('/sapras/{id}', [SaprasController::class, 'destroy'])->name('sapras.destroy');
});
