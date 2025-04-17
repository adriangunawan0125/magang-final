<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sambutan_mts extends Model
{
    use HasFactory;

    protected $table = 'sambutan_mts';
    protected $fillable = ['foto', 'nama', 'sambutan'];
}

