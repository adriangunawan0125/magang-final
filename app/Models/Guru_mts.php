<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru_mts extends Model
{
    use HasFactory;

    protected $table = 'guru_mts';

    protected $fillable = ['nama', 'mapel', 'foto'];
}
