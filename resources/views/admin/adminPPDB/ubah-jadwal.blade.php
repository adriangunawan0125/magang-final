@extends('Homepage.layout')

@section('content')
<style>
    .bg-snav {
        background-color: #00583A !important;
    }

    .navbar-nav .nav-link.active {
        color: #ffcc00 !important;
    }

    .navbar-nav .nav-link:hover {
        color: #ffcc00 !important;
    }
</style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-snav navbar-light sticky-top px-0 py-3">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active ms-5 text-light fw-semibold" href="{{ url('/admin/dashboardPPDB#jadwal') }}">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active ms-5 text-light fw-semibold" href="#pilihan">Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active ms-5 text-light fw-semibold" href="{{ url('/admin/students') }}">Data PPDB</a>
                </li>
            </ul>
            <a href="{{ url('/admin/dashboardPPDB') }}">
                <button type="button" class="btn btn-info fw-bold me-5 text-light">PPDB</button>
            </a>
        </div>
    </div>
</nav>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6">
        <h2 class="text-center fw-bold mb-4 text-dark">Edit Gambar Jadwal</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="card shadow p-4">
            <form action="{{ route('admin.jadwal.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Upload Gambar Jadwal</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>
                
                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-warning fw-bold px-4">Update</button>
                    <a href="{{ url('/admin/dashboardPPDB') }}" class="btn btn-danger fw-bold px-4">Kembali</a>
                </div>
            </form>
        </div>

        {{-- <h5 class="text-center mt-4">Preview Gambar Saat Ini:</h5>
        <div class="text-center mt-2">
            @if($gambar)
                <img src="{{ asset('storage/' . $gambar->gambar) }}" class="img-fluid rounded shadow" width="300">
            @else
                <p class="text-muted">Belum ada gambar.</p>
            @endif
        </div> --}}
    </div>
</div>
@endsection
