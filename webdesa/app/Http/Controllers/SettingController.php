<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function uploadLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            
            // Simpan file ke dalam folder 'logos' di storage/app
            $path = $logo->storeAs('logos', $filename);
            
            // Perbarui path logo di database dengan nama file saja
            $setting = Setting::firstOrCreate([]);
            $setting->logo_path = $filename; // Simpan hanya nama filenya
            $setting->save();

            return redirect()->back()->with('success', 'Logo desa berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah logo.');
    }
}