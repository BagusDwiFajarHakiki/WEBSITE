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


    public function update(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string',
        ]);

        // Ambil record pertama atau bikin baru kalau belum ada
        $bumdes = Bumdes::first();
        if (!$bumdes) {
            $bumdes = new Bumdes();
        }

        $bumdes->deskripsi = $request->deskripsi;
        $bumdes->save();

        return redirect()->back()->with('success', 'Deskripsi BUMDes berhasil diperbarui.');
    }
}
