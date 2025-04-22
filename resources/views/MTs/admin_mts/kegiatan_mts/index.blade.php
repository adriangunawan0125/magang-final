<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kegiatan MTS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
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
            width: 50px;
            height: 50px;
            object-fit: cover;
            border: 2px solid #ddd;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            margin: 5px;
        }
        .btn-edit {
            background-color: #ffcc00;
            color: black;
            transition: 0.3s;
        }
        .btn-edit:hover {
            background-color: #e6b800;
        }
        .btn-delete {
            background-color: red;
            color: white;
            transition: 0.3s;
        }
        .btn-delete:hover {
            background-color: darkred;
        }
        .btn-add {
            background-color: green;
            color: white;
            transition: 0.3s;
        }
        .btn-add:hover {
            background-color: darkgreen;
        }
        .btn-back {
            background-color: orange;
            color: white;
            transition: 0.3s;
        }
        .btn-back:hover {
            background-color: darkorange;
        }
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination .page-item.active .page-link {
            background-color: green;
            border-color: green;
            color: white;
        }
        .pagination .page-link {
            color: green;
        }
        .pagination .page-link:hover {
            background-color: #e6e6e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Kegiatan MTS</h2>
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kegiatans as $key => $kegiatan)
                    <tr>
                        <td>{{ $kegiatans->firstItem() + $key }}</td>
                        <td>{{ $kegiatan->nama }}</td>
                        <td>
                            @if($kegiatan->foto)
                                <img src="{{ asset('storage/' . $kegiatan->foto) }}">
                            @else
                                <i class="fas fa-image" style="font-size: 30px; color: gray;"></i>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.kegiatan_mts.edit', $kegiatan->id) }}" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.kegiatan_mts.destroy', $kegiatan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-container">
            {{ $kegiatans->links('pagination::bootstrap-4') }}
        </div>
        <div style="margin-top: 20px;">
            <a href="{{ route('admin.kegiatan_mts.create') }}" class="btn btn-add">
                <i class="fas fa-plus"></i> Tambah Kegiatan
            </a>
            <a href="/admin/admin_mts" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</body>
</html>