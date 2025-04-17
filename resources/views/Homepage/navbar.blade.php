<style>
    /* Paksa semua nav-link di navbar jadi putih */
    nav.navbar .nav-link {
        color: white !important;
    }

    /* Hover tetap hijau */
    nav.navbar .nav-link:hover {
        color: rgb(219, 177, 13)!important;
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-success fixed-top navbar-dark px-5">
    <div class="container-fluid">
        <img src="{{ asset('asset/logo_nufi.png') }}" alt="Nurul Firdaus" width="60">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active ms-5" style="font-weight: 750 !important" aria-current="page" href="{{url('/')}}">BERANDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active ms-5" style="font-weight: 750 !important" href="#jadwal">JADWAL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active ms-5 fw-bold" style="font-weight: 750 !important" href="{{ url('/Homepage#jadwal') }}">PENGUMUMAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active ms-5 fw-bold" style="font-weight: 750 !important" href="{{ url('/#layanan-online') }}">LAYANAN ONLINE</a>
                </li>
            </ul>
            <a href="{{ url('/students') }}">
                <button type="button" class="fw-bold btn btn-info">PPDB</button>
            </a>
        </div>
    </div>
</nav>
