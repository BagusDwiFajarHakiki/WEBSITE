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

    public function simpan_video(Request $request)
{
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:mp4,avi,mov|max:20480',
            'is_main' => 'nullable|boolean',
        ]);

        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('videos', 'public');

            \App\Models\beranda::create([
                'name' => $validated['name'],
                'file_path' => $path,
                'is_main' => $request->boolean('is_main'),
            ]);

            return redirect()->route('beranda.video_profil')->with('success', 'Video Profil berhasil ditambahkan.');
        } else {
            return redirect()->back()->withErrors(['file_path' => 'File video wajib diunggah.']);
        }
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['exception' => $e->getMessage()]);
    }
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

    
}
