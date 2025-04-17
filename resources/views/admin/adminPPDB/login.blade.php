@extends('admin.layout')

@section('content')

<style>
    html, body {
        height: 100vh;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    nav {
        width: 100vw; 
        position: fixed; 
        top: 0; 
        left: 0; 
        background-color: #00583A; 
        padding: 15px;
        z-index: 1000;
    }

    .content-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #ffffff;
        padding-top: 80px;
    }

    .content-wrapper h3{
        font-weight: 600;
    }
</style>



<nav class="d-flex justify-content-between align-items-center">
    <div>
        <img class="ms-4" src="{{ asset('asset/logo_nufi.png') }}" alt="Logo" style="max-width: 60px;">
    </div>
    <a href="{{ url('/') }}" class="text-white" style="font-size: 24px; text-decoration: none;">
        <img src="{{asset('asset/icon-pintu.png')}}" style="width: 30px;" class="me-4" alt="">
    </a>
</nav>

<div class="content-wrapper">
    <div class="text-center w-50">
        <h3 class="mt-3">Login Sebagai Admin</h3>
        <img class="mt-3 mb-3" src="{{ asset('asset/logo_nufi.png') }}" alt="Logo Sekolah" style="max-width: 100px;">
    
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="p-4 mt-3 mb-3 rounded" style="background-color: #f0f0f0;">
            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" required>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password" required>
                </div>
      
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn text-white w-25" style="background-color: #00583A;">
                Login
            </button>
        </div>
    </form>
    </div>
</div>

@endsection
