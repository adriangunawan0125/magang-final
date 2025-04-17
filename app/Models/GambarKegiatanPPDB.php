<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarKegiatanPPDB extends Model
{
    use HasFactory;

    protected $table = 'gambar_kegiatan_p_p_d_b';

    protected $fillable = ['gambar'];
}

