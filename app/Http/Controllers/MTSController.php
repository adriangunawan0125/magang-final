<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru_mts;
use App\Models\Sosmed_mts;
use App\Models\Kegiatan_mts;
use App\Models\Carousel_mts;
use App\Models\sambutan_mts;

class MTSController extends Controller
{
    public function index()
    {
        $sambutan = sambutan_mts::first();
        $carousels_mts = Carousel_mts::all();
        $guru = Guru_mts::all(); 
        $sosmed = Sosmed_mts::all();
        $kegiatans = Kegiatan_mts::all();

        return view('MTs.MTs', compact('guru', 'sosmed', 'kegiatans', 'carousels_mts', 'sambutan'));
    }
}
