<?php
namespace App\Http\Controllers;

use App\Models\GambarKegiatanPPDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarKegiatanPPDBController extends Controller
{
    public function index()
    {
        $gambarKegiatan = GambarKegiatanPPDB::all();
        return view('admin.adminPPDB.AdminPPDB', compact('gambarKegiatan'));
    }

    public function create()
    {
        return view('admin.adminPPDB.createGambarKegiatan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $gambarPath = $request->file('gambar')->store('kegiatan', 'public');

        GambarKegiatanPPDB::create(['gambar' => $gambarPath]);

        return redirect()->route('admin.dashboardPPDB')->with('success', 'Gambar kegiatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $gambarKegiatan = GambarKegiatanPPDB::findOrFail($id);
        return view('admin.adminPPDB.editgambarPPDB', compact('gambarKegiatan'));
    }

    public function update(Request $request, $id)
    {
        $gambarKegiatan = GambarKegiatanPPDB::findOrFail($id);

        if ($request->hasFile('gambar')) {
            Storage::delete('public/' . $gambarKegiatan->gambar);
            $gambarPath = $request->file('gambar')->store('kegiatan', 'public');
            $gambarKegiatan->update(['gambar' => $gambarPath]);
        }

        return redirect()->route('admin.dashboardPPDB')->with('success', 'Gambar kegiatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $gambarKegiatan = GambarKegiatanPPDB::findOrFail($id);
        Storage::delete('public/' . $gambarKegiatan->gambar);
        $gambarKegiatan->delete();
        return redirect()->route('admin.dashboardPPDB')->with('success', 'Gambar kegiatan berhasil dihapus!');
    }
}

