<?php

namespace App\Http\Controllers;

use App\Models\KegiatanInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanInformasiController extends Controller
{
    public function index()
    {
        $kegiatans = KegiatanInformasi::paginate(5);
        return view('Informasi.admin.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('Informasi.admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName(); 
            $fotoPath = $file->storeAs('uploads/kegiatan_informasi', $fileName, 'public'); 
        }

        KegiatanInformasi::create([
            'nama' => $request->nama,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.kegiatan_informasi.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(KegiatanInformasi $kegiatan_informasi)
    {
        return view('Informasi.admin.kegiatan.edit', compact('kegiatan_informasi'));
    }

    public function update(Request $request, KegiatanInformasi $kegiatan_informasi)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            if ($kegiatan_informasi->foto) {
                Storage::disk('public')->delete($kegiatan_informasi->foto);
            }

            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $data['foto'] = $file->storeAs('uploads/kegiatan_informasi', $fileName, 'public');
        }

        $kegiatan_informasi->update($data);

        return redirect()->route('admin.kegiatan_informasi.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(KegiatanInformasi $kegiatan_informasi)
    {
        if ($kegiatan_informasi->foto) {
            Storage::disk('public')->delete($kegiatan_informasi->foto);
        }

        $kegiatan_informasi->delete();

        return redirect()->route('admin.kegiatan_informasi.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
