<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Sosial Media</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 10px;
        }
        .container {
            max-width: 500px;
            width: 100%;
        }
        .form-container {
            background: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 600;
            color: #333;
        }
        .form-control {
            background: #f8f9fa;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }
        .form-control::placeholder {
            color: #b0b0b0;
        }
        .btn-simpan {
            background-color: #ffcc00;
            color: black;
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-simpan:hover {
            background-color: #e6b800;
        }
        .btn-kembali {
            background-color: #dc3545;
            color: white;
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-kembali:hover {
            background-color: #b02a37;
        }
        
        /* RESPONSIVE */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }
            .form-container {
                padding: 15px;
            }
            .btn {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center fw-bold">Link Sosial Media</h2>
    <div class="form-container mx-auto">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('sosmed_mts.update') }}" method="POST">
            @csrf

            @php
                $labels = ['TikTok', 'Facebook', 'LinkedIn', 'Instagram'];
            @endphp
            
            @foreach($sosmed as $key => $s)
                <div class="mb-3">
                    <label class="form-label">Link {{ $labels[$key] }}</label>
                    <input type="url" name="url[]" class="form-control" placeholder="Masukkan Link {{ $labels[$key] }}" value="{{ $s->url }}" required>
                    <input type="hidden" name="id[]" value="{{ $s->id }}">
                </div>
            @endforeach

            <div class="d-flex justify-content-center gap-3">
                <button type="submit" class="btn btn-simpan">Simpan</button>
                <a href="/admin_mts" class="btn btn-kembali">Kembali</a>
            </div>
        </form>
    </div>
</div>


</body> 
</html>
