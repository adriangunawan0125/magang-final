<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MA Nurul Firdaus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style_ma.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#>
            <img src="{{ asset('img/logo-fix.png') }}" alt="Logo Yayasan">
        </a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-5">
                <li class="nav-item">
                    <a class="nav-link px-3 active" href="{{ url('/') }}">HOME</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">PROFILE</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">INFORMASI</a>
                </li>
            </ul>
        </div>
        <!-- Tombol PPDB -->
        <a href="#" class="btn btn-ppdb d-none d-lg-block">PPDB</a>

    </div>
</nav>


    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <h5 class="carousel-title">MA NURUL FIRDAUS</h5>
        <div class="carousel-indicators">
            @foreach ($carousels as $key => $carousel)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="true"></button>
            @endforeach
        </div>
       <div class="carousel-inner">
    @foreach ($carousels as $key => $carousel)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img src="{{ asset('uploads/carousel/'.$carousel->image) }}" class="d-block w-100" alt="{{ $carousel->title }}">
        </div>
    @endforeach
</div>
        <div class="carousel-caption position-absolute bottom-0 start-50 translate-middle-x text-center">
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


    <!-- Text Berjalan -->
    <div class="text-berjalan">
        <marquee behavior="scroll" direction="left" class="text">
            SELAMAT DATANG DI WEBSITE MA NURUL FIRDAUS
        </marquee>
    </div>

    <!-- Sambutan Kepala Sekolah -->
    <div class="sambutan-container">
        <h2 class="title">SAMBUTAN KEPALA SEKOLAH MA</h2>
        <div class="sambutan-content">
            <img src="{{ asset($sambutan->foto) }}" alt="Kepala Sekolah" class="sambutan-img">
            <h3 class="sambutan-nama">{{ $sambutan->nama }}</h3>
            <p class="sambutan-text">
                {{ $sambutan->sambutan }}
                
            </p>
        </div>
    </div>

    <!-- Tentang Kami -->
    <section class="tentang-kami section-bg pt-2 pb-2">
        <div class="card full-width-card">
            <div class="card-content">
                <h2 class="title pt-3">TENTANG KAMI</h2>
                <img src="{{ asset('img/foto1.jpg') }}" alt="Gambar Yayasan" class="img-fluid rounded shadow mt-3">
                <p class="mt-4 text-muted">
                    <strong>Yayasan Nurul Firdaus</strong> merupakan lembaga pendidikan Islam yang menaungi Madrasah Tsanawiyah (MTs)
                    dan Madrasah Aliyah (MA) Nurul Firdaus, yang berlokasi di Desa Manggarms, Kecamatan Godong,
                    Kabupaten Grobogan, Jawa Tengah. Berdiri sejak tahun 1985, yayasan ini didirikan dengan tujuan
                    memberikan pendidikan yang seimbang antara nilai-nilai agama Islam dan kurikulum modern.
                </p>
            </div>
        </div>
    </section>

    <!-- Guru Section -->
    <section class="guru-section">
        <h2 class="title">GURU - GURU</h2>
        <div class="guru-container">
            <button class="scroll-btn scroll-left" onclick="scrollGuru(-200)">&#10094;</button>
            <div class="guru-wrapper" id="guruScroll">
                
                @foreach ($guru as $data )
                <div class="guru-card">
                    <img src="{{ asset('uploads/guru/'. $data->foto) }}" alt="{{$data->nama}}">
                    <h5>{{$data->nama}}</h5>
                    <p>{{$data->mapel}}</p>
                </div>  
                @endforeach
            </div>
            <button class="scroll-btn scroll-right" onclick="scrollGuru(200)">&#10095;</button>
        </div>
    </section>



    <!-- Kegiatan -->
    <section class="kegiatan-section mt-2 mb-2">
        <h2 class="title">KEGIATAN</h2>
        <div class="kegiatan-container">
            @foreach ( $kegiatans as $k)
            <div class="kegiatan">
                <img src="{{ asset('storage/'. $k->foto) }}" alt="{{$k->nama}}" alt="Upacara 17 Agustus">
                <p>Upacara 17 Agustus</p>
            </div>
            @endforeach
        </div>
    </section>

   <!-- Berita Detail -->
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4">BERITA</h2>
    <div class="row gx-3 gy-3 justify-content-center"> 
        @forelse($berita->take(4) as $item)
            <div class="col-6 d-flex justify-content-center"> 
                <div class="border border-2 border-secondary rounded p-3 shadow-sm bg-white"
                    style="max-width: 340px; width: 100%;"> 
                    <div class="text-center">
                        <img src="{{ Storage::url($item->gambar) }}" alt="Gambar Berita"
                            class="img-fluid rounded shadow-sm"
                            style="max-height: 170px; width: 100%; object-fit: cover;"> 
                    </div>
                    <div class="mt-2 text-center">
                        <p class="fw-bold mb-1 text-truncate" style="font-size: 14px;">{{ $item->judul }}</p>
                        <p class="text-muted mb-2" style="font-size: 12px;">
                            <strong>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</strong><br>
                            MA Nurul Firdaus, Desa Manggarmas
                        </p>
                        <p class="text-muted berita-deskripsi text-truncate" style="font-size: 12px;">
                            {{ Str::limit($item->caption, 60) }}
                        </p>
                        <a href="{{ route('berita.show', $item->id) }}"
                            class="text-decoration-none fw-bold text-primary" style="font-size: 12px;">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada berita.</p>
        @endforelse
    </div>
    <div class="text-center mt-3 mb-5">
        <a href="/berita/home" class="btn text-white px-4 py-2 rounded shadow-sm"
            style="background-color: #006641; font-weight: bold; font-size: 14px;">Lihat Selengkapnya</a>
    </div>
</div>

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
        <a href="{{ route('admin.sosmed.edit') }}" class="link-admin-sosmed">
            <h3 class="text-center py-2">MA NURUL FIRDAUS MANGGARMAS</h3>
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
