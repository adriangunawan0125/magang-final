<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed_mts extends Model
{
    use HasFactory;

    protected $table = 'sosmed_mts'; 
    protected $fillable = ['name', 'url'];
}
