@extends('admin.layout')

@section('title', 'Manajemen Galeri Dokumentasi')
@section('page_title', 'Galeri Dokumentasi')

@section('content')
<!-- Page Hero & Actions -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <div class="rounded-3 d-flex align-items-center justify-content-center text-white shadow-sm flex-shrink-0" style="width: 52px; height: 52px; background: linear-gradient(135deg, #0284c7, #2563eb); font-size: 1.5rem;">
            <i class="bi bi-images"></i>
        </div>
        <div>
            <h4 class="fw-bold text-dark mb-1">Daftar Dokumentasi Foto & Kegiatan</h4>
            <p class="text-muted small mb-0">Kelola album dokumentasi visual kegiatan kampus, praktikum laboratorium, workshop, dan wisuda.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('galeri.index') }}" target="_blank" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
            <i class="bi bi-eye"></i>
            <span>Galeri Publik</span>
        </a>
        <a href="{{ route('admin.galeri.create') }}" class="btn-admin-primary text-decoration-none">
            <i class="bi bi-cloud-arrow-up-fill"></i>
            <span>Unggah Foto Baru</span>
        </a>
    </div>
</div>

<!-- Executive Summary Metric Cards -->
<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-primary-subtle text-primary">
                <i class="bi bi-images"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Total Foto</div>
                <div class="fs-5 fw-bold text-dark">{{ \App\Models\Galeri::count() }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-info-subtle text-info-emphasis">
                <i class="bi bi-folder2-open"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Kategori Album</div>
                <div class="fs-5 fw-bold text-dark">{{ \App\Models\Galeri::distinct('category_slug')->count('category_slug') }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-warning-subtle text-warning-emphasis">
                <i class="bi bi-camera-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Kontributor / Humas</div>
                <div class="fs-5 fw-bold text-dark">{{ \App\Models\Galeri::distinct('photographer')->count('photographer') }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-success-subtle text-success">
                <i class="bi bi-calendar-check-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Tahun Aktif</div>
                <div class="fs-5 fw-bold text-dark">2024 - 2026</div>
            </div>
        </div>
    </div>
</div>

<!-- Filters Bar -->
<div class="admin-filter-card">
    <form action="{{ route('admin.galeri.index') }}" method="GET" class="row g-2 align-items-center">
        <div class="col-12 col-md-5">
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0 text-muted ps-3">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="q" class="form-control border-start-0" placeholder="Cari judul dokumentasi atau nama fotografer..." value="{{ request('q') }}">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <select name="category" class="form-select" onchange="this.form.submit()">
                <option value="all">Semua Kategori Album</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->category_slug }}" {{ request('category') === $cat->category_slug ? 'selected' : '' }}>
                        {{ $cat->category_label }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-3 d-flex gap-2">
            <button type="submit" class="btn-admin-filter w-100 d-inline-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-filter"></i>
                <span>Terapkan Filter</span>
            </button>
            @if(request()->hasAny(['q', 'category']))
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary px-3 d-inline-flex align-items-center justify-content-center rounded-3" title="Reset Filter">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Photo Grid -->
<div class="row g-3">
    @forelse($galeris as $item)
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white" style="border: 1px solid #e2e8f0 !important; transition: all 0.25s ease;">
                <div class="position-relative overflow-hidden" style="height: 190px; background-color: #0f172a;">
                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-100 h-100 object-fit-cover" style="transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" onerror="this.src='{{ asset('images/galeri/wisuda.jpg') }}'">
                    <span class="badge bg-dark bg-opacity-75 text-white position-absolute top-0 start-0 m-2.5 px-2.5 py-1 rounded-pill" style="font-size: 0.7rem; backdrop-filter: blur(4px);">
                        {{ $item->category_label }}
                    </span>
                </div>
                <div class="card-body p-3.5 d-flex flex-column justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-1 text-truncate" title="{{ $item->title }}">{{ $item->title }}</h6>
                        <small class="text-muted d-flex align-items-center gap-1 mb-2">
                            <i class="bi bi-calendar3"></i>
                            <span>{{ $item->date ?: '-' }}</span>
                        </small>
                        <small class="text-secondary d-block text-truncate" style="max-height: 38px;">
                            {{ $item->description ?: 'Dokumentasi kegiatan resmi SMK Gema Cyber School.' }}
                        </small>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3 pt-2.5 border-top">
                        <small class="text-muted d-flex align-items-center gap-1 text-truncate" style="max-width: 130px;">
                            <i class="bi bi-camera"></i>
                            <span>{{ $item->photographer ?: 'Tim Media' }}</span>
                        </small>
                        <div class="action-cluster">
                            <a href="{{ route('admin.galeri.edit', $item) }}" class="btn-action-icon btn-action-edit" title="Edit Data Foto">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.galeri.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumentasi foto ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action-icon btn-action-delete" title="Hapus Foto">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="py-4">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                    <i class="bi bi-images text-muted fs-2"></i>
                </div>
                <h6 class="fw-bold text-dark mb-1">Belum Ada Dokumentasi Foto</h6>
                <p class="text-muted small mb-3">Tidak ada foto dokumentasi yang cocok dengan pencarian atau filter kategori saat ini.</p>
                <a href="{{ route('admin.galeri.create') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                    <i class="bi bi-cloud-arrow-up-fill me-1"></i> Unggah Foto Baru
                </a>
            </div>
        </div>
    @endforelse
</div>

@if($galeris->hasPages())
    <div class="mt-4 p-3 bg-white rounded-4 border d-flex flex-wrap align-items-center justify-content-between gap-3">
        <small class="text-muted">
            Menampilkan <strong>{{ $galeris->firstItem() ?? 0 }}</strong> - <strong>{{ $galeris->lastItem() ?? 0 }}</strong> dari <strong>{{ $galeris->total() }}</strong> total foto
        </small>
        <div>
            {{ $galeris->links() }}
        </div>
    </div>
@endif
@endsection
