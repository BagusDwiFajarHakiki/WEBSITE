<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function umkm()
    {
        $umkm = \App\Models\umkm::all();

        return view('pages.UMKM.umkm', [
            'umkm' => $umkm,
        ]);
    }

}
