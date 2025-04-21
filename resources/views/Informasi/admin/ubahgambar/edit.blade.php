@extends('layouts.admin') {{-- atau sesuaikan layout kamu --}}

@section('content')
<div class="container py-4">
    <h3 class="mb-3 text-center">Edit Gambar</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.informasi.update', $gambar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card p-4 mb-3"> 
            <div class="mb-3">
                <label class="form-label">Gambar Depan:</label><br>
                <input type="file" name="gambar_depan" class="form-control">
                @if ($gambar->gambar_depan)
                    <img src="{{ asset('img/' . $gambar->gambar_depan) }}" class="img-thumbnail mt-2" width="200">
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Latar Belakang:</label><br>
                <input type="file" name="gambar_latar" class="form-control">
                @if ($gambar->gambar_latar)
                    <img src="{{ asset('img/' . $gambar->gambar_latar) }}" class="img-thumbnail mt-2" width="200">
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-warning">Simpan</button>
        <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
    </form>
</div>
@endsection
