<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel_ma;

class CarouselMAController extends Controller
{
    public function index()
    {
        $carousels_ma = Carousel_ma::all();
        return view('MA.admin_ma.carousel_ma.index', compact('carousels_ma'));
    }

    public function create()
    {
        return view('MA.admin_ma.carousel_ma.create');
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

        Carousel_ma::create([
            'image' => $imageName,
        ]);

        return redirect()->route('admin.carousel_ma.index')->with('success', 'Gambar berhasil diunggah!');
    }


    public function showCarousel()
    {
        $carousels_ma = Carousel_ma::all();
        return view('carousel_ma.index', compact('carousels'));
    }


    public function edit(string $id)
    {
        $carousel = Carousel_ma::findOrFail($id);
        return view('MA.admin_ma.carousel_ma.edit', compact('carousel'));
    }

    public function update(Request $request, string $id)
    {
        $carousel = Carousel_ma::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/carousel'), $imageName);
            $carousel->image = $imageName;
        }

        $carousel->save();

        return redirect()->route('admin.carousel_ma.index')->with('success', 'Gambar berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $carousel = Carousel_ma::findOrFail($id);
        $carousel->delete();
        return redirect()->route('admin.carousel_ma.index')->with('success', 'Carousel berhasil dihapus.');
    }
}
