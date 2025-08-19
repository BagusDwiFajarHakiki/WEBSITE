<?php

use App\Http\Controllers\BannersController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UMKMController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BUMDesController;
use App\Http\Controllers\KadesController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatistikDesaController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\AuthController;

    // ========================
    // route HOME
    // ========================
Route::get('/', function () {
    return view('home.index');
});

Route::get('/', [BerandaController::class, 'index'])->name('home');

route::get('/visimisi', function () {
    return view('home.subhome.visimisi');
});

route::get('/struktur_home', function () {
    return view('home.subhome.struktur');
});

route::get('/statistik_home', function () {
    return view('home.subhome.statistik');
});

route::get('/bumdes_home', function () {
    return view('home.subhome.bumdes_home');
});

// route::get('/umkm_home', function () {
//     return view('home.subhome.umkm_home');
// });

route::get('/berita_kegiatan', function () {
    return view('home.subhome.berita_kegiatan');
});

// Rute untuk menampilkan formulir login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Rute untuk memproses data login (POST request)
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

route::get('/admin', function () {
    return view('layout.app');
})->middleware('auth')->name('dashboard');

    // ========================
    // route UMKM
    // ========================
route::resource('/umkm', UMKMController::class)->middleware('auth');
Route::put('/umkm/update-status/{umkm}', [UMKMController::class, 'updateStatus'])->name('umkm.update-status');
Route::get('/umkm_home', [UMKMController::class,'umkm_home']);

    // ========================
    // route SEJARAH DESA
    // ========================
Route::get('/sejarah', [ProfilController::class,'sejarah'])->middleware('auth')->name('sejarah');
Route::post('/simpan-sejarah-desa', [ProfilController::class,'store']);
Route::get('/ambil-sejarah-desa', [ProfilController::class,'show']);

    // ========================
    // route VISI MISI DESA
    // ========================
Route::get('/visi_misi', [ProfilController::class,'visi_misi'])->middleware('auth')->name('visi_misi');
Route::post('/simpan-visi-misi', [ProfilController::class,'storevm']);
Route::get('/ambil-visi-misi', [ProfilController::class,'showvm']);

    // ========================
    // route PERANGKAT DESA
    // ========================
Route::prefix('perangkat')->group(function () {
    Route::get('/', [PerangkatController::class, 'perangkat'])->middleware('auth')->name('perangkat.perangkat');
    Route::post('/', [PerangkatController::class, 'storePerangkat'])->name('perangkat.store');
    Route::put('/{perangkat}', [PerangkatController::class, 'update'])->name('perangkat.update');
    Route::delete('/{perangkat}', [PerangkatController::class, 'destroy'])->name('perangkat.destroy');
});

    // ========================
    // route STRUKTUR DESA
    // ========================
Route::prefix('struktur')->group(function () {
    Route::get('/', [PerangkatController::class, 'struktur'])->middleware('auth')->name('struktur.struktur');
    Route::post('/', [PerangkatController::class, 'storeStruktur'])->name('struktur.store');
});

    // ========================
    // route VIDEO PROFIL
    // ========================
Route::get('/video_profil', [BerandaController::class, 'video_profil'])->middleware('auth')->name('beranda.video_profil');
Route::get('/tambah_video', [BerandaController::class, 'tambah_video']);
Route::post('/simpan_video', [BerandaController::class, 'simpan_video'])->name('beranda.simpan_video');
Route::get('/video_profil', [BerandaController::class, 'video_profil'])->name('video_profil');

    // ========================
    // route PENGUMUMAN
    // ========================
//Menampilkan halaman pengumuman
Route::get('/pengumuman', [BerandaController::class, 'Pengumuman'])->middleware('auth')->name('pengumuman');

//Simpan pengumuman baru
Route::post('/pengumuman', [BerandaController::class, 'simpanPengumuman'])->middleware('auth')->name('simpan_pengumuman');
Route::put('/pengumuman/{id}', [BerandaController::class, 'updatePengumuman'])->name('update_pengumuman');
Route::delete('/pengumuman/{id}', [BerandaController::class, 'hapusPengumuman'])->name('hapus_pengumuman');
Route::put('/pengumuman/update-status/{id}', [BerandaController::class, 'updateStatus'])->name('pengumuman.update-status');

    // ========================
    // route BUMDES-profil
    // ========================
Route::get('/profil_bumdes', [BUMDesController::class, 'index'])->middleware('auth')->name('profil_bumdes');
Route::post('/profil_bumdes', [BUMDesController::class, 'update'])->name('update_profil_bumdes');
Route::get('/ambil-profil-bumdes', [BUMDesController::class, 'show'])->name('ambil_profil_bumdes');
Route::post('/simpan-profil-bumdes', [BUMDesController::class, 'update'])->name('simpan_profil_bumdes');


    // ========================
    // route BUMDES-usaha
    // ========================
Route::prefix('usaha_bumdes')->group(function () {
Route::get('/', [BUMDesController::class, 'usahaIndex'])->middleware('auth')->name('usaha_bumdes.index');
Route::post('/', [BUMDesController::class, 'usahaStore'])->name('usaha_bumdes.store');
Route::put('/{id}', [BUMDesController::class, 'usahaUpdate'])->name('usaha_bumdes.update');
Route::delete('/{id}', [BUMDesController::class, 'usahaDestroy'])->name('usaha_bumdes.destroy');
});


// ========================
// route MAPS
// ========================
Route::get('/map', [MapController::class, 'index']);

// ========================
// route LOGO DESA
// ========================
Route::post('/upload-logo', [SettingController::class, 'uploadLogo'])->name('upload.logo');

// ========================
// route GALLERY
// ========================
Route::get('/gallery', [GalleryController::class, 'index'])->middleware('auth')->name('gallery.index');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit'); // Baru ditambahkan
Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update'); // Baru ditambahkan
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');


// ========================
// route BANNER
// ========================
//Menampilkan halaman banner
Route::get('/banner', [BannersController::class, 'banners'])->middleware('auth')->name('banner');
Route::get('/ambil-text', [BannersController::class,'show']);

//Simpan banner baru
Route::post('/banner', [BannersController::class, 'simpanBanner'])->name('simpan_banner');
Route::put('/banner/{id}', [BannersController::class, 'updateBanner'])->name('update_banner');
Route::delete('/banner/{id}', [BannersController::class, 'hapusBanner'])->name('hapus_banner');
Route::put('/banner/update-status/{id}', [BannersController::class, 'updateBannerStatus'])->name('banner.update-status');

Route::post('/simpan-text', [BannersController::class,'store']);

// ========================
// route KEPALA DESA
// ========================
Route::get('/kades', [KadesController::class, 'index'])->middleware('auth')->name('kades');
Route::post('/data-kepala-desa', [KadesController::class, 'store'])->name('kepala-desa.store');

// ========================
// route STATISTIK DESA
// ========================
Route::get('/data-statistik-desa', [StatistikDesaController::class, 'index'])->middleware('auth')->name('statistik-desa.index');
Route::post('/data-statistik-desa', [StatistikDesaController::class, 'store'])->name('statistik-desa.store');