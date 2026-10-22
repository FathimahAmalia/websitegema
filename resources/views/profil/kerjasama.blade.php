@extends('profil.layout')

@section('title', 'Kerja Sama Industri')
@section('breadcrumb_active', 'Kerja Sama')
@section('banner_desc', 'Sinergi Strategis dengan Dunia Usaha dan Dunia Industri (DUDI)')

@section('profile_content')
    <div class="profile-card">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-handshake-fill text-danger fs-4"></i>
                <h5 class="fw-bold text-dark m-0" style="font-size: 1.15rem;">Kerja Sama Industri (DUDI)</h5>
            </div>
            <span class="badge bg-danger rounded-pill px-3 py-2">20+ Mitra Industri</span>
        </div>
        <p class="text-secondary small mb-4">
            Link and Match menjadi prioritas utama kami. Melalui kerja sama formal dengan puluhan industri terkemuka, siswa mendapatkan akses magang berbayar, sertifikasi industri, guru tamu, serta rekrutmen kerja langsung sebelum lulus.
        </p>

        <!-- Partnership Models Grid -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="bi bi-briefcase-fill text-primary fs-5"></i>
                        <h6 class="fw-bold text-dark m-0">Program Magang & PKL 6 Bulan</h6>
                    </div>
                    <p class="small text-secondary m-0">Siswa diterjunkan langsung dalam proyek industri nyata dengan pembimbing profesional dari perusahaan mitra.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="bi bi-mortarboard-fill text-success fs-5"></i>
                        <h6 class="fw-bold text-dark m-0">Kelas Industri & Guru Tamu</h6>
                    </div>
                    <p class="small text-secondary m-0">Praktisi industri rutin mengajar di kelas memberikan wawasan teknologi terbaru dan studi kasus lapangan.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="bi bi-patch-check-fill text-warning fs-5"></i>
                        <h6 class="fw-bold text-dark m-0">Uji Kompetensi Bersama Industri</h6>
                    </div>
                    <p class="small text-secondary m-0">Penguji eksternal dari asosiasi profesi dan perusahaan rekanan memvalidasi keterampilan lulusan.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="bi bi-person-check-fill text-danger fs-5"></i>
                        <h6 class="fw-bold text-dark m-0">Penyaluran Kerja BKK</h6>
                    </div>
                    <p class="small text-secondary m-0">Bursa Kerja Khusus (BKK) resmi memfasilitasi rekrutmen on-campus bagi alumni siap kerja.</p>
                </div>
            </div>
        </div>

        <div class="alert alert-light border d-flex align-items-center gap-2 p-2 small m-0">
            <i class="bi bi-check-circle-fill text-success fs-5"></i>
            <div>Tertarik bermitra dengan SMK Gema Cyber School? Hubungi bagian <strong>Waka Hubin</strong> melalui email kerja sama di <code>kemitraan@smkgemacyber.sch.id</code>.</div>
        </div>
    </div>
@endsection
