<div class="table-responsive">
    <table id="students-table" class="table table-striped table-hover">
        <thead class="bg-success text-light">
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>NISN</th>
                <th>Asal Sekolah</th>
                <th>Program Pilihan</th>
                <th>Status Verifikasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $index => $student)
            <tr class="text-center">
                <td>{{ ($students->currentPage() - 1) * $students->perPage() + $index + 1 }}</td>
                <td>{{ $student->nama_lengkap }}</td>
                <td>{{ \Carbon\Carbon::parse($student->created_at)->format('d-m-Y') }}</td>
                <td>{{ $student->nisn }}</td>
                <td>{{ $student->sekolah_asal }}</td>
                <td>{{ $student->program_pilihan }}</td>
                <td>
                    @if($student->status_verifikasi === 'Terverifikasi' || $student->status_verifikasi === 'Sudah Diverifikasi')
                        <span class="badge bg-success">Sudah Terverifikasi</span>
                    @else
                        <span class="badge bg-danger">Belum Terverifikasi</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $students->links() }}
    </div>
    
</div>