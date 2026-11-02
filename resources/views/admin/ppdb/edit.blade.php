@extends('admin.layout')

@section('title', 'Edit Calon Siswa - ' . $ppdb->nama_lengkap)
@section('page_title', 'Edit Data PPDB')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.ppdb.show', $ppdb) }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Detail Siswa">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Edit Data Calon Siswa</h4>
            <p class="text-muted small mb-0">{{ $ppdb->nama_lengkap }} • Nomor Registrasi: <span class="font-monospace fw-bold text-primary">{{ $ppdb->nomor_pendaftaran }}</span></p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.ppdb.show', $ppdb) }}" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 d-inline-flex align-items-center gap-1.5">
            <i class="bi bi-person-bounding-box"></i>
            <span>Detail Berkas</span>
        </a>
        <a href="{{ route('admin.ppdb.index') }}" class="btn btn-light border btn-sm px-3 py-2 rounded-3 text-secondary">
            Batal
        </a>
        <button type="submit" form="formEditPpdb" class="btn-admin-primary">
            <i class="bi bi-save-fill"></i>
            <span>Simpan Perubahan</span>
        </button>
    </div>
</div>

<form id="formEditPpdb" action="{{ route('admin.ppdb.update', $ppdb) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Card 1: Data Identitas Calon Siswa -->
    <div class="card-form">
        <div class="card-header">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-person-vcard text-primary fs-5"></i>
                <h6 class="fw-bold text-dark mb-0">1. Data Identitas Pribadi Calon Siswa</h6>
            </div>
            <span class="badge bg-light text-muted border small font-monospace">{{ $ppdb->nomor_pendaftaran }}</span>
        </div>
        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="nama_lengkap" class="form-label-modern">
                        <span>Nama Lengkap Siswa <span class="text-danger">*</span></span>
                    </label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control-modern fw-semibold" value="{{ old('nama_lengkap', $ppdb->nama_lengkap) }}" required>
                    @error('nama_lengkap')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="nisn" class="form-label-modern">
                        <span>NISN (10 Digit)</span>
                    </label>
                    <input type="text" name="nisn" id="nisn" class="form-control-modern font-monospace" value="{{ old('nisn', $ppdb->nisn) }}">
                </div>
                <div class="col-md-3">
                    <label for="nik" class="form-label-modern">
                        <span>NIK Siswa (Sesuai KK)</span>
                    </label>
                    <input type="text" name="nik" id="nik" class="form-control-modern font-monospace" value="{{ old('nik', $ppdb->nik) }}">
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="jenis_kelamin" class="form-label-modern">
                        <span>Jenis Kelamin <span class="text-danger">*</span></span>
                    </label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select-modern" required>
                        <option value="Laki-laki" {{ old('jenis_kelamin', $ppdb->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $ppdb->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="tempat_lahir" class="form-label-modern">
                        <span>Tempat Lahir</span>
                    </label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control-modern" value="{{ old('tempat_lahir', $ppdb->tempat_lahir) }}">
                </div>
                <div class="col-md-4">
                    <label for="tanggal_lahir" class="form-label-modern">
                        <span>Tanggal Lahir</span>
                    </label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control-modern" value="{{ old('tanggal_lahir', $ppdb->tanggal_lahir ? $ppdb->tanggal_lahir->format('Y-m-d') : '') }}">
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="agama" class="form-label-modern">
                        <span>Agama</span>
                    </label>
                    <input type="text" name="agama" id="agama" class="form-control-modern" value="{{ old('agama', $ppdb->agama) }}">
                </div>
                <div class="col-md-8">
                    <label for="asal_sekolah" class="form-label-modern">
                        <span>Asal Sekolah (SMP / MTs) <span class="text-danger">*</span></span>
                    </label>
                    <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control-modern fw-semibold text-primary" value="{{ old('asal_sekolah', $ppdb->asal_sekolah) }}" required>
                </div>
            </div>

            <div class="mb-0">
                <label for="alamat" class="form-label-modern">
                    <span>Alamat Tempat Tinggal Lengkap</span>
                </label>
                <textarea name="alamat" id="alamat" rows="2" class="form-control-modern">{{ old('alamat', $ppdb->alamat) }}</textarea>
            </div>
        </div>
    </div>

    <!-- Card 2: Pilihan Jurusan & Jalur Masuk -->
    <div class="card-form">
        <div class="card-header">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-mortarboard text-success fs-5"></i>
                <h6 class="fw-bold text-dark mb-0">2. Pilihan Konsentrasi Keahlian & Status Seleksi</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="pilihan_jurusan_1" class="form-label-modern">
                        <span>Pilihan Jurusan 1 (Prioritas Utama) <span class="text-danger">*</span></span>
                    </label>
                    <select name="pilihan_jurusan_1" id="pilihan_jurusan_1" class="form-select-modern fw-semibold" required>
                        @foreach($jurusans as $j)
                            <option value="{{ $j->name }}" {{ old('pilihan_jurusan_1', $ppdb->pilihan_jurusan_1) === $j->name ? 'selected' : '' }}>{{ $j->name }} ({{ $j->short_name }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pilihan_jurusan_2" class="form-label-modern">
                        <span>Pilihan Jurusan 2 (Alternatif Cadangan)</span>
                    </label>
                    <select name="pilihan_jurusan_2" id="pilihan_jurusan_2" class="form-select-modern">
                        <option value="">Tidak memilih pilihan ke-2</option>
                        @foreach($jurusans as $j)
                            <option value="{{ $j->name }}" {{ old('pilihan_jurusan_2', $ppdb->pilihan_jurusan_2) === $j->name ? 'selected' : '' }}>{{ $j->name }} ({{ $j->short_name }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-3 mb-0">
                <div class="col-md-6">
                    <label for="jalur_pendaftaran" class="form-label-modern">
                        <span>Jalur Pendaftaran <span class="text-danger">*</span></span>
                    </label>
                    <select name="jalur_pendaftaran" id="jalur_pendaftaran" class="form-select-modern" required>
                        <option value="Reguler" {{ old('jalur_pendaftaran', $ppdb->jalur_pendaftaran) === 'Reguler' ? 'selected' : '' }}>Reguler Mandiri</option>
                        <option value="Prestasi Akademik" {{ old('jalur_pendaftaran', $ppdb->jalur_pendaftaran) === 'Prestasi Akademik' ? 'selected' : '' }}>Jalur Prestasi Nilai Rapor</option>
                        <option value="Prestasi Non-Akademik" {{ old('jalur_pendaftaran', $ppdb->jalur_pendaftaran) === 'Prestasi Non-Akademik' ? 'selected' : '' }}>Jalur Prestasi Kejuaraan / Minat Bakat</option>
                        <option value="Afirmasi KIP" {{ old('jalur_pendaftaran', $ppdb->jalur_pendaftaran) === 'Afirmasi KIP' ? 'selected' : '' }}>Afirmasi Bantuan Pendidikan / KIP</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label-modern">
                        <span>Status Seleksi & Verifikasi Berkas <span class="text-danger">*</span></span>
                    </label>
                    <select name="status" id="status" class="form-select-modern fw-bold" required>
                        <option value="Menunggu Verifikasi" {{ old('status', $ppdb->status) === 'Menunggu Verifikasi' ? 'selected' : '' }}>⏳ Menunggu Verifikasi (Pending)</option>
                        <option value="Diverifikasi" {{ old('status', $ppdb->status) === 'Diverifikasi' ? 'selected' : '' }}>📋 Diverifikasi (Berkas Lengkap)</option>
                        <option value="Diterima" {{ old('status', $ppdb->status) === 'Diterima' ? 'selected' : '' }}>✅ Diterima (Lolos Seleksi)</option>
                        <option value="Ditolak" {{ old('status', $ppdb->status) === 'Ditolak' ? 'selected' : '' }}>❌ Ditolak (Tidak Memenuhi Syarat)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3: Kontak & Data Orang Tua -->
    <div class="card-form">
        <div class="card-header">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-telephone text-info fs-5"></i>
                <h6 class="fw-bold text-dark mb-0">3. Kontak Siswa & Catatan Panitia</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="no_hp" class="form-label-modern">
                        <span>No. WhatsApp / HP Siswa <span class="text-danger">*</span></span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-success"><i class="bi bi-whatsapp"></i></span>
                        <input type="text" name="no_hp" id="no_hp" class="form-control-modern border-start-0" value="{{ old('no_hp', $ppdb->no_hp) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label-modern">
                        <span>Email Siswa</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control-modern border-start-0" value="{{ old('email', $ppdb->email) }}">
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="nama_orang_tua" class="form-label-modern">
                        <span>Nama Orang Tua / Wali Siswa</span>
                    </label>
                    <input type="text" name="nama_orang_tua" id="nama_orang_tua" class="form-control-modern" value="{{ old('nama_orang_tua', $ppdb->nama_orang_tua) }}">
                </div>
                <div class="col-md-6">
                    <label for="no_hp_orang_tua" class="form-label-modern">
                        <span>No. Telepon / WhatsApp Orang Tua</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-telephone"></i></span>
                        <input type="text" name="no_hp_orang_tua" id="no_hp_orang_tua" class="form-control-modern border-start-0" value="{{ old('no_hp_orang_tua', $ppdb->no_hp_orang_tua) }}">
                    </div>
                </div>
            </div>

            <div class="mb-0">
                <label for="catatan_admin" class="form-label-modern">
                    <span>Catatan Panitia PPDB (Internal)</span>
                </label>
                <textarea name="catatan_admin" id="catatan_admin" rows="3" class="form-control-modern" placeholder="Tulis catatan mengenai kelengkapan berkas fisik, riwayat wawancara, atau disposisi panitia...">{{ old('catatan_admin', $ppdb->catatan_admin) }}</textarea>
            </div>
        </div>
    </div>

    <!-- Submit Bar -->
    <div class="d-flex justify-content-end gap-2 mb-4">
        <a href="{{ route('admin.ppdb.show', $ppdb) }}" class="btn btn-light border px-4 py-2 rounded-3 text-secondary">Batal</a>
        <button type="submit" form="formEditPpdb" class="btn-admin-primary px-4 py-2.5">
            <i class="bi bi-save-fill"></i>
            <span>Simpan Perubahan Data Calon Siswa</span>
        </button>
    </div>
</form>
@endsection
