<?php

namespace App\Http\Controllers;

use App\Models\AcaraInformasi;
use App\Models\InformasiGambar;
use App\Models\KegiatanInformasi;
use Illuminate\Http\Request;

class AdminInformasiController extends Controller
{

    public function index()
    {
        $acaraInformasi = AcaraInformasi::all();
        $kegiatanInformasi = KegiatanInformasi::all();
        $informasiGambar = InformasiGambar::first();

        return view('informasi.informasi', compact('acaraInformasi', 'kegiatanInformasi', 'informasiGambar'));
    }
}
