<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
use App\Models\perangkat;
use App\Models\struktur;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index() : View
    {
        $profil = profil::latest()->paginate(3);
        return view('pages.profil.data_desa', compact('profil'));
    }
    
    public function show()
    {
        $profil = Profil::first(); // Ambil data pertama dari tabel
        return response()->json($profil);
    }

    public function store(Request $request)
    {
        $profil = Profil::first();
        if ($profil) {
            $profil->update($request->all());
        } else {
            Profil::create($request->all());
        }
        return response()->json(['message' => 'Data berhasil disimpan.']);
    }

    public function indexs()
    {
        $struktur = struktur::first(); // Ambil satu data struktur
        $perangkats = perangkat::all(); // Ambil semua data perangkat desa
        return view('pages.profil.perangkat_desa', compact('struktur', 'perangkats'));
    }

    /**
     * Simpan gambar struktur desa.
     */
    public function storeStruktur(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Cek jika sudah ada gambar sebelumnya, hapus terlebih dahulu
        $oldStruktur = struktur::first();
        if ($oldStruktur) {
            Storage::disk('public')->delete($oldStruktur->gambar);
            $oldStruktur->delete();
        }

        // Simpan gambar baru
        $path = $request->file('gambar')->store('profil', 'public');
        struktur::create(['gambar' => $path]);

        return back()->with('success', 'Gambar struktur desa berhasil diunggah.');
    }

    /**
     * Simpan data perangkat desa baru.
     */
    public function storePerangkat(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);

        // Simpan foto
        $path = $request->file('foto')->store('profil', 'public');

        perangkat::create([
            'foto' => $path,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
        ]);

        return back()->with('success', 'Data perangkat desa berhasil ditambahkan.');
    }

    /**
     * Hapus data perangkat desa.
     */
    public function destroyPerangkat(perangkat $perangkat)
    {
        Storage::disk('public')->delete($perangkat->foto);
        $perangkat->delete();

        return back()->with('success', 'Data perangkat desa berhasil dihapus.');
    }

    /**
     * Update data perangkat desa.
     */
    public function updatePerangkat(Request $request, perangkat $perangkat)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika ada foto baru diunggah, hapus foto lama dan simpan yang baru
        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($perangkat->foto);
            $path = $request->file('foto')->store('profil', 'public');
            $perangkat->update(['foto' => $path]);
        }

        $perangkat->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
        ]);

        return back()->with('success', 'Data perangkat desa berhasil diubah.');
    }
}
