@extends('admin.adminPPDB.layout')

@section('content')
<style>
    .bg-footer {
    background-color: #00583a;
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

<!-- Navbar -->
<nav class="navbar bg-footer navbar-expand-lg sticky-top px-0 py-3">
    <div class="container-fluid">
        {{-- <img src="{{ asset('asset/logo_nufi.png') }}" class="ms-4" alt="Nurul Firdaus" width="60"> --}}
        <div class="d-flex align-items-center">
          @if(Auth::check())
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-inline"
          onsubmit="confirmLogout(); return false;">
          @csrf
          <button type="submit" class="btn logout-btn" title="Logout">
          <i class="bi bi-box-arrow-left fs-5" style="color: #F4DC00;"></i>
          </button>
        </form>
      @endif
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item fw-bold ms-5">
                    <a class="nav-link  text-light" href="{{url('admin/dashboardPPDB#jadwal')}}">JADWAL</a>
                </li>
                <li class=" ms-5 nav-item fw-bold">
                    <a class="nav-link text-light" href="{{url('admin/dashboardPPDB#pilihan')}}">PROGRAM</a>
                </li>
               
            </ul>
  
            <a href="{{ url('/admin/dashboardPPDB') }}"><button type="button" class="fw-bold btn btn-info me-5 text-light">PPDB</button></a>
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
        {{-- <a href="{{ route('admin.export.excel') }}" class="btn btn-success fw-bold">Export Excel</a> --}}
    </div>
    
    <div class="d-flex justify-content-center mt-3">
        {{ $students->links() }}
    </div>
</div>
@endsection
