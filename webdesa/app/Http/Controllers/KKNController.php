<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KKNController extends Controller
{
    public function kkn()
    {
        $kkn = \App\Models\kkn::all();

        return view('pages.KKN.kkn', [
            'kkn' => $kkn,
        ]);
    }
}
