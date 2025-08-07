<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function umkm()
    {
        $umkm = umkm::all();

        return view('pages.UMKM.umkm', [
            'umkm' => $umkm,
        ]);
    }

    public function tambah_umkm()
    {
        return view('pages.UMKM.umkm');
    }

    public function simpan_umkm(Request $request)
    {
        $validation = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_umkm' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kontak' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        umkm::create($validation);

        return redirect('/umkm')->with('success', 'UMKM berhasil ditambahkan.');
    }

    public function edit_umkm($id)
    {
        $umkm = umkm::findOrFail($id);

        return view('pages.UMKM.umkm', [
            'umkm' => $umkm,
        ]);
    }

    public function update_umkm(Request $request, $id)
    {
        $validation = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_umkm' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kontak' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        umkm::findOrFail($id)->update($validation);

        return redirect('/umkm')->with('success', 'UMKM berhasil diupdate.');
    }

    
    public function hapus_umkm($id)
    {
        $umkm = umkm::findOrFail($id);
        $umkm->delete();

        return redirect('/umkm')->with('success', 'UMKM berhasil dihapus.');
    }

}
