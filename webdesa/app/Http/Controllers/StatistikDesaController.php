<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatistikDesa;

class StatistikDesaController extends Controller
{
    /**
     * Menampilkan halaman dengan data statistik desa.
     */
    public function index()
    {
        // Ambil data statistik desa pertama (atau satu-satunya)
        $statistik = StatistikDesa::first();
        return view('pages.statistik.statistik', compact('statistik'));
    }

    /**
     * Menyimpan atau memperbarui data statistik desa.
     */
    public function store(Request $request)
    {
        $request->validate([
            'luas_wilayah' => 'nullable|numeric',
            'jumlah_dusun' => 'nullable|integer',
            'jumlah_penduduk' => 'nullable|integer',
            'jumlah_rt' => 'nullable|integer',
            'jumlah_rw' => 'nullable|integer',
            'mata_pencaharian_utama' => 'nullable|string|max:255',
        ]);

        // Cari data yang sudah ada atau buat yang baru jika belum ada
        $statistik = StatistikDesa::firstOrNew([]);
        $statistik->fill($request->all());
        $statistik->save();

        return redirect()->route('statistik-desa.index')->with('success', 'Data statistik desa berhasil diperbarui!');
    }
}
