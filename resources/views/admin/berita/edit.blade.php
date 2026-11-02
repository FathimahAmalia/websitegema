@extends('admin.layout')

@section('title', 'Edit Berita - ' . $berita->title)
@section('page_title', 'Edit Berita')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Daftar Berita">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Edit Publikasi Berita</h4>
            <p class="text-muted small mb-0">Perbarui naskah artikel, kategori warta, foto sampul, dan status keterbitan.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('berita.show', $berita->slug) }}" target="_blank" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 d-inline-flex align-items-center gap-1.5">
            <i class="bi bi-eye"></i>
            <span>Lihat di Web</span>
        </a>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-light border btn-sm px-3 py-2 rounded-3 text-secondary">
            Batal
        </a>
        <button type="submit" form="formEditBerita" class="btn-admin-primary">
            <i class="bi bi-save-fill"></i>
            <span>Simpan Perubahan</span>
        </button>
    </div>
</div>

<form id="formEditBerita" action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <!-- Main Form Column -->
        <div class="col-12 col-lg-8">
            <div class="card-form">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-file-earmark-text-fill text-primary fs-5"></i>
                        <h6 class="fw-bold text-dark mb-0">Konten & Naskah Artikel</h6>
                    </div>
                    <span class="badge bg-light text-muted border small">ID: #{{ $berita->id }}</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label-modern">
                            <span>Judul Artikel Berita <span class="text-danger">*</span></span>
                        </label>
                        <input type="text" name="title" id="title" class="form-control-modern fw-semibold fs-6" value="{{ old('title', $berita->title) }}" required>
                        @error('title')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label-modern">
                            <span>Ringkasan / Excerpt Berita <span class="text-danger">*</span></span>
                        </label>
                        <textarea name="excerpt" id="excerpt" rows="3" class="form-control-modern" required>{{ old('excerpt', $berita->excerpt) }}</textarea>
                        <div class="form-helper-text">Maksimal 500 karakter. Ditampilkan pada cuplikan beranda dan kartu berita publik.</div>
                        @error('excerpt')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label for="body" class="form-label-modern">
                            <span>Isi Konten Lengkap Berita <span class="text-danger">*</span></span>
                        </label>
                        <textarea name="body" id="body" rows="14" class="form-control-modern font-monospace fs-6" required>{{ old('body', $berita->body) }}</textarea>
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
                            @php
                                $cats = ['Prestasi', 'Kerjasama', 'Akademik', 'Teknologi', 'Kegiatan', 'Pengumuman'];
                            @endphp
                            @foreach($cats as $cat)
                                <option value="{{ $cat }}" {{ old('category', $berita->category) === $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="published_at" class="form-label-modern">
                            <span>Tanggal Publikasi</span>
                        </label>
                        <input type="date" name="published_at" id="published_at" class="form-control-modern" value="{{ old('published_at', $berita->published_at ? \Carbon\Carbon::parse($berita->published_at)->format('Y-m-d') : '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label-modern">
                            <span>Nama Penulis / Sumber</span>
                        </label>
                        <input type="text" name="author" id="author" class="form-control-modern" value="{{ old('author', $berita->author) }}">
                    </div>

                    <div class="mb-3">
                        <label for="author_role" class="form-label-modern">
                            <span>Peran / Unit Penulis</span>
                        </label>
                        <input type="text" name="author_role" id="author_role" class="form-control-modern" value="{{ old('author_role', $berita->author_role) }}">
                    </div>

                    <div class="mb-3">
                        <label for="read_time" class="form-label-modern">
                            <span>Estimasi Waktu Baca</span>
                        </label>
                        <input type="text" name="read_time" id="read_time" class="form-control-modern" value="{{ old('read_time', $berita->read_time) }}">
                    </div>

                    <div class="mb-0 p-3 bg-light rounded-3 border">
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $berita->is_featured) ? 'checked' : '' }}>
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
                    @if($berita->image)
                        <div class="mb-3 text-center">
                            <div class="rounded-3 overflow-hidden border shadow-sm mb-2" style="max-height: 170px;">
                                <img src="{{ asset($berita->image) }}" alt="Preview" class="w-100 h-100 object-fit-cover" onerror="this.src='{{ asset('images/berita-lks-cyber.png') }}'">
                            </div>
                            <small class="text-muted d-block text-truncate font-monospace" style="font-size: 0.72rem;">{{ $berita->image }}</small>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="image_file" class="form-label-modern">
                            <span>Ganti Berkas Gambar</span>
                        </label>
                        <input type="file" name="image_file" id="image_file" class="form-control-modern" accept="image/*">
                        <div class="form-helper-text">Biarkan kosong jika tidak ingin mengganti foto saat ini.</div>
                    </div>

                    <div class="mb-3">
                        <label for="image_url" class="form-label-modern">
                            <span>Atau Ubah Path Gambar</span>
                        </label>
                        <input type="text" name="image_url" id="image_url" class="form-control-modern font-monospace" value="{{ old('image_url', $berita->image) }}">
                    </div>

                    <div class="mb-3">
                        <label for="image_caption" class="form-label-modern">
                            <span>Keterangan Foto (Caption)</span>
                        </label>
                        <input type="text" name="image_caption" id="image_caption" class="form-control-modern" value="{{ old('image_caption', $berita->image_caption) }}">
                    </div>

                    <div class="mb-0">
                        <label for="tags" class="form-label-modern">
                            <span>Tagar (Pisahkan koma)</span>
                        </label>
                        @php
                            $tagsString = is_array($berita->tags_list) ? implode(', ', $berita->tags_list) : $berita->tags;
                        @endphp
                        <input type="text" name="tags" id="tags" class="form-control-modern" value="{{ old('tags', $tagsString) }}">
                    </div>
                </div>
            </div>

            <button type="submit" form="formEditBerita" class="btn-admin-primary w-100 justify-content-center py-2.5 mb-2">
                <i class="bi bi-save-fill"></i>
                <span>Simpan Perubahan Berita</span>
            </button>
            <a href="{{ route('admin.berita.index') }}" class="btn btn-light border w-100 py-2 small text-secondary">
                Batal & Kembali
            </a>
        </div>
    </div>
</form>
@endsection
