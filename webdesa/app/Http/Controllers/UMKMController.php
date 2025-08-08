<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class UMKMController extends Controller
{
    public function index() : View
    {
        $umkm = umkm::latest()->paginate(6);
        return view('pages.UMKM.umkm', compact('umkm'));
    }

    public function create() : View
    {
        return view('pages.UMKM.umkm');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3048',
            'nama_umkm' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $gambar = $request->file('foto');
        $gambar->storeAs('umkm', $gambar->hashName());

        umkm::create([
            'foto'      => $gambar->hashName(),
            'nama_umkm' => $request->nama_umkm,
            'pemilik'   => $request->pemilik,
            'kontak'    => $request->kontak,
            'alamat'    => $request->alamat,
            'deskripsi' => $request->deskripsi,
        ]);

        return Redirect::route('umkm.index')->with('success', 'UMKM berhasil ditambahkan.');
    }

    public function edit($id) : View
    {
        $umkm = umkm::findOrFail($id);
        return view('pages.UMKM.umkm', compact('umkm'));
    }

    public function update(Request $request, $id) : RedirectResponse
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3048',
            'nama_umkm' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $umkm = umkm::findOrFail($id);
        if ($request->hasFile('foto')) {
            storage::delete('umkm/' . $umkm->foto);
            $gambar = $request->file('foto');
            $gambar->storeAs('umkm', $gambar->hashName());
            $umkm->foto = $gambar->hashName();

            $umkm->update([
                'foto' => $gambar->hashName(),
                'nama_umkm' => $request->nama_umkm,
                'pemilik' => $request->pemilik,
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi
            ]);

        }else {
            $umkm->update([
            'nama_umkm' => $request->nama_umkm,
            'pemilik' => $request->pemilik,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi
            ]);
        }

        return Redirect::route('umkm.index')->with('success', 'UMKM berhasil diperbarui.');
    }

    public function destroy($id) : RedirectResponse
    {
        $umkm = umkm::findOrFail($id);
        if ($umkm->foto) {
            Storage::delete('umkm/' . $umkm->foto);
        }
        $umkm->delete();

        return Redirect::route('umkm.index')->with('success', 'UMKM berhasil dihapus.');
    }
    
    public function updateStatus(Request $request, Umkm $umkm)
{
    $umkm->status = $request->status;
    $umkm->save();
    
    return response()->json(['message' => 'Status berhasil diperbarui!']);
}
}
