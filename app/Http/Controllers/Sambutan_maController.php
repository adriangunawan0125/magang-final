<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sambutan_ma;

class Sambutan_maController extends Controller
{
    // menampilkan 
    public function index()
    {
        $sambutan = sambutan_ma::first(); 

        if (!$sambutan) {
        return view('MA.MA')->with('error', 'Data sambutan belum tersedia');
    }

        return view('MA.MA', compact('sambutan'));
    }

        // edit
    public function edit()
    {
        $sambutan = sambutan_ma::first();
        return view('MA.admin_ma.sambutan.edit_sambutan', compact('sambutan'));
    }

        // update sambutan
    public function update(Request $request)
    {
        $sambutan = sambutan_ma::first();

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

        return redirect()->route('ma.index')->with('success', 'Sambutan berhasil diperbarui!');
    }
}
