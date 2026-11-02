@extends('admin.layout')

@section('title', 'Kotak Pesan & Pertanyaan Masuk')
@section('page_title', 'Pesan Masuk')

@section('content')
<!-- Page Hero & Actions -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <div class="rounded-3 d-flex align-items-center justify-content-center text-white shadow-sm flex-shrink-0" style="width: 52px; height: 52px; background: linear-gradient(135deg, #0284c7, #0369a1); font-size: 1.5rem;">
            <i class="bi bi-chat-dots-fill"></i>
        </div>
        <div>
            <h4 class="fw-bold text-dark mb-1">Kotak Pesan & Pertanyaan Publik</h4>
            <p class="text-muted small mb-0">Kelola pesan formulir kontak masuk dari calon siswa, wali murid, dan instansi mitra industri.</p>
        </div>
    </div>
</div>

<!-- Status Filter Tabs -->
<div class="d-flex flex-wrap gap-2 mb-3">
    <a href="{{ route('admin.pesan.index') }}" class="btn btn-sm {{ !request('status') ? 'btn-primary shadow-sm' : 'btn-light border bg-white text-secondary' }} fw-semibold rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1.5">
        <span>Semua Pesan</span>
        <span class="badge {{ !request('status') ? 'bg-white text-primary' : 'bg-light text-dark border' }} rounded-pill ms-1">{{ $totalCount }}</span>
    </a>
    <a href="{{ route('admin.pesan.index', ['status' => 'unread']) }}" class="btn btn-sm {{ request('status') === 'unread' ? 'btn-danger shadow-sm' : 'btn-light border bg-white text-secondary' }} fw-semibold rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1.5">
        <i class="bi bi-envelope-fill"></i>
        <span>Belum Dibaca</span>
        <span class="badge {{ request('status') === 'unread' ? 'bg-white text-danger' : 'bg-danger-subtle text-danger' }} rounded-pill ms-1">{{ $unreadCount }}</span>
    </a>
    <a href="{{ route('admin.pesan.index', ['status' => 'read']) }}" class="btn btn-sm {{ request('status') === 'read' ? 'btn-success shadow-sm' : 'btn-light border bg-white text-secondary' }} fw-semibold rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1.5">
        <i class="bi bi-envelope-open"></i>
        <span>Sudah Dibaca</span>
        <span class="badge {{ request('status') === 'read' ? 'bg-white text-success' : 'bg-success-subtle text-success' }} rounded-pill ms-1">{{ $totalCount - $unreadCount }}</span>
    </a>
</div>

<!-- Search Bar -->
<div class="admin-filter-card">
    <form action="{{ route('admin.pesan.index') }}" method="GET" class="row g-2 align-items-center">
        @if(request('status'))
            <input type="hidden" name="status" value="{{ request('status') }}">
        @endif
        <div class="col-12 col-md-9">
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0 text-muted ps-3">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="q" class="form-control border-start-0" placeholder="Cari nama pengirim, email, subjek pertanyaan, atau isi pesan..." value="{{ request('q') }}">
            </div>
        </div>
        <div class="col-12 col-md-3 d-flex gap-2">
            <button type="submit" class="btn-admin-filter w-100 d-inline-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-search"></i>
                <span>Cari Pesan</span>
            </button>
            @if(request()->hasAny(['q', 'status']))
                <a href="{{ route('admin.pesan.index') }}" class="btn btn-outline-secondary px-3 d-inline-flex align-items-center justify-content-center rounded-3" title="Reset">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Messages Table Card -->
<div class="card-table">
    <div class="card-header">
        <div class="d-flex align-items-center gap-2">
            <h6 class="fw-bold text-dark mb-0">Arsip Surat Masuk</h6>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill small">
                {{ $pesans->total() }} Pesan
            </span>
        </div>
        <small class="text-muted">
            Menampilkan halaman {{ $pesans->currentPage() }} dari {{ $pesans->lastPage() }}
        </small>
    </div>

    <div class="table-responsive">
        <table class="table table-admin">
            <thead>
                <tr>
                    <th style="width: 50px;">Status</th>
                    <th>Nama Pengirim</th>
                    <th>Subjek & Cuplikan Pesan</th>
                    <th>Kontak / Email</th>
                    <th>Waktu Masuk</th>
                    <th class="text-end" style="width: 100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesans as $item)
                    <tr class="{{ !$item->status_dibaca ? 'bg-warning bg-opacity-10' : '' }}">
                        <td>
                            @if(!$item->status_dibaca)
                                <span class="badge bg-danger rounded-circle p-2" title="Belum Dibaca">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                            @else
                                <span class="badge bg-light text-muted border rounded-circle p-2" title="Sudah Dibaca">
                                    <i class="bi bi-envelope-open"></i>
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 0.8rem; flex-shrink: 0;">
                                    {{ substr($item->nama, 0, 1) }}
                                </div>
                                <div class="fw-bold text-dark">{{ $item->nama }}</div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.pesan.show', $item) }}" class="fw-bold text-dark text-decoration-none hover-primary d-block mb-0.5" style="font-size: 0.92rem;">
                                {{ $item->subjek }}
                            </a>
                            <small class="text-muted d-block text-truncate" style="max-width: 380px;">{{ $item->pesan }}</small>
                        </td>
                        <td>
                            <div class="small text-secondary">{{ $item->email }}</div>
                            @if($item->no_hp)
                                <small class="text-muted d-flex align-items-center gap-1">
                                    <i class="bi bi-telephone text-success"></i>
                                    <span>{{ $item->no_hp }}</span>
                                </small>
                            @endif
                        </td>
                        <td>
                            <div class="small text-muted d-flex align-items-center gap-1">
                                <i class="bi bi-clock"></i>
                                <span>{{ $item->created_at->diffForHumans() }}</span>
                            </div>
                        </td>
                        <td class="text-end">
                            <div class="action-cluster">
                                <a href="{{ route('admin.pesan.show', $item) }}" class="btn-action-icon btn-action-view" title="Buka & Baca Pesan">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.pesan.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan dari \'{{ addslashes($item->nama) }}\'?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-icon btn-action-delete" title="Hapus Pesan">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="py-4">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                                    <i class="bi bi-chat-square-dots text-muted fs-2"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">Kotak Masuk Kosong</h6>
                                <p class="text-muted small mb-0">Belum ada pesan yang masuk dari pengunjung atau pertanyaan publik saat ini.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pesans->hasPages())
        <div class="p-3 border-top d-flex flex-wrap align-items-center justify-content-between gap-3 bg-light bg-opacity-50">
            <small class="text-muted">
                Menampilkan <strong>{{ $pesans->firstItem() ?? 0 }}</strong> - <strong>{{ $pesans->lastItem() ?? 0 }}</strong> dari <strong>{{ $pesans->total() }}</strong> total pesan
            </small>
            <div>
                {{ $pesans->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
