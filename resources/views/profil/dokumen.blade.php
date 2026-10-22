@extends('profil.layout')

@section('title', 'Dokumen Profil & Unduhan')
@section('breadcrumb_active', 'Dokumen')
@section('banner_desc', 'Arsip dan Dokumen Publik Resmi SMK Gema Cyber School yang Dapat Diunduh')

@section('profile_content')
    <div class="profile-card">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-text-fill text-primary fs-4"></i>
                <h5 class="fw-bold text-dark m-0" style="font-size: 1.15rem;">Dokumen Profil & Unduhan Resmi</h5>
            </div>
            <span class="badge bg-light text-dark border px-3 py-2">Format PDF</span>
        </div>
        <p class="text-secondary small mb-4">
            Berikut adalah dokumen resmi institusi SMK Gema Cyber School yang dapat diunduh secara bebas oleh calon siswa, orang tua, dinas terkait, maupun mitra industri.
        </p>

        <!-- Document List -->
        <div class="d-flex flex-column gap-2 mb-3">
            <!-- Doc 1 -->
            <div class="p-3 rounded-3 border bg-light d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-file-earmark-pdf-fill text-danger fs-2"></i>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Buku Profil Lengkap SMK Gema Cyber School</h6>
                        <small class="text-secondary">Edisi 2026/2027 • Bahasa Indonesia • 2.5 MB</small>
                    </div>
                </div>
                <a href="#" class="btn btn-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                    <i class="bi bi-download"></i>
                    <span>Unduh</span>
                </a>
            </div>

            <!-- Doc 2 -->
            <div class="p-3 rounded-3 border bg-light d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-file-earmark-pdf-fill text-warning fs-2"></i>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Visi, Misi, Tujuan, dan Sasaran Mutu</h6>
                        <small class="text-secondary">Dokumen Rencana Strategis (Renstra) • 1.2 MB</small>
                    </div>
                </div>
                <a href="#" class="btn btn-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                    <i class="bi bi-download"></i>
                    <span>Unduh</span>
                </a>
            </div>

            <!-- Doc 3 -->
            <div class="p-3 rounded-3 border bg-light d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-file-earmark-pdf-fill text-success fs-2"></i>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">SK Struktur Organisasi & Uraian Tugas</h6>
                        <small class="text-secondary">Bagan & SK Kepala Sekolah • 1.1 MB</small>
                    </div>
                </div>
                <a href="#" class="btn btn-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                    <i class="bi bi-download"></i>
                    <span>Unduh</span>
                </a>
            </div>

            <!-- Doc 4 -->
            <div class="p-3 rounded-3 border bg-light d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-file-earmark-pdf-fill text-primary fs-2"></i>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Kurikulum Operasional Satuan Pendidikan (KOSP)</h6>
                        <small class="text-secondary">Kurikulum Merdeka SMK PK • 3.4 MB</small>
                    </div>
                </div>
                <a href="#" class="btn btn-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                    <i class="bi bi-download"></i>
                    <span>Unduh</span>
                </a>
            </div>

            <!-- Doc 5 -->
            <div class="p-3 rounded-3 border bg-light d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-file-earmark-pdf-fill text-purple fs-2" style="color: #8b5cf6;"></i>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Brosur & Panduan Pendaftaran PPDB 2026/2027</h6>
                        <small class="text-secondary">Informasi Jalur Prestasi, Beasiswa, & Biaya • 4.8 MB</small>
                    </div>
                </div>
                <a href="#" class="btn btn-primary btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                    <i class="bi bi-download"></i>
                    <span>Unduh</span>
                </a>
            </div>
        </div>
    </div>
@endsection
