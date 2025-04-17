<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed_ma extends Model
{
    use HasFactory;

    protected $table = 'sosmed_ma'; 
    protected $fillable = ['name', 'url'];
}
