<?php

namespace App\Http\Controllers;
use App\Models\KegiatanMts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class KegiatanMTSController extends Controller
{
    public function index()
    {
        $kegiatans = KegiatanMts::paginate(5);
        return view('MTs.admin_mts.kegiatan_mts.index', compact('kegiatans'));
    }
    
    public function create()
    {
        return view('MTs.admin_mts.kegiatan_mts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName(); 
            $fotoPath = $file->storeAs('uploads/kegiatan_ma', $fileName, 'public'); 
        }
        KegiatanMts::create([
            'nama' => $request->nama,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.kegiatan_mts.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

 
    public function show(KegiatanMts $kegiatan_mts)
    {
        //
    }

 
    public function edit(KegiatanMts $kegiatan_mts)
    {
        return view('MTs.admin_mts.kegiatan_mts.edit', compact('kegiatan_mts'));
    }


    public function update(Request $request, KegiatanMts $kegiatan_mts)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            if ($kegiatan_mts->foto) {
                Storage::disk('public')->delete($kegiatan_mts->foto);
            }
            
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $data['foto'] = $file->storeAs('uploads/kegiatan_ma', $fileName, 'public');
        }
        
        $kegiatan_mts->update($data);

        return redirect()->route('admin.kegiatan_mts.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

   
    public function destroy(KegiatanMts $kegiatan_mts)
    {
        if ($kegiatan_mts->foto) {
            Storage::disk('public')->delete($kegiatan_mts->foto);
        }
        $kegiatan_mts->delete();

        return redirect()->route('admin.kegiatan_mts.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
    
}
