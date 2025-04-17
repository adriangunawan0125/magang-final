@extends('admin.layout')

@section('content')
<nav class="navbar navbar-light shadow-sm w-100">
    <div class=" d-flex align-items-center w-100">
        <img src="{{asset('asset\YAYASAN_NUFI[1].png')}}" alt="Logo" class="me-2" style="height: 100px; width:70px;">
        <a class="navbar-brand text-success fw-bold" href="#">YAYASAN NURUL FIRDAUS</a>
    </div>
</nav>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold text-dark">DAFTAR PPDB</h1>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger fw-bold">LOG OUT</button>
        </form>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover">
            <thead class="bg-success text-white">
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Program Pilihan</th>
                    <th>Status Verifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->nisn }}</td>
                        <td>{{ $student->nama_lengkap }}</td>
                        <td>{{ $student->program_pilihan }}</td>
                        <td><span class="badge bg-{{ $student->status_verifikasi == 'Terverifikasi' ? 'success' : 'warning' }}">{{ $student->status_verifikasi }}</span></td>
                        <td>
                            <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-sm btn-primary">Lihat Detail</a>
                            <form action="{{ route('admin.students.verify', $student->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Verifikasi</button>
                            </form>
                            <a href="{{ route('admin.students.download', $student->id) }}" class="btn btn-sm btn-info">Lihat Prestasi</a>
                            <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('export.excel') }}" class="btn btn-success fw-bold">Export Excel</a>
    </div>
    
    <div class="d-flex justify-content-center mt-3">
        {{ $students->links() }}
    </div>
</div>
@endsection
