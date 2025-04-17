<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Student::all([

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
            'status_verifikasi',
        ]); 
    }
    

    public function headings(): array
    {
        return [
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
        'status_verifikasi'];
    }
}
