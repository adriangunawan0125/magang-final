<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiGambar extends Model
{
    protected $table = 'informasi_gambar';

    protected $fillable = [
        'gambar_depan',
        'gambar_latar',
    ];
}
