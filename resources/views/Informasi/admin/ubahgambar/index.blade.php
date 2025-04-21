<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 1100px;
            width: 90%;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: green;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        img {
            border-radius: 5px;
            border: 2px solid #ddd;
            width: 50px;
            height: auto;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            display: inline-block;
            text-decoration: none;
            margin: 5px;
        }

        .btn-edit { 
            background-color: #ffcc00; 
            color: black; 
        }
        .btn-edit:hover { 
            background-color: #e6b800; 
        }
        .btn-delete { 
            background-color: red; 
            color: white; 
        }
        .btn-delete:hover { 
            background-color: darkred; 
        }
        .btn-add { 
            background-color: green; 
            color: white; 
        }
        .btn-add:hover { 
            background-color: darkgreen; 
        }
        .btn-back { 
            background-color: orange; 
            color: white; 
        }
        .btn-back:hover { 
            background-color: darkorange; 
        }

        .action {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 5px;
        }
        .action form {
            display: inline-block;
        }

        @media (max-width: 1024px) {
            .container {
                width: 95%;
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 15px;
            }
            table {
                font-size: 14px;
            }
            th, td {
                padding: 8px;
            }
            .btn {
                padding: 8px 10px;
                font-size: 12px;
            }
            .btn-edit {
                padding: 8px 5px;
            }
        }

        @media (max-width: 480px) {
            .btn {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%; 
                font-size: 12px;
                padding: 10px;
            }
            .action {
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Carousel</h2>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        
<div class="container">
    <h2>Data Gambar Informasi</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Gambar Depan</th>
                    <th>Gambar Latar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gambars as $index => $gambar)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($gambar->gambar_depan)
                            <img src="{{ asset('img/' . $gambar->gambar_depan) }}" style="max-height: 100px;">
                        @else
                            <i class="fas fa-image" style="font-size: 30px; color: gray;"></i>
                        @endif
                    </td>
                    <td>
                        @if($gambar->gambar_latar)
                            <img src="{{ asset('img/' . $gambar->gambar_latar) }}" style="max-height: 100px;">
                        @else
                            <i class="fas fa-image" style="font-size: 30px; color: gray;"></i>
                        @endif
                    </td>
                    <td>
                        <div class="action">
                            <a href="{{ route('admin.informasi.edit', $gambar->id) }}" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.informasi.destroy', $gambar->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;" class="action">
        <a href="{{ route('admin.informasi.create') }}" class="btn btn-add">
            <i class="fas fa-plus"></i> Tambah Gambar
        </a>
        <a href="/admin/admin_mts" class="btn btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

    </div>
</body>
</html>

