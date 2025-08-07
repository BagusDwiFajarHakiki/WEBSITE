<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UMKMController extends Controller
{
    /**
     * Menampilkan semua data UMKM.
     *
     * @return \Illuminate\View\View
     */
    public function umkm()
    {
        // Mengambil semua data umkm dari database
        $umkms = umkm::all();

        // Mengirimkan data ke view
        return view('pages.UMKM.umkm', [
            'umkms' => $umkms,
        ]);
    }

    /**
     * Menyimpan data UMKM baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function simpan_umkm(Request $request)
    {
        // Validasi data yang masuk
        $validation = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_umkm' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kontak' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Mengunggah file jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('umkm', 'public');
            $validation['foto'] = $path;
        }

        // Membuat record baru di database
        umkm::create($validation);

        return redirect('/umkm')->with('success', 'UMKM berhasil ditambahkan.');
    }

    /**
     * Memperbarui data UMKM yang sudah ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_umkm(Request $request, $id)
    {
        // Validasi data yang masuk
        $validation = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_umkm' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kontak' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Temukan data UMKM yang akan diperbarui
        $umkm = umkm::findOrFail($id);

        // Jika ada file foto baru, unggah dan hapus foto lama
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($umkm->foto) {
                Storage::disk('public')->delete($umkm->foto);
            }
            $path = $request->file('foto')->store('umkm', 'public');
            $validation['foto'] = $path;
        }

        // Perbarui record di database
        $umkm->update($validation);

        return redirect('/umkm')->with('success', 'UMKM berhasil diupdate.');
    }

    /**
     * Menghapus data UMKM dan gambar terkait.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function hapus_umkm($id)
    {
        $umkm = umkm::findOrFail($id);
        
        // Hapus file gambar dari storage jika ada
        if ($umkm->foto) {
            Storage::disk('public')->delete($umkm->foto);
        }

        // Hapus data UMKM dari database
        $umkm->delete();

        return redirect('/umkm')->with('success', 'UMKM berhasil dihapus.');
    }
}
