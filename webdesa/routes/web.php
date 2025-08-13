<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UMKMController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\BUMDesController;

Route::get('/home', function () {
    return view('home.index');
});

route::get('/', function () {
    return view('pages.dashboard');
});

    // ========================
    // route UMKM
    // ========================
route::resource('/umkm', UMKMController::class);
Route::put('/umkm/update-status/{umkm}', [UMKMController::class, 'updateStatus'])->name('umkm.update-status');

    // ========================
    // route PROFIL DESA
    // ========================
Route::resource('/profil', ProfilController::class);
Route::post('/simpan-profil-desa', [ProfilController::class,'store']);
Route::get('/ambil-profil-desa', [ProfilController::class,'show']);

    // ========================
    // route PERANGKAT DESA
    // ========================
Route::prefix('perangkat')->group(function () {
    Route::get('/', [ProfilController::class, 'perangkat'])->name('perangkat.perangkat');
    Route::post('/', [ProfilController::class, 'storePerangkat'])->name('perangkat.store');
    Route::put('/{perangkat}', [ProfilController::class, 'update'])->name('perangkat.update');
    Route::delete('/{perangkat}', [ProfilController::class, 'destroy'])->name('perangkat.destroy');
});

    // ========================
    // route STRUKTUR DESA
    // ========================
Route::prefix('struktur')->group(function () {
    Route::get('/', [ProfilController::class, 'struktur'])->name('struktur.struktur');
    Route::post('/', [ProfilController::class, 'storeStruktur'])->name('struktur.store');
});

    // ========================
    // route VIDEO PROFIL
    // ========================
Route::get('/video_profil', [BerandaController::class, 'video_profil'])->name('beranda.video_profil');
Route::get('/tambah_video', [BerandaController::class, 'tambah_video']);
Route::post('/simpan_video', [BerandaController::class, 'simpan_video'])->name('beranda.simpan_video');
Route::get('/video_profil', [BerandaController::class, 'video_profil'])->name('video_profil');

    // ========================
    // route PENGUMUMAN
    // ========================
//Menampilkan halaman pengumuman
Route::get('/pengumuman', [BerandaController::class, 'Pengumuman'])->name('pengumuman');

//Simpan pengumuman baru
Route::post('/pengumuman', [BerandaController::class, 'simpanPengumuman'])->name('simpan_pengumuman');
Route::put('/pengumuman/{id}', [BerandaController::class, 'updatePengumuman'])->name('update_pengumuman');
Route::delete('/pengumuman/{id}', [BerandaController::class, 'hapusPengumuman'])->name('hapus_pengumuman');

    // ========================
    // route BUMDES-profil
    // ========================
Route::get('/profil_bumdes', [BUMDesController::class, 'index'])->name('profil_bumdes');
Route::post('/profil_bumdes', [BUMDesController::class, 'update'])->name('update_profil_bumdes');
Route::get('/ambil-profil-bumdes', [BUMDesController::class, 'show'])->name('ambil_profil_bumdes');
Route::post('/simpan-profil-bumdes', [BUMDesController::class, 'update'])->name('simpan_profil_bumdes');


    // ========================
// route BUMDES-usaha
// ========================
Route::prefix('usaha_bumdes')->group(function () {
    Route::get('/', [BUMDesController::class, 'usahaIndex'])->name('usaha_bumdes.index');
    Route::post('/', [BUMDesController::class, 'usahaStore'])->name('usaha_bumdes.store');
    Route::put('/{id}', [BUMDesController::class, 'usahaUpdate'])->name('usaha_bumdes.update');
    Route::delete('/{id}', [BUMDesController::class, 'usahaDestroy'])->name('usaha_bumdes.destroy');
});



// ========================
// route GALLERY
// ========================
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit'); // Baru ditambahkan
Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update'); // Baru ditambahkan
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
