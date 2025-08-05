<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function video_profil()
    {
        $video_profil = \App\Models\beranda::all();

        return view('pages.beranda.video_profil', [
            'Video_Profil' => $video_profil,
        ]);
    }

    public function pengumuman()
    {
        $pengumuman = \App\Models\beranda::all();

        return view('pages.beranda.pengumuman', [
            'pengumuman' => $pengumuman,
        ]);
    }
}
