<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<style>
    /* Navbar Style */
.navbar {
    background-color: #0B4B25; 
}

.navbar-brand img {
    height: 60px;
}

.nav-link {
    color: white !important;
    font-weight: 500;
}

.nav-link:hover {
    color: #FFD700 !important; 
}

.nav-item .active {
    color: #FFD700 !important; 
}

.btn-ppdb {
    background-color: #FFD700; 
    font-weight: bold;
    color: black !important;
    padding: 8px 15px;
    border-radius: 5px;
}

.btn-ppdb:hover {
    background-color: #E6C200;
}

.out-btn {
    transform: rotate(180deg);
    transition: transform 0.2s;
}

/* Tombol Kembali */
.btn-back {
    color: #FFD700;
    font-size: 24px;
    text-decoration: none;
    padding: 5px 10px;
}

.btn-back i {
    transition: transform 0.2s;
}

</style>
<body>
    
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <!-- Tombol Kembali -->
        <a href="/admin" class="out-btn btn btn-back">
            <i class="fas fa-sign-out-alt"></i>
        </a>


        <!-- Tombol Toggle untuk Mobile -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-5">
                <li class="nav-item">
                    <a class="nav-link px-3 active" href="#">HOME</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">PROFILE</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">PROGRAM PILIHAN</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">INFORMASI</a>
                </li>
            </ul>
        </div>

        <!-- Tombol PPDB -->
        <a href="{{ url('admin/students')}}" class="btn btn-ppdb d-none d-lg-block">PPDB</a>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
