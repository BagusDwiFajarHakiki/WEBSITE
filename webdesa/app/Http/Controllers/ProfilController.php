<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function sejarah() : View
    {
        $sejarah = profil::latest();
        return view('pages.profil.sejarah_desa', compact('sejarah'));
    }
    
    public function show()
    {
        $sejarah = Profil::first(); // Ambil data pertama dari tabel
        return response()->json($sejarah);
    }

    public function store(Request $request)
    {
        $sejarah = Profil::first();
        if ($sejarah) {
            $sejarah->update($request->all());
        } else {
            Profil::create($request->all());
        }
        return response()->json(['message' => 'Data berhasil disimpan.']);
    }

    public function visi_misi() : View
    {
        $visi_misi = profil::latest();
        return view('pages.profil.visi_misi', compact('visi_misi'));
    }
    
    public function showvm()
    {
        $visi_misi = Profil::first(); // Ambil data pertama dari tabel
        return response()->json($visi_misi);
    }

    public function storevm(Request $request)
    {
        $visi_misi = Profil::first();
        if ($visi_misi) {
            $visi_misi->update($request->all());
        } else {
            Profil::create($request->all());
        }
        return response()->json(['message' => 'Data berhasil disimpan.']);
    }
}
