@extends('admin.layout')

@section('title', 'Baca Pesan - ' . $pesan->subjek)
@section('page_title', 'Detail Pesan Masuk')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.pesan.index') }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Kotak Pesan">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Detail Pesan Masuk</h4>
            <p class="text-muted small mb-0">Dari: <strong class="text-dark">{{ $pesan->nama }}</strong> • {{ $pesan->created_at->translatedFormat('d F Y, H:i') }}</p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.pesan.index') }}" class="btn btn-light border btn-sm px-3 py-2 rounded-3 text-secondary">
            Kembali
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Message Content Left Column -->
    <div class="col-12 col-lg-8">
        <div class="card-form">
            <div class="card-header">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-chat-left-quote-fill text-primary fs-5"></i>
                    <h6 class="fw-bold text-dark mb-0">Isi Surat / Pesan Pertanyaan</h6>
                </div>
                @if($pesan->status_dibaca)
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-pill" style="font-size: 0.75rem;">
                        <i class="bi bi-check2-all me-1"></i>Sudah Dibaca
                    </span>
                @else
                    <span class="badge bg-danger rounded-pill px-2.5 py-1" style="font-size: 0.75rem;">
                        <i class="bi bi-envelope-fill me-1"></i>Pesan Baru
                    </span>
                @endif
            </div>

            <div class="card-body">
                <div class="p-3 bg-light rounded-3 border mb-4">
                    <h5 class="fw-bold text-dark mb-2">{{ $pesan->subjek }}</h5>
                    <div class="d-flex flex-wrap gap-3 align-items-center text-muted small">
                        <span><i class="bi bi-person me-1 text-primary"></i><strong>{{ $pesan->nama }}</strong></span>
                        <span><i class="bi bi-envelope me-1 text-info"></i>{{ $pesan->email }}</span>
                        @if($pesan->no_hp)
                            <span><i class="bi bi-whatsapp me-1 text-success"></i>{{ $pesan->no_hp }}</span>
                        @endif
                        <span><i class="bi bi-clock me-1"></i>{{ $pesan->created_at->diffForHumans() }}</span>
                    </div>
                </div>

                <div class="p-4 bg-white rounded-3 border mb-4 shadow-2xs" style="white-space: pre-line; line-height: 1.8; font-size: 0.95rem; color: #1e293b; min-height: 150px;">
                    {{ $pesan->pesan }}
                </div>

                <div class="d-flex flex-wrap gap-2 pt-2 border-top">
                    <a href="mailto:{{ $pesan->email }}?subject=Re: {{ rawurlencode($pesan->subjek) }}" class="btn btn-primary d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
                        <i class="bi bi-reply-fill"></i>
                        <span>Balas via Email</span>
                    </a>
                    @if($pesan->no_hp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pesan->no_hp) }}" target="_blank" class="btn btn-success d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow-sm">
                            <i class="bi bi-whatsapp"></i>
                            <span>Hubungi via WhatsApp</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar Column: Admin Response Notes -->
    <div class="col-12 col-lg-4">
        <div class="card-form mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-clipboard-check text-success fs-5"></i>
                    <h6 class="fw-bold text-dark mb-0">Catatan Disposisi & Respon</h6>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pesan.update', $pesan) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="catatan_balasan" class="form-label-modern">
                            <span>Status Tindak Lanjut Admin</span>
                        </label>
                        <textarea name="catatan_balasan" id="catatan_balasan" rows="5" class="form-control-modern" placeholder="Tulis catatan apakah pesan ini sudah dijawab lewat email/telepon, atau diteruskan ke kaprog/humas...">{{ old('catatan_balasan', $pesan->catatan_balasan) }}</textarea>
                    </div>

                    <div class="mb-3 p-3 bg-light rounded-3 border">
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="status_dibaca" id="status_dibaca" value="1" {{ $pesan->status_dibaca ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold text-dark small" for="status_dibaca">
                                Tandai Sebagai Terbaca
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn-admin-primary w-100 justify-content-center py-2.5">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Simpan Catatan Tindak Lanjut</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="card border-0 rounded-4 p-3 bg-white shadow-sm" style="border: 1px solid #fee2e2 !important; background-color: #fffbfa !important;">
            <div class="fw-bold text-danger small mb-1">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> Zona Bahaya
            </div>
            <p class="text-muted small mb-3">Menghapus pesan ini akan menghilangkannya secara permanen dari basis data arsip.</p>
            <form action="{{ route('admin.pesan.destroy', $pesan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan dari \'{{ addslashes($pesan->nama) }}\' secara permanen?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm w-100 py-2 d-inline-flex align-items-center justify-content-center gap-1.5">
                    <i class="bi bi-trash"></i>
                    <span>Hapus Pesan Masuk</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
