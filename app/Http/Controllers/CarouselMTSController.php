<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel_mts;

class CarouselMTSController extends Controller
{
    public function index()
    {
        $carousels_mts = Carousel_mts::all();
        return view('MTs.admin_mts.carousel_mts.index', compact('carousels_mts'));
    }

    public function create()
    {
        return view('MTs.admin_mts.carousel_mts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2048 KB = 2MB
            ], [
                'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB!',
            ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/carousel'), $imageName);

        Carousel_mts::create([
            'image' => $imageName,
        ]);

        return redirect()->route('admin.carousel_mts.index')->with('success', 'Gambar berhasil diunggah!');
    }


    public function showCarousel()
    {
        $carousels_mts = Carousel_mts::all();
        return view('carousel_mts.index', compact('carousels'));
    }


    public function edit(string $id)
    {
        $carousel = Carousel_mts::findOrFail($id);
        return view('MTs.admin_mts.carousel_mts.edit', compact('carousel'));
    }

    public function update(Request $request, string $id)
    {
        $carousel = Carousel_mts::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/carousel'), $imageName);
            $carousel->image = $imageName;
        }

        $carousel->save();

        return redirect()->route('admin.carousel_mts.index')->with('success', 'Gambar berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $carousel = Carousel_mts::findOrFail($id);
        $carousel->delete();
        return redirect()->route('admin.carousel_mts.index')->with('success', 'Carousel berhasil dihapus.');
    }
}
