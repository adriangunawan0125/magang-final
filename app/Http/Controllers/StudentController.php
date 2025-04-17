<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = Student::paginate(5); 
        return view('students.index', compact('students'));
    }
    

    public function adminIndex(Request $request)
    {
        $query = Student::query();

        // Filter berdasarkan nama
        if ($request->filled('search')) {
            $query->where('nama_lengkap', 'LIKE', '%' . $request->search . '%');
        }

        // Filter berdasarkan rentang tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Filter berdasarkan tahun
        if ($request->filled('year')) {
            $query->whereYear('created_at', $request->year);
        }

        $students = $query->paginate(10)->appends($request->query()); // Untuk menjaga filter saat pindah halaman

        // Jika request berasal dari AJAX, kirim data sebagai JSON
        if ($request->ajax()) {
            return response()->json([
                'students' => view('students.table', compact('students'))->render()
            ]);
        }

        // Ambil daftar tahun yang tersedia di database (tanpa duplikat)
        $years = Student::select(DB::raw('YEAR(created_at) as year'))
                        ->distinct()
                        ->orderBy('year', 'desc')
                        ->pluck('year');

        return view('students.index', compact('students', 'years'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|string|size:10',
            'nama_lengkap' => 'required|string|max:255',
            'no_kk' => 'required|string|size:16',
            'nik' => 'required|string|size:16',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|regex:/^08[0-9]{8,13}$/',
            'alamat' => 'required|string|max:500',
            'sekolah_asal' => 'required|string|max:255',
            'prestasi' => 'nullable|string|max:500',
            'program_pilihan' => 'required|in:MA,MTS',
            'bukti_prestasi' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        if ($request->hasFile('bukti_prestasi')) {
            $file = $request->file('bukti_prestasi');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/bukti_prestasi', $fileName, 'public');
            $validated['bukti_prestasi'] = $filePath;
        }

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Data berhasil ditambahkan!');
    }

   
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

   
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'nisn' => 'required|string|size:10',
            'nama_lengkap' => 'required|string|max:255',
            'no_kk' => 'required|string|size:16',
            'nik' => 'required|string|size:16',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|regex:/^08[0-9]{8,13}$/',
            'alamat' => 'required|string|max:500',
            'sekolah_asal' => 'required|string|max:255',
            'prestasi' => 'nullable|string|max:500',
            'program_pilihan' => 'required|in:MA,MTS',
            'bukti_prestasi' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        if ($request->hasFile('bukti_prestasi')) {
            $file = $request->file('bukti_prestasi');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/bukti_prestasi', $fileName, 'public');
            $validated['bukti_prestasi'] = $filePath;

            if ($student->bukti_prestasi && Storage::disk('public')->exists($student->bukti_prestasi)) {
                Storage::disk('public')->delete($student->bukti_prestasi);
            }
        }

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    
        if (Student::count() > 0) {
            \DB::statement("SET @count = 0;");
            \DB::statement("UPDATE students SET id = @count := @count + 1;");
            
            // Ambil ID terbesar saat ini dan set ulang auto-increment
            $lastId = \DB::table('students')->max('id'); 
            $newAutoIncrement = $lastId ? $lastId + 1 : 1; 
            \DB::statement("ALTER TABLE students AUTO_INCREMENT = $newAutoIncrement;");
        } else {
            // Jika tabel kosong, reset ke 1
            \DB::statement("ALTER TABLE students AUTO_INCREMENT = 1;");
        }
    
        return redirect()->route('students.index')->with('success', 'Data berhasil dihapus dan ID diperbarui!');
    }
    

 
}


