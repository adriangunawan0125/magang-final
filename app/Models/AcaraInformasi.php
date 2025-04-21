<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcaraInformasi extends Model
{
    use HasFactory;
    
    protected $table = 'acara_informasi'; // Nama tabel di database
    protected $fillable = ['nama', 'foto'];
}
