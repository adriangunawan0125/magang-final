<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanWebPPDB extends Model
{
    use HasFactory;

    protected $table = 'kegiatanwebppdb'; 

    protected $fillable = ['nama', 'foto'];
}
