<?php

use App\Http\Controllers\ProfilController;
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
Route::put('/umkm/update-status/{umkm}', [UMKMController::class, 'updateStatus'])->name('umkm.update-status');

//ROUTE DATA PROFIL DESA
Route::resource('/profil', ProfilController::class);
Route::post('/simpan-profil-desa', [ProfilController::class,'store']);
Route::get('/ambil-profil-desa', [ProfilController::class,'show']);

//ROUTE PERANGKAT DESA
Route::get('/perangkat_desa', [ProfilController::class, 'indexs'])->name('perangkat.indexs');
Route::post('/perangkat_desa/struktur', [ProfilController::class, 'storeStruktur'])->name('perangkat.struktur.store');
Route::resource('/perangkat_desa/perangkat', ProfilController::class)->except([
    'create', 'show', 'edit'
]);
Route::post('/perangkat_desa/perangkat', [ProfilController::class, 'storePerangkat'])->name('perangkat.store');
Route::post('/perangkat_desa/update/{perangkat}', [ProfilController::class, 'updatePerangkat'])->name('perangkat.update');
Route::delete('/perangkat_desa/delete/{perangkat}', [ProfilController::class, 'destroyPerangkat'])->name('perangkat.destroy');

//ROUTE VIDEO PROFIL
Route::get('/video_profil', [App\Http\Controllers\BerandaController::class, 'video_profil'])->name('beranda.video_profil');
Route::get('/tambah_video', [App\Http\Controllers\BerandaController::class, 'tambah_video']);
Route::post('/simpan_video', [App\Http\Controllers\BerandaController::class, 'simpan_video'])->name('beranda.simpan_video');
Route::get('/video_profil', [App\Http\Controllers\BerandaController::class, 'video_profil'])->name('video_profil');
