<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel_ma extends Model
{
    use HasFactory;
    protected $table = 'carousel_ma';
    protected $fillable = ['image'];
}
