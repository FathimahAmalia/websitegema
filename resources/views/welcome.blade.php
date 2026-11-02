<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SMK Gema Cyber School - Membangun generasi unggul dan siap kerja di era digital dengan pendidikan vokasi berkualitas, berkarakter, dan berorientasi masa depan.">
    
    <title>SMK Gema Cyber School - Berkarakter, Berkompetensi, Berdaya Saing</title>

    <!-- Google Fonts: Plus Jakarta Sans & Caveat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Custom School Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/school-style.css') }}">
</head>
<body class="home-page">

    <!-- ==========================================
         INSTITUTIONAL TOP BAR & NAVBAR HEADER
         ========================================== -->
    <header class="school-header fixed-top">
        <!-- Top Institutional Information Bar -->
        <div class="school-topbar d-none d-lg-block">
            <div class="container d-flex justify-content-between align-items-center">
                <!-- Left: School Identity & Accreditation -->
                <div class="d-flex align-items-center gap-3">
                    <span class="topbar-item">
                        <i class="bi bi-geo-alt-fill text-white-50 me-1"></i>
                        <span>SMK Pusat Keunggulan</span>
                    </span>
                    <span class="topbar-item">
                        <i class="bi bi-star-fill text-warning me-1"></i>
                        <span>Terakreditasi A (Unggul) BAN-S/M</span>
                    </span>
                </div>

                <!-- Right: Quick Contact & Office Hours -->
                <div class="d-flex align-items-center gap-3">
                    <a href="tel:02188997766" class="topbar-link">
                        <i class="bi bi-telephone-fill me-1 text-white-50"></i> (021) 8899-7766
                    </a>
                    <a href="mailto:info@smk.gemacyber.sch.id" class="topbar-link">
                        <i class="bi bi-envelope-fill me-1 text-white-50"></i> info@smk.gemacyber.sch.id
                    </a>
                    <span class="topbar-item">
                        <i class="bi bi-clock-fill me-1 text-white-50"></i> 07.30 - 15.30 WIB
                    </span>
                    <a href="#ppdb" class="btn-topbar-green ms-1">
                        <i class="bi bi-mortarboard-fill me-1"></i>
                        <span>PPDB Online</span>
                        <i class="bi bi-chevron-right ms-1" style="font-size: 0.7rem;"></i>
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-light py-1 px-2 ms-2 small d-inline-flex align-items-center gap-1" title="Akses Administrator" style="font-size: 0.75rem; border-color: rgba(255,255,255,0.25);">
                        <i class="bi bi-shield-lock-fill text-warning"></i>
                        <span>Admin</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Sticky Navigation Bar -->
        <nav class="navbar navbar-expand-lg school-navbar">
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
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil <i class="bi bi-chevron-down nav-chevron"></i>
                            </a>
                            <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                                <li><a class="dropdown-item py-2" href="{{ route('profil.tentang') }}"><i class="bi bi-building me-2 text-primary"></i>Profil Sekolah</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('profil.visi-misi') }}"><i class="bi bi-bullseye me-2 text-danger"></i>Visi & Misi</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('profil.struktur') }}"><i class="bi bi-diagram-3 me-2 text-success"></i>Struktur Organisasi</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('profil.fasilitas') }}"><i class="bi bi-door-open me-2 text-info"></i>Fasilitas Sekolah</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Jurusan <i class="bi bi-chevron-down nav-chevron"></i>
                            </a>
                            <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                                <li><a class="dropdown-item py-2" href="{{ route('jurusan.show', 'tjkt') }}">Teknik Jaringan Komputer & Telekomunikasi (TJKT)</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('jurusan.show', 'akl') }}">Akuntansi & Keuangan Lembaga (AKL)</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('jurusan.show', 'mplb') }}">Manajemen Perkantoran & Layanan Bisnis (MPLB)</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('jurusan.show', 'logistik') }}">Logistik</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Kegiatan <i class="bi bi-chevron-down nav-chevron"></i>
                            </a>
                            <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                                <li><a class="dropdown-item py-2" href="{{ route('ekstrakurikuler.index') }}"><i class="bi bi-stars me-2 text-warning"></i>Ekstrakurikuler</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('prestasi.index') }}"><i class="bi bi-trophy me-2 text-primary"></i>Prestasi Siswa</a></li>
                                <li><a class="dropdown-item py-2" href="#galeri"><i class="bi bi-images me-2 text-success"></i>Galeri Kegiatan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('berita.index') }}">Berita</a>
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
                        <a href="#ppdb" class="btn-ppdb-nav">
                            <i class="bi bi-mortarboard-fill"></i>
                            <span>PPDB Online</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- ==========================================
         HERO SECTION (WIDE PANORAMIC - MOCKUP STYLE)
         ========================================== -->
    <header class="hero-section">
        <!-- Wide Panoramic Image stretching seamlessly to the right screen edge -->
        <div class="hero-panorama-bg d-none d-lg-flex position-absolute">
            <img src="{{ asset('images/hero-panorama-wide.png') }}" alt="Siswa SMK Gema Cyber School" class="hero-panorama-img">

            <!-- Cursive handwriting quote in bottom right -->
            <div class="hero-cursive-quote d-none d-xl-block">
                <span class="cursive-l1">Bersama</span>
                <span class="cursive-l2">Menuju Masa Depan</span>
                <span class="cursive-l3">yang Lebih Baik</span>
            </div>
        </div>

        <div class="container position-relative z-2">
            <div class="row align-items-center">
                <!-- Left Content Column -->
                <div class="col-lg-6 col-xl-6 hero-text-col py-4 py-lg-5">
                    <!-- Top Chip Badge -->
                    <div class="mb-3">
                        <span class="hero-chip-badge">SMK Gema Cyber School</span>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="hero-title">
                        Selamat Datang di<br>
                        <span class="text-hero-blue">SMK Gema Cyber School</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="hero-description">
                        Membentuk generasi vokasi yang unggul, adaptif terhadap perkembangan teknologi digital, dan berkarakter mulia untuk siap bersaing di dunia industri modern.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                        <a href="#jurusan" class="btn btn-hero-explore">
                            <i class="bi bi-mortarboard-fill me-2"></i>
                            <span>Jelajahi Jurusan</span>
                            <i class="bi bi-chevron-right ms-2" style="font-size: 0.8rem;"></i>
                        </a>
                        <button type="button" class="btn btn-hero-profile" data-bs-toggle="modal" data-bs-target="#videoProfileModal">
                            <i class="bi bi-play-circle me-2"></i>
                            <span>Profil Sekolah</span>
                        </button>
                    </div>

                    <!-- 4 Micro Feature Quick Cards -->
                    <div class="hero-feature-row">
                        <div class="hero-feature-mini-card">
                            <div class="mini-icon-box">
                                <i class="bi bi-journal-bookmark-fill"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="mini-title">Kurikulum Merdeka</div>
                                <div class="mini-desc">Fleksibel & Relevan</div>
                            </div>
                        </div>
                        <div class="hero-feature-mini-card">
                            <div class="mini-icon-box">
                                <i class="bi bi-buildings-fill"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="mini-title">Teaching Factory</div>
                                <div class="mini-desc">Belajar dari Dunia Industri</div>
                            </div>
                        </div>
                        <div class="hero-feature-mini-card">
                            <div class="mini-icon-box">
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="mini-title">Ekstrakurikuler Lengkap</div>
                                <div class="mini-desc">Bakat & Minat Tersalurkan</div>
                            </div>
                        </div>
                        <div class="hero-feature-mini-card">
                            <div class="mini-icon-box">
                                <i class="bi bi-display-fill"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="mini-title">Fasilitas Modern</div>
                                <div class="mini-desc">Mendukung Pembelajaran</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- On Mobile/Tablet: Panoramic Image sits below text without boxed border -->
                <div class="col-12 d-lg-none mt-2 px-0">
                    <img src="{{ asset('images/hero-panorama-wide.png') }}" alt="Siswa SMK Gema Cyber School" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </header>

    <!-- ==========================================
         FLOATING STATS / HIGHLIGHTS BAR (4 METRICS MOCKUP)
         ========================================== -->
    <section class="stats-bar-wrapper">
        <div class="container">
            <div class="stats-card-main">
                <div class="row g-3 align-items-center">
                    
                    <!-- Stat 1: 500+ Siswa Aktif -->
                    <div class="col-lg-3 col-6 stat-col-divider">
                        <div class="stats-item d-flex align-items-center gap-3">
                            <div class="stat-icon-box-mockup">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div>
                                <div class="stat-number stat-number-mockup" data-count="500" data-suffix="+">500+</div>
                                <div class="stat-label-mockup">Siswa Aktif</div>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 2: 4 Program Keahlian -->
                    <div class="col-lg-3 col-6 stat-col-divider">
                        <div class="stats-item d-flex align-items-center gap-3">
                            <div class="stat-icon-box-mockup">
                                <i class="bi bi-book-half"></i>
                            </div>
                            <div>
                                <div class="stat-number stat-number-mockup" data-count="4">4</div>
                                <div class="stat-label-mockup">Program Keahlian</div>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 3: 30+ Guru Profesional -->
                    <div class="col-lg-3 col-6 stat-col-divider">
                        <div class="stats-item d-flex align-items-center gap-3">
                            <div class="stat-icon-box-mockup">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <div>
                                <div class="stat-number stat-number-mockup" data-count="30" data-suffix="+">30+</div>
                                <div class="stat-label-mockup">Guru Tersertifikasi</div>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 4: 88.4% Serapan Kerja BKK -->
                    <div class="col-lg-3 col-6">
                        <div class="stats-item d-flex align-items-center gap-3">
                            <div class="stat-icon-box-mockup">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div>
                                <div class="stat-number stat-number-mockup">88.4%</div>
                                <div class="stat-label-mockup">Serapan Kerja BKK</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 2: SAMBUTAN KEPALA SEKOLAH
         ========================================== -->
    <section class="home-section-padding">
        <div class="container">
            <div class="principal-welcome-wrapper position-relative overflow-hidden">
                <!-- Watermark Quotation in Top Right -->
                <div class="principal-giant-quote">”</div>

                <!-- Watermark Building on Bottom Right -->
                <img src="{{ asset('images/profile-about-building-2x.png') }}" alt="" class="principal-building-watermark" aria-hidden="true">

                <!-- Dot Matrix Grid on Bottom Left -->
                <div class="principal-dot-matrix" aria-hidden="true"></div>

                <div class="row align-items-center g-4 position-relative z-1">
                    <!-- Left: Foto & Identitas Kepala Sekolah -->
                    <div class="col-lg-4 text-center principal-reveal-left">
                        <div class="principal-avatar-frame mb-0">
                            <!-- White Photo Frame -->
                            <div class="principal-photo-frame">
                                <img src="{{ asset('images/profile-kepsek-2x.png') }}" alt="Drs. Ahmad Rudianto, M.Pd">
                            </div>

                            <!-- Emblem Badge with Divider Lines -->
                            <div class="principal-divider-badge">
                                <span class="divider-line"></span>
                                <div class="emblem-circle" title="Tut Wuri Handayani - Kemendikbudristek RI">
                                    <svg viewBox="0 0 100 100" style="width: 22px; height: 22px;" fill="#ffffff">
                                        <path d="M50 72 C42 66 32 66 24 70 L24 77 C32 73 42 73 50 78 C58 73 68 73 76 77 L76 70 C68 66 58 66 50 72 Z" fill="#ffffff"/>
                                        <path d="M50 24 C52 28 55 33 63 35 C58 38 56 44 57 52 C52 47 48 47 43 52 C44 44 42 38 37 35 C45 33 48 28 50 24 Z" fill="#ffffff"/>
                                        <path d="M33 50 C38 46 45 46 50 51 C55 46 62 46 67 50 C63 56 57 57 50 53 C43 57 37 56 33 50 Z" fill="#ffffff"/>
                                        <path d="M28 62 C35 58 43 60 50 66 C57 60 65 58 72 62 C67 69 58 69 50 65 C42 69 33 69 28 62 Z" fill="#ffffff"/>
                                        <ellipse cx="50" cy="20" rx="3" ry="5" fill="#facc15"/>
                                    </svg>
                                </div>
                                <span class="divider-line"></span>
                            </div>

                            <!-- Name & NIP -->
                            <h4 class="fw-bold text-white mb-1" style="font-size: 1.25rem; letter-spacing: -0.3px;">Drs. Ahmad Rudianto, M.Pd</h4>
                            <div class="small mb-2" style="color: #93c5fd; font-size: 0.85rem; letter-spacing: 0.4px;">NIP 19740512 199903 1 004</div>

                            <!-- Role Pill Badge with Decorative Lines -->
                            <div class="principal-role-pill-wrap">
                                <span class="role-line"></span>
                                <span class="principal-role-pill">Kepala Sekolah</span>
                                <span class="role-line"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Teks Sambutan & Komitmen Mutu -->
                    <div class="col-lg-8 principal-reveal-right ps-lg-4">
                        <!-- Top Badge & Line -->
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="principal-section-badge">SAMBUTAN KEPALA SEKOLAH</span>
                            <span class="principal-badge-accent-line"></span>
                        </div>

                        <!-- Main Speech Heading -->
                        <h2 class="principal-speech-title">
                            Membangun Generasi Vokasi yang Unggul, Berkarakter, dan <span class="text-cyan-accent">Siap Bersaing di Era Digital</span>
                        </h2>

                        <!-- Glassmorphic Quote Box -->
                        <div class="principal-speech-box shadow-sm mb-0">
                            <div class="d-flex align-items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#38bdf8" viewBox="0 0 16 16" style="flex-shrink: 0; margin-top: 3px;">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
                                </svg>
                                <div>
                                    <p>
                                        Selamat datang di website resmi SMK Gema Cyber School. Website ini merupakan media informasi dan komunikasi yang diharapkan dapat menjadi jembatan antara sekolah, peserta didik, orang tua, serta masyarakat."
                                    </p>
                                    <p>
                                        Kami berkomitmen untuk menciptakan lingkungan pendidikan yang inspiratif, inovatif, dan berorientasi pada pengembangan potensi peserta didik.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         PROGRAM KEAHLIAN / PILIHAN JURUSAN UNGGULAN
         ========================================== -->
    <section class="jurusan-section" id="jurusan">
        <!-- Top-Left Vector Diagonal Stripes -->
        <div class="jurusan-bg-decor-left" aria-hidden="true">
            <svg viewBox="0 0 320 240" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
                <path d="M-40 0 L60 -100 L120 -100 L20 0 Z" fill="#e0f2fe" opacity="0.7"/>
                <path d="M-20 80 L130 -70 L190 -70 L40 80 Z" fill="#bae6fd" opacity="0.5"/>
                <path d="M10 160 L180 -10 L240 -10 L70 160 Z" fill="#e0f2fe" opacity="0.45"/>
                <path d="M-60 220 L120 40 L170 40 L-10 220 Z" fill="#bae6fd" opacity="0.4"/>
            </svg>
        </div>

        <!-- Bottom-Right Subtle Vector Accent -->
        <div class="jurusan-bg-decor-right-corner" aria-hidden="true">
            <svg viewBox="0 0 240 240" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute; bottom: 0; right: 0; width: 220px; height: 220px; pointer-events: none; z-index: 0;">
                <path d="M180 240 L260 160 L300 160 L220 240 Z" fill="#e0f2fe" opacity="0.7"/>
                <path d="M100 240 L240 100 L280 100 L140 240 Z" fill="#bae6fd" opacity="0.5"/>
            </svg>
        </div>

        <!-- School Building Watermark on Right -->
        <img src="{{ asset('images/profile-about-building-2x.png') }}" alt="" class="jurusan-building-bg" aria-hidden="true">

        <div class="container position-relative z-1">
            <!-- Section Header (Exact Mockup Design) -->
            <div class="text-center mb-5">
                <div class="d-inline-flex align-items-center gap-3 mb-2">
                    <span class="jurusan-header-line"></span>
                    <span class="jurusan-header-badge">
                        <i class="bi bi-mortarboard-fill"></i> Program Keahlian
                    </span>
                    <span class="jurusan-header-line"></span>
                </div>
                <h2 class="jurusan-main-title mb-2">
                    Program <span class="text-program-blue">Keahlian</span>
                </h2>
                <p class="jurusan-subtitle mb-3">
                    Jelajahi berbagai program keahlian unggulan kami untuk masa depan yang lebih baik.
                </p>
                <div class="jurusan-title-bar"></div>
            </div>

            <!-- 4 Jurusan Cards (Exact Mockup Layout) -->
            <div class="row g-4">
                
                <!-- Card 1: TJKT / TKJ -->
                <div class="col-lg-3 col-md-6" id="jurusan-tjkt">
                    <div class="jurusan-new-card card-theme-tjkt">
                        <div class="jurusan-img-wrap">
                            <img src="{{ asset('images/jurusan-tjkt-siswa.png') }}" alt="Teknik Jaringan Komputer & Telekomunikasi (TJKT)">
                        </div>
                        <div class="jurusan-floating-icon icon-tjkt">
                            <i class="bi bi-display"></i>
                        </div>
                        <div class="jurusan-card-content">
                            <h3 class="jurusan-card-heading">Teknik Jaringan Komputer & Telekomunikasi (TJKT)</h3>
                            <p class="jurusan-card-paragraph">
                                Program keahlian di bidang jaringan dan telekomunikasi untuk menjawab kebutuhan teknologi masa depan.
                            </p>
                            <a href="{{ route('jurusan.show', 'tjkt') }}" class="btn-jurusan-detail">
                                <span>Lihat Detail</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: AKL -->
                <div class="col-lg-3 col-md-6" id="jurusan-akl">
                    <div class="jurusan-new-card card-theme-akl">
                        <div class="jurusan-img-wrap">
                            <img src="{{ asset('images/card-akl-2x.png') }}" alt="Akuntansi & Keuangan Lembaga (AKL)">
                        </div>
                        <div class="jurusan-floating-icon icon-akl">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div class="jurusan-card-content">
                            <h3 class="jurusan-card-heading">Akuntansi & Keuangan Lembaga (AKL)</h3>
                            <p class="jurusan-card-paragraph">
                                Program keahlian akuntansi yang membekali siswa dengan kemampuan mengelola keuangan secara profesional.
                            </p>
                            <a href="{{ route('jurusan.show', 'akl') }}" class="btn-jurusan-detail">
                                <span>Lihat Detail</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 3: MPLB -->
                <div class="col-lg-3 col-md-6" id="jurusan-mplb">
                    <div class="jurusan-new-card card-theme-mplb">
                        <div class="jurusan-img-wrap">
                            <img src="{{ asset('images/card-mplb-2x.png') }}" alt="Manajemen Perkantoran & Layanan Bisnis (MPLB)">
                        </div>
                        <div class="jurusan-floating-icon icon-mplb">
                            <i class="bi bi-gear-fill"></i>
                        </div>
                        <div class="jurusan-card-content">
                            <h3 class="jurusan-card-heading">Manajemen Perkantoran & Layanan Bisnis (MPLB)</h3>
                            <p class="jurusan-card-paragraph">
                                Program keahlian yang menyiapkan siswa untuk berkarir di bidang administrasi dan layanan bisnis.
                            </p>
                            <a href="{{ route('jurusan.show', 'mplb') }}" class="btn-jurusan-detail">
                                <span>Lihat Detail</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Logistik -->
                <div class="col-lg-3 col-md-6" id="jurusan-logistik">
                    <div class="jurusan-new-card card-theme-logistik">
                        <div class="jurusan-img-wrap">
                            <img src="{{ asset('images/card-logistik-2x.png') }}" alt="Teknik Komputer & Logistik">
                        </div>
                        <div class="jurusan-floating-icon icon-logistik">
                            <i class="bi bi-box-seam-fill"></i>
                        </div>
                        <div class="jurusan-card-content">
                            <h3 class="jurusan-card-heading">Teknik Komputer & Logistik</h3>
                            <p class="jurusan-card-paragraph">
                                Program keahlian di bidang teknologi komputer dan logistik untuk mendukung dunia industri dan bisnis.
                            </p>
                            <a href="{{ route('jurusan.show', 'logistik') }}" class="btn-jurusan-detail">
                                <span>Lihat Detail</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 1: KEUNGGULAN SEKOLAH (WHY CHOOSE US)
         ========================================== -->
    <section class="keunggulan-section" id="keunggulan">
        <div class="container position-relative z-1">
            <!-- Section Header (Exact Mockup Design) -->
            <div class="text-center mb-5">
                <div class="d-inline-flex align-items-center gap-3 mb-2">
                    <span class="keunggulan-header-line"></span>
                    <span class="keunggulan-header-badge">
                        <i class="bi bi-mortarboard-fill"></i> Keunggulan Kami
                    </span>
                    <span class="keunggulan-header-line"></span>
                </div>
                <h2 class="keunggulan-main-title mb-2">
                    Mengapa Memilih <span class="text-blue-accent">SMK Gema Cyber School?</span>
                </h2>
                <p class="keunggulan-subtitle mb-3">
                    Kami berkomitmen untuk memberikan pendidikan berkualitas dengan fasilitas lengkap, kurikulum berbasis industri, dan lingkungan belajar yang mendukung potensi terbaik siswa.
                </p>
                <div class="keunggulan-title-bar"></div>
            </div>

            <!-- 4 Keunggulan Cards -->
            <div class="row g-4">
                <!-- Card 1: Link & Match Industri -->
                <div class="col-lg-3 col-md-6">
                    <div class="keunggulan-card card-border-blue">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="keunggulan-icon-box icon-box-blue">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="3" width="20" height="14" rx="2"></rect>
                                    <line x1="8" y1="21" x2="16" y2="21"></line>
                                    <line x1="12" y1="17" x2="12" y2="21"></line>
                                    <polyline points="10 7 7 10 10 13"></polyline>
                                    <polyline points="14 7 17 10 14 13"></polyline>
                                </svg>
                            </div>
                            <span class="keunggulan-step-num num-blue">01</span>
                        </div>
                        <h3 class="keunggulan-card-title">Link & Match Industri</h3>
                        <p class="keunggulan-card-desc">
                            Menghadirkan pembelajaran langsung dengan dunia industri melalui kerja sama strategis dengan berbagai perusahaan teknologi.
                        </p>
                        <ul class="keunggulan-points">
                            <li class="keunggulan-point-item">
                                <i class="bi bi-check-circle-fill point-icon-blue"></i>
                                <span>Magang industri & sertifikasi</span>
                            </li>
                            <li class="keunggulan-point-item">
                                <i class="bi bi-check-circle-fill point-icon-blue"></i>
                                <span>Peluang kerja lebih luas</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Card 2: Sertifikasi Berstandar -->
                <div class="col-lg-3 col-md-6">
                    <div class="keunggulan-card card-border-green">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="keunggulan-icon-box icon-box-green">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>
                            <span class="keunggulan-step-num num-green">02</span>
                        </div>
                        <h3 class="keunggulan-card-title">Sertifikasi Berstandar</h3>
                        <p class="keunggulan-card-desc">
                            Menyediakan program sertifikasi kompetensi yang diakui industri, untuk meningkatkan daya saing lulusan di dunia kerja.
                        </p>
                        <ul class="keunggulan-points">
                            <li class="keunggulan-point-item">
                                <i class="bi bi-check-circle-fill point-icon-green"></i>
                                <span>Sertifikasi nasional & internasional</span>
                            </li>
                            <li class="keunggulan-point-item">
                                <i class="bi bi-check-circle-fill point-icon-green"></i>
                                <span>Kompetensi terukur</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Card 3: Tenaga Kependidikan Profesional -->
                <div class="col-lg-3 col-md-6">
                    <div class="keunggulan-card card-border-orange">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="keunggulan-icon-box icon-box-orange">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <span class="keunggulan-step-num num-orange">03</span>
                        </div>
                        <h3 class="keunggulan-card-title">Tenaga Kependidikan Profesional</h3>
                        <p class="keunggulan-card-desc">
                            Didukung oleh tenaga pendidik berpengalaman dan profesional di bidangnya, siap membimbing dan menginspirasi siswa.
                        </p>
                        <ul class="keunggulan-points">
                            <li class="keunggulan-point-item">
                                <i class="bi bi-check-circle-fill point-icon-orange"></i>
                                <span>Guru ahli di bidangnya</span>
                            </li>
                            <li class="keunggulan-point-item">
                                <i class="bi bi-check-circle-fill point-icon-orange"></i>
                                <span>Pembelajaran berkualitas</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Card 4: Teaching Factory Modern -->
                <div class="col-lg-3 col-md-6">
                    <div class="keunggulan-card card-border-purple">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="keunggulan-icon-box icon-box-purple">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <span class="keunggulan-step-num num-purple">04</span>
                        </div>
                        <h3 class="keunggulan-card-title">Teaching Factory Modern</h3>
                        <p class="keunggulan-card-desc">
                            Fasilitas Teaching Factory dengan teknologi terkini untuk melatih keterampilan nyata sesuai kebutuhan industri.
                        </p>
                        <ul class="keunggulan-points">
                            <li class="keunggulan-point-item">
                                <i class="bi bi-check-circle-fill point-icon-purple"></i>
                                <span>Praktikum dengan industri</span>
                            </li>
                            <li class="keunggulan-point-item">
                                <i class="bi bi-check-circle-fill point-icon-purple"></i>
                                <span>Project-based learning</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 5: GALERI DOKUMENTASI SEKOLAH (SHOWCASE)
         ========================================== -->
    <section class="galeri-showcase-section" id="galeri">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <div class="d-inline-flex align-items-center gap-3 mb-2">
                    <span class="galeri-header-line"></span>
                    <span class="galeri-header-badge">
                        <i class="bi bi-camera-fill"></i> Dokumentasi Aktivitas
                    </span>
                    <span class="galeri-header-line"></span>
                </div>
                <h2 class="galeri-main-title mb-2">
                    Galeri <span class="text-blue-accent">Kegiatan Sekolah</span>
                </h2>
                <p class="galeri-subtitle mb-3">
                    Potret dinamika pembelajaran, karya inovasi siswa, pembinaan karakter, dan momen istimewa di SMK Gema Cyber School.
                </p>
                <div class="galeri-title-bar"></div>
            </div>

            <!-- 6 Featured Galeri Cards Grid -->
            <div class="row g-4">
                <!-- Card 1: Wisuda -->
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('galeri.index') }}" class="galeri-showcase-card">
                        <div class="galeri-img-wrap">
                            <img src="{{ asset('images/galeri/wisuda.jpg') }}" alt="Wisuda & Pelepasan Siswa" class="galeri-img">
                            <div class="galeri-gradient-overlay"></div>
                            <span class="galeri-cat-badge text-warning" style="color: #d97706 !important;">
                                <i class="bi bi-mortarboard-fill me-1"></i>Agenda Sekolah
                            </span>
                            <div class="galeri-icon-expand">
                                <i class="bi bi-arrows-angle-expand"></i>
                            </div>
                            <div class="galeri-caption-overlay">
                                <div class="galeri-meta-date">
                                    <i class="bi bi-calendar3"></i> 20 Juni 2026 • Grand Ballroom
                                </div>
                                <h3 class="galeri-card-title">Wisuda & Pelepasan Siswa Angkatan IX</h3>
                                <p class="galeri-card-desc">Pelepasan 320 lulusan berkarakter yang siap berkarya di industri & pendidikan tinggi.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 2: Praktik Lab -->
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('galeri.index') }}" class="galeri-showcase-card">
                        <div class="galeri-img-wrap">
                            <img src="{{ asset('images/galeri/praktik-lab.jpg') }}" alt="Praktikum Lab Komputer" class="galeri-img">
                            <div class="galeri-gradient-overlay"></div>
                            <span class="galeri-cat-badge text-primary" style="color: #0284c7 !important;">
                                <i class="bi bi-laptop-fill me-1"></i>Praktik Kejuruan
                            </span>
                            <div class="galeri-icon-expand">
                                <i class="bi bi-arrows-angle-expand"></i>
                            </div>
                            <div class="galeri-caption-overlay">
                                <div class="galeri-meta-date">
                                    <i class="bi bi-calendar3"></i> 14 Mei 2026 • Lab Jaringan Komputer
                                </div>
                                <h3 class="galeri-card-title">Praktikum Cyber Defense & Jaringan Komputer</h3>
                                <p class="galeri-card-desc">Simulasi uji penetrasi keamanan server dan arsitektur cloud di laboratorium modern.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 3: Gelar Karya / Expo -->
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('galeri.index') }}" class="galeri-showcase-card">
                        <div class="galeri-img-wrap">
                            <img src="{{ asset('images/galeri/expo.jpg') }}" alt="Gelar Karya Inovasi Teaching Factory" class="galeri-img">
                            <div class="galeri-gradient-overlay"></div>
                            <span class="galeri-cat-badge text-success" style="color: #10b981 !important;">
                                <i class="bi bi-stars me-1"></i>Pameran Karya
                            </span>
                            <div class="galeri-icon-expand">
                                <i class="bi bi-arrows-angle-expand"></i>
                            </div>
                            <div class="galeri-caption-overlay">
                                <div class="galeri-meta-date">
                                    <i class="bi bi-calendar3"></i> 28 April 2026 • Hall Teaching Factory
                                </div>
                                <h3 class="galeri-card-title">Gelar Karya Inovasi Teaching Factory</h3>
                                <p class="galeri-card-desc">Pameran produk teknologi, otomasi IoT, dan karya kreatif digital buatan siswa.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 4: Job Fair -->
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('galeri.index') }}" class="galeri-showcase-card">
                        <div class="galeri-img-wrap">
                            <img src="{{ asset('images/galeri/jobfair.jpg') }}" alt="Bursa Kerja Khusus & Rekrutmen Industri" class="galeri-img">
                            <div class="galeri-gradient-overlay"></div>
                            <span class="galeri-cat-badge" style="color: #7c3aed !important;">
                                <i class="bi bi-briefcase-fill me-1"></i>Kemitraan Industri
                            </span>
                            <div class="galeri-icon-expand">
                                <i class="bi bi-arrows-angle-expand"></i>
                            </div>
                            <div class="galeri-caption-overlay">
                                <div class="galeri-meta-date">
                                    <i class="bi bi-calendar3"></i> 10 Maret 2026 • Pusat Karir & BKK
                                </div>
                                <h3 class="galeri-card-title">Bursa Kerja Khusus (BKK) & Rekrutmen Industri</h3>
                                <p class="galeri-card-desc">Kerja sama rekrutmen langsung bersama puluhan mitra perusahaan teknologi nasional.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 5: Seminar -->
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('galeri.index') }}" class="galeri-showcase-card">
                        <div class="galeri-img-wrap">
                            <img src="{{ asset('images/galeri/seminar.jpg') }}" alt="Seminar Wawasan Teknologi" class="galeri-img">
                            <div class="galeri-gradient-overlay"></div>
                            <span class="galeri-cat-badge" style="color: #ea580c !important;">
                                <i class="bi bi-lightbulb-fill me-1"></i>Edukasi & Vokasi
                            </span>
                            <div class="galeri-icon-expand">
                                <i class="bi bi-arrows-angle-expand"></i>
                            </div>
                            <div class="galeri-caption-overlay">
                                <div class="galeri-meta-date">
                                    <i class="bi bi-calendar3"></i> 15 Februari 2026 • Auditorium Utama
                                </div>
                                <h3 class="galeri-card-title">Seminar Wawasan Teknologi AI & Industri 4.0</h3>
                                <p class="galeri-card-desc">Kuliah umum bersama praktisi industri teknologi terkemuka untuk siswa dan guru.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 6: Upacara -->
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('galeri.index') }}" class="galeri-showcase-card">
                        <div class="galeri-img-wrap">
                            <img src="{{ asset('images/galeri/upacara.jpg') }}" alt="Peringatan Hari Pendidikan" class="galeri-img">
                            <div class="galeri-gradient-overlay"></div>
                            <span class="galeri-cat-badge text-danger" style="color: #dc2626 !important;">
                                <i class="bi bi-flag-fill me-1"></i>Pembinaan Karakter
                            </span>
                            <div class="galeri-icon-expand">
                                <i class="bi bi-arrows-angle-expand"></i>
                            </div>
                            <div class="galeri-caption-overlay">
                                <div class="galeri-meta-date">
                                    <i class="bi bi-calendar3"></i> 02 Mei 2026 • Lapangan Upacara
                                </div>
                                <h3 class="galeri-card-title">Peringatan Hari Pendidikan & Apel Karakter</h3>
                                <p class="galeri-card-desc">Upacara khidmat penanaman nilai budi pekerti, kedisiplinan, dan cinta tanah air.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Bottom CTA Button -->
            <div class="text-center mt-5">
                <a href="{{ route('galeri.index') }}" class="btn-galeri-showcase-all">
                    <i class="bi bi-images me-2"></i>
                    <span>Lihat Seluruh Koleksi Dokumentasi & Foto Kegiatan</span>
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 6: BERITA & AGENDA SEKOLAH
         ========================================== -->
    <section class="home-section-padding" id="berita">
        <div class="container">
            <div class="row align-items-end mb-5 g-2">
                <div class="col-md-8">
                    <span class="section-badge-pill section-badge-primary">
                        <i class="bi bi-newspaper text-primary"></i> KABAR & INFORMASI
                    </span>
                    <h2 class="section-title-lg">Berita & Agenda Terkini</h2>
                    <p class="section-subtitle-text">
                        Ikuti perkembangan rilis resmi, agenda akademik, serta liputan kegiatan edukatif di SMK Gema Cyber School.
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('berita.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 small fw-bold">
                        <span>Lihat Semua Berita</span>
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- 3 Berita Cards Grid -->
            <div class="row g-4">
                <!-- Berita 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="news-card-home">
                        <div class="news-thumb-box">
                            <img src="{{ asset('images/prestasi/lks-cyber-security.jpg') }}" alt="Siswa SMK Gema Cyber Raih Juara LKS" class="news-thumb-img">
                        </div>
                        <div class="news-body-box">
                            <div class="news-date-badge">
                                <i class="bi bi-calendar-event text-primary"></i> 18 Oktober 2026 &bull; <span class="badge bg-primary-subtle text-primary">Prestasi</span>
                            </div>
                            <a href="{{ route('berita.show', 'siswa-smk-gema-cyber-raih-emas-lks-cyber-security') }}" class="news-title-link">
                                Siswa SMK Gema Cyber Raih Medali Emas LKS Tingkat Provinsi Bidang Cyber Security
                            </a>
                            <p class="news-excerpt">
                                Prestasi membanggakan kembali diukir oleh kontingen siswa kejuruan TJKT setelah melalui 3 babak penugasan network defense dan ethical hacking.
                            </p>
                            <a href="{{ route('berita.show', 'siswa-smk-gema-cyber-raih-emas-lks-cyber-security') }}" class="jurusan-card-link mt-auto">
                                <span>Baca Selengkapnya</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Berita 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="news-card-home">
                        <div class="news-thumb-box">
                            <img src="{{ asset('images/galeri/seminar.jpg') }}" alt="MoU Kelas Industri Bersama PT Telkom" class="news-thumb-img">
                        </div>
                        <div class="news-body-box">
                            <div class="news-date-badge">
                                <i class="bi bi-calendar-event text-primary"></i> 12 Oktober 2026 &bull; <span class="badge bg-success-subtle text-success">Kerjasama DUDI</span>
                            </div>
                            <a href="{{ route('berita.show', 'kunjungan-industri-mou-kelas-khusus-pt-telkom') }}" class="news-title-link">
                                Kunjungan Industri & Penandatanganan MoU Kelas Khusus Bersama PT Telkom Indonesia
                            </a>
                            <p class="news-excerpt">
                                Penyelarasan kurikulum berbasis industri teknologi telekomunikasi dan komitmen pembukaan kuota magang prioritas bagi siswa berprestasi.
                            </p>
                            <a href="{{ route('berita.show', 'kunjungan-industri-mou-kelas-khusus-pt-telkom') }}" class="jurusan-card-link mt-auto">
                                <span>Baca Selengkapnya</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Berita 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="news-card-home">
                        <div class="news-thumb-box">
                            <img src="{{ asset('images/galeri/praktik-lab.jpg') }}" alt="Pelaksanaan UKK BNSP Berjalan Sukses" class="news-thumb-img">
                        </div>
                        <div class="news-body-box">
                            <div class="news-date-badge">
                                <i class="bi bi-calendar-event text-primary"></i> 05 Oktober 2026 &bull; <span class="badge bg-warning-subtle text-warning">Sertifikasi</span>
                            </div>
                            <a href="{{ route('berita.show', 'pelaksanaan-uji-sertifikasi-kompetensi-bnsp-2026') }}" class="news-title-link">
                                Pelaksanaan Uji Sertifikasi Kompetensi (USK) BNSP Tahun Ajaran 2026 Berjalan Sukses
                            </a>
                            <p class="news-excerpt">
                                Seluruh peserta didik tingkat akhir menyelesaikan serangkaian uji teknis kompetensi profesi di hadapan tim asesor independen berlisensi BNSP.
                            </p>
                            <a href="{{ route('berita.show', 'pelaksanaan-uji-sertifikasi-kompetensi-bnsp-2026') }}" class="jurusan-card-link mt-auto">
                                <span>Baca Selengkapnya</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 8: MITRA INDUSTRI & PENYALURAN KERJA (MINIMALIST CORPORATE & UNIFIED STATS)
         ========================================== -->
    <section class="mitra-industri-section" id="mitra">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <div class="d-inline-flex align-items-center gap-3 mb-2">
                    <span class="mitra-header-line"></span>
                    <span class="mitra-header-badge">
                        <i class="bi bi-briefcase-fill"></i> Jejaring Kemitraan & DUDI
                    </span>
                    <span class="mitra-header-line"></span>
                </div>
                <h2 class="mitra-main-title mb-2">
                    Mitra Industri & <span class="text-blue-accent">Penyaluran Kerja</span>
                </h2>
                <p class="mitra-subtitle mb-3">
                    Bekerja sama erat dengan korporasi nasional terkemuka dan lembaga sertifikasi resmi untuk menjamin keselarasan kurikulum serta keterserapan kerja lulusan.
                </p>
                <div class="mitra-title-bar"></div>
            </div>

            <!-- 8 Minimalist Corporate Partner Tiles Grid -->
            <div class="row g-3 g-lg-4 justify-content-center mb-5">
                <!-- Telkom -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="partner-tile-card">
                        <div class="partner-tile-logo">
                            <svg width="46" height="46" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="18" cy="18" r="16" fill="#fef2f2" stroke="#dc2626" stroke-width="1.8"/>
                                <path d="M18 7C11.92 7 7 11.92 7 18C7 24.08 11.92 29 18 29" stroke="#dc2626" stroke-width="3" stroke-linecap="round"/>
                                <circle cx="18" cy="18" r="6" fill="#dc2626"/>
                                <path d="M21 11C23.5 12.5 25 15.1 25 18C25 20.9 23.5 23.5 21 25" stroke="#94a3b8" stroke-width="2.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h4 class="partner-tile-name">PT Telkom Indonesia</h4>
                        <span class="partner-tile-domain">Telekomunikasi & Digital</span>
                    </div>
                </div>

                <!-- Astra -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="partner-tile-card">
                        <div class="partner-tile-logo">
                            <svg width="46" height="46" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="36" height="36" rx="10" fill="#f0f7ff" stroke="#bfdbfe" stroke-width="1.2"/>
                                <path d="M18 6L21.5 14.5L30 18L21.5 21.5L18 30L14.5 21.5L6 18L14.5 14.5L18 6Z" fill="#003b7a"/>
                                <circle cx="18" cy="18" r="3.5" fill="#ffffff"/>
                            </svg>
                        </div>
                        <h4 class="partner-tile-name">PT Astra International</h4>
                        <span class="partner-tile-domain">Manufaktur & Otomotif</span>
                    </div>
                </div>

                <!-- Bank Mandiri -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="partner-tile-card">
                        <div class="partner-tile-logo">
                            <svg width="46" height="46" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="36" height="36" rx="10" fill="#eff6ff" stroke="#bfdbfe" stroke-width="1.2"/>
                                <path d="M6 14C12 14 16 11 22 11C27 11 29 13 30 14" stroke="#003087" stroke-width="3" stroke-linecap="round"/>
                                <path d="M6 20C12 20 16 17 22 17C27 17 29 19 30 20" stroke="#f59e0b" stroke-width="3.2" stroke-linecap="round"/>
                                <path d="M6 26C12 26 16 23 22 23C27 23 29 25 30 26" stroke="#fbbf24" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h4 class="partner-tile-name">Bank Mandiri</h4>
                        <span class="partner-tile-domain">Perbankan & Keuangan</span>
                    </div>
                </div>

                <!-- Pos Indonesia -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="partner-tile-card">
                        <div class="partner-tile-logo">
                            <svg width="46" height="46" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="36" height="36" rx="10" fill="#fff7ed" stroke="#fed7aa" stroke-width="1.2"/>
                                <path d="M18 5L29 10V18C29 24.5 24 29.5 18 31C12 29.5 7 24.5 7 18V10L18 5Z" fill="#ea580c"/>
                                <path d="M11 16C15 13 21 13 25 18C21 17 17 19 14 23C13 20 12 18 11 16Z" fill="#ffffff"/>
                            </svg>
                        </div>
                        <h4 class="partner-tile-name">PT Pos Indonesia</h4>
                        <span class="partner-tile-domain">BUMN Logistik & Pos</span>
                    </div>
                </div>

                <!-- JNE -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="partner-tile-card">
                        <div class="partner-tile-logo">
                            <svg width="46" height="46" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="36" height="36" rx="10" fill="#fef2f2" stroke="#fecaca" stroke-width="1.2"/>
                                <path d="M6 24L18 9H24L12 24H6Z" fill="#dc2626"/>
                                <path d="M16 24L26 12H30L20 24H16Z" fill="#2563eb"/>
                                <circle cx="27" cy="9" r="2.5" fill="#dc2626"/>
                            </svg>
                        </div>
                        <h4 class="partner-tile-name">JNE Express Logistics</h4>
                        <span class="partner-tile-domain">Ekspedisi & Supply Chain</span>
                    </div>
                </div>

                <!-- Cisco -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="partner-tile-card">
                        <div class="partner-tile-logo">
                            <svg width="46" height="46" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="36" height="36" rx="10" fill="#f0fdfa" stroke="#99f6e4" stroke-width="1.2"/>
                                <line x1="8" y1="18" x2="8" y2="24" stroke="#0284c7" stroke-width="2.5" stroke-linecap="round"/>
                                <line x1="12" y1="13" x2="12" y2="24" stroke="#0284c7" stroke-width="2.5" stroke-linecap="round"/>
                                <line x1="16" y1="9" x2="16" y2="24" stroke="#0284c7" stroke-width="2.5" stroke-linecap="round"/>
                                <line x1="20" y1="9" x2="20" y2="24" stroke="#0284c7" stroke-width="2.5" stroke-linecap="round"/>
                                <line x1="24" y1="13" x2="24" y2="24" stroke="#0284c7" stroke-width="2.5" stroke-linecap="round"/>
                                <line x1="28" y1="18" x2="28" y2="24" stroke="#0284c7" stroke-width="2.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h4 class="partner-tile-name">Cisco Academy</h4>
                        <span class="partner-tile-domain">Sertifikasi Global CCNA</span>
                    </div>
                </div>

                <!-- MikroTik -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="partner-tile-card">
                        <div class="partner-tile-logo">
                            <svg width="46" height="46" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="36" height="36" rx="10" fill="#fef2f2" stroke="#fecaca" stroke-width="1.2"/>
                                <path d="M8 10H14L18 16L22 10H28L21 20V26H15V20L8 10Z" fill="#b91c1c"/>
                                <circle cx="18" cy="8" r="2" fill="#b91c1c"/>
                            </svg>
                        </div>
                        <h4 class="partner-tile-name">MikroTik Academy</h4>
                        <span class="partner-tile-domain">Routing MTCNA Global</span>
                    </div>
                </div>

                <!-- Accurate -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="partner-tile-card">
                        <div class="partner-tile-logo">
                            <svg width="46" height="46" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="36" height="36" rx="10" fill="#f0fdf4" stroke="#bbf7d0" stroke-width="1.2"/>
                                <path d="M18 6L7 27H13L18 17L23 27H29L18 6Z" fill="#16a34a"/>
                                <path d="M12 21H24" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h4 class="partner-tile-name">Accurate Partner</h4>
                        <span class="partner-tile-domain">Sistem Akuntansi Industri</span>
                    </div>
                </div>
            </div>

            <!-- Unified Stat Bar -->
            <div class="mitra-unified-stats">
                <div class="row g-0 align-items-center">
                    <!-- Metric 1 -->
                    <div class="col-md-4 mitra-stat-col">
                        <div class="mitra-stat-inner">
                            <span class="mitra-stat-pill pill-blue">Kemitraan DUDI</span>
                            <div class="mitra-stat-digit digit-blue">50<span class="stat-plus">+</span></div>
                            <h4 class="mitra-stat-label">Perusahaan Rekanan Aktif</h4>
                            <p class="mitra-stat-sub">MoU resmi program magang industri & prioritas rekrutmen kerja lulusan</p>
                        </div>
                    </div>

                    <!-- Metric 2 -->
                    <div class="col-md-4 mitra-stat-col stat-col-border">
                        <div class="mitra-stat-inner">
                            <span class="mitra-stat-pill pill-green">Keterserapan BKK</span>
                            <div class="mitra-stat-digit digit-green">88.4<span class="stat-percent">%</span></div>
                            <h4 class="mitra-stat-label">Tingkat Penyerapan Kerja</h4>
                            <p class="mitra-stat-sub">Lulusan langsung terserap bekerja dalam waktu kurang dari 3 bulan</p>
                        </div>
                    </div>

                    <!-- Metric 3 -->
                    <div class="col-md-4 mitra-stat-col">
                        <div class="mitra-stat-inner">
                            <span class="mitra-stat-pill pill-amber">Standardisasi Nasional</span>
                            <div class="mitra-stat-digit digit-amber">100<span class="stat-percent">%</span></div>
                            <h4 class="mitra-stat-label">Sertifikasi Kompetensi BNSP</h4>
                            <p class="mitra-stat-sub">Lulusan teruji dan mengantongi sertifikat keahlian berstandar resmi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION: KISAH SUKSES & JEJAK KARIR ALUMNI
         ========================================== -->
    <section class="home-section-padding alumni-section" id="alumni">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge-pill section-badge-emerald">
                    <i class="bi bi-mortarboard-fill text-success"></i> JEJAK KARIR ALUMNI
                </span>
                <h2 class="section-title-lg">Kisah Sukses Alumni di Dunia Industri</h2>
                <p class="section-subtitle-text mx-auto">
                    Bukti nyata keterserapan kerja dan daya saing lulusan SMK Gema Cyber School di berbagai korporasi terkemuka dan BUMN nasional.
                </p>
            </div>

            <div class="row g-4 mb-4">
                <!-- Alumni 1: TJKT -->
                <div class="col-lg-4 col-md-6">
                    <div class="alumni-card">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-1 small fw-bold">TJKT '22</span>
                        </div>
                        <i class="bi bi-quote alumni-quote-icon"></i>
                        <p class="alumni-quote-text">
                            "Kurikulum Cisco Academy dan praktikum hands-on di SMK Gema Cyber School memberikan keunggulan kompetitif saat seleksi kerja. Sebelum wisuda, saya sudah diterima melalui rekrutmen BKK sekolah."
                        </p>
                        <div class="alumni-profile mt-auto">
                            <div class="alumni-avatar alumni-avatar-tjkt">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="alumni-name">Rizky Ramadhan, S.Kom</div>
                                <div class="alumni-role">Cyber Security & Cloud Engineer</div>
                                <div class="alumni-company"><i class="bi bi-building me-1"></i>PT Telkom Indonesia (Persero)</div>
                            </div>
                        </div>
                        <div class="alumni-tags-row">
                            <span class="alumni-tag-pill"><i class="bi bi-check2 text-primary"></i> CCNA Certified</span>
                            <span class="alumni-tag-pill"><i class="bi bi-check2 text-primary"></i> Rekrutmen BKK</span>
                        </div>
                    </div>
                </div>

                <!-- Alumni 2: AKL -->
                <div class="col-lg-4 col-md-6">
                    <div class="alumni-card">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-1 small fw-bold">AKL '23</span>
                        </div>
                        <i class="bi bi-quote alumni-quote-icon"></i>
                        <p class="alumni-quote-text">
                            "Sertifikasi Accurate V.5 dan simulasi Mini Banking di sekolah membuat adaptasi saya di dunia perbankan sangat cepat. Etika kerja dan kedisiplinan yang diajarkan terbukti sangat aplikatif."
                        </p>
                        <div class="alumni-profile mt-auto">
                            <div class="alumni-avatar alumni-avatar-akl">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="alumni-name">Annisa Permata Putri</div>
                                <div class="alumni-role">Junior Financial Analyst</div>
                                <div class="alumni-company"><i class="bi bi-building me-1"></i>PT Bank Mandiri (Persero) Tbk</div>
                            </div>
                        </div>
                        <div class="alumni-tags-row">
                            <span class="alumni-tag-pill"><i class="bi bi-check2 text-success"></i> Accurate Certified</span>
                            <span class="alumni-tag-pill"><i class="bi bi-check2 text-success"></i> Mini Bank Staff</span>
                        </div>
                    </div>
                </div>

                <!-- Alumni 3: Logistik -->
                <div class="col-lg-4 col-md-6">
                    <div class="alumni-card">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <span class="badge bg-purple-subtle text-purple border rounded-pill px-2 py-1 small fw-bold" style="background: #f3e8ff; color: #7c3aed; border-color: #ddd6fe !important;">Logistik '23</span>
                        </div>
                        <i class="bi bi-quote alumni-quote-icon"></i>
                        <p class="alumni-quote-text">
                            "Metode Teaching Factory dan magang industri terarah dari BKK SMK Gema Cyber School membentuk mentalitas siap kerja. Saya langsung dipercaya memegang alur WMS digital di Astra."
                        </p>
                        <div class="alumni-profile mt-auto">
                            <div class="alumni-avatar alumni-avatar-logistik">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="alumni-name">Fajar Bagus Wicaksono</div>
                                <div class="alumni-role">Warehouse Operations Specialist</div>
                                <div class="alumni-company"><i class="bi bi-building me-1"></i>PT Astra International Tbk</div>
                            </div>
                        </div>
                        <div class="alumni-tags-row">
                            <span class="alumni-tag-pill"><i class="bi bi-check2 text-purple" style="color: #7c3aed;"></i> WMS Expert</span>
                            <span class="alumni-tag-pill"><i class="bi bi-check2 text-purple" style="color: #7c3aed;"></i> Fast-Track BKK</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Consultation Banner -->
            <div class="text-center pt-2">
                <p class="text-secondary small mb-2">Ingin berkonsultasi mengenai peminatan jurusan dan peluang karir industri?</p>
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20SMK%20Gema%20Cyber,%20saya%20ingin%20konsultasi%20jurusan%20dan%20prospek%20karir" target="_blank" class="btn btn-outline-primary rounded-pill px-4 py-2 small fw-bold">
                    <i class="bi bi-whatsapp me-1 text-success"></i> Konsultasi Karir & Minat Jurusan via WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 9: FAQ (TANYA JAWAB UMUM)
         ========================================== -->
    <section class="home-section-padding bg-white" id="faq">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge-pill section-badge-amber">
                    <i class="bi bi-question-circle-fill text-warning"></i> TANYA JAWAB UMUM
                </span>
                <h2 class="section-title-lg">Pertanyaan yang Sering Diajukan (FAQ)</h2>
                <p class="section-subtitle-text mx-auto">
                    Temukan jawaban atas pertanyaan paling umum seputar pendaftaran, kurikulum, fasilitas, dan prospek karir lulusan.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="accordion faq-accordion-box" id="schoolFaqAccordion">
                        <!-- FAQ 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="faq-q-badge">01</span> Apakah ijazah dan sertifikat SMK Gema Cyber School diakui secara nasional?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Ya, tentu saja. SMK Gema Cyber School berstatus terakreditasi resmi dari BAN-SM Kemendikbudristek. Selain ijazah formal SMK nasional, setiap lulusan juga menerima Sertifikat Kompetensi Profesi berlisensi Badan Nasional Sertifikasi Profesi (BNSP) serta lisensi vendor internasional (seperti Cisco Academy dan MikroTik) yang diakui luas di dunia industri.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="faq-q-badge">02</span> Bagaimana peluang kerja lulusan dan bantuan penyaluran karir?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Sekolah memiliki Bursa Kerja Khusus (BKK) resmi yang secara berkala menyelenggarakan rekrutmen kampus dan penyaluran kerja langsung bersama lebih dari 50 perusahaan mitra. Rata-rata lebih dari 88% lulusan terserap kerja sebelum atau beberapa bulan setelah wisuda, sementara sebagian lainnya melanjutkan kuliah di perguruan tinggi negeri maupun swasta.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="faq-q-badge">03</span> Apakah tersedia beasiswa bagi siswa baru yang berprestasi?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Ya, kami menyediakan Beasiswa Jalur Prestasi Akademik & Non-Akademik (Juara OSN, O2SN, Lomba Keagamaan/Tahfidz, Seni, atau Olahraga), serta Beasiswa Afirmasi untuk siswa berprestasi yang membutuhkan dukungan finansial. Pendaftar di Gelombang 1 juga berhak atas potongan biaya pengembangan sekolah (DPP) hingga 50%.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span class="faq-q-badge">04</span> Apakah siswa wajib memiliki laptop pribadi untuk praktikum?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Tidak diwajibkan. Seluruh kegiatan praktikum inti berlangsung di laboratorium komputer spesifikasi tinggi milik sekolah (tersedia rasio 1 PC per 1 siswa). Namun, memiliki laptop pribadi di rumah tentu sangat disarankan guna mendukung pengerjaan tugas mandiri dan eksplorasi materi di luar sekolah.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <span class="faq-q-badge">05</span> Bagaimana cara mendaftar dan apa saja berkas persyaratannya?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Pendaftaran dapat dilakukan secara online melalui website ini atau langsung datang ke sekretariat PPDB di kampus sekolah. Berkas yang dibutuhkan mencakup: fotokopi rapor SMP/MTs semester 1-5, fotokopi Kartu Keluarga (KK), fotokopi Akta Kelahiran, dan pas foto 3x4 (3 lembar).
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 10: KONTAK, PETA & HUBUNGI KAMI
         ========================================== -->
    <section class="home-section-padding" id="kontak">
        <div class="container">
            <div class="row g-4">
                <!-- Kolom Kiri: Peta Google Maps & Jam Operasional -->
                <div class="col-lg-6">
                    <span class="section-badge-pill section-badge-primary">
                        <i class="bi bi-geo-alt-fill text-primary"></i> LOKASI KAMPUS
                    </span>
                    <h2 class="section-title-lg mb-3">Kunjungi Kampus Kami</h2>
                    <p class="section-subtitle-text mb-4">
                        Lokasi kampus yang strategis, mudah diakses transportasi umum, aman, dan kondusif untuk suasana belajar kejuruan.
                    </p>

                    <!-- Embedded Interactive Map or Map Container -->
                    <div class="rounded-4 overflow-hidden border shadow-sm mb-3" style="height: 250px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126922.11585805553!2d106.74544833203126!3d-6.229386700000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <div class="d-flex align-items-center gap-3 p-3 bg-light rounded-3 border">
                        <i class="bi bi-clock-history fs-3 text-primary"></i>
                        <div>
                            <div class="fw-bold text-dark small">Jam Operasional Pelayanan PPDB & Informasi:</div>
                            <div class="text-secondary small">Senin - Jumat: 07.30 - 15.30 WIB | Sabtu: 08.00 - 13.00 WIB</div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Formulir Cepat Hubungi Kami -->
                <div class="col-lg-6">
                    <div class="quick-contact-card">
                        <span class="section-badge-pill section-badge-success mb-2">
                            <i class="bi bi-envelope-fill text-success"></i> FORMULIR HUBUNGI KAMI
                        </span>
                        <h3 class="fw-bold text-dark mb-2" style="font-size: 1.35rem;">Ada Pertanyaan Seputar Sekolah?</h3>
                        <p class="text-secondary small mb-4">Kirimkan pesan Anda dan tim pelayanan kami akan segera merespons dalam 1x24 jam.</p>

                        <form onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah terkirim ke tim pelayanan SMK Gema Cyber School.'); this.reset();">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold text-secondary">Nama Lengkap</label>
                                    <input type="text" class="form-control rounded-3" placeholder="Nama Anda" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold text-secondary">Nomor WhatsApp / HP</label>
                                    <input type="tel" class="form-control rounded-3" placeholder="08xxxxxxxxxx" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-secondary">Jurusan yang Diminati / Subjek</label>
                                    <select class="form-select rounded-3">
                                        <option value="ppdb">Informasi Pendaftaran PPDB 2025/2026</option>
                                        <option value="tjkt">Teknik Jaringan Komputer & Telekomunikasi (TJKT)</option>
                                        <option value="akl">Akuntansi & Keuangan Lembaga (AKL)</option>
                                        <option value="mplb">Manajemen Perkantoran & Layanan Bisnis (MPLB)</option>
                                        <option value="logistik">Teknik Manajemen Logistik</option>
                                        <option value="kerjasama">Kerjasama Industri (DUDI / BKK)</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-secondary">Isi Pesan / Pertanyaan</label>
                                    <textarea class="form-control rounded-3" rows="3" placeholder="Tuliskan pertanyaan Anda secara detail..." required></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 w-100 fw-bold shadow-sm">
                                        <i class="bi bi-send-fill me-1"></i> Kirim Pesan Sekarang
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 4: INFORMASI & ALUR PPDB ONLINE
         ========================================== -->
    <section class="home-section-padding home-section-bg-light" id="ppdb">
        <div class="container">
            <!-- Header -->
            <div class="text-center mb-5">
                <span class="section-badge-pill section-badge-success">
                    <i class="bi bi-mortarboard-fill text-success"></i> PENERIMAAN PESERTA DIDIK BARU (PPDB)
                </span>
                <h2 class="section-title-lg">PPDB Online T.A 2025/2026 Telah Dibuka!</h2>
                <p class="section-subtitle-text mx-auto">
                    Raih masa depan gemilang bersama SMK Gema Cyber School. Ikuti proses pendaftaran online yang praktis, cepat, dan transparan.
                </p>
            </div>

            <!-- 4 Alur Langkah PPDB -->
            <div class="row g-4 mb-5">
                <!-- Step 1 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="ppdb-flow-card">
                        <span class="ppdb-step-badge-tag">LANGKAH 01</span>
                        <div class="ppdb-step-icon-wrap ppdb-icon-register">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="18" height="18" rx="3" fill="#3b82f6" fill-opacity="0.2" stroke="#2563eb" stroke-width="2"/>
                                <path d="M7 8H17M7 12H13M7 16H11" stroke="#2563eb" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="16" cy="15" r="3" fill="#2563eb"/>
                                <path d="M15 15L15.8 15.8L17.5 14" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h4 class="fw-bold text-dark mb-2" style="font-size: 1.05rem;">Registrasi Online</h4>
                        <p class="text-secondary small mb-0" style="line-height: 1.55;">
                            Buka portal PPDB resmi, buat akun calon siswa baru, dan isi formulir biodata lengkap beserta pemilihan jurusan yang diminati.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="ppdb-flow-card">
                        <span class="ppdb-step-badge-tag">LANGKAH 02</span>
                        <div class="ppdb-step-icon-wrap ppdb-icon-upload">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 15V18C18 19.1 17.1 20 16 20H8C6.9 20 6 19.1 6 18V15" stroke="#059669" stroke-width="2" stroke-linecap="round"/>
                                <path d="M12 4V14M12 4L8 8M12 4L16 8" stroke="#059669" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 14C3 13 2 11 3 9C4 7 6 6 8 6C9 4 12 3 14 5C16 4 19 5 19 8C21 8 22 10 22 12C22 14 20 16 18 16" fill="#10b981" fill-opacity="0.18"/>
                            </svg>
                        </div>
                        <h4 class="fw-bold text-dark mb-2" style="font-size: 1.05rem;">Unggah Berkas</h4>
                        <p class="text-secondary small mb-0" style="line-height: 1.55;">
                            Upload salinan rapor SMP/MTs, Kartu Keluarga (KK), Akta Kelahiran, dan pas foto terbaru secara digital melalui portal akun.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="ppdb-flow-card">
                        <span class="ppdb-step-badge-tag">LANGKAH 03</span>
                        <div class="ppdb-step-icon-wrap ppdb-icon-interview">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 8H19C20.1 8 21 8.9 21 10V18L17 15H15" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 14V6C15 4.9 14.1 4 13 4H5C3.9 4 3 4.9 3 6V16L7 14H13C14.1 14 15 14 15 14Z" fill="#f59e0b" fill-opacity="0.2" stroke="#d97706" stroke-width="2" stroke-linejoin="round"/>
                                <circle cx="7" cy="9" r="1" fill="#d97706"/>
                                <circle cx="9.5" cy="9" r="1" fill="#d97706"/>
                                <circle cx="12" cy="9" r="1" fill="#d97706"/>
                            </svg>
                        </div>
                        <h4 class="fw-bold text-dark mb-2" style="font-size: 1.05rem;">Tes Minat & Wawancara</h4>
                        <p class="text-secondary small mb-0" style="line-height: 1.55;">
                            Mengikuti pemetaan bakat minat kejuruan dan sesi wawancara motivasi belajar bersama tim konselor guru profesional.
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="ppdb-flow-card">
                        <span class="ppdb-step-badge-tag">LANGKAH 04</span>
                        <div class="ppdb-step-icon-wrap ppdb-icon-enroll">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 3L2 8L12 13L22 8L12 3Z" fill="#8b5cf6" fill-opacity="0.25" stroke="#7c3aed" stroke-width="2" stroke-linejoin="round"/>
                                <path d="M6 10.5V16C6 17.5 8.69 19 12 19C15.31 19 18 17.5 18 16V10.5" stroke="#7c3aed" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="19" cy="19" r="4" fill="#10b981" stroke="white" stroke-width="1.5"/>
                                <path d="M17.5 19L18.5 20L20.5 18" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h4 class="fw-bold text-dark mb-2" style="font-size: 1.05rem;">Daftar Ulang</h4>
                        <p class="text-secondary small mb-0" style="line-height: 1.55;">
                            Pengumuman hasil seleksi kelulusan, penyelesaian administrasi daftar ulang, dan penerimaan seragam serta jadwal MPLS.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Banner Call To Action PPDB -->
            <div class="ppdb-cta-banner">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-warning text-dark fw-bold px-3 py-1 rounded-pill small">GELOMBANG 1 DIBUKA</span>
                            <span class="text-white-50 small">Potongan Biaya Pengembangan Pendidikan 50%</span>
                        </div>
                        <h3 class="fw-bold text-white mb-2" style="font-size: 1.6rem;">Siap Menjadi Bagian Generasi Digital Berprestasi?</h3>
                        <p class="text-white-50 mb-0 small" style="max-width: 620px; line-height: 1.6;">
                            Kuota kelas untuk masing-masing jurusan terbatas demi menjaga kualitas pembelajaran praktikum laboratorium. Segera amankan kursi Anda sekarang juga.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="d-flex flex-column flex-sm-row flex-lg-column gap-2 justify-content-lg-end">
                            <a href="https://wa.me/6281234567890?text=Halo%20Panitia%20PPDB%20SMK%20Gema%20Cyber,%20saya%20ingin%20mendaftar%20PPDB" target="_blank" class="btn btn-warning text-dark fw-bold rounded-pill px-4 py-2 shadow-sm">
                                <i class="bi bi-mortarboard-fill me-1"></i> Daftar Sekarang via WA
                            </a>
                            <a href="#kontak" class="btn btn-outline-light rounded-pill px-4 py-2 fw-semibold">
                                <i class="bi bi-info-circle me-1"></i> Panduan Syarat PPDB
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         FOOTER
         ========================================== -->
    <footer class="school-footer" id="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 col-md-7">
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

                <div class="col-lg-5 offset-lg-1 col-md-5">
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

                        <!-- Institutional Legal & Accreditation Bar -->
            <div class="footer-legal-bar d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <span class="footer-legal-pill"><i class="bi bi-shield-check text-warning"></i> NPSN: 69987214</span>
                    <span class="footer-legal-pill"><i class="bi bi-patch-check-fill text-success"></i> Terakreditasi A BAN-SM</span>
                    <span class="footer-legal-pill"><i class="bi bi-award text-info"></i> SK Pendirian: No. 421.3/908-Disdik</span>
                </div>
                <div class="text-secondary small">
                    Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi RI
                </div>
            </div>

            <div class="footer-bottom d-flex flex-wrap justify-content-between align-items-center">
                <div>
                    &copy; {{ date('Y') }} <strong>SMK Gema Cyber School</strong>. All rights reserved.
                </div>
                <div class="d-flex gap-3 mt-2 mt-md-0">
                    <a href="#">Kebijakan Privasi</a>
                    <span>&bull;</span>
                    <a href="#">Syarat & Ketentuan</a>
                    <span>&bull;</span>
                    <a href="{{ route('admin.dashboard') }}" class="text-primary fw-semibold"><i class="bi bi-shield-lock-fill me-1"></i>Portal Admin</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Video Modal -->
    <div class="modal fade" id="videoProfileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 border-0 overflow-hidden shadow-lg">
                <div class="modal-header bg-dark text-white border-0 py-2">
                    <h6 class="modal-title fw-bold">Video Profil SMK Gema Cyber School</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 bg-black">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=0" title="Profil SMK Gema Cyber School" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg p-3">
                <div class="modal-header border-0 pb-1">
                    <h6 class="modal-title fw-bold">Pencarian Berita & Website</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('berita.index') }}" method="GET">
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" name="q" class="form-control border-start-0 ps-0" placeholder="Ketik kata kunci berita (misal: LKS, Telkom, BNSP)..." required>
                            <button class="btn btn-primary px-3 rounded-end" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sticky Navbar Script -->
    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.school-header');
            const navbar = document.querySelector('.school-navbar');
            if (window.scrollY > 20) {
                if (header) header.classList.add('header-scrolled');
                if (navbar) navbar.classList.add('navbar-scrolled');
            } else {
                if (header) header.classList.remove('header-scrolled');
                if (navbar) navbar.classList.remove('navbar-scrolled');
            }
        });

        const statNumbers = document.querySelectorAll('.stats-card-main .stat-number[data-count]');
        const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (statNumbers.length && !reducedMotion && 'IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries, currentObserver) {
                entries.forEach(function(entry) {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    const element = entry.target;
                    const target = Number(element.dataset.count);
                    const suffix = element.dataset.suffix || '';
                    const duration = 1400;
                    let startTime;

                    function updateCount(timestamp) {
                        if (!startTime) {
                            startTime = timestamp;
                        }

                        const progress = Math.min((timestamp - startTime) / duration, 1);
                        const easedProgress = 1 - Math.pow(1 - progress, 3);
                        element.textContent = Math.floor(target * easedProgress).toLocaleString('id-ID') + suffix;

                        if (progress < 1) {
                            window.requestAnimationFrame(updateCount);
                        } else {
                            element.textContent = target.toLocaleString('id-ID') + suffix;
                        }
                    }

                    window.requestAnimationFrame(updateCount);
                    currentObserver.unobserve(element);
                });
            }, { threshold: 0.4 });

            statNumbers.forEach(function(element) {
                element.textContent = '0' + (element.dataset.suffix || '');
                observer.observe(element);
            });
        }
    </script>
</body>
</html>
