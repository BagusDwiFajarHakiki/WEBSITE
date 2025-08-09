<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery; // pastikan huruf besar kecil sesuai nama model

class GalleryController extends Controller
{
    // GET: Menampilkan halaman gallery
    public function index()
    {
        $galleries = Gallery::all();
        return view('pages.gallery.gallery', [
            'galleries' => $galleries,
        ]);
    }

    // POST: Menyimpan data gallery
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan file gambar ke storage/app/public/gallery
        $path = $request->file('gambar')->store('gallery', 'public');

        // Simpan data ke database
        Gallery::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $path,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gallery berhasil ditambahkan!');
    }
}
