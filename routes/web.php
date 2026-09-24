<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;

// ── FRONTEND PUBLIC ROUTES ──
Route::get('/', [PageController::class, 'home'])->name('home');

// Menu Static Routes LPPM
Route::get('/program-kebijakan', [PageController::class, 'programKebijakan'])->name('program-kebijakan');
Route::get('/selayang-pandang',  [PageController::class, 'selayangPandang'])->name('selayang-pandang');
Route::get('/sejarah',           [PageController::class, 'sejarah'])->name('sejarah');
Route::get('/visi-misi',         [PageController::class, 'visiMisi'])->name('visi-misi');
Route::get('/struktur',          [PageController::class, 'struktur'])->name('struktur');

Route::get('/pusat-studi/bk-parenting',     [PageController::class, 'pusatStudiA'])->name('pusat-studi-bk-parenting');
Route::get('/pusat-studi/gender-anak',      [PageController::class, 'pusatStudiB'])->name('pusat-studi-gender-anak');
Route::get('/pusat-studi/moderasi-beragama', [PageController::class, 'pusatStudiC'])->name('pusat-studi-moderasi-beragama');
Route::get('/pusat-studi/kewirausahaan',     [PageController::class, 'pusatStudiD'])->name('pusat-studi-kewirausahaan');
Route::get('/jurnal-lppm',                   [PageController::class, 'ketuaJurnal'])->name('ketua-jurnal-lppm');

Route::get('/dokumen',           [PageController::class, 'dokumen'])->name('dokumen');
Route::get('/dokumentasi',       [PageController::class, 'dokumentasi'])->name('dokumentasi');
Route::get('/jurnal-al-basirah', [PageController::class, 'jurnalAlBasirah'])->name('jurnal-al-basirah');
Route::get('/jurnal-lisyabab',   [PageController::class, 'jurnalLisyabab'])->name('jurnal-lisyabab');

// Alias Routes
Route::get('/profil',     [PageController::class, 'selayangPandang'])->name('profil');
Route::get('/unduhan',    [PageController::class, 'dokumen'])->name('unduhan');
Route::get('/penelitian', [PageController::class, 'programKebijakan'])->name('penelitian');
Route::get('/pengabdian', [PageController::class, 'programKebijakan'])->name('pengabdian');
Route::get('/publikasi',  [PageController::class, 'jurnalAlBasirah'])->name('publikasi');
Route::get('/kontak',     [PageController::class, 'home'])->name('kontak');

// ── DASHBOARD ADMIN ROUTES ──
Route::prefix('admin')->group(function () {
    Route::get('/login',  [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        
        // Kelola Dokumen (Files)
        Route::get('/dokumen',         [AdminDashboardController::class, 'indexDokumen'])->name('admin.dokumen.index');
        Route::post('/dokumen',        [AdminDashboardController::class, 'storeDokumen'])->name('admin.dokumen.store');
        Route::delete('/dokumen/{id}', [AdminDashboardController::class, 'deleteDokumen'])->name('admin.dokumen.delete');

        // Kelola Dokumentasi (Photos)
        Route::get('/dokumentasi',         [AdminDashboardController::class, 'indexDokumentasi'])->name('admin.dokumentasi.index');
        Route::post('/dokumentasi',        [AdminDashboardController::class, 'storeDokumentasi'])->name('admin.dokumentasi.store');
        Route::delete('/dokumentasi/{id}', [AdminDashboardController::class, 'deleteDokumentasi'])->name('admin.dokumentasi.delete');
    });
});