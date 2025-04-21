@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Visi, Misi & Background</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.profile_visimisi.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Visi --}}
        <div class="mb-3">
            <label for="visi" class="form-label">Visi</label>
            <textarea class="form-control @error('visi') is-invalid @enderror" name="visi" id="visi" rows="3">{{ old('visi', $profile->visi) }}</textarea>
            @error('visi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Misi --}}
        <div class="mb-3">
            <label for="misi" class="form-label">Misi</label>
            <textarea class="form-control @error('misi') is-invalid @enderror" name="misi" id="misi" rows="6">{{ old('misi', $profile->misi) }}</textarea>
            @error('misi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Background Image --}}
        <div class="mb-3">
            <label for="background_image" class="form-label">Background (opsional)</label>
            <input class="form-control @error('background_image') is-invalid @enderror" type="file" name="background_image" id="background_image">
            @error('background_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Menampilkan Gambar Saat Ini --}}
            @if ($profile->background_image)
                <div class="mt-2">
                    <p>Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $profile->background_image) }}" alt="Background" style="max-width: 300px;">
                </div>
            @endif
        </div>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.profile_visimisi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
