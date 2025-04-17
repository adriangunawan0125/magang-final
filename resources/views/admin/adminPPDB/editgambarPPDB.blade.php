@extends('Homepage.layout')
@section('content')
<form action="{{ route('admin.gambarKegiatan.update', $gambarKegiatan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>Upload Gambar Baru:</label>
    <input type="file" name="gambar">
    <button type="submit" class="btn btn-warning">Update</button>
</form>
@endsection