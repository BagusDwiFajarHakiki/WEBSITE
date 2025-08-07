<?php

namespace App\Http\Controllers;

use App\Models\beranda;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function video_profil()
    {
        $video_profil = \App\Models\beranda::all();

        return view('pages.beranda.video_profil', [
            'video_profil' => $video_profil,
        ]);
    }

    public function tambah_video()
    {
        return view('pages.beranda.video_profil');
    }

    public function tambah_foto()
    {
        return view('pages.beranda.video_profil');
    }

    public function tambah_slogan()
    {
        return view('pages.beranda.video_profil');
    }

    public function simpan_video(Request $request)
{
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:mp4,avi,mov|max:20480', // 20MB max
            'is_main' => 'boolean',
        ]);

        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('videos', 'public');
        } else {
            return redirect()->back()->with('error', 'File video tidak ditemukan.');
        }

        \App\Models\beranda::create([
            'name' => $validated['name'],
            'file_path' => $path,
            'is_main' => $request->boolean('is_main', false),
        ]);

        return redirect()->route('beranda.video_profil')->with('success', 'Video Profil berhasil ditambahkan.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    public function simpan_foto(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'file_path' => 'required|image|mimes:jpg,jpeg,png|max:2048', // 2MB max
            'is_main' => 'boolean',
        ]);

        beranda::create($request->validated());

        return redirect()->route('beranda.video_profil')->with('success', 'Foto profil berhasil ditambahkan.');
    }

    public function simpan_slogan(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|string|max:500',
            'is_main' => 'boolean',
        ]);

        beranda::create($request->validated());

        return redirect()->route('beranda.video_profil')->with('success', 'Slogan Profil berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $beranda = \App\Models\beranda::findOrFail($id);
        return view('pages.beranda.edit', compact('beranda'));
    }

    public function update_video(Request $request, $id)
    {
        $beranda = \App\Models\beranda::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:mp4,avi,mov|max:20480', // 20MB max
            'is_main' => 'boolean',
        ]);

        $beranda->update($validated);

        return redirect()->route('beranda.video_profil')->with('success', 'Data berhasil diperbarui.');
    }

    public function update_foto(Request $request, $id)
    {
        $beranda = \App\Models\beranda::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'file_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // 2MB max
            'is_main' => 'boolean',
        ]);

        $beranda->update($validated);

        return redirect()->route('beranda.video_profil')->with('success', 'Data berhasil diperbarui.');
    }

    public function update_slogan(Request $request, $id)
    {
        $beranda = \App\Models\beranda::findOrFail($id);
        $validated = $request->validate([   
            'text' => 'required|string|max:500',
            'is_main' => 'boolean',
        ]);

        $beranda->update($validated);

        return redirect()->route('beranda.video_profil')->with('success', 'Data berhasil diperbarui.');
    }

    public function hapus_video($id)
    {
        $beranda = \App\Models\beranda::findOrFail($id);
        $beranda->delete();

        return redirect()->route('beranda.video_profil')->with('success', 'Video Profil berhasil dihapus.');
    }

    public function hapus_foto($id)
    {
        $beranda = \App\Models\beranda::findOrFail($id);
        $beranda->delete();

        return redirect()->route('beranda.video_profil')->with('success', 'Foto Profil berhasil dihapus.');
    }

    public function hapus_slogan($id)
    {
        $beranda = \App\Models\beranda::findOrFail($id);
        $beranda->delete();

        return redirect()->route('beranda.video_profil')->with('success', 'Slogan Profil berhasil dihapus.');
    }

    public function pengumuman()
    {
        $pengumuman = \App\Models\beranda::all();

        return view('pages.beranda.pengumuman', [
            'pengumuman' => $pengumuman,
        ]);
    }
}
