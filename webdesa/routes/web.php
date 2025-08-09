<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UMKMController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\GalleryController;

Route::get('/home', function () {
    return view('home.index');
});

route::get('/', function () {
    return view('pages.dashboard');
});

// ROUTE UMKM
route::resource('/umkm', UMKMController::class);
Route::put('/umkm/update-status/{umkm}', [UMKMController::class, 'updateStatus'])->name('umkm.update-status');

//ROUTE BERANDA
Route::post('/simpan_video', [BerandaController::class, 'simpan_video'])->name('beranda.simpan_video');
Route::get('/video_profil', [BerandaController::class, 'video_profil'])->name('video_profil');
Route::get('/pengumuman', [BerandaController::class, 'pengumuman'])->name('pengumuman');
Route::get('/pengumuman/tambah', [BerandaController::class, 'tambah_pengumuman'])->name('pengumuman.tambah');
Route::post('/pengumuman/simpan', [BerandaController::class, 'simpanPengumuman'])->name('simpan_pengumuman');

//ROUTE DATA PROFIL DESA
Route::resource('/profil', ProfilController::class);
Route::post('/simpan-profil-desa', [ProfilController::class,'store']);
Route::get('/ambil-profil-desa', [ProfilController::class,'show']);

//ROUTE PERANGKAT DESA
Route::prefix('perangkat')->group(function () {
    Route::get('/', [ProfilController::class, 'perangkat'])->name('perangkat.perangkat');
    Route::post('/', [ProfilController::class, 'storePerangkat'])->name('perangkat.store');
    Route::put('/{perangkat}', [ProfilController::class, 'update'])->name('perangkat.update');
    Route::delete('/{perangkat}', [ProfilController::class, 'destroy'])->name('perangkat.destroy');
});

//ROUTE STRUKTUR DESA
Route::prefix('struktur')->group(function () {
    Route::get('/', [ProfilController::class, 'struktur'])->name('struktur.struktur');
    Route::post('/', [ProfilController::class, 'storeStruktur'])->name('struktur.store');
});

//ROUTE PETA DESA


//ROUTE VIDEO PROFIL
Route::get('/video_profil', [App\Http\Controllers\BerandaController::class, 'video_profil'])->name('beranda.video_profil');
Route::get('/tambah_video', [App\Http\Controllers\BerandaController::class, 'tambah_video']);
Route::post('/simpan_video', [App\Http\Controllers\BerandaController::class, 'simpan_video'])->name('beranda.simpan_video');
Route::get('/video_profil', [App\Http\Controllers\BerandaController::class, 'video_profil'])->name('video_profil');

//ROUTE GALLERY
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
