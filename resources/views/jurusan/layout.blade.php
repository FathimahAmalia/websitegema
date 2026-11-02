<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Program keahlian SMK Gema Cyber School.')">
    <title>@yield('title', 'Program Keahlian') - SMK Gema Cyber School</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/school-style.css') }}">
    @yield('extra_css')
    <style>
        .program-eyebrow {
            color: #bfdbfe;
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 0.14em;
        }

        .program-content-section {
            padding: 4.5rem 0;
        }

        .program-content-section.program-soft-bg {
            background: #f8fafc;
        }

        .program-detail-top {
            padding-top: 3rem;
        }

        .program-detail-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.08fr) minmax(0, 0.92fr);
            gap: 2rem;
            align-items: start;
        }

        .program-competency-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            margin-top: 1.5rem;
            padding: 1rem 0;
            background: linear-gradient(135deg, #f4f8ff, #f8fafc);
            border: 1px solid #e5edf7;
            border-radius: 18px;
        }

        .program-competency-card {
            min-width: 0;
            padding: 0.5rem 0.9rem;
            border-right: 1px solid #dbe5f1;
        }

        .program-competency-card:last-child {
            border-right: 0;
        }

        .program-competency-icon {
            display: inline-flex;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.7rem;
            border-radius: 50%;
            font-size: 1rem;
        }

        .program-competency-card h2 {
            margin: 0 0 0.35rem;
            color: #1e293b;
            font-size: 0.77rem;
            font-weight: 800;
            line-height: 1.35;
        }

        .program-competency-card p {
            margin: 0;
            color: #64748b;
            font-size: 0.7rem;
            line-height: 1.5;
        }

        .program-gallery-preview {
            min-width: 0;
        }

        .program-gallery-feature {
            position: relative;
            overflow: hidden;
            height: 310px;
            background: #e2e8f0;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
        }

        .program-gallery-feature img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 180ms ease;
        }

        .program-gallery-badge {
            position: absolute;
            left: 1rem;
            bottom: 1rem;
            padding: 0.5rem 0.75rem;
            color: #fff;
            background: rgba(12, 30, 51, 0.82);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50rem;
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.05em;
        }

        .program-gallery-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin: 1rem 0 0.65rem;
        }

        .program-gallery-heading h2 {
            margin: 0;
            color: #1e293b;
            font-size: 0.92rem;
            font-weight: 800;
        }

        .program-gallery-heading p {
            margin: 0.15rem 0 0;
            color: #64748b;
            font-size: 0.72rem;
        }

        .program-gallery-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.65rem;
            color: var(--program-accent);
            font-size: 0.84rem;
            font-weight: 800;
            text-decoration: none;
        }

        .program-gallery-link:hover {
            color: var(--program-accent);
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .program-gallery-teasers {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 0.65rem;
            margin-top: 1rem;
        }

        .program-gallery-teaser {
            min-width: 0;
            overflow: hidden;
            color: #334155;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            text-decoration: none;
            transition: transform 180ms ease, box-shadow 180ms ease;
        }

        .program-gallery-teaser:hover {
            color: #1e293b;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.1);
        }

        .program-gallery-teaser img {
            display: block;
            width: 100%;
            height: 76px;
            object-fit: cover;
        }

        .program-gallery-teaser span {
            display: block;
            padding: 0.45rem 0.5rem;
            font-size: 0.68rem;
            font-weight: 700;
            line-height: 1.35;
        }

        .program-gallery-hero {
            position: relative;
            display: flex;
            min-height: 280px;
            align-items: center;
            overflow: hidden;
            padding: 7rem 0 3.5rem;
            color: #fff;
            background: #0c1e33;
        }

        .program-gallery-hero-image,
        .program-gallery-hero-overlay {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        .program-gallery-hero-image {
            object-fit: cover;
            object-position: center 42%;
        }

        .program-gallery-hero-overlay {
            background: linear-gradient(90deg, rgba(5, 24, 45, 0.94) 0%, rgba(5, 24, 45, 0.78) 48%, rgba(5, 24, 45, 0.3) 100%);
        }

        .program-gallery-hero-content {
            position: relative;
            z-index: 1;
        }

        .program-gallery-hero .program-gallery-back {
            color: rgba(255, 255, 255, 0.82);
        }

        .program-gallery-hero .program-gallery-back:hover {
            color: #fff;
        }

        .program-gallery-hero .program-section-kicker {
            color: #bfdbfe;
        }

        .program-gallery-hero h1 {
            max-width: 760px;
            margin: 0 0 0.8rem;
            color: #fff;
            font-size: clamp(2.2rem, 5vw, 3.35rem);
            font-weight: 800;
            line-height: 1.08;
            letter-spacing: -0.04em;
        }

        .program-gallery-hero h1 span {
            color: #60a5fa;
        }

        .program-gallery-hero p {
            max-width: 600px;
            color: rgba(255, 255, 255, 0.82);
            font-size: 0.92rem;
            line-height: 1.7;
        }

        .program-gallery-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #475569;
            font-size: 0.88rem;
            font-weight: 700;
            text-decoration: none;
        }

        .program-gallery-back:hover {
            color: var(--program-accent);
        }

        .program-gallery-page-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 1.5rem;
        }

        .program-gallery-count {
            flex-shrink: 0;
            padding: 0.65rem 0.9rem;
            color: #475569;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 50rem;
            font-size: 0.82rem;
            font-weight: 700;
        }

        .program-gallery-filters {
            display: flex;
            gap: 0.6rem;
            margin: 1.5rem 0 0.5rem;
            padding-bottom: 0.25rem;
            overflow-x: auto;
            scrollbar-width: thin;
        }

        .program-gallery-filter {
            flex-shrink: 0;
            padding: 0.58rem 0.9rem;
            color: #475569;
            background: #fff;
            border: 1px solid #dbe3ed;
            border-radius: 50rem;
            font-size: 0.76rem;
            font-weight: 700;
            transition: color 180ms ease, background-color 180ms ease, border-color 180ms ease;
        }

        .program-gallery-filter:hover,
        .program-gallery-filter.active {
            color: #fff;
            background: var(--program-accent);
            border-color: var(--program-accent);
        }

        [data-gallery-card][hidden] {
            display: none !important;
        }

        .program-gallery-card {
            height: 100%;
            overflow: hidden;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.045);
            transition: transform 220ms ease, box-shadow 220ms ease;
        }

        .program-gallery-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.1);
        }

        .program-gallery-open {
            position: relative;
            display: block;
            width: 100%;
            height: 155px;
            padding: 0;
            overflow: hidden;
            background: #e2e8f0;
            border: 0;
            cursor: zoom-in;
        }

        .program-gallery-open:focus-visible,
        .program-lightbox-close:focus-visible {
            outline: 3px solid color-mix(in srgb, var(--program-accent) 65%, white);
            outline-offset: 3px;
        }

        .program-gallery-open img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 350ms ease;
        }

        .program-gallery-card:hover .program-gallery-open img {
            transform: scale(1.04);
        }

        .program-gallery-zoom {
            position: absolute;
            right: 0.85rem;
            bottom: 0.85rem;
            display: inline-flex;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: rgba(12, 30, 51, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
        }

        .program-gallery-card-caption {
            padding: 0.85rem 0.9rem 0.95rem;
        }

        .program-gallery-category {
            display: inline-block;
            margin-bottom: 0.45rem;
            padding: 0.28rem 0.5rem;
            color: var(--program-accent);
            background: color-mix(in srgb, var(--program-accent) 9%, white);
            border-radius: 5px;
            font-size: 0.62rem;
            font-weight: 800;
        }

        .program-gallery-card-index {
            display: block;
            margin-top: 0.55rem;
            color: #94a3b8;
            font-size: 0.65rem;
            font-weight: 600;
        }

        .program-gallery-card-caption h3 {
            min-height: 2.5em;
            margin: 0;
            color: #1e293b;
            font-size: 0.82rem;
            font-weight: 700;
            line-height: 1.5;
        }

        .program-gallery-empty {
            padding: 2rem 1rem;
            color: #64748b;
            text-align: center;
        }

        .program-gallery-footer {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .program-lightbox {
            width: min(92vw, 1100px);
            max-width: none;
            max-height: 92vh;
            padding: 0;
            overflow: visible;
            color: #fff;
            background: transparent;
            border: 0;
        }

        .program-lightbox::backdrop {
            background: rgba(4, 12, 22, 0.88);
            backdrop-filter: blur(5px);
        }

        .program-lightbox-content {
            position: relative;
            padding: 0.75rem;
            background: #0c1e33;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 16px;
        }

        .program-lightbox-image {
            display: block;
            width: 100%;
            max-height: 78vh;
            object-fit: contain;
            border-radius: 10px;
        }

        .program-lightbox-caption {
            margin: 0;
            padding: 0.8rem 0.3rem 0.15rem;
            color: #e2e8f0;
            text-align: center;
        }

        .program-lightbox-close {
            position: absolute;
            z-index: 1;
            top: 1rem;
            right: 1rem;
            display: inline-flex;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: rgba(12, 30, 51, 0.82);
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 50%;
            cursor: pointer;
        }

        .program-highlight-card {
            height: 100%;
            padding: 1.6rem;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            box-shadow: 0 8px 26px rgba(15, 23, 42, 0.045);
        }

        .program-section-kicker {
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.12em;
        }

        .program-topic-card,
        .program-project-card {
            height: 100%;
            padding: 1.5rem;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            box-shadow: 0 8px 26px rgba(15, 23, 42, 0.04);
            transition: transform 220ms ease, box-shadow 220ms ease, border-color 220ms ease;
        }

        .program-topic-card:hover,
        .program-project-card:hover {
            transform: translateY(-4px);
            border-color: color-mix(in srgb, var(--program-accent) 38%, #e2e8f0);
            box-shadow: 0 16px 34px rgba(15, 23, 42, 0.09);
        }

        .program-topic-number {
            margin-bottom: 1rem;
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 0.12em;
        }

        .program-career-tag {
            padding: 0.5rem 0.75rem;
            color: #334155;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 50rem;
            font-size: 0.76rem;
            font-weight: 700;
        }

        .program-advantage-list {
            display: grid;
            gap: 0.75rem;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .program-advantage-list li {
            display: flex;
            gap: 0.65rem;
            align-items: flex-start;
            color: #475569;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .program-advantage-list i {
            margin-top: 0.15rem;
            flex-shrink: 0;
        }

        .program-section-heading {
            max-width: 720px;
        }

        .program-project-icon {
            display: inline-flex;
            width: 44px;
            height: 44px;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.2rem;
            border-radius: 13px;
            font-size: 1.15rem;
        }

        .program-project-label {
            margin-bottom: 0.45rem;
            color: #64748b;
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.12em;
        }

        .program-skill-tag {
            display: inline-flex;
            align-items: center;
            padding: 0.55rem 0.75rem;
            color: #334155;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 50rem;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .program-skill-tag i {
            color: var(--program-accent);
        }

        .program-info-icon {
            display: inline-flex;
            width: 46px;
            height: 46px;
            align-items: center;
            justify-content: center;
            color: var(--program-accent);
            background: color-mix(in srgb, var(--program-accent) 10%, white);
            border-radius: 14px;
            font-size: 1.25rem;
        }

        .program-cta {
            padding: 2.5rem;
            color: #fff;
            background: linear-gradient(120deg, #0c1e33, #183b65);
            border-radius: 22px;
        }

        @media (max-width: 767.98px) {
            .program-content-section {
                padding: 3rem 0;
            }

            .program-detail-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .program-competency-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                row-gap: 0.5rem;
            }

            .program-competency-card:nth-child(2) {
                border-right: 0;
            }

            .program-competency-card:nth-child(-n+2) {
                border-bottom: 1px solid #dbe5f1;
            }

            .program-gallery-feature {
                height: 250px;
            }

            .program-gallery-page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .program-gallery-hero {
                min-height: 260px;
                padding: 6.5rem 0 3rem;
            }

            .program-gallery-open {
                height: 190px;
            }

            .program-highlight-card {
                padding: 1.5rem;
            }

            .program-cta {
                padding: 1.5rem;
            }
        }

        @media (min-width: 768px) and (max-width: 1199.98px) {
            .program-competency-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                row-gap: 0.5rem;
            }

            .program-competency-card:nth-child(2) {
                border-right: 0;
            }

            .program-competency-card:nth-child(-n+2) {
                border-bottom: 1px solid #dbe5f1;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .program-gallery-card,
            .program-gallery-open img {
                transition: none;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg school-navbar fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('beranda') }}">
                <img src="{{ asset('images/school-logo-2x.png') }}" alt="SMK Gema Cyber School" class="brand-logo-img">
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGema" aria-controls="navbarGema" aria-expanded="false" aria-label="Buka navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarGema">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('beranda') }}">Beranda</a></li>
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
                        <a class="nav-link {{ request()->routeIs('jurusan.*') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Jurusan <i class="bi bi-chevron-down nav-chevron"></i>
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                            @foreach ($programs as $slug => $item)
                                <li><a class="dropdown-item py-2" href="{{ route('jurusan.show', $slug) }}">{{ $item['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link {{ (request()->routeIs('ekstrakurikuler.*') || request()->routeIs('prestasi.*') || request()->routeIs('galeri.*')) ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kegiatan <i class="bi bi-chevron-down nav-chevron"></i>
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0 rounded-3">
                            <li><a class="dropdown-item py-2" href="{{ route('ekstrakurikuler.index') }}">Ekstrakurikuler</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('prestasi.*') ? 'active' : '' }}" href="{{ route('prestasi.index') }}"><i class="bi bi-trophy me-2 text-primary"></i>Prestasi Siswa</a></li>
                            <li><a class="dropdown-item py-2 {{ request()->routeIs('galeri.*') ? 'active' : '' }}" href="{{ route('galeri.index') }}"><i class="bi bi-images me-2 text-success"></i>Galeri Kegiatan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('berita.index') }}">Berita</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('beranda') }}#kontak">Kontak</a></li>
                </ul>
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

    @yield('content')

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

    <footer class="school-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5">
                    <img src="{{ asset('images/school-logo-2x.png') }}" alt="SMK Gema Cyber School" style="height: 38px; filter: brightness(0) invert(1);" class="mb-3">
                    <p class="text-secondary small mb-0">Pendidikan vokasi berkualitas, berkarakter, dan berorientasi pada masa depan.</p>
                </div>
                <div class="col-lg-4">
                    <h5 class="footer-heading">Program Keahlian</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        @foreach ($programs as $slug => $item)
                            <li><a href="{{ route('jurusan.show', $slug) }}">{{ $item['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="footer-heading">Informasi</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ route('profil.tentang') }}">Profil Sekolah</a></li>
                        <li><a href="{{ route('berita.index') }}">Berita & Artikel</a></li>
                        <li><a href="{{ route('beranda') }}#kontak">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; {{ date('Y') }} <strong>SMK Gema Cyber School</strong>. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.school-navbar');
            if (navbar) {
                navbar.classList.toggle('navbar-scrolled', window.scrollY > 15);
            }
        });
    </script>
    @yield('extra_js')
</body>
</html>
