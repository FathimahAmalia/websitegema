@extends('admin.layout')

@section('title', 'Manajemen Berita & Artikel')
@section('page_title', 'Berita & Artikel')

@section('content')
<!-- Page Hero & Actions -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <div class="rounded-3 d-flex align-items-center justify-content-center text-white shadow-sm flex-shrink-0" style="width: 52px; height: 52px; background: linear-gradient(135deg, #2563eb, #1d4ed8); font-size: 1.5rem;">
            <i class="bi bi-newspaper"></i>
        </div>
        <div>
            <h4 class="fw-bold text-dark mb-1">Daftar Publikasi Berita & Warta</h4>
            <p class="text-muted small mb-0">Kelola artikel warta sekolah, pengumuman akademik, rilis prestasi, dan informasi edukasi.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('berita.index') }}" target="_blank" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
            <i class="bi bi-eye"></i>
            <span>Portal Berita Publik</span>
        </a>
        <a href="{{ route('admin.berita.create') }}" class="btn-admin-primary text-decoration-none">
            <i class="bi bi-plus-lg"></i>
            <span>Tambah Berita Baru</span>
        </a>
    </div>
</div>

<!-- Executive Summary Metric Cards -->
<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-primary-subtle text-primary">
                <i class="bi bi-file-earmark-text-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Total Artikel</div>
                <div class="fs-5 fw-bold text-dark">{{ \App\Models\Berita::count() }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-warning-subtle text-warning-emphasis">
                <i class="bi bi-pin-angle-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Berita Utama</div>
                <div class="fs-5 fw-bold text-dark">{{ \App\Models\Berita::where('is_featured', true)->count() }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-success-subtle text-success">
                <i class="bi bi-eye-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Total Pembaca</div>
                <div class="fs-5 fw-bold text-dark">{{ number_format(\App\Models\Berita::sum('views')) }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-info-subtle text-info-emphasis">
                <i class="bi bi-tags-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Kategori Warta</div>
                <div class="fs-5 fw-bold text-dark">{{ \App\Models\Berita::distinct('category')->count('category') }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Filters Bar -->
<div class="admin-filter-card">
    <form action="{{ route('admin.berita.index') }}" method="GET" class="row g-2 align-items-center">
        <div class="col-12 col-md-5">
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0 text-muted ps-3">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="q" class="form-control border-start-0" placeholder="Cari judul berita, topik, atau kata kunci ringkasan..." value="{{ request('q') }}">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <select name="category" class="form-select" onchange="this.form.submit()">
                <option value="all">Semua Kategori Berita</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->category_slug }}" {{ request('category') === $cat->category_slug ? 'selected' : '' }}>
                        {{ $cat->category }}
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
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary px-3 d-inline-flex align-items-center justify-content-center rounded-3" title="Reset Filter">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </a>
            @endif
        </div>
    </form>
</div>

<!-- News Table Card -->
<div class="card-table">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <h6 class="fw-bold text-dark mb-0">Database Warta & Publikasi</h6>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill small">
                {{ $beritas->total() }} Artikel
            </span>
        </div>
        <small class="text-muted">
            Menampilkan halaman {{ $beritas->currentPage() }} dari {{ $beritas->lastPage() }}
        </small>
    </div>

    <div class="table-responsive">
        <table class="table table-admin">
            <thead>
                <tr>
                    <th style="width: 75px;">Foto</th>
                    <th>Judul Artikel & Ringkasan</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Tgl Publikasi</th>
                    <th class="text-center" style="width: 80px;">Dilihat</th>
                    <th class="text-end" style="width: 130px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $item)
                    <tr>
                        <td>
                            <div class="table-thumb">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" onerror="this.src='{{ asset('images/berita-lks-cyber.png') }}'">
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark mb-1" style="font-size: 0.92rem; line-height: 1.35;">
                                <a href="{{ route('berita.show', $item->slug) }}" target="_blank" class="text-dark text-decoration-none hover-primary">
                                    {{ $item->title }}
                                </a>
                                @if($item->is_featured)
                                    <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle ms-1" style="font-size: 0.68rem;">
                                        <i class="bi bi-pin-angle-fill me-1"></i>Utama
                                    </span>
                                @endif
                            </div>
                            <small class="text-muted d-block text-truncate" style="max-width: 380px;">{{ $item->excerpt }}</small>
                        </td>
                        <td>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-semibold px-2 py-1 rounded-pill" style="font-size: 0.75rem;">
                                {{ $item->category }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-light text-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 26px; height: 26px; font-size: 0.75rem; flex-shrink: 0;">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="small fw-semibold text-dark">{{ $item->author }}</div>
                            </div>
                        </td>
                        <td>
                            <div class="small text-muted d-flex align-items-center gap-1">
                                <i class="bi bi-calendar3"></i>
                                <span>{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->translatedFormat('d M Y') : '-' }}</span>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="badge-year">
                                <i class="bi bi-eye me-1 text-muted"></i>{{ number_format($item->views) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="action-cluster">
                                <a href="{{ route('berita.show', $item->slug) }}" target="_blank" class="btn-action-icon btn-action-view" title="Lihat di Web">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.berita.edit', $item) }}" class="btn-action-icon btn-action-edit" title="Edit Artikel">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.berita.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel \'{{ addslashes($item->title) }}\'?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-icon btn-action-delete" title="Hapus Berita">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="py-4">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                                    <i class="bi bi-inbox text-muted fs-2"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">Tidak Ada Berita Ditemukan</h6>
                                <p class="text-muted small mb-3">Tidak ada artikel berita yang cocok dengan filter atau kueri pencarian saat ini.</p>
                                <a href="{{ route('admin.berita.create') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                    <i class="bi bi-plus-lg me-1"></i> Tulis Berita Baru
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($beritas->hasPages())
        <div class="p-3 border-top d-flex flex-wrap align-items-center justify-content-between gap-3 bg-light bg-opacity-50">
            <small class="text-muted">
                Menampilkan <strong>{{ $beritas->firstItem() ?? 0 }}</strong> - <strong>{{ $beritas->lastItem() ?? 0 }}</strong> dari <strong>{{ $beritas->total() }}</strong> total artikel
            </small>
            <div>
                {{ $beritas->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
