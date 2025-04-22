@extends('layouts.admin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body, html {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f4f4;
    }

    .tambah-gambar-container {
        max-width: 550px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .tambah-gambar-container h3 {
        font-weight: 600;
        text-align: center;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        font-weight: 500;
        margin-bottom: 6px;
        display: block;
    }

    input[type="file"] {
        padding: 10px;
        font-size: 14px;
        background-color: #f9f9f9;
        border-radius: 6px;
    }

    .btn-group {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-save {
        flex: 1;
        padding: 10px;
        background-color: #ffcc00;
        color: black;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        transition: 0.3s;
    }

    .btn-save:hover {
        background-color: #e6b800;
    }

    .btn-back {
        flex: 1;
        padding: 10px;
        background-color: red;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        transition: 0.3s;
        text-decoration: none;
        text-align: center;
    }

    .btn-back:hover {
        background-color: darkred;
    }

    .alert-danger ul {
        padding-left: 20px;
        margin: 0;
    }
</style>

<div class="tambah-gambar-container">
    <h3>Tambah Gambar Informasi</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="gambar_depan">Gambar Depan</label>
            <input type="file" name="gambar_depan" id="gambar_depan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gambar_latar">Gambar Latar Belakang</label>
            <input type="file" name="gambar_latar" id="gambar_latar" class="form-control" required>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn-save">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection
