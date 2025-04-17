@extends('Homepage.layout')
@section('content')
<form action="{{ route('admin.gambarKegiatan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Upload Gambar:</label>
    <input type="file" name="gambar" required>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
