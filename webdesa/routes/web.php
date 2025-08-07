<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/video_profil', [App\Http\Controllers\BerandaController::class, 'video_profil']);
Route::get('/tambah_video', [App\Http\Controllers\BerandaController::class, 'tambah_video']);
Route::post('/simpan_video', [App\Http\Controllers\BerandaController::class, 'simpan_video'])->name('beranda.simpan_video');
Route::get('/tambah_foto', [App\Http\Controllers\BerandaController::class, 'tambah_foto']);
Route::post('/simpan_foto', [App\Http\Controllers\BerandaController::class, 'simpan_foto'])->name('beranda.simpan_foto');
Route::get('/tambah_slogan', [App\Http\Controllers\BerandaController::class, 'tambah_slogan']);
Route::post('/simpan_slogan', [App\Http\Controllers\BerandaController::class, 'simpan_slogan'])->name('beranda.simpan_slogan');
Route::put('/update_video/{id}', [App\Http\Controllers\BerandaController::class, 'update_video'])->name('beranda.update_video');
Route::put('/update_foto/{id}', [App\Http\Controllers\BerandaController::class, 'update_foto'])->name('beranda.update_foto');
Route::put('/update_slogan/{id}', [App\Http\Controllers\BerandaController::class, 'update_slogan'])->name('beranda.update_slogan');
Route::delete('/hapus_video/{id}', [App\Http\Controllers\BerandaController::class, 'hapus_video'])->name('beranda.hapus_video');
Route::delete('/hapus_foto/{id}', [App\Http\Controllers\BerandaController::class, 'hapus_foto'])->name('beranda.hapus_foto');
Route::delete('/hapus_slogan/{id}', [App\Http\Controllers\BerandaController::class, 'hapus_slogan'])->name('beranda.hapus_slogan');

Route::get('/pengumuman', [App\Http\Controllers\BerandaController::class, 'pengumuman']);

Route::get('/profil_desa', [App\Http\Controllers\ProfilController::class, 'profil_desa']);
Route::get('/sejarah_desa', [App\Http\Controllers\ProfilController::class, 'sejarah_desa']);
Route::get('/visi_misi', [App\Http\Controllers\ProfilController::class, 'visi_misi']);
Route::get('/perangkat_desa', [App\Http\Controllers\ProfilController::class, 'perangkat_desa']);
Route::get('/peta_desa', [App\Http\Controllers\ProfilController::class, 'peta_desa']);

Route::get('/profil_bumdes', [App\Http\Controllers\BumdesController::class, 'profil_bumdes']);
Route::get('/usaha_bumdes', [App\Http\Controllers\BumdesController::class, 'usaha_bumdes']);

Route::get('/umkm', [App\Http\Controllers\UmkmController::class, 'umkm']);
Route::get('/tambah_umkm', [App\Http\Controllers\UmkmController::class, 'tambah_umkm']);
Route::post('/simpan_umkm', [App\Http\Controllers\UmkmController::class, 'simpan_umkm']);
Route::get('/edit_umkm/{id}', [App\Http\Controllers\UmkmController::class, 'edit_umkm']);
Route::put('/update_umkm/{id}', [App\Http\Controllers\UmkmController::class, 'update_umkm']);
Route::delete('/hapus_umkm/{id}', [App\Http\Controllers\UmkmController::class, 'hapus_umkm']);

Route::get('/kkn', [App\Http\Controllers\KknController::class, 'kkn']);

Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'gallery']);