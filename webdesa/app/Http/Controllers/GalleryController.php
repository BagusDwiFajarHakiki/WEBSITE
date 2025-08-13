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

    public function edit($id)
{
    $item = Gallery::findOrFail($id);
    return view('pages.gallery.edit', compact('item'));
}



    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gallery = Gallery::findOrFail($id);
        $gallery->judul = $request->judul;
        $gallery->isi = $request->isi;

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($gallery->gambar) {
                Storage::delete($gallery->gambar);
            }
            $gallery->gambar = $request->file('gambar')->store('gallery');
        }

        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Data berhasil diperbarui.');
    }


}
