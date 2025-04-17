<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gambar Carousel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: left;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: 500;
            display: block;
            margin-bottom: 5px;
        }

        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background: #f9f9f9;
            box-sizing: border-box;
        }

        img {
            display: block;
            width: 100%;
            max-width: 300px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 2px solid #ddd;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
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

        .btn-cancel {
            background-color: red;
            color: white;
            transition: 0.3s;
        }

        .btn-cancel:hover {
            background-color: darkred;
        }

    
    </style>
</head>
<body>

    <div class="container">
        <h2>Edit Gambar Carousel</h2>

        <form action="{{ route('admin.carousel_mts.update', $carousel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="image">Gambar Saat Ini</label>
                <img src="{{ asset('uploads/carousel/'.$carousel->image) }}" alt="Gambar Carousel">
            </div>

            <div class="form-group">
                <label for="image">Pilih Gambar Baru</label>
                <input type="file" id="image" name="image">
                <small class="text-danger d-block ">*Maksimal ukuran foto: 2 MB</small>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.carousel_mts.index') }}" class="btn btn-cancel">
                    Batal
                </a>
            </div>
        </form>
    </div>

</body>
</html>
