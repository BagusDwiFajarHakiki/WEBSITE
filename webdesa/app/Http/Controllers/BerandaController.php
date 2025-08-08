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
public function simpan_video(Request $request)
{
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:mp4,avi,mov|max:20480',
            'is_main' => 'nullable|boolean',
        ]);

        // Cek apakah sudah ada video lama
        $oldVideo = \App\Models\beranda::first();
        if ($oldVideo) {
            // Hapus file lama
            if (\Storage::disk('public')->exists($oldVideo->file_path)) {
                \Storage::disk('public')->delete($oldVideo->file_path);
            }
            // Hapus record lama di database
            $oldVideo->delete();
        }

        // Simpan file baru
        $path = $request->file('file_path')->store('videos', 'public');

        // Simpan ke database
        \App\Models\beranda::create([
            'name' => $validated['name'],
            'file_path' => $path,
            'is_main' => $request->boolean('is_main'),
        ]);

        return redirect()->route('video_profil')
                         ->with('success', 'Video Profil berhasil diperbarui.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['exception' => $e->getMessage()]);
    }
}



}
