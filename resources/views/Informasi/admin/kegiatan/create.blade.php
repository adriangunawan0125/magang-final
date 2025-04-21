<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Gambar Carousel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #C4D7D1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 10px;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 6px 6px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #333;
            font-weight: bold;
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #222;
            text-align: left;
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
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #ffd700;
            color: black;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        }

        .btn-submit:hover {
            background-color: #e0c200;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
            display: none;
        }

        /* RESPONSIVE */
        @media screen and (max-width: 480px) {
            .container {
                max-width: 100%;
                padding: 15px;
            }
            .btn-submit {
                font-size: 14px;
                padding: 8px;
            }
            .form-control {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Gambar</h2>
        <form action="{{ route('admin.kegiatan_informasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <label for="nama">Nama Kegiatan</label>
            <input type="text" id="nama" name="nama" required class="form-control">
        
            <label for="image">Masukkan Gambar</label>
            <input type="file" id="image" name="foto" class="form-control">
        
            <p class="error-message" id="errorMessage"></p>
        
            <button type="submit" class="btn-submit" id="submitBtn">Selesai</button>
        </form>
        
    </div>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function(event) {
            var fileInput = document.getElementById('image');
            var errorMessage = document.getElementById('errorMessage');

            if (fileInput.files.length > 0) {
                var fileSize = fileInput.files[0].size / 1024 / 1024;

                if (fileSize > 2) { 
                    event.preventDefault(); 
                    errorMessage.textContent = "Ukuran gambar tidak boleh lebih dari 2MB!";
                    errorMessage.style.display = "block";
                } else {
                    errorMessage.style.display = "none";
                }
            }
        });
    </script>

</body>
</html>
 
