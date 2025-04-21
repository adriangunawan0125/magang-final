<?php

namespace App\Http\Controllers;

use App\Models\Profilevm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilevmController extends Controller
{
    public function index()
    {
        $profile = Profilevm::first(); 
        return view('profile.admin.ubahprofile.index', compact('profile'));
    }

    public function edit()
    {
        $profile = Profilevm::first();
        return view('profile.admin.ubahprofile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile = Profilevm::first();

        if ($request->hasFile('background_image')) {
            if ($profile->background_image) {
                Storage::delete('public/' . $profile->background_image);
            }

            $path = $request->file('background_image')->store('profile', 'public');
            $profile->background_image = $path;
        }

        $profile->visi = $request->visi;
        $profile->misi = $request->misi;
        $profile->save();

        return redirect()->route('admin.profile_visimisi.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}
