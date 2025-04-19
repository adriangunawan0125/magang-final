<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sambutan Kepala Sekolah</title>
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

        .edit-sambutan-container {
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

        input[type="file"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background: #f9f9f9;
        }

        textarea {
            height: 100px;
            resize: vertical;
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

        /* Responsiveness */
        @media (max-width: 480px) {
            .edit-sambutan-container {
                padding: 15px;
            }

            .title {
                font-size: 18px;
            }

            input[type="text"], textarea {
                padding: 8px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="edit-sambutan-container">
        <h2 class="title">Edit Sambutan</h2>

        <form action="{{ route('admin.sambutan_mts.update') }}" method="POST" enctype="multipart/form-data" class="edit-sambutan">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="foto" class="file-label">Masukkan Foto Kepala Sekolah</label>
                <input type="file" id="foto" name="foto">
                <small class="text-danger d-block ">*Maksimal ukuran foto: 2 MB</small>
            </div>

            <div class="form-group">
                <label for="nama">Nama Kepala Sekolah</label>
                <input type="text" id="nama" name="nama" value="{{ $sambutan->nama ?? '' }}" placeholder="Masukkan Nama">
            </div>

            <div class="form-group">
                <label for="sambutan">Kalimat Sambutan</label>
                <textarea id="sambutan" name="sambutan" placeholder="Masukkan Kalimat Sambutan">{{ $sambutan->sambutan ?? '' }}</textarea>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-save">Simpan</button>
                <a href="/admin/admin_mts" class="btn btn-back">Kembali</a>
            </div>
        </form>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <script>
    document.getElementById("foto").addEventListener("change", function() {
        const file = this.files[0]; // Ambil file yang diunggah
        if (file && file.size > 2 * 1024 * 1024) { // 2 MB dalam bytes
            alert("Ukuran foto maksimal 2 MB. Silakan pilih foto lain.");
            this.value = ""; // Reset input file
        }
    });
</script>
</body>
</html>
