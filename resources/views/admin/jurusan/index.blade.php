@extends('admin.layout')

@section('title', 'Manajemen Program Keahlian')
@section('page_title', 'Program Keahlian (Jurusan)')

@section('content')
<!-- Page Hero & Actions -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <div class="rounded-3 d-flex align-items-center justify-content-center text-white shadow-sm flex-shrink-0" style="width: 48px; height: 48px; background: linear-gradient(135deg, #2563eb, #1d4ed8); font-size: 1.35rem;">
            <i class="bi bi-mortarboard-fill"></i>
        </div>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Daftar Program Keahlian (Jurusan)</h4>
            <p class="text-muted small mb-0">Kelola 4 konsentrasi kejuruan vokasi, kurikulum industri, kepala konsentrasi, dan laboratorium praktikum.</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ url('/#jurusan') }}" target="_blank" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3">
            <i class="bi bi-eye"></i>
            <span>Portal Beranda Publik</span>
        </a>
        <a href="{{ route('admin.jurusan.create') }}" class="btn-admin-primary text-decoration-none">
            <i class="bi bi-plus-lg"></i>
            <span>Tambah Jurusan Baru</span>
        </a>
    </div>
</div>

<!-- Executive Summary Metric Cards -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-primary-subtle text-primary">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Total Konsentrasi</div>
                <div class="fs-5 fw-bold text-dark">{{ \App\Models\Jurusan::count() }} Jurusan</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="kpi-mini-card">
            <div class="kpi-mini-icon bg-success-subtle text-success">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold">Status Operasional</div>
                <div class="fs-5 fw-bold text-dark">{{ \App\Models\Jurusan::where('is_active', true)->count() }} Aktif</div>
            </div>
        </div>
    </div>
</div>

<!-- Jurusan Data Table Card -->
<div class="card-table">
    <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
        <div class="d-flex align-items-center gap-2">
            <h6 class="fw-bold text-dark mb-0">Database Program Keahlian</h6>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill small">
                {{ $jurusans->count() }} Konsentrasi
            </span>
        </div>
        <small class="text-muted">
            SMK Gema Cyber School • Kurikulum Vokasi Unggulan
        </small>
    </div>

    <div class="table-responsive">
        <table class="table table-admin">
            <thead>
                <tr>
                    <th style="width: 75px;">Foto</th>
                    <th>Kode & Program Keahlian</th>
                    <th>Kepala Konsentrasi</th>
                    <th>Fokus Kompetensi Keahlian</th>
                    <th class="text-center" style="width: 120px;">Status</th>
                    <th class="text-end" style="width: 130px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jurusans as $item)
                    <tr>
                        <td>
                            <div class="table-thumb">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->short_name }}" onerror="this.src='{{ asset('images/jurusan-tjkt-hd.png') }}'">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                                <span class="badge font-monospace text-white px-2 py-0.5 rounded shadow-sm" style="background-color: {{ $item->accent_color ?? '#2563eb' }}; font-size: 0.72rem;">
                                    <i class="bi {{ $item->icon ?: 'bi-award' }} me-1"></i>{{ $item->code ?: $item->short_name }}
                                </span>
                                <span class="fw-bold text-dark" style="font-size: 0.95rem;">{{ $item->name }}</span>
                            </div>
                            <small class="text-muted d-block text-truncate" style="max-width: 380px;">
                                {{ $item->description }}
                            </small>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; font-size: 0.85rem; flex-shrink: 0;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div>
                                    <div class="small fw-semibold text-dark">{{ $item->head_of_program ?: 'Belum ditentukan' }}</div>
                                    <small class="text-muted" style="font-size: 0.72rem;">Kepala Konsentrasi</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if(!empty($item->competencies_list))
                                <div class="d-flex flex-wrap gap-1" style="max-width: 340px;">
                                    @foreach(array_slice($item->competencies_list, 0, 2) as $comp)
                                        <span class="badge bg-light text-secondary border small px-2 py-1" style="font-size: 0.72rem;">
                                            {{ is_array($comp) ? ($comp['title'] ?? '') : $comp }}
                                        </span>
                                    @endforeach
                                    @if(count($item->competencies_list) > 2)
                                        <span class="badge bg-light text-muted border small px-2 py-1" style="font-size: 0.72rem;">
                                            +{{ count($item->competencies_list) - 2 }} lainnya
                                        </span>
                                    @endif
                                </div>
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge {{ $item->is_active ? 'bg-success-subtle text-success border border-success-subtle' : 'bg-secondary' }} rounded-pill px-2.5 py-1" style="font-size: 0.72rem;">
                                {{ $item->is_active ? 'Aktif' : 'Non-Aktif' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="action-cluster">
                                <a href="{{ route('jurusan.show', $item->slug) }}" target="_blank" class="btn-action-icon btn-action-view" title="Lihat Halaman Jurusan">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.jurusan.edit', $item) }}" class="btn-action-icon btn-action-edit" title="Edit Data Program">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.jurusan.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jurusan \'{{ addslashes($item->name) }}\'?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-icon btn-action-delete" title="Hapus Jurusan">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            Belum ada data program keahlian.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
