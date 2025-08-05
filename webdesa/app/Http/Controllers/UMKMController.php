<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function daftar_umkm()
    {
        $daftar_umkm = \App\Models\umkm::all();

        return view('pages.UMKM.daftar_umkm', [
            'daftar_umkm' => $daftar_umkm,
        ]);
    }

    public function tambah_umkm()
    {
        $tambah_umkm = \App\Models\umkm::all();

        return view('pages.UMKM.tambah_umkm', [
            'tambah_umkm' => $tambah_umkm,
        ]);
    }

}
