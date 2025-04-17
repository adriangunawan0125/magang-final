<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GambarMenuPPDB;
use Illuminate\Support\Facades\Storage;

class GambarMenuPPDBController extends Controller
{
    public function index()
    {
        $gambar = GambarMenuPPDB::first();
        return view('admin.adminPPDB.ubah-background', compact('gambar'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'background' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar = GambarMenuPPDB::first();
        if (!$gambar) {
            $gambar = new GambarMenuPPDB();
        }

        if ($request->hasFile('background')) {

            $bgName = time() . '_bg.' . $request->background->extension();
            $request->background->move(public_path('uploads'), $bgName);
            $gambar->background = 'uploads/' . $bgName;
        }

        $gambar->save();

        return redirect()->route('admin.adminPPDB.ubah-background')->with('success', 'Background berhasil diperbarui!');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}
