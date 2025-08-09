<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UMKMController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', function () {
    return view('pages.dashboard');
});

// ROUTE UMKM
route::resource('/umkm', UMKMController::class);
Route::put('/umkm/update-status/{umkm}', [UmkmController::class, 'updateStatus'])->name('umkm.update-status');

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

//ROUTEBERANDA
Route::get('/video_profil', [App\Http\Controllers\BerandaController::class, 'video_profil'])->name('beranda.video_profil');

Route::get('/tambah_video', [App\Http\Controllers\BerandaController::class, 'tambah_video']);
Route::post('/simpan_video', [App\Http\Controllers\BerandaController::class, 'simpan_video'])->name('beranda.simpan_video');
Route::get('/video_profil', [App\Http\Controllers\BerandaController::class, 'video_profil'])->name('video_profil');