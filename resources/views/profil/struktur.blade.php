@extends('profil.layout')

@section('title', 'Struktur Organisasi & Dewan Guru')
@section('breadcrumb_active', 'Struktur Organisasi')
@section('banner_badge', 'BAGAN TATA KELOLA • MANAJEMEN SEKOLAH')
@section('banner_title')
    Struktur Organisasi & <span style="color: #60a5fa;">Dewan Guru</span>
@endsection
@section('banner_desc', 'Bagan Tata Kelola, Manajemen Kepemimpinan, dan Direktori Tenaga Pendidik Profesional SMK Gema Cyber School.')

@section('profile_content')
    <div class="profile-card">
        <!-- Header & Nav Tabs -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 pb-3 mb-4 border-bottom">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 small fw-bold">
                        <i class="bi bi-shield-check me-1"></i>Akuntabel & Profesional
                    </span>
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-1 small fw-semibold">
                        Periode 2024 - 2027
                    </span>
                </div>
                <h4 class="fw-bold text-dark m-0" style="font-size: 1.35rem; letter-spacing: -0.3px;">
                    Struktur Kepemimpinan & Pendidik Sekolah
                </h4>
            </div>

            <!-- Tab Switcher (Bagan Hierarki vs Direktori Guru) -->
            <div class="p-1 rounded-pill bg-light border d-inline-flex gap-1">
                <button type="button" class="structure-tab-btn active" id="tab-bagan-btn" onclick="switchStructureView('bagan')">
                    <i class="bi bi-diagram-3-fill"></i>
                    <span>Bagan Hierarki</span>
                </button>
                <button type="button" class="structure-tab-btn" id="tab-guru-btn" onclick="switchStructureView('guru')">
                    <i class="bi bi-people-fill"></i>
                    <span>Direktori Dewan Guru (12+)</span>
                </button>
            </div>
        </div>

        <!-- ==========================================
             VIEW 1: BAGAN STRUKTUR HIERARKI (TREE VIEW)
             ========================================== -->
        <div id="view-bagan-hierarki">
            <p class="text-secondary small mb-4 text-center mx-auto" style="max-width: 680px; line-height: 1.65;">
                Bagan kepemimpinan SMK Gema Cyber School menerapkan tata kelola kolaboratif berbasis akuntabilitas mutu vokasi, menjamin sinergi antara kurikulum industri, pembinaan kesiswaan, kemitraan DUDI, dan pemenuhan sarana pembelajaran modern.
            </p>

            <div class="org-chart-wrapper text-center">
                
                <!-- LEVEL 1: Yayasan / Komite Sekolah -->
                <div class="org-level-box">
                    <div class="org-card-yayasan">
                        <div class="d-flex align-items-center gap-3 justify-content-center">
                            <div class="rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-bank2 fs-5"></i>
                            </div>
                            <div class="text-start">
                                <span class="badge bg-light text-secondary border px-2 py-0 small mb-1" style="font-size: 0.65rem;">BADAN PENYELENGGARA & PENGAWAS</span>
                                <div class="fw-bold text-dark small" style="font-size: 0.92rem;">Yayasan Pendidikan Cyber Nusantara</div>
                                <div class="text-secondary" style="font-size: 0.72rem;">Komite Sekolah & Dewan Penasihat Independen</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vertical Stem Down to Kepsek -->
                <div class="tier-stem-line"></div>
                <div class="tier-stem-arrow"><i class="bi bi-chevron-down"></i></div>

                <!-- LEVEL 2: Kepala Sekolah (Leader Node) -->
                <div class="org-level-box d-flex justify-content-center">
                    <div class="org-card-kepsek">
                        <img src="{{ asset('images/profile-kepsek-2x.png') }}" alt="Drs. Ahmad Rudianto, M.Pd" class="org-kepsek-thumb">
                        <div>
                            <span class="badge bg-primary text-white rounded-pill px-2 py-1 mb-1 fw-bold" style="font-size: 0.68rem; letter-spacing: 0.5px;">KEPALA SEKOLAH</span>
                            <div class="fw-bold text-dark" style="font-size: 1.05rem;">Drs. Ahmad Rudianto, M.Pd</div>
                            <div class="text-secondary small" style="font-size: 0.75rem;">NIP. 19740512 199903 1 004</div>
                            <div class="text-primary fw-semibold" style="font-size: 0.74rem;">Penanggung Jawab Mutu & Tata Kelola Sekolah</div>
                        </div>
                    </div>
                </div>

                <!-- Vertical Stem Down to Waka Branch -->
                <div class="tier-stem-line"></div>
                <div class="tier-stem-arrow"><i class="bi bi-chevron-down"></i></div>

                <!-- Label: WAKIL KEPALA SEKOLAH -->
                <div class="text-center mb-1">
                    <span class="tier-header-badge">
                        <i class="bi bi-diagram-2-fill text-primary me-1"></i> WAKIL KEPALA SEKOLAH (WAKA)
                    </span>
                </div>

                <!-- Tree Branch Connector Bar (Dedicated Container: Never Intersects With Labels!) -->
                <div class="tree-branch-container d-none d-md-block">
                    <div class="tree-branch-stem-top"></div>
                    <div class="tree-branch-bar">
                        <div class="tree-branch-drop drop-1"></div>
                        <div class="tree-branch-drop drop-2"></div>
                        <div class="tree-branch-drop drop-3"></div>
                        <div class="tree-branch-drop drop-4"></div>
                    </div>
                </div>

                <!-- LEVEL 3: 4 WAKA CARDS (Uniform & Clean) -->
                <div class="row g-3 justify-content-center mb-4">
                    <!-- Waka 1: Kurikulum -->
                    <div class="col-md-3 col-sm-6">
                        <div class="org-person-card border-theme-blue">
                            <img src="{{ asset('images/teachers/guru-siti-rahmawati.png') }}" alt="Siti Rahmawati, M.Kom" class="org-person-avatar">
                            <span class="org-role-badge bg-primary-subtle text-primary">Waka Kurikulum</span>
                            <div class="org-person-name">Siti Rahmawati, M.Kom</div>
                            <div class="org-person-subtitle">Bidang Akademik & Pembelajaran</div>
                            <div class="card-tupoksi-box">
                                Kurikulum Merdeka • Jadwal KBM • Supervisi
                            </div>
                        </div>
                    </div>

                    <!-- Waka 2: Kesiswaan -->
                    <div class="col-md-3 col-sm-6">
                        <div class="org-person-card border-theme-green">
                            <img src="{{ asset('images/teachers/guru-budi-santoso.png') }}" alt="Budi Santoso, S.Pd" class="org-person-avatar">
                            <span class="org-role-badge bg-success-subtle text-success">Waka Kesiswaan</span>
                            <div class="org-person-name">Budi Santoso, S.Pd</div>
                            <div class="org-person-subtitle">Bidang Karakter & Kedisiplinan</div>
                            <div class="card-tupoksi-box">
                                Karakter & Disiplin • OSIS & Ekskul
                            </div>
                        </div>
                    </div>

                    <!-- Waka 3: Hubin / DUDI -->
                    <div class="col-md-3 col-sm-6">
                        <div class="org-person-card border-theme-amber">
                            <img src="{{ asset('images/teachers/guru-hendra-gunawan.png') }}" alt="Ir. Hendra Gunawan" class="org-person-avatar">
                            <span class="org-role-badge bg-warning-subtle text-warning">Waka Hubin / DUDI</span>
                            <div class="org-person-name">Ir. Hendra Gunawan</div>
                            <div class="org-person-subtitle">Hubungan Industri & Kerjasama</div>
                            <div class="card-tupoksi-box">
                                Kemitraan DUDI • Prakerin PKL • BKK
                            </div>
                        </div>
                    </div>

                    <!-- Waka 4: Sarana Prasarana -->
                    <div class="col-md-3 col-sm-6">
                        <div class="org-person-card border-theme-purple">
                            <img src="{{ asset('images/teachers/guru-agus-prasetyo.png') }}" alt="Agus Prasetyo, S.T" class="org-person-avatar">
                            <span class="org-role-badge" style="background-color: #f5f3ff; color: #8b5cf6;">Waka Sarpras</span>
                            <div class="org-person-name">Agus Prasetyo, S.T</div>
                            <div class="org-person-subtitle">Fasilitas, Lab & Infrastruktur</div>
                            <div class="card-tupoksi-box">
                                Lab Komputer • Sarana KBM • Gedung
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vertical Stem Down to Kaprog Branch -->
                <div class="tier-stem-line"></div>
                <div class="tier-stem-arrow"><i class="bi bi-chevron-down"></i></div>

                <!-- Label: KETUA PROGRAM KEAHLIAN -->
                <div class="text-center mb-1">
                    <span class="tier-header-badge">
                        <i class="bi bi-grid-fill text-primary me-1"></i> KETUA PROGRAM KEAHLIAN (KAPROG)
                    </span>
                </div>

                <!-- Tree Branch Connector Bar for Kaprog -->
                <div class="tree-branch-container d-none d-md-block">
                    <div class="tree-branch-stem-top"></div>
                    <div class="tree-branch-bar">
                        <div class="tree-branch-drop drop-1"></div>
                        <div class="tree-branch-drop drop-2"></div>
                        <div class="tree-branch-drop drop-3"></div>
                        <div class="tree-branch-drop drop-4"></div>
                    </div>
                </div>

                <!-- LEVEL 4: 4 KAPROG CARDS (Uniform & Clean) -->
                <div class="row g-3 justify-content-center">
                    <!-- Kaprog 1: TJKT -->
                    <div class="col-md-3 col-sm-6">
                        <div class="org-person-card border-theme-blue">
                            <img src="{{ asset('images/teachers/guru-fajar-nugroho.png') }}" alt="Fajar Nugroho, S.Kom" class="org-person-avatar">
                            <span class="org-role-badge badge-tjkt text-white">Kaprog TJKT</span>
                            <div class="org-person-name">Fajar Nugroho, S.Kom</div>
                            <div class="org-person-subtitle">Teknik Jaringan Komputer</div>
                            <div class="card-tupoksi-box">
                                Cisco & MikroTik • Fiber Optic • Cloud
                            </div>
                        </div>
                    </div>

                    <!-- Kaprog 2: AKL -->
                    <div class="col-md-3 col-sm-6">
                        <div class="org-person-card border-theme-green">
                            <img src="{{ asset('images/teachers/guru-nur-hidayah.png') }}" alt="Nur Hidayah, S.E, M.Ak" class="org-person-avatar">
                            <span class="org-role-badge badge-akl text-white">Kaprog AKL</span>
                            <div class="org-person-name">Nur Hidayah, S.E, M.Ak</div>
                            <div class="org-person-subtitle">Akuntansi & Keuangan Lembaga</div>
                            <div class="card-tupoksi-box">
                                Accurate Online • Perbankan • Pajak
                            </div>
                        </div>
                    </div>

                    <!-- Kaprog 3: MPLB -->
                    <div class="col-md-3 col-sm-6">
                        <div class="org-person-card border-theme-orange">
                            <img src="{{ asset('images/teachers/guru-dewi-sartika.png') }}" alt="Dewi Sartika, S.Sos" class="org-person-avatar">
                            <span class="org-role-badge badge-mplb text-white">Kaprog MPLB</span>
                            <div class="org-person-name">Dewi Sartika, S.Sos</div>
                            <div class="org-person-subtitle">Manajemen Perkantoran</div>
                            <div class="card-tupoksi-box">
                                Smart Office • E-Arsip • Komunikasi
                            </div>
                        </div>
                    </div>

                    <!-- Kaprog 4: Logistik -->
                    <div class="col-md-3 col-sm-6">
                        <div class="org-person-card border-theme-purple">
                            <img src="{{ asset('images/teachers/guru-dimas-wahyu.png') }}" alt="Dimas Wahyu, S.Log" class="org-person-avatar">
                            <span class="org-role-badge badge-logistik text-white">Kaprog Logistik</span>
                            <div class="org-person-name">Dimas Wahyu, S.Log</div>
                            <div class="org-person-subtitle">Teknik Manajemen Logistik</div>
                            <div class="card-tupoksi-box">
                                Supply Chain • Warehouse • Distribusi
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ==========================================
             VIEW 2: DIREKTORI DEWAN GURU (TEACHER DIRECTORY)
             ========================================== -->
        <div id="view-direktori-guru" style="display: none;">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                <p class="text-secondary small m-0" style="font-size: 0.85rem;">
                    Daftar tenaga pendidik profesional bersertifikasi kompetensi dan berdedikasi tinggi di SMK Gema Cyber School:
                </p>
                <div class="d-flex flex-wrap gap-1">
                    <button type="button" class="teacher-filter-btn active" onclick="filterTeachers('all', this)">Semua Guru (12)</button>
                    <button type="button" class="teacher-filter-btn" onclick="filterTeachers('pimpinan', this)">Pimpinan & Waka</button>
                    <button type="button" class="teacher-filter-btn" onclick="filterTeachers('tjkt', this)">Guru TJKT</button>
                    <button type="button" class="teacher-filter-btn" onclick="filterTeachers('akl', this)">Guru AKL</button>
                    <button type="button" class="teacher-filter-btn" onclick="filterTeachers('mplb', this)">Guru MPLB</button>
                    <button type="button" class="teacher-filter-btn" onclick="filterTeachers('logistik', this)">Guru Logistik</button>
                    <button type="button" class="teacher-filter-btn" onclick="filterTeachers('umum', this)">Guru Umum</button>
                </div>
            </div>

            <!-- Teacher Cards Grid -->
            <div class="row g-3">
                <!-- 1. Kepala Sekolah -->
                <div class="col-md-6 teacher-item" data-category="pimpinan">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/profile-kepsek-2x.png') }}" alt="Drs. Ahmad Rudianto, M.Pd" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-primary text-white rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">KEPALA SEKOLAH</span>
                                <span class="badge bg-success-subtle text-success rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">Sertifikasi Pendidik</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Drs. Ahmad Rudianto, M.Pd</div>
                            <div class="text-secondary small">Mata Pelajaran: Produk Kreatif & Kewirausahaan (PKK)</div>
                            <div class="text-muted" style="font-size: 0.7rem;">NIP. 19740512 199903 1 004 • S2 Manajemen Pendidikan</div>
                        </div>
                    </div>
                </div>

                <!-- 2. Waka Kurikulum -->
                <div class="col-md-6 teacher-item" data-category="pimpinan tjkt">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/teachers/guru-siti-rahmawati.png') }}" alt="Siti Rahmawati, M.Kom" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">WAKA KURIKULUM</span>
                                <span class="badge bg-info-subtle text-info rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">Asesor BNSP</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Siti Rahmawati, M.Kom</div>
                            <div class="text-secondary small">Mata Pelajaran: Pemrograman Web & Perangkat Bergerak</div>
                            <div class="text-muted" style="font-size: 0.7rem;">S2 Ilmu Komputer • Pengajar Sejak 2017</div>
                        </div>
                    </div>
                </div>

                <!-- 3. Waka Kesiswaan -->
                <div class="col-md-6 teacher-item" data-category="pimpinan umum">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/teachers/guru-budi-santoso.png') }}" alt="Budi Santoso, S.Pd" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-success-subtle text-success rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">WAKA KESISWAAN</span>
                                <span class="badge bg-success-subtle text-success rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">Sertifikasi Guru</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Budi Santoso, S.Pd</div>
                            <div class="text-secondary small">Mata Pelajaran: Pendidikan Jasmani & Pembinaan Karakter</div>
                            <div class="text-muted" style="font-size: 0.7rem;">S1 Pendidikan Olahraga & Kesehatan</div>
                        </div>
                    </div>
                </div>

                <!-- 4. Waka Hubin -->
                <div class="col-md-6 teacher-item" data-category="pimpinan">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/teachers/guru-hendra-gunawan.png') }}" alt="Ir. Hendra Gunawan" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-warning-subtle text-warning rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">WAKA HUBIN / DUDI</span>
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">Praktisi Industri</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Ir. Hendra Gunawan</div>
                            <div class="text-secondary small">Mata Pelajaran: Praktik Industri & Keselamatan Kerja (K3)</div>
                            <div class="text-muted" style="font-size: 0.7rem;">Insinyur Profesional • 15+ Tahun Pengalaman DUDI</div>
                        </div>
                    </div>
                </div>

                <!-- 5. Waka Sarpras -->
                <div class="col-md-6 teacher-item" data-category="pimpinan tjkt">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/teachers/guru-agus-prasetyo.png') }}" alt="Agus Prasetyo, S.T" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge" style="background-color: #f5f3ff; color: #8b5cf6; font-size: 0.65rem; padding: 2px 8px; border-radius: 50rem;">WAKA SARPRAS</span>
                                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">Teknisi Ahli</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Agus Prasetyo, S.T</div>
                            <div class="text-secondary small">Mata Pelajaran: Desain Jaringan & Infrastruktur Server</div>
                            <div class="text-muted" style="font-size: 0.7rem;">S1 Teknik Elektro • Sertifikasi Cisco CCNA</div>
                        </div>
                    </div>
                </div>

                <!-- 6. Kaprog TJKT -->
                <div class="col-md-6 teacher-item" data-category="tjkt">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/teachers/guru-fajar-nugroho.png') }}" alt="Fajar Nugroho, S.Kom" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge badge-tjkt text-white rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">KAPROG TJKT</span>
                                <span class="badge bg-info-subtle text-info rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">MikroTik MTCNA</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Fajar Nugroho, S.Kom</div>
                            <div class="text-secondary small">Mata Pelajaran: Administrasi Infrastruktur Jaringan (AIJ)</div>
                            <div class="text-muted" style="font-size: 0.7rem;">S1 Teknik Informatika • Penguji UKK Nasional</div>
                        </div>
                    </div>
                </div>

                <!-- 7. Kaprog AKL -->
                <div class="col-md-6 teacher-item" data-category="akl">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/teachers/guru-nur-hidayah.png') }}" alt="Nur Hidayah, S.E, M.Ak" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge badge-akl text-white rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">KAPROG AKL</span>
                                <span class="badge bg-success-subtle text-success rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">Akuntan Terdaftar</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Nur Hidayah, S.E, M.Ak</div>
                            <div class="text-secondary small">Mata Pelajaran: Praktikum Akuntansi Perusahaan Jasa & Dagang</div>
                            <div class="text-muted" style="font-size: 0.7rem;">S2 Magister Akuntansi • Certified Accurate Specialist</div>
                        </div>
                    </div>
                </div>

                <!-- 8. Kaprog MPLB -->
                <div class="col-md-6 teacher-item" data-category="mplb">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/teachers/guru-dewi-sartika.png') }}" alt="Dewi Sartika, S.Sos" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge badge-mplb text-white rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">KAPROG MPLB</span>
                                <span class="badge bg-warning-subtle text-warning rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">Sertifikasi Sekretaris</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Dewi Sartika, S.Sos</div>
                            <div class="text-secondary small">Mata Pelajaran: Otomatisasi & Tata Kelola Humas & Keprotokolan</div>
                            <div class="text-muted" style="font-size: 0.7rem;">S1 Ilmu Komunikasi & Administrasi Perkantoran</div>
                        </div>
                    </div>
                </div>

                <!-- 9. Kaprog Logistik -->
                <div class="col-md-6 teacher-item" data-category="logistik">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/teachers/guru-dimas-wahyu.png') }}" alt="Dimas Wahyu, S.Log" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge badge-logistik text-white rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">KAPROG LOGISTIK</span>
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">Supply Chain Professional</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Dimas Wahyu, S.Log</div>
                            <div class="text-secondary small">Mata Pelajaran: Manajemen Pergudangan & Rantai Pasok</div>
                            <div class="text-muted" style="font-size: 0.7rem;">S1 Logistik & Rantai Pasok • Praktisi Cargo & Warehouse</div>
                        </div>
                    </div>
                </div>

                <!-- 10. Guru Bahasa Inggris -->
                <div class="col-md-6 teacher-item" data-category="umum">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/teachers/guru-rizky-pratama.png') }}" alt="Rizky Pratama, M.Pd" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">GURU UMUM</span>
                                <span class="badge bg-success-subtle text-success rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">TOEIC Trainer</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Rizky Pratama, M.Pd</div>
                            <div class="text-secondary small">Mata Pelajaran: Bahasa Inggris Bisnis & Komunikasi Vokasi</div>
                            <div class="text-muted" style="font-size: 0.7rem;">S2 Pendidikan Bahasa Inggris • Koordinator Bahasa Asing</div>
                        </div>
                    </div>
                </div>

                <!-- 11. Guru Matematika -->
                <div class="col-md-6 teacher-item" data-category="umum">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/teachers/guru-anisa-fitri.png') }}" alt="Anisa Fitri, S.Pd" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">GURU UMUM</span>
                                <span class="badge bg-success-subtle text-success rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">Guru Penggerak</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Anisa Fitri, S.Pd</div>
                            <div class="text-secondary small">Mata Pelajaran: Matematika Terapan & Statistika Vokasi</div>
                            <div class="text-muted" style="font-size: 0.7rem;">S1 Pendidikan Matematika • Pembina Olimpiade Sains</div>
                        </div>
                    </div>
                </div>

                <!-- 12. Guru IT & Cloud -->
                <div class="col-md-6 teacher-item" data-category="tjkt">
                    <div class="teacher-grid-card">
                        <img src="{{ asset('images/teachers/guru-eko-wijaya.png') }}" alt="Eko Wijaya, S.Kom" class="teacher-avatar-thumb">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge badge-tjkt text-white rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">GURU TJKT</span>
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-0 small" style="font-size: 0.65rem;">AWS Certified</span>
                            </div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Eko Wijaya, S.Kom</div>
                            <div class="text-secondary small">Mata Pelajaran: Cloud Computing & Keamanan Siber</div>
                            <div class="text-muted" style="font-size: 0.7rem;">S1 Teknik Komputer • Pembina Komunitas Cyber Gema</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Download Notice Box -->
        <div class="mt-4 p-3 rounded-3 d-flex align-items-center justify-content-between flex-wrap gap-2" style="background-color: #eff6ff; border: 1.5px solid #bfdbfe;">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-info-circle-fill text-primary fs-5"></i>
                <div class="small text-dark">
                    Dokumen resmi SK Struktur Organisasi dan Pembagian Tugas Mengajar Dewan Guru lengkap dapat diunduh pada menu <strong>Unduh Dokumen</strong> di samping.
                </div>
            </div>
            <a href="#dokumen-profil" class="btn btn-primary btn-sm rounded-pill px-3 py-1 fw-bold small">
                <i class="bi bi-download me-1"></i>Unduh SK Struktur PDF
            </a>
        </div>
    </div>

    <!-- Script for Tab Switching & Teacher Directory Filter -->
    <script>
        function switchStructureView(view) {
            const baganView = document.getElementById('view-bagan-hierarki');
            const guruView = document.getElementById('view-direktori-guru');
            const baganBtn = document.getElementById('tab-bagan-btn');
            const guruBtn = document.getElementById('tab-guru-btn');

            if (view === 'bagan') {
                baganView.style.display = 'block';
                guruView.style.display = 'none';
                baganBtn.classList.add('active');
                guruBtn.classList.remove('active');
            } else {
                baganView.style.display = 'none';
                guruView.style.display = 'block';
                baganBtn.classList.remove('active');
                guruBtn.classList.add('active');
            }
        }

        function filterTeachers(category, btn) {
            document.querySelectorAll('.teacher-filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const items = document.querySelectorAll('.teacher-item');
            items.forEach(item => {
                const cats = item.getAttribute('data-category');
                if (category === 'all' || cats.includes(category)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
@endsection
