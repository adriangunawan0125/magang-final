<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Berita</title>
  <link rel="icon" href="{{ asset('images/logo-fix.png') }}" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link href="{{ asset('css/beritastyle.css') }}" rel="stylesheet">
</head>

<body style="background-color: #DCFDF1;">
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top navbar-light px-5 shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand me-4" href="{{ url('/') }}">
            <img src="{{ asset('images/logo-fix.png') }}" alt="Nurul Firdaus" width="50">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav justify-content-center w-100 gap-3">
                <li class="nav-item">
                    <a class="nav-link text-sm" href="{{ url('/') }}"><b>HOME</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-sm" href="#profile-section"><b>PROFILE</b></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-sm" href="{{ url('/profil') }}"
                        id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PROGRAM PILIHAN
                    </a>
                    <ul class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item text-sm" href="{{ url('ma-section') }}">MA</a></li>
                        <li><a class="dropdown-item text-sm" href="{{ url('mts-section') }}">MTS</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-sm" href="{{ url('informasi') }}"><b>INFORMASI</b></a>
                </li>
            </ul>

            <div class="d-flex align-items-center ms-auto mt-2 mx-3">
                <a class="btn btn-warning text-white text-sm px-4 py-1 rounded-pill me-3 {{ request()->is('ppdb') ? 'active' : '' }}"
                    href="{{ url('/Homepage') }}"><b>PPDB</b></a>
            </div>
        </div>
    </div>
</nav>


  <div class="container border border-dark rounded  p-4"
    style="background-color: #FFF; border-radius: 10px; margin-top: 100px;">
    <h3 class="text-center fw-bold">{{ $berita->judul }}</h3>
    <p class="text-center text-muted">{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('l, d F Y') }}</p>
    
    @if($berita->gambar)
    <div class="text-center my-4">
        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" 
            class="img-fluid rounded shadow-sm" 
            style="max-width: 100%; height: auto; border-radius: 10px;">
    </div>
    @endif
    
    @if($berita->caption)
    <p class="text-center text-muted"><em>{{ $berita->caption }}</em></p>
    @endif
    
    <p class="mt-3" style="text-align: justify;">{{ $berita->isi }}</p>
    
    <div class="text-center mt-4">
        <a href="{{ route('berita.home') }}" class="btn btn-outline-success">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>
</div>

  <!-- Sosial Media -->
  <div class="container-fluid py-4">
    <div class="text-center">
      <h5 class="fw-bold text-black mb-4">SOSIAL MEDIA</h5>
      <div class="d-flex justify-content-center gap-3">
        <a href="#" class="social-icon d-flex align-items-center justify-content-center text-white">
          <i class="fab fa-tiktok"></i>
        </a>
        <a href="#" class="social-icon d-flex align-items-center justify-content-center text-white">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="social-icon d-flex align-items-center justify-content-center text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="#" class="social-icon d-flex align-items-center justify-content-center text-white">
          <i class="fab fa-instagram"></i>
        </a>
      </div>
    </div>
  </div>

  <div class="text-center mt-3 mb-5">
    <h5 class="fw-bold" style="color: #006641;">MA NURUL FIRDAUS MANGGARMAS</h5>
  </div>



  <!-- Footer -->
  <footer class="py-5 text-white" style="background-color: #0a6e31;">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <div class="logo">
            <img src="images/logo.png" alt="Logo Nurul Firdaus">
            <h5 class="mt-3">Yayasan Pon Pes<br>Modern Nurul Firdaus</h5>
          </div>
          <p class="mt-3">Mencetak generasi berakhlak Qur'ani, mandiri, dan berprestasi.</p>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5>Navigasi</h5>
          <ul class="list-unstyled">
            <li><a href="index.html">Home</a></li>
            <li><a href="profile.html">Profile</a></li>
            <li><a href="#">Program Pilihan</a></li>
            <li><a href="informasi.html">Informasi</a></li>
            <li><a href="#">PPDB</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5>Website terkait</h5>
          <ul class="list-unstyled">
            <li><a href="#">MA</a></li>
            <li><a href="#">MTs</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5>Layanan</h5>
          <ul class="list-unstyled mb-3">
            <li><i class="fas fa-envelope me-2"></i> <a href="mailto:yayasannurulf@gmail.com">yayasannurulf@gmail.com</a></li>
            <li><i class="fas fa-phone me-2"></i> <a href="tel:+6282120112425">+62 821 2011 2425</a></li>
          </ul>
          <h5>Media Sosial</h5>
          <div class="social-icons">
            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-tiktok"></i></a>
            <a href="https://www.linkedin.com/company/nurulfirdaus/" target="_blank"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>
      
      <div class="text-center copyright">
        <p>&copy; 2025 Yayasan Nurul Firdaus. All rights reserved.<br>
        <small>Designed by Tim Magang FTIK USM</small></p>
      </div>
    </div>
  </footer>


  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
