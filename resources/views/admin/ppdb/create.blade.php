@extends('admin.layout')

@section('title', 'Input Calon Siswa Baru')
@section('page_title', 'Pendaftaran PPDB Baru')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.ppdb.index') }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Daftar PPDB">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Input Formulir Calon Siswa Baru</h4>
            <p class="text-muted small mb-0">Pendaftaran calon siswa baru jalur offline/langsung (Walk-in Registration).</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.ppdb.index') }}" class="btn btn-light border btn-sm px-3 py-2 rounded-3 text-secondary">
            Batal
        </a>
        <button type="submit" form="formPpdb" class="btn-admin-primary">
            <i class="bi bi-person-check-fill"></i>
            <span>Simpan Pendaftaran</span>
        </button>
    </div>
</div>

<form id="formPpdb" action="{{ route('admin.ppdb.store') }}" method="POST">
    @csrf

    <!-- Card 1: Data Identitas Calon Siswa -->
    <div class="card-form">
        <div class="card-header">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-person-vcard text-primary fs-5"></i>
                <h6 class="fw-bold text-dark mb-0">1. Data Identitas Pribadi Calon Siswa</h6>
            </div>
            <span class="badge bg-light text-muted border small">Biodata Pokok</span>
        </div>
        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="nama_lengkap" class="form-label-modern">
                        <span>Nama Lengkap Siswa <span class="text-danger">*</span></span>
                    </label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control-modern fw-semibold" placeholder="Contoh: Muhammad Bintang Pratama" value="{{ old('nama_lengkap') }}" required>
                    @error('nama_lengkap')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="nisn" class="form-label-modern">
                        <span>NISN (10 Digit)</span>
                    </label>
                    <input type="text" name="nisn" id="nisn" class="form-control-modern font-monospace" placeholder="0081234567" value="{{ old('nisn') }}">
                </div>
                <div class="col-md-3">
                    <label for="nik" class="form-label-modern">
                        <span>NIK Siswa (Sesuai KK)</span>
                    </label>
                    <input type="text" name="nik" id="nik" class="form-control-modern font-monospace" placeholder="327101..." value="{{ old('nik') }}">
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="jenis_kelamin" class="form-label-modern">
                        <span>Jenis Kelamin <span class="text-danger">*</span></span>
                    </label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select-modern" required>
                        <option value="Laki-laki" {{ old('jenis_kelamin') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="tempat_lahir" class="form-label-modern">
                        <span>Tempat Lahir</span>
                    </label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control-modern" placeholder="Contoh: Bandung" value="{{ old('tempat_lahir') }}">
                </div>
                <div class="col-md-4">
                    <label for="tanggal_lahir" class="form-label-modern">
                        <span>Tanggal Lahir</span>
                    </label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control-modern" value="{{ old('tanggal_lahir') }}">
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="agama" class="form-label-modern">
                        <span>Agama</span>
                    </label>
                    <input type="text" name="agama" id="agama" class="form-control-modern" placeholder="Islam, Kristen, dll" value="{{ old('agama', 'Islam') }}">
                </div>
                <div class="col-md-8">
                    <label for="asal_sekolah" class="form-label-modern">
                        <span>Asal Sekolah (SMP / MTs) <span class="text-danger">*</span></span>
                    </label>
                    <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control-modern fw-semibold text-primary" placeholder="Contoh: SMP Negeri 1 Bandung" value="{{ old('asal_sekolah') }}" required>
                </div>
            </div>

            <div class="mb-0">
                <label for="alamat" class="form-label-modern">
                    <span>Alamat Tempat Tinggal Lengkap</span>
                </label>
                <textarea name="alamat" id="alamat" rows="2" class="form-control-modern" placeholder="Nama Jalan, No. Rumah, RT/RW, Kelurahan, Kecamatan, Kota/Kabupaten...">{{ old('alamat') }}</textarea>
            </div>
        </div>
    </div>

    <!-- Card 2: Pilihan Jurusan & Jalur Masuk -->
    <div class="card-form">
        <div class="card-header">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-mortarboard text-success fs-5"></i>
                <h6 class="fw-bold text-dark mb-0">2. Pilihan Konsentrasi Keahlian & Jalur PPDB</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="pilihan_jurusan_1" class="form-label-modern">
                        <span>Pilihan Jurusan 1 (Prioritas Utama) <span class="text-danger">*</span></span>
                    </label>
                    <select name="pilihan_jurusan_1" id="pilihan_jurusan_1" class="form-select-modern fw-semibold" required>
                        <option value="">Pilih Program Keahlian...</option>
                        @foreach($jurusans as $j)
                            <option value="{{ $j->name }}" {{ old('pilihan_jurusan_1') === $j->name ? 'selected' : '' }}>{{ $j->name }} ({{ $j->short_name }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pilihan_jurusan_2" class="form-label-modern">
                        <span>Pilihan Jurusan 2 (Alternatif Cadangan)</span>
                    </label>
                    <select name="pilihan_jurusan_2" id="pilihan_jurusan_2" class="form-select-modern">
                        <option value="">Pilih Jurusan Cadangan (Opsional)...</option>
                        @foreach($jurusans as $j)
                            <option value="{{ $j->name }}" {{ old('pilihan_jurusan_2') === $j->name ? 'selected' : '' }}>{{ $j->name }} ({{ $j->short_name }})</option>
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
                        <option value="Reguler" {{ old('jalur_pendaftaran') === 'Reguler' ? 'selected' : '' }}>Reguler Mandiri</option>
                        <option value="Prestasi Akademik" {{ old('jalur_pendaftaran') === 'Prestasi Akademik' ? 'selected' : '' }}>Jalur Prestasi Nilai Rapor</option>
                        <option value="Prestasi Non-Akademik" {{ old('jalur_pendaftaran') === 'Prestasi Non-Akademik' ? 'selected' : '' }}>Jalur Prestasi Kejuaraan / Minat Bakat</option>
                        <option value="Afirmasi KIP" {{ old('jalur_pendaftaran') === 'Afirmasi KIP' ? 'selected' : '' }}>Afirmasi Bantuan Pendidikan / KIP</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label-modern">
                        <span>Status Awal Verifikasi Berkas <span class="text-danger">*</span></span>
                    </label>
                    <select name="status" id="status" class="form-select-modern" required>
                        <option value="Menunggu Verifikasi" {{ old('status') === 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi (Pending)</option>
                        <option value="Diverifikasi" {{ old('status') === 'Diverifikasi' ? 'selected' : '' }}>Diverifikasi (Berkas Lengkap)</option>
                        <option value="Diterima" {{ old('status') === 'Diterima' ? 'selected' : '' }}>Diterima Langsung</option>
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
                <h6 class="fw-bold text-dark mb-0">3. Kontak Siswa & Data Orang Tua</h6>
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
                        <input type="text" name="no_hp" id="no_hp" class="form-control-modern border-start-0" placeholder="081234567890" value="{{ old('no_hp') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label-modern">
                        <span>Email Siswa Aktif</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control-modern border-start-0" placeholder="siswa@gmail.com" value="{{ old('email') }}">
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-0">
                <div class="col-md-6">
                    <label for="nama_orang_tua" class="form-label-modern">
                        <span>Nama Orang Tua / Wali Siswa</span>
                    </label>
                    <input type="text" name="nama_orang_tua" id="nama_orang_tua" class="form-control-modern" placeholder="Nama Ayah / Ibu" value="{{ old('nama_orang_tua') }}">
                </div>
                <div class="col-md-6">
                    <label for="no_hp_orang_tua" class="form-label-modern">
                        <span>No. Telepon / WhatsApp Orang Tua</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-telephone"></i></span>
                        <input type="text" name="no_hp_orang_tua" id="no_hp_orang_tua" class="form-control-modern border-start-0" placeholder="081398765432" value="{{ old('no_hp_orang_tua') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Bar -->
    <div class="d-flex justify-content-end gap-2 mb-4">
        <a href="{{ route('admin.ppdb.index') }}" class="btn btn-light border px-4 py-2 rounded-3 text-secondary">Batal</a>
        <button type="submit" class="btn-admin-primary px-4 py-2.5">
            <i class="bi bi-person-check-fill"></i>
            <span>Simpan Pendaftaran Calon Siswa</span>
        </button>
    </div>
</form>
@endsection
