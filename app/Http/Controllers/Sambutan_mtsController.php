<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sambutan_mts;

class Sambutan_mtsController extends Controller
{
    // menampilkan 
    public function index()
    {
        $sambutan = sambutan_mts::first(); 

        if (!$sambutan) {
        return view('MTs.MTs')->with('error', 'Data sambutan belum tersedia');
    }

        return view('MTs.MTs', compact('sambutan'));
    }

        // edit
    public function edit()
    {
        $sambutan = sambutan_mts::first();
        return view('MTs.admin_mts.sambutan_mts.edit_sambutan', compact('sambutan'));
    }

        // update sambutan
    public function update(Request $request)
    {
        $sambutan = sambutan_mts::first();

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required',
            'sambutan' => 'required'
        ]);

        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('img'), $imageName);
            $sambutan->foto = 'img/'.$imageName;
        }

        $sambutan->nama = $request->nama;
        $sambutan->sambutan = $request->sambutan;
        $sambutan->save();

        return redirect()->route('mts.index')->with('success', 'Sambutan berhasil diperbarui!');
    }
}
