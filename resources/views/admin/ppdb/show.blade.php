@extends('admin.layout')

@section('title', 'Detail Calon Siswa - ' . $ppdb->nama_lengkap)
@section('page_title', 'Detail Pendaftaran PPDB')

@section('content')
<!-- Page Header & Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('admin.ppdb.index') }}" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;" title="Kembali ke Daftar PPDB">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div>
            <h4 class="fw-bold text-dark mb-0.5">Berkas Calon Siswa Baru</h4>
            <p class="text-muted small mb-0">{{ $ppdb->nama_lengkap }} • Nomor Pendaftaran: <span class="font-monospace fw-bold text-primary">{{ $ppdb->nomor_pendaftaran }}</span></p>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <button onclick="window.print()" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 px-3 py-2 rounded-3">
            <i class="bi bi-printer"></i>
            <span>Cetak Bukti</span>
        </button>
        <a href="{{ route('admin.ppdb.edit', $ppdb) }}" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1.5 px-3 py-2 rounded-3 shadow-sm">
            <i class="bi bi-pencil-square"></i>
            <span>Edit Data</span>
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Left Column: Dossier -->
    <div class="col-12 col-lg-8">
        <!-- Main Card -->
        <div class="card-form mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-4 shadow-sm" style="width: 52px; height: 52px; flex-shrink: 0;">
                        {{ substr($ppdb->nama_lengkap, 0, 1) }}
                    </div>
                    <div>
                        <h5 class="fw-bold text-dark mb-1">{{ $ppdb->nama_lengkap }}</h5>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <span class="badge bg-light text-dark border font-monospace">{{ $ppdb->nomor_pendaftaran }}</span>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle">{{ $ppdb->jalur_pendaftaran }}</span>
                            <span class="text-muted small">• Waktu Masuk: {{ $ppdb->created_at->translatedFormat('d F Y, H:i') }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    @php
                        $badgeStatus = match($ppdb->status) {
                            'Diterima' => 'badge bg-success-subtle text-success border border-success-subtle fw-bold px-3 py-2 rounded-pill',
                            'Menunggu Verifikasi' => 'badge bg-warning-subtle text-warning-emphasis border border-warning-subtle fw-bold px-3 py-2 rounded-pill',
                            'Diverifikasi' => 'badge bg-info-subtle text-info-emphasis border border-info-subtle fw-bold px-3 py-2 rounded-pill',
                            'Ditolak' => 'badge bg-danger-subtle text-danger border border-danger-subtle fw-bold px-3 py-2 rounded-pill',
                            default => 'badge bg-secondary-subtle text-secondary border px-3 py-2 rounded-pill',
                        };
                    @endphp
                    <span class="{{ $badgeStatus }} fs-6">{{ $ppdb->status }}</span>
                </div>
            </div>

            <div class="card-body">
                <!-- Profile Info Table -->
                <h6 class="fw-bold text-dark mb-3"><i class="bi bi-person-badge text-primary me-2"></i>Data Identitas Pribadi</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <small class="text-muted d-block">Nomor Induk Siswa Nasional (NISN):</small>
                        <div class="fw-semibold text-dark font-monospace">{{ $ppdb->nisn ?: '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Nomor Induk Kependudukan (NIK):</small>
                        <div class="fw-semibold text-dark font-monospace">{{ $ppdb->nik ?: '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Jenis Kelamin:</small>
                        <div class="fw-semibold text-dark d-flex align-items-center gap-1.5">
                            <i class="bi {{ $ppdb->jenis_kelamin === 'Perempuan' ? 'bi-gender-female text-danger' : 'bi-gender-male text-primary' }}"></i>
                            <span>{{ $ppdb->jenis_kelamin }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Tempat, Tanggal Lahir:</small>
                        <div class="fw-semibold text-dark">
                            {{ $ppdb->tempat_lahir ?: '-' }}, {{ $ppdb->tanggal_lahir ? $ppdb->tanggal_lahir->translatedFormat('d F Y') : '-' }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Agama:</small>
                        <div class="fw-semibold text-dark">{{ $ppdb->agama ?: '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Asal Sekolah (SMP / MTs):</small>
                        <div class="fw-bold text-primary">{{ $ppdb->asal_sekolah }}</div>
                    </div>
                    <div class="col-12">
                        <small class="text-muted d-block">Alamat Domisili:</small>
                        <div class="fw-semibold text-dark">{{ $ppdb->alamat ?: '-' }}</div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Major Choices -->
                <h6 class="fw-bold text-dark mb-3"><i class="bi bi-mortarboard text-success me-2"></i>Pilihan Program Keahlian (Jurusan)</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border">
                            <small class="text-muted d-block fw-semibold">Pilihan Utama (Prioritas 1):</small>
                            <h6 class="fw-bold text-primary mt-1 mb-0">{{ $ppdb->pilihan_jurusan_1 }}</h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border">
                            <small class="text-muted d-block fw-semibold">Pilihan Cadangan (Prioritas 2):</small>
                            <h6 class="fw-bold text-secondary mt-1 mb-0">{{ $ppdb->pilihan_jurusan_2 ?: 'Tidak memilih pilihan ke-2' }}</h6>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Contact & Parent Info -->
                <h6 class="fw-bold text-dark mb-3"><i class="bi bi-telephone text-info me-2"></i>Kontak & Data Orang Tua / Wali</h6>
                <div class="row g-3 mb-2">
                    <div class="col-md-6">
                        <small class="text-muted d-block">No. WhatsApp / HP Siswa:</small>
                        <div class="fw-semibold text-dark">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $ppdb->no_hp) }}" target="_blank" class="text-decoration-none text-success fw-bold">
                                <i class="bi bi-whatsapp me-1"></i>{{ $ppdb->no_hp }}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Email Siswa:</small>
                        <div class="fw-semibold text-dark">{{ $ppdb->email ?: '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Nama Orang Tua / Wali:</small>
                        <div class="fw-semibold text-dark">{{ $ppdb->nama_orang_tua ?: '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">No. Telepon Orang Tua:</small>
                        <div class="fw-semibold text-dark">{{ $ppdb->no_hp_orang_tua ?: '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Verification & Status Updater -->
    <div class="col-12 col-lg-4">
        <div class="card-form mb-4">
            <div class="card-header">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-patch-check-fill text-primary fs-5"></i>
                    <h6 class="fw-bold text-dark mb-0">Keputusan Verifikasi Panitia</h6>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.ppdb.updateStatus', $ppdb) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="status" class="form-label-modern">
                            <span>Status Verifikasi & Seleksi</span>
                        </label>
                        <select name="status" id="status" class="form-select-modern fw-bold" required>
                            <option value="Menunggu Verifikasi" {{ $ppdb->status === 'Menunggu Verifikasi' ? 'selected' : '' }}>⏳ Menunggu Verifikasi</option>
                            <option value="Diverifikasi" {{ $ppdb->status === 'Diverifikasi' ? 'selected' : '' }}>🔍 Diverifikasi (Berkas Lengkap)</option>
                            <option value="Diterima" {{ $ppdb->status === 'Diterima' ? 'selected' : '' }}>🎉 Diterima (Lulus Seleksi)</option>
                            <option value="Ditolak" {{ $ppdb->status === 'Ditolak' ? 'selected' : '' }}>❌ Ditolak (Tidak Memenuhi Syarat)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="catatan_admin" class="form-label-modern">
                            <span>Catatan Tim Penguji / Panitia</span>
                        </label>
                        <textarea name="catatan_admin" id="catatan_admin" rows="4" class="form-control-modern" placeholder="Contoh: Rapor semester 1-5 rata-rata 88.0. Hasil tes wawancara sangat memuaskan...">{{ old('catatan_admin', $ppdb->catatan_admin) }}</textarea>
                    </div>

                    <button type="submit" class="btn-admin-primary w-100 justify-content-center py-2.5">
                        <i class="bi bi-check2-circle"></i>
                        <span>Perbarui Status Calon Siswa</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="card border-0 rounded-4 p-3 bg-white shadow-sm" style="border: 1px solid #e2e8f0 !important;">
            <div class="d-flex justify-content-between mb-1.5 small">
                <span class="text-muted">Waktu Pendaftaran:</span>
                <span class="text-dark fw-semibold">{{ $ppdb->created_at->translatedFormat('d M Y, H:i') }}</span>
            </div>
            <div class="d-flex justify-content-between small">
                <span class="text-muted">Terakhir Diperbarui:</span>
                <span class="text-dark fw-semibold">{{ $ppdb->updated_at->translatedFormat('d M Y, H:i') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
