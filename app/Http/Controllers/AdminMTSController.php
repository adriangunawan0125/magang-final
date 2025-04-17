<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru_mts;
use App\Models\Sosmed_mts;
use App\Models\Kegiatan_mts;
use App\Models\Carousel_mts;

class AdminMTSController extends Controller
{
    public function index()
    {
        $guru = Guru_mts::all();
        $sosmed = Sosmed_mts::all();
        $kegiatans = Kegiatan_mts::all();
        $carousels_mts = Carousel_mts::all();

        return view('MTs.admin_mts.admin', compact('guru', 'sosmed', 'kegiatans', 'carousels_mts'));
    }
}