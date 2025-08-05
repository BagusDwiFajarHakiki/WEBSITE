<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/video_profil', [App\Http\Controllers\BerandaController::class, 'video_profil']);
Route::get('/pengumuman', [App\Http\Controllers\BerandaController::class, 'pengumuman']);

Route::get('/profil_desa', [App\Http\Controllers\ProfilController::class, 'profil_desa']);
Route::get('/sejarah_desa', [App\Http\Controllers\ProfilController::class, 'sejarah_desa']);
Route::get('/visi_misi', [App\Http\Controllers\ProfilController::class, 'visi_misi']);
Route::get('/perangkat_desa', [App\Http\Controllers\ProfilController::class, 'perangkat_desa']);
Route::get('/peta_desa', [App\Http\Controllers\ProfilController::class, 'peta_desa']);

Route::get('/profil_bumdes', [App\Http\Controllers\BumdesController::class, 'profil_bumdes']);
Route::get('/usaha_bumdes', [App\Http\Controllers\BumdesController::class, 'usaha_bumdes']);

Route::get('/daftar_umkm', [App\Http\Controllers\UmkmController::class, 'daftar_umkm']);
Route::get('/tambah_umkm', [App\Http\Controllers\UmkmController::class, 'tambah_umkm']);

Route::get('/daftar_kkn', [App\Http\Controllers\KknController::class, 'daftar_kkn']);
Route::get('/tambah_kkn', [App\Http\Controllers\KknController::class, 'tambah_kkn']);

Route::get('/lihat_gallery', [App\Http\Controllers\GalleryController::class, 'lihat_gallery']);
Route::get('/tambah_gallery', [App\Http\Controllers\GalleryController::class, 'tambah_gallery']);