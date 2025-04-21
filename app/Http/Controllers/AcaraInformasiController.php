<?php

namespace App\Http\Controllers;

use App\Models\AcaraInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcaraInformasiController extends Controller
{
    public function index()
    {
        $acaras = AcaraInformasi::paginate(5);
        return view('Informasi.admin.acara.index', compact('acaras'));
    }

    public function create()
    {
        return view('Informasi.admin.acara.create');
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
            $fotoPath = $file->storeAs('uploads/acara_informasi', $fileName, 'public'); 
        }

        AcaraInformasi::create([
            'nama' => $request->nama,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.acara_informasi.index')->with('success', 'Acara berhasil ditambahkan.');
    }

    public function edit(AcaraInformasi $acara_informasi)
    {
        return view('Informasi.admin.acara.edit', compact('acara_informasi'));
    }

    public function update(Request $request, AcaraInformasi $acara_informasi)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            if ($acara_informasi->foto) {
                Storage::disk('public')->delete($acara_informasi->foto);
            }

            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $data['foto'] = $file->storeAs('uploads/acara_informasi', $fileName, 'public');
        }

        $acara_informasi->update($data);

        return redirect()->route('admin.acara_informasi.index')->with('success', 'Acara berhasil diperbarui.');
    }

    public function destroy(AcaraInformasi $acara_informasi)
    {
        if ($acara_informasi->foto) {
            Storage::disk('public')->delete($acara_informasi->foto);
        }

        $acara_informasi->delete();

        return redirect()->route('admin.acara_informasi.index')->with('success', 'Acara berhasil dihapus.');
    }
}
