<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil_desa()
    {
        $profil_desa = \App\Models\profil::all();

        return view('pages.profil.profil_desa', [
            'profil_desa' => $profil_desa,
        ]);
    }

    public function sejarah_desa()
    {
        $sejarah_desa = \App\Models\profil::all();

        return view('pages.profil.sejarah_desa', [
            'sejarah_desa' => $sejarah_desa,
        ]);
    }

    public function visi_misi()
    {
        $visi_misi = \App\Models\profil::all();

        return view('pages.profil.visi_misi', [
            'visi_misi' => $visi_misi,
        ]);
    }

    public function perangkat_desa()
    {
        $perangkat_desa = \App\Models\profil::all();

        return view('pages.profil.perangkat_desa', [
            'perangkat_desa' => $perangkat_desa,
        ]);
    }

    public function peta_desa()
    {
        $peta_desa = \App\Models\profil::all();

        return view('pages.profil.peta_desa', [
            'peta_desa' => $peta_desa,
        ]);
    }
}
