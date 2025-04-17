@extends('admin.adminPPDB.layout')

@section('content')
<style>
    .navbar-custom {
        background-color: #005e2e;
    }
    .nav-link:hover {
        color: yellow !important;
    }
    .ppdb-button {
        background-color: yellow;
        color: black !important;
        font-weight: bold;
        border-radius: 5px;
        padding: 5px 15px;
    }
</style>
{{-- navbar --}}
<nav class="navbar navbar-expand-lg navbar-custom mb-3 py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fa-solid fa-door-open" style="color:  #ffc107"></i>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item fw-bold ms-5">
                    <a class="nav-link  text-light" href="{{url('admin/dashboardPPDB')}}">JADWAL</a>
                </li>
                <li class=" ms-5 nav-item fw-bold">
                    <a class="nav-link text-light" href="#">PROGRAM</a>
                </li>
                {{-- <li class="nav-item dropdown"> 
                    <a class="nav-link dropdown-toggle ms-5 fw-bold text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">PROGRAM PILIHAN</a>
                    <ul class="dropdown-menu ms-5" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item fw-bold" href="{{url('/profil#profile-section')}}">MTS</a></li>
                        <li><a class="dropdown-item fw-bold" href="{{url('/profil#sejarah-section')}}">MA</a></li>
                    </ul>
                </li>  --}}
                <li class=" ms-5 nav-item fw-bold">
                    <a class="nav-link active text-light" href="#">DATA PPDB</a>
                </li>
            </ul>
            <a href="{{url('/admin/dashboardPPDB')}}" class="btn btn-info fw-bold text-light">PPDB</a>
        </div>
    </div>
</nav>
{{-- PPDB --}}
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold text-dark">DAFTAR PPDB</h1>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger fw-bold">LOG OUT</button>
        </form>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover">
            <thead class="bg-success text-white">
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Program Pilihan</th>
                    <th>Status Verifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->nisn }}</td>
                        <td>{{ $student->nama_lengkap }}</td>
                        <td>{{ $student->program_pilihan }}</td>
                        <td><span class="badge bg-{{ $student->status_verifikasi == 'Terverifikasi' ? 'success' : 'warning' }}">{{ $student->status_verifikasi }}</span></td>
                        <td>
                            <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-sm btn-primary">Lihat Detail</a>
                            <form action="{{ route('admin.students.verify', $student->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Verifikasi</button>
                            </form>
                            <a href="{{ route('admin.students.download', $student->id) }}" class="btn btn-sm btn-info">Lihat Prestasi</a>
                            <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('export.excel') }}" class="btn btn-success fw-bold">Export Excel</a>
    </div>
    
    <div class="d-flex justify-content-center mt-3">
        {{ $students->links() }}
    </div>
</div>
@endsection
