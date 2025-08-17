<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\perangkat;
use App\Models\struktur;
use Illuminate\Support\Facades\Storage;

class PerangkatController extends Controller
{
    public function struktur()
    {
        $struktur = Struktur::first(); // Asumsi hanya ada satu entri struktur
        return view('pages.perangkat.struktur_desa', compact('struktur'));
    }

    public function storeStruktur(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Hapus gambar lama jika ada
        $oldStruktur = Struktur::first();
        if ($oldStruktur && $oldStruktur->gambar) {
            Storage::disk('public')->delete($oldStruktur->gambar);
            $oldStruktur->delete();
        }

        $path = $request->file('gambar')->store('struktur_desa', 'public');

        Struktur::create(['gambar' => $path]);

        return redirect()->route('struktur.struktur')->with('success', 'Struktur desa berhasil diunggah.');
    }

    /**
     * Simpan data perangkat desa baru.
     */
    public function perangkat()
    {
        $perangkats = Perangkat::all();
        return view('pages.perangkat.perangkat_desa', compact('perangkats'));
    }

    public function storePerangkat(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
        ]);

        $path = $request->file('foto')->store('perangkat_desa', 'public');

        Perangkat::create([
            'foto' => $path,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('perangkat.perangkat')->with('success', 'Perangkat desa berhasil ditambahkan.');
    }

    public function update(Request $request, Perangkat $perangkat)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($perangkat->foto);
            $path = $request->file('foto')->store('perangkat_desa', 'public');
            $data['foto'] = $path;
        }

        $perangkat->update($data);

        return redirect()->route('perangkat.perangkat')->with('success', 'Data perangkat desa berhasil diperbarui.');
    }

    public function destroy(Perangkat $perangkat)
    {
        Storage::disk('public')->delete($perangkat->foto);
        $perangkat->delete();

        return redirect()->route('perangkat.perangkat')->with('success', 'Data perangkat desa berhasil dihapus.');
    }
}