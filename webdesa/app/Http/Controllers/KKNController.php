<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KKNController extends Controller
{
    public function daftar_kkn()
    {
        $daftar_kkn = \App\Models\kkn::all();

        return view('pages.KKN.daftar_kkn', [
            'daftar_kkn' => $daftar_kkn,
        ]);
    }

    public function tambah_kkn()
    {
        $tambah_kkn = \App\Models\kkn::all();

        return view('pages.KKN.tambah_kkn', [
            'tambah_kkn' => $tambah_kkn,
        ]);
    }
}
