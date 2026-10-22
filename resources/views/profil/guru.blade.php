@extends('profil.layout')

@section('title', 'Guru & Tenaga Kependidikan')
@section('breadcrumb_active', 'Guru & Staf')
@section('banner_desc', 'Tenaga Pendidik Profesional, Berkompeten, dan Berdedikasi Tinggi')

@section('profile_content')
    <div class="profile-card">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-people-fill text-primary fs-4"></i>
                <h5 class="fw-bold text-dark m-0" style="font-size: 1.15rem;">Guru & Tenaga Kependidikan</h5>
            </div>
            <span class="badge bg-primary rounded-pill px-3 py-2">30+ Guru Profesional</span>
        </div>
        <p class="text-secondary small mb-4">
            Didukung oleh jajaran guru berkualifikasi S1 dan S2 dari perguruan tinggi terkemuka serta memiliki sertifikasi pendidik dan sertifikasi asesor kompetensi industri.
        </p>

        <!-- Teachers Grid -->
        <div class="row g-3">
            <!-- Guru 1 -->
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 50px; height: 50px; flex-shrink: 0;">
                        AR
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Drs. Ahmad Rudianto, M.Pd</div>
                        <div class="text-primary fw-semibold" style="font-size: 0.75rem;">Kepala Sekolah / Guru Kewirausahaan</div>
                        <div class="text-secondary" style="font-size: 0.7rem;">S2 Manajemen Pendidikan</div>
                    </div>
                </div>
            </div>

            <!-- Guru 2 -->
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                    <div class="rounded-circle bg-info text-white d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 50px; height: 50px; flex-shrink: 0;">
                        SR
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Siti Rahmawati, M.Kom</div>
                        <div class="text-primary fw-semibold" style="font-size: 0.75rem;">Waka Kurikulum / Guru Produktif TJKT</div>
                        <div class="text-secondary" style="font-size: 0.7rem;">S2 Ilmu Komputer (CCNA Certified)</div>
                    </div>
                </div>
            </div>

            <!-- Guru 3 -->
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                    <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 50px; height: 50px; flex-shrink: 0;">
                        NH
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Nur Hidayah, S.E, M.Ak</div>
                        <div class="text-primary fw-semibold" style="font-size: 0.75rem;">Kaprog AKL / Guru Praktik Akuntansi</div>
                        <div class="text-secondary" style="font-size: 0.7rem;">S2 Akuntansi (Asesor BNSP)</div>
                    </div>
                </div>
            </div>

            <!-- Guru 4 -->
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                    <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 50px; height: 50px; flex-shrink: 0;">
                        FN
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Fajar Nugroho, S.Kom</div>
                        <div class="text-primary fw-semibold" style="font-size: 0.75rem;">Kaprog TJKT / Guru Administrasi Server</div>
                        <div class="text-secondary" style="font-size: 0.7rem;">S1 Teknik Informatika (MikroTik MTCNA)</div>
                    </div>
                </div>
            </div>

            <!-- Guru 5 -->
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                    <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 50px; height: 50px; flex-shrink: 0;">
                        DS
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Dewi Sartika, S.Sos</div>
                        <div class="text-primary fw-semibold" style="font-size: 0.75rem;">Kaprog MPLB / Guru Komunikasi Bisnis</div>
                        <div class="text-secondary" style="font-size: 0.7rem;">S1 Administrasi Perkantoran</div>
                    </div>
                </div>
            </div>

            <!-- Guru 6 -->
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                    <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 50px; height: 50px; flex-shrink: 0; background-color: #8b5cf6;">
                        DW
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Dimas Wahyu, S.Log</div>
                        <div class="text-primary fw-semibold" style="font-size: 0.75rem;">Kaprog Logistik / Guru Manajemen Rantai Pasok</div>
                        <div class="text-secondary" style="font-size: 0.7rem;">S1 Manajemen Logistik & Transportasi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
