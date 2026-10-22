<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Daftar sarana, prasarana, dan fasilitas laboratorium praktik di SMK Gema Cyber School.">
    
    <title>Fasilitas Sekolah - SMK Gema Cyber School</title>

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

    <style>
        /* Desain Humanis & Realistis Khas Sekolah Indonesia */
        .facility-simple-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e9edf2;
            padding: 2.5rem 0 2rem 0;
        }

        .facility-tab-btn {
            background: transparent;
            border: 1px solid #d1d5db;
            color: #4b5563;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 7px 18px;
            border-radius: 8px;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .facility-tab-btn:hover {
            background-color: #f3f4f6;
            color: #111827;
        }

        .facility-tab-btn.active {
            background-color: var(--gema-primary);
            color: #ffffff;
            border-color: var(--gema-primary);
        }

        /* Card Fasilitas Bersih & Alami (Tanpa Gaya AI Berlebihan) */
        .real-facility-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .real-facility-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
            border-color: #cbd5e1;
        }

        .real-facility-thumb {
            height: 200px;
            width: 100%;
            position: relative;
            background-color: #f1f5f9;
            overflow: hidden;
        }

        .real-facility-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .real-facility-loc {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(17, 24, 39, 0.85);
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .real-facility-body {
            padding: 1.25rem 1.25rem 1.15rem 1.25rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .real-facility-title {
            font-size: 1.08rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 0.5rem;
            line-height: 1.35;
        }

        .real-facility-desc {
            font-size: 0.85rem;
            color: #4b5563;
            line-height: 1.55;
            margin-bottom: 1rem;
        }

        /* Tabel Ringkas Spesifikasi Realistis */
        .facility-info-table {
            background-color: #f9fafb;
            border: 1px solid #f3f4f6;
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 0.8rem;
            margin-bottom: 1rem;
            margin-top: auto;
        }

        .facility-info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 4px 0;
            border-bottom: 1px dashed #e5e7eb;
        }

        .facility-info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .facility-info-label {
            color: #6b7280;
            font-weight: 500;
        }

        .facility-info-val {
            color: #111827;
            font-weight: 600;
            text-align: right;
        }

        .real-facility-footer {
            border-top: 1px solid #f3f4f6;
            padding-top: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.78rem;
            color: #6b7280;
        }

        /* Box Informasi Kunjungan Kampus yang Sederhana & Formal */
        .school-notice-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: 4px solid var(--gema-primary);
            border-radius: 12px;
            padding: 1.5rem 1.75rem;
            margin-top: 3.5rem;
        }
    </style>
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
                            <li><a class="dropdown-item py-2" href="{{ route('beranda') }}#ekskul">Ekstrakurikuler</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('beranda') }}#prestasi">Prestasi Siswa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beranda') }}#berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold text-primary" href="{{ route('profil.fasilitas') }}">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beranda') }}#galeri">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beranda') }}#kontak">Kontak</a>
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
         PAGE HEADER BERSIH & FORMAL (BUKAN BANNER AI)
         ========================================== -->
    <header class="facility-simple-header">
        <div class="container">
            <!-- Breadcrumbs Formal -->
            <nav aria-label="breadcrumb" class="mb-2">
                <ol class="breadcrumb small m-0 text-secondary">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none text-secondary">Beranda</a></li>
                    <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">Fasilitas Sekolah</li>
                </ol>
            </nav>

            <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
                <div>
                    <h1 class="fw-bold text-dark mb-2" style="font-size: 1.85rem; letter-spacing: -0.3px;">
                        Fasilitas Sekolah & Laboratorium Praktik
                    </h1>
                    <p class="text-secondary m-0" style="font-size: 0.95rem; max-width: 740px; line-height: 1.6;">
                        SMK Gema Cyber School menyediakan sarana dan prasarana belajar yang lengkap guna mendukung kegiatan pembelajaran teori maupun praktikum kejuruan siswa di sekolah.
                    </p>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-light text-secondary border px-3 py-2 rounded-2 small fw-semibold">
                        <i class="bi bi-building-check text-primary me-1"></i> Gedung Milik Sendiri
                    </span>
                    <span class="badge bg-light text-secondary border px-3 py-2 rounded-2 small fw-semibold">
                        <i class="bi bi-shield-check text-success me-1"></i> Terakreditasi A
                    </span>
                </div>
            </div>

            <!-- Filter Kategori Sederhana & Rapi -->
            <div class="d-flex flex-wrap gap-2 pt-3 border-top">
                <button type="button" class="facility-tab-btn active" onclick="filterFacility('all', this)">Semua Fasilitas</button>
                <button type="button" class="facility-tab-btn" onclick="filterFacility('lab-komputer', this)">Lab Komputer & Coding</button>
                <button type="button" class="facility-tab-btn" onclick="filterFacility('lab-jaringan', this)">Lab Jaringan (TJKT)</button>
                <button type="button" class="facility-tab-btn" onclick="filterFacility('lab-akuntansi', this)">Mini Bank (AKL)</button>
                <button type="button" class="facility-tab-btn" onclick="filterFacility('lab-logistik', this)">Ruang Logistik</button>
                <button type="button" class="facility-tab-btn" onclick="filterFacility('kelas-umum', this)">Ruang Kelas & Perpustakaan</button>
            </div>
        </div>
    </header>

    <!-- ==========================================
         KONTEN UTAMA: GRID FASILITAS REALISTIS
         ========================================== -->
    <main class="py-4" style="background-color: #fafbfc;">
        <div class="container">
            <div class="row g-4" id="facilityGrid">

                <!-- 1. Laboratorium Komputer -->
                <div class="col-lg-4 col-md-6 facility-item" data-cat="lab-komputer">
                    <div class="real-facility-card">
                        <div class="real-facility-thumb">
                            <img src="{{ asset('images/fasilitas-lab-komputer-2x.png') }}" alt="Laboratorium Komputer" class="real-facility-img">
                            <div class="real-facility-loc">
                                <i class="bi bi-geo-alt-fill"></i> Gedung A • Lantai 2
                            </div>
                        </div>
                        <div class="real-facility-body">
                            <h3 class="real-facility-title">Laboratorium Komputer & Coding</h3>
                            <p class="real-facility-desc">
                                Digunakan untuk pembelajaran pemrograman, desain grafis, multimedia, serta pelaksanaan Ujian Asesmen Nasional Berbasis Komputer (ANBK).
                            </p>

                            <!-- Data Praktis Spesifikasi -->
                            <div class="facility-info-table">
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Kapasitas</span>
                                    <span class="facility-info-val">40 Siswa (1 Siswa 1 PC)</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Spesifikasi Unit</span>
                                    <span class="facility-info-val">Core i7, RAM 16GB, SSD</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Fasilitas Ruangan</span>
                                    <span class="facility-info-val">Full AC, LCD Proyektor, Gigabit LAN</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Kepala Lab</span>
                                    <span class="facility-info-val">Siti Rahmawati, M.Kom</span>
                                </div>
                            </div>

                            <div class="real-facility-footer">
                                <span><i class="bi bi-check-circle-fill text-success me-1"></i>Kondisi Prima</span>
                                <span class="text-primary fw-semibold">Jadwal: KBM & Praktik</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Laboratorium Jaringan & Server -->
                <div class="col-lg-4 col-md-6 facility-item" data-cat="lab-jaringan">
                    <div class="real-facility-card">
                        <div class="real-facility-thumb">
                            <img src="{{ asset('images/fasilitas-lab-jaringan-2x.png') }}" alt="Laboratorium Jaringan" class="real-facility-img">
                            <div class="real-facility-loc">
                                <i class="bi bi-geo-alt-fill"></i> Gedung B • Lantai 2
                            </div>
                        </div>
                        <div class="real-facility-body">
                            <h3 class="real-facility-title">Laboratorium Jaringan & Server (TJKT)</h3>
                            <p class="real-facility-desc">
                                Tempat praktikum perakitan komputer, instalasi jaringan kabel & nirkabel, konfigurasi server, serta penyambungan kabel fiber optic.
                            </p>

                            <!-- Data Praktis Spesifikasi -->
                            <div class="facility-info-table">
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Perangkat Utama</span>
                                    <span class="facility-info-val">Rack Server 42U, Switch Cisco</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Alat Fiber Optic</span>
                                    <span class="facility-info-val">Fusion Splicer & OTDR</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Kerjasama Resmi</span>
                                    <span class="facility-info-val">Cisco Academy & MikroTik</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Kepala Lab</span>
                                    <span class="facility-info-val">Fajar Nugroho, S.Kom</span>
                                </div>
                            </div>

                            <div class="real-facility-footer">
                                <span><i class="bi bi-check-circle-fill text-success me-1"></i>Standar LSP / UKK</span>
                                <span class="text-primary fw-semibold">Jurusan TJKT</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Mini Bank & Lab Praktik Akuntansi -->
                <div class="col-lg-4 col-md-6 facility-item" data-cat="lab-akuntansi">
                    <div class="real-facility-card">
                        <div class="real-facility-thumb">
                            <img src="{{ asset('images/fasilitas-praktik-akuntansi-2x.png') }}" alt="Mini Bank Sekolah" class="real-facility-img">
                            <div class="real-facility-loc">
                                <i class="bi bi-geo-alt-fill"></i> Gedung A • Lantai 1
                            </div>
                        </div>
                        <div class="real-facility-body">
                            <h3 class="real-facility-title">Mini Bank & Lab Praktik Akuntansi</h3>
                            <p class="real-facility-desc">
                                Ruang simulasi kerja operasional teller perbankan, customer service, administrasi kas, dan pembukuan keuangan berbasis software.
                            </p>

                            <!-- Data Praktis Spesifikasi -->
                            <div class="facility-info-table">
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Fasilitas Mini Bank</span>
                                    <span class="facility-info-val">2 Loket Teller, Meja CS, Antrean</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Peralatan Kasir</span>
                                    <span class="facility-info-val">Mesin Hitung Uang, Detektor UV</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Software Praktik</span>
                                    <span class="facility-info-val">Accurate Online & MYOB</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Kepala Lab</span>
                                    <span class="facility-info-val">Nur Hidayah, S.E, M.Ak</span>
                                </div>
                            </div>

                            <div class="real-facility-footer">
                                <span><i class="bi bi-check-circle-fill text-success me-1"></i>Pelayanan Kas Siswa</span>
                                <span class="text-primary fw-semibold">Jurusan AKL</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Ruang Praktik Manajemen Logistik -->
                <div class="col-lg-4 col-md-6 facility-item" data-cat="lab-logistik">
                    <div class="real-facility-card">
                        <div class="real-facility-thumb">
                            <img src="{{ asset('images/fasilitas-ruang-logistik-2x.png') }}" alt="Ruang Praktik Logistik" class="real-facility-img">
                            <div class="real-facility-loc">
                                <i class="bi bi-geo-alt-fill"></i> Gedung C • Lantai 1
                            </div>
                        </div>
                        <div class="real-facility-body">
                            <h3 class="real-facility-title">Pusat Mockup Warehouse & Logistik</h3>
                            <p class="real-facility-desc">
                                Sarana praktik penataan rak gudang, penerimaan dan pengecekan barang (inbound/outbound), stock opname, dan pengemasan kargo.
                            </p>

                            <!-- Data Praktis Spesifikasi -->
                            <div class="facility-info-table">
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Model Pergudangan</span>
                                    <span class="facility-info-val">Rak Pallet 3 Susun, Area Staging</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Peralatan Gudang</span>
                                    <span class="facility-info-val">Hand Pallet 2 Ton, Barcode Scanner</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Aplikasi Praktik</span>
                                    <span class="facility-info-val">Sistem Manajemen Gudang (WMS)</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Kepala Lab</span>
                                    <span class="facility-info-val">Dimas Wahyu, S.Log</span>
                                </div>
                            </div>

                            <div class="real-facility-footer">
                                <span><i class="bi bi-check-circle-fill text-success me-1"></i>Simulasi Standar Industri</span>
                                <span class="text-primary fw-semibold">Jurusan Logistik</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Ruang Kelas Teori Ber-AC -->
                <div class="col-lg-4 col-md-6 facility-item" data-cat="kelas-umum">
                    <div class="real-facility-card">
                        <div class="real-facility-thumb">
                            <img src="{{ asset('images/fasilitas-kelas-modern-2x.png') }}" alt="Ruang Kelas Teori" class="real-facility-img">
                            <div class="real-facility-loc">
                                <i class="bi bi-geo-alt-fill"></i> Gedung A & B • Lantai 1-3
                            </div>
                        </div>
                        <div class="real-facility-body">
                            <h3 class="real-facility-title">Ruang Kelas Teori Ber-AC</h3>
                            <p class="real-facility-desc">
                                Ruang kelas belajar harian dengan pendingin ruangan, ventilasi cahaya alami yang baik, serta fasilitas layar TV interaktif untuk presentasi.
                            </p>

                            <!-- Data Praktis Spesifikasi -->
                            <div class="facility-info-table">
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Jumlah Ruang</span>
                                    <span class="facility-info-val">18 Ruang Kelas Reguler</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Kapasitas Kelas</span>
                                    <span class="facility-info-val">32 - 36 Siswa per Rombel</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Fasilitas</span>
                                    <span class="facility-info-val">AC Split, Smart TV 65", WiFi</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Pengelolaan</span>
                                    <span class="facility-info-val">Waka Sarana Prasarana</span>
                                </div>
                            </div>

                            <div class="real-facility-footer">
                                <span><i class="bi bi-check-circle-fill text-success me-1"></i>Bersih & Nyaman</span>
                                <span class="text-primary fw-semibold">Semua Rombel</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Perpustakaan & Ruang Baca -->
                <div class="col-lg-4 col-md-6 facility-item" data-cat="kelas-umum">
                    <div class="real-facility-card">
                        <div class="real-facility-thumb">
                            <img src="{{ asset('images/fasilitas-perpustakaan-2x.png') }}" alt="Perpustakaan Sekolah" class="real-facility-img">
                            <div class="real-facility-loc">
                                <i class="bi bi-geo-alt-fill"></i> Gedung Utama • Lantai 2
                            </div>
                        </div>
                        <div class="real-facility-body">
                            <h3 class="real-facility-title">Perpustakaan & Ruang Baca Siswa</h3>
                            <p class="real-facility-desc">
                                Pusat referensi belajar siswa yang menyediakan buku teks pelajaran Kurikulum Merdeka, koleksi fiksi, majalah kejuruan, dan terminal e-library.
                            </p>

                            <!-- Data Praktis Spesifikasi -->
                            <div class="facility-info-table">
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Koleksi Buku</span>
                                    <span class="facility-info-val">5.000+ Judul Buku & E-Book</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Komputer Riset</span>
                                    <span class="facility-info-val">10 Unit PC Pencarian Digital</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Area Baca</span>
                                    <span class="facility-info-val">Ruang Karpet Lesehan & Meja Baca</span>
                                </div>
                                <div class="facility-info-row">
                                    <span class="facility-info-label">Kepala Perpustakaan</span>
                                    <span class="facility-info-val">Dewi Sartika, S.Sos</span>
                                </div>
                            </div>

                            <div class="real-facility-footer">
                                <span><i class="bi bi-clock-history me-1"></i>Senin - Jumat (07.30 - 15.00)</span>
                                <span class="text-primary fw-semibold">Terbuka untuk Siswa</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ==========================================
                 SARANA PENDUKUNG UMUM SEKOLAH
                 ========================================== -->
            <div class="mt-5 pt-3 border-top">
                <h4 class="fw-bold text-dark mb-3" style="font-size: 1.25rem;">Sarana Pendukung Sekolah Lainnya</h4>
                <div class="row g-3">
                    <div class="col-md-3 col-sm-6">
                        <div class="p-3 bg-white border rounded-3 h-100">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-trophy-fill text-primary fs-5"></i>
                                <span class="fw-bold text-dark small">Lapangan Olahraga</span>
                            </div>
                            <p class="text-secondary small mb-0" style="font-size: 0.8rem;">
                                Lapangan serbaguna untuk upacara bendera, futsal, bola basket, dan bola voli.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="p-3 bg-white border rounded-3 h-100">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-moon-stars-fill text-success fs-5"></i>
                                <span class="fw-bold text-dark small">Musholla Sekolah</span>
                            </div>
                            <p class="text-secondary small mb-0" style="font-size: 0.8rem;">
                                Tempat ibadah shalat berjamaah, pembinaan rohani Islam, dan kegiatan keagamaan siswa.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="p-3 bg-white border rounded-3 h-100">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-heart-pulse-fill text-danger fs-5"></i>
                                <span class="fw-bold text-dark small">Ruang UKS & Konseling</span>
                            </div>
                            <p class="text-secondary small mb-0" style="font-size: 0.8rem;">
                                Pelayanan kesehatan pertama bagi siswa sakit serta ruang bimbingan konseling (BK).
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="p-3 bg-white border rounded-3 h-100">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-shop text-warning fs-5"></i>
                                <span class="fw-bold text-dark small">Kantin & Koperasi</span>
                            </div>
                            <p class="text-secondary small mb-0" style="font-size: 0.8rem;">
                                Kantin sehat higienis dan koperasi penyedia seragam serta perlengkapan alat tulis siswa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ==========================================
                 INFORMASI KUNJUNGAN KAMPUS (FORMAL & RAPI)
                 ========================================== -->
            <div class="school-notice-box">
                <div class="row align-items-center g-3">
                    <div class="col-lg-8">
                        <h5 class="fw-bold text-dark mb-1">Ingin Melihat Langsung Fasilitas SMK Gema Cyber School?</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.6;">
                            Calon peserta didik baru dan orang tua dipersilakan berkunjung ke kampus pada jam kerja sekolah (Senin - Jumat, pukul 08.00 - 15.00 WIB) untuk melihat ruang kelas, laboratorium, dan lingkungan belajar.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="https://wa.me/6281234567890?text=Halo%20SMK%20Gema%20Cyber%20School,%20saya%20ingin%20berkunjung%20melihat%20fasilitas%20sekolah" target="_blank" class="btn btn-primary rounded-pill px-4 py-2 small fw-bold">
                            <i class="bi bi-whatsapp me-1"></i> Hubungi Tata Usaha (WA)
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
                        <li><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li><a href="{{ route('profil.tentang') }}">Profil Sekolah</a></li>
                        <li><a href="{{ route('profil.visi-misi') }}">Visi & Misi</a></li>
                        <li><a href="{{ route('profil.struktur') }}">Struktur Organisasi</a></li>
                        <li><a href="{{ route('profil.fasilitas') }}">Fasilitas Kampus</a></li>
                        <li><a href="{{ route('beranda') }}#ppdb">Pendaftaran PPDB</a></li>
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

    <!-- Filter Fasilitas & Scroll Navbar Script -->
    <script>
        function filterFacility(category, btn) {
            document.querySelectorAll('.facility-tab-btn').forEach(b => b.classList.remove('active'));
            if (btn) btn.classList.add('active');

            const items = document.querySelectorAll('.facility-item');
            items.forEach(item => {
                if (category === 'all' || item.getAttribute('data-cat') === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

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
