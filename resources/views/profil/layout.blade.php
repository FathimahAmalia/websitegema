<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Profil SMK Gema Cyber School - Pendidikan Vokasi Berkualitas untuk Masa Depan yang Lebih Baik.')">
    
    <title>@yield('title', 'Profil Sekolah') - SMK Gema Cyber School</title>

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
            <a class="navbar-brand" href="{{ route('beranda') }}">
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
                        <a class="nav-link" href="{{ route('beranda') }}">
                            <i class="bi bi-house-door me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil <i class="bi bi-chevron-down nav-chevron"></i>
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('profil.tentang') || request()->routeIs('profil.index') ? 'active' : '' }}" href="{{ route('profil.tentang') }}"><i class="bi bi-building me-2 text-primary"></i>Profil Sekolah</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('profil.visi-misi') ? 'active' : '' }}" href="{{ route('profil.visi-misi') }}"><i class="bi bi-bullseye me-2 text-danger"></i>Visi & Misi</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('profil.struktur') ? 'active' : '' }}" href="{{ route('profil.struktur') }}"><i class="bi bi-diagram-3 me-2 text-success"></i>Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Jurusan <i class="bi bi-chevron-down nav-chevron"></i>
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                            <li><a class="dropdown-item py-2" href="{{ route('beranda') }}#jurusan-tjkt">Teknik Jaringan Komputer & Telekomunikasi (TJKT)</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('beranda') }}#jurusan-akl">Akuntansi & Keuangan Lembaga (AKL)</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('beranda') }}#jurusan-mplb">Manajemen Perkantoran & Layanan Bisnis (MPLB)</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('beranda') }}#jurusan-logistik">Logistik</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beranda') }}#ppdb">PPDB</a>
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
                    <a href="{{ route('beranda') }}#ppdb" class="btn-ppdb-nav">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>PPDB Online</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ==========================================
         PAGE HEADER BANNER (PRESTIGIOUS ACADEMIC NAVY)
         ========================================== -->
    <header class="profile-page-banner">
        <div class="container position-relative z-2">
            <div class="row align-items-center">
                <!-- Left Title & Breadcrumbs -->
                <div class="col-lg-7 py-2">
                    <div class="profile-banner-badge-gold">
                        <i class="bi bi-patch-check-fill text-warning"></i>
                        <span>@yield('banner_badge', 'SEKOLAH PUSAT KEUNGGULAN • TERAKREDITASI A')</span>
                    </div>
                    <h1 class="profile-banner-title">
                        @yield('banner_title', 'Profil SMK Gema Cyber School')
                    </h1>
                    <p class="profile-banner-desc">
                        @yield('banner_desc', 'Membangun generasi vokasi unggul, berkarakter mulia, dan siap kerja di era digital melalui kurikulum terintegrasi industri dan teknologi modern.')
                    </p>
                    <div class="profile-breadcrumb-pill">
                        <a href="{{ route('beranda') }}"><i class="bi bi-house-door-fill text-info"></i> Beranda</a>
                        <i class="bi bi-chevron-right opacity-50" style="font-size: 0.68rem;"></i>
                        <a href="{{ route('profil.tentang') }}">Profil</a>
                        <i class="bi bi-chevron-right opacity-50" style="font-size: 0.68rem;"></i>
                        <span class="crumb-active">@yield('breadcrumb_active', 'Profil')</span>
                    </div>
                </div>

                <!-- Right Academic Highlights (Glassmorphism Cards) -->
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="ms-auto" style="max-width: 380px;">
                        <div class="banner-highlight-glass">
                            <div class="banner-highlight-icon" style="background: rgba(13, 110, 253, 0.25); color: #60a5fa;">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <div>
                                <div class="fw-bold small text-white">Terakreditasi A (Unggul)</div>
                                <div class="text-white-50" style="font-size: 0.74rem;">SK BAN-SM Kemdikbudristek RI</div>
                            </div>
                        </div>

                        <div class="banner-highlight-glass">
                            <div class="banner-highlight-icon" style="background: rgba(16, 185, 129, 0.25); color: #34d399;">
                                <i class="bi bi-laptop-fill"></i>
                            </div>
                            <div>
                                <div class="fw-bold small text-white">4 Program Keahlian Digital</div>
                                <div class="text-white-50" style="font-size: 0.74rem;">TJKT • AKL • MPLB • Logistik</div>
                            </div>
                        </div>

                        <div class="banner-highlight-glass mb-0">
                            <div class="banner-highlight-icon" style="background: rgba(245, 158, 11, 0.25); color: #fbbf24;">
                                <i class="bi bi-buildings-fill"></i>
                            </div>
                            <div>
                                <div class="fw-bold small text-white">20+ Mitra Industri Strategis</div>
                                <div class="text-white-50" style="font-size: 0.74rem;">Teaching Factory & Magang Bersertifikat</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ==========================================
         MAIN CONTENT AREA (SPACIOUS 2-COLUMN LAYOUT)
         ========================================== -->
    <main class="profile-content-area">
        <div class="container">
            <div class="row g-4">
                
                <!-- ==========================================
                     COLUMN 1: SIDEBAR (LEFT - 3 CLEAN ITEMS + DOWNLOAD + PPDB HELP)
                     ========================================== -->
                <div class="col-lg-3 col-md-4">
                    <!-- Clean 3-Item Navigation Card -->
                    <div class="profile-sidebar-card">
                        <div class="sidebar-heading-small">
                            <i class="bi bi-grid-fill text-primary"></i>
                            <span>Menu Profil</span>
                        </div>

                        <!-- 1. Profil Sekolah -->
                        <a href="{{ route('profil.tentang') }}" class="profile-nav-link {{ request()->routeIs('profil.tentang') || request()->routeIs('profil.index') ? 'active' : '' }}">
                            <div class="nav-left">
                                <div class="nav-icon"><i class="bi bi-building"></i></div>
                                <div>
                                    <span class="nav-text-main">Profil Sekolah</span>
                                    <span class="nav-text-sub">Tentang, Nilai & Fasilitas</span>
                                </div>
                            </div>
                            <i class="bi bi-chevron-right nav-arrow"></i>
                        </a>

                        <!-- 2. Visi & Misi -->
                        <a href="{{ route('profil.visi-misi') }}" class="profile-nav-link {{ request()->routeIs('profil.visi-misi') ? 'active' : '' }}">
                            <div class="nav-left">
                                <div class="nav-icon"><i class="bi bi-bullseye"></i></div>
                                <div>
                                    <span class="nav-text-main">Visi & Misi</span>
                                    <span class="nav-text-sub">Arah Strategis & Tujuan</span>
                                </div>
                            </div>
                            <i class="bi bi-chevron-right nav-arrow"></i>
                        </a>

                        <!-- 3. Struktur Organisasi -->
                        <a href="{{ route('profil.struktur') }}" class="profile-nav-link {{ request()->routeIs('profil.struktur') ? 'active' : '' }}">
                            <div class="nav-left">
                                <div class="nav-icon"><i class="bi bi-diagram-3"></i></div>
                                <div>
                                    <span class="nav-text-main">Struktur Organisasi</span>
                                    <span class="nav-text-sub">Bagan Manajemen Sekolah</span>
                                </div>
                            </div>
                            <i class="bi bi-chevron-right nav-arrow"></i>
                        </a>
                    </div>

                    <!-- Dokumen Profil (Download PDF) in Sidebar -->
                    <div class="profile-sidebar-card" id="dokumen-profil">
                        <div class="sidebar-heading-small">
                            <i class="bi bi-file-earmark-arrow-down-fill text-primary"></i>
                            <span>Unduh Dokumen</span>
                        </div>

                        <!-- Item 1: Profil Sekolah (PDF) -->
                        <a href="#" class="doc-download-item">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-file-earmark-pdf-fill text-danger fs-5"></i>
                                <div>
                                    <div class="fw-bold small text-dark">Profil Sekolah</div>
                                    <div class="text-secondary" style="font-size: 0.7rem;">PDF • 2.5 MB</div>
                                </div>
                            </div>
                            <div class="doc-download-btn"><i class="bi bi-download"></i></div>
                        </a>

                        <!-- Item 2: Visi Misi dan Tujuan (PDF) -->
                        <a href="#" class="doc-download-item">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-file-earmark-pdf-fill text-warning fs-5"></i>
                                <div>
                                    <div class="fw-bold small text-dark">Visi & Misi</div>
                                    <div class="text-secondary" style="font-size: 0.7rem;">PDF • 1.2 MB</div>
                                </div>
                            </div>
                            <div class="doc-download-btn"><i class="bi bi-download"></i></div>
                        </a>

                        <!-- Item 3: Struktur Organisasi (PDF) -->
                        <a href="#" class="doc-download-item mb-0">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-file-earmark-pdf-fill text-success fs-5"></i>
                                <div>
                                    <div class="fw-bold small text-dark">Struktur Organisasi</div>
                                    <div class="text-secondary" style="font-size: 0.7rem;">PDF • 1.1 MB</div>
                                </div>
                            </div>
                            <div class="doc-download-btn"><i class="bi bi-download"></i></div>
                        </a>
                    </div>

                    <!-- Sidebar Info / PPDB Card -->
                    <div class="sidebar-help-card">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="bi bi-headset text-warning fs-5"></i>
                            <span class="fw-bold small text-white">Layanan Informasi</span>
                        </div>
                        <p class="small text-white-50 mb-3" style="font-size: 0.78rem; line-height: 1.55;">
                            Ingin berkonsultasi mengenai program keahlian dan pendaftaran peserta didik baru?
                        </p>
                        <a href="https://wa.me/" target="_blank" class="btn btn-light btn-sm w-100 rounded-pill fw-bold text-primary shadow-sm py-2 d-flex align-items-center justify-content-center gap-2" style="font-size: 0.82rem;">
                            <i class="bi bi-whatsapp text-success fs-6"></i>
                            <span>Chat WhatsApp PPDB</span>
                        </a>
                    </div>
                </div>

                <!-- ==========================================
                     COLUMN 2: MAIN PROFILE CONTENT (SPACIOUS 9 COLS)
                     ========================================== -->
                <div class="col-lg-9 col-md-8">
                    @yield('profile_content')
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
                        <li><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li><a href="{{ route('profil.tentang') }}">Profil Sekolah</a></li>
                        <li><a href="{{ route('profil.visi-misi') }}">Visi & Misi</a></li>
                        <li><a href="{{ route('profil.struktur') }}">Struktur Organisasi</a></li>
                        <li><a href="#kontak">Hubungi Kami</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">Program Keahlian</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ route('beranda') }}#jurusan-tjkt">Teknik Jaringan Komputer (TJKT)</a></li>
                        <li><a href="{{ route('beranda') }}#jurusan-akl">Akuntansi & Keuangan (AKL)</a></li>
                        <li><a href="{{ route('beranda') }}#jurusan-mplb">Manajemen Perkantoran (MPLB)</a></li>
                        <li><a href="{{ route('beranda') }}#jurusan-logistik">Logistik</a></li>
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
