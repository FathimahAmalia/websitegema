<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Profil SMK Gema Cyber School - Pendidikan Vokasi Berkualitas untuk Masa Depan yang Lebih Baik.">
    
    <title>Profil Sekolah - SMK Gema Cyber School</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Custom School Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/school-style.css') }}">
</head>
<body>

    <!-- ==========================================
         TOP NAVBAR (STICKY / FIXED)
         ========================================== -->
    <nav class="navbar navbar-expand-lg school-navbar fixed-top">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/school-logo-2x.png') }}" alt="SMK Gema Cyber School" class="brand-logo-img">
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGema" aria-controls="navbarGema" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarGema">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="bi bi-house-door me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="{{ url('/profil') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil <i class="bi bi-chevron-down nav-chevron"></i>
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                            <li><a class="dropdown-item py-2 active" href="{{ url('/profil') }}">Profil Sekolah</a></li>
                            <li><a class="dropdown-item py-2" href="{{ url('/profil') }}#visi-misi">Visi & Misi</a></li>
                            <li><a class="dropdown-item py-2" href="{{ url('/profil') }}#sejarah">Sejarah Sekolah</a></li>
                            <li><a class="dropdown-item py-2" href="{{ url('/profil') }}#fasilitas">Fasilitas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Jurusan <i class="bi bi-chevron-down nav-chevron"></i>
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                            <li><a class="dropdown-item py-2" href="{{ url('/') }}#jurusan-tjkt">Teknik Jaringan Komputer & Telekomunikasi (TJKT)</a></li>
                            <li><a class="dropdown-item py-2" href="{{ url('/') }}#jurusan-akl">Akuntansi & Keuangan Lembaga (AKL)</a></li>
                            <li><a class="dropdown-item py-2" href="{{ url('/') }}#jurusan-mplb">Manajemen Perkantoran & Layanan Bisnis (MPLB)</a></li>
                            <li><a class="dropdown-item py-2" href="{{ url('/') }}#jurusan-logistik">Logistik</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#ppdb">PPDB</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kegiatan <i class="bi bi-chevron-down nav-chevron"></i>
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                            <li><a class="dropdown-item py-2" href="#ekskul">Ekstrakurikuler</a></li>
                            <li><a class="dropdown-item py-2" href="#prestasi">Prestasi Siswa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeri">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                </ul>

                <!-- Right Actions -->
                <div class="d-flex align-items-center gap-3">
                    <button type="button" class="btn-nav-search" data-bs-toggle="modal" data-bs-target="#searchModal" title="Pencarian">
                        <i class="bi bi-search"></i>
                    </button>
                    <a href="{{ url('/') }}#ppdb" class="btn-ppdb-nav">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>PPDB Online</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ==========================================
         PAGE HEADER BANNER (PROFIL SEKOLAH)
         ========================================== -->
    <header class="profile-page-banner">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Title & Breadcrumbs -->
                <div class="col-lg-6 py-2">
                    <div class="profile-banner-sub">Profil Sekolah</div>
                    <h1 class="profile-banner-title">SMK Gema Cyber School</h1>
                    <p class="profile-banner-desc">
                        Pendidikan Vokasi Berkualitas untuk Masa Depan yang Lebih Baik
                    </p>
                    <div class="profile-breadcrumb">
                        <a href="{{ url('/') }}"><i class="bi bi-house-door-fill me-1"></i>Beranda</a>
                        <span class="opacity-75">></span>
                        <span>Profil Sekolah</span>
                    </div>
                </div>

                <!-- Right Building Graphic & Quote Banner -->
                <div class="col-lg-6 text-end d-none d-lg-block">
                    <img src="{{ asset('images/profile-banner-right-2x.png') }}" alt="Motto SMK Gema Cyber School" class="profile-banner-right-img">
                </div>
            </div>
        </div>
    </header>

    <!-- ==========================================
         MAIN CONTENT AREA (3-COLUMN LAYOUT)
         ========================================== -->
    <main class="profile-content-area">
        <div class="container">
            <div class="row g-3">
                
                <!-- ==========================================
                     COLUMN 1: SIDEBAR MENU (LEFT)
                     ========================================== -->
                <div class="col-lg-2 col-md-3">
                    <div class="profile-sidebar-card">
                        <a href="#profil" class="profile-nav-link active">
                            <i class="bi bi-building"></i>
                            <span>Profil Sekolah</span>
                        </a>
                        <a href="#visi-misi" class="profile-nav-link">
                            <i class="bi bi-bullseye"></i>
                            <span>Visi & Misi</span>
                        </a>
                        <a href="#sejarah" class="profile-nav-link">
                            <i class="bi bi-clock-history"></i>
                            <span>Sejarah</span>
                        </a>
                        <a href="#struktur" class="profile-nav-link">
                            <i class="bi bi-diagram-3"></i>
                            <span>Struktur Organisasi</span>
                        </a>
                        <a href="#guru" class="profile-nav-link">
                            <i class="bi bi-people"></i>
                            <span>Guru & Tenaga Kependidikan</span>
                        </a>
                        <a href="#fasilitas" class="profile-nav-link">
                            <i class="bi bi-buildings"></i>
                            <span>Fasilitas</span>
                        </a>
                        <a href="#prestasi" class="profile-nav-link">
                            <i class="bi bi-trophy"></i>
                            <span>Prestasi</span>
                        </a>
                        <a href="#kerjasama" class="profile-nav-link">
                            <i class="bi bi-handshake"></i>
                            <span>Kerja Sama</span>
                        </a>
                        <a href="#dokumen" class="profile-nav-link">
                            <i class="bi bi-file-earmark-text"></i>
                            <span>Dokumen</span>
                        </a>
                    </div>
                </div>

                <!-- ==========================================
                     COLUMN 2: MAIN PROFILE CONTENT (CENTER)
                     ========================================== -->
                <div class="col-lg-7 col-md-9">
                    
                    <!-- Card 1: Tentang SMK Gema Cyber School -->
                    <div class="profile-card" id="profil">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-5">
                                <img src="{{ asset('images/profile-about-building-2x.png') }}" alt="Gedung SMK Gema Cyber School" class="img-fluid rounded-3 w-100" style="object-fit: cover;">
                            </div>
                            <div class="col-md-7">
                                <h4 class="fw-bold text-dark mb-2" style="font-size: 1.15rem;">Tentang SMK Gema Cyber School</h4>
                                <p class="text-secondary small mb-3" style="line-height: 1.55;">
                                    SMK Gema Cyber School merupakan sekolah menengah kejuruan yang berkomitmen menghasilkan lulusan yang kompeten, berkarakter, dan siap kerja di era digital. Kami menyediakan pendidikan vokasi yang berkualitas dengan kurikulum yang disesuaikan dengan kebutuhan industri dan perkembangan teknologi.
                                </p>
                                
                                <!-- 4 Feature Mini Tags (2x2) -->
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="about-feature-item">
                                            <i class="bi bi-book-fill text-primary"></i>
                                            <span>Kurikulum Berbasis Industri</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="about-feature-item">
                                            <i class="bi bi-gear-fill text-success"></i>
                                            <span>Pembelajaran Praktis dan Modern</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="about-feature-item">
                                            <i class="bi bi-people-fill text-warning"></i>
                                            <span>Tenaga Pendidik Profesional</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="about-feature-item">
                                            <i class="bi bi-bar-chart-fill text-purple" style="color: #8b5cf6;"></i>
                                            <span>Siap Kerja dan Berwirausaha</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Visi & Misi Sekolah (2 Columns) -->
                    <div class="profile-card" id="visi-misi">
                        <div class="row g-3">
                            <!-- Visi Sekolah -->
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.85rem;">
                                        <i class="bi bi-eye-fill"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark m-0" style="font-size: 1rem;">Visi Sekolah</h5>
                                </div>
                                <div class="visi-box">
                                    "Menjadi sekolah menengah kejuruan yang unggul dalam bidang teknologi, bisnis, dan layanan, berkarakter, serta mampu bersaing di tingkat nasional pada tahun 2030."
                                </div>
                            </div>

                            <!-- Misi Sekolah -->
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.85rem;">
                                        <i class="bi bi-bullseye"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark m-0" style="font-size: 1rem;">Misi Sekolah</h5>
                                </div>
                                <ul class="misi-list">
                                    <li>
                                        <span class="misi-num">1</span>
                                        <span>Menyelenggarakan pendidikan vokasi yang berkualitas.</span>
                                    </li>
                                    <li>
                                        <span class="misi-num">2</span>
                                        <span>Mengembangkan kompetensi siswa sesuai kebutuhan industri.</span>
                                    </li>
                                    <li>
                                        <span class="misi-num">3</span>
                                        <span>Membangun karakter, disiplin, dan etika kerja yang baik.</span>
                                    </li>
                                    <li>
                                        <span class="misi-num">4</span>
                                        <span>Menciptakan lingkungan belajar yang aman, nyaman, dan inovatif.</span>
                                    </li>
                                    <li>
                                        <span class="misi-num">5</span>
                                        <span>Menjalin kerja sama dengan dunia usaha dan dunia industri.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: 5 Key Stat Metrics Bar -->
                    <div class="profile-stats-card">
                        <div class="row g-2 align-items-center justify-content-between">
                            <!-- 500+ Siswa Aktif -->
                            <div class="col-auto">
                                <div class="profile-stat-box">
                                    <div class="profile-stat-icon bg-primary">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark" style="font-size: 1.05rem; line-height: 1.1;">500+</div>
                                        <div class="text-secondary" style="font-size: 0.72rem;">Siswa Aktif</div>
                                    </div>
                                </div>
                            </div>

                            <!-- 30+ Guru Profesional -->
                            <div class="col-auto">
                                <div class="profile-stat-box">
                                    <div class="profile-stat-icon bg-success">
                                        <i class="bi bi-person-workspace"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark" style="font-size: 1.05rem; line-height: 1.1;">30+</div>
                                        <div class="text-secondary" style="font-size: 0.72rem;">Guru Profesional</div>
                                    </div>
                                </div>
                            </div>

                            <!-- 4 Program Keahlian -->
                            <div class="col-auto">
                                <div class="profile-stat-box">
                                    <div class="profile-stat-icon bg-warning">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark" style="font-size: 1.05rem; line-height: 1.1;">4</div>
                                        <div class="text-secondary" style="font-size: 0.72rem;">Program Keahlian</div>
                                    </div>
                                </div>
                            </div>

                            <!-- 100+ Prestasi -->
                            <div class="col-auto">
                                <div class="profile-stat-box">
                                    <div class="profile-stat-icon" style="background-color: #8b5cf6;">
                                        <i class="bi bi-trophy-fill"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark" style="font-size: 1.05rem; line-height: 1.1;">100+</div>
                                        <div class="text-secondary" style="font-size: 0.72rem;">Prestasi</div>
                                    </div>
                                </div>
                            </div>

                            <!-- 20+ Mitra Industri -->
                            <div class="col-auto">
                                <div class="profile-stat-box">
                                    <div class="profile-stat-icon bg-danger">
                                        <i class="bi bi-handshake-fill"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark" style="font-size: 1.05rem; line-height: 1.1;">20+</div>
                                        <div class="text-secondary" style="font-size: 0.72rem;">Mitra Industri</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Sejarah Singkat (Timeline) & Fasilitas Unggulan -->
                    <div class="row g-3">
                        <!-- Left: Sejarah Singkat -->
                        <div class="col-md-6" id="sejarah">
                            <div class="profile-card h-100">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <i class="bi bi-clock-history text-primary fs-5"></i>
                                    <h5 class="fw-bold text-dark m-0" style="font-size: 0.95rem;">Sejarah Singkat</h5>
                                </div>

                                <div class="timeline-list">
                                    <!-- 2018 -->
                                    <div class="timeline-item">
                                        <span class="timeline-badge">2018</span>
                                        <div>
                                            <div class="timeline-content-title">Pendirian SMK Gema Cyber School</div>
                                            <p class="timeline-content-desc">Memulai langkah pertama dengan 2 program keahlian.</p>
                                        </div>
                                    </div>
                                    <!-- 2020 -->
                                    <div class="timeline-item">
                                        <span class="timeline-badge">2020</span>
                                        <div>
                                            <div class="timeline-content-title">Penambahan Program Keahlian</div>
                                            <p class="timeline-content-desc">Menambah jurusan dan meningkatkan fasilitas pembelajaran.</p>
                                        </div>
                                    </div>
                                    <!-- 2022 -->
                                    <div class="timeline-item">
                                        <span class="timeline-badge">2022</span>
                                        <div>
                                            <div class="timeline-content-title">Kerja Sama Industri</div>
                                            <p class="timeline-content-desc">Menjalin kemitraan dengan berbagai perusahaan dan instansi.</p>
                                        </div>
                                    </div>
                                    <!-- 2024 -->
                                    <div class="timeline-item">
                                        <span class="timeline-badge">2024</span>
                                        <div>
                                            <div class="timeline-content-title">Pengembangan Fasilitas</div>
                                            <p class="timeline-content-desc">Modernisasi laboratorium dan sarana pembelajaran.</p>
                                        </div>
                                    </div>
                                    <!-- 2026 -->
                                    <div class="timeline-item mb-0">
                                        <span class="timeline-badge">2026</span>
                                        <div>
                                            <div class="timeline-content-title">Menuju Sekolah Unggul</div>
                                            <p class="timeline-content-desc">Terus berinovasi untuk mencetak lulusan siap kerja dan berwirausaha.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Fasilitas Unggulan (6 Grid) -->
                        <div class="col-md-6" id="fasilitas">
                            <div class="profile-card h-100">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-buildings-fill text-primary fs-5"></i>
                                        <h5 class="fw-bold text-dark m-0" style="font-size: 0.95rem;">Fasilitas Unggulan</h5>
                                    </div>
                                    <a href="#fasilitas" class="small text-primary text-decoration-none fw-semibold" style="font-size: 0.76rem;">Lihat Semua</a>
                                </div>

                                <div class="row g-2">
                                    <!-- 1. Lab Komputer -->
                                    <div class="col-4">
                                        <div class="facility-thumb-card">
                                            <img src="{{ asset('images/fasilitas-lab-komputer-2x.png') }}" alt="Laboratorium Komputer" class="facility-thumb-img">
                                            <div class="facility-thumb-title">Laboratorium Komputer</div>
                                        </div>
                                    </div>
                                    <!-- 2. Lab Jaringan -->
                                    <div class="col-4">
                                        <div class="facility-thumb-card">
                                            <img src="{{ asset('images/fasilitas-lab-jaringan-2x.png') }}" alt="Laboratorium Jaringan" class="facility-thumb-img">
                                            <div class="facility-thumb-title">Laboratorium Jaringan</div>
                                        </div>
                                    </div>
                                    <!-- 3. Ruang Kelas Modern -->
                                    <div class="col-4">
                                        <div class="facility-thumb-card">
                                            <img src="{{ asset('images/fasilitas-kelas-modern-2x.png') }}" alt="Ruang Kelas Modern" class="facility-thumb-img">
                                            <div class="facility-thumb-title">Ruang Kelas Modern</div>
                                        </div>
                                    </div>
                                    <!-- 4. Perpustakaan -->
                                    <div class="col-4">
                                        <div class="facility-thumb-card">
                                            <img src="{{ asset('images/fasilitas-perpustakaan-2x.png') }}" alt="Perpustakaan" class="facility-thumb-img">
                                            <div class="facility-thumb-title">Perpustakaan</div>
                                        </div>
                                    </div>
                                    <!-- 5. Ruang Praktik Akuntansi -->
                                    <div class="col-4">
                                        <div class="facility-thumb-card">
                                            <img src="{{ asset('images/fasilitas-praktik-akuntansi-2x.png') }}" alt="Ruang Praktik Akuntansi" class="facility-thumb-img">
                                            <div class="facility-thumb-title">Praktik Akuntansi</div>
                                        </div>
                                    </div>
                                    <!-- 6. Ruang Logistik -->
                                    <div class="col-4">
                                        <div class="facility-thumb-card">
                                            <img src="{{ asset('images/fasilitas-ruang-logistik-2x.png') }}" alt="Ruang Logistik" class="facility-thumb-img">
                                            <div class="facility-thumb-title">Ruang Logistik</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ==========================================
                     COLUMN 3: RIGHT WIDGETS
                     ========================================== -->
                <div class="col-lg-3 col-md-12">
                    
                    <!-- Widget 1: Sambutan Kepala Sekolah -->
                    <div class="profile-card text-center mb-3">
                        <div class="d-flex align-items-center gap-2 mb-3 text-start">
                            <i class="bi bi-person-badge-fill text-primary"></i>
                            <h6 class="fw-bold text-dark m-0">Sambutan Kepala Sekolah</h6>
                        </div>

                        <!-- Principal Photo -->
                        <img src="{{ asset('images/profile-kepsek-2x.png') }}" alt="Drs. Ahmad Rudianto, M.Pd" class="profile-kepsek-img">

                        <!-- Quote Message -->
                        <div class="kepsek-quote text-start">
                            "Kami berkomitmen memberikan pendidikan terbaik untuk mencetak lulusan yang unggul, berkarakter, dan siap menghadapi tantangan dunia kerja maupun melanjutkan pendidikan ke jenjang yang lebih tinggi."
                        </div>

                        <!-- Name and Title -->
                        <div class="fw-bold text-dark small">Drs. Ahmad Rudianto, M.Pd</div>
                        <div class="text-secondary" style="font-size: 0.72rem;">Kepala SMK Gema Cyber School</div>
                    </div>

                    <!-- Widget 2: Dokumen Profil (Downloads) -->
                    <div class="profile-card mb-3" id="dokumen">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <i class="bi bi-folder-fill text-primary"></i>
                            <h6 class="fw-bold text-dark m-0">Dokumen Profil</h6>
                        </div>

                        <!-- Item 1: Profil Sekolah (PDF) -->
                        <a href="#" class="doc-download-item">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-file-earmark-pdf-fill text-danger fs-5"></i>
                                <div>
                                    <div class="fw-bold small text-dark">Profil Sekolah (PDF)</div>
                                    <div class="text-secondary" style="font-size: 0.7rem;">2.5 MB</div>
                                </div>
                            </div>
                            <div class="doc-download-btn"><i class="bi bi-download"></i></div>
                        </a>

                        <!-- Item 2: Visi Misi dan Tujuan (PDF) -->
                        <a href="#" class="doc-download-item">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-file-earmark-pdf-fill text-warning fs-5"></i>
                                <div>
                                    <div class="fw-bold small text-dark">Visi Misi dan Tujuan (PDF)</div>
                                    <div class="text-secondary" style="font-size: 0.7rem;">1.2 MB</div>
                                </div>
                            </div>
                            <div class="doc-download-btn"><i class="bi bi-download"></i></div>
                        </a>

                        <!-- Item 3: Struktur Organisasi (PDF) -->
                        <a href="#" class="doc-download-item">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-file-earmark-pdf-fill text-success fs-5"></i>
                                <div>
                                    <div class="fw-bold small text-dark">Struktur Organisasi (PDF)</div>
                                    <div class="text-secondary" style="font-size: 0.7rem;">1.1 MB</div>
                                </div>
                            </div>
                            <div class="doc-download-btn"><i class="bi bi-download"></i></div>
                        </a>

                        <!-- Item 4: Kurikulum (PDF) -->
                        <a href="#" class="doc-download-item mb-0">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-file-earmark-pdf-fill text-primary fs-5"></i>
                                <div>
                                    <div class="fw-bold small text-dark">Kurikulum (PDF)</div>
                                    <div class="text-secondary" style="font-size: 0.7rem;">3.4 MB</div>
                                </div>
                            </div>
                            <div class="doc-download-btn"><i class="bi bi-download"></i></div>
                        </a>
                    </div>

                    <!-- Widget 3: Lokasi Sekolah (Map) -->
                    <div class="profile-card mb-0">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="bi bi-geo-alt-fill text-primary"></i>
                            <h6 class="fw-bold text-dark m-0">Lokasi Sekolah</h6>
                        </div>

                        <!-- Map Preview Thumbnail -->
                        <div class="rounded-3 overflow-hidden border mb-2">
                            <img src="{{ asset('images/profile-map-thumb-2x.png') }}" alt="Peta Lokasi SMK Gema Cyber School" class="img-fluid w-100">
                        </div>

                        <!-- Google Maps Button -->
                        <a href="https://maps.google.com" target="_blank" class="btn btn-primary w-100 rounded-pill py-2 small fw-semibold d-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-map-fill"></i>
                            <span>Lihat di Google Maps</span>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </main>

    <!-- ==========================================
         FOOTER
         ========================================== -->
    <footer class="school-footer" id="kontak">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <img src="{{ asset('images/school-logo-2x.png') }}" alt="SMK Gema Cyber School" style="height: 38px; filter: brightness(0) invert(1);" class="mb-2">
                    </div>
                    <p class="text-secondary small pe-lg-4">
                        Sekolah Menengah Kejuruan modern dengan pendidikan vokasi berkualitas, berkarakter, dan berorientasi masa depan digital.
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-heading">Navigasi</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/profil') }}">Profil Sekolah</a></li>
                        <li><a href="{{ url('/') }}#jurusan">Program Keahlian</a></li>
                        <li><a href="{{ url('/') }}#ppdb">Pendaftaran PPDB</a></li>
                        <li><a href="#kontak">Hubungi Kami</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">Program Keahlian</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ url('/') }}#jurusan-tjkt">Teknik Jaringan Komputer (TJKT)</a></li>
                        <li><a href="{{ url('/') }}#jurusan-akl">Akuntansi & Keuangan (AKL)</a></li>
                        <li><a href="{{ url('/') }}#jurusan-mplb">Manajemen Perkantoran (MPLB)</a></li>
                        <li><a href="{{ url('/') }}#jurusan-logistik">Logistik</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">Kontak Sekolah</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2 text-secondary">
                        <li class="d-flex gap-2">
                            <i class="bi bi-geo-alt-fill text-primary"></i>
                            <span>Jl. Cyber Teknologi No. 88, Kota Pendidikan</span>
                        </li>
                        <li class="d-flex gap-2">
                            <i class="bi bi-telephone-fill text-primary"></i>
                            <span>(021) 8899-7766</span>
                        </li>
                        <li class="d-flex gap-2">
                            <i class="bi bi-envelope-fill text-primary"></i>
                            <span>info@smkgemacyber.sch.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom d-flex flex-wrap justify-content-between align-items-center">
                <div>
                    &copy; {{ date('Y') }} <strong>SMK Gema Cyber School</strong>. All rights reserved.
                </div>
                <div class="d-flex gap-3 mt-2 mt-md-0">
                    <a href="#">Kebijakan Privasi</a>
                    <span>•</span>
                    <a href="#">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg p-3">
                <div class="modal-header border-0 pb-1">
                    <h6 class="modal-title fw-bold">Pencarian Website</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-2">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" class="form-control border-start-0 ps-0" placeholder="Ketik pencarian...">
                        <button class="btn btn-primary px-3 rounded-end" type="button">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sticky Navbar Script -->
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.school-navbar');
            if (navbar) {
                if (window.scrollY > 15) {
                    navbar.classList.add('navbar-scrolled');
                } else {
                    navbar.classList.remove('navbar-scrolled');
                }
            }
        });
    </script>
</body>
</html>
