@extends('admin.layout')

@section('title', 'Manajemen Prestasi Siswa')
@section('page_title', 'Prestasi Siswa')

@section('content')
<!-- Page Hero & Actions -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <div class="rounded-3 d-flex align-items-center justify-content-center text-white shadow-sm flex-shrink-0" style="width: 52px; height: 52px; background: linear-gradient(135deg, #f59e0b, #d97706); font-size: 1.5rem;">
            <i class="bi bi-trophy-fill"></i>
        </div>
        <div>
            <h4 class="fw-bold text-dark mb-1">Daftar Prestasi & Wall of Fame</h4>
            <p class="text-muted small mb-0">Pencatatan medali kejuaraan LKS, O2SN, FLS2N, olimpiade vokasi, dan sertifikasi industri.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('prestasi.index') }}" target="_blank" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
            <i class="bi bi-eye"></i>
            <span>Preview Halaman Publik</span>
        </a>
        <a href="{{ route('admin.prestasi.create') }}" class="btn-admin-primary text-decoration-none">
            <i class="bi bi-plus-lg"></i>
            <span>Tambah Prestasi Baru</span>
        </a>
    </div>
</div>

<!-- Executive Summary Metric Cards -->
<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-warning-subtle text-warning-emphasis">
                <i class="bi bi-trophy-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Total Prestasi</div>
                <div class="fs-5 fw-bold text-dark">{{ \App\Models\Prestasi::count() }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-primary-subtle text-primary">
                <i class="bi bi-flag-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Tingkat Nasional</div>
                <div class="fs-5 fw-bold text-dark">
                    {{ \App\Models\Prestasi::where('level_slug', 'nasional')->orWhere('level', 'like', '%Nasional%')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon" style="background-color: #f3e8ff; color: #7e22ce;">
                <i class="bi bi-globe2"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Internasional & Prov.</div>
                <div class="fs-5 fw-bold text-dark">
                    {{ \App\Models\Prestasi::where('level_slug', 'internasional')->orWhere('level_slug', 'provinsi')->orWhere('level', 'like', '%Internasional%')->orWhere('level', 'like', '%Provinsi%')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-success-subtle text-success">
                <i class="bi bi-award-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Emas & Juara 1</div>
                <div class="fs-5 fw-bold text-dark">
                    {{ \App\Models\Prestasi::where('medal', 'like', '%Emas%')->orWhere('medal', 'like', '%Juara 1%')->orWhere('medal', 'like', '%1st%')->count() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filters Bar -->
<div class="admin-filter-card">
    <form action="{{ route('admin.prestasi.index') }}" method="GET" class="row g-2 align-items-center">
        <div class="col-12 col-md-5">
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0 text-muted ps-3">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="q" class="form-control border-start-0" placeholder="Cari nama kejuaraan, event lomba, atau siswa..." value="{{ request('q') }}">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <select name="level" class="form-select" onchange="this.form.submit()">
                <option value="all">Semua Tingkatan Kejuaraan</option>
                @foreach($levels as $lvl)
                    <option value="{{ $lvl->level_slug }}" {{ request('level') === $lvl->level_slug ? 'selected' : '' }}>
                        {{ $lvl->level }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-3 d-flex gap-2">
            <button type="submit" class="btn-admin-filter w-100 d-inline-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-filter"></i>
                <span>Terapkan Filter</span>
            </button>
            @if(request()->hasAny(['q', 'level']))
                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-outline-secondary px-3 d-inline-flex align-items-center justify-content-center rounded-3" title="Reset Filter">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Prestasi Table Card -->
<div class="card-table">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <h6 class="fw-bold text-dark mb-0">Database Prestasi Siswa</h6>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill small">
                {{ $prestasis->total() }} Data Tercatat
            </span>
        </div>
        <small class="text-muted">
            Menampilkan halaman {{ $prestasis->currentPage() }} dari {{ $prestasis->lastPage() }}
        </small>
    </div>

    <div class="table-responsive">
        <table class="table table-admin">
            <thead>
                <tr>
                    <th style="width: 75px;">Foto</th>
                    <th>Judul & Ajang Lomba</th>
                    <th>Medali / Juara</th>
                    <th>Tingkat</th>
                    <th>Siswa Berprestasi & Pembimbing</th>
                    <th class="text-center" style="width: 90px;">Tahun</th>
                    <th class="text-end" style="width: 130px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prestasis as $item)
                    <tr>
                        <td>
                            <div class="table-thumb">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" onerror="this.src='{{ asset('images/prestasi/lks-cyber-security.jpg') }}'">
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark mb-1" style="font-size: 0.92rem; line-height: 1.35;">
                                {{ $item->title }}
                            </div>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <small class="text-muted text-truncate" style="max-width: 340px;">
                                    <i class="bi bi-trophy text-warning me-1"></i>{{ $item->event }}
                                </small>
                                @if($item->category)
                                    <span class="badge bg-light text-secondary border" style="font-size: 0.68rem;">{{ $item->category }}</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            @php
                                $medalLower = strtolower($item->medal);
                                if (str_contains($medalLower, 'emas') || str_contains($medalLower, 'juara 1') || str_contains($medalLower, '1st') || str_contains($medalLower, 'gold')) {
                                    $medalClass = 'badge-medal-gold';
                                    $medalIcon = 'bi-trophy-fill';
                                } elseif (str_contains($medalLower, 'perak') || str_contains($medalLower, 'juara 2') || str_contains($medalLower, '2nd') || str_contains($medalLower, 'silver')) {
                                    $medalClass = 'badge-medal-silver';
                                    $medalIcon = 'bi-award-fill';
                                } elseif (str_contains($medalLower, 'perunggu') || str_contains($medalLower, 'juara 3') || str_contains($medalLower, '3rd') || str_contains($medalLower, 'bronze')) {
                                    $medalClass = 'badge-medal-bronze';
                                    $medalIcon = 'bi-shield-fill-check';
                                } else {
                                    $medalClass = 'badge-medal-default';
                                    $medalIcon = 'bi-star-fill';
                                }
                            @endphp
                            <span class="{{ $medalClass }}">
                                <i class="bi {{ $item->medal_icon ?: $medalIcon }}"></i>
                                <span>{{ $item->medal }}</span>
                            </span>
                        </td>
                        <td>
                            @php
                                $lvlLower = strtolower($item->level);
                                if (str_contains($lvlLower, 'internasional')) {
                                    $lvlClass = 'badge-level-internasional';
                                    $lvlIcon = 'bi-globe';
                                } elseif (str_contains($lvlLower, 'nasional')) {
                                    $lvlClass = 'badge-level-nasional';
                                    $lvlIcon = 'bi-flag-fill';
                                } elseif (str_contains($lvlLower, 'provinsi')) {
                                    $lvlClass = 'badge-level-provinsi';
                                    $lvlIcon = 'bi-geo-alt-fill';
                                } else {
                                    $lvlClass = 'badge-level-kota';
                                    $lvlIcon = 'bi-building';
                                }
                            @endphp
                            <span class="{{ $lvlClass }}">
                                <i class="bi {{ $lvlIcon }}"></i>
                                <span>{{ $item->level }}</span>
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 26px; height: 26px; font-size: 0.75rem; flex-shrink: 0;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="fw-semibold text-dark small">{{ $item->students }}</div>
                            </div>
                            @if($item->instructor)
                                <div class="d-flex align-items-center gap-1 text-muted" style="font-size: 0.75rem; margin-left: 34px;">
                                    <i class="bi bi-person-badge"></i>
                                    <span>Pembimbing: {{ $item->instructor }}</span>
                                </div>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge-year">{{ $item->year }}</span>
                        </td>
                        <td class="text-end">
                            <div class="action-cluster">
                                <a href="{{ route('prestasi.index') }}" target="_blank" class="btn-action-icon btn-action-view" title="Lihat di Web">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.prestasi.edit', $item) }}" class="btn-action-icon btn-action-edit" title="Edit Data Prestasi">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.prestasi.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus catatan prestasi \'{{ addslashes($item->title) }}\'?');">
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
                                    <i class="bi bi-trophy text-muted fs-2"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">Tidak Ada Data Prestasi Ditemukan</h6>
                                <p class="text-muted small mb-3">Tidak ada rekaman kejuaraan yang cocok dengan kata kunci atau filter saat ini.</p>
                                <a href="{{ route('admin.prestasi.create') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                    <i class="bi bi-plus-lg me-1"></i> Tambah Prestasi Baru
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($prestasis->hasPages())
        <div class="p-3 border-top d-flex flex-wrap align-items-center justify-content-between gap-3 bg-light bg-opacity-50">
            <small class="text-muted">
                Menampilkan <strong>{{ $prestasis->firstItem() ?? 0 }}</strong> - <strong>{{ $prestasis->lastItem() ?? 0 }}</strong> dari <strong>{{ $prestasis->total() }}</strong> total data
            </small>
            <div>
                {{ $prestasis->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
