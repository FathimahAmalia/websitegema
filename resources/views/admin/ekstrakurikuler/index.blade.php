@extends('admin.layout')

@section('title', 'Manajemen Ekstrakurikuler')
@section('page_title', 'Ekstrakurikuler')

@section('content')
<!-- Page Hero & Actions -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <div class="rounded-3 d-flex align-items-center justify-content-center text-white shadow-sm flex-shrink-0" style="width: 52px; height: 52px; background: linear-gradient(135deg, #8b5cf6, #6d28d9); font-size: 1.5rem;">
            <i class="bi bi-stars"></i>
        </div>
        <div>
            <h4 class="fw-bold text-dark mb-1">Daftar Kegiatan Ekstrakurikuler</h4>
            <p class="text-muted small mb-0">Kelola kegiatan pengembangan bakat, riset teknologi, kepemimpinan, seni budaya, dan olahraga.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('ekstrakurikuler.index') }}" target="_blank" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
            <i class="bi bi-eye"></i>
            <span>Portal Ekskul Publik</span>
        </a>
        <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn-admin-primary text-decoration-none">
            <i class="bi bi-plus-lg"></i>
            <span>Tambah Ekskul Baru</span>
        </a>
    </div>
</div>

<!-- Executive Summary Metric Cards -->
<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-purple-subtle text-purple" style="background-color: #f3e8ff; color: #7e22ce;">
                <i class="bi bi-stars"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Total Ekskul</div>
                <div class="fs-5 fw-bold text-dark">{{ \App\Models\Ekstrakurikuler::count() }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-primary-subtle text-primary">
                <i class="bi bi-cpu-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Divisi Teknologi</div>
                <div class="fs-5 fw-bold text-dark">
                    {{ \App\Models\Ekstrakurikuler::where('category', 'like', '%Teknologi%')->orWhere('category', 'like', '%Cyber%')->orWhere('category', 'like', '%Robotik%')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-info-subtle text-info-emphasis">
                <i class="bi bi-grid-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Kategori Bidang</div>
                <div class="fs-5 fw-bold text-dark">
                    {{ \App\Models\Ekstrakurikuler::distinct('category')->count('category') }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-success-subtle text-success">
                <i class="bi bi-people-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Pelatih & Pembina</div>
                <div class="fs-5 fw-bold text-dark">
                    {{ \App\Models\Ekstrakurikuler::whereNotNull('instructor')->count() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filters Bar -->
<div class="admin-filter-card">
    <form action="{{ route('admin.ekstrakurikuler.index') }}" method="GET" class="row g-2 align-items-center">
        <div class="col-12 col-md-5">
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0 text-muted ps-3">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="q" class="form-control border-start-0" placeholder="Cari nama klub ekskul, pelatih, atau bidang..." value="{{ request('q') }}">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <select name="category" class="form-select" onchange="this.form.submit()">
                <option value="all">Semua Kategori Ekskul</option>
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
                <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-outline-secondary px-3 d-inline-flex align-items-center justify-content-center rounded-3" title="Reset Filter">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Ekskul Table Card -->
<div class="card-table">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <h6 class="fw-bold text-dark mb-0">Database Kegiatan Ekstrakurikuler</h6>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill small">
                {{ $ekskuls->total() }} Komunitas
            </span>
        </div>
        <small class="text-muted">
            Menampilkan halaman {{ $ekskuls->currentPage() }} dari {{ $ekskuls->lastPage() }}
        </small>
    </div>

    <div class="table-responsive">
        <table class="table table-admin">
            <thead>
                <tr>
                    <th style="width: 75px;">Foto</th>
                    <th>Nama Ekstrakurikuler & Tagline</th>
                    <th>Kategori</th>
                    <th>Jadwal & Tempat</th>
                    <th>Pembina / Pelatih</th>
                    <th class="text-center" style="width: 100px;">Anggota</th>
                    <th class="text-end" style="width: 130px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ekskuls as $item)
                    <tr>
                        <td>
                            <div class="table-thumb">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" onerror="this.src='{{ asset('images/ekskul/cyber-security.jpg') }}'">
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark mb-1" style="font-size: 0.92rem;">
                                <i class="bi {{ $item->icon ?: 'bi-stars' }} me-1" style="color: {{ $item->color ?? '#2563eb' }};"></i>
                                {{ $item->name }}
                                @if($item->badge)
                                    <span class="badge bg-light text-dark border ms-1" style="font-size: 0.68rem;">{{ $item->badge }}</span>
                                @endif
                            </div>
                            <small class="text-muted d-block text-truncate" style="max-width: 320px;">
                                {{ $item->tagline ?: $item->description }}
                            </small>
                        </td>
                        <td>
                            <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle fw-semibold px-2 py-1 rounded-pill" style="font-size: 0.75rem;">
                                {{ $item->category }}
                            </span>
                        </td>
                        <td>
                            <div class="small fw-semibold text-dark">{{ $item->schedule ?: ($item->days . ' ' . $item->time) }}</div>
                            <small class="text-muted d-flex align-items-center gap-1">
                                <i class="bi bi-geo-alt"></i>{{ $item->location ?: 'Kampus Gema' }}
                            </small>
                        </td>
                        <td>
                            <div class="small fw-bold text-dark">{{ $item->instructor ?: '-' }}</div>
                            <small class="text-muted">{{ $item->instructor_role }}</small>
                        </td>
                        <td class="text-center">
                            <span class="badge-year">
                                <i class="bi bi-people me-1 text-muted"></i>{{ $item->members_count ?: '30 Siswa' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="action-cluster">
                                <a href="{{ route('ekstrakurikuler.index') }}" target="_blank" class="btn-action-icon btn-action-view" title="Lihat di Web">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.ekstrakurikuler.edit', $item) }}" class="btn-action-icon btn-action-edit" title="Edit Ekskul">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.ekstrakurikuler.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan \'{{ addslashes($item->name) }}\'?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-icon btn-action-delete" title="Hapus Data">
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
                                    <i class="bi bi-stars text-muted fs-2"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">Tidak Ada Ekstrakurikuler Ditemukan</h6>
                                <p class="text-muted small mb-3">Tidak ada catatan kegiatan ekstrakurikuler yang sesuai dengan filter.</p>
                                <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                    <i class="bi bi-plus-lg me-1"></i> Tambah Ekskul Baru
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($ekskuls->hasPages())
        <div class="p-3 border-top d-flex flex-wrap align-items-center justify-content-between gap-3 bg-light bg-opacity-50">
            <small class="text-muted">
                Menampilkan <strong>{{ $ekskuls->firstItem() ?? 0 }}</strong> - <strong>{{ $ekskuls->lastItem() ?? 0 }}</strong> dari <strong>{{ $ekskuls->total() }}</strong> total kegiatan
            </small>
            <div>
                {{ $ekskuls->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
