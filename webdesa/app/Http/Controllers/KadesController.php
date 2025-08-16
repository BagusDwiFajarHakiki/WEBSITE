<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kades;
use Illuminate\Support\Facades\File;

class KadesController extends Controller
{
    /**
     * Menampilkan halaman dengan data kepala desa.
     */
    public function index()
    {
        // Ambil data kepala desa pertama (atau satu-satunya)
        $kepalaDesa = kades::first();
        return view('pages.beranda.kades', compact('kepalaDesa'));
    }

    /**
     * Menyimpan atau memperbarui data kepala desa.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3048', // Validasi gambar
        ]);

        // Cari data yang sudah ada atau buat yang baru
        $kepalaDesa = kades::firstOrNew([]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kepalaDesa->gambar) {
                File::delete(public_path('storage/kepala-desa/' . $kepalaDesa->gambar));
            }

            // Simpan gambar baru
            $gambarName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('storage/kepala-desa'), $gambarName);
            $kepalaDesa->gambar = $gambarName;
        }

        // Perbarui data lainnya
        $kepalaDesa->nama = $request->nama;
        $kepalaDesa->jabatan = $request->jabatan;
        $kepalaDesa->save();

        return redirect()->route('kades')->with('success', 'Data kepala desa berhasil diperbarui!');
    }
}
