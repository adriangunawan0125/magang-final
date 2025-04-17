<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Sosmed_ma;
use App\Models\Kegiatan_ma;
use App\Models\Carousel_ma;
use App\Models\sambutan_ma;

class MAController extends Controller
{
    public function index()
    {
        $sambutan = sambutan_ma::first();
        $carousels = Carousel_ma::all();
        $guru = Guru::all(); 
        $sosmed = Sosmed_ma::all();
        $kegiatans = Kegiatan_ma::all();

        return view('MA.MA', compact('guru', 'sosmed', 'kegiatans', 'carousels', 'sambutan'));
    }
}
