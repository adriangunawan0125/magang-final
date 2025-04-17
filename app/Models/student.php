<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran'; 
    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'no_kk',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ayah',
        'nama_ibu',
        'email',
        'no_hp',
        'alamat',
        'sekolah_asal',
        'prestasi',
        'program_pilihan',
        'bukti_prestasi',
        'status_verifikasi'
    ];
}
