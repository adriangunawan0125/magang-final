<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Visi, Misi & Background</title>
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

        .edit-profile-container {
            width: 100%;
            max-width: 600px;
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
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background: #f9f9f9;
        }

        textarea {
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

        .image-preview {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 5px;
        }

        @media (max-width: 480px) {
            .edit-profile-container {
                padding: 15px;
            }

            .title {
                font-size: 18px;
            }

            textarea {
                padding: 8px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="edit-profile-container">
        <h2 class="title">Edit Visi, Misi & Background</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.profile_visimisi.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Visi --}}
            <div class="form-group">
                <label for="visi">Visi</label>
                <textarea name="visi" id="visi" rows="3" class="@error('visi') is-invalid @enderror">{{ old('visi', $profile->visi) }}</textarea>
                @error('visi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Misi --}}
            <div class="form-group">
                <label for="misi">Misi</label>
                <textarea name="misi" id="misi" rows="5" class="@error('misi') is-invalid @enderror">{{ old('misi', $profile->misi) }}</textarea>
                @error('misi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Background --}}
            <div class="form-group">
                <label for="background_image">Gambar Background (Opsional)</label>
                <input type="file" name="background_image" id="background_image" class="@error('background_image') is-invalid @enderror">
                <small class="text-muted">*Ukuran maksimal 2MB</small>
                @error('background_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                @if ($profile->background_image)
                    <div class="mt-2">
                        <p>Gambar saat ini:</p>
                        <img src="{{ asset('storage/' . $profile->background_image) }}" alt="Background" class="image-preview">
                    </div>
                @endif
            </div>

            <div class="button-group mt-4">
                <button type="submit" class="btn btn-save">Simpan</button>
                <a href="{{ url('admin/admin_profile') }}" class="btn btn-back">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("background_image").addEventListener("change", function () {
            const file = this.files[0];
            if (file && file.size > 2 * 1024 * 1024) {
                alert("Ukuran gambar maksimal 2 MB. Silakan pilih gambar lain.");
                this.value = "";
            }
        });
    </script>
</body>
</html>
