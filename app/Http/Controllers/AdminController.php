<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function index()
    {
        $students = Student::paginate(5);
        return view('admin.adminPPDB.students', compact('students'));
    }
  

    public function show($id)
    {
        $students = Student::findOrFail($id); 
        return view('admin.adminPPDB.show', compact('students'));
    }


 
    public function verify(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update(['status_verifikasi' => 'Sudah Diverifikasi']); 

        return redirect()->route('admin.students.index')->with('success', 'Pendaftar berhasil diverifikasi.');
    }

  
    public function downloadPrestasi($id)
    {
        $student = Student::findOrFail($id);

        if ($student->bukti_prestasi && Storage::disk('public')->exists($student->bukti_prestasi)) {
            return response()->download(storage_path('app/public/' . $student->bukti_prestasi));
        }

        return redirect()->route('admin.students.index')->with('error', 'File prestasi tidak ditemukan.');
    }

  
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

      
        if ($student->bukti_prestasi && Storage::disk('public')->exists($student->bukti_prestasi)) {
            Storage::disk('public')->delete($student->bukti_prestasi);
        }

        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Data pendaftar berhasil dihapus.');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->intended(route('admin.students.index'))->with('success', 'Berhasil login.');
        }
        

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Berhasil logout.');
    }

 
  
}

