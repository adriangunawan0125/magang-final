@extends('Homepage.layout')

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-success navbar-light sticky-top px-0 py-3">
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

<style>
    body {
        font-family: "Poppins", sans-serif;
        background-color: #f4f4f4;
    }

    .form-container {
        max-width: 600px;
        margin: 50px auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    h2 {
        color: #333;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .btn-warning {
        background-color: #ffcc00;
        border: none;
        font-weight: bold;
        color: black;
    }

    .btn-warning:hover {
        background-color: #e6b800;
    }

    .btn-danger {
        font-weight: bold;
    }

    .alert-success {
        text-align: center;
        font-weight: 500;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="form-container">
        <h2 class="text-center">Edit Gambar</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.update-background') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Gambar Latar Belakang</label>
                <input type="file" name="background" class="form-control" required>
            </div>

            <div class="d-flex justify-content-center gap-3">
                <button type="submit" class="btn btn-warning px-4">Simpan</button>
                <a href="{{ url('/admin/dashboardPPDB') }}" class="btn btn-danger px-4">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
