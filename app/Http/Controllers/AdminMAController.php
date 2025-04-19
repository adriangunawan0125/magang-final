<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Sosmed_ma;
use App\Models\Kegiatan_ma;
use App\Models\Carousel_ma;
use App\Models\sambutan_ma;

class AdminMAController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        $sosmed = Sosmed_ma::all();
        $kegiatans = Kegiatan_ma::all();
        $carousels = Carousel_ma::all();
        $sambutan = sambutan_ma::first();

        return view('MA.admin_ma.admin', compact('guru', 'sosmed', 'kegiatans', 'carousels','sambutan'));
    }
}