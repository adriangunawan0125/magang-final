<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 10px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            color: #333;
            font-size: 1.5rem;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: 500;
            text-align: left;
        }
        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 20px;
            gap: 10px;
        }
        .btn {
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            text-align: center;
            flex: 1;
            transition: all 0.3s ease;
        }
        .btn-save {
            background-color: #FFD700;
            color: black;
        }
        .btn-save:hover {
            background-color: gold;
            transform: scale(1.05);
        }
        .btn-back {
            background-color: #FF0000;
            color: white;
        }
        .btn-back:hover {
            background-color: darkred;
            transform: scale(1.05);
        }
        img {
            margin-top: 10px;
            width: 100px;
            border-radius: 5px;
        }

        /* Responsive untuk layar kecil (max-width 480px) */
        @media (max-width: 480px) {
            .container {
                padding: 15px;
                width: 100%;
                max-width: 90%;
            }
            h2 {
                font-size: 1.2rem;
            }
            .btn {
                font-size: 14px;
                padding: 10px;
            }
            img {
                width: 80px;
            }
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h2>Edit </h2>
    
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('admin.kegiatan_ppdb.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            <label for="nama">Nama Kegiatan</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $kegiatan->nama) }}" required placeholder="Masukkan Nama" class="form-control">
    
            <label for="foto">Masukkan Foto Baru</label>
            <input type="file" id="foto" name="foto" accept="image/*" class="form-control">
            <small class="text-danger d-block">*Maksimal ukuran foto: 2 MB</small>
    
            @if ($kegiatan->foto)
                <p>Gambar Saat Ini:</p>
                <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="Foto Kegiatan" style="max-width: 300px; height: auto; margin-top: 10px;">
            @else
                <p>Tidak ada gambar.</p>
            @endif
    
            <div class="button-container" style="margin-top: 20px;">
                <button type="submit" class="btn btn-save">Simpan</button>
                <a href="{{ route('admin.kegiatan_ppdb.index') }}" class="btn btn-back">Kembali</a>
            </div>
        </form>
    </div>
    
    

</body>
</html>
