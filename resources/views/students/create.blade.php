<!-- Formulir Pendaftaran -->
<section id="form-pendaftaran" class="pt-5 mt-4 pb-1 py-5">
    <div class="card-header pt-4 mt-4 bg-success">
        <h4 class="mb-3 mt-0 fw-bold text-center text-white">FORMULIR PENDAFTARAN</h4>
      </div>
    <div class="container mt-3">
        
        <form action="{{ url('students') }}" method="post" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
            {{ csrf_field() }}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="number" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN 10 Digit" required>
                </div>
                <div class="col-md-6">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="no_kk" class="form-label">No KK</label>
                    <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="Masukkan No KK 16 Digit" required>
                </div>
                <div class="col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK 16 Digit" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="" disabled selected>Pilih jenis kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <div class="col-md-6">
                    <label for="nama_ayah" class="form-label">Nama Ayah/Wali</label>
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah/Wali" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nama_ibu" class="form-label">Nama Ibu/Wali</label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu/Wali" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="no_hp" class="form-label">No HP (WA Aktif)</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No HP" required>
                </div>
                <div class="col-md-6">
                    <label for="sekolah_asal" class="form-label">Sekolah Asal</label>
                    <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" placeholder="Masukkan Sekolah Asal" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="prestasi" class="form-label">Prestasi</label>
                    <textarea class="form-control" id="prestasi" name="prestasi" rows="2" placeholder="Masukkan Prestasi"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="bukti_prestasi" class="form-label">Bukti Prestasi</label>
                    <input type="file" class="form-control" id="bukti_prestasi" name="bukti_prestasi" accept=".jpg,.jpeg,.png,.pdf">
                    <small class="text-muted">Unggah bukti prestasi berupa file JPG, PNG, atau PDF (maks. 2MB)</small>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="form-label">Program Pilihan</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="mts" name="program_pilihan" value="MTs" required>
                        <label class="form-check-label" for="mts">MTs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="ma" name="program_pilihan" value="MA" required>
                        <label class="form-check-label" for="ma">MA</label>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success px-5">Submit</button>
            </div>
        </form>
    </div>
</section>

<section>
    <div class="container mt-5 mb-5">
      <div class="text-center border p-4 rounded shadow-lg">
          <!-- WhatsApp Icon -->
          <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Icon" style="width: 100px; height: auto;">
          <!-- Text -->
          <p class="mt-3">
              Jika anda mengalami kendala dalam pengisian formulir pendaftaran, maka hubungi kami melalui chat WhatsApp:
          </p>
          <!-- Button -->
          <a href="https://wa.me/1234567890" target="_blank" class="btn btn-success px-4">
              Hubungi Kami
          </a>
      </div>
  </div>
  </section>
