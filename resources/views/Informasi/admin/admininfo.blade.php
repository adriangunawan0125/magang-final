<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Informasi terbaru dari Pondok Pesantren Modern Nurul Firdaus">
  <title>Informasi - Pondok Pesantren Modern Nurul Firdaus</title>
  <link rel="icon" href="{{ asset('images/logo-fix.png') }}" type="image/png">
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
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #00583A;">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.html">
        <img src="{{asset('/img/logo.png')}}" alt="Logo Nurul Firdaus" height="40" class="me-2">
        <span>Nurul Firdaus</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.html">PROFILE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">PROGRAM PILIHAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="informasi.html">INFORMASI</a>
            </li>
            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
              <a class="btn btn-primary px-4" href="#">PPDB</a>
            </li>
         </ul>
      </div>
    </div>
  </nav>

  <!-- Header Section -->
  <section class="pt-4" style="margin-top: 40px;">
    <div class="container-fluid p-0">
    </div>
  </section>

  <div class="carousel-item active">
    <div class="d-flex justify-content-center align-items-center" style="height: 400px; background-color: #d3d3d3; position: relative; border-radius: 12px;">
      
      <!-- Tombol ubah gambar -->
      <a href="{{ route('admin.informasi.edit', 1) }}" 
         class="btn btn-warning btn-lg fw-bold px-4 py-2 shadow" 
         style="z-index: 2;">
        Ubah Gambar
      </a>
  
      <!-- Panah kiri -->
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev" style="width: 5%; left: 10px;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
  
      <!-- Panah kanan -->
      <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next" style="width: 5%; right: 10px;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
  
    </div>
  </div>
  
  
<!-- Kegiatan Section -->
<section class="py-4" style="background-color: #d3d3d3;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center text-success pt-2 fw-bold">Kegiatan</h2>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <div class="position-relative" style="height: 400px; background-color: #d3d3d3; border-radius: 10px;">
          <img src="{{ asset('/img/kegiatan-1.jpg') }}" 
               alt="Kegiatan" 
               class="d-block w-100" 
               style="height: 100%; object-fit: cover; border-radius: 10px;">

          <!-- Tombol Ubah Gambar di Tengah -->
          <div class="position-absolute top-50 start-50 translate-middle">
            <a href="{{ route('admin.kegiatan_informasi.index') }}" class="btn btn-warning btn-lg fw-bold shadow">
              Ubah Gambar
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- Acara Tahunan Section -->
 <!-- Galery Section -->
<section class="py-4" style="background-color: #d3d3d3;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center text-success fw-bold">Galery</h2>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <div class="position-relative" style="height: 400px; border-radius: 10px;">
          <img src="{{ asset('/img/kegiatan-1.jpg') }}" 
               alt="Galery" 
               class="d-block w-100" 
               style="height: 100%; object-fit: cover; border-radius: 10px;">
          
          <!-- Tombol Ubah Gambar di Tengah -->
          <div class="position-absolute top-50 start-50 translate-middle">
            <a href="{{ route('admin.acara_informasi.index', 1) }}" class="btn btn-warning btn-lg fw-bold shadow">
              Ubah Gambar
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

 <!-- Footer Section -->
 <footer class="container-fluid py-3 px-4 px-md-5" style="background-color: #dcfdf1">
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
                <li><a href="#" class="text-blue-500 underline">Profile</a></li>
                <li><a href="{{ url('/Homepage#pilihan') }}" class="text-blue-500 underline">Program Pilihan</a>
                </li>
                <li><a href="{{ route('dashboard.beranda') }}" class="text-blue-500 underline">Informasi</a></li>
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

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <script src="assets/js/script.js"></script>
</body>
</html>