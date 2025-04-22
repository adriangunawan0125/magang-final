<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MA Nurul Firdaus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style_admin_ma.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <!-- Tombol Kembali -->
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


        <!-- Tombol Toggle untuk Mobile -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-5">
                <li class="nav-item">
                    <a class="nav-link px-3 active" href="{{url('admin/home')}}">HOME</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{url('admin/admin_profile')}}">PROFILE</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{url('admin/dashboardPPDB#pilihan')}}">PROGRAM PILIHAN</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{url('admin/admin_informasi')}}">INFORMASI</a>
                </li>
            </ul>
        </div>

        <!-- Tombol PPDB -->
        <a href="{{route('admin.dashboardPPDB')}}" class="btn btn-ppdb d-none d-lg-block">PPDB</a>
    </div>
</nav>


    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide position-relative" data-bs-ride="carousel">
        <h5 class="carousel-title">MTs NURUL FIRDAUS</h5>
        <a href="{{ route('admin.carousel_mts.index') }}" class="btn btn-edit">Ubah Gambar</a>
        
        <div class="carousel-inner">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/Slide-gedung.png') }}" class="d-block w-100" alt="Slide Gedung">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/Slide-Guru.png') }}" class="d-block w-100" alt="Slide Guru">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/Slide-pramuka.png') }}" class="d-block w-100" alt="Slide Pramuka">
            </div>
        </div>

        <div class="carousel-caption">
        <p class="carousel-address text-light">
            Jl. Manggar, RT/RW 001/002, Desa Manggar, Kec. Godong, Kab. Grobogan, Prov. Jawa Tengah
        </p>
    </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>




    <!-- Text Berjalan -->
    <div class="text-berjalan">
        <marquee behavior="scroll" direction="left" class="text" >
            SELAMAT DATANG DI WEBSITE YAYASAN NURUL FIRDAUS
        </marquee>
    </div>

    <!-- Sambutan Kepala Sekolah -->
    <div class="sambutan-container">
        <h2 class="title">SAMBUTAN KEPALA SEKOLAH MTS</h2>
        <a href="{{ route('admin.sambutan_mts.edit') }}">
            <button>Edit</button>
        </a>
    </div>

    <!-- Tentang Kami -->
    <section class="tentang-kami section-bg pt-2 pb-2">
        <div class="card full-width-card">
            <div class="card-content">
                <h2 class="title">TENTANG KAMI</h2>
                <img src="{{ asset('img/foto1.jpg') }}" alt="Gambar Yayasan" class="img-fluid rounded shadow mt-3">
                <p class="mt-4 text-muted">
                    Yayasan Nurul Firdaus merupakan lembaga pendidikan Islam yang menaungi Madrasah Tsanawiyah (MTs)
                    dan Madrasah Aliyah (MA) Nurul Firdaus, yang berlokasi di Desa Manggarms, Kecamatan Godong,
                    Kabupaten Grobogan, Jawa Tengah. Berdiri sejak tahun 1985, yayasan ini didirikan dengan tujuan
                    memberikan pendidikan yang seimbang antara nilai-nilai agama Islam dan kurikulum modern.
                </p>
            </div>
        </div>
    </section>

    <!-- Guru Section -->
    <div class="guru-container">
        <h2 class="title">GURU - GURU</h2>
        <a href="{{ route('admin.guru_mts.index') }}">
            <button>Edit</button>
        </a>
    </div>


    <!-- Kegiatan -->
    <section class="kegiatan-section mt-2 mb-2">
    <h2 class="title">KEGIATAN</h2>
    <div class="kegiatan-container">
        <div class="kegiatan">
            <div class="circle">
                <i class="fas fa-trash-alt"></i> 
            </div>
            <a href="{{ route('admin.kegiatan_mts.index') }}">
                <button class="edit-btn">Edit</button>
            </a>
        </div>
        <div class="kegiatan">
            <div class="circle">
                <i class="fas fa-plus"></i> 
            </div>
            <a href="{{ route('admin.kegiatan_mts.create') }}">
                <button class="create-btn">Create</button>
                </a>
        </div>
        <div class="kegiatan">
            <div class="circle">
                <i class="fas fa-plus"></i>
            </div>
            <a href="{{ route('admin.kegiatan_mts.create') }}">
                <button class="create-btn">Create</button>
            </a>
        </div>
    </div>
</section>


    <!-- BERITA -->
    <section class="berita mb-2">
    <div class="container my-3">
        <h2 class="title text-center">BERITA</h2>
        <div class="row g-3 mt-3">
            <div class="col-md-6">
                <div class="berita-card position-relative">
                    <img src="{{ asset('img/foto1.jpg') }}" alt="Berita 1">
                    <div class="berita-overlay">
                        <p>Tim magang USM telah melaksanakan kegiatan magang di Yayasan Nurul Firdaus</p>
                    </div>
                    <div class="berita-content">
                        <p class="text-start"><strong>Rabu, 06 Januari 2025</strong></p>
                        <p class="text-start">Kegiatan magang USM dimulai pada tanggal 12 Januari dan berakhir pada tanggal 5 Februari 2025</p>
                        <a href="#" class="lihat-selengkapnya">Lihat selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="berita-card position-relative">
                    <img src="{{ asset('img/foto1.jpg') }}" alt="Berita 2">
                    <div class="berita-overlay">
                        <p>Tim magang USM telah melaksanakan kegiatan magang di Yayasan Nurul Firdaus</p>
                    </div>
                    <div class="berita-content">
                        <p class="text-start"><strong>Rabu, 06 Januari 2025</strong></p>
                        <p class="text-start">Kegiatan magang USM dimulai pada tanggal 12 Januari dan berakhir pada tanggal 5 Februari 2025</p>
                        <a href="#" class="lihat-selengkapnya">Lihat selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="berita-card position-relative">
                    <img src="{{ asset('img/foto1.jpg') }}" alt="Berita 3">
                    <div class="berita-overlay">
                        <p>Tim magang USM telah melaksanakan kegiatan magang di Yayasan Nurul Firdaus</p>
                    </div>
                    <div class="berita-content">
                        <p class="text-start"><strong>Rabu, 06 Januari 2025</strong></p>
                        <p class="text-start">Kegiatan magang USM dimulai pada tanggal 12 Januari dan berakhir pada tanggal 5 Februari 2025</p>
                        <a href="#" class="lihat-selengkapnya">Lihat selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="berita-card position-relative">
                    <img src="{{ asset('img/foto1.jpg') }}" alt="Berita 4">
                    <div class="berita-overlay">
                        <p>Tim magang USM telah melaksanakan kegiatan magang di Yayasan Nurul Firdaus</p>
                    </div>
                    <div class="berita-content">
                        <p class="text-start"><strong>Rabu, 06 Januari 2025</strong></p>
                        <p class="text-start">Kegiatan magang USM dimulai pada tanggal 12 Januari dan berakhir pada tanggal 5 Februari 2025</p>
                        <a href="#" class="lihat-selengkapnya">Lihat selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="button-berita">Lihat Selengkapnya...</a>
    </div>
    </section>

    <!-- SOSIAL MEDIA -->
    <div class="sosmed-container">
        <h2 class="title text-center py-2">SOSIAL MEDIA</h2>
        <div class="social-media">
            @foreach($sosmed as $s)
                <a href="{{ $s->url }}">
                    <img src="{{ asset('img/' . $s->name) }}" alt="{{ $s->name }}">
                </a>
            @endforeach
        </div>
        <a href="{{ route('admin.sosmed_mts.edit') }}" class="link-admin-sosmed">
            <h3 class="text-center py-2">MTs NURUL FIRDAUS MANGGARMAS</h3>
        </a>
    </div>


     <!-- FOOTER -->
     <div class="footer">
        <p class="text-center mt-3">Copyright © 2025 | YAYASAN NURUL FIRDAUS <br> Design by TIM MAGANG TIKSI USM</p>
    </div>


    <script src="{{ asset('js/ma.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>