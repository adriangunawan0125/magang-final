<?php

namespace App\Http\Controllers;

use App\Models\KegiatanWebPPDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanWebPPDBController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanWebPPDB::all();
        return view('admin.adminPPDB.kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('admin.adminPPDB.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $fotoPath = $request->file('foto')->store('kegiatan', 'public');

        KegiatanWebPPDB::create([
            'nama' => $request->nama,
            'foto' => $fotoPath
        ]);

        return redirect()->route('admin.kegiatan_ppdb.index')->with('success', 'Data kegiatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kegiatan = KegiatanWebPPDB::findOrFail($id);
        return view('admin.adminPPDB.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = KegiatanWebPPDB::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            Storage::delete('public/' . $kegiatan->foto);
            $fotoPath = $request->file('foto')->store('kegiatan', 'public');
            $data['foto'] = $fotoPath;
        }

        $kegiatan->update($data);

        return redirect()->route('admin.kegiatan_ppdb.index')->with('success', 'Data kegiatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kegiatan = KegiatanWebPPDB::findOrFail($id);
        Storage::delete('public/' . $kegiatan->foto);
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan_ppdb.index')->with('success', 'Data kegiatan berhasil dihapus!');
    }
}
