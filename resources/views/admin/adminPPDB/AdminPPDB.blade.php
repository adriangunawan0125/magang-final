@extends('Homepage.layout')
@section('content')
<link href="{{ asset('css/style_admin_ma.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/style_admin_ma.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
  .custom-rounded {
    border-radius: 15px;
  }


  .bg-footer {
    background-color: #00583a;
  }

    .navbar-nav .nav-link:hover {
  color: white !important; 
}
  .bg-gradient{ 
  color: green !important; 
}
.kegiatan-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.kegiatan {
    text-align: center;
}

.circle {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #ddd; 
}

.circle img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.edit-btn, .delete-btn {
    margin-top: 10px;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.edit-btn {
    background-color: #ffc107;
    color: black;
}

.delete-btn {
    background-color: #dc3545;
    color: white;
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
              <li class="nav-item text-light">
                  <a class="nav-link active ms-5 text-light" style="font-weight: 750 !important" aria-current="page" href="{{url('/admin/home')}}">Beranda</a>
              </li>
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

                  <a href="{{ url('/admin/students') }}"><button type="button" class="fw-bold btn btn-info me-5 text-light">PPDB</button></a>
      </div>
  </div>
</nav>

<!-- Menu PPDB -->
@php
    $gambar = App\Models\GambarMenuPPDB::first();
@endphp
<section id="dashboard" class="text-white text-center pt-0 py-2"
    style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
    url('{{ asset($gambar->background ?? 'asset/default-bg.jpg') }}') no-repeat center center; 
    background-size: cover;">
    <div class="container pt-5">
        <img src="{{ asset('asset/logo_nufi.png') }}" alt="Logo" class="mb-5 pt-5" style="width: 80px;">

        <div class="d-flex flex-column align-items-center mt-5 mb-5">
            <a href="{{ url('/admin/ubah-background') }}" class="btn fw-bold btn-warning text-dark btn-lg w-25 custom-rounded mb-5">
                Ubah Gambar
            </a>
        </div>
    </div>
</section>

{{-- data-aos="fade-up" --}}
<!-- Jadwal -->
<section id="jadwal" class="bg-white text-center py-5">
  <div class="container">
    <h3 class="fw-bold text-success me-2 mb-5">JADWAL PENDAFTARAN</h3>
    <div class="d-flex flex-column align-items-center mt-5 mb-5">
      <a href="{{ url('/admin/ubah-jadwal') }}" class="btn fw-bold btn-warning btn-lg w-25 custom-rounded mt-5 mb-4">
          Ubah Gambar Info
      </a>
  </div>
  </div>
</section>

<!-- MTS dan MA -->
<section  id="pilihan" class=" bg-footer text-white text-center py-5 mt-5 mb-1" >
  <div class="container">
    <h2 class="fw-bold mb-5">PROGRAM PILIHAN</h2>
    <div class="row justify-content-center">
      <div class="col-md-4 mb-3">
        <a href="{{ url('/admin/admin_mts') }}" class="text-decoration-none">
          <div class="bg-warning text-success fw-bold d-flex align-items-center justify-content-center"
            style="font-size: 5rem; border-radius: 8px; height: 200px;">
            MTS
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="{{ url('/admin/admin_ma') }}" class="text-decoration-none">
          <div class="bg-warning text-success fw-bold d-flex align-items-center justify-content-center"
            style="font-size: 5rem; border-radius: 8px; height: 200px;">
            MA
          </div>
        </a>
      </div>
    </div>
  </div>
</section>


 <!-- Kegiatan -->
 <section class="kegiatan-section mt-2 mb-2">
  <h2 class="title">KEGIATAN</h2>
  <div class="kegiatan-container">
      <div class="kegiatan">
          <div class="circle">
              <i class="fas fa-trash-alt"></i> 
          </div>
          <a href="{{ route('admin.kegiatan_ppdb.index') }}">
              <button class="edit-btn">Edit</button>
          </a>
      </div>
      <div class="kegiatan">
          <div class="circle">
              <i class="fas fa-plus"></i> 
          </div>
          <a href="{{ route('admin.kegiatan_ppdb.index') }}">
              <button class="create-btn">Create</button>
              </a>
      </div>
      <div class="kegiatan">
          <div class="circle">
              <i class="fas fa-plus"></i>
          </div>
         =
      </div>
  </div>
</section>





<!-- Footer -->
<footer class="bg-footer fw-bold text-white py-5">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <p class="fs-6 mb-0">Copyright &copy; 2025 | YAYASAN NURUL FIRDAUS</p>
        <p class="fs-6 mb-0">Design by MAGANG TIKSI USM-23</p>
       
      </div>
    </div>
  </div>
</footer>
@endsection
