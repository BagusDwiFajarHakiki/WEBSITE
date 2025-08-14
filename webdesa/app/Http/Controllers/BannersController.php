<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banners;
use App\Models\text_banners;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    public function banners()
    {
        $banner = banners::latest()->get();
        return view('pages.beranda.banner', compact('banner'));
    }

    // Form tambah pengumuman
    public function tambahBanner()
    {
        return view('pages.beranda.banner.create');
    }

    // Simpan pengumuman
   public function simpanBanner(Request $request)
{
    $request->validate([
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $banner = new banners();

    // Simpan gambar ke storage/app/public/pengumuman
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('banner', 'public');
        $banner->gambar = $path; // Simpan path relatif ke database
    }

    $banner->save();

    return redirect()->back()->with('success', 'Banner berhasil disimpan');
}

// Update pengumuman
public function updateBanner(Request $request, $id)
{
    $request->validate([
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $banner = banners::findOrFail($id);

    // Update gambar jika ada file baru
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama kalau ada
        if ($banner->gambar && Storage::disk('public')->exists($banner->gambar)) {
            Storage::disk('public')->delete($banner->gambar);
        }

        $path = $request->file('gambar')->store('banner', 'public');
        $banner->gambar = $path;
    }

    $banner->save();

    return redirect()->back()->with('success', 'Banner berhasil diperbarui');
}

// Hapus pengumuman
public function hapusBanner($id)
{
    $banner = banners::findOrFail($id);

    // Hapus gambar dari storage
    if ($banner->gambar && Storage::disk('public')->exists($banner->gambar)) {
        Storage::disk('public')->delete($banner->gambar);
    }

    $banner->delete();

    return redirect()->back()->with('success', 'Banner berhasil dihapus');
}

// Update status banner
public function updateBannerStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|boolean',
        ]);

        $banner = banners::findOrFail($id);
        $banner->status = $validated['status'];
        $banner->save();

        return response()->json(['message' => 'Status banner berhasil diperbarui.']);
    }

// Ambil teks banner
public function show()
    {
        $textBanner = text_banners::first(); // Ambil data pertama dari tabel
        return response()->json($textBanner);
    }

// Simpan teks banner
public function store(Request $request)
    {
        $textBanner = text_banners::first();
        if ($textBanner) {
            $textBanner->update($request->all());
        } else {
            text_banners::create($request->all());
        }
        return response()->json(['message' => 'Data berhasil disimpan.']);
    }

}
