@extends('admin.layout')

@section('title', 'Edit Prestasi - ' . $prestasi->title)
@section('page_title', 'Edit Prestasi')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Daftar Prestasi">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Edit Catatan Prestasi Siswa</h4>
            <p class="text-muted small mb-0">Perbarui data medali, event kejuaraan, siswa pemenang, dan materi dokumentasi.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-light border btn-sm px-3 py-2 rounded-3 text-secondary">
            Batal
        </a>
        <button type="submit" form="formEditPrestasi" class="btn-admin-primary">
            <i class="bi bi-check-circle-fill"></i>
            <span>Simpan Perubahan</span>
        </button>
    </div>
</div>

<form id="formEditPrestasi" action="{{ route('admin.prestasi.update', $prestasi) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
                        <input type="text" name="title" id="title" class="form-control-modern fw-semibold fs-6" value="{{ old('title', $prestasi->title) }}" required>
                        @error('title')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-7">
                            <label for="event" class="form-label-modern">
                                <span>Nama Ajang / Event Kompetisi <span class="text-danger">*</span></span>
                            </label>
                            <input type="text" name="event" id="event" class="form-control-modern" value="{{ old('event', $prestasi->event) }}" required>
                            @error('event')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="medal" class="form-label-modern">
                                <span>Medali / Predikat Juara <span class="text-danger">*</span></span>
                            </label>
                            <input type="text" name="medal" id="medal" class="form-control-modern" value="{{ old('medal', $prestasi->medal) }}" required>
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
                                <input type="text" name="students" id="students" class="form-control-modern border-start-0" value="{{ old('students', $prestasi->students) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="instructor" class="form-label-modern">
                                <span>Guru Pembimbing / Pelatih</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-person-badge"></i></span>
                                <input type="text" name="instructor" id="instructor" class="form-control-modern border-start-0" value="{{ old('instructor', $prestasi->instructor) }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label-modern">
                            <span>Deskripsi Kejuaraan <span class="text-danger">*</span></span>
                        </label>
                        <textarea name="description" id="description" rows="4" class="form-control-modern" required>{{ old('description', $prestasi->description) }}</textarea>
                        @error('description')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    @php
                        $highlightsText = is_array($prestasi->highlights_list) 
                            ? implode("\n", $prestasi->highlights_list) 
                            : $prestasi->highlights;
                    @endphp

                    <div class="mb-0">
                        <label for="highlights" class="form-label-modern">
                            <span>Highlight Keunggulan (1 baris per poin)</span>
                            <span class="badge bg-light text-muted border font-monospace">1 baris = 1 poin</span>
                        </label>
                        <textarea name="highlights" id="highlights" rows="3" class="form-control-modern font-monospace">{{ old('highlights', $highlightsText) }}</textarea>
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
                            @php
                                $levels = ['Tingkat Nasional', 'Tingkat Provinsi', 'Tingkat Kota / Wilayah', 'Tingkat Internasional'];
                            @endphp
                            @foreach($levels as $lvl)
                                <option value="{{ $lvl }}" {{ old('level', $prestasi->level) === $lvl ? 'selected' : '' }}>{{ $lvl }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label-modern">
                            <span>Kategori Bidang <span class="text-danger">*</span></span>
                        </label>
                        <select name="category" id="category" class="form-select-modern" required>
                            @php
                                $cats = ['Teknologi & IT', 'Bisnis & Akuntansi', 'Manajemen Perkantoran', 'Olahraga & E-Sport', 'Seni & Bahasa'];
                            @endphp
                            @foreach($cats as $cat)
                                <option value="{{ $cat }}" {{ old('category', $prestasi->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label-modern">
                            <span>Tahun Capaian <span class="text-danger">*</span></span>
                        </label>
                        <input type="text" name="year" id="year" class="form-control-modern font-monospace" value="{{ old('year', $prestasi->year) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="organizer" class="form-label-modern">
                            <span>Lembaga Penyelenggara</span>
                        </label>
                        <input type="text" name="organizer" id="organizer" class="form-control-modern" value="{{ old('organizer', $prestasi->organizer) }}">
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label-modern">
                            <span>Lokasi Pelaksanaan</span>
                        </label>
                        <input type="text" name="location" id="location" class="form-control-modern" value="{{ old('location', $prestasi->location) }}">
                    </div>

                    <!-- Current Photo Preview -->
                    @if($prestasi->image)
                        <div class="mb-3">
                            <label class="form-label-modern"><span>Foto Dokumentasi Saat Ini</span></label>
                            <div class="table-thumb w-100 rounded-3 mb-1" style="height: 140px;">
                                <img src="{{ asset($prestasi->image) }}" alt="Preview" onerror="this.src='{{ asset('images/prestasi/lks-cyber-security.jpg') }}'">
                            </div>
                            <small class="text-muted d-block text-truncate" style="font-size: 0.72rem;">{{ $prestasi->image }}</small>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="image_file" class="form-label-modern">
                            <span>Ganti Foto Penganugerahan</span>
                        </label>
                        <div class="upload-dropzone-box" onclick="document.getElementById('image_file').click()">
                            <i class="bi bi-cloud-arrow-up-fill fs-2 text-primary d-block mb-1"></i>
                            <div class="small fw-semibold text-dark">Pilih Foto Baru</div>
                            <small class="text-muted d-block" style="font-size: 0.72rem;">JPG, PNG, atau WebP (Maks. 3MB)</small>
                            <input type="file" name="image_file" id="image_file" class="d-none" accept="image/*">
                        </div>
                    </div>

                    <div class="mb-0">
                        <label for="image_url" class="form-label-modern">
                            <span>Atau Ubah Path Foto</span>
                        </label>
                        <input type="text" name="image_url" id="image_url" class="form-control-modern" value="{{ old('image_url', $prestasi->image) }}">
                    </div>
                </div>
            </div>

            <div class="card-form p-3">
                <button type="submit" class="btn-admin-primary w-100 py-2.5 d-flex align-items-center justify-content-center gap-2 mb-2 fs-6">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Simpan Perubahan Prestasi</span>
                </button>
                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-light border w-100 py-2 small fw-semibold text-secondary">
                    Batal & Kembali
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
