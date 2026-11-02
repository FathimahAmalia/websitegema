@extends('jurusan.layout')

@section('title', 'Galeri Aktivitas & Dokumentasi Sekolah - SMK Gema Cyber School')
@section('meta_description', 'Dokumentasi visual resmi kegiatan pembelajaran kejuruan, pembinaan karakter, prestasi siswa, fasilitas kampus, serta agenda di SMK Gema Cyber School.')

@section('extra_css')
<style>
    /* ==========================================================
       1. HERO BANNER RESMI SEKOLAH
       ========================================================== */
    .school-gallery-hero {
        position: relative;
        padding: 5.5rem 0 3rem;
        background: linear-gradient(135deg, #0b1f36 0%, #123154 50%, #1a4477 100%);
        color: #ffffff;
        overflow: hidden;
    }

    .school-gallery-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
        background-size: 24px 24px;
        opacity: 0.6;
        pointer-events: none;
    }

    .school-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fef08a;
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 0.35rem 0.9rem;
        border-radius: 50rem;
        margin-bottom: 0.85rem;
    }

    .school-hero-title {
        font-size: clamp(1.85rem, 3.5vw, 2.65rem);
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1.25;
        color: #ffffff;
        margin-bottom: 0.65rem;
    }

    .school-hero-desc {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.82);
        max-width: 680px;
        line-height: 1.65;
        margin: 0;
    }

    /* ==========================================================
       2. DAFTAR KARTU FOTO DOKUMENTASI SEKOLAH
       ========================================================== */
    .school-gallery-section {
        background-color: #f8fafc;
        padding: 3.5rem 0 5rem;
        min-height: 70vh;
    }

    .school-photo-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        cursor: pointer;
    }

    .school-photo-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 30px rgba(15, 23, 42, 0.1);
        border-color: #cbd5e1;
    }

    .school-photo-thumb {
        position: relative;
        width: 100%;
        height: 230px;
        background-color: #0f172a;
        overflow: hidden;
    }

    .school-photo-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.45s ease;
    }

    .school-photo-card:hover .school-photo-img {
        transform: scale(1.05);
    }

    .school-photo-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 0.3rem 0.75rem;
        border-radius: 50rem;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        z-index: 2;
    }

    .school-photo-zoom-hint {
        position: absolute;
        top: 14px;
        right: 14px;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: rgba(15, 23, 42, 0.65);
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        opacity: 0;
        transform: scale(0.85);
        transition: all 0.25s ease;
        z-index: 2;
    }

    .school-photo-card:hover .school-photo-zoom-hint {
        opacity: 1;
        transform: scale(1);
        background: #2563eb;
    }

    .school-photo-body {
        padding: 1.25rem 1.35rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .school-photo-date {
        font-size: 0.75rem;
        font-weight: 600;
        color: #64748b;
        margin-bottom: 0.45rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .school-photo-title {
        font-size: 1.05rem;
        font-weight: 700;
        color: #1e293b;
        line-height: 1.4;
        margin-bottom: 0.65rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .school-photo-loc {
        font-size: 0.78rem;
        color: #64748b;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        margin-top: auto;
        padding-top: 0.65rem;
        border-top: 1px dashed #e2e8f0;
    }

    .school-photo-action {
        font-size: 0.8rem;
        font-weight: 700;
        color: #2563eb;
        margin-top: 0.65rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* ==========================================================
       3. MODAL DETAIL DOKUMENTASI RESMI SEKOLAH
       ========================================================== */
    .school-modal-dialog {
        max-width: 860px;
        margin: 1.75rem auto;
    }

    .school-modal-content {
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 20px 50px rgba(15, 23, 42, 0.2);
        overflow: hidden;
        background: #ffffff;
    }

    .school-modal-header {
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        padding: 1rem 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .school-modal-brand {
        display: flex;
        align-items: center;
        gap: 0.65rem;
    }

    .school-modal-brand img {
        height: 28px;
    }

    .school-modal-brand-text {
        font-size: 0.88rem;
        font-weight: 700;
        color: #0f172a;
    }

    /* Modal Image Container */
    .school-modal-img-wrap {
        position: relative;
        background: #0f172a;
        height: 440px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .school-modal-main-img {
        max-width: 100%;
        max-height: 440px;
        object-fit: contain;
        display: block;
        transition: opacity 0.2s ease;
    }

    .school-modal-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: rgba(15, 23, 42, 0.7);
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        cursor: pointer;
        z-index: 5;
        transition: all 0.2s ease;
    }

    .school-modal-nav-btn:hover {
        background: #2563eb;
        border-color: #2563eb;
        transform: translateY(-50%) scale(1.08);
    }

    .school-modal-prev-btn {
        left: 1rem;
    }

    .school-modal-next-btn {
        right: 1rem;
    }

    /* Modal Meta Body */
    .school-modal-body {
        padding: 1.5rem 1.65rem;
        background: #ffffff;
    }

    .school-modal-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 0.65rem;
        line-height: 1.35;
    }

    .school-modal-desc {
        font-size: 0.9rem;
        color: #475569;
        line-height: 1.65;
        margin-bottom: 1.25rem;
    }

    .school-meta-table {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.85rem 1.15rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 0.85rem;
        font-size: 0.82rem;
    }

    .school-meta-item-label {
        font-size: 0.7rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.2rem;
    }

    .school-meta-item-val {
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 0.35rem;
    }
</style>
@endsection

@section('content')
<main>
    <!-- ==========================================================
         HERO SECTION RESMI SEKOLAH
         ========================================================== -->
    <section class="school-gallery-hero">
        <div class="container position-relative z-1">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="school-hero-badge">
                        <i class="bi bi-camera-fill"></i>
                        <span>Dokumentasi Resmi Sekolah</span>
                    </div>
                    <h1 class="school-hero-title">
                        Galeri Aktivitas Siswa & Lingkungan Sekolah
                    </h1>
                    <p class="school-hero-desc">
                        Dokumentasi resmi kegiatan belajar mengajar kejuruan, pembinaan karakter, prestasi kejuaraan siswa, fasilitas laboratorium, serta agenda resmi di lingkungan SMK Gema Cyber School.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================
         SECTION: DAFTAR KARTU FOTO DOKUMENTASI
         ========================================================== -->
    <section class="school-gallery-section">
        <div class="container">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-images text-primary"></i>
                        <span>Koleksi Foto Dokumentasi Terkini</span>
                    </h5>
                </div>
                <div class="small text-muted fw-bold">
                    Total: <span class="text-primary fw-bolder">{{ count($galleryItems) }}</span> Dokumentasi Foto
                </div>
            </div>

            <!-- Grid Kartu Foto Dokumentasi -->
            <div class="row g-4" id="schoolGaleriGrid">
                @foreach ($galleryItems as $index => $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="school-photo-card" 
                             data-gallery-index="{{ $index }}"
                             title="Klik untuk melihat foto dan keterangan lengkap">
                            
                            <!-- Thumbnail Foto -->
                            <div class="school-photo-thumb">
                                <span class="school-photo-badge {{ $item['category_badge'] }}">
                                    {{ $item['category_label'] }}
                                </span>
                                
                                <div class="school-photo-zoom-hint" title="Perbesar">
                                    <i class="bi bi-arrows-fullscreen"></i>
                                </div>

                                <img src="{{ asset($item['image']) }}" 
                                     alt="{{ $item['title'] }}" 
                                     class="school-photo-img" 
                                     loading="lazy">
                            </div>

                            <!-- Informasi Keterangan Foto -->
                            <div class="school-photo-body">
                                <div class="school-photo-date">
                                    <i class="bi bi-calendar-event text-primary"></i>
                                    <span>{{ $item['date'] }}</span>
                                </div>

                                <h3 class="school-photo-title">
                                    {{ $item['title'] }}
                                </h3>

                                <div class="school-photo-loc">
                                    <i class="bi bi-geo-alt-fill text-danger"></i>
                                    <span>{{ $item['location'] }}</span>
                                </div>

                                <div class="school-photo-action">
                                    <span>Buka Foto Dokumentasi</span>
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
</main>

<!-- ==========================================================
     MODAL DETAIL DOKUMENTASI SEKOLAH
     ========================================================== -->
<div class="modal fade" id="modalSchoolGallery" tabindex="-1" aria-labelledby="modalSchoolGalleryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered school-modal-dialog">
        <div class="modal-content school-modal-content">
            
            <!-- Header Modal -->
            <div class="school-modal-header">
                <div class="school-modal-brand">
                    <img src="{{ asset('images/school-logo.png') }}" alt="Logo SMK Gema Cyber School">
                    <span class="school-modal-brand-text">Arsip Dokumentasi SMK Gema</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <!-- Tampilan Foto -->
            <div class="school-modal-img-wrap">
                <button type="button" class="school-modal-nav-btn school-modal-prev-btn" id="modalPrevBtn" title="Foto Sebelumnya">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <img src="" alt="Foto Dokumentasi" class="school-modal-main-img" id="modalMainImg">

                <button type="button" class="school-modal-nav-btn school-modal-next-btn" id="modalNextBtn" title="Foto Selanjutnya">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

            <!-- Keterangan Detail Foto -->
            <div class="school-modal-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="badge" id="modalCategoryBadge">-</span>
                    <span class="small text-muted fw-bold" id="modalCounter">-</span>
                </div>

                <h3 class="school-modal-title" id="modalTitle">-</h3>
                <p class="school-modal-desc" id="modalDesc">-</p>

                <!-- Tabel Ringkas Spesifikasi Foto Sekolah -->
                <div class="school-meta-table">
                    <div>
                        <div class="school-meta-item-label">Waktu Pelaksanaan</div>
                        <div class="school-meta-item-val">
                            <i class="bi bi-calendar3 text-primary"></i>
                            <span id="modalDate">-</span>
                        </div>
                    </div>

                    <div>
                        <div class="school-meta-item-label">Tempat / Lokasi</div>
                        <div class="school-meta-item-val">
                            <i class="bi bi-geo-alt-fill text-danger"></i>
                            <span id="modalLocation">-</span>
                        </div>
                    </div>

                    <div>
                        <div class="school-meta-item-label">Tim Dokumentasi</div>
                        <div class="school-meta-item-val">
                            <i class="bi bi-camera-fill text-success"></i>
                            <span id="modalPhotographer">-</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

@section('extra_js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allItems = @json($galleryItems);
        let currentIndex = 0;

        const modalEl = document.getElementById('modalSchoolGallery');
        const modal = new bootstrap.Modal(modalEl);

        const imgEl = document.getElementById('modalMainImg');
        const catBadgeEl = document.getElementById('modalCategoryBadge');
        const titleEl = document.getElementById('modalTitle');
        const descEl = document.getElementById('modalDesc');
        const dateEl = document.getElementById('modalDate');
        const locationEl = document.getElementById('modalLocation');
        const photographerEl = document.getElementById('modalPhotographer');
        const counterEl = document.getElementById('modalCounter');

        const prevBtn = document.getElementById('modalPrevBtn');
        const nextBtn = document.getElementById('modalNextBtn');

        function renderModal(index) {
            if (!allItems || allItems.length === 0) return;

            if (index < 0) index = allItems.length - 1;
            if (index >= allItems.length) index = 0;
            currentIndex = index;

            const item = allItems[currentIndex];
            if (!item) return;

            // Fade transition
            if (imgEl) {
                imgEl.style.opacity = '0.3';
                setTimeout(function () {
                    imgEl.src = "{{ asset('') }}" + item.image;
                    imgEl.alt = item.title;
                    imgEl.style.opacity = '1';
                }, 100);
            }

            if (catBadgeEl) {
                catBadgeEl.textContent = item.category_label;
                catBadgeEl.className = 'badge ' + item.category_badge;
            }
            if (titleEl) titleEl.textContent = item.title;
            if (descEl) descEl.textContent = item.description;
            if (dateEl) dateEl.textContent = item.date;
            if (locationEl) locationEl.textContent = item.location;
            if (photographerEl) photographerEl.textContent = item.photographer;
            if (counterEl) counterEl.textContent = 'Foto ' + (currentIndex + 1) + ' dari ' + allItems.length;
        }

        // Buka modal saat kartu foto diklik
        document.querySelectorAll('.school-photo-card').forEach(function (card) {
            card.addEventListener('click', function () {
                const index = parseInt(this.getAttribute('data-gallery-index'));
                renderModal(index);
                modal.show();
            });
        });

        // Tombol Sebelumnya
        if (prevBtn) {
            prevBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                renderModal(currentIndex - 1);
            });
        }

        // Tombol Selanjutnya
        if (nextBtn) {
            nextBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                renderModal(currentIndex + 1);
            });
        }

        // Navigasi keyboard (Panah Kiri & Panah Kanan)
        window.addEventListener('keydown', function (e) {
            if (modalEl.classList.contains('show')) {
                if (e.key === 'ArrowLeft') {
                    renderModal(currentIndex - 1);
                } else if (e.key === 'ArrowRight') {
                    renderModal(currentIndex + 1);
                }
            }
        });
    });
</script>
@endsection
