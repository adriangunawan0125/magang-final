<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GambarKegiatanPPDB;


class HomepageController extends Controller
{
    // public function index()
    // {
    //     return view('Homepage.index');
    // }

    public function index()
    {
        $gambarKegiatan = GambarKegiatanPPDB::all();
        return view('Homepage.index', compact('gambarKegiatan'));
    }
    
}
