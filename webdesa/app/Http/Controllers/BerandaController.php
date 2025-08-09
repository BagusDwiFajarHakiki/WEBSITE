<?php

namespace App\Http\Controllers;

use App\Models\beranda;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class BerandaController extends Controller
{
    public function video_profil()
    {
        // Ambil satu video terakhir (atau first) untuk ditampilkan
        $video = beranda::latest()->first();

        return view('pages.beranda.video_profil', compact('video'));
    }

    public function tambah_video()
    {
        return view('pages.beranda.video_profil');
    }

    /**
     * Simpan video baru — sebelum simpan, hapus file & record lama agar hanya ada 1 video.
     */
    public function simpan_video(Request $request)
{
    // Pastikan PHP tidak menerima file di atas 20MB
    ini_set('upload_max_filesize', '25M');
    ini_set('post_max_size', '25M');

    $request->validate([
        'file_path' => 'required|mimes:mp4,mov,avi|max:25480', // 20MB = 20480KB
    ]);

    // Hapus video lama kalau ada
    $oldVideo = \App\Models\beranda::first();
    if ($oldVideo) {
        $oldPath = storage_path('app/public/' . $oldVideo->file_path);
        if (file_exists($oldPath)) {
            unlink($oldPath);
        }
        $oldVideo->delete();
    }

    // Simpan video baru
    $path = $request->file('file_path')->store('videos', 'public');

    \App\Models\beranda::create([
        'name' => $request->input('name', ''),
        'file_path' => $path,
        'is_main' => $request->has('is_main') ? 1 : 0,
    ]);

    return redirect()->route('video_profil')->with('success', 'Video berhasil diunggah.');
}

public function pengumuman()
    {
        $pengumuman = Pengumuman::latest()->get();
        return view('pages.beranda.pengumuman', compact('pengumuman'));
    }

    // Form tambah pengumuman
    public function tambah_pengumuman()
    {
        return view('pages.beranda.pengumuman.create');
    }

    // Simpan pengumuman
   public function simpanPengumuman(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'isi'   => 'required|string',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $pengumuman = new Pengumuman();
    $pengumuman->judul = $request->judul;
    $pengumuman->isi   = $request->isi;

    // Simpan gambar ke storage/app/public/pengumuman
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('pengumuman', 'public');
        $pengumuman->gambar = $path; // Simpan path relatif ke database
    }

    $pengumuman->save();

    return redirect()->back()->with('success', 'Pengumuman berhasil disimpan');
}

// Update pengumuman
public function updatePengumuman(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'isi'   => 'required|string',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $pengumuman = Pengumuman::findOrFail($id);
    $pengumuman->judul = $request->judul;
    $pengumuman->isi   = $request->isi;

    // Update gambar jika ada file baru
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama kalau ada
        if ($pengumuman->gambar && Storage::disk('public')->exists($pengumuman->gambar)) {
            Storage::disk('public')->delete($pengumuman->gambar);
        }

        $path = $request->file('gambar')->store('pengumuman', 'public');
        $pengumuman->gambar = $path;
    }

    $pengumuman->save();

    return redirect()->back()->with('success', 'Pengumuman berhasil diperbarui');
}

// Hapus pengumuman
public function hapusPengumuman($id)
{
    $pengumuman = Pengumuman::findOrFail($id);

    // Hapus gambar dari storage
    if ($pengumuman->gambar && Storage::disk('public')->exists($pengumuman->gambar)) {
        Storage::disk('public')->delete($pengumuman->gambar);
    }

    $pengumuman->delete();

    return redirect()->back()->with('success', 'Pengumuman berhasil dihapus');
}

}
