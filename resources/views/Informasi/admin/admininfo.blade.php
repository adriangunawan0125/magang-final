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

<!-- Struktural Section -->
<div class="w-100 mt-2 p-0" style="background-color: #fff;">
  <div class="row g-0 justify-content-center">
    <div class="col-12">
      <div class="card shadow-lg border-0 text-center m-0 p-0">
        <div class="card-body p-3">
          <h2 class="card-title fw-bold py-3">INFORMASI</h2>
          @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
          <a href="{{ route('admin.informasi.index',1) }}" class="btn mt-5 text-dark fw-bold"
            style="margin-bottom: 200px; background-color: #F4DC00;">
            Ubah Gambar
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  /* KEGIATAN */
  .kegiatan-section {
      text-align: center;
      padding: 60px 20px;
      background-color: white;
      box-shadow: 0px 4px 2px rgba(0, 0, 0, 0.2);
  }
  
  .kegiatan-container {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
      padding: 20px;
  }
  
  .circle {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      border: 3px solid #0B4B25;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 50px;
      color: gray;
      background-color: white;
      
  }
  
  button {
      margin-top: 10px;
      padding: 8px 15px;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
  }
  .kegiatan i {
      transition: transform 0.3s ease-in-out;
  }
  .kegiatan i:hover {
      transform: scale(1.05);
  }
  .edit-btn {
      background-color: #FFD700;
      color: black;
      transition: transform 0.3s ease-in-out;
  }
  .edit-btn:hover {
      transform: scale(1.05);
  }
  .create-btn {
      background-color: #FFD700;
      color: black;
      transition: transform 0.3s ease-in-out;
  }
  .create-btn:hover {
      transform: scale(1.05);
  }
  
  //* Acara Tahunan */
  .kegiatan-section {
    text-align: center;
    padding: 60px 20px;
    background-color: white;
    box-shadow: 0px 4px 2px rgba(0, 0, 0, 0.2);
}

.kegiatan-container {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    padding: 20px;
}

.acara-card {
    width: 200px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    padding: 20px;
}

.acara-card:hover {
    transform: translateY(-5px);
}

.card-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.icon-card {
    font-size: 50px;
    color: gray;
    margin-bottom: 15px;
}

button {
    margin-top: 10px;
    padding: 8px 15px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.edit-btn,
.create-btn {
    background-color: #FFD700;
    color: black;
    transition: transform 0.3s ease-in-out;
    width: 100%;
}

.edit-btn:hover,
.create-btn:hover {
    transform: scale(1.05);
}

  </style>

 <!-- Kegiatan -->
 <section class="kegiatan-section mt-2 mb-2">
  <h2 class="title">KEGIATAN</h2>
  <div class="kegiatan-container">
      <div class="kegiatan">
          <div class="circle">
              <i class="fas fa-trash-alt"></i> 
          </div>
          <a href="{{ route('admin.kegiatan_informasi.index') }}">
              <button class="edit-btn">Edit</button>
          </a>
      </div>
      <div class="kegiatan">
          <div class="circle">
              <i class="fas fa-plus"></i> 
          </div>
          <a href="{{ route('admin.kegiatan_informasi.index') }}">
              <button class="create-btn">Create</button>
              </a>
      </div>
      <div class="kegiatan">
          <div class="circle">
              <i class="fas fa-plus"></i>
          </div>
          <a href="{{ route('admin.kegiatan_informasi.index') }}">
              <button class="create-btn">Create</button>
          </a>
      </div>
  </div>
</section>

  
{{-- <!-- Kegiatan Section -->
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
</section> --}}


<!-- Acara Tahunan -->
<section class="kegiatan-section mt-2 mb-5">
  <h2 class="title">Acara Tahunan</h2>
  <div class="kegiatan-container mb-4">
      <div class="acara-card">
          <div class="card-body">
              <i class="fas fa-trash-alt icon-card"></i> 
              <a href="{{ route('admin.acara_informasi.index') }}">
                  <button class="edit-btn">Edit</button>
              </a>
          </div>
      </div>
      <div class="acara-card">
          <div class="card-body">
              <i class="fas fa-plus icon-card"></i> 
              <a href="{{ route('admin.acara_informasi.index') }}">
                  <button class="create-btn">Create</button>
              </a>
          </div>
      </div>
      <div class="acara-card">
          <div class="card-body">
              <i class="fas fa-plus icon-card"></i> 
              <a href="{{ route('admin.acara_informasi.index') }}">
                  <button class="create-btn">Create</button>
              </a>
          </div>
      </div>
  </div



 <!-- Footer Section -->
 <footer class="container-fluid py-3 px-4 px-md-5" style="background-color: #dcfdf1">
    <div class="row justify-content-center text-center text-md-start align-items-start h-100 mt-4 pt-3 gap-3">

        <div class="col-md-3 d-flex flex-column h-100 text-center mx-auto">
            <img src="{{asset('/img/logo.png')}}" alt="Logo Sekolah" width="120" class="mt-2 mx-auto">
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