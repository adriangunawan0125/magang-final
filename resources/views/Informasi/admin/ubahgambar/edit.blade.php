@extends('layouts.admin')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
        }

        .edit-gambar-container {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 20px;
            margin: 30px auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        input[type="file"] {
            padding: 10px;
            font-size: 14px;
        }

        .preview-img {
            display: block;
            margin-top: 10px;
            width: 100%;
            max-width: 200px;
            border-radius: 6px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn-save {
            background-color: #ffcc00;
            color: black;
            transition: 0.3s;
        }

        .btn-save:hover {
            background-color: #e6b800;
        }

        .btn-back {
            background-color: red;
            color: white;
            transition: 0.3s;
        }

        .btn-back:hover {
            background-color: darkred;
        }

        @media (max-width: 480px) {
            .edit-gambar-container {
                padding: 15px;
            }

            .title {
                font-size: 18px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>

    <div class="edit-gambar-container">
        <h2 class="title">Edit Gambar</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.informasi.update', $gambar->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="gambar_depan">Gambar Depan</label>
                <input type="file" name="gambar_depan" id="gambar_depan" class="form-control">
                @if ($gambar->gambar_depan)
                    <img src="{{ asset('img/' . $gambar->gambar_depan) }}" alt="Gambar Depan" class="preview-img">
                @endif
            </div>

            <div class="form-group">
                <label for="gambar_latar">Gambar Latar Belakang</label>
                <input type="file" name="gambar_latar" id="gambar_latar" class="form-control">
                @if ($gambar->gambar_latar)
                    <img src="{{ asset('img/' . $gambar->gambar_latar) }}" alt="Gambar Latar Belakang" class="preview-img">
                @endif
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-save">Simpan</button>
                <a href="{{ url()->previous() }}" class="btn btn-back">Kembali</a>
            </div>
        </form>
    </div>
@endsection
