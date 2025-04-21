<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanInformasi extends Model
{
    use HasFactory;
    protected $table = 'kegiatan_informasi';
    protected $fillable = ['nama', 'foto'];
}
