<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bumdes;
use App\Models\ListBumdes; // model usaha bumdes

class BUMDesController extends Controller
{
    // ========================
    // PROFIL BUMDES
    // ========================
    public function index()
    {
        return view('pages.BUMDes.profil_bumdes');
    }

    public function show()
    {
        $bumdes = Bumdes::first();
        return response()->json($bumdes);
    }

    public function update(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string',
        ]);

        $bumdes = Bumdes::first() ?? new Bumdes();
        $bumdes->deskripsi = $request->deskripsi;
        $bumdes->save();

        return response()->json(['success' => true, 'message' => 'Deskripsi BUMDes berhasil diperbarui']);
    }

    // ========================
    // USAHA BUMDES (ListBumdes)
    // ========================

    public function usahaIndex()
    {
        $list = ListBumdes::all();
        return view('pages.BUMDes.usaha_bumdes', compact('list'));
    }

    public function usahaStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('bumdes', 'public');
        }

        ListBumdes::create([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'fotopath' => $fotoPath,
        ]);

        return redirect()->back()->with('success', 'Usaha BUMDes berhasil ditambahkan.');
    }

    public function usahaUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $usaha = ListBumdes::findOrFail($id);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('bumdes', 'public');
            $usaha->fotopath = $fotoPath;
        }

        $usaha->name = $request->name;
        $usaha->deskripsi = $request->deskripsi;
        $usaha->save();

        return redirect()->back()->with('success', 'Usaha BUMDes berhasil diperbarui.');
    }

    public function usahaDestroy($id)
    {
        $usaha = ListBumdes::findOrFail($id);
        $usaha->delete();
        return redirect()->back()->with('success', 'Usaha BUMDes berhasil dihapus.');
    }
}
