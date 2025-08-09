<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery; // pastikan modelnya ada
use Illuminate\Support\Facades\Storage;


class GalleryController extends Controller
{
    // Tampilkan data gallery
    public function index()
    {
        $gallery = gallery::all();
        return view('pages.gallery.gallery', compact('gallery'));
    }

    // Simpan data gallery
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'isi' => 'required|string'
        ]);

        // Upload gambar
        $path = $request->file('gambar')->store('gallery', 'public');

        gallery::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $path
        ]);

        return redirect()->route('gallery.index')->with('success', 'Data gallery berhasil ditambahkan');
    }

    // Hapus data gallery
    public function destroy($id)
    {
        $gallery = gallery::findOrFail($id);
        if ($gallery->gambar) {
            Storage::disk('public')->delete($gallery->gambar);
        }
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Data gallery berhasil dihapus');           
    }
}
