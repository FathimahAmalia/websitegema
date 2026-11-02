<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Portal Berita & Kabar Terkini SMK Gema Cyber School - Prestasi, Agenda Akademik, dan Liputan Sekolah Vokasi.')">
    
    <title>@yield('title', 'Berita & Informasi') - SMK Gema Cyber School</title>

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
    @yield('extra_css')
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
                        <a class="nav-link {{ (request()->routeIs('ekstrakurikuler.*') || request()->routeIs('prestasi.*') || request()->routeIs('galeri.*')) ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kegiatan <i class="bi bi-chevron-down nav-chevron"></i>
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                            <li><a class="dropdown-item py-2" href="{{ route('ekstrakurikuler.index') }}"><i class="bi bi-stars me-2 text-warning"></i>Ekstrakurikuler</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('prestasi.index') }}"><i class="bi bi-trophy me-2 text-primary"></i>Prestasi Siswa</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('galeri.*') ? 'active' : '' }}" href="{{ route('galeri.index') }}"><i class="bi bi-images me-2 text-success"></i>Galeri Kegiatan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('berita.index') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beranda') }}#kontak">Kontak</a>
                    </li>
                </ul>

                <!-- Right Actions -->
                <div class="d-flex align-items-center gap-3">
                    <button type="button" class="btn-nav-search" data-bs-toggle="modal" data-bs-target="#searchModal" title="Pencarian Berita">
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
         PAGE HEADER BANNER
         ========================================== -->
    <header class="profile-page-banner">
        <div class="container position-relative z-2">
            <div class="row align-items-center">
                <!-- Title & Description -->
                <div class="col-lg-10 py-2">
                    <div class="profile-banner-badge-gold">
                        <i class="bi bi-newspaper text-warning"></i>
                        <span>@yield('banner_badge', 'PORTAL KABAR & PUBLIKASI RESMI')</span>
                    </div>
                    <h1 class="profile-banner-title">
                        @yield('banner_title', 'Warta & Berita SMK Gema Cyber School')
                    </h1>
                    <p class="profile-banner-desc mb-0">
                        @yield('banner_desc', 'Ikuti dinamika informasi, kabar prestasi kejuruan, agenda akademik, inovasi teknologi, serta rilis kegiatan resmi SMK Gema Cyber School.')
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- ==========================================
         MAIN CONTENT AREA
         ========================================== -->
    <main class="py-5" style="background-color: #f8fafc; min-height: 60vh;">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- ==========================================
         FOOTER
         ========================================== -->
    <footer class="school-footer" id="kontak">
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
                    <h6 class="modal-title fw-bold">Pencarian Berita & Artikel</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('berita.index') }}" method="GET">
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" name="q" class="form-control border-start-0 ps-0" placeholder="Ketik kata kunci berita (misal: LKS, Telkom, BNSP)..." value="{{ request('q') }}" required>
                            <button class="btn btn-primary px-3 rounded-end" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification for Copy Link -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
        <div id="copyToast" class="toast align-items-center text-white bg-dark border-0 rounded-3 shadow" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-2">
                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                    <span>Tautan berita berhasil disalin ke clipboard!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
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

        // Copy Link to Clipboard Function
        function copyArticleUrl(url) {
            navigator.clipboard.writeText(url).then(function() {
                const toastEl = document.getElementById('copyToast');
                if (toastEl) {
                    const toast = new bootstrap.Toast(toastEl, { delay: 2500 });
                    toast.show();
                }
            }).catch(function() {
                alert('Tautan: ' + url);
            });
        }
    </script>
    @yield('extra_js')
</body>
</html>
