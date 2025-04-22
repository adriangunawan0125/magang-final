<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Pondok Pesantren Modern Nurul Firdaus - Mencetak generasi berakhlak Qur'ani, mandiri, dan berprestasi">
  <title>Profile - Pondok Pesantren Modern Nurul Firdaus</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{asset('/css/styleprofile-info.css')}}">
  <style>
    /* Tambahan CSS untuk memastikan fade-in dan counter berfungsi dengan baik */
    .fade-in {
      opacity: 0;
      transition: opacity 0.8s ease-in;
    }
    .fade-in.visible {
      opacity: 1;
    }
    .stats-card {
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      text-align: center;
      transition: transform 0.3s;
    }
    .stats-card:hover {
      transform: translateY(-5px);
    }
    .stats-number {
      font-size: 2.5rem;
      font-weight: bold;
      color: #0a6e31;
      margin: 10px 0;
      font-family: 'Poppins', sans-serif;
    }
    .stats-text {
      font-size: 1rem;
      color: #555;
    }
  </style>
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
              <a class="nav-link" href="{{ url('/') }}">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/profile') }}">PROFILE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/Homepage') }}">PROGRAM PILIHAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/informasi') }}">INFORMASI</a>
            </li>
            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
              <a class="btn btn-primary px-4" href="{{ url('/students') }}">PPDB</a>
            </li>
         </ul>
      </div>
    </div>
  </nav>

  <!-- Profile Header Section -->
{{-- <section class="hero-section py-5 text-center text-white" 
style="background: url('{{ asset('/img/hero-bg.jpg') }}') center/cover no-repeat; margin-top: 70px;">
<div class="container">
<h1 class="display-4 fw-bold fade-in">Profil Yayasan</h1>
</div>
</section> --}}

<section class="py-5 text-center text-success" 
         style="background-color: #ffffff !important; margin-top: 70px !important; background-image: none !important;">
  <div class="container">
    <h1 class="display-4 fw-bold fade-in">PROFIL YAYASAN </h1>
  </div>
</section>



  @php
  $bg = $profile->background_image 
      ? asset('storage/' . $profile->background_image) 
      : asset('img/default.jpg');
@endphp

<!-- Visi & Misi Section (gabung background) -->
<section 
  class="py-5 text-white shadow" 
  style="background: url('{{ $bg }}') no-repeat center center; background-size: cover; position: relative;">
  
  <!-- Overlay gelap -->
  <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.5); z-index: 1;"></div>

  <!-- Konten -->
  <div class="container position-relative" style="z-index: 2;">

    <!-- VISI -->
    <div class="row justify-content-center mb-5">
      <div class="col-md-8 text-center">
        <h2 class="mb-4 fade-in">VISI :</h2>
        <div class="card shadow-sm border-0 fade-in bg-light text-dark">
          <div class="card-body p-4">
            <p class="lead fw-bold">{{ $profile->visi }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- MISI -->
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <h2 class="mb-4 text-center fade-in">MISI :</h2>
        <div class="card shadow-sm border-0">
          <div class="card-body p-0 bg-white text-dark">
            <ul class="list-group list-group-flush fade-in">
              @foreach(explode("\n", $profile->misi) as $index => $item)
                @if(trim($item) != '')
                <li class="list-group-item">
                  <span class="number">{{ $index + 1 }}</span> {{ $item }}
                </li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>


  <!-- Sejarah Section -->
  <section id="sejarah" class="py-5">
    <div class="container">
      <h2 class="mb-5 text-center fade-in fw-bold text-dark">SEJARAH</h2>
      <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
          <div class="fade-in">
            <p class="fw-bold text-dark">
              Yayasan Nurul Firdaus berdiri sebagai wujud tekad dan visi seorang pemuda bernama M. Noorsyambudi dari Desa Manggarmas. Pada tahun 1980, ia memulai perjalanan ke Pondok Pesantren Gontor untuk memperdalam ilmu agama dan pendidikan. Sekembalinya dari Gontor, K.H. M. Noorsyambudi bercita-cita memajukan pendidikan di desanya, yang saat itu sebagian besar masyarakatnya hanya mengenyam pendidikan dasar. Dengan dorongan keluarga, ia mendirikan Pondok Pesantren Modern Nurul Firdaus pada 17 Sya'ban 1405 H (8 Mei 1985). Awalnya, pondok ini berdiri di atas lahan seluas 750 m² dengan bangunan sederhana berupa rumah dan mushola. Santri pertama berjumlah 53 orang, terdiri dari 11 santri mukim putra, 15 santri mukim putri, dan 27 santri kalong.
            </p>
            <p class="fw-bold text-dark">
              Seiring berjalannya waktu, Yayasan Nurul Firdaus terus berkembang baik dari segi fasilitas maupun jumlah santri. Pada tahun 1989, yayasan ini membuka jenjang pendidikan formal, yaitu Madrasah Tsanawiyah (MTs) dan Madrasah Aliyah (MA), guna memberi kesempatan santri melanjutkan pendidikan ke tingkat yang lebih tinggi. Sejak itu, lembaga ini menjadi lembaga pendidikan yang tidak hanya menekankan nilai-nilai keislaman, tetapi juga memadukan kurikulum modern untuk membentuk generasi yang berakhlak Qur'ani, mandiri, dan inspiratif.
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="fade-in">
            <img src="{{asset('/img/sejarah-1.jpg')}}" alt="Sejarah Pondok Pesantren" class="img-fluid rounded shadow">
          </div>
        </div>
      </div>
    </div>
  </section>

 <!-- Stats Section -->
<section class="py-5 bg-success">
  <div class="container">
    <div class="row justify-content-center">
      @if($stats->count())
        @foreach($stats as $stat)
          <div class="col-md-4 mb-4">
            <div class="stats-card shadow text-center p-4 bg-white">
              <i class="fas fa-user-graduate mb-3 fa-2x"></i>
              <div class="stats-number" data-target="{{ $stat->peserta_didik }}">{{ $stat->peserta_didik }}</div>
              <div class="stats-text fw-bold">Peserta didik</div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="stats-card shadow text-center p-4 bg-white">
              <i class="fas fa-chalkboard-teacher mb-3 fa-2x"></i>
              <div class="stats-number" data-target="{{ $stat->rombel }}">{{ $stat->rombel }}</div>
              <div class="stats-text fw-bold">Rombel</div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="stats-card shadow text-center p-4 bg-white">
              <i class="fas fa-users mb-3 fa-2x"></i>
              <div class="stats-number" data-target="{{ $stat->guru_tenaga_kependidikan }}">{{ $stat->guru_tenaga_kependidikan }}</div>
              <div class="stats-text fw-bold">Guru & Tenaga Kependidikan</div>
            </div>
          </div>
        @endforeach
      @else
        <div class="col-12 text-center">
          <p class="text-muted">Belum ada data statistik yang tersedia.</p>
        </div>
      @endif
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
  <script>
  document.addEventListener('DOMContentLoaded', function() {
      // Initialize fade-in animations - FIXED
      const fadeElements = document.querySelectorAll('.fade-in');
      fadeElements.forEach(function(element) {
          // Apply visible class immediately to fix stuck loading issue
          element.classList.add('visible');
      });
      
      // Stats counter - FIXED: Initialize stats with actual values
      const counters = document.querySelectorAll('.stats-number');
      if (counters.length > 0) {
          counters.forEach(counter => {
              const target = parseInt(counter.getAttribute('data-target')) || 0;
              
              // Set values directly to fix stuck loading
              counter.textContent = target;
              
              // Optional: you can still add animation
              // but only after ensuring values are displayed first
              let current = 0;
              const increment = Math.ceil(target / 30);
              
              const timer = setInterval(() => {
                  current += increment;
                  if (current >= target) {
                      counter.textContent = target;
                      clearInterval(timer);
                  } else {
                      counter.textContent = current;
                  }
              }, 30);
          });
      }
  });
  </script>
</body>
</html>