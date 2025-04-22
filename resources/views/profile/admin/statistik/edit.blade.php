<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Statistik</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .edit-statistik-container {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 20px;
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
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background: #f9f9f9;
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
            display: inline-block;
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
            .edit-statistik-container {
                padding: 15px;
            }

            .title {
                font-size: 18px;
            }

            input {
                padding: 8px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="edit-statistik-container">
        <h2 class="title">Edit Statistik</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.statistik_profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="peserta_didik">Peserta Didik</label>
                <input type="number" id="peserta_didik" name="peserta_didik" value="{{ old('peserta_didik', $statistic->peserta_didik) }}">
                @error('peserta_didik')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="rombel">Rombel</label>
                <input type="number" id="rombel" name="rombel" value="{{ old('rombel', $statistic->rombel) }}">
                @error('rombel')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="guru_tenaga_kependidikan">Guru & Tenaga Kependidikan</label>
                <input type="number" id="guru_tenaga_kependidikan" name="guru_tenaga_kependidikan" value="{{ old('guru_tenaga_kependidikan', $statistic->guru_tenaga_kependidikan) }}">
                @error('guru_tenaga_kependidikan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-save">Simpan</button>
                <a href="{{ url('admin/admin_profile') }}" class="btn btn-back">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
