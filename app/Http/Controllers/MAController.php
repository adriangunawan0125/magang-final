<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Sosmed_ma;
use App\Models\Kegiatan_ma;
use App\Models\Carousel_ma;
use App\Models\Sambutan_ma;
use App\Models\Berita; 

class MAController extends Controller
{
    public function index()
    {
        $sambutan_ma = Sambutan_ma::first();
        $carousels_ma = Carousel_ma::all(); // pastikan konsisten pakai $carousels
        $guru = Guru::all(); 
        $sosmed = Sosmed_ma::all();
        $kegiatans = Kegiatan_ma::all();
        $berita = Berita::latest()->get(); // berita ditambahkan



        return view('MA.MA', compact('guru', 'sosmed', 'kegiatans', 'carousels_ma', 'sambutan_ma', 'berita'));
    }
}
