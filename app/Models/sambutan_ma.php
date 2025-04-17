<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sambutan_ma extends Model
{
    use HasFactory;

    protected $table = 'sambutan_ma';
    protected $fillable = ['foto', 'nama', 'sambutan'];
}

