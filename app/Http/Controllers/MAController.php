<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Sosmed_ma;
use App\Models\Kegiatan_ma;
use App\Models\Carousel_ma;
use App\Models\sambutan_ma;
use App\Models\Berita; 


class MAController extends Controller
{
   
    public function index()
    {
        $sambutan = sambutan_ma::first();
        $carousels_ma = Carousel_ma::all();
        $guru = Guru::all(); 
        $sosmed = Sosmed_ma::all();
        $kegiatans = Kegiatan_ma::all();
<<<<<<< HEAD
        $berita = Berita::latest()->get(); // <-- tambahkan ini
    
        return view('MA.MA', compact('guru', 'sosmed', 'kegiatans', 'carousels', 'sambutan', 'berita'));
=======

        return view('MA.MA', compact('guru', 'sosmed', 'kegiatans', 'carousels_ma', 'sambutan'));
>>>>>>> d5edc109fd6c9b56241f842177d397a2a7cac4f5
    }
    
}
