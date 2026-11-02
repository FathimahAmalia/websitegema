@extends('admin.layout')

@section('title', 'Unggah Foto Galeri Baru')
@section('page_title', 'Unggah Foto')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Galeri">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Unggah Foto Dokumentasi Baru</h4>
            <p class="text-muted small mb-0">Publikasi album foto kegiatan praktikum, seminar industri, prestasi, dan agenda sekolah.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border btn-sm px-3 py-2 rounded-3 text-secondary">
            Batal
        </a>
        <button type="submit" form="formGaleri" class="btn-admin-primary">
            <i class="bi bi-cloud-arrow-up-fill"></i>
            <span>Simpan ke Galeri</span>
        </button>
    </div>
</div>

<form id="formGaleri" action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <!-- Main Form Column -->
        <div class="col-12 col-lg-8">
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-camera-fill text-primary fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Informasi & Metadata Dokumentasi</h6>
                    </div>
                    <span class="badge bg-light text-muted border small">Wajib Diisi</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label-modern">
                            <span>Judul Foto / Agenda Kegiatan <span class="text-danger">*</span></span>
                        </label>
                        <input type="text" name="title" id="title" class="form-control-modern fw-semibold fs-6" placeholder="Contoh: Praktikum Simulasi Audit Forensik Siber & Defense" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="category_label" class="form-label-modern">
                                <span>Kategori Album <span class="text-danger">*</span></span>
                            </label>
                            <select name="category_label" id="category_label" class="form-select-modern" required>
                                <option value="">Pilih Kategori...</option>
                                <option value="Agenda Sekolah" {{ old('category_label') === 'Agenda Sekolah' ? 'selected' : '' }}>Agenda Sekolah</option>
                                <option value="Pembelajaran Praktik" {{ old('category_label') === 'Pembelajaran Praktik' ? 'selected' : '' }}>Pembelajaran Praktik</option>
                                <option value="Prestasi Siswa" {{ old('category_label') === 'Prestasi Siswa' ? 'selected' : '' }}>Prestasi Siswa</option>
                                <option value="Ekstrakurikuler" {{ old('category_label') === 'Ekstrakurikuler' ? 'selected' : '' }}>Ekstrakurikuler</option>
                                <option value="Fasilitas Kampus" {{ old('category_label') === 'Fasilitas Kampus' ? 'selected' : '' }}>Fasilitas Kampus</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="form-label-modern">
                                <span>Tanggal Pelaksanaan Kegiatan</span>
                            </label>
                            <input type="text" name="date" id="date" class="form-control-modern" placeholder="Contoh: 14 Mei 2026" value="{{ old('date', date('d F Y')) }}">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="location" class="form-label-modern">
                                <span>Lokasi Kegiatan</span>
                            </label>
                            <input type="text" name="location" id="location" class="form-control-modern" placeholder="Contoh: Cyber Security Operation Center (SOC)" value="{{ old('location', 'Kampus SMK Gema Cyber School') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="photographer" class="form-label-modern">
                                <span>Fotografer / Kontributor Humas</span>
                            </label>
                            <input type="text" name="photographer" id="photographer" class="form-control-modern" placeholder="Contoh: Tim Humas & Publikasi" value="{{ old('photographer', 'Tim Humas & Publikasi Sekolah') }}">
                        </div>
                    </div>

                    <div class="mb-0">
                        <label for="description" class="form-label-modern">
                            <span>Keterangan / Narasi Foto</span>
                        </label>
                        <textarea name="description" id="description" rows="4" class="form-control-modern" placeholder="Tuliskan keterangan detail mengenai momen kegiatan ini...">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Meta / Sidebar Column -->
        <div class="col-12 col-lg-4">
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-image text-success fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Berkas Media Gambar</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="image_file" class="form-label-modern">
                            <span>Unggah Berkas Gambar <span class="text-danger">*</span></span>
                        </label>
                        <input type="file" name="image_file" id="image_file" class="form-control-modern" accept="image/*">
                        <div class="form-helper-text">Format didukung: JPG, PNG, WEBP (Maks: 4MB)</div>
                    </div>

                    <div class="mb-0">
                        <label for="image_url" class="form-label-modern">
                            <span>Atau Path Foto Relatif</span>
                        </label>
                        <input type="text" name="image_url" id="image_url" class="form-control-modern font-monospace" placeholder="images/galeri/wisuda.jpg" value="{{ old('image_url') }}">
                    </div>
                </div>
            </div>

            <button type="submit" form="formGaleri" class="btn-admin-primary w-100 justify-content-center py-2.5 mb-2">
                <i class="bi bi-cloud-arrow-up-fill"></i>
                <span>Simpan ke Galeri Foto</span>
            </button>
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border w-100 py-2 small text-secondary">
                Batal & Kembali
            </a>
        </div>
    </div>
</form>
@endsection
