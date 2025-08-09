<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
use Illuminate\View\View;

class ProfilController extends Controller
{
    public function index() : View
    {
        $profil = profil::latest()->paginate(6);
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
}
