@extends('profil.layout')

@section('title', 'Profil Sekolah')
@section('breadcrumb_active', 'Profil Sekolah')
@section('banner_badge', 'PROFIL RESMI SEKOLAH • TERAKREDITASI A')
@section('banner_title')
    Profil SMK Gema <span style="color: #60a5fa;">Cyber School</span>
@endsection
@section('banner_desc', 'Mengenal Lebih Dekat Komitmen Pendidikan Vokasi Unggulan, Lingkungan Belajar Digital, dan Nilai-Nilai Utama Kami.')

@section('profile_content')

    <!-- ==========================================
         1. TENTANG PROFIL SEKOLAH (OVERVIEW & FEATURES)
         ========================================== -->
    <div class="profile-card">
        <!-- Campus Image Banner -->
        <div class="position-relative overflow-hidden rounded-3 mb-4 shadow-sm" style="max-height: 280px;">
            <img src="{{ asset('images/profile-about-building-2x.png') }}" alt="Gedung Kampus SMK Gema Cyber School" class="img-fluid w-100" style="object-fit: cover; height: 260px;">
            <div class="position-absolute bottom-0 start-0 m-3 d-flex gap-2">
                <span class="badge bg-dark bg-opacity-75 text-white px-3 py-2 rounded-pill small">
                    <i class="bi bi-buildings-fill text-warning me-1"></i>Kampus Pusat Keunggulan
                </span>
                <span class="badge bg-primary bg-opacity-90 text-white px-3 py-2 rounded-pill small">
                    <i class="bi bi-geo-alt-fill me-1"></i>Jl. Cyber Teknologi No. 88
                </span>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 small fw-bold">SEKOLAH PUSAT KEUNGGULAN</span>
            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-1 small fw-semibold"><i class="bi bi-check-circle-fill me-1"></i>Akreditasi A BAN-SM</span>
        </div>

        <h3 class="fw-bold text-dark mb-3" style="font-size: 1.45rem; letter-spacing: -0.4px;">
            Mengenal SMK Gema Cyber School
        </h3>

        <p class="text-secondary mb-3" style="line-height: 1.8; font-size: 0.95rem;">
            SMK Gema Cyber School merupakan institusi pendidikan kejuruan modern yang berorientasi pada keunggulan teknologi, digitalisasi bisnis, dan etika profesional. Berdiri dengan visi mencetak tenaga terampil berstandar global, sekolah kami menghadirkan ekosistem pembelajaran aktif yang menghubungkan teori akademik dengan praktik nyata di industri (<em>Link and Match</em>).
        </p>

        <p class="text-secondary mb-4" style="line-height: 1.8; font-size: 0.95rem;">
            Dengan didukung laboratorium berstandar industri internasional, sertifikasi BNSP resmi, dan pengajar berpengalaman dari kalangan praktisi, SMK Gema Cyber School mendidik siswa agar siap bersaing di dunia kerja, melanjutkan studi ke perguruan tinggi ternama, maupun membangun wirausaha mandiri (BMW).
        </p>

        <!-- 4 Feature Cards (2x2 Grid) -->
        <div class="row g-3 mb-2">
            <div class="col-md-6">
                <div class="about-feature-item">
                    <div class="rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center p-3" style="width: 44px; height: 44px;">
                        <i class="bi bi-book-fill fs-5"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Kurikulum Industri Terintegrasi</div>
                        <div class="text-secondary" style="font-size: 0.76rem;">Diselaraskan langsung dengan kebutuhan DUDI terkini</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="about-feature-item">
                    <div class="rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center p-3" style="width: 44px; height: 44px;">
                        <i class="bi bi-cpu-fill fs-5"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Praktik & Lab Berstandar Modern</div>
                        <div class="text-secondary" style="font-size: 0.76rem;">Fasilitas praktikum lengkap untuk 4 konsentrasi keahlian</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="about-feature-item">
                    <div class="rounded-circle bg-warning-subtle text-warning d-flex align-items-center justify-content-center p-3" style="width: 44px; height: 44px;">
                        <i class="bi bi-person-badge-fill fs-5"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Guru Tersertifikasi Asesor BNSP</div>
                        <div class="text-secondary" style="font-size: 0.76rem;">Didampingi praktisi ahli dari industri digital terkemuka</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="about-feature-item">
                    <div class="rounded-circle d-flex align-items-center justify-content-center p-3" style="width: 44px; height: 44px; background-color: #f5f3ff; color: #8b5cf6;">
                        <i class="bi bi-briefcase-fill fs-5"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Penyaluran Magang & Bursa Kerja</div>
                        <div class="text-secondary" style="font-size: 0.76rem;">Kemitraan strategis dengan puluhan perusahaan terkemuka</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==========================================
         2. NILAI-NILAI UTAMA (CORE VALUES)
         ========================================== -->
    <div class="profile-card mb-0">
        <div class="d-flex align-items-center gap-2 mb-3">
            <div class="stat-icon-box stat-icon-amber" style="width: 38px; height: 38px; font-size: 1.1rem; border-radius: 10px;">
                <i class="bi bi-stars"></i>
            </div>
            <div>
                <h5 class="fw-bold text-dark m-0" style="font-size: 1.2rem;">Nilai-Nilai Utama (Core Values)</h5>
                <span class="text-secondary" style="font-size: 0.74rem;">Pondasi Karakter Insan SMK Gema Cyber School</span>
            </div>
        </div>

        <div class="row g-3">
            <!-- 1. Berkarakter -->
            <div class="col-md-4">
                <div class="core-val-card core-val-blue">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width: 28px; height: 28px; font-size: 0.8rem;">1</div>
                        <h6 class="fw-bold text-dark m-0 fs-6">Berkarakter</h6>
                    </div>
                    <p class="text-secondary m-0" style="line-height: 1.6; font-size: 0.85rem;">
                        Menjunjung tinggi budi pekerti, integritas moral, kedisiplinan kerja, sopan santun, serta etika profesional di setiap langkah kehidupan.
                    </p>
                </div>
            </div>

            <!-- 2. Berkompetensi -->
            <div class="col-md-4">
                <div class="core-val-card core-val-green">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold" style="width: 28px; height: 28px; font-size: 0.8rem;">2</div>
                        <h6 class="fw-bold text-dark m-0 fs-6">Berkompetensi</h6>
                    </div>
                    <p class="text-secondary m-0" style="line-height: 1.6; font-size: 0.85rem;">
                        Menguasai keterampilan teknis mutakhir yang diakui melalui sertifikasi profesi nasional BNSP serta lisensi industri berstandar global.
                    </p>
                </div>
            </div>

            <!-- 3. Berdaya Saing -->
            <div class="col-md-4">
                <div class="core-val-card core-val-amber">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center fw-bold" style="width: 28px; height: 28px; font-size: 0.8rem;">3</div>
                        <h6 class="fw-bold text-dark m-0 fs-6">Berdaya Saing</h6>
                    </div>
                    <p class="text-secondary m-0" style="line-height: 1.6; font-size: 0.85rem;">
                        Memiliki daya juang tinggi, adaptif terhadap inovasi kecerdasan buatan, kreatif dalam pemecahan masalah, dan berjiwa wirausaha mandiri.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
