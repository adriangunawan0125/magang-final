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
            $request->validate([
                'nama' => 'required|string|max:255',
                'sambutan' => 'required|string',
                'foto' => 'nullable|image|max:2048',
            ]);
        
            $sambutan = sambutan_ma::first(); // atau by ID jika multiple
            $sambutan->nama = $request->nama;
            $sambutan->sambutan = $request->sambutan;
        
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('sambutan_ma', $filename, 'public');
                $sambutan->foto = 'storage/' . $path;
            }
        
            $sambutan->save();
        
            return redirect()->route('admin.sambutan_ma.edit')->with('success', 'Sambutan berhasil diperbarui.');

        }
        
}
