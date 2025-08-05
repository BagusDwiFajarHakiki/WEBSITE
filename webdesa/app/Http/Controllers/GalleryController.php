<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function lihat_gallery()
    {
        $lihat_gallery = \App\Models\gallery::all();

        return view('pages.gallery.lihat_gallery', [
            'lihat_gallery' => $lihat_gallery,
        ]);
    }

    public function tambah_gallery()
    {
        $tambah_gallery = \App\Models\gallery::all();

        return view('pages.gallery.tambah_gallery', [
            'tambah_gallery' => $tambah_gallery,
        ]);
    }
}
