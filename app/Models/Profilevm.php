<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profilevm extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = ['visi', 'misi', 'background_image'];
}

