@extends('profil.layout')

@section('title', 'Prestasi Siswa & Sekolah')
@section('breadcrumb_active', 'Prestasi')
@section('banner_desc', 'Raihan Prestasi Membanggakan Siswa dan Institusi di Berbagai Tingkat')

@section('profile_content')
    <div class="profile-card">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-trophy-fill text-warning fs-4"></i>
                <h5 class="fw-bold text-dark m-0" style="font-size: 1.15rem;">Prestasi & Kejuaraan</h5>
            </div>
            <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-bold">100+ Prestasi</span>
        </div>
        <p class="text-secondary small mb-4">
            Komitmen kami dalam pembinaan bakat dan kompetensi siswa telah membuahkan berbagai gelar juara bergengsi di ajang Lomba Kompetensi Siswa (LKS) maupun kejuaraan nasional lainnya.
        </p>

        <!-- Achievements List -->
        <div class="row g-3">
            <!-- Prestasi 1 -->
            <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-primary">Juara 1 Tingkat Provinsi</span>
                        <small class="text-muted fw-bold">2025</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">LKS SMK Bidang IT Network Systems Administration</h6>
                    <p class="small text-secondary m-0">Diraih oleh tim TJKT dalam konfigurasi jaringan enterprise dan cloud server security.</p>
                </div>
            </div>

            <!-- Prestasi 2 -->
            <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-success">Juara 1 Nasional</span>
                        <small class="text-muted fw-bold">2024</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">National Accounting Competition (NAC)</h6>
                    <p class="small text-secondary m-0">Kompetisi akuntansi terkomputerisasi dan audit laporan keuangan tingkat universitas/SMK se-Indonesia.</p>
                </div>
            </div>

            <!-- Prestasi 3 -->
            <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-warning text-dark">Juara 2 Tingkat Kota</span>
                        <small class="text-muted fw-bold">2024</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Lomba Administrasi Perkantoran & Otomasi Dokumen</h6>
                    <p class="small text-secondary m-0">Inovasi arsip digital dan simulasi customer relations management oleh perwakilan siswa MPLB.</p>
                </div>
            </div>

            <!-- Prestasi 4 -->
            <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-danger">Juara Harapan 1 Nasional</span>
                        <small class="text-muted fw-bold">2023</small>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Supply Chain & Logistics Youth Challenge</h6>
                    <p class="small text-secondary m-0">Perancangan rute distribusi efisien dan manajemen inventori pergudangan ramah lingkungan.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
