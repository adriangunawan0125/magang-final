<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
            background-color: #c1d2cc !important; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: "Poppins", sans-serif;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 20px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-bottom: 15px;
            border: 2px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #4CAF50;
        }

        .btn-submit {
            width: 100%;
            background-color: #FFD700;
            color: black;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .btn-submit:hover {
            background-color: #FFC107;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                width: 95%;
                padding: 15px;
            }

            .form-control {
                padding: 10px;
                font-size: 14px;
            }

            .btn-submit {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    @include('MA.admin_ma.navbar')

    <div class="form-container">
        <h2>Tambah Guru</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->has('foto'))
                <div style="font-size: 10px; color: red;">{{ $errors->first('foto') }}</div>
            @endif
            <label for="foto">Masukkan Gambar</label>
            <input type="file" name="foto" class="form-control">
            
            <label for="nama">Masukkan Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>

            <label for="mapel">Masukkan Nama Mapel</label>
            <input type="text" name="mapel" class="form-control" placeholder="Masukkan Nama Mapel" required>
            
            <button type="submit" class="btn-submit">Selesai</button>
        </form>
    </div>
</body>
</html>
