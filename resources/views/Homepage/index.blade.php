@extends('Homepage.layout')
@extends('Homepage.navbar')
@section('content')
@php
  
    $gambar = \App\Models\GambarMenuPPDB::first();
@endphp

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
    background: rgba(0, 88, 58, 0.4); 
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

/* Footer Section */
footer {
    background-color: var(--primary-color);
}
  
footer a {
    color: #ffffff;
    text-decoration: none;
    transition: all 0.3s ease;
}
  
footer a:hover {
    color: var(--secondary-color);
    text-decoration: none;
}
  
footer .logo img {
    height: 60px;
}
  
footer ul li {
    margin-bottom: 0.5rem;
}
  
.social-icons a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.1);
    margin-right: 0.5rem;
    transition: all 0.3s ease;
}
  
.social-icons a:hover {
    background-color: var(--secondary-color);
    color: var(--text-dark);
    
}
  
.copyright {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 1.5rem;
    margin-top: 2rem;
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
              <img src="{{ asset('img\Vector0.png') }}" alt="Form Pendaftaran" style="width: 2rem; height: auto;">
              Form Pendaftaran
            </a>
          </div>
          <div class="col-10 col-md-3">
            <a href="{{ url('/students#datapendaftar') }}" 
               class="btn fw-bold text-white py-2 d-flex align-items-center justify-content-center"
               style="background-color: #3B82F6; border-radius: 10px; gap: 8px;">
              <img src="{{ asset('img\Vectorbroh.png') }}" alt="Data Pendaftar" style="width: 1.7rem; height: auto;">
              Data Pendaftar
            </a>
          </div>
        </div>
      </div>
</section>

      

  </div>
</section>



@php
    $gambar = App\Models\GambarJadwalPPDB::latest()->first();
@endphp

<!-- Jadwal -->
<section  id="jadwal" class="bg-white text-center py-5">
  <div class="container">
    <h3 class="fw-bold text-success me-2 mb-5">JADWAL PENDAFTARAN</h3>
    <img src="{{ $gambar ? asset('storage/' . $gambar->gambar) : asset('asset/default.png') }}" class="img-fluid">
  </div>
</section>


<!-- MTS dan MA -->
<section  id="pilihan" class="bg-nav text-white text-center py-5 mt-5 mb-1">
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

{{-- Kegiatan --}}
<section class="kegiatan-section mt-2 mb-2">
  <h2 class="title mb-4 fw-bold">KEGIATAN</h2>
  <div class="kegiatan-container">
      @foreach ($kegiatan as $item)
      <div class="kegiatan-item">
          <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}">
          <h5>{{ $item->nama }}</h5>
      </div>
      @endforeach
  </div>
</section>

<!-- Footer -->
<footer class="py-5 text-white" style="background-color: #0a6e31;">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <div class="logo">
            <img src="images/logo-main.png" alt="Logo Nurul Firdaus">
            <h5 class="mt-3">Yayasan Pon Pes<br>Modern Nurul Firdaus</h5>
          </div>
          <p class="mt-3">Mencetak generasi berakhlak Mulia, mandiri, dan berprestasi.</p>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5>Navigasi</h5>
          <ul class="list-unstyled">
            <li><a href="{{ route('dashboard.beranda') }}">Home</a></li>
            <li><a href="{{ url('/profile') }}">Profile</a></li>
            <li><a href="{{ url('/Homepage#pilihan') }}">Program Pilihan</a></li>
            <li><a href="{{ url('/informasi') }}">Informasi</a></li>
            <li><a href="{{ url('/Homepage') }}">PPDB</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5>Website terkait</h5>
          <ul class="list-unstyled">
            <li><a href="{{ url('/ma') }}">MA</a></li>
            <li><a href="{{ url('/mts') }}">MTs</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5>Layanan</h5>
          <ul class="list-unstyled mb-3">
            <li><i class="fas fa-envelope me-2"></i> <a href="mailto:yayasannurul@gmail.com">yayasannurul@gmail.com</a></li>
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


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Slick Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
