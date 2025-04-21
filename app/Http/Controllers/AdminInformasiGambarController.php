<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiGambar;
use Illuminate\Support\Facades\File;

class AdminInformasiGambarController extends Controller
{
    public function index()
    {
        $gambars = InformasiGambar::all();
        return view('Informasi.admin.ubahgambar.index', compact('gambars'));
    }

    public function create()
    {
        return view('Informasi.admin.ubahgambar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar_depan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_latar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambarBaru = new InformasiGambar();

        if ($request->hasFile('gambar_depan')) {
            $fileName1 = time() . '_depan.' . $request->gambar_depan->extension();
            $request->gambar_depan->move(public_path('img'), $fileName1);
            $gambarBaru->gambar_depan = $fileName1;
        }

        if ($request->hasFile('gambar_latar')) {
            $fileName2 = time() . '_latar.' . $request->gambar_latar->extension();
            $request->gambar_latar->move(public_path('img'), $fileName2);
            $gambarBaru->gambar_latar = $fileName2;
        }

        $gambarBaru->save();

        return redirect()->route('admin.informasi.edit', $gambarBaru->id)->with('success', 'Gambar baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $gambar = InformasiGambar::findOrFail($id);
        return view('Informasi.admin.ubahgambar.edit', compact('gambar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar_depan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_latar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambar = InformasiGambar::findOrFail($id);

        if ($request->hasFile('gambar_depan')) {
            // Hapus file lama
            File::delete(public_path('img/' . $gambar->gambar_depan));

            $fileName1 = time() . '_depan.' . $request->gambar_depan->extension();
            $request->gambar_depan->move(public_path('img'), $fileName1);
            $gambar->gambar_depan = $fileName1;
        }

        if ($request->hasFile('gambar_latar')) {
            // Hapus file lama
            File::delete(public_path('img/' . $gambar->gambar_latar));

            $fileName2 = time() . '_latar.' . $request->gambar_latar->extension();
            $request->gambar_latar->move(public_path('img'), $fileName2);
            $gambar->gambar_latar = $fileName2;
        }

        $gambar->save();

        return redirect()->route('admin.informasi.index')->with('success', 'Gambar berhasil diperbarui');
    }

    public function destroy($id)
    {
        $gambar = InformasiGambar::findOrFail($id);

        // Hapus file dari folder public/img
        if ($gambar->gambar_depan) {
            File::delete(public_path('img/' . $gambar->gambar_depan));
        }

        if ($gambar->gambar_latar) {
            File::delete(public_path('img/' . $gambar->gambar_latar));
        }

        $gambar->delete();

        return redirect()->route('admin.informasi.index')->with('success', 'Gambar berhasil dihapus');
    }
}
