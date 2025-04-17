<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>
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
            border: 2px solid #ddd;
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
        <h2>Data Guru</h2>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guru as $key => $g)
                    <tr>
                        <td>{{ $guru->firstItem() + $key }}</td>
                        <td>{{ $g->nama }}</td>
                        <td>{{ $g->mapel }}</td>
                        <td>
                            @if($g->foto)
                                <img src="{{ asset('uploads/guru/' . $g->foto) }}" width="50">
                            @else
                                <i class="fas fa-user-circle" style="font-size: 30px; color: gray;"></i>
                            @endif
                        </td>
                        <td>
                            <div class="action" style="display: flex; align-items: center; justify-content: center;">
                                <a href="{{ route('admin.guru.edit', $g->id) }}" class="btn btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.guru.destroy', $g->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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

        <!-- Pagination -->
        <div class="pagination-container">
            {{ $guru->links('pagination::bootstrap-4') }}
        </div>

        <!-- Tombol Tambah & Kembali -->
        <div style="margin-top: 20px;">
            <a href="{{ route('admin.guru.create') }}" class="btn btn-add">
                <i class="fas fa-plus"></i> Tambah Guru
            </a>
            <a href="/admin/admin_ma" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = "/guru/" + id + "/delete"; 
            }
        }
    </script>
</body>
</html>
