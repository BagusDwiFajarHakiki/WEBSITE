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
//ROUTE BERANDA
Route::post('/simpan_video', [App\Http\Controllers\BerandaController::class, 'simpan_video'])->name('beranda.simpan_video');
Route::get('/video_profil', [App\Http\Controllers\BerandaController::class, 'video_profil'])->name('video_profil');
