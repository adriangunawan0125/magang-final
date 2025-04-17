<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kegiatan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #c1d2cc;
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: 500;
            margin-top: 10px;
            color: #444;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        button, .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }
        .btn-warning {
            background-color: #FFD700;
            color: black;
        }
        .btn-warning:hover {
            background-color: #e6c200;
        }
        .btn-danger {
            background-color: #DC3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        .btn-group a {
            flex: 1;
            margin-left: 5px;
        }
        .btn-group button {
            flex: 1;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Kegiatan</h2>
        <form action="{{ route('admin.kegiatan_ma.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="foto">Masukkan Gambar</label>
            <input type="file" id="foto" name="foto" accept="image/*">
            <small class="text-danger d-block ">*Maksimal ukuran foto: 2 MB</small>
            
            <label for="nama">Masukkan Nama Kegiatan</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Kegiatan" required>

            <div class="btn-group">
                <button type="submit" class="btn btn-warning">Selesai</button>
                <a href="{{ route('admin.kegiatan_ma.index') }}" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
