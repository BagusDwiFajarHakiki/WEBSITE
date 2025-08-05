<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BUMDesController extends Controller
{
    public function profil_bumdes()
    {
        $profil_bumdes = \App\Models\bumdes::all();

        return view('pages.BUMDes.profil_bumdes', [
            'profil_bumdes' => $profil_bumdes,
        ]);
    }

    public function usaha_bumdes()
    {
        $usaha_bumdes = \App\Models\bumdes::all();

        return view('pages.BUMDes.usaha_bumdes', [
            'usaha_bumdes' => $usaha_bumdes,
        ]);
    }
}
