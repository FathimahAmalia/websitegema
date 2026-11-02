@extends('admin.layout')

@section('title', 'Edit Foto Galeri - ' . $galeri->title)
@section('page_title', 'Edit Foto Galeri')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Galeri">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Edit Dokumentasi Foto</h4>
            <p class="text-muted small mb-0">{{ $galeri->title }} • Kategori: {{ $galeri->category_label }}</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('galeri.index') }}" target="_blank" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 d-inline-flex align-items-center gap-1.5">
            <i class="bi bi-eye"></i>
            <span>Lihat di Web</span>
        </a>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border btn-sm px-3 py-2 rounded-3 text-secondary">
            Batal
        </a>
        <button type="submit" form="formEditGaleri" class="btn-admin-primary">
            <i class="bi bi-save-fill"></i>
            <span>Simpan Perubahan</span>
        </button>
    </div>
</div>

<form id="formEditGaleri" action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <!-- Main Form Column -->
        <div class="col-12 col-lg-8">
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-camera-fill text-primary fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Informasi & Metadata Dokumentasi</h6>
                    </div>
                    <span class="badge bg-light text-muted border small">ID: #{{ $galeri->id }}</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label-modern">
                            <span>Judul Foto / Agenda Kegiatan <span class="text-danger">*</span></span>
                        </label>
                        <input type="text" name="title" id="title" class="form-control-modern fw-semibold fs-6" value="{{ old('title', $galeri->title) }}" required>
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
                                @php
                                    $categories = ['Agenda Sekolah', 'Pembelajaran Praktik', 'Prestasi Siswa', 'Ekstrakurikuler', 'Fasilitas Kampus'];
                                @endphp
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ old('category_label', $galeri->category_label) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="form-label-modern">
                                <span>Tanggal Pelaksanaan Kegiatan</span>
                            </label>
                            <input type="text" name="date" id="date" class="form-control-modern" value="{{ old('date', $galeri->date) }}">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="location" class="form-label-modern">
                                <span>Lokasi Kegiatan</span>
                            </label>
                            <input type="text" name="location" id="location" class="form-control-modern" value="{{ old('location', $galeri->location) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="photographer" class="form-label-modern">
                                <span>Fotografer / Kontributor Humas</span>
                            </label>
                            <input type="text" name="photographer" id="photographer" class="form-control-modern" value="{{ old('photographer', $galeri->photographer) }}">
                        </div>
                    </div>

                    <div class="mb-0">
                        <label for="description" class="form-label-modern">
                            <span>Keterangan / Narasi Foto</span>
                        </label>
                        <textarea name="description" id="description" rows="4" class="form-control-modern">{{ old('description', $galeri->description) }}</textarea>
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
                    @if($galeri->image)
                        <div class="mb-3 text-center">
                            <div class="rounded-3 overflow-hidden border shadow-sm mb-2" style="max-height: 170px;">
                                <img src="{{ asset($galeri->image) }}" alt="Preview" class="w-100 h-100 object-fit-cover" onerror="this.src='{{ asset('images/galeri/wisuda.jpg') }}'">
                            </div>
                            <small class="text-muted d-block text-truncate font-monospace" style="font-size: 0.72rem;">{{ $galeri->image }}</small>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="image_file" class="form-label-modern">
                            <span>Ganti Berkas Gambar</span>
                        </label>
                        <input type="file" name="image_file" id="image_file" class="form-control-modern" accept="image/*">
                        <div class="form-helper-text">Biarkan kosong jika tidak ingin mengganti foto saat ini.</div>
                    </div>

                    <div class="mb-0">
                        <label for="image_url" class="form-label-modern">
                            <span>Atau Ubah Path Gambar</span>
                        </label>
                        <input type="text" name="image_url" id="image_url" class="form-control-modern font-monospace" value="{{ old('image_url', $galeri->image) }}">
                    </div>
                </div>
            </div>

            <button type="submit" form="formEditGaleri" class="btn-admin-primary w-100 justify-content-center py-2.5 mb-2">
                <i class="bi bi-save-fill"></i>
                <span>Simpan Perubahan Foto</span>
            </button>
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border w-100 py-2 small text-secondary">
                Batal & Kembali
            </a>
        </div>
    </div>
</form>
@endsection
