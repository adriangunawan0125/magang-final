<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan_ma extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_ma';
    protected $fillable = ['nama', 'foto'];
}
