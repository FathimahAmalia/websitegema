@extends('jurusan.layout')

@section('title', 'Prestasi & Rekam Jejak Juara Siswa - SMK Gema Cyber School')
@section('meta_description', 'Dokumentasi prestasi, penghargaan, dan medali kejuaraan siswa-siswi SMK Gema Cyber School di tingkat Kota, Provinsi, hingga Nasional.')

@section('extra_css')
<style>
    /* ==========================================================
       1. HERO SECTION STYLES (PRESTASI & WALL OF FAME)
       ========================================================== */
    .prestasi-hero {
        position: relative;
        display: flex;
        align-items: center;
        min-height: 260px;
        padding: 6.5rem 0 3.25rem;
        background: radial-gradient(circle at 85% 20%, #1e3a8a 0%, #0c1e33 55%, #071220 100%);
        color: #fff;
        overflow: hidden;
    }

    .prestasi-hero-bg-img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center 30%;
        opacity: 0.16;
        mix-blend-mode: luminosity;
    }

    .prestasi-hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(7, 18, 32, 0.94) 0%, rgba(12, 30, 51, 0.88) 50%, rgba(15, 23, 42, 0.82) 100%);
    }

    .prestasi-hero-glow {
        position: absolute;
        top: -15%;
        right: -10%;
        width: 650px;
        height: 650px;
        background: radial-gradient(circle, rgba(245, 158, 11, 0.22) 0%, rgba(37, 99, 235, 0.15) 50%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .prestasi-hero-content {
        position: relative;
        z-index: 2;
    }

    .prestasi-breadcrumb {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.82rem;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 1.25rem;
    }

    .prestasi-breadcrumb a {
        color: #93c5fd;
        text-decoration: none;
        transition: color 0.15s ease;
    }

    .prestasi-breadcrumb a:hover {
        color: #fff;
    }

    .prestasi-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.42rem 1.15rem;
        background: rgba(245, 158, 11, 0.14);
        border: 1px solid rgba(251, 191, 36, 0.4);
        border-radius: 50rem;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        color: #fef08a;
        text-transform: uppercase;
        margin-bottom: 1.25rem;
        backdrop-filter: blur(8px);
    }

    .prestasi-hero-title {
        font-size: clamp(2.3rem, 4.8vw, 3.6rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.035em;
        margin-bottom: 1.15rem;
    }

    .prestasi-hero-title .highlight-gold {
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 50%, #d97706 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .prestasi-hero-desc {
        max-width: 680px;
        font-size: 1.05rem;
        line-height: 1.75;
        color: rgba(255, 255, 255, 0.82);
        margin-bottom: 2rem;
    }

    /* Stats Ribbon */
    .prestasi-stats-bar {
        background: rgba(15, 23, 42, 0.75);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 20px;
        padding: 1.25rem 2rem;
        backdrop-filter: blur(12px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
    }

    .prestasi-stat-item {
        display: flex;
        align-items: center;
        gap: 1.1rem;
    }

    .prestasi-stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .prestasi-stat-val {
        font-size: 1.75rem;
        font-weight: 800;
        line-height: 1.1;
        letter-spacing: -0.02em;
    }

    .prestasi-stat-lbl {
        font-size: 0.78rem;
        font-weight: 600;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* ==========================================================
       2. SPOTLIGHT SHOWCASE BANNER (FEATURED CHAMPION)
       ========================================================== */
    .spotlight-card {
        background: linear-gradient(135deg, #0c1e33 0%, #0f274a 100%);
        border: 1px solid rgba(251, 191, 36, 0.35);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(15, 23, 42, 0.15);
        color: #fff;
        position: relative;
    }

    .spotlight-card::before {
        content: '';
        position: absolute;
        top: -60px;
        right: -60px;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(245, 158, 11, 0.25), transparent 70%);
        pointer-events: none;
    }

    .spotlight-img-wrap {
        height: 100%;
        min-height: 280px;
        position: relative;
        overflow: hidden;
    }

    .spotlight-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .spotlight-img-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, rgba(12, 30, 51, 0.4) 0%, rgba(12, 30, 51, 0.95) 100%);
    }

    @media (max-width: 991.98px) {
        .spotlight-img-overlay {
            background: linear-gradient(180deg, rgba(12, 30, 51, 0.2) 0%, rgba(12, 30, 51, 0.9) 100%);
        }
    }

    /* ==========================================================
       3. FILTER & SEARCH TOOLBAR
       ========================================================== */
    .catalog-header-bar {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 1.25rem 1.5rem;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.04);
        margin-bottom: 2rem;
    }

    .filter-pills-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        align-items: center;
    }

    .filter-pill-btn {
        padding: 0.48rem 1.05rem;
        border-radius: 50rem;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        color: #475569;
        font-size: 0.82rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
    }

    .filter-pill-btn:hover {
        background: #f1f5f9;
        color: #0f172a;
        border-color: #cbd5e1;
    }

    .filter-pill-btn.active {
        background: #2563eb;
        color: #fff;
        border-color: #2563eb;
        box-shadow: 0 4px 14px rgba(37, 99, 235, 0.28);
    }

    .filter-pill-btn .count-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.15rem 0.5rem;
        border-radius: 50rem;
        font-size: 0.72rem;
        background: rgba(0, 0, 0, 0.07);
    }

    .filter-pill-btn.active .count-badge {
        background: rgba(255, 255, 255, 0.25);
        color: #fff;
    }

    .search-input-group {
        position: relative;
    }

    .search-input-group i {
        position: absolute;
        left: 1.15rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 0.95rem;
    }

    .search-input-group input {
        width: 100%;
        padding: 0.65rem 1rem 0.65rem 2.85rem;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 50rem;
        font-size: 0.88rem;
        color: #0f172a;
        transition: all 0.2s ease;
    }

    .search-input-group input:focus {
        background: #fff;
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        outline: none;
    }

    /* Level filter tabs */
    .level-filter-bar {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
        margin-bottom: 1.5rem;
    }

    .level-filter-btn {
        padding: 0.35rem 0.9rem;
        border-radius: 100px;
        font-size: 0.78rem;
        font-weight: 700;
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #64748b;
        cursor: pointer;
        transition: all 0.18s ease;
    }

    .level-filter-btn:hover {
        background: #f1f5f9;
        color: #0f172a;
    }

    .level-filter-btn.active {
        background: #0f172a;
        color: #fff;
        border-color: #0f172a;
    }

    /* ==========================================================
       4. PRESTASI CARDS GRID STYLES
       ========================================================== */
    .prestasi-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease;
        box-shadow: 0 6px 20px rgba(15, 23, 42, 0.035);
    }

    .prestasi-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(15, 23, 42, 0.09);
        border-color: #cbd5e1;
    }

    .prestasi-card-thumb {
        position: relative;
        height: 200px;
        background: #0f172a;
        overflow: hidden;
    }

    .prestasi-card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.45s ease;
    }

    .prestasi-card:hover .prestasi-card-img {
        transform: scale(1.06);
    }

    .prestasi-card-thumb-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(15, 23, 42, 0) 0%, rgba(15, 23, 42, 0.15) 100%);
    }

    .prestasi-card-body {
        padding: 1.4rem 1.5rem 1rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .prestasi-card-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.5rem;
        margin-bottom: 0.75rem;
    }

    .prestasi-badge-level {
        font-size: 0.68rem;
        font-weight: 800;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.3rem 0.65rem;
        border-radius: 50rem;
    }

    .prestasi-card-year {
        font-size: 0.75rem;
        font-weight: 700;
        color: #94a3b8;
    }

    .prestasi-card-title {
        font-size: 1.15rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 0.4rem;
        line-height: 1.35;
        letter-spacing: -0.01em;
    }

    .prestasi-card-event {
        font-size: 0.8rem;
        font-weight: 600;
        color: #2563eb;
        margin-bottom: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.35rem;
    }

    .prestasi-card-desc {
        font-size: 0.86rem;
        line-height: 1.65;
        color: #64748b;
        margin-bottom: 1.2rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex-grow: 1;
    }

    .prestasi-info-box {
        background: #f8fafc;
        border: 1px solid #edf2f7;
        border-radius: 12px;
        padding: 0.75rem 0.9rem;
        font-size: 0.8rem;
        color: #334155;
        margin-bottom: 1rem;
    }

    .prestasi-info-row {
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
        margin-bottom: 0.35rem;
    }

    .prestasi-info-row:last-child {
        margin-bottom: 0;
    }

    .prestasi-info-row i {
        color: #64748b;
        font-size: 0.88rem;
        margin-top: 0.1rem;
        flex-shrink: 0;
    }

    .prestasi-card-footer {
        padding: 1rem 1.5rem 1.35rem;
        border-top: 1px solid #f1f5f9;
        background: #fff;
    }

    .btn-detail-prestasi {
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.62rem 1.15rem;
        background: #2563eb;
        border: 1px solid #2563eb;
        border-radius: 12px;
        color: #fff;
        font-size: 0.84rem;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.22);
        transition: all 0.2s ease;
    }

    .btn-detail-prestasi:hover {
        background: #1d4ed8;
        border-color: #1d4ed8;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.35);
    }

    /* ==========================================================
       5. MODAL DETAIL PRESTASI - PROFESSIONAL UPGRADE
       ========================================================== */
    .prestasi-modal-content {
        border-radius: 26px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 25px 60px -15px rgba(15, 23, 42, 0.25);
        overflow: hidden;
        background: #ffffff;
    }

    .prestasi-modal-cover {
        position: relative;
        height: 250px;
        background: linear-gradient(135deg, #091322 0%, #0c1e33 50%, #172554 100%);
        overflow: hidden;
    }

    .prestasi-modal-cover-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.78;
        transition: opacity 0.3s ease;
    }

    .prestasi-modal-cover-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(7, 18, 32, 0.25) 0%, rgba(12, 30, 51, 0.6) 40%, rgba(7, 18, 32, 0.96) 100%);
    }

    .prestasi-modal-close-btn {
        position: absolute;
        top: 1.15rem;
        right: 1.15rem;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(15, 23, 42, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        cursor: pointer;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        transition: all 0.2s ease;
        z-index: 15;
    }

    .prestasi-modal-close-btn:hover {
        background: rgba(239, 68, 68, 0.9);
        border-color: #ef4444;
        color: #fff;
        transform: rotate(90deg);
    }

    /* Modal Gallery Styles (3 Dokumentasi Gambar) */
    .modal-doc-gallery-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 0.9rem;
    }

    .modal-doc-gallery-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.78rem;
        font-weight: 700;
        padding: 0.35rem 0.85rem;
        border-radius: 50rem;
        background: #eff6ff;
        color: #2563eb;
        border: 1px solid #bfdbfe;
    }

    .doc-photo-card {
        position: relative;
        height: 155px;
        border-radius: 16px;
        overflow: hidden;
        border: 1.5px solid #e2e8f0;
        background: #0f172a;
        box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .doc-photo-card:hover {
        transform: translateY(-3px);
        border-color: #2563eb;
        box-shadow: 0 10px 24px rgba(37, 99, 235, 0.2);
    }

    .doc-photo-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .doc-photo-card:hover img {
        transform: scale(1.08);
    }

    .doc-photo-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(15, 23, 42, 0.15) 0%, rgba(15, 23, 42, 0.8) 100%);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 0.75rem 0.85rem;
    }

    .doc-photo-top-badge {
        align-self: flex-start;
        font-size: 0.65rem;
        font-weight: 800;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.22rem 0.6rem;
        border-radius: 50rem;
        background: rgba(15, 23, 42, 0.8);
        color: #fff;
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255, 255, 255, 0.25);
    }

    .doc-photo-caption {
        font-size: 0.76rem;
        font-weight: 700;
        color: #ffffff;
        margin: 0;
        line-height: 1.3;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .doc-photo-caption i {
        font-size: 0.85rem;
        color: #93c5fd;
        opacity: 0;
        transform: translateX(-4px);
        transition: all 0.2s ease;
    }

    .doc-photo-card:hover .doc-photo-caption i {
        opacity: 1;
        transform: translateX(0);
    }

    /* Modal Meta Card Enhancement */
    .prestasi-modal-meta-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 1rem 1.15rem;
        display: flex;
        align-items: center;
        gap: 0.95rem;
        height: 100%;
        box-shadow: 0 4px 14px rgba(15, 23, 42, 0.035);
        transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .prestasi-modal-meta-card:hover {
        transform: translateY(-2px);
        border-color: #cbd5e1;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.07);
    }

    .prestasi-modal-meta-icon {
        width: 46px;
        height: 46px;
        border-radius: 13px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .prestasi-highlight-item {
        background: #f8fafc;
        border: 1px solid #edf2f7;
        border-radius: 12px;
        padding: 0.8rem 1rem;
        display: flex;
        align-items: flex-start;
        gap: 0.85rem;
        margin-bottom: 0.65rem;
        transition: all 0.18s ease;
    }

    .prestasi-highlight-item:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
    }

    .prestasi-highlight-bullet {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #fef3c7;
        color: #d97706;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        flex-shrink: 0;
        margin-top: 0.1rem;
    }

    /* Empty state */
    .empty-catalog-state {
        padding: 4rem 1.5rem;
        text-align: center;
        background: #fff;
        border: 1px dashed #cbd5e1;
        border-radius: 20px;
    }

    @media (max-width: 767.98px) {
        .prestasi-hero {
            padding: 6.5rem 0 3.5rem;
            min-height: auto;
        }

        .prestasi-hero-title {
            font-size: 2.15rem;
        }

        .prestasi-cta-banner {
            padding: 2.25rem 1.5rem;
        }

        .prestasi-stats-bar {
            padding: 1.25rem;
        }
    }
</style>
@endsection

@section('content')
<main>
    <!-- ==========================================================
         HERO SECTION: PRESTASI & HALL OF FAME
         ========================================================== -->
    <section class="prestasi-hero">
        <img class="prestasi-hero-bg-img" src="{{ asset('images/hero-students-hd.png') }}" alt="Siswa Berprestasi SMK Gema Cyber School" aria-hidden="true">
        <div class="prestasi-hero-overlay"></div>
        <div class="prestasi-hero-glow"></div>

        <div class="container prestasi-hero-content">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <h1 class="prestasi-hero-title mb-0">
                        Tradisi Juara, Dedikasi Tanpa Batas,<br>
                        Raih <span class="highlight-gold">Gelar Bergengsi</span>
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================
         SPOTLIGHT SHOWCASE: PRESTASI UNGGULAN TERKINI
         ========================================================== -->
    <section class="py-5" style="background: #f8fafc;">
        <div class="container py-lg-2">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle rounded-pill px-3 py-1 small fw-bold mb-2">
                        <i class="bi bi-star-fill text-warning me-1"></i> SPOTLIGHT KEJUARAAN 2025
                    </span>
                    <h2 class="h3 fw-bold text-dark m-0">Prestasi Paling Bergengsi Tahun Ini</h2>
                </div>
            </div>

            <div class="spotlight-card">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-5">
                        <div class="spotlight-img-wrap">
                            <img src="{{ asset('images/prestasi/lks-cyber-security.jpg') }}" alt="Juara 1 LKS Nasional Cyber Defense" class="spotlight-img">
                            <div class="spotlight-img-overlay"></div>
                        </div>
                    </div>

                    <div class="col-lg-7 p-4 p-lg-5">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="badge bg-danger rounded-pill px-3 py-1 fw-bold">TINGKAT NASIONAL</span>
                            <span class="badge bg-warning text-dark rounded-pill px-3 py-1 fw-bold">MEDALI EMAS</span>
                            <span class="small text-white-50 ms-auto">Tahun 2025</span>
                        </div>

                        <h3 class="h3 fw-bold text-white mb-2">
                            Juara 1 LKS Tingkat Nasional Bidang Cloud Computing & Cyber Defense
                        </h3>
                        <p class="text-white-50 mb-3" style="font-size: 0.94rem; line-height: 1.7;">
                            Lomba Kompetensi Siswa (LKS) SMK Tingkat Nasional XXXIII 2025 di JCC Senayan, diselenggarakan oleh Pusat Prestasi Nasional Kemendikbudristek RI.
                        </p>

                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <div class="p-3 rounded-3" style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.12);">
                                    <small class="text-warning fw-bold d-block mb-1">Peraih Prestasi</small>
                                    <div class="fw-bold small text-white">Muhammad Farhan Pratama & Tim Cyber Shield (XII TJKT 1)</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-3 rounded-3" style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.12);">
                                    <small class="text-warning fw-bold d-block mb-1">Mentor Pembimbing</small>
                                    <div class="fw-bold small text-white">Dimas Prasetyo, M.Kom & Cisco Networking Academy</div>
                                </div>
                            </div>
                        </div>

                        <button type="button" 
                                class="btn btn-warning rounded-pill px-4 py-2 fw-bold btn-open-modal-prestasi shadow-sm d-inline-flex align-items-center gap-2"
                                data-prestasi-id="1">
                            <i class="bi bi-eye-fill"></i>
                            <span>Lihat Detail Dokumentasi</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================
         SECTION: KATALOG REKAM JEJAK PRESTASI LENGKAP
         ========================================================== -->
    <section class="py-5" id="katalog-prestasi">
        <div class="container py-lg-2">
            <div class="d-flex flex-column flex-lg-row align-items-lg-end justify-content-between gap-3 mb-4">
                <div>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 small fw-bold mb-2">
                        WALL OF FAME VOKASI
                    </span>
                    <h2 class="h2 fw-bold text-dark mt-2 mb-1">
                        Galeri Kejuaraan & Prestasi Siswa
                    </h2>
                    <p class="text-secondary mb-0">
                        Telusuri torehan gelar juara berdasarkan bidang keahlian, cabang kompetisi, maupun tingkatan kejuaraan.
                    </p>
                </div>

                <div class="text-lg-end">
                    <div class="small text-muted fw-bold">
                        Menampilkan <span id="visibleCount" class="text-primary fw-bolder">{{ count($achievements) }}</span> dari {{ count($achievements) }} kejuaraan
                    </div>
                </div>
            </div>

            <!-- Level Filter Bar -->
            <div class="level-filter-bar">
                <span class="small text-muted align-self-center me-2 fw-bold">Filter Tingkat:</span>
                <button type="button" class="level-filter-btn active" data-level="all">Semua Tingkat</button>
                <button type="button" class="level-filter-btn" data-level="nasional">Tingkat Nasional ({{ $levels['nasional']['count'] }})</button>
                <button type="button" class="level-filter-btn" data-level="provinsi">Tingkat Provinsi ({{ $levels['provinsi']['count'] }})</button>
                <button type="button" class="level-filter-btn" data-level="kota">Tingkat Kota ({{ $levels['kota']['count'] }})</button>
            </div>

            <!-- Achievement Cards Grid -->
            <div class="row g-4" id="prestasiCardsContainer">
                @foreach ($achievements as $ach)
                    <div class="col-md-6 col-lg-4 prestasi-card-col"
                         data-category="{{ $ach['category_slug'] }}"
                         data-level="{{ $ach['level_slug'] }}"
                         data-title="{{ strtolower($ach['title']) }}"
                         data-event="{{ strtolower($ach['event']) }}"
                         data-students="{{ strtolower($ach['students']) }}"
                         data-instructor="{{ strtolower($ach['instructor']) }}">
                        
                        <article class="prestasi-card">
                            <div class="prestasi-card-thumb">
                                <img src="{{ asset($ach['image']) }}" alt="{{ $ach['title'] }}" class="prestasi-card-img" loading="lazy">
                                <div class="prestasi-card-thumb-overlay"></div>
                            </div>

                            <div class="prestasi-card-body">
                                <div class="prestasi-card-meta">
                                    <span class="badge bg-{{ $ach['level_badge'] }} prestasi-badge-level">
                                        {{ $ach['level'] }}
                                    </span>
                                    <span class="prestasi-card-year">
                                        <i class="bi bi-calendar3 me-1"></i>{{ $ach['year'] }}
                                    </span>
                                </div>

                                <h3 class="prestasi-card-title">{{ $ach['title'] }}</h3>
                                <div class="prestasi-card-event">
                                    <i class="bi bi-award-fill text-warning"></i>
                                    <span>{{ $ach['event'] }}</span>
                                </div>
                                <p class="prestasi-card-desc">{{ $ach['description'] }}</p>

                                <div class="prestasi-info-box">
                                    <div class="prestasi-info-row">
                                        <i class="bi bi-people-fill text-primary"></i>
                                        <div><strong>Siswa:</strong> {{ $ach['students'] }}</div>
                                    </div>
                                    <div class="prestasi-info-row">
                                        <i class="bi bi-person-badge-fill text-success"></i>
                                        <div><strong>Mentor:</strong> {{ $ach['instructor'] }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="prestasi-card-footer">
                                <button type="button" 
                                        class="btn-detail-prestasi btn-open-modal-prestasi"
                                        data-prestasi-id="{{ $ach['id'] }}"
                                        data-prestasi-title="{{ $ach['title'] }}"
                                        data-prestasi-event="{{ $ach['event'] }}"
                                        data-prestasi-level="{{ $ach['level'] }}"
                                        data-prestasi-badge="{{ $ach['level_badge'] }}"
                                        data-prestasi-year="{{ $ach['year'] }}"
                                        data-prestasi-category="{{ $ach['category'] }}"
                                        data-prestasi-medal="{{ $ach['medal'] }}"
                                        data-prestasi-image="{{ asset($ach['image']) }}"
                                        data-prestasi-students="{{ $ach['students'] }}"
                                        data-prestasi-instructor="{{ $ach['instructor'] }}"
                                        data-prestasi-date="{{ $ach['date'] }}"
                                        data-prestasi-location="{{ $ach['location'] }}"
                                        data-prestasi-organizer="{{ $ach['organizer'] }}"
                                        data-prestasi-desc="{{ $ach['description'] }}"
                                        data-prestasi-highlights="{{ json_encode($ach['highlights']) }}">
                                    <i class="bi bi-file-earmark-text"></i>
                                    <span>Lihat Detail Dokumentasi</span>
                                </button>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            <!-- Empty Search State -->
            <div id="emptyCatalogState" class="empty-catalog-state d-none mt-4">
                <div class="display-6 text-muted mb-3"><i class="bi bi-trophy"></i></div>
                <h4 class="fw-bold text-dark">Data Prestasi Tidak Ditemukan</h4>
                <p class="text-secondary mx-auto" style="max-width: 500px;">
                    Kata kunci atau filter yang Anda pilih tidak cocok dengan data kejuaraan yang ada. Silakan reset filter pencarian Anda.
                </p>
                <button type="button" id="btnResetFilter" class="btn btn-outline-primary rounded-pill px-4 py-2 mt-2 fw-bold">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Reset Filter Pencarian
                </button>
            </div>
        </div>
    </section>
</main>

<!-- ==========================================================
     MODAL DETAIL DOKUMENTASI PRESTASI (PROFESSIONAL & 3 PHOTOS)
     ========================================================== -->
<div class="modal fade" id="modalDetailPrestasi" tabindex="-1" aria-labelledby="modalDetailPrestasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content prestasi-modal-content">
            <!-- Modal Cover Banner -->
            <div class="prestasi-modal-cover">
                <img src="{{ asset('images/prestasi/lks-cyber-security.jpg') }}" alt="Prestasi Detail" class="prestasi-modal-cover-img" id="modalPrestasiImg">
                <div class="prestasi-modal-cover-overlay"></div>
                
                <button type="button" class="prestasi-modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div class="position-absolute bottom-0 start-0 p-4 text-white z-2 w-100 pe-5">
                    <h4 class="fw-bold mb-1 text-white" id="modalPrestasiTitle" style="font-size: 1.35rem; line-height: 1.35;">-</h4>
                    <div class="small text-white-50 d-flex align-items-center gap-1">
                        <i class="bi bi-shield-check text-warning"></i>
                        <span>Diselenggarakan oleh: </span>
                        <strong class="text-white" id="modalPrestasiOrganizer">-</strong>
                    </div>
                </div>
            </div>

            <!-- Modal Body Content -->
            <div class="modal-body p-4">
                <!-- Event & Deskripsi Inovasi -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 text-primary fw-bold small mb-2" id="modalPrestasiEventWrap">
                        <i class="bi bi-award-fill text-warning fs-6"></i>
                        <span id="modalPrestasiEvent" style="font-size: 0.95rem;">-</span>
                    </div>
                    <p class="text-secondary mb-0" id="modalPrestasiDesc" style="line-height: 1.75; font-size: 0.9rem;">-</p>
                </div>

                <!-- 4 Meta Info Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="prestasi-modal-meta-card">
                            <div class="prestasi-modal-meta-icon" style="background: #eff6ff; color: #2563eb;">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div>
                                <small class="text-muted fw-bold d-block text-uppercase" style="font-size: 0.68rem; letter-spacing: 0.05em;">Siswa Peraih Prestasi</small>
                                <div class="fw-bold text-dark small" id="modalPrestasiStudents">-</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="prestasi-modal-meta-card">
                            <div class="prestasi-modal-meta-icon" style="background: #ecfdf5; color: #059669;">
                                <i class="bi bi-person-workspace"></i>
                            </div>
                            <div>
                                <small class="text-muted fw-bold d-block text-uppercase" style="font-size: 0.68rem; letter-spacing: 0.05em;">Guru Pembina / Mentor</small>
                                <div class="fw-bold text-dark small" id="modalPrestasiInstructor">-</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="prestasi-modal-meta-card">
                            <div class="prestasi-modal-meta-icon" style="background: #fef2f2; color: #dc2626;">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <small class="text-muted fw-bold d-block text-uppercase" style="font-size: 0.68rem; letter-spacing: 0.05em;">Lokasi Kejuaraan</small>
                                <div class="fw-bold text-dark small" id="modalPrestasiLocation">-</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="prestasi-modal-meta-card">
                            <div class="prestasi-modal-meta-icon" style="background: #faf5ff; color: #9333ea;">
                                <i class="bi bi-calendar2-check-fill"></i>
                            </div>
                            <div>
                                <small class="text-muted fw-bold d-block text-uppercase" style="font-size: 0.68rem; letter-spacing: 0.05em;">Tanggal Penyelenggaraan</small>
                                <div class="fw-bold text-dark small" id="modalPrestasiDate">-</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3 DOKUMENTASI GAMBAR (NEW SECTION) -->
                <div class="mb-4">
                    <div class="modal-doc-gallery-header">
                        <div class="d-flex align-items-center gap-2">
                            <span class="modal-doc-gallery-badge">
                                <i class="bi bi-camera-fill"></i>
                                <span>Dokumentasi Foto Kejuaraan</span>
                            </span>
                        </div>
                        <span class="small text-muted fw-semibold">
                            Klik foto untuk pratinjau utama
                        </span>
                    </div>

                    <div class="row g-3" id="modalPrestasiGalleryGrid">
                        <!-- Populated with 3 cards dynamically by JS -->
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-light border-0 p-3 px-4 d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4 py-2 btn-sm fw-bold" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra_js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // ==========================================================
        // 1. FILTER CATEGORY, LEVEL & LIVE SEARCH
        // ==========================================================
        const filterCatBtns = document.querySelectorAll('.filter-cat-btn');
        const filterLevelBtns = document.querySelectorAll('.level-filter-btn');
        const searchInput = document.getElementById('prestasiSearchInput');
        const cardCols = document.querySelectorAll('.prestasi-card-col');
        const visibleCountSpan = document.getElementById('visibleCount');
        const emptyState = document.getElementById('emptyCatalogState');
        const btnResetFilter = document.getElementById('btnResetFilter');

        let currentCategory = 'all';
        let currentLevel = 'all';
        let searchQuery = '';

        function updateCatalogView() {
            let visibleCount = 0;

            cardCols.forEach(function (card) {
                const cardCat = card.getAttribute('data-category');
                const cardLevel = card.getAttribute('data-level');
                const cardTitle = card.getAttribute('data-title') || '';
                const cardEvent = card.getAttribute('data-event') || '';
                const cardStudents = card.getAttribute('data-students') || '';
                const cardInstructor = card.getAttribute('data-instructor') || '';

                const matchesCat = (currentCategory === 'all' || cardCat === currentCategory);
                const matchesLevel = (currentLevel === 'all' || cardLevel === currentLevel);
                const matchesSearch = searchQuery === '' || 
                    cardTitle.includes(searchQuery) || 
                    cardEvent.includes(searchQuery) || 
                    cardStudents.includes(searchQuery) || 
                    cardInstructor.includes(searchQuery);

                if (matchesCat && matchesLevel && matchesSearch) {
                    card.classList.remove('d-none');
                    visibleCount++;
                } else {
                    card.classList.add('d-none');
                }
            });

            if (visibleCountSpan) {
                visibleCountSpan.textContent = visibleCount;
            }

            if (emptyState) {
                if (visibleCount === 0) {
                    emptyState.classList.remove('d-none');
                } else {
                    emptyState.classList.add('d-none');
                }
            }
        }

        filterCatBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                filterCatBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentCategory = this.getAttribute('data-category');
                updateCatalogView();
            });
        });

        filterLevelBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                filterLevelBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentLevel = this.getAttribute('data-level');
                updateCatalogView();
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                searchQuery = this.value.trim().toLowerCase();
                updateCatalogView();
            });
        }

        if (btnResetFilter) {
            btnResetFilter.addEventListener('click', function () {
                if (searchInput) searchInput.value = '';
                searchQuery = '';
                currentCategory = 'all';
                currentLevel = 'all';
                filterCatBtns.forEach(b => b.classList.remove('active'));
                if (filterCatBtns[0]) filterCatBtns[0].classList.add('active');
                filterLevelBtns.forEach(b => b.classList.remove('active'));
                if (filterLevelBtns[0]) filterLevelBtns[0].classList.add('active');
                updateCatalogView();
            });
        }

        // ==========================================================
        // 2. MODAL DETAIL PRESTASI POPULATION
        // ==========================================================
        const modalDetailEl = document.getElementById('modalDetailPrestasi');
        const modalDetail = new bootstrap.Modal(modalDetailEl);

        const modalImg = document.getElementById('modalPrestasiImg');
        const modalOrganizer = document.getElementById('modalPrestasiOrganizer');
        const modalTitle = document.getElementById('modalPrestasiTitle');
        const modalEvent = document.getElementById('modalPrestasiEvent');
        const modalDesc = document.getElementById('modalPrestasiDesc');
        const modalStudents = document.getElementById('modalPrestasiStudents');
        const modalInstructor = document.getElementById('modalPrestasiInstructor');
        const modalLocation = document.getElementById('modalPrestasiLocation');
        const modalDate = document.getElementById('modalPrestasiDate');
        const modalGalleryGrid = document.getElementById('modalPrestasiGalleryGrid');
        const modalHighlightsList = document.getElementById('modalPrestasiHighlightsList');

        // Static data lookup for spotlight button
        const allAchievements = @json($achievements);

        document.querySelectorAll('.btn-open-modal-prestasi').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const id = parseInt(this.getAttribute('data-prestasi-id'));
                const ach = allAchievements.find(item => item.id === id);

                if (ach) {
                    if (modalImg) modalImg.src = "{{ asset('') }}" + ach.image;
                    if (modalOrganizer) modalOrganizer.textContent = ach.organizer || 'Kemendikbudristek RI';
                    if (modalTitle) modalTitle.textContent = ach.title;
                    if (modalEvent) modalEvent.textContent = ach.event;
                    if (modalDesc) modalDesc.textContent = ach.description;
                    if (modalStudents) modalStudents.textContent = ach.students;
                    if (modalInstructor) modalInstructor.textContent = ach.instructor;
                    if (modalLocation) modalLocation.textContent = ach.location;
                    if (modalDate) modalDate.textContent = ach.date;

                    // Populate 3 Documentation Photos
                    if (modalGalleryGrid) {
                        modalGalleryGrid.innerHTML = '';
                        const galleryItems = ach.gallery || [
                            { image: ach.image, title: 'Dokumentasi Aksi Lomba', badge: 'Babak Final' },
                            { image: 'images/prestasi/doc-podium.jpg', title: 'Penganugerahan Medali & Trofi', badge: 'Podium Juara' },
                            { image: 'images/prestasi/doc-award.jpg', title: 'Piagam Penghargaan Resmi', badge: 'Sertifikat' }
                        ];

                        galleryItems.forEach(function (photo, idx) {
                            const col = document.createElement('div');
                            col.className = 'col-md-4';
                            col.innerHTML = `
                                <div class="doc-photo-card" title="Klik untuk jadikan pratinjau utama">
                                    <img src="{{ asset('') }}${photo.image}" alt="${photo.title}" loading="lazy">
                                    <div class="doc-photo-overlay">
                                        <span class="doc-photo-top-badge">${photo.badge || 'Dokumentasi ' + (idx + 1)}</span>
                                        <div class="doc-photo-caption">
                                            <span>${photo.title}</span>
                                            <i class="bi bi-arrows-fullscreen"></i>
                                        </div>
                                    </div>
                                </div>
                            `;
                            const card = col.querySelector('.doc-photo-card');
                            card.addEventListener('click', function () {
                                if (modalImg) {
                                    modalImg.style.opacity = '0.2';
                                    setTimeout(function () {
                                        modalImg.src = "{{ asset('') }}" + photo.image;
                                        modalImg.style.opacity = '0.78';
                                    }, 140);
                                }
                            });
                            modalGalleryGrid.appendChild(col);
                        });
                    }

                    modalDetail.show();
                }
            });
        });
    });
</script>
@endsection
