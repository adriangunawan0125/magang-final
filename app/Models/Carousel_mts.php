<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel_mts extends Model
{
    use HasFactory;
    protected $table = 'carousel_mts';
    protected $fillable = ['image'];
}
