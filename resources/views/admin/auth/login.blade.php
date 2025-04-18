@extends('layouts.auth')

@section('content')
<style>
    /* Base styles */
    .kembali-btn {
        transition: background-color 0.3s, color 0.3s;
    }

    .kembali-icon {
        color: #F4DC00;
        transition: color 0.3s;
    }

    .kembali-btn:hover {
        background-color: #F4DC00;
        color: #00583A;
        border-color: #F4DC00;
    }

    .kembali-btn:hover .kembali-icon {
        color: #00583A;
    }

    .img-small {
        max-width: 150px !important;
    }

    .toggle-password {
        cursor: pointer;
        color: #6c757d;
        font-size: 18px;
        transition: color 0.3s;
    }

    .toggle-password:hover {
        color: #00583A;
    }

    /* Card styling */
    .card {
        width: 100%;
        max-width: 400px;
        margin: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        /* iPad and smaller tablets */
        .container {
            padding: 20px;
        }
        
        .card {
            width: 100%;
            max-width: 350px;
            padding: 20px;
        }
        
        h3 {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 576px) {
        /* Mobile devices */
        .container {
            padding: 15px;
        }
        
        .card {
            margin: 10px;
            padding: 15px;
            box-shadow: none;
            border: 1px solid #ddd;
        }
        
        .navbar {
            padding: 10px 15px;
        }
        
        .navbar-brand img {
            width: 30px;
            height: 30px;
        }
        
        .kembali-btn {
            padding: 5px 10px;
            font-size: 0.9rem;
        }
        
        h3 {
            font-size: 1.3rem;
        }
        
        .form-label {
            font-size: 0.9rem;
        }
        
        .form-control {
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
        }
        
        .btn {
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
        }
        
        .text-center img {
            width: 60px;
            height: 60px;
        }
    }

    @media (max-width: 375px) {
        .card {
            padding: 12px;
        }
        
        h3 {
            font-size: 1.2rem;
        }
        
        .form-control {
            font-size: 0.85rem;
        }
    }
</style>

    <nav class="navbar navbar-light shadow-sm p-3" style="background-color: #00583A;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo-fix.png') }}" alt="Logo" width="40" height="40">

            </a>
            <a href="{{ route('dashboard.beranda') }}" class="btn btn-outline-light kembali-btn">
                <i class="bi bi-box-arrow-right kembali-icon"></i>
            </a>
        </div>
    </nav>

    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="card shadow p-4" style="width: 400px;">
            <h3 class="text-center text-success fw-bold">Admin Login</h3>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger mt-3">
                    @foreach($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-3">
                <img src="{{ asset('images/logo-fix.png') }}" alt="Logo" width="80" height="80">

            </div>

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password-field" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password-field" class="form-control"
                            placeholder="Masukkan password" required>
                        <span class="input-group-text">
                            <i class="bi bi-eye-slash toggle-password" id="togglePassword"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Ingat Saya</label>
                </div>

                <button type="submit" class="btn w-100 text-white" style="background-color: #00583A;">Login</button>
            </form>

        </div>
    </div>

@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const passwordField = document.querySelector("#password-field");
        const togglePassword = document.querySelector("#togglePassword");

        togglePassword.addEventListener("click", function () {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                togglePassword.classList.remove("bi-eye-slash");
                togglePassword.classList.add("bi-eye");
            } else {
                passwordField.type = "password";
                togglePassword.classList.remove("bi-eye");
                togglePassword.classList.add("bi-eye-slash");
            }
        });
    });
</script>
