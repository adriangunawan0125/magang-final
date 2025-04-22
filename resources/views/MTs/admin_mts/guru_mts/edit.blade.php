<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru MTS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container-guru {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #4CAF50;
        }

        .form-control-file {
            width: 100%;
        }

        .img-preview {
            display: block;
            margin-top: 10px;
            width: 100px;
            border-radius: 5px;
            border: 2px solid #ddd;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
        }

        .btn-warning {
            background-color: #ffcc00;
            color: black;
        }

        .btn-danger {
            background-color: red;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .container-guru {
                max-width: 90%;
                padding: 20px;
            }

            .form-control {
                font-size: 14px;
                padding: 8px;
            }

            .btn {
                font-size: 14px;
                padding: 8px;
            }
        }

        @media (max-width: 480px) {
            .container-guru {
                max-width: 95%;
                padding: 15px;
            }

            h2 {
                font-size: 20px;
            }

            .form-control {
                font-size: 14px;
                padding: 7px;
            }

            .btn {
                font-size: 14px;
                padding: 7px;
            }

            .img-preview {
                width: 80px;
            }
        }
    </style>
</head>
<body>

<div class="container-guru">
    <h2>Edit</h2>

    <div class="form-guru">
        <form action="{{ route('admin.guru_mts.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="foto" class="file-label">Pilih Foto Guru</label>
                <input type="file" id="foto" name="foto" class="form-control-file">
                <small class="text-danger d-block ">*Maksimal ukuran foto: 2 MB</small>
                @if ($guru->foto)
                    <img src="{{ asset('uploads/guru/' . $guru->foto) }}" class="img-preview">
                @endif
            </div>

            <div class="form-group">
                <label for="nama">Nama Guru</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ $guru->nama }}" placeholder="Masukan Nama" required>
            </div>

            <div class="form-group">
                <label for="mapel">Mata Pelajaran</label>
                <input type="text" id="mapel" name="mapel" class="form-control" value="{{ $guru->mapel }}" placeholder="Masukan Mata Pelajaran" required>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="{{ route('admin.guru_mts.index') }}" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
