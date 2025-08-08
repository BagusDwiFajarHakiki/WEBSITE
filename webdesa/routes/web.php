<?php

use App\Http\Controllers\UMKMController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', function () {
    return view('pages.dashboard');
});

// ROUTE UMKM
route::resource('/umkm', UMKMController::class);
Route::put('/umkm/update-status/{umkm}', [UmkmController::class, 'updateStatus'])->name('umkm.update-status');

Route::get('/video_profil', [App\Http\Controllers\BerandaController::class, 'video_profil'])->name('beranda.video_profil');

Route::get('/tambah_video', [App\Http\Controllers\BerandaController::class, 'tambah_video']);
Route::post('/simpan_video', [App\Http\Controllers\BerandaController::class, 'simpan_video'])->name('beranda.simpan_video');
Route::get('/tambah_foto', [App\Http\Controllers\BerandaController::class, 'tambah_foto']);
Route::post('/simpan_foto', [App\Http\Controllers\BerandaController::class, 'simpan_foto'])->name('beranda.simpan_foto');
Route::get('/tambah_slogan', [App\Http\Controllers\BerandaController::class, 'tambah_slogan']);
Route::post('/simpan_slogan', [App\Http\Controllers\BerandaController::class, 'simpan_slogan'])->name('beranda.simpan_slogan');
Route::put('/update_video/{id}', [App\Http\Controllers\BerandaController::class, 'update_video'])->name('beranda.update_video');
Route::put('/update_foto/{id}', [App\Http\Controllers\BerandaController::class, 'update_foto'])->name('beranda.update_foto');
Route::put('/update_slogan/{id}', [App\Http\Controllers\BerandaController::class, 'update_slogan'])->name('beranda.update_slogan');