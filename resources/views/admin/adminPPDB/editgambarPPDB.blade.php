@extends('Homepage.layout')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6">
        <h2 class="text-center fw-bold mb-4 text-dark"> Gambar Kegiatan</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm p-4">
            <form action="{{ route('admin.gambarKegiatan.update', $gambarKegiatan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="gambar" class="form-label fw-bold">Upload Gambar Baru</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-warning fw-bold px-4">Update</button>
                    <a href="{{ url('/admin/dashboardPPDB') }}" class="btn btn-danger fw-bold px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
