@extends('profil.layout')

@section('title', 'Sejarah Sekolah')
@section('breadcrumb_active', 'Sejarah')
@section('banner_desc', 'Jejak Langkah dan Perjalanan Perkembangan SMK Gema Cyber School dari Masa ke Masa')

@section('profile_content')
    <!-- Card: Sejarah Pendirian -->
    <div class="profile-card">
        <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bi bi-clock-history text-primary fs-4"></i>
            <h5 class="fw-bold text-dark m-0" style="font-size: 1.15rem;">Sejarah Pendirian Sekolah</h5>
        </div>
        <p class="text-secondary small" style="line-height: 1.65;">
            SMK Gema Cyber School didirikan dengan tekad kuat untuk menjawab tantangan revolusi industri 4.0 dan kebutuhan mendesak akan talenta vokasi di bidang teknologi dan manajemen bisnis modern. Berawal dari 2 program keahlian pada tahun 2018, kini sekolah terus berkembang pesat menjadi institusi pendidikan kejuruan rujukan berfasilitas modern dan berstandar industri.
        </p>
    </div>

    <!-- Card: Timeline Perjalanan Sejarah -->
    <div class="profile-card">
        <h5 class="fw-bold text-dark mb-4" style="font-size: 1rem;">
            <i class="bi bi-signpost-split-fill text-warning me-2"></i>Tonggak Perkembangan (Milestones)
        </h5>

        <div class="timeline-list">
            <!-- 2018 -->
            <div class="timeline-item mb-4">
                <span class="timeline-badge">2018</span>
                <div>
                    <h6 class="timeline-content-title fw-bold">Pendirian SMK Gema Cyber School</h6>
                    <p class="timeline-content-desc">
                        Resmi berdiri dengan izin operasional dinas pendidikan. Memulai tahun ajaran perdana dengan 2 program keahlian unggulan yaitu Teknik Komputer & Jaringan dan Akuntansi, didukung angkatan pertama sebanyak 120 siswa.
                    </p>
                </div>
            </div>

            <!-- 2020 -->
            <div class="timeline-item mb-4">
                <span class="timeline-badge">2020</span>
                <div>
                    <h6 class="timeline-content-title fw-bold">Penambahan Program Keahlian & Akreditasi</h6>
                    <p class="timeline-content-desc">
                        Membuka program keahlian Manajemen Perkantoran dan Layanan Bisnis (MPLB) serta meraih akreditasi A (Unggul) dari Badan Akreditasi Nasional Sekolah/Madrasah (BAN-S/M).
                    </p>
                </div>
            </div>

            <!-- 2022 -->
            <div class="timeline-item mb-4">
                <span class="timeline-badge">2022</span>
                <div>
                    <h6 class="timeline-content-title fw-bold">Ekspansi Kemitraan Industri & Kelas Khusus</h6>
                    <p class="timeline-content-desc">
                        Menjalin kerja sama MoU dengan lebih dari 20 perusahaan terkemuka, meluncurkan kurikulum industri terintegrasi, dan program magang bersertifikasi nasional.
                    </p>
                </div>
            </div>

            <!-- 2024 -->
            <div class="timeline-item mb-4">
                <span class="timeline-badge">2024</span>
                <div>
                    <h6 class="timeline-content-title fw-bold">Modernisasi Fasilitas & Jurusan Logistik</h6>
                    <p class="timeline-content-desc">
                        Pembangunan gedung baru berstandar smart campus, pembukaan Jurusan Manajemen Logistik, serta peresmian laboratorium cloud computing dan jaringan fiber optic canggih.
                    </p>
                </div>
            </div>

            <!-- 2026 -->
            <div class="timeline-item mb-0">
                <span class="timeline-badge">2026</span>
                <div>
                    <h6 class="timeline-content-title fw-bold">Menuju Sekolah Unggul & Berdaya Saing Global</h6>
                    <p class="timeline-content-desc">
                        Terus berinovasi dengan teaching factory mandiri, sertifikasi internasional bagi seluruh lulusan, dan perluasan program wirausaha muda kejuruan.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
