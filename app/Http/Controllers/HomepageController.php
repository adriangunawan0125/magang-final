<?php

namespace App\Http\Controllers;

use App\Models\GambarMenuPPDB;
use Illuminate\Http\Request;
use App\Models\KegiatanWebPPDB;


class HomepageController extends Controller
{
    // public function index()
    // {
    //     return view('Homepage.index');
    // }

    // public function index()
    // {
    //     $gambarKegiatan = GambarKegiatanPPDB::all();
    //     return view('Homepage.index', compact('gambarKegiatan'));
    // }
    
    public function index()

{
    $gambar = GambarMenuPPDB::first();
    $kegiatan = KegiatanWebPPDB::all();
    return view('Homepage.index', compact('kegiatan'));
}

}
