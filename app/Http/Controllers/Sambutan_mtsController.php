<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sambutan_mts;

class Sambutan_mtsController extends Controller
{
    // Menampilkan sambutan
    public function index()
    {
        $sambutan = sambutan_mts::first(); // Ambil data sambutan pertama

        if (!$sambutan) {
            return view('MTs.MTs')->with('error', 'Data sambutan belum tersedia');
        }

        // Pastikan variabel yang dikirim konsisten
        return view('MTs.MTs', compact('sambutan'));
    }

    // Edit sambutan
    public function edit()
    {
        $sambutan = sambutan_mts::first(); // Ambil data sambutan pertama
        return view('MTs.admin_mts.sambutan_mts.edit_sambutan', compact('sambutan'));
    }

    // Update sambutan
    public function update(Request $request)
    {
        $sambutan = sambutan_mts::first(); // Ambil data sambutan pertama

        // Validasi input
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required',
            'sambutan' => 'required'
        ]);

        // Jika ada file foto, upload dan simpan
        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('img'), $imageName);
            $sambutan->foto = 'img/'.$imageName;
        }

        // Update data sambutan
        $sambutan->nama = $request->nama;
        $sambutan->sambutan = $request->sambutan;
        $sambutan->save();

        return redirect()->route('admin.sambutan_mts.edit')->with('success', 'Sambutan berhasil diperbarui!');
    }
}
