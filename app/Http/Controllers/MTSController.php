<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru_mts;
use App\Models\Sosmed_mts;
use App\Models\KegiatanMts;
use App\Models\Carousel_mts;
use App\Models\sambutan_mts;
use App\Models\Berita;

class MTSController extends Controller
{
    public function index()
    {
        $sambutan_mts = sambutan_mts::first();
        $carousels_mts = Carousel_mts::all();
        $guru = Guru_mts::all(); 
        $sosmed = Sosmed_mts::all();
        $kegiatans = KegiatanMts::all();
        $berita = Berita::latest()->get();
        return view('MTs.MTs', compact('guru', 'sosmed', 'kegiatans', 'carousels_mts', 'sambutan_mts','berita'));
    }
}
