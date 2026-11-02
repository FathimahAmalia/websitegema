@extends('profil.layout')

@section('title', 'Visi & Misi')
@section('breadcrumb_active', 'Visi & Misi')
@section('banner_badge', 'ARAH STRATEGIS 2030 • PENDIDIKAN VOKASI')
@section('banner_title')
    Visi & Misi <span style="color: #60a5fa;">SMK Gema Cyber School</span>
@endsection
@section('banner_desc', 'Arah dan Komitmen Strategis SMK Gema Cyber School Menuju Keunggulan Vokasi dan Daya Saing Global 2030.')

@section('profile_content')
    <!-- Card: Visi Sekolah -->
    <div class="profile-card">
        <div class="d-flex align-items-center gap-2 mb-3">
            <div class="stat-icon-box stat-icon-blue" style="width: 38px; height: 38px; font-size: 1.05rem; border-radius: 10px;">
                <i class="bi bi-eye-fill"></i>
            </div>
            <div>
                <h5 class="fw-bold text-dark m-0" style="font-size: 1.15rem;">Visi Sekolah</h5>
                <span class="text-secondary" style="font-size: 0.72rem;">Kompas Utama Pendidikan SMK Gema Cyber School</span>
            </div>
        </div>

        <!-- Vision Quote Box with Cohesive Styling -->
        <div class="visi-quote-container mb-3">
            <p class="quote-text">
                "Menjadi sekolah menengah kejuruan yang unggul dalam bidang teknologi, bisnis, dan layanan, berkarakter mulia, serta mampu bersaing di tingkat nasional dan global pada tahun 2030."
            </p>
        </div>

        <!-- 3 Vision Pillars -->
        <div class="row g-3 mb-2">
            <div class="col-md-4">
                <div class="vision-pillar-item d-flex align-items-center gap-3 p-3 bg-light rounded-3 border">
                    <div class="pro-icon-box pro-icon-blue">
                        <i class="bi bi-cpu-fill"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Unggul Teknologi</div>
                        <div class="text-secondary" style="font-size: 0.72rem;">Penguasaan digital terdepan</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vision-pillar-item d-flex align-items-center gap-3 p-3 bg-light rounded-3 border">
                    <div class="pro-icon-box pro-icon-emerald">
                        <i class="bi bi-shield-heart-fill"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Karakter Mulia</div>
                        <div class="text-secondary" style="font-size: 0.72rem;">Akhlak & integritas tinggi</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vision-pillar-item d-flex align-items-center gap-3 p-3 bg-light rounded-3 border">
                    <div class="pro-icon-box pro-icon-amber">
                        <i class="bi bi-globe-americas"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Daya Saing Global</div>
                        <div class="text-secondary" style="font-size: 0.72rem;">Standar sertifikasi industri</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card: Misi Sekolah -->
    <div class="profile-card">
        <div class="d-flex align-items-center gap-2 mb-3">
            <div class="stat-icon-box stat-icon-rose" style="width: 38px; height: 38px; font-size: 1.05rem; border-radius: 10px;">
                <i class="bi bi-bullseye"></i>
            </div>
            <div>
                <h5 class="fw-bold text-dark m-0" style="font-size: 1.15rem;">Misi Sekolah</h5>
                <span class="text-secondary" style="font-size: 0.72rem;">5 Langkah Nyata Mewujudkan Visi Sekolah</span>
            </div>
        </div>

        <ul class="misi-list">
            <li class="misi-item-card">
                <span class="misi-badge-num">1</span>
                <p class="misi-content-text">
                    <strong>Pendidikan Vokasi Berkualitas:</strong> Menyelenggarakan pendidikan vokasi yang bermutu tinggi dengan sarana, laboratorium, dan teknologi pembelajaran standar industri terkini.
                </p>
            </li>
            <li class="misi-item-card">
                <span class="misi-badge-num">2</span>
                <p class="misi-content-text">
                    <strong>Kurikulum Selaras Industri (Link & Match):</strong> Mengembangkan kurikulum operasional yang diselaraskan secara langsung dengan kebutuhan Dunia Usaha dan Dunia Industri (DUDI).
                </p>
            </li>
            <li class="misi-item-card">
                <span class="misi-badge-num">3</span>
                <p class="misi-content-text">
                    <strong>Pembentukan Karakter & Disiplin:</strong> Membangun etika kerja profesional, kedisiplinan, akhlak mulia, dan jiwa kepemimpinan Pancasila pada setiap peserta didik.
                </p>
            </li>
            <li class="misi-item-card">
                <span class="misi-badge-num">4</span>
                <p class="misi-content-text">
                    <strong>Lingkungan Inovatif & Kondusif:</strong> Menciptakan iklim pembelajaran yang aman, nyaman, inklusif, dan memicu kreativitas, riset terapan, serta digital prototyping.
                </p>
            </li>
            <li class="misi-item-card">
                <span class="misi-badge-num">5</span>
                <p class="misi-content-text">
                    <strong>Kemitraan Strategis Berkelanjutan:</strong> Menjalin kerja sama yang kuat dengan puluhan mitra industri terkemuka dalam program magang (PKL), sertifikasi BNSP, dan penyaluran kerja lulusan.
                </p>
            </li>
        </ul>
    </div>

    <!-- Card: Tujuan Kejuruan (BMW) -->
    <div class="profile-card">
        <div class="d-flex align-items-center gap-2 mb-3">
            <div class="stat-icon-box stat-icon-green" style="width: 38px; height: 38px; font-size: 1.05rem; border-radius: 10px;">
                <i class="bi bi-trophy-fill"></i>
            </div>
            <div>
                <h5 class="fw-bold text-dark m-0" style="font-size: 1.15rem;">Tujuan Pendidikan Kejuruan</h5>
                <span class="text-secondary" style="font-size: 0.72rem;">Komitmen Capaian Lulusan SMK</span>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="p-3 rounded-3 border h-100" style="background-color: #f8fafc; border-color: #e2e8f0;">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="stat-icon-box stat-icon-blue" style="width: 30px; height: 30px; font-size: 0.9rem; border-radius: 6px;">
                            <i class="bi bi-briefcase-fill"></i>
                        </div>
                        <h6 class="fw-bold text-dark m-0" style="font-size: 0.92rem;">Kesiapan Kerja (BMW)</h6>
                    </div>
                    <p class="small text-secondary m-0" style="line-height: 1.55; font-size: 0.8rem;">
                        Mempersiapkan lulusan yang siap <strong>Bekerja</strong> di industri ternama, <strong>Melanjutkan</strong> studi ke perguruan tinggi favorit, maupun <strong>Wirausaha</strong> mandiri berbasis teknologi.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 rounded-3 border h-100" style="background-color: #f8fafc; border-color: #e2e8f0;">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="stat-icon-box stat-icon-green" style="width: 30px; height: 30px; font-size: 0.9rem; border-radius: 6px;">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        <h6 class="fw-bold text-dark m-0" style="font-size: 0.92rem;">Sertifikasi Keahlian</h6>
                    </div>
                    <p class="small text-secondary m-0" style="line-height: 1.55; font-size: 0.8rem;">
                        Memastikan setiap siswa memiliki sertifikat kompetensi keahlian resmi BNSP serta sertifikasi industri global (seperti MikroTik, Cisco, Accurate, dll) sebelum wisuda kelulusan.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
