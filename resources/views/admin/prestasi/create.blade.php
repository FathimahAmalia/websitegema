@extends('admin.layout')

@section('title', 'Tambah Prestasi Siswa Baru')
@section('page_title', 'Tambah Prestasi')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Daftar Prestasi">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Tambah Catatan Prestasi Siswa</h4>
            <p class="text-muted small mb-0">Catat raihan medali, kejuaraan LKS, olimpiade vokasi, dan Wall of Fame siswa.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-light border btn-sm px-3 py-2 rounded-3 text-secondary">
            Batal
        </a>
        <button type="submit" form="formPrestasi" class="btn-admin-primary">
            <i class="bi bi-check-circle-fill"></i>
            <span>Simpan Prestasi</span>
        </button>
    </div>
</div>

<form id="formPrestasi" action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <!-- Main Form Column (Left) -->
        <div class="col-12 col-lg-8">
            <!-- Card 1: Data Pokok Kejuaraan -->
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-trophy text-warning fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Informasi Capaian & Kejuaraan</h6>
                    </div>
                    <span class="badge bg-light text-muted border small">Wajib Diisi</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label-modern">
                            <span>Judul Capaian Prestasi <span class="text-danger">*</span></span>
                        </label>
                        <input type="text" name="title" id="title" class="form-control-modern fw-semibold fs-6" placeholder="Contoh: Juara 1 LKS Tingkat Nasional Bidang Cloud Computing & Cyber Defense" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-7">
                            <label for="event" class="form-label-modern">
                                <span>Nama Ajang / Event Kompetisi <span class="text-danger">*</span></span>
                            </label>
                            <input type="text" name="event" id="event" class="form-control-modern" placeholder="Contoh: Lomba Kompetensi Siswa (LKS) SMK Tingkat Nasional 2025" value="{{ old('event') }}" required>
                            @error('event')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="medal" class="form-label-modern">
                                <span>Medali / Predikat Juara <span class="text-danger">*</span></span>
                            </label>
                            <input type="text" name="medal" id="medal" class="form-control-modern" placeholder="Contoh: Medali Emas / Juara 1" value="{{ old('medal', 'Medali Emas / Juara 1') }}" required>
                            @error('medal')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="students" class="form-label-modern">
                                <span>Nama Siswa Pemenang <span class="text-danger">*</span></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-people"></i></span>
                                <input type="text" name="students" id="students" class="form-control-modern border-start-0" placeholder="Contoh: Muhammad Farhan Pratama (XII TJKT 1)" value="{{ old('students') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="instructor" class="form-label-modern">
                                <span>Guru Pembimbing / Pelatih</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-person-badge"></i></span>
                                <input type="text" name="instructor" id="instructor" class="form-control-modern border-start-0" placeholder="Contoh: Dimas Prasetyo, M.Kom" value="{{ old('instructor') }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label-modern">
                            <span>Deskripsi Kejuaraan <span class="text-danger">*</span></span>
                        </label>
                        <textarea name="description" id="description" rows="4" class="form-control-modern" placeholder="Jelaskan jalannya kompetisi, studi kasus yang diselesaikan, dan rincian skor kemenangan..." required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label for="highlights" class="form-label-modern">
                            <span>Highlight Keunggulan (1 baris per poin)</span>
                            <span class="badge bg-light text-muted border font-monospace">1 baris = 1 poin</span>
                        </label>
                        <textarea name="highlights" id="highlights" rows="3" class="form-control-modern font-monospace" placeholder="Nilai sempurna 100/100 pada modul Live Incident Response&#10;Dianugerahi Medallion for Excellence dari asosiasi industri&#10;Mendapatkan beasiswa penuh program sarjana">{{ old('highlights') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Configuration Column (Right) -->
        <div class="col-12 col-lg-4">
            <div class="card-form mb-4">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-sliders text-primary fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Klasifikasi & Penyelenggara</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="level" class="form-label-modern">
                            <span>Tingkat Kompetisi <span class="text-danger">*</span></span>
                        </label>
                        <select name="level" id="level" class="form-select-modern" required>
                            <option value="Tingkat Nasional" {{ old('level') === 'Tingkat Nasional' ? 'selected' : '' }}>Tingkat Nasional</option>
                            <option value="Tingkat Provinsi" {{ old('level') === 'Tingkat Provinsi' ? 'selected' : '' }}>Tingkat Provinsi</option>
                            <option value="Tingkat Kota / Wilayah" {{ old('level') === 'Tingkat Kota / Wilayah' ? 'selected' : '' }}>Tingkat Kota / Wilayah</option>
                            <option value="Tingkat Internasional" {{ old('level') === 'Tingkat Internasional' ? 'selected' : '' }}>Tingkat Internasional</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label-modern">
                            <span>Kategori Bidang <span class="text-danger">*</span></span>
                        </label>
                        <select name="category" id="category" class="form-select-modern" required>
                            <option value="Teknologi & IT" {{ old('category') === 'Teknologi & IT' ? 'selected' : '' }}>Teknologi & IT</option>
                            <option value="Bisnis & Akuntansi" {{ old('category') === 'Bisnis & Akuntansi' ? 'selected' : '' }}>Bisnis & Akuntansi</option>
                            <option value="Manajemen Perkantoran" {{ old('category') === 'Manajemen Perkantoran' ? 'selected' : '' }}>Manajemen Perkantoran</option>
                            <option value="Olahraga & E-Sport" {{ old('category') === 'Olahraga & E-Sport' ? 'selected' : '' }}>Olahraga & E-Sport</option>
                            <option value="Seni & Bahasa" {{ old('category') === 'Seni & Bahasa' ? 'selected' : '' }}>Seni & Bahasa</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label-modern">
                            <span>Tahun Capaian <span class="text-danger">*</span></span>
                        </label>
                        <input type="text" name="year" id="year" class="form-control-modern font-monospace" placeholder="2026" value="{{ old('year', date('Y')) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="organizer" class="form-label-modern">
                            <span>Lembaga Penyelenggara</span>
                        </label>
                        <input type="text" name="organizer" id="organizer" class="form-control-modern" placeholder="Kemendikbudristek RI / Puspresnas" value="{{ old('organizer') }}">
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label-modern">
                            <span>Lokasi Pelaksanaan</span>
                        </label>
                        <input type="text" name="location" id="location" class="form-control-modern" placeholder="Jakarta Convention Center (JCC)" value="{{ old('location') }}">
                    </div>

                    <div class="mb-3">
                        <label for="image_file" class="form-label-modern">
                            <span>Foto Penganugerahan / Trofi</span>
                        </label>
                        <div class="upload-dropzone-box" onclick="document.getElementById('image_file').click()">
                            <i class="bi bi-cloud-arrow-up-fill fs-2 text-primary d-block mb-1"></i>
                            <div class="small fw-semibold text-dark">Pilih Foto Dokumentasi Juara</div>
                            <small class="text-muted d-block" style="font-size: 0.72rem;">JPG, PNG, atau WebP (Maks. 3MB)</small>
                            <input type="file" name="image_file" id="image_file" class="d-none" accept="image/*">
                        </div>
                    </div>

                    <div class="mb-0">
                        <label for="image_url" class="form-label-modern">
                            <span>Atau Path Foto Default</span>
                        </label>
                        <input type="text" name="image_url" id="image_url" class="form-control-modern" placeholder="images/prestasi/lks-cyber-security.jpg" value="{{ old('image_url') }}">
                    </div>
                </div>
            </div>

            <div class="card-form p-3">
                <button type="submit" class="btn-admin-primary w-100 py-2.5 d-flex align-items-center justify-content-center gap-2 mb-2 fs-6">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Simpan Prestasi Siswa</span>
                </button>
                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-light border w-100 py-2 small fw-semibold text-secondary">
                    Batal & Kembali
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
