@extends('Homepage.layout')
@extends('Homepage.navbar')
@section('content')
@php
  
    $gambar = \App\Models\GambarMenuPPDB::first();
@endphp
<link href="{{ asset('css/style_dashboard.css') }}" rel="stylesheet">
<style>
  .custom-rounded {
    border-radius: 15px;
  }

  .bg-custom {
    position: relative;
    background-image: url('{{ asset($gambar->background ?? 'asset/Group 37209.png') }}');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    
  }

  .bg-custom::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 88, 58, 0.4); /* hijau gelap transparan */
  }

  .bg-custom .container {
    position: relative;
    z-index: 1;
  }

  .btn-warning {
    color: #00583a;
  }

  .bg-footer {
    background-color: #00583a;
  }
</style>



   
<!-- Menu PPDB -->
<section id="dashboard" class="bg-custom text-white text-center mt-2 pt-5 py-5">
  <div class="container pt-5">
    <img src="{{ asset('asset/logo_nufi.png') }}" alt="Logo" class="mb-3 pt-3" style="width: 150px;">
    <h1 class="fw-bold mb-2">Selamat Datang di PPDB Online</h1>
    <h4 class="fw-bold">Yayasan Nurul Firdaus</h4>
      {{-- //style="background-color: #FFD700; border-radius: 10px;" ntar benerin tombolnya udh pusing gw jing --}} 
      <div class="container">
        <div class="row justify-content-center gap-3 mt-4">
          <div class="col-10 col-md-3">
            <a href="{{ url('/students') }}" 
               class="btn fw-bold text-dark py-2 d-flex align-items-center justify-content-center"
               style="background-color: #FFD700; border-radius: 10px; gap: 8px;">
              <span style="font-size: 2rem;">📋</span> Form Pendaftaran
            </a>
          </div>
          <div class="col-10 col-md-3">
            <a href="{{ url('/students#datapendaftar') }}" 
               class="btn fw-bold text-white py-2 d-flex align-items-center justify-content-center"
               style="background-color: #3B82F6; border-radius: 10px; gap: 8px;">
              <span style="font-size: 2rem;">👤</span> Data Pendaftar
            </a>
          </div>
        </div>
      </div>
      

  </div>
</section>



@php
    $gambar = App\Models\GambarJadwalPPDB::latest()->first();
@endphp

<!-- Jadwal -->
<section data-aos="fade-up" id="jadwal" class="bg-white text-center py-5">
  <div class="container">
    <h3 class="fw-bold text-success me-2 mb-5">JADWAL PENDAFTARAN</h3>
    <img src="{{ $gambar ? asset('storage/' . $gambar->gambar) : asset('asset/default.png') }}" class="img-fluid">
  </div>
</section>


<!-- MTS dan MA -->
<section data-aos="fade-up" id="pilihan" class="bg-success text-white text-center py-5 mt-5 mb-1">
  <div class="container">
    <h2 class="fw-bold mb-5">PROGRAM PILIHAN</h2>
    <div class="row justify-content-center">
      <div class="col-md-4 mb-3">
        <a href="{{ url('/mts') }}" class="text-decoration-none">
          <div class="bg-warning text-success fw-bold d-flex align-items-center justify-content-center"
            style="font-size: 3rem; border-radius: 8px; height: 200px;">
            MTS
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="{{ url('/ma') }}" class="text-decoration-none">
          <div class="bg-warning text-success fw-bold d-flex align-items-center justify-content-center"
            style="font-size: 3rem; border-radius: 8px; height: 200px;">
            MA
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Kegiatan -->
<section data-aos="fade-up" id="kegiatan" class="py-5 bg-light mt-2 mb-3">
  <div class="container text-center">
      <h2 class="mb-5 fw-bold text-success">KEGIATAN</h2>
      <div class="row">
          @foreach($gambarKegiatan as $gk)
              <div class="col-md-4">
                  <div class="circle">
                      <img src="{{ asset('storage/' . $gk->gambar) }}" alt="Kegiatan">
                  </div>
              </div>
          @endforeach
      </div>
  </div>
</section>

  
<style>
  .circle {
    width: 350px;  /* Ukuran lingkaran */
    height: 350px;
    border-radius: 50%;
    overflow: hidden;
    margin: auto;
  }

  .circle img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .row > .col-md-4 {
    padding-top: 10px;
    padding-bottom: 10px;
  }
</style>

 <!-- Footer Section -->
 <footer class="container-fluid py-3 px-4 px-md-5">
  <div class="row justify-content-center text-center text-md-start align-items-start h-100 mt-4 pt-3 gap-3">

      <div class="col-md-3 d-flex flex-column h-100 text-center mx-auto">
          <img src="images/logo-fix.png" alt="Logo Sekolah" width="120" class="mt-2 mx-auto">
          <p class="mt-2"><i class="bi bi-envelope me-2"></i> YayasanNufi@gmail.com</p>
          <p><i class="bi bi-telephone me-2"></i> +62 856-4035-2942</p>

          <div class="mt-3">
              <a href="#" class="me-2"><i class="bi bi-facebook fs-4"></i></a>
              <a href="#" class="me-2"><i class="bi bi-instagram fs-4"></i></a>
              <a href="#" class="me-2"><i class="bi bi-tiktok fs-4"></i></a>
              <a href="#" class="me-2"><i class="bi bi-linkedin fs-4"></i></a>
          </div>
      </div>

      <div class="col-md-2 d-flex flex-column h-100">
          <h5 class="fw-bold mb-3">Navigasi</h5>
          <ul class="list-unstyled">
              <li><a href="{{ route('dashboard.beranda') }}" class="text-blue-500 underline">Home</a></li>
              <li><a href="{{ route('dashboard.beranda') }}" class="text-blue-500 underline">Profile</a></li>
              <li><a href="{{ route('dashboard.beranda') }}" class="text-blue-500 underline">Program Pilihan</a>
              </li>
              <li><a href="{{ route('dashboard.beranda') }}" class="text-blue-500 underline">Informasi</a></li>
              <li><a href="{{ route('dashboard.beranda') }}" class="text-blue-500 underline">PPDB</a></li>
          </ul>
      </div>

      <div class="col-md-2 d-flex flex-column h-100">
          <h5 class="fw-bold mb-3">Website Terkait</h5>
          <ul class="list-unstyled">
              <li><a href="{{ route('dashboard.beranda') }}" class="text-blue-500 underline">MA</a></li>
              <li><a href="{{ route('dashboard.beranda') }}" class="text-blue-500 underline">MTS</a></li>
          </ul>
      </div>

      <div class="col-md-2 d-flex flex-column h-100">
          <h5 class="fw-bold mb-3">Layanan</h5>
          <ul class="list-unstyled">
              <li><a href="https://wa.me/6285640352942" class="text-decoration text-blue">WhatsApp</a></li>
              <li><a href="mailto:YayasanNufi@gmail.com" class="text-decoration text-blue">Email</a></li>
              <li><a href="{{ route('dashboard.beranda') }}" class="text-blue-500 underline">PPDB</a></li>
          </ul>
      </div>
  </div>

  <hr class="mt-4" style="border-top: 2px solid #000;">

  <div class="text-center py-1">
      <p class="mb-0 text-muted">Copyright © 2025 | Yayasan Nurul Firdaus</p>
      <p class="mb-0 text-muted">Designed by Magang TISI USM</p>
  </div>
</footer>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Slick Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
