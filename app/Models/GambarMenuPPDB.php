<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarMenuPPDB extends Model
{
    use HasFactory;

    protected $table = 'gambar_menu_ppdb';
    protected $fillable = ['background'];
}
