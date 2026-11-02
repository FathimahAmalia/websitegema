@extends('admin.layout')

@section('title', 'Tulis Berita Baru')
@section('page_title', 'Tulis Berita')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Daftar Berita">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Tulis Publikasi Berita Baru</h4>
            <p class="text-muted small mb-0">Publikasi warta prestasi, kurikulum sekolah, agenda vokasi, dan rilis pengumuman resmi.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.berita.index') }}" class="btn btn-light border btn-sm px-3 py-2 rounded-3 text-secondary">
            Batal
        </a>
        <button type="submit" form="formBerita" class="btn-admin-primary">
            <i class="bi bi-cloud-arrow-up-fill"></i>
            <span>Terbitkan Berita</span>
        </button>
    </div>
</div>

<form id="formBerita" action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <!-- Main Form Column -->
        <div class="col-12 col-lg-8">
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-file-earmark-text-fill text-primary fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Konten & Naskah Artikel</h6>
                    </div>
                    <span class="badge bg-light text-muted border small">Wajib Diisi</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label-modern">
                            <span>Judul Artikel Berita <span class="text-danger">*</span></span>
                        </label>
                        <input type="text" name="title" id="title" class="form-control-modern fw-semibold fs-6" placeholder="Masukkan judul berita yang menarik, faktual, dan informatif..." value="{{ old('title') }}" required>
                        @error('title')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label-modern">
                            <span>Ringkasan / Excerpt Berita <span class="text-danger">*</span></span>
                        </label>
                        <textarea name="excerpt" id="excerpt" rows="3" class="form-control-modern" placeholder="Tuliskan 1-2 kalimat ringkasan singkat artikel untuk ditampilkan pada feed/preview..." required>{{ old('excerpt') }}</textarea>
                        <div class="form-helper-text">Maksimal 500 karakter. Ditampilkan pada cuplikan beranda dan kartu berita publik.</div>
                        @error('excerpt')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label for="body" class="form-label-modern">
                            <span>Isi Konten Lengkap Berita <span class="text-danger">*</span></span>
                        </label>
                        <textarea name="body" id="body" rows="14" class="form-control-modern font-monospace fs-6" placeholder="Ketik isi artikel lengkap di sini (mendukung paragraf HTML <p>, <h4>, <ul>, dsb)..." required>{{ old('body') }}</textarea>
                        <div class="form-helper-text">Mendukung format HTML standar untuk paragraf, heading, dan daftar poin.</div>
                        @error('body')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Meta / Sidebar Column -->
        <div class="col-12 col-lg-4">
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-sliders text-info fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Pengaturan Publikasi</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="category" class="form-label-modern">
                            <span>Kategori Berita <span class="text-danger">*</span></span>
                        </label>
                        <select name="category" id="category" class="form-select-modern" required>
                            <option value="">Pilih Kategori...</option>
                            <option value="Prestasi" {{ old('category') === 'Prestasi' ? 'selected' : '' }}>Prestasi Siswa</option>
                            <option value="Kerjasama" {{ old('category') === 'Kerjasama' ? 'selected' : '' }}>Kerjasama Industri</option>
                            <option value="Akademik" {{ old('category') === 'Akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="Teknologi" {{ old('category') === 'Teknologi' ? 'selected' : '' }}>Teknologi & Lab</option>
                            <option value="Kegiatan" {{ old('category') === 'Kegiatan' ? 'selected' : '' }}>Kegiatan Siswa</option>
                            <option value="Pengumuman" {{ old('category') === 'Pengumuman' ? 'selected' : '' }}>Pengumuman Resmi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="published_at" class="form-label-modern">
                            <span>Tanggal Publikasi</span>
                        </label>
                        <input type="date" name="published_at" id="published_at" class="form-control-modern" value="{{ old('published_at', date('Y-m-d')) }}">
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label-modern">
                            <span>Nama Penulis / Sumber</span>
                        </label>
                        <input type="text" name="author" id="author" class="form-control-modern" placeholder="Humas SMK Gema Cyber" value="{{ old('author', 'Humas SMK Gema Cyber School') }}">
                    </div>

                    <div class="mb-3">
                        <label for="author_role" class="form-label-modern">
                            <span>Peran / Unit Penulis</span>
                        </label>
                        <input type="text" name="author_role" id="author_role" class="form-control-modern" placeholder="Tim Media Sekolah" value="{{ old('author_role', 'Tim Media SMK Gema Cyber School') }}">
                    </div>

                    <div class="mb-3">
                        <label for="read_time" class="form-label-modern">
                            <span>Estimasi Waktu Baca</span>
                        </label>
                        <input type="text" name="read_time" id="read_time" class="form-control-modern" placeholder="Contoh: 3 Menit Baca" value="{{ old('read_time', '3 Menit Baca') }}">
                    </div>

                    <div class="mb-0 p-3 bg-light rounded-3 border">
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold text-dark small" for="is_featured">
                                Tetapkan Berita Utama (Featured)
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-image text-success fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Foto Sampul (Thumbnail)</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="image_file" class="form-label-modern">
                            <span>Unggah Berkas Gambar</span>
                        </label>
                        <input type="file" name="image_file" id="image_file" class="form-control-modern" accept="image/*">
                        <div class="form-helper-text">Format: JPG, PNG, WEBP (Maks: 3MB)</div>
                    </div>

                    <div class="mb-3">
                        <label for="image_url" class="form-label-modern">
                            <span>Atau Path Gambar Relatif</span>
                        </label>
                        <input type="text" name="image_url" id="image_url" class="form-control-modern font-monospace" placeholder="images/berita-lks-cyber.png" value="{{ old('image_url') }}">
                    </div>

                    <div class="mb-3">
                        <label for="image_caption" class="form-label-modern">
                            <span>Keterangan Foto (Caption)</span>
                        </label>
                        <input type="text" name="image_caption" id="image_caption" class="form-control-modern" placeholder="Contoh: Dokumentasi penyerahan trofi juara..." value="{{ old('image_caption') }}">
                    </div>

                    <div class="mb-0">
                        <label for="tags" class="form-label-modern">
                            <span>Tagar (Pisahkan koma)</span>
                        </label>
                        <input type="text" name="tags" id="tags" class="form-control-modern" placeholder="LKS 2026, Prestasi, TJKT" value="{{ old('tags') }}">
                    </div>
                </div>
            </div>

            <button type="submit" form="formBerita" class="btn-admin-primary w-100 justify-content-center py-2.5 mb-2">
                <i class="bi bi-cloud-arrow-up-fill"></i>
                <span>Terbitkan Berita Baru</span>
            </button>
            <a href="{{ route('admin.berita.index') }}" class="btn btn-light border w-100 py-2 small text-secondary">
                Batal & Kembali
            </a>
        </div>
    </div>
</form>
@endsection
