@extends('Homepage.layout')

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top bg-success navbar-light px-0 py-3 link-success">
    <div class="container-fluid">
        {{-- <img src="{{ asset('asset/logo_nufi.png') }}" class="ms-4" alt="Nurul Firdaus" width="60"> --}}
        <a href="{{ url('/admin/dashboardPPDB') }}" class="text-white" style="font-size: 24px; text-decoration: none;">
          <img src="{{asset('asset/icon-pintu.png')}}" style="width: 30px;" class="ms-5" alt="">
      </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item text-light">
                    <a class="nav-link active ms-5 text-light" style="font-weight: 750 !important" aria-current="page" href="{{url('/admin/dashboardPPDB#jadwal')}}">Jadwal</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link active ms-5 text-light" aria-current="page" style="font-weight: 750 !important" href="#pilihan">Program</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link active ms-5 fw-bold text-light " aria-current="page" style="font-weight: 750 !important" href="{{ url('/admin/students') }}">Data PPDB</a>
                </li>
            </ul>
  
                    <a href="{{ url('/admin/dashboardPPDB') }}"><button type="button" class="fw-bold btn btn-info me-5 text-light">PPDB</button></a>
        </div>
    </div>
  </nav>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6">
        <h2 class="text-center text-dark fw-bold mb-4">Ubah Gambar</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow p-4">
            <form action="{{ route('admin.gambarKegiatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Gambar Latar Belakang</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-warning fw-bold px-4">Simpan</button>
                    <a href="/Homepage" class="btn btn-danger fw-bold px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
