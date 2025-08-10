<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bumdes;

class BUMDesController extends Controller
{
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

}
