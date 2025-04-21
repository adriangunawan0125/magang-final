@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h3 class="mb-3 text-center">Tambah Gambar Informasi</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card p-4 mb-3">
            <div class="mb-3">
                <label class="form-label">Gambar Depan:</label>
                <input type="file" name="gambar_depan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Latar Belakang:</label>
                <input type="file" name="gambar_latar" class="form-control" required>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
