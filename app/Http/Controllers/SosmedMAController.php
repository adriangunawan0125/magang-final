<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosmed_ma;

class SosmedMAController extends Controller
{
    public function index()
    {
        $sosmed = Sosmed_ma::all(); 
        return view('MA.admin_ma.admin', compact('sosmed'));
    }
    public function ShowSosmedInMA()
    {
        $sosmed = Sosmed_ma::all(); 
        return view('MA.MA', compact('sosmed'));
    }
    public function edit()
    {
        $sosmed = Sosmed_ma::all();
        return view('MA.admin_ma.sosmed_ma.edit', compact('sosmed'));
    }

    public function update(Request $request)
{
    foreach ($request->id as $key => $id) {
        $sosmed = Sosmed_ma::find($id);

        // Update URL
        $sosmed->url = $request->url[$key];

        if ($request->hasFile("icon.$key")) {
            $file = $request->file("icon.$key");
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);

            if ($sosmed->name && file_exists(public_path('img/' . $sosmed->name))) {
                unlink(public_path('img/' . $sosmed->name));
            }
 
            $sosmed->name = $filename;
        }

        $sosmed->save();
    }

    return redirect()->route('sosmed.edit')->with('success', 'Sosial media berhasil diperbarui.');
}

}
