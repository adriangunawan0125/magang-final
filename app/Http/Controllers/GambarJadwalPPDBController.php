<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GambarJadwalPPDB;
use Illuminate\Support\Facades\Storage;

class GambarJadwalPPDBController extends Controller
{
    public function edit()
    {
        $gambar = GambarJadwalPPDB::latest()->first();
        return view('admin.adminPPDB.ubah-jadwal', compact('gambar'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambar = GambarJadwalPPDB::latest()->first();
        
        // Hapus gambar lama jika ada
        if ($gambar && $gambar->gambar) {
            Storage::delete('public/' . $gambar->gambar);
        }

        // Simpan gambar baru
        $path = $request->file('gambar')->store('jadwal', 'public');

        if ($gambar) {
            $gambar->update(['gambar' => $path]);
        } else {
            GambarJadwalPPDB::create(['gambar' => $path]);
        }

        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui.');
    }
}
