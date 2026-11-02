@extends('admin.layout')

@section('title', 'Manajemen PPDB Online')
@section('page_title', 'PPDB Online')

@section('content')
<!-- Page Hero & Actions -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <div class="rounded-3 d-flex align-items-center justify-content-center text-white shadow-sm flex-shrink-0" style="width: 52px; height: 52px; background: linear-gradient(135deg, #059669, #047857); font-size: 1.5rem;">
            <i class="bi bi-person-lines-fill"></i>
        </div>
        <div>
            <h4 class="fw-bold text-dark mb-1">Penerimaan Peserta Didik Baru (PPDB)</h4>
            <p class="text-muted small mb-0">Kelola verifikasi kelengkapan berkas, seleksi jurusan, dan status kelulusan calon siswa baru.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ url('/#ppdb') }}" target="_blank" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
            <i class="bi bi-eye"></i>
            <span>Portal Beranda Publik</span>
        </a>
        <a href="{{ route('admin.ppdb.create') }}" class="btn-admin-primary text-decoration-none">
            <i class="bi bi-person-plus-fill"></i>
            <span>Input Calon Siswa Baru</span>
        </a>
    </div>
</div>

<!-- Executive Summary Metric Cards -->
<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-primary-subtle text-primary">
                <i class="bi bi-people-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Total Pendaftar</div>
                <div class="fs-5 fw-bold text-dark">{{ $statusCounts['all'] ?? 0 }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-warning-subtle text-warning-emphasis">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Menunggu Verifikasi</div>
                <div class="fs-5 fw-bold text-dark">{{ $statusCounts['Menunggu Verifikasi'] ?? 0 }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-info-subtle text-info-emphasis">
                <i class="bi bi-file-earmark-check-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Diverifikasi</div>
                <div class="fs-5 fw-bold text-dark">{{ $statusCounts['Diverifikasi'] ?? 0 }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-success-subtle text-success">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Diterima / Lolos</div>
                <div class="fs-5 fw-bold text-dark">{{ $statusCounts['Diterima'] ?? 0 }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Status Filter Tabs -->
<div class="d-flex flex-wrap gap-2 mb-3">
    <a href="{{ route('admin.ppdb.index') }}" class="btn btn-sm {{ !request('status') || request('status') === 'all' ? 'btn-primary shadow-sm' : 'btn-light border bg-white text-secondary' }} fw-semibold rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1.5">
        <span>Semua Pendaftar</span>
        <span class="badge {{ !request('status') || request('status') === 'all' ? 'bg-white text-primary' : 'bg-light text-dark border' }} rounded-pill ms-1">{{ $statusCounts['all'] }}</span>
    </a>
    <a href="{{ route('admin.ppdb.index', ['status' => 'Menunggu Verifikasi']) }}" class="btn btn-sm {{ request('status') === 'Menunggu Verifikasi' ? 'btn-warning text-dark shadow-sm' : 'btn-light border bg-white text-secondary' }} fw-semibold rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1.5">
        <i class="bi bi-clock-history"></i>
        <span>Menunggu Verifikasi</span>
        <span class="badge {{ request('status') === 'Menunggu Verifikasi' ? 'bg-dark text-warning' : 'bg-warning-subtle text-warning-emphasis' }} rounded-pill ms-1">{{ $statusCounts['Menunggu Verifikasi'] }}</span>
    </a>
    <a href="{{ route('admin.ppdb.index', ['status' => 'Diverifikasi']) }}" class="btn btn-sm {{ request('status') === 'Diverifikasi' ? 'btn-info text-dark shadow-sm' : 'btn-light border bg-white text-secondary' }} fw-semibold rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1.5">
        <i class="bi bi-check2-all"></i>
        <span>Diverifikasi</span>
        <span class="badge {{ request('status') === 'Diverifikasi' ? 'bg-dark text-info' : 'bg-info-subtle text-info-emphasis' }} rounded-pill ms-1">{{ $statusCounts['Diverifikasi'] }}</span>
    </a>
    <a href="{{ route('admin.ppdb.index', ['status' => 'Diterima']) }}" class="btn btn-sm {{ request('status') === 'Diterima' ? 'btn-success shadow-sm' : 'btn-light border bg-white text-secondary' }} fw-semibold rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1.5">
        <i class="bi bi-patch-check-fill"></i>
        <span>Diterima</span>
        <span class="badge {{ request('status') === 'Diterima' ? 'bg-white text-success' : 'bg-success-subtle text-success' }} rounded-pill ms-1">{{ $statusCounts['Diterima'] }}</span>
    </a>
    <a href="{{ route('admin.ppdb.index', ['status' => 'Ditolak']) }}" class="btn btn-sm {{ request('status') === 'Ditolak' ? 'btn-danger shadow-sm' : 'btn-light border bg-white text-secondary' }} fw-semibold rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1.5">
        <i class="bi bi-x-circle-fill"></i>
        <span>Ditolak</span>
        <span class="badge {{ request('status') === 'Ditolak' ? 'bg-white text-danger' : 'bg-danger-subtle text-danger' }} rounded-pill ms-1">{{ $statusCounts['Ditolak'] }}</span>
    </a>
</div>

<!-- Filters Bar -->
<div class="admin-filter-card">
    <form action="{{ route('admin.ppdb.index') }}" method="GET" class="row g-2 align-items-center">
        @if(request('status'))
            <input type="hidden" name="status" value="{{ request('status') }}">
        @endif
        <div class="col-12 col-md-5">
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0 text-muted ps-3">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="q" class="form-control border-start-0" placeholder="Cari nama siswa, nomor registrasi, asal SMP..." value="{{ request('q') }}">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <select name="jurusan" class="form-select" onchange="this.form.submit()">
                <option value="all">Semua Pilihan Jurusan</option>
                @foreach($jurusans as $j)
                    <option value="{{ $j->short_name }}" {{ request('jurusan') === $j->short_name ? 'selected' : '' }}>
                        {{ $j->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-3 d-flex gap-2">
            <button type="submit" class="btn-admin-filter w-100 d-inline-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-filter"></i>
                <span>Terapkan Filter</span>
            </button>
            @if(request()->hasAny(['q', 'jurusan', 'status']))
                <a href="{{ route('admin.ppdb.index') }}" class="btn btn-outline-secondary px-3 d-inline-flex align-items-center justify-content-center rounded-3" title="Reset Filter">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Applicants Table Card -->
<div class="card-table">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <h6 class="fw-bold text-dark mb-0">Daftar Berkas Calon Siswa Baru</h6>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill small">
                {{ $pendaftarans->total() }} Pendaftar
            </span>
        </div>
        <small class="text-muted">
            Menampilkan halaman {{ $pendaftarans->currentPage() }} dari {{ $pendaftarans->lastPage() }}
        </small>
    </div>

    <div class="table-responsive">
        <table class="table table-admin">
            <thead>
                <tr>
                    <th style="width: 140px;">No. Pendaftaran</th>
                    <th>Nama Calon Siswa</th>
                    <th>Asal Sekolah</th>
                    <th>Pilihan Jurusan</th>
                    <th>Jalur & Kontak</th>
                    <th class="text-center" style="width: 130px;">Status Berkas</th>
                    <th class="text-end" style="width: 130px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendaftarans as $item)
                    <tr>
                        <td>
                            <a href="{{ route('admin.ppdb.show', $item) }}" class="fw-bold font-monospace text-primary text-decoration-none d-block">
                                {{ $item->nomor_pendaftaran }}
                            </a>
                            <small class="text-muted d-flex align-items-center gap-1" style="font-size: 0.72rem;">
                                <i class="bi bi-clock"></i>{{ $item->created_at->format('d/m/Y H:i') }}
                            </small>
                        </td>
                        <td>
                            <div class="fw-bold text-dark mb-0.5" style="font-size: 0.92rem;">{{ $item->nama_lengkap }}</div>
                            <small class="text-muted d-flex align-items-center gap-1">
                                <i class="bi {{ $item->jenis_kelamin === 'Perempuan' ? 'bi-gender-female text-danger' : 'bi-gender-male text-primary' }}"></i>
                                <span>{{ $item->jenis_kelamin }}</span>
                                <span>•</span>
                                <span>NISN: {{ $item->nisn ?: '-' }}</span>
                            </small>
                        </td>
                        <td>
                            <div class="small fw-semibold text-secondary d-flex align-items-center gap-1">
                                <i class="bi bi-building"></i>
                                <span>{{ $item->asal_sekolah }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="small fw-bold text-dark">{{ $item->pilihan_jurusan_1 }}</div>
                            @if($item->pilihan_jurusan_2)
                                <small class="text-muted d-block">Pil 2: {{ $item->pilihan_jurusan_2 }}</small>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border mb-1" style="font-size: 0.72rem;">{{ $item->jalur_pendaftaran }}</span>
                            <div class="small text-muted d-flex align-items-center gap-1">
                                <i class="bi bi-whatsapp text-success"></i>
                                <span>{{ $item->no_hp }}</span>
                            </div>
                        </td>
                        <td class="text-center">
                            @php
                                $statusBadgeClass = match($item->status) {
                                    'Diterima' => 'badge bg-success-subtle text-success border border-success-subtle fw-bold px-2 py-1 rounded-pill',
                                    'Menunggu Verifikasi' => 'badge bg-warning-subtle text-warning-emphasis border border-warning-subtle fw-bold px-2 py-1 rounded-pill',
                                    'Diverifikasi' => 'badge bg-info-subtle text-info-emphasis border border-info-subtle fw-bold px-2 py-1 rounded-pill',
                                    'Ditolak' => 'badge bg-danger-subtle text-danger border border-danger-subtle fw-bold px-2 py-1 rounded-pill',
                                    default => 'badge bg-secondary-subtle text-secondary border px-2 py-1 rounded-pill',
                                };
                            @endphp
                            <span class="{{ $statusBadgeClass }}" style="font-size: 0.75rem;">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="action-cluster">
                                <a href="{{ route('admin.ppdb.show', $item) }}" class="btn-action-icon btn-action-view" title="Verifikasi & Detail Berkas">
                                    <i class="bi bi-person-bounding-box"></i>
                                </a>
                                <a href="{{ route('admin.ppdb.edit', $item) }}" class="btn-action-icon btn-action-edit" title="Edit Data Siswa">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.ppdb.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pendaftaran siswa \'{{ addslashes($item->nama_lengkap) }}\'?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-icon btn-action-delete" title="Hapus Berkas">
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
                                    <i class="bi bi-person-x text-muted fs-2"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">Tidak Ada Pendaftar Ditemukan</h6>
                                <p class="text-muted small mb-3">Tidak ada data formulir PPDB yang cocok dengan status atau kata kunci yang dipilih.</p>
                                <a href="{{ route('admin.ppdb.create') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                    <i class="bi bi-person-plus-fill me-1"></i> Input Pendaftaran Siswa
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pendaftarans->hasPages())
        <div class="p-3 border-top d-flex flex-wrap align-items-center justify-content-between gap-3 bg-light bg-opacity-50">
            <small class="text-muted">
                Menampilkan <strong>{{ $pendaftarans->firstItem() ?? 0 }}</strong> - <strong>{{ $pendaftarans->lastItem() ?? 0 }}</strong> dari <strong>{{ $pendaftarans->total() }}</strong> total calon siswa
            </small>
            <div>
                {{ $pendaftarans->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
