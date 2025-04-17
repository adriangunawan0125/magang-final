<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru_mts;
use Illuminate\Support\Facades\File;


class GuruMTSController extends Controller
{

    public function create()
    {
        return view('MTs.admin_mts.guru_mts.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            if (!$file->isValid()) {
                return back()->withErrors(['foto' => 'File upload gagal, coba unggah lagi.'])->withInput();
            }
        
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move( public_path ('uploads/guru'), $filename);
        } else {
            $filename = null;
        }
        

        // Simpan data ke database
        Guru_mts::create([
            'nama' => $request->nama,
            'mapel' => $request->mapel,
            'foto' => $filename,
        ]);
        
        // Redirect ke index dengan pesan sukses
        return redirect()->route('guru_mts.index')->with('success', 'Data guru berhasil ditambahkan!');

    }

    public function index()
    {
        $guru = Guru_mts::paginate(5);
        return view('MTs.admin_mts.guru_mts.index', compact('guru'));
    }
    

    // menampilkan di user
    public function showGuruInMA()
    {
        $guru = Guru_mts::all(); 
        return view('MTs.MTs', compact('guru'));
        
    }

    // edit guru
    public function edit($id)
    {
        $guru = Guru_mts::findOrFail($id);
        return view('MTs.admin_mts.guru_mts.edit', compact('guru'));
    }

    // update guru
    public function update(Request $request, $id)
    {
        $guru = Guru_mts::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Jika ada file baru, upload dan ganti foto lama
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/guru/'), $filename);

            // Hapus foto lama jika ada
            if ($guru->foto) {
                $oldFilePath = public_path('uploads/guru/' . $guru->foto);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }

            // Simpan nama file baru ke database
            $guru->foto = $filename;
        }

        // Update data guru
        $guru->update([
            'nama' => $request->nama,
            'mapel' => $request->mapel,
            'foto' => $guru->foto
        ]);
        
        return redirect()->route('guru_mts.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    
    public function destroy($id)
    {
        $guru = Guru_mts::findOrFail($id);

        // Hapus foto jika ada
        if ($guru->foto) {
            $fotoPath = public_path('uploads/guru/' . $guru->foto);
            if (File::exists($fotoPath)) {
                File::delete($fotoPath);
            }
        }

        // Hapus data guru dari database
        $guru->delete();

        return redirect()->route('guru_mts.index')->with('success', 'Data guru berhasil dihapus!');
    }
}
