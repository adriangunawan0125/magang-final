<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan MA</title>
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
        <h2>Edit</h2>
        <form action="{{ route('admin.kegiatan_ma.update', $kegiatan_ma->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="nama">Nama Kegiatan</label>
            <input type="text" name="nama" value="{{ $kegiatan_ma->nama }}" required placeholder="Masukkan Nama">
            <label for="foto">Masukkan Foto Baru</label>
            <input type="file" name="foto" accept="image/*">
            <small class="text-danger d-block ">*Maksimal ukuran foto: 2 MB</small>
            @if($kegiatan_ma->foto)
                <p>Gambar Saat Ini:</p>
                <img src="{{ asset('storage/' . $kegiatan_ma->foto) }}">
            @endif
            <div class="button-container">
                <button type="submit" class="btn btn-save">Simpan</button>
                <a href="/admin/admin_ma" class="btn btn-back">Kembali</a>
            </div>
        </form>
    </div>

</body>
</html>
