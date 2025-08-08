<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
use Illuminate\View\View;

class ProfilController extends Controller
{
    public function index() : View
    {
        $data_desa = profil::latest()->paginate(6);
        return view('pages.profil.data_desa', compact('data_desa'));
    }
}
