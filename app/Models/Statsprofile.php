<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statsprofile extends Model
{
    use HasFactory;

    protected $table = 'statsprofile';  
    protected $fillable = [
        'peserta_didik', 
        'rombel', 
        'guru_tenaga_kependidikan'
    ];
}
