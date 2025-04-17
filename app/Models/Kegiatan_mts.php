<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan_mts extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_mts';
    protected $fillable = ['nama', 'foto'];
}
