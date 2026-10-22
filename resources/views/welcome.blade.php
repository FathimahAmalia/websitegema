<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SMK Gema Cyber School - Membangun generasi unggul dan siap kerja di era digital dengan pendidikan vokasi berkualitas, berkarakter, dan berorientasi masa depan.">
    
    <title>SMK Gema Cyber School - Berkarakter, Berkompetensi, Berdaya Saing</title>

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
         TOP NAVBAR (STICKY / FIXED ON SCROLL)
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
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Jurusan <i class="bi bi-chevron-down nav-chevron"></i>
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                            <li><a class="dropdown-item py-2" href="#jurusan-tjkt">Teknik Jaringan Komputer & Telekomunikasi (TJKT)</a></li>
                            <li><a class="dropdown-item py-2" href="#jurusan-akl">Akuntansi & Keuangan Lembaga (AKL)</a></li>
                            <li><a class="dropdown-item py-2" href="#jurusan-mplb">Manajemen Perkantoran & Layanan Bisnis (MPLB)</a></li>
                            <li><a class="dropdown-item py-2" href="#jurusan-logistik">Logistik</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ppdb">PPDB</a>
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
                    <a href="#ppdb" class="btn-ppdb-nav">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>PPDB Online</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ==========================================
         HERO SECTION (WIDE PANORAMIC - MEMANJANG KE KANAN)
         ========================================== -->
    <header class="hero-section">
        <!-- Wide Panoramic Image stretching seamlessly to the right screen edge -->
        <div class="hero-panorama-bg d-none d-lg-flex">
            <img src="{{ asset('images/hero-panorama-wide.png') }}" alt="Siswa SMK Gema Cyber School" class="hero-panorama-img">
        </div>

        <div class="container position-relative z-2">
            <div class="row align-items-center">
                <!-- Left Content Column -->
                <div class="col-lg-5 col-xl-5 hero-text-col py-4 py-lg-5">
                    <span class="hero-label-top">SELAMAT DATANG DI</span>
                    <h1 class="hero-title">
                        SMK Gema<br>
                        Cyber School
                    </h1>
                    <p class="hero-description">
                        Membangun generasi unggul dan siap kerja di era digital dengan pendidikan vokasi berkualitas, berkarakter, dan berorientasi masa depan.
                    </p>
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <a href="#ppdb" class="btn btn-hero-primary">
                            <i class="bi bi-mortarboard-fill"></i>
                            <span>Daftar PPDB Sekarang</span>
                            <i class="bi bi-chevron-right ms-1" style="font-size: 0.8rem;"></i>
                        </a>
                        <button type="button" class="btn btn-hero-secondary" data-bs-toggle="modal" data-bs-target="#videoProfileModal">
                            <i class="bi bi-play-circle" style="font-size: 1.15rem;"></i>
                            <span>Lihat Video Profil</span>
                        </button>
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
         FLOATING STATS / HIGHLIGHTS BAR
         ========================================== -->
    <section class="stats-bar-wrapper">
        <div class="container">
            <div class="stats-card-main">
                <div class="row g-2 align-items-center justify-content-between">
                    
                    <!-- Stat 1: 500+ Siswa Aktif -->
                    <div class="col-md-auto col-6">
                        <div class="stats-item">
                            <div class="stat-icon-box stat-icon-blue">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div>
                                <div class="stat-number">500+</div>
                                <div class="stat-label">Siswa Aktif</div>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 2: 4 Program Keahlian -->
                    <div class="col-md-auto col-6">
                        <div class="stats-item">
                            <div class="stat-icon-box stat-icon-green">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                            <div>
                                <div class="stat-number">4</div>
                                <div class="stat-label">Program Keahlian</div>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 3: 30+ Guru Profesional -->
                    <div class="col-md-auto col-6">
                        <div class="stats-item">
                            <div class="stat-icon-box stat-icon-amber">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div>
                                <div class="stat-number">30+</div>
                                <div class="stat-label">Guru Profesional</div>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 4: Fasilitas Lengkap & Modern -->
                    <div class="col-md-auto col-6">
                        <div class="stats-item">
                            <div class="stat-icon-box stat-icon-purple">
                                <i class="bi bi-buildings-fill"></i>
                            </div>
                            <div>
                                <div class="stat-number" style="font-size: 1.05rem;">Fasilitas</div>
                                <div class="stat-label">Lengkap & Modern</div>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 5: Siap Kerja & Berwirausaha -->
                    <div class="col-md-auto col-12">
                        <div class="stats-item">
                            <div class="stat-icon-box stat-icon-rose">
                                <i class="bi bi-briefcase-fill"></i>
                            </div>
                            <div>
                                <div class="stat-number" style="font-size: 1.05rem;">Siap Kerja</div>
                                <div class="stat-label">& Berwirausaha</div>
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
        <div class="container">
            <!-- Section Header -->
            <div class="row align-items-end mb-4 g-2">
                <div class="col-md-8">
                    <span class="section-label-cyan">PROGRAM KEAHLIAN</span>
                    <h2 class="section-heading">Pilihan Jurusan Unggulan</h2>
                    <p class="section-description">Program keahlian yang disesuaikan dengan kebutuhan dunia kerja dan perkembangan teknologi.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="#semua-jurusan" class="btn-all-jurusan">
                        <span>Lihat Semua Jurusan</span>
                        <i class="bi bi-chevron-right" style="font-size: 0.75rem;"></i>
                    </a>
                </div>
            </div>

            <!-- 4 Jurusan Cards -->
            <div class="row g-4">
                
                <!-- Card 1: TJKT / TKJ -->
                <div class="col-lg-3 col-md-6" id="jurusan-tjkt">
                    <div class="jurusan-card">
                        <div class="jurusan-card-thumb">
                            <img src="{{ asset('images/jurusan-tjkt-siswa.png') }}" alt="Teknik Jaringan Komputer dan Telekomunikasi (TKJ/TJKT)" class="jurusan-card-img">
                        </div>
                        <div class="jurusan-card-badge badge-tjkt">
                            <i class="bi bi-hdd-network-fill"></i>
                        </div>
                        <div class="jurusan-card-body">
                            <h3 class="jurusan-card-title">Teknik Jaringan Komputer & Telekomunikasi (TJKT / TKJ)</h3>
                            <p class="jurusan-card-desc">
                                Mempelajari perakitan komputer, jaringan komputer, telekomunikasi, keamanan sistem, serta teknologi cloud.
                            </p>
                            <a href="#" class="jurusan-card-link">
                                <span>Lihat Detail</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: AKL -->
                <div class="col-lg-3 col-md-6" id="jurusan-akl">
                    <div class="jurusan-card">
                        <div class="jurusan-card-thumb">
                            <img src="{{ asset('images/card-akl-2x.png') }}" alt="Akuntansi dan Keuangan Lembaga" class="jurusan-card-img">
                        </div>
                        <div class="jurusan-card-badge badge-akl">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div class="jurusan-card-body">
                            <h3 class="jurusan-card-title">Akuntansi dan Keuangan Lembaga (AKL)</h3>
                            <p class="jurusan-card-desc">
                                Mempelajari akuntansi, perpajakan, keuangan, dan penggunaan aplikasi akuntansi modern.
                            </p>
                            <a href="#" class="jurusan-card-link">
                                <span>Lihat Detail</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 3: MPLB -->
                <div class="col-lg-3 col-md-6" id="jurusan-mplb">
                    <div class="jurusan-card">
                        <div class="jurusan-card-thumb">
                            <img src="{{ asset('images/card-mplb-2x.png') }}" alt="Manajemen Perkantoran dan Layanan Bisnis" class="jurusan-card-img">
                        </div>
                        <div class="jurusan-card-badge badge-mplb">
                            <i class="bi bi-briefcase-fill"></i>
                        </div>
                        <div class="jurusan-card-body">
                            <h3 class="jurusan-card-title">Manajemen Perkantoran dan Layanan Bisnis (MPLB)</h3>
                            <p class="jurusan-card-desc">
                                Mempelajari administrasi perkantoran, pengelolaan dokumen, komunikasi bisnis, dan layanan pelanggan.
                            </p>
                            <a href="#" class="jurusan-card-link">
                                <span>Lihat Detail</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Logistik -->
                <div class="col-lg-3 col-md-6" id="jurusan-logistik">
                    <div class="jurusan-card">
                        <div class="jurusan-card-thumb">
                            <img src="{{ asset('images/card-logistik-2x.png') }}" alt="Logistik" class="jurusan-card-img">
                        </div>
                        <div class="jurusan-card-badge badge-logistik">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div class="jurusan-card-body">
                            <h3 class="jurusan-card-title">Logistik</h3>
                            <p class="jurusan-card-desc">
                                Mempelajari manajemen logistik, rantai pasok, pergudangan, dan distribusi barang.
                            </p>
                            <a href="#" class="jurusan-card-link">
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
    <section class="home-section-padding home-section-bg-light" id="keunggulan">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <span class="section-badge-pill section-badge-primary">
                    <i class="bi bi-star-fill text-primary"></i> KEUNGGULAN SEKOLAH
                </span>
                <h2 class="section-title-lg">Mengapa Memilih SMK Gema Cyber School?</h2>
                <p class="section-subtitle-text mx-auto">
                    Pendidikan vokasi masa depan yang mengintegrasikan kurikulum industri modern, sertifikasi keahlian berstandar nasional dan global, serta pembinaan akhlak berkarakter mulia.
                </p>
            </div>

            <!-- 4 Keunggulan Cards -->
            <div class="row g-4">
                <!-- Keunggulan 1: Kurikulum Industri -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-usp-card">
                        <div class="feature-usp-icon" style="background-color: #eff6ff; color: #2563eb;">
                            <i class="bi bi-diagram-3-fill"></i>
                        </div>
                        <h3 class="feature-usp-title">Link & Match Industri</h3>
                        <p class="feature-usp-desc">
                            Kurikulum pembelajaran diselaraskan langsung dengan kebutuhan industri 4.0 dan mitra teknologi, memastikan kompetensi siswa selalu relevan dengan dunia kerja.
                        </p>
                    </div>
                </div>

                <!-- Keunggulan 2: Sertifikasi BNSP & Global -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-usp-card">
                        <div class="feature-usp-icon" style="background-color: #ecfdf5; color: #059669;">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        <h3 class="feature-usp-title">Sertifikasi Resmi BNSP</h3>
                        <p class="feature-usp-desc">
                            Lulusan dibekali sertifikasi profesi resmi BNSP dan lisensi vendor internasional (Cisco Networking Academy, MikroTik MTCNA, dan Accurate).
                        </p>
                    </div>
                </div>

                <!-- Keunggulan 3: Penyaluran Kerja BKK -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-usp-card">
                        <div class="feature-usp-icon" style="background-color: #fffbeb; color: #d97706;">
                            <i class="bi bi-briefcase-fill"></i>
                        </div>
                        <h3 class="feature-usp-title">Serapan Kerja BKK 88%+</h3>
                        <p class="feature-usp-desc">
                            Bursa Kerja Khusus (BKK) aktif memfasilitasi program magang industri (PKL) dan rekrutmen kerja langsung ke puluhan jejaring perusahaan rekanan ternama.
                        </p>
                    </div>
                </div>

                <!-- Keunggulan 4: Teaching Factory -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-usp-card">
                        <div class="feature-usp-icon" style="background-color: #f5f3ff; color: #7c3aed;">
                            <i class="bi bi-cpu-fill"></i>
                        </div>
                        <h3 class="feature-usp-title">Teaching Factory Modern</h3>
                        <p class="feature-usp-desc">
                            Metode pembelajaran berbasis produksi nyata dengan laboratorium komputer canggih, simulasi alur kantor modern, dan praktik pergudangan terstandar.
                        </p>
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
            <div class="principal-welcome-wrapper">
                <div class="row align-items-center g-4">
                    <!-- Left: Foto & Identitas Kepala Sekolah -->
                    <div class="col-lg-4 text-center">
                        <div class="principal-avatar-frame">
                            <img src="{{ asset('images/profile-kepsek-2x.png') }}" alt="Drs. Ahmad Rudianto, M.Pd" class="principal-photo-card">
                            <div>
                                <span class="principal-badge-tag mb-1">
                                    <i class="bi bi-person-check-fill me-1"></i> Kepala Sekolah
                                </span>
                                <h4 class="fw-bold text-white mb-0 mt-2" style="font-size: 1.15rem;">Drs. Ahmad Rudianto, M.Pd</h4>
                                <div class="text-white-50 small">NIP. 19740512 199903 1 004</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Teks Sambutan & Komitmen Mutu -->
                    <div class="col-lg-8">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 small fw-bold mb-3">
                            <i class="bi bi-chat-quote-fill me-1"></i> SAMBUTAN KEPALA SEKOLAH
                        </span>
                        <h3 class="fw-bold text-white mb-3" style="font-size: 1.65rem; line-height: 1.35;">
                            Membangun Generasi Vokasi yang Unggul, Berkarakter, dan Siap Bersaing di Era Digital
                        </h3>
                        
                        <div class="principal-quote-text mb-0">
                            "Selamat datang di SMK Gema Cyber School. Di era transformasi digital dan otomasi industri, kami berkomitmen menghadirkan ekosistem pendidikan kejuruan yang relevan, dinamis, dan berakhlak mulia. Kami mendidik setiap siswa agar tidak hanya terampil secara teknis (hard skills), namun juga memiliki integritas, etos kerja tinggi, dan daya adaptasi global yang unggul."
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 3: FASILITAS UNGGULAN KAMPUS
         ========================================== -->
    <section class="home-section-padding home-section-bg-light" id="fasilitas">
        <div class="container">
            <div class="row align-items-end mb-5 g-2">
                <div class="col-md-8">
                    <span class="section-badge-pill section-badge-purple">
                        <i class="bi bi-buildings-fill text-purple"></i> SARANA & PRASARANA
                    </span>
                    <h2 class="section-title-lg">Fasilitas Modern Penunjang Praktik</h2>
                    <p class="section-subtitle-text">
                        Infrastruktur laboratorium mutakhir dan sarana pembelajaran terstandar untuk memaksimalkan potensi kompetensi keahlian siswa.
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="badge bg-white text-secondary border px-3 py-2 rounded-pill small fw-semibold">
                        <i class="bi bi-check2-all text-primary me-1"></i> Standar Akreditasi Nasional
                    </span>
                </div>
            </div>

            <!-- 6 Facility Cards Grid (Upgraded Elite Design) -->
            <div class="row g-4">
                <!-- Fasilitas 1: Lab Komputer -->
                <div class="col-lg-4 col-md-6">
                    <div class="facility-home-card card-accent-blue">
                        <div class="facility-home-img-wrap">
                            <img src="{{ asset('images/fasilitas-lab-komputer-2x.png') }}" alt="Lab Komputer High-Spec" class="facility-home-img">
                            <div class="facility-category-badge badge-cat-blue">
                                <i class="bi bi-laptop me-1"></i> TIK & INFORMATIKA
                            </div>
                            <div class="facility-home-badge">
                                <i class="bi bi-cpu text-info"></i> Intel Core i7 • RAM 16GB
                            </div>
                        </div>
                        <div class="facility-home-body">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="facility-icon-pill" style="background-color: #eff6ff; color: #2563eb;">
                                    <i class="bi bi-display"></i>
                                </div>
                                <h4 class="facility-home-title">Laboratorium Komputer & Coding</h4>
                            </div>
                            <p class="facility-home-desc">
                                Ruang praktikum komputer modern dengan jaringan gigabit berkecepatan tinggi, perangkat lunak desain visual, pemrograman web, dan aplikasi perkantoran mutakhir.
                            </p>
                            <div class="facility-spec-tags">
                                <span class="facility-spec-pill"><i class="bi bi-pc-display text-primary"></i> 36 Unit PC</span>
                                <span class="facility-spec-pill"><i class="bi bi-speedometer2 text-info"></i> Gigabit LAN</span>
                                <span class="facility-spec-pill"><i class="bi bi-snow text-primary"></i> Full AC</span>
                            </div>
                            <div class="facility-card-footer">
                                <a href="{{ route('profil.fasilitas') }}" class="facility-link">
                                    <span>Lihat Detail Fasilitas</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <span class="facility-status-pill text-success">
                                    <i class="bi bi-patch-check-fill"></i> Standar BNSP
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas 2: Lab Jaringan TJKT -->
                <div class="col-lg-4 col-md-6">
                    <div class="facility-home-card card-accent-cyan">
                        <div class="facility-home-img-wrap">
                            <img src="{{ asset('images/fasilitas-lab-jaringan-2x.png') }}" alt="Lab Jaringan Komputer" class="facility-home-img">
                            <div class="facility-category-badge badge-cat-cyan">
                                <i class="bi bi-hdd-network me-1"></i> TJKT / TKJ
                            </div>
                            <div class="facility-home-badge">
                                <i class="bi bi-router text-info"></i> Cisco & MikroTik Official
                            </div>
                        </div>
                        <div class="facility-home-body">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="facility-icon-pill" style="background-color: #f0f9ff; color: #0284c7;">
                                    <i class="bi bi-hdd-network"></i>
                                </div>
                                <h4 class="facility-home-title">Lab Jaringan & Fiber Optic (TJKT)</h4>
                            </div>
                            <p class="facility-home-desc">
                                Dilengkapi server rack industri, router MikroTik resmi, switch manageable Cisco, serta peralatan penyambungan fiber optic (fusion splicer & OTDR) terlengkap.
                            </p>
                            <div class="facility-spec-tags">
                                <span class="facility-spec-pill"><i class="bi bi-server text-info"></i> Server Rack</span>
                                <span class="facility-spec-pill"><i class="bi bi-router text-primary"></i> Router MikroTik</span>
                                <span class="facility-spec-pill"><i class="bi bi-lightning-charge text-warning"></i> Splicer FO</span>
                            </div>
                            <div class="facility-card-footer">
                                <a href="{{ route('profil.fasilitas') }}" class="facility-link">
                                    <span>Lihat Detail Fasilitas</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <span class="facility-status-pill text-success">
                                    <i class="bi bi-patch-check-fill"></i> Cisco Academy
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas 3: Mini Bank & Lab Akuntansi -->
                <div class="col-lg-4 col-md-6">
                    <div class="facility-home-card card-accent-emerald">
                        <div class="facility-home-img-wrap">
                            <img src="{{ asset('images/fasilitas-praktik-akuntansi-2x.png') }}" alt="Lab Akuntansi & Mini Bank" class="facility-home-img">
                            <div class="facility-category-badge badge-cat-emerald">
                                <i class="bi bi-cash-coin me-1"></i> AKUNTANSI & KEUANGAN
                            </div>
                            <div class="facility-home-badge">
                                <i class="bi bi-bank text-warning"></i> Mini Bank & Accurate Online
                            </div>
                        </div>
                        <div class="facility-home-body">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="facility-icon-pill" style="background-color: #ecfdf5; color: #059669;">
                                    <i class="bi bi-bank2"></i>
                                </div>
                                <h4 class="facility-home-title">Mini Bank & Praktik Akuntansi (AKL)</h4>
                            </div>
                            <p class="facility-home-desc">
                                Sarana simulasi operasional perbankan riil dengan loket teller, mesin kasir digital, software Accurate Online resmi, serta laboratorium hitung dagang.
                            </p>
                            <div class="facility-spec-tags">
                                <span class="facility-spec-pill"><i class="bi bi-check2-circle text-success"></i> Accurate Online</span>
                                <span class="facility-spec-pill"><i class="bi bi-cash-stack text-success"></i> Mini Teller</span>
                                <span class="facility-spec-pill"><i class="bi bi-calculator text-primary"></i> Kasir Digital</span>
                            </div>
                            <div class="facility-card-footer">
                                <a href="{{ route('profil.fasilitas') }}" class="facility-link">
                                    <span>Lihat Detail Fasilitas</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <span class="facility-status-pill text-success">
                                    <i class="bi bi-patch-check-fill"></i> LSP P1 Terlisensi
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas 4: Warehouse Logistik -->
                <div class="col-lg-4 col-md-6">
                    <div class="facility-home-card card-accent-amber">
                        <div class="facility-home-img-wrap">
                            <img src="{{ asset('images/fasilitas-ruang-logistik-2x.png') }}" alt="Ruang Praktik Logistik" class="facility-home-img">
                            <div class="facility-category-badge badge-cat-amber">
                                <i class="bi bi-truck me-1"></i> MANAJEMEN LOGISTIK
                            </div>
                            <div class="facility-home-badge">
                                <i class="bi bi-boxes text-warning"></i> Mockup WMS & Barcode Scanner
                            </div>
                        </div>
                        <div class="facility-home-body">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="facility-icon-pill" style="background-color: #fffbeb; color: #d97706;">
                                    <i class="bi bi-boxes"></i>
                                </div>
                                <h4 class="facility-home-title">Pusat Mockup Warehouse & Logistik</h4>
                            </div>
                            <p class="facility-home-desc">
                                Ruang simulasi tata letak pergudangan, barcode scanner terminal nirkabel, hand pallet hidrolik, dan pengoperasian Warehouse Management System (WMS).
                            </p>
                            <div class="facility-spec-tags">
                                <span class="facility-spec-pill"><i class="bi bi-diagram-2 text-warning"></i> Sistem WMS</span>
                                <span class="facility-spec-pill"><i class="bi bi-upc-scan text-primary"></i> Barcode Scanner</span>
                                <span class="facility-spec-pill"><i class="bi bi-box-seam text-secondary"></i> Rak Susun</span>
                            </div>
                            <div class="facility-card-footer">
                                <a href="{{ route('profil.fasilitas') }}" class="facility-link">
                                    <span>Lihat Detail Fasilitas</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <span class="facility-status-pill text-success">
                                    <i class="bi bi-patch-check-fill"></i> Standar Industri
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas 5: Smart Classroom -->
                <div class="col-lg-4 col-md-6">
                    <div class="facility-home-card card-accent-purple">
                        <div class="facility-home-img-wrap">
                            <img src="{{ asset('images/fasilitas-kelas-modern-2x.png') }}" alt="Smart Classroom Ber-AC" class="facility-home-img">
                            <div class="facility-category-badge badge-cat-purple">
                                <i class="bi bi-display me-1"></i> RUANG KELAS MODERN
                            </div>
                            <div class="facility-home-badge">
                                <i class="bi bi-tv text-info"></i> Interactive Smart TV 65" & AC
                            </div>
                        </div>
                        <div class="facility-home-body">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="facility-icon-pill" style="background-color: #f5f3ff; color: #7c3aed;">
                                    <i class="bi bi-tv"></i>
                                </div>
                                <h4 class="facility-home-title">Smart Classroom Ber-AC & Interaktif</h4>
                            </div>
                            <p class="facility-home-desc">
                                Ruang kelas berpendingin udara (AC) dengan smart interactive TV, sound system wireless, dan meja belajar modular untuk diskusi kolaboratif.
                            </p>
                            <div class="facility-spec-tags">
                                <span class="facility-spec-pill"><i class="bi bi-tv text-purple"></i> Smart TV 65"</span>
                                <span class="facility-spec-pill"><i class="bi bi-snow text-info"></i> Dual Split AC</span>
                                <span class="facility-spec-pill"><i class="bi bi-wifi text-primary"></i> High-Speed WiFi</span>
                            </div>
                            <div class="facility-card-footer">
                                <a href="{{ route('profil.fasilitas') }}" class="facility-link">
                                    <span>Lihat Detail Fasilitas</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <span class="facility-status-pill text-success">
                                    <i class="bi bi-patch-check-fill"></i> Audio Visual HD
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas 6: Perpustakaan Digital -->
                <div class="col-lg-4 col-md-6">
                    <div class="facility-home-card card-accent-teal">
                        <div class="facility-home-img-wrap">
                            <img src="{{ asset('images/fasilitas-perpustakaan-2x.png') }}" alt="Perpustakaan Digital" class="facility-home-img">
                            <div class="facility-category-badge badge-cat-teal">
                                <i class="bi bi-book me-1"></i> LITERASI & RISET
                            </div>
                            <div class="facility-home-badge">
                                <i class="bi bi-journal-bookmark text-warning"></i> 5.000+ E-Book & Jurnal Ilmiah
                            </div>
                        </div>
                        <div class="facility-home-body">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="facility-icon-pill" style="background-color: #f0fdfa; color: #0d9488;">
                                    <i class="bi bi-book-half"></i>
                                </div>
                                <h4 class="facility-home-title">Perpustakaan Digital & Ruang Baca</h4>
                            </div>
                            <p class="facility-home-desc">
                                Pusat referensi literasi dengan koleksi ribuan buku fisik dan e-book vokasi, ruang baca hening berkarpet, terminal PC riset, dan akses jurnal online.
                            </p>
                            <div class="facility-spec-tags">
                                <span class="facility-spec-pill"><i class="bi bi-journal-richtext text-success"></i> 5.000+ Koleksi</span>
                                <span class="facility-spec-pill"><i class="bi bi-laptop text-info"></i> PC E-Library</span>
                                <span class="facility-spec-pill"><i class="bi bi-cup-hot text-amber"></i> Ruang Diskusi</span>
                            </div>
                            <div class="facility-card-footer">
                                <a href="{{ route('profil.fasilitas') }}" class="facility-link">
                                    <span>Lihat Detail Fasilitas</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <span class="facility-status-pill text-success">
                                    <i class="bi bi-patch-check-fill"></i> Terakreditasi A
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Lihat Selengkapnya Menuju Halaman Fasilitas -->
            <div class="text-center mt-5">
                <a href="{{ route('profil.fasilitas') }}" class="btn-facility-more">
                    <i class="bi bi-buildings-fill me-2"></i>
                    <span>Lihat Selengkapnya Fasilitas Sekolah</span>
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 4: INFORMASI & ALUR PPDB ONLINE
         ========================================== -->
    <section class="home-section-padding" id="ppdb">
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
                    <div class="ppdb-flow-card text-center">
                        <div class="ppdb-flow-step-num">1</div>
                        <h4 class="fw-bold text-dark mb-2" style="font-size: 1.05rem;">Registrasi Online</h4>
                        <p class="text-secondary small mb-0" style="line-height: 1.55;">
                            Buka portal PPDB resmi, buat akun calon siswa baru, dan isi formulir biodata lengkap beserta pemilihan jurusan yang diminati.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="ppdb-flow-card text-center">
                        <div class="ppdb-flow-step-num">2</div>
                        <h4 class="fw-bold text-dark mb-2" style="font-size: 1.05rem;">Unggah Berkas</h4>
                        <p class="text-secondary small mb-0" style="line-height: 1.55;">
                            Upload salinan rapor SMP/MTs, Kartu Keluarga (KK), Akta Kelahiran, dan pas foto terbaru secara digital melalui portal akun.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="ppdb-flow-card text-center">
                        <div class="ppdb-flow-step-num">3</div>
                        <h4 class="fw-bold text-dark mb-2" style="font-size: 1.05rem;">Tes Minat & Wawancara</h4>
                        <p class="text-secondary small mb-0" style="line-height: 1.55;">
                            Mengikuti pemetaan bakat minat kejuruan dan sesi wawancara motivasi belajar bersama tim konselor guru profesional.
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="ppdb-flow-card text-center">
                        <div class="ppdb-flow-step-num">4</div>
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
         SECTION 5: EKSTRAKURIKULER & PRESTASI SISWA
         ========================================== -->
    <section class="home-section-padding home-section-bg-light" id="ekskul">
        <div class="container">
            <div class="row g-5">
                <!-- Kolom Kiri: Kegiatan Ekstrakurikuler -->
                <div class="col-lg-7">
                    <div class="mb-4">
                        <span class="section-badge-pill section-badge-primary">
                            <i class="bi bi-compass-fill text-primary"></i> PENGEMBANGAN DIRI
                        </span>
                        <h2 class="section-title-lg">Ekstrakurikuler Pilihan</h2>
                        <p class="section-subtitle-text">
                            Wadah eksplorasi minat, bakat, kepemimpinan, dan kebugaran jasmani bagi seluruh siswa di luar jam KBM.
                        </p>
                    </div>

                    <div class="row g-3">
                        <!-- Ekskul 1 -->
                        <div class="col-sm-6">
                            <div class="ekskul-mini-card">
                                <div class="ekskul-icon-wrap" style="background-color: #eff6ff; color: #2563eb;">
                                    <i class="bi bi-shield-lock-fill"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">Cyber Security Club</h5>
                                    <div class="text-secondary small" style="font-size: 0.76rem;">Ethical Hacking & Networking</div>
                                </div>
                            </div>
                        </div>

                        <!-- Ekskul 2 -->
                        <div class="col-sm-6">
                            <div class="ekskul-mini-card">
                                <div class="ekskul-icon-wrap" style="background-color: #ecfdf5; color: #059669;">
                                    <i class="bi bi-robot"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">Robotika & IoT</h5>
                                    <div class="text-secondary small" style="font-size: 0.76rem;">Mikrokontroler & Otomasi</div>
                                </div>
                            </div>
                        </div>

                        <!-- Ekskul 3 -->
                        <div class="col-sm-6">
                            <div class="ekskul-mini-card">
                                <div class="ekskul-icon-wrap" style="background-color: #fffbeb; color: #d97706;">
                                    <i class="bi bi-flag-fill"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">Paskibra & Pasus</h5>
                                    <div class="text-secondary small" style="font-size: 0.76rem;">Kedisiplinan & Baris Berbaris</div>
                                </div>
                            </div>
                        </div>

                        <!-- Ekskul 4 -->
                        <div class="col-sm-6">
                            <div class="ekskul-mini-card">
                                <div class="ekskul-icon-wrap" style="background-color: #fef2f2; color: #dc2626;">
                                    <i class="bi bi-trophy-fill"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">Futsal & E-Sport</h5>
                                    <div class="text-secondary small" style="font-size: 0.76rem;">Turnamen Olahraga Prestasi</div>
                                </div>
                            </div>
                        </div>

                        <!-- Ekskul 5 -->
                        <div class="col-sm-6">
                            <div class="ekskul-mini-card">
                                <div class="ekskul-icon-wrap" style="background-color: #f5f3ff; color: #7c3aed;">
                                    <i class="bi bi-chat-left-dots-fill"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">English Debate Club</h5>
                                    <div class="text-secondary small" style="font-size: 0.76rem;">Public Speaking & TOEIC</div>
                                </div>
                            </div>
                        </div>

                        <!-- Ekskul 6 -->
                        <div class="col-sm-6">
                            <div class="ekskul-mini-card">
                                <div class="ekskul-icon-wrap" style="background-color: #f0fdfa; color: #0d9488;">
                                    <i class="bi bi-palette-fill"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">Desain & Multimedia</h5>
                                    <div class="text-secondary small" style="font-size: 0.76rem;">Fotografi & Konten Kreator</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Prestasi Siswa Terkini -->
                <div class="col-lg-5" id="prestasi">
                    <div class="mb-4">
                        <span class="section-badge-pill section-badge-amber">
                            <i class="bi bi-award-fill text-warning"></i> REKAM JEJAK JUARA
                        </span>
                        <h2 class="section-title-lg">Prestasi Siswa</h2>
                        <p class="section-subtitle-text">
                            Dedikasi dan kerja keras siswa-siswi SMK Gema Cyber School dalam menorehkan prestasi gemilang.
                        </p>
                    </div>

                    <!-- Prestasi 1 -->
                    <div class="prestasi-item-card">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2 py-0 small fw-bold">JUARA 1 TINGKAT PROVINSI</span>
                            <span class="text-secondary small" style="font-size: 0.75rem;"><i class="bi bi-calendar3 me-1"></i>2026</span>
                        </div>
                        <h5 class="fw-bold text-dark mb-1" style="font-size: 1rem;">LKS SMK Bidang Cyber Security</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.5;">
                            Diraih oleh Tim Siswa TJKT atas keunggulan analisis forensik digital, network defense, dan pengujian penetrasi keamanan sistem.
                        </p>
                    </div>

                    <!-- Prestasi 2 -->
                    <div class="prestasi-item-card" style="border-left-color: #0d6efd;">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-0 small fw-bold">JUARA 2 NASIONAL</span>
                            <span class="text-secondary small" style="font-size: 0.75rem;"><i class="bi bi-calendar3 me-1"></i>2026</span>
                        </div>
                        <h5 class="fw-bold text-dark mb-1" style="font-size: 1rem;">National Accurate Accounting Challenge</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.5;">
                            Kompetisi simulasi akuntansi digital perusahaan dagang dan manufaktur yang diikuti lebih dari 120 sekolah se-Indonesia.
                        </p>
                    </div>

                    <!-- Prestasi 3 -->
                    <div class="prestasi-item-card" style="border-left-color: #059669;">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-0 small fw-bold">MEDALI EMAS</span>
                            <span class="text-secondary small" style="font-size: 0.75rem;"><i class="bi bi-calendar3 me-1"></i>2025</span>
                        </div>
                        <h5 class="fw-bold text-dark mb-1" style="font-size: 1rem;">Olimpiade Vokasi Supply Chain & Logistik</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.5;">
                            Prestasi bidang manajemen pergudangan, efisiensi alur distribusi barang, dan sistem inventaris digital.
                        </p>
                    </div>
                </div>
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
                    <a href="#berita" class="btn btn-outline-primary rounded-pill px-4 py-2 small fw-bold">
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
                            <img src="{{ asset('images/berita-lks-cyber.png') }}" alt="Siswa SMK Gema Cyber Raih Juara LKS" class="news-thumb-img">
                        </div>
                        <div class="news-body-box">
                            <div class="news-date-badge">
                                <i class="bi bi-calendar-event text-primary"></i> 18 Oktober 2026 • <span class="badge bg-primary-subtle text-primary">Prestasi</span>
                            </div>
                            <a href="#" class="news-title-link">
                                Siswa SMK Gema Cyber Raih Medali Emas LKS Tingkat Provinsi Bidang Cyber Security
                            </a>
                            <p class="news-excerpt">
                                Prestasi membanggakan kembali diukir oleh kontingen siswa kejuruan TJKT setelah melalui 3 babak penugasan network defense dan ethical hacking.
                            </p>
                            <a href="#" class="jurusan-card-link mt-auto">
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
                            <img src="{{ asset('images/berita-mou-industri.png') }}" alt="MoU Kelas Industri Bersama PT Telkom" class="news-thumb-img">
                        </div>
                        <div class="news-body-box">
                            <div class="news-date-badge">
                                <i class="bi bi-calendar-event text-primary"></i> 12 Oktober 2026 • <span class="badge bg-success-subtle text-success">Kerjasama DUDI</span>
                            </div>
                            <a href="#" class="news-title-link">
                                Kunjungan Industri & Penandatanganan MoU Kelas Khusus Bersama PT Telkom Indonesia
                            </a>
                            <p class="news-excerpt">
                                Penyelarasan kurikulum berbasis industri teknologi telekomunikasi dan komitmen pembukaan kuota magang prioritas bagi siswa berprestasi.
                            </p>
                            <a href="#" class="jurusan-card-link mt-auto">
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
                            <img src="{{ asset('images/berita-ukk-bnsp.png') }}" alt="Pelaksanaan UKK BNSP Berjalan Sukses" class="news-thumb-img">
                        </div>
                        <div class="news-body-box">
                            <div class="news-date-badge">
                                <i class="bi bi-calendar-event text-primary"></i> 05 Oktober 2026 • <span class="badge bg-warning-subtle text-warning">Sertifikasi</span>
                            </div>
                            <a href="#" class="news-title-link">
                                Pelaksanaan Uji Sertifikasi Kompetensi (USK) BNSP Tahun Ajaran 2026 Berjalan Sukses
                            </a>
                            <p class="news-excerpt">
                                Seluruh peserta didik tingkat akhir menyelesaikan serangkaian uji teknis kompetensi profesi di hadapan tim asesor independen berlisensi BNSP.
                            </p>
                            <a href="#" class="jurusan-card-link mt-auto">
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
         SECTION 7: GALERI DOKUMENTASI & VIDEO
         ========================================== -->
    <section class="home-section-padding home-section-bg-light" id="galeri">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge-pill section-badge-purple">
                    <i class="bi bi-camera-fill text-purple"></i> DOKUMENTASI SEKOLAH
                </span>
                <h2 class="section-title-lg">Galeri Aktivitas Pembelajaran</h2>
                <p class="section-subtitle-text mx-auto">
                    Momen inspiratif dalam dinamika belajar, praktik teknologi laboratorium, dan pembinaan karakter di SMK Gema Cyber School.
                </p>
            </div>

            <!-- 4 Gallery Grid Items -->
            <div class="row g-4 mb-4">
                <div class="col-lg-3 col-sm-6">
                    <div class="gallery-thumb-item">
                        <img src="{{ asset('images/galeri-kegiatan-1.png') }}" alt="Praktikum Fiber Optic" class="gallery-thumb-img">
                        <div class="gallery-caption-overlay">
                            Praktikum Splicing Jaringan
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="gallery-thumb-item">
                        <img src="{{ asset('images/galeri-kegiatan-2.png') }}" alt="Simulasi Mini Bank" class="gallery-thumb-img">
                        <div class="gallery-caption-overlay">
                            Simulasi Transaksi Perbankan
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="gallery-thumb-item">
                        <img src="{{ asset('images/galeri-kegiatan-3.png') }}" alt="Workshop Robotika" class="gallery-thumb-img">
                        <div class="gallery-caption-overlay">
                            Workshop Robotika & IoT
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="gallery-thumb-item">
                        <img src="{{ asset('images/galeri-kegiatan-4.png') }}" alt="Bursa Kerja BKK" class="gallery-thumb-img">
                        <div class="gallery-caption-overlay">
                            Job Fair & Rekrutmen Kerja
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video Callout Box -->
            <div class="text-center p-4 bg-white border rounded-4 shadow-sm mx-auto" style="max-width: 640px;">
                <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                    <i class="bi bi-play-circle-fill text-danger fs-2"></i>
                    <div class="text-start">
                        <div class="fw-bold text-dark" style="font-size: 0.98rem;">Ingin Melihat Suasana Kampus Lebih Dekat?</div>
                        <div class="text-secondary small">Tonton video profil resmi SMK Gema Cyber School beresolusi Full HD.</div>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3 py-1 fw-bold" data-bs-toggle="modal" data-bs-target="#videoProfileModal">
                        <i class="bi bi-play-fill me-1"></i> Putar Video
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 8: MITRA INDUSTRI & DUDI
         ========================================== -->
    <section class="home-section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge-pill section-badge-primary">
                    <i class="bi bi-link-45deg text-primary"></i> JEJARING KEMITRAAN
                </span>
                <h2 class="section-title-lg">Mitra Industri & Penyaluran Kerja</h2>
                <p class="section-subtitle-text mx-auto">
                    Bekerja sama erat dengan korporasi nasional dan lembaga sertifikasi ternama demi menjamin keterserapan kerja lulusan.
                </p>
            </div>

            <!-- 8 Partner Pills -->
            <div class="row g-3 justify-content-center mb-5">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="partner-logo-pill">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-broadcast text-danger fs-4"></i>
                            <span class="partner-name-text">PT Telkom Indonesia</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <div class="partner-logo-pill">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-gear-wide-connected text-primary fs-4"></i>
                            <span class="partner-name-text">PT Astra International</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <div class="partner-logo-pill">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-bank2 text-warning fs-4"></i>
                            <span class="partner-name-text">Bank Mandiri</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <div class="partner-logo-pill">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-mailbox2 text-warning fs-4"></i>
                            <span class="partner-name-text">PT Pos Indonesia</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <div class="partner-logo-pill">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-truck text-danger fs-4"></i>
                            <span class="partner-name-text">JNE Express Logistics</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <div class="partner-logo-pill">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-hdd-network text-info fs-4"></i>
                            <span class="partner-name-text">Cisco Academy</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <div class="partner-logo-pill">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-router text-success fs-4"></i>
                            <span class="partner-name-text">MikroTik Academy</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <div class="partner-logo-pill">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-receipt-cutoff text-primary fs-4"></i>
                            <span class="partner-name-text">Accurate Partner</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Bar BKK -->
            <div class="row g-3 text-center">
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded-4 border">
                        <div class="fw-bold text-primary mb-1" style="font-size: 1.8rem;">50+</div>
                        <div class="text-secondary small fw-semibold">Perusahaan Rekanan Industri</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded-4 border">
                        <div class="fw-bold text-success mb-1" style="font-size: 1.8rem;">88.4%</div>
                        <div class="text-secondary small fw-semibold">Tingkat Penyerapan Kerja Lulusan</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded-4 border">
                        <div class="fw-bold text-warning mb-1" style="font-size: 1.8rem;">100%</div>
                        <div class="text-secondary small fw-semibold">Sertifikasi Kompetensi BNSP</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 9: FAQ (TANYA JAWAB UMUM)
         ========================================== -->
    <section class="home-section-padding home-section-bg-light" id="faq">
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
                                    <i class="bi bi-patch-check-fill text-primary me-2"></i> Apakah ijazah dan sertifikat SMK Gema Cyber School diakui secara nasional?
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
                                    <i class="bi bi-briefcase-fill text-primary me-2"></i> Bagaimana peluang kerja lulusan dan bantuan penyaluran karir?
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
                                    <i class="bi bi-gift-fill text-primary me-2"></i> Apakah tersedia beasiswa bagi siswa baru yang berprestasi?
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
                                    <i class="bi bi-laptop-fill text-primary me-2"></i> Apakah siswa wajib memiliki laptop pribadi untuk praktikum?
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
                                    <i class="bi bi-file-earmark-text-fill text-primary me-2"></i> Bagaimana cara mendaftar dan apa saja berkas persyaratannya?
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
         FOOTER
         ========================================== -->
    <footer class="school-footer" id="footer">
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
                        <li><a href="{{ route('profil.tentang') }}">Profil Sekolah</a></li>
                        <li><a href="{{ route('profil.visi-misi') }}">Visi & Misi</a></li>
                        <li><a href="{{ route('profil.struktur') }}">Struktur Organisasi</a></li>
                        <li><a href="#ppdb">Pendaftaran PPDB</a></li>
                        <li><a href="#kontak-langsung">Hubungi Kami</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">Program Keahlian</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="#jurusan-tjkt">Teknik Jaringan Komputer (TJKT)</a></li>
                        <li><a href="#jurusan-akl">Akuntansi & Keuangan (AKL)</a></li>
                        <li><a href="#jurusan-mplb">Manajemen Perkantoran (MPLB)</a></li>
                        <li><a href="#jurusan-logistik">Logistik</a></li>
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
