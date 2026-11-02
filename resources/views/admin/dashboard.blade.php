@extends('admin.layout')

@section('title', 'Ringkasan Dashboard')
@section('page_title', 'Ringkasan Dashboard')

@section('styles')
<style>
/* ==========================================================================
   ADMIN HERO DASHBOARD STYLES (ENTERPRISE GRADE)
   ========================================================================== */
.admin-hero-card {
    position: relative;
    background: #090d16;
    background: linear-gradient(135deg, #0b1120 0%, #0f172a 55%, #162032 100%);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 1.25rem;
    overflow: hidden;
    box-shadow: 0 12px 35px -10px rgba(0, 0, 0, 0.5), 0 0 1px 1px rgba(255, 255, 255, 0.05) inset;
}

.admin-hero-glow-1 {
    position: absolute;
    top: -50px;
    right: -30px;
    width: 380px;
    height: 380px;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.12) 0%, rgba(56, 189, 248, 0) 70%);
    pointer-events: none;
    z-index: 1;
}

.admin-hero-glow-2 {
    position: absolute;
    bottom: -60px;
    left: 25%;
    width: 360px;
    height: 360px;
    background: radial-gradient(circle, rgba(99, 102, 241, 0.09) 0%, rgba(99, 102, 241, 0) 70%);
    pointer-events: none;
    z-index: 1;
}

.admin-hero-grid {
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255, 255, 255, 0.07) 1px, transparent 1px);
    background-size: 24px 24px;
    opacity: 0.35;
    pointer-events: none;
    z-index: 1;
}

.admin-hero-status-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.55rem;
    padding: 0.35rem 0.85rem;
    border-radius: 9999px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    font-size: 0.78rem;
    color: #e2e8f0;
}

.pulse-dot-wrap {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 8px;
    height: 8px;
}

.pulse-dot-ping {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: #10b981;
    opacity: 0.75;
    animation: heroPulse 2s cubic-bezier(0, 0, 0.2, 1) infinite;
}

.pulse-dot-core {
    position: relative;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: #10b981;
}

@keyframes heroPulse {
    0% {
        transform: scale(0.95);
        opacity: 0.8;
    }
    70% {
        transform: scale(2.2);
        opacity: 0;
    }
    100% {
        transform: scale(2.2);
        opacity: 0;
    }
}

</style>
@endsection

@section('content')
<!-- Hero Welcome Banner -->
<div class="card border-0 admin-hero-card mb-4">
    <div class="admin-hero-glow-1"></div>
    <div class="admin-hero-glow-2"></div>
    <div class="admin-hero-grid"></div>

    <div class="p-4 p-xl-5 text-white position-relative" style="z-index: 2;">
        <div class="admin-hero-status-pill mb-3">
            <span class="pulse-dot-wrap">
                <span class="pulse-dot-ping"></span>
                <span class="pulse-dot-core"></span>
            </span>
            <span class="fw-semibold text-white">SISTEM CMS OPERASIONAL</span>
            <span class="text-white-50">•</span>
            <span class="text-slate-300">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
        </div>

        <h2 class="fw-bold text-white mb-2" style="font-size: clamp(1.4rem, 2.2vw, 1.85rem); letter-spacing: -0.02em;">
            Selamat Datang, {{ Auth::user()->name ?? 'Administrator' }}! 👋
        </h2>
        <p class="text-white-50 mb-0" style="max-width: 760px; font-size: 0.95rem; line-height: 1.6;">
            Portal terpadu pengelolaan konten, verifikasi calon siswa PPDB Online, publikasi warta sekolah, dan pemantauan pesan masuk masyarakat secara realtime.
        </p>
    </div>
</div>
<!-- Primary Key Performance Indicators (KPI) -->
<div class="row g-3 mb-4">
    <!-- Stat 1: PPDB Online -->
    <div class="col-12 col-sm-6 col-xl-3">
        <a href="{{ route('admin.ppdb.index') }}" class="card-stat">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-muted small fw-bold text-uppercase letter-spacing-1">PPDB Online</span>
                <div class="stat-icon bg-primary-subtle text-primary">
                    <i class="bi bi-person-lines-fill"></i>
                </div>
            </div>
            <h2 class="fw-bold mb-2 text-dark">{{ $stats['total_ppdb'] }}</h2>
            <div class="d-flex align-items-center gap-1.5 flex-wrap">
                <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle fw-semibold" style="font-size: 0.72rem;">
                    <i class="bi bi-clock-history me-1"></i>{{ $stats['ppdb_menunggu'] }} Menunggu
                </span>
                <span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold" style="font-size: 0.72rem;">
                    <i class="bi bi-check-circle me-1"></i>{{ $stats['ppdb_diterima'] }} Lolos
                </span>
            </div>
        </a>
    </div>

    <!-- Stat 2: Berita & Artikel -->
    <div class="col-12 col-sm-6 col-xl-3">
        <a href="{{ route('admin.berita.index') }}" class="card-stat">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-muted small fw-bold text-uppercase letter-spacing-1">Berita & Warta</span>
                <div class="stat-icon bg-info-subtle text-info">
                    <i class="bi bi-newspaper"></i>
                </div>
            </div>
            <h2 class="fw-bold mb-2 text-dark">{{ $stats['total_berita'] }}</h2>
            <div class="d-flex align-items-center gap-1.5">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-semibold" style="font-size: 0.72rem;">
                    <i class="bi bi-check2-circle me-1"></i>Publikasi Terbit
                </span>
            </div>
        </a>
    </div>

    <!-- Stat 3: Prestasi Siswa -->
    <div class="col-12 col-sm-6 col-xl-3">
        <a href="{{ route('admin.prestasi.index') }}" class="card-stat">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-muted small fw-bold text-uppercase letter-spacing-1">Prestasi Siswa</span>
                <div class="stat-icon bg-warning-subtle text-warning-emphasis">
                    <i class="bi bi-trophy-fill"></i>
                </div>
            </div>
            <h2 class="fw-bold mb-2 text-dark">{{ $stats['total_prestasi'] }}</h2>
            <div class="d-flex align-items-center gap-1.5">
                <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle fw-semibold" style="font-size: 0.72rem;">
                    <i class="bi bi-award-fill me-1"></i>Kejuaraan & LKS
                </span>
            </div>
        </a>
    </div>

    <!-- Stat 4: Pesan Masuk -->
    <div class="col-12 col-sm-6 col-xl-3">
        <a href="{{ route('admin.pesan.index') }}" class="card-stat">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="text-muted small fw-bold text-uppercase letter-spacing-1">Pesan Masuk</span>
                <div class="stat-icon bg-danger-subtle text-danger">
                    <i class="bi bi-envelope-fill"></i>
                </div>
            </div>
            <h2 class="fw-bold mb-2 text-dark">{{ $stats['total_pesan'] }}</h2>
            <div class="d-flex align-items-center gap-1.5">
                @if($stats['pesan_belum_dibaca'] > 0)
                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle fw-semibold" style="font-size: 0.72rem;">
                        <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $stats['pesan_belum_dibaca'] }} Belum Dibaca
                    </span>
                @else
                    <span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold" style="font-size: 0.72rem;">
                        <i class="bi bi-check2-all me-1"></i>Semua Terbaca
                    </span>
                @endif
            </div>
        </a>
    </div>
</div>

<!-- Secondary Stats Row (Clickable Navigation Shortcuts) -->
<div class="row g-3 mb-4">
    <div class="col-12 col-md-4">
        <a href="{{ route('admin.jurusan.index') }}" class="kpi-mini-card">
            <div class="kpi-mini-icon bg-success-subtle text-success">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div class="flex-grow-1">
                <span class="text-muted small fw-semibold d-block">Program Keahlian (Jurusan)</span>
                <h5 class="fw-bold mb-0 text-dark">{{ $stats['total_jurusan'] }} Konsentrasi Unggulan</h5>
            </div>
            <i class="bi bi-chevron-right text-muted"></i>
        </a>
    </div>
    <div class="col-12 col-md-4">
        <a href="{{ route('admin.ekstrakurikuler.index') }}" class="kpi-mini-card">
            <div class="kpi-mini-icon text-purple" style="background-color: #f3e8ff; color: #7e22ce;">
                <i class="bi bi-stars"></i>
            </div>
            <div class="flex-grow-1">
                <span class="text-muted small fw-semibold d-block">Kegiatan Ekstrakurikuler</span>
                <h5 class="fw-bold mb-0 text-dark">{{ $stats['total_ekskul'] }} Klub & Komunitas</h5>
            </div>
            <i class="bi bi-chevron-right text-muted"></i>
        </a>
    </div>
    <div class="col-12 col-md-4">
        <a href="{{ route('admin.galeri.index') }}" class="kpi-mini-card">
            <div class="kpi-mini-icon bg-secondary-subtle text-secondary">
                <i class="bi bi-images"></i>
            </div>
            <div class="flex-grow-1">
                <span class="text-muted small fw-semibold d-block">Dokumentasi Galeri</span>
                <h5 class="fw-bold mb-0 text-dark">{{ $stats['total_galeri'] }} Foto Terpublikasi</h5>
            </div>
            <i class="bi bi-chevron-right text-muted"></i>
        </a>
    </div>
</div>

<!-- Recent PPDB Registrations (Crucial School Feature) -->
<div class="card-table mb-4">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <div class="rounded-3 d-flex align-items-center justify-content-center text-white" style="width: 34px; height: 34px; background: linear-gradient(135deg, #059669, #047857);">
                <i class="bi bi-person-lines-fill"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-0 text-dark">Calon Siswa PPDB Terbaru</h6>
                <small class="text-muted">Pendaftaran peserta didik baru gelombang 2026/2027</small>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.ppdb.create') }}" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1.5 px-3 py-1.5 rounded-3">
                <i class="bi bi-plus-lg"></i>
                <span class="d-none d-sm-inline">Input Siswa</span>
            </a>
            <a href="{{ route('admin.ppdb.index') }}" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1.5 px-3 py-1.5 rounded-3">
                <span>Semua Data PPDB</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-admin">
            <thead>
                <tr>
                    <th style="width: 140px;">No. Pendaftaran</th>
                    <th>Nama Calon Siswa</th>
                    <th>Asal Sekolah</th>
                    <th>Pilihan Jurusan</th>
                    <th>Jalur Pendaftaran</th>
                    <th class="text-center" style="width: 130px;">Status Verifikasi</th>
                    <th class="text-end" style="width: 100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentPpdb as $item)
                    <tr>
                        <td>
                            <a href="{{ route('admin.ppdb.show', $item) }}" class="fw-bold font-monospace text-primary text-decoration-none">
                                {{ $item->nomor_pendaftaran }}
                            </a>
                            <small class="text-muted d-block" style="font-size: 0.72rem;">
                                {{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : '-' }}
                            </small>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 0.8rem; flex-shrink: 0;">
                                    {{ substr($item->nama_lengkap, 0, 1) }}
                                </div>
                                <div>
                                    <div class="fw-bold text-dark" style="font-size: 0.9rem;">{{ $item->nama_lengkap }}</div>
                                    <small class="text-muted">
                                        <i class="bi {{ $item->jenis_kelamin === 'Perempuan' ? 'bi-gender-female text-danger' : 'bi-gender-male text-primary' }}"></i>
                                        <span>{{ $item->jenis_kelamin }}</span>
                                        @if($item->nisn)
                                            <span>• NISN: {{ $item->nisn }}</span>
                                        @endif
                                    </small>
                                </div>
                            </div>
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
                            <span class="badge bg-light text-dark border fw-medium" style="font-size: 0.72rem;">
                                {{ $item->jalur_pendaftaran }}
                            </span>
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
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-2 d-block mb-2 text-muted"></i>
                            <div class="fw-semibold text-dark mb-1">Belum Ada Calon Siswa Baru</div>
                            <p class="small text-muted mb-3">Belum ada formulir PPDB online yang masuk ke basis data.</p>
                            <a href="{{ route('admin.ppdb.create') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                <i class="bi bi-plus-lg me-1"></i> Input Pendaftaran Baru
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Lower Two-Column Section: Latest News & Latest Inbox Messages -->
<div class="row g-4 mb-4">
    <!-- Recent News Articles -->
    <div class="col-12 col-lg-6">
        <div class="card-table h-100 mb-0">
            <div class="card-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-3 d-flex align-items-center justify-content-center text-white" style="width: 34px; height: 34px; background: linear-gradient(135deg, #0284c7, #0369a1);">
                        <i class="bi bi-newspaper"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0 text-dark">Warta & Artikel Terbaru</h6>
                        <small class="text-muted">Publikasi informasi & kegiatan sekolah</small>
                    </div>
                </div>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-primary btn-sm px-3 py-1.5 rounded-3">
                    <span>Kelola Semua</span>
                </a>
            </div>

            <div class="p-3">
                @forelse($recentBerita as $berita)
                    <div class="d-flex align-items-center gap-3 pb-3 mb-3 border-bottom {{ $loop->last ? 'border-0 pb-0 mb-0' : '' }}">
                        <div class="table-thumb" style="width: 54px; height: 54px;">
                            <img src="{{ asset($berita->image) }}" alt="thumb" onerror="this.src='{{ asset('images/berita-lks-cyber.png') }}'">
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="d-flex align-items-center gap-1.5 mb-1 flex-wrap">
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle" style="font-size: 0.68rem;">{{ $berita->category }}</span>
                                @if($berita->is_featured)
                                    <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle" style="font-size: 0.68rem;">
                                        <i class="bi bi-pin-angle-fill me-1"></i>Utama
                                    </span>
                                @endif
                            </div>
                            <h6 class="fw-bold text-dark text-truncate mb-1" style="font-size: 0.88rem;">
                                <a href="{{ route('admin.berita.edit', $berita) }}" class="text-dark text-decoration-none hover-primary">
                                    {{ $berita->title }}
                                </a>
                            </h6>
                            <small class="text-muted" style="font-size: 0.74rem;">
                                <i class="bi bi-calendar3 me-1"></i>{{ $berita->published_at ? \Carbon\Carbon::parse($berita->published_at)->translatedFormat('d M Y') : '-' }} • 
                                <i class="bi bi-eye me-1"></i>{{ number_format($berita->views) }} views
                            </small>
                        </div>
                        <div class="action-cluster flex-shrink-0">
                            <a href="{{ route('admin.berita.edit', $berita) }}" class="btn-action-icon btn-action-edit" title="Edit Artikel">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-4 text-muted">
                        <i class="bi bi-newspaper fs-3 d-block mb-1 text-muted"></i>
                        <p class="small mb-0">Belum ada artikel berita yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="col-12 col-lg-6">
        <div class="card-table h-100 mb-0">
            <div class="card-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-3 d-flex align-items-center justify-content-center text-white" style="width: 34px; height: 34px; background: linear-gradient(135deg, #dc2626, #b91c1c);">
                        <i class="bi bi-chat-left-text-fill"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0 text-dark">Pesan Masuk Terbaru</h6>
                        <small class="text-muted">Aspirasi publik & pertanyaan wali siswa</small>
                    </div>
                </div>
                <a href="{{ route('admin.pesan.index') }}" class="btn btn-outline-danger btn-sm px-3 py-1.5 rounded-3">
                    <span>Buka Kotak Pesan</span>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-admin">
                    <thead>
                        <tr>
                            <th style="width: 50px;">Status</th>
                            <th>Pengirim</th>
                            <th>Subjek Pertanyaan</th>
                            <th class="text-end" style="width: 80px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentPesan as $pesan)
                            <tr>
                                <td>
                                    @if(!$pesan->status_dibaca)
                                        <span class="badge bg-danger rounded-pill px-2 py-0.5" style="font-size: 0.68rem;">Baru</span>
                                    @else
                                        <span class="badge bg-light text-muted border rounded-pill px-2 py-0.5" style="font-size: 0.68rem;">Dibaca</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-dark" style="font-size: 0.88rem;">{{ $pesan->nama }}</div>
                                    <small class="text-muted d-block text-truncate" style="max-width: 140px;">{{ $pesan->email }}</small>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark text-truncate" style="max-width: 180px; font-size: 0.88rem;">{{ $pesan->subjek }}</div>
                                    <small class="text-muted" style="font-size: 0.74rem;">{{ $pesan->created_at->diffForHumans() }}</small>
                                </td>
                                <td class="text-end">
                                    <div class="action-cluster">
                                        <a href="{{ route('admin.pesan.show', $pesan) }}" class="btn-action-icon btn-action-view" title="Baca Pesan">
                                            <i class="bi bi-chat-square-text"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    <i class="bi bi-chat-dots fs-3 d-block mb-1 text-muted"></i>
                                    <p class="small mb-0">Belum ada pesan masuk di kotak surat.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- School & System Status Footer Card -->
<div class="card border-0 rounded-4 p-3.5 bg-white shadow-sm" style="border: 1px solid #e2e8f0 !important;">
    <div class="row align-items-center g-3">
        <div class="col-12 col-md-6 d-flex align-items-center gap-3">
            <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; font-size: 1.25rem; flex-shrink: 0;">
                <i class="bi bi-patch-check-fill"></i>
            </div>
            <div>
                <div class="fw-bold text-dark small mb-0.5">SMK Gema Cyber School • Sekolah Pusat Keunggulan</div>
                <div class="text-muted" style="font-size: 0.76rem;">NPSN: 20219876 • Terakreditasi A (Unggul) • Cyber Defense & Industri 4.0</div>
            </div>
        </div>
        <div class="col-12 col-md-6 d-flex align-items-center justify-content-md-end gap-3 text-muted small">
            <div><i class="bi bi-hdd-network text-success me-1"></i> Server: <strong>Online</strong></div>
            <span>•</span>
            <div><i class="bi bi-shield-check text-primary me-1"></i> CMS Version: <strong>2.5</strong></div>
            <span>•</span>
            <a href="{{ url('/') }}" target="_blank" class="text-decoration-none text-primary fw-semibold">
                Portal Publik <i class="bi bi-box-arrow-up-right ms-1"></i>
            </a>
        </div>
    </div>
</div>
@endsection
