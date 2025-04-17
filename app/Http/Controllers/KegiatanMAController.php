<?php

namespace App\Http\Controllers;
use App\Models\Kegiatan_ma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class KegiatanMAController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan_ma::paginate(5);
        return view('MA.admin_ma.kegiatan_ma.index', compact('kegiatans'));
    }
    
    public function create()
    {
        return view('MA.admin_ma.kegiatan_ma.create');
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
        Kegiatan_ma::create([
            'nama' => $request->nama,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('kegiatan_ma.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

 
    public function show(Kegiatan_ma $kegiatan_ma)
    {
        //
    }

 
    public function edit(Kegiatan_ma $kegiatan_ma)
    {
        return view('MA.admin_ma.kegiatan_ma.edit', compact('kegiatan_ma'));
    }


    public function update(Request $request, Kegiatan_ma $kegiatan_ma)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            if ($kegiatan_ma->foto) {
                Storage::disk('public')->delete($kegiatan_ma->foto);
            }
            
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $data['foto'] = $file->storeAs('uploads/kegiatan_ma', $fileName, 'public');
        }
        
        $kegiatan_ma->update($data);

        return redirect()->route('kegiatan_ma.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

   
    public function destroy(Kegiatan_ma $kegiatan_ma)
    {
        if ($kegiatan_ma->foto) {
            Storage::disk('public')->delete($kegiatan_ma->foto);
        }
        $kegiatan_ma->delete();

        return redirect()->route('kegiatan_ma.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
