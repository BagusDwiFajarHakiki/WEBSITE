<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
    {
        $gallery = \App\Models\gallery::all();

        return view('pages.gallery.gallery', [
            'gallery' => $gallery,
        ]);
    }
}
