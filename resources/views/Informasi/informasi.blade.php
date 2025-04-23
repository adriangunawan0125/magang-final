<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Informasi terbaru dari Pondok Pesantren Modern Nurul Firdaus">
  <title>Informasi - Pondok Pesantren Modern Nurul Firdaus</title>
  <link rel="icon" href="{{ asset('images/logo-fix.png') }}" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <!--  Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    {{-- CSS --}}
    {{-- <link href="{{ asset('css/style_dashboard.css') }}" rel="stylesheet"> --}}
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{asset('/css/styleprofile-info.css')}}">
  
    <link rel="icon" href="{{ asset('images/logo-fix.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <!--  Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    {{-- CSS --}}
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #00583A;">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.html">
        <img src="{{asset('/img/logo.png')}}" alt="Logo Nurul Firdaus" height="40" class="me-2">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link" style="font-weight: 500 !important;" href="{{ url('/') }}">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="font-weight: 500 !important;" href="{{ url('/profile') }}">PROFILE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="font-weight: 500 !important;" href="{{ url('/Homepage#pilihan') }}">PROGRAM PILIHAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" style="font-weight: 500 !important;" href="{{ url('/informasi') }}">INFORMASI</a>
            </li>
            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
             
            </li>
         </ul>
         <a class="btn btn-info px-4" style="font-weight: 500 !important;" href="{{ url('/Homepage') }}">PPDB</a>
      </div>
    </div>
  </nav>

<!-- Header Section -->
<section class="pt-4" style="margin-top: 40px;">
  <div class="container-fluid p-0">
  </div>
</section>

@php
  $latar = $informasiGambar->first()?->gambar_latar ?? null;
@endphp

<!-- Header Judul -->
<div class="card-header pt-4 pb-3 bg-light position-relative text-center" style="z-index: 2;">
  <h4 class="mb-0 mt-0 fw-bold text-success">INFORMASI TERBARU</h4>
</div>

<!-- Section Informasi -->
<section
  class="position-relative informasi-bg py-5" 
  style="background: url('{{ $latar ? asset('img/' . $latar) : asset('img/default.jpg') }}') no-repeat center center; background-size: cover;">

  <!-- Overlay Hijau -->
  <div class="overlay-green" style="
      position: absolute; 
      top: 0; left: 0; 
      width: 100%; height: 100%; 
      background: rgba(0, 128, 0, 0.5); 
      z-index: 1;">
  </div>

  <!-- Carousel -->
  <div class="container position-relative mt-4" style="z-index: 2;">
    <div class="row">
      <div class="col-12">
        <div id="infoCarousel" class="carousel slide" data-bs-ride="carousel">

          <!-- Indicators -->
          <div class="carousel-indicators">
            @foreach($informasiGambar as $index => $gambar)
              <button 
                type="button" 
                data-bs-target="#infoCarousel" 
                data-bs-slide-to="{{ $index }}" 
                class="{{ $index === 0 ? 'active' : '' }}" 
                aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                aria-label="Slide {{ $index + 1 }}">
              </button>
            @endforeach
          </div>

         <!-- Items -->
<div class="carousel-inner rounded shadow overflow-hidden" style="width: 100%; height: auto; background-color: #e2e2e2;">

  @foreach($informasiGambar as $index => $gambar)
    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
      <img 
        src="{{ asset('img/' . $gambar->gambar_depan) }}" 
        class="d-block w-100 h-100" 
        alt="Informasi {{ $index + 1 }}" 
        style="object-fit: cover;">
    </div>
  @endforeach
</div>

          <!-- Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#infoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#infoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>

        </div>
      </div>
    </div>
  </div>
</section>





<style>

  /* KEGIATAN */
  html {
    scroll-behavior: smooth;
}

body {
    background-color: #DBFCF1;
    font-family: "Poppins", sans-serif;
}

.kegiatan-section {
    text-align: center;
    padding: 60px 20px;
    background-color: white;
    box-shadow: 0px 4px 2px rgba(0, 0, 0, 0.2);
}

.kegiatan-container {
    width: 100%;
    overflow-x: auto;
    white-space: nowrap;
    padding: 20px;
    scrollbar-width: none;
    background-color: white;
}

.kegiatan-container::-webkit-scrollbar {
    display: none;
}

.kegiatan-item {
    display: inline-block;
    width: 300px; 
    margin: 15px;
    text-align: center;
}

.kegiatan-item img {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #0B4B25;
    transition: transform 0.3s ease-in-out;
    margin-bottom: 10px;
}

.kegiatan-item img:hover {
    transform: scale(1.04);
}



.kegiatan-item h5 {
    font-size: 20px;
    font-weight: bold;
    margin-top: 5px;
    color: #0B4B25;
}


.kegiatan-control {
    background-color: transparent;
    border: none;
    font-size: 24px;
    color: #0B4B25;
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
}

.kegiatan-control-prev {
    left: 10px;
}

.kegiatan-control-next {
    right: 10px;
}

</style>

{{-- Kegiatan --}}
<section class="kegiatan-section mt-2 mb-2">
  <h2 class="title fw-bold mb-4">KEGIATAN</h2>
  <div class="kegiatan-container">
      @foreach ( $kegiatanInformasi as $kegiatan)
      <div class="kegiatan-item">
          <img src="{{ asset('storage/'. $kegiatan->foto) }}" alt="{{$kegiatan->nama}}">
          <h5>{{ $kegiatan->nama }}</h5>
      </div>
      @endforeach
  </div>
</section>
    
    <!-- Modal untuk memperbesar gambar -->
    <div class="modal fade mt-5" id="kegiatanModal" tabindex="-1" aria-labelledby="kegiatanModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="kegiatanModalLabel">Detail Kegiatan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center p-2 d-flex justify-content-center align-items-center">
            <img src="" id="modalImage" class="img-fluid" alt="Kegiatan Detail" style="max-height: 80vh; max-width: 100%; object-fit: contain;">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Acara Tahunan Section -->
<section class="py-4 bg-light mb-4">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center text-success fw-bold mb-5">ACARA TAHUNAN</h2>
      </div>
    </div>
    <div class="row mt-3">
      @foreach($acaraInformasi as $acara)
        <div class="col-md-4 mb-3">
          <div class="card">
            <img 
              src="{{ asset('storage/' . $acara->foto) }}" 
              alt="{{ $acara->nama }}" 
              class="card-img-top" 
              style="height: 200px; object-fit: cover;"
            >
            <div class="card-footer text-center">{{ $acara->nama }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

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
              <li><a href="{{ url('/profile') }}" class="text-blue-500 underline">Profile</a></li>
              <li><a href="{{ url('/Homepage#pilihan') }}" class="text-blue-500 underline">Program Pilihan</a>
              </li>
              <li><a href="{{ url('/informasi') }}" class="text-blue-500 underline">Informasi</a></li>
              <li>
                  <a href="{{ url('/Homepage') }}" class="text-primary text-decoration-underline">PPDB</a>
              </li>      
          </ul>
      </div>

      <div class="col-md-2 d-flex flex-column h-100">
          <h5 class="fw-bold mb-3">Website Terkait</h5>
          <ul class="list-unstyled">
              <li><a href="{{ url('/ma') }}" class="text-blue-500 underline">MA</a></li>
              <li><a href="{{ url('/mts') }}" class="text-blue-500 underline">MTS</a></li>
          </ul>
      </div>

      <div class="col-md-2 d-flex flex-column h-100">
          <h5 class="fw-bold mb-3">Layanan</h5>
          <ul class="list-unstyled">
              <li><a href="https://wa.me/6285640352942" class="text-decoration text-blue">WhatsApp</a></li>
              <li><a href="mailto:YayasanNufi@gmail.com" class="text-decoration text-blue">Email</a></li>
              <li>
                  <a href="{{ url('/Homepage') }}" class="text-primary text-decoration-underline">PPDB</a>
              </li>      
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
</body>
</html>