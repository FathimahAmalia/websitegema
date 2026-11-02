@extends('admin.layout')

@section('title', 'Tambah Ekstrakurikuler Baru')
@section('page_title', 'Tambah Ekstrakurikuler')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Daftar Ekskul">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Tambah Kegiatan Ekstrakurikuler</h4>
            <p class="text-muted small mb-0">Kelola kegiatan pembinaan minat bakat, riset sains teknologi, seni, dan keolahragaan.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-light border btn-sm px-3 py-2 rounded-3 text-secondary">
            Batal
        </a>
        <button type="submit" form="formEkskul" class="btn-admin-primary">
            <i class="bi bi-check-circle-fill"></i>
            <span>Simpan Ekskul</span>
        </button>
    </div>
</div>

<form id="formEkskul" action="{{ route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <!-- Main Form Column -->
        <div class="col-12 col-lg-8">
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-stars text-primary fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Profil & Jadwal Kegiatan</h6>
                    </div>
                    <span class="badge bg-light text-muted border small">Wajib Diisi</span>
                </div>
                <div class="card-body">
                    <div class="row g-3 mb-3">
                        <div class="col-md-7">
                            <label for="name" class="form-label-modern">
                                <span>Nama Ekstrakurikuler <span class="text-danger">*</span></span>
                            </label>
                            <input type="text" name="name" id="name" class="form-control-modern fw-semibold" placeholder="Contoh: Cyber Security Club" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="category" class="form-label-modern">
                                <span>Kategori Bidang <span class="text-danger">*</span></span>
                            </label>
                            <select name="category" id="category" class="form-select-modern" required>
                                <option value="">Pilih Kategori...</option>
                                <option value="Teknologi & IT" {{ old('category') === 'Teknologi & IT' ? 'selected' : '' }}>Teknologi & IT</option>
                                <option value="Kepemimpinan & Bela Negara" {{ old('category') === 'Kepemimpinan & Bela Negara' ? 'selected' : '' }}>Kepemimpinan & Bela Negara</option>
                                <option value="Olahraga & E-Sport" {{ old('category') === 'Olahraga & E-Sport' ? 'selected' : '' }}>Olahraga & E-Sport</option>
                                <option value="Seni & Multimedia" {{ old('category') === 'Seni & Multimedia' ? 'selected' : '' }}>Seni & Multimedia</option>
                                <option value="Bahasa & Komunikasi" {{ old('category') === 'Bahasa & Komunikasi' ? 'selected' : '' }}>Bahasa & Komunikasi</option>
                                <option value="Keagamaan & Karakter" {{ old('category') === 'Keagamaan & Karakter' ? 'selected' : '' }}>Keagamaan & Karakter</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tagline" class="form-label-modern">
                            <span>Slogan / Tagline Singkat</span>
                        </label>
                        <input type="text" name="tagline" id="tagline" class="form-control-modern" placeholder="Contoh: Ethical Hacking, Network Defense & CTF" value="{{ old('tagline') }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label-modern">
                            <span>Deskripsi Kegiatan Ekskul <span class="text-danger">*</span></span>
                        </label>
                        <textarea name="description" id="description" rows="4" class="form-control-modern" placeholder="Jelaskan tujuan ekskul, kegiatan rutin mingguan, dan pembinaan kompetisi..." required>{{ old('description') }}</textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="days" class="form-label-modern">
                                <span>Hari Latihan Rutin</span>
                            </label>
                            <input type="text" name="days" id="days" class="form-control-modern" placeholder="Contoh: Rabu & Jumat" value="{{ old('days') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="time" class="form-label-modern">
                                <span>Waktu / Jam Latihan</span>
                            </label>
                            <input type="text" name="time" id="time" class="form-control-modern" placeholder="Contoh: 15.30 - 17.30 WIB" value="{{ old('time') }}">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="location" class="form-label-modern">
                                <span>Lokasi Tempat Latihan</span>
                            </label>
                            <input type="text" name="location" id="location" class="form-control-modern" placeholder="Contoh: Lab Cyber Security (Lt. 2)" value="{{ old('location') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="members_count" class="form-label-modern">
                                <span>Estimasi Anggota Aktif</span>
                            </label>
                            <input type="text" name="members_count" id="members_count" class="form-control-modern" placeholder="Contoh: 36 Siswa" value="{{ old('members_count', '30 Siswa') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="achievements" class="form-label-modern">
                            <span>Prestasi Unggulan Komunitas</span>
                        </label>
                        <textarea name="achievements" id="achievements" rows="2" class="form-control-modern" placeholder="Juara 1 LKS Tingkat Kota 2025, Finalis Cyber Defense Competition...">{{ old('achievements') }}</textarea>
                    </div>

                    <div class="mb-0">
                        <label for="requirements" class="form-label-modern">
                            <span>Syarat Pendaftaran Anggota Baru</span>
                        </label>
                        <textarea name="requirements" id="requirements" rows="2" class="form-control-modern" placeholder="Terbuka untuk kelas X & XI semua jurusan...">{{ old('requirements') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Meta / Sidebar Column -->
        <div class="col-12 col-lg-4">
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-person-badge text-info fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Pembina & Tampilan Visual</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="instructor" class="form-label-modern">
                            <span>Nama Pembina / Pelatih</span>
                        </label>
                        <input type="text" name="instructor" id="instructor" class="form-control-modern" placeholder="Ir. Reza Firmansyah, CEH" value="{{ old('instructor') }}">
                    </div>

                    <div class="mb-3">
                        <label for="instructor_role" class="form-label-modern">
                            <span>Jabatan / Keahlian Pelatih</span>
                        </label>
                        <input type="text" name="instructor_role" id="instructor_role" class="form-control-modern" placeholder="Praktisi Cyber Security" value="{{ old('instructor_role') }}">
                    </div>

                    <div class="mb-3">
                        <label for="badge" class="form-label-modern">
                            <span>Badge Label</span>
                        </label>
                        <input type="text" name="badge" id="badge" class="form-control-modern" placeholder="Contoh: Unggulan IT" value="{{ old('badge') }}">
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-8">
                            <label for="icon" class="form-label-modern">
                                <span>Icon Bootstrap</span>
                            </label>
                            <input type="text" name="icon" id="icon" class="form-control-modern font-monospace" placeholder="bi-shield-lock-fill" value="{{ old('icon', 'bi-stars') }}">
                        </div>
                        <div class="col-4">
                            <label for="color" class="form-label-modern">
                                <span>Warna</span>
                            </label>
                            <input type="color" name="color" id="color" class="form-control-modern p-1" style="height: 42px;" value="{{ old('color', '#2563eb') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image_file" class="form-label-modern">
                            <span>Unggah Foto Dokumentasi</span>
                        </label>
                        <input type="file" name="image_file" id="image_file" class="form-control-modern" accept="image/*">
                    </div>

                    <div class="mb-0">
                        <label for="image_url" class="form-label-modern">
                            <span>Atau Path Gambar Relatif</span>
                        </label>
                        <input type="text" name="image_url" id="image_url" class="form-control-modern font-monospace" placeholder="images/ekskul/cyber-security.jpg" value="{{ old('image_url') }}">
                    </div>
                </div>
            </div>

            <button type="submit" form="formEkskul" class="btn-admin-primary w-100 justify-content-center py-2.5 mb-2">
                <i class="bi bi-check-circle-fill"></i>
                <span>Simpan Kegiatan Ekskul</span>
            </button>
            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-light border w-100 py-2 small text-secondary">
                Batal & Kembali
            </a>
        </div>
    </div>
</form>
@endsection
