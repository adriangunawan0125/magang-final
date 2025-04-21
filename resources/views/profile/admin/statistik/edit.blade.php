@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Statistik</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.statistik_profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Peserta Didik --}}
        <div class="mb-3">
            <label for="peserta_didik" class="form-label">Peserta Didik</label>
            <input type="number" class="form-control @error('peserta_didik') is-invalid @enderror" id="peserta_didik" name="peserta_didik" value="{{ old('peserta_didik', $statistic->peserta_didik) }}">
            @error('peserta_didik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Rombel --}}
        <div class="mb-3">
            <label for="rombel" class="form-label">Rombel</label>
            <input type="number" class="form-control @error('rombel') is-invalid @enderror" id="rombel" name="rombel" value="{{ old('rombel', $statistic->rombel) }}">
            @error('rombel')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Guru & Tenaga Kependidikan --}}
        <div class="mb-3">
            <label for="guru_tenaga_kependidikan" class="form-label">Guru & Tenaga Kependidikan</label>
            <input type="number" class="form-control @error('guru_tenaga_kependidikan') is-invalid @enderror" id="guru_tenaga_kependidikan" name="guru_tenaga_kependidikan" value="{{ old('guru_tenaga_kependidikan', $statistic->guru_tenaga_kependidikan) }}">
            @error('guru_tenaga_kependidikan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol Simpan --}}
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.profile_visimisi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
