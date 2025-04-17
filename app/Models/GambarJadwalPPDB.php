<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarJadwalPPDB extends Model
{
    use HasFactory;

    protected $table = 'gambar_jadwal_ppdb';
    protected $fillable = ['gambar'];
}
