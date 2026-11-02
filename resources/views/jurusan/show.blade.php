@extends('jurusan.layout')

@section('title', $program['short_name'] . ' - ' . $program['name'])
@section('meta_description', $program['summary'])

@section('content')
    <main style="--program-accent: {{ $program['accent'] }};">
        <section class="program-content-section program-detail-top">
            <div class="container">
                <div class="program-detail-grid">
                    <div class="program-intro">
                        <div class="program-section-kicker mb-2" style="color: {{ $program['accent'] }};">TENTANG JURUSAN</div>
                        <h1 class="h2 fw-bold text-dark mb-3">{{ $program['title'] }}</h1>
                        <p class="text-secondary mb-3" style="line-height: 1.8;">{{ $program['overview'] }}</p>
                        <p class="text-secondary mb-4" style="line-height: 1.8;">{{ $program['summary'] }} Siswa juga dilatih untuk menerapkan prosedur kerja yang tertib, berkomunikasi dengan baik, dan bertanggung jawab atas proses maupun hasil tugas.</p>

                        <div class="program-competency-grid">
                            @foreach ($program['competencies'] as $competency)
                                <article class="program-competency-card">
                                    <span class="program-competency-icon" style="color: {{ $program['accent'] }}; background-color: color-mix(in srgb, {{ $program['accent'] }} 11%, white);">
                                        <i class="bi {{ $competency['icon'] }}"></i>
                                    </span>
                                    <h2>{{ $competency['title'] }}</h2>
                                    <p>{{ $competency['description'] }}</p>
                                </article>
                            @endforeach
                        </div>
                    </div>

                    <aside class="program-gallery-preview" aria-label="Galeri kegiatan {{ $program['short_name'] }}">
                        <div class="program-gallery-feature">
                            <img src="{{ asset($program['gallery'][0]['image']) }}" alt="{{ $program['gallery'][0]['alt'] }}">
                            <span class="program-gallery-badge"><i class="bi bi-images me-1"></i> GALERI KEGIATAN</span>
                        </div>
                        <div class="program-gallery-heading">
                            <div>
                                <h2>Galeri Kegiatan</h2>
                                <p>{{ $program['gallery'][0]['caption'] }}</p>
                            </div>
                        </div>
                        <a href="{{ route('jurusan.gallery', $program['slug']) }}" class="program-gallery-link">
                            Lihat semua kegiatan <i class="bi bi-arrow-right"></i>
                        </a>
                        <div class="program-gallery-teasers" aria-label="Pratinjau foto kegiatan lainnya">
                            @foreach (array_slice($program['gallery'], 1, 3) as $photo)
                                <a href="{{ route('jurusan.gallery', $program['slug']) }}" class="program-gallery-teaser">
                                    <img src="{{ asset($photo['image']) }}" alt="{{ $photo['alt'] }}" loading="lazy">
                                    <span>{{ $photo['caption'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <section class="program-content-section program-soft-bg">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <article class="program-highlight-card">
                            <span class="program-section-kicker" style="color: {{ $program['accent'] }};">ARAH PENGEMBANGAN</span>
                            <h2 class="h3 fw-bold text-dark mt-2 mb-3">Peluang Kerja</h2>
                            <p class="text-secondary mb-3" style="line-height: 1.75;">Kompetensi {{ $program['short_name'] }} dapat menjadi bekal awal untuk mengenal dan menekuni berbagai bidang kerja berikut.</p>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($program['careers'] as $career)
                                    <span class="program-career-tag">{{ $career }}</span>
                                @endforeach
                            </div>
                            <p class="text-secondary small mt-3 mb-0">Peluang aktual bergantung pada kompetensi, pengalaman, sertifikasi, dan kebutuhan pemberi kerja.</p>
                        </article>
                    </div>
                    <div class="col-lg-7">
                        <article class="program-highlight-card">
                            <span class="program-section-kicker" style="color: {{ $program['accent'] }};">NILAI TAMBAH PROGRAM</span>
                            <h2 class="h3 fw-bold text-dark mt-2 mb-3">Keunggulan Jurusan {{ $program['short_name'] }}</h2>
                            <ul class="program-advantage-list">
                                @foreach ($program['advantages'] as $advantage)
                                    <li><i class="bi bi-check-circle-fill" style="color: {{ $program['accent'] }};"></i><span>{{ $advantage }}</span></li>
                                @endforeach
                            </ul>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="program-content-section">
            <div class="container">
                <div class="program-section-heading">
                    <span class="program-section-kicker" style="color: {{ $program['accent'] }};">MATERI KEAHLIAN</span>
                    <h2 class="h2 fw-bold text-dark mt-2 mb-2">Ruang lingkup pembelajaran</h2>
                    <p class="text-secondary mb-0">Materi disusun untuk membangun pemahaman dari dasar hingga penerapannya dalam konteks pekerjaan.</p>
                </div>
                <div class="row g-3 mt-2">
                    @foreach ($program['learning_areas'] as $index => $area)
                        <div class="col-md-6 col-xl-4">
                            <article class="program-topic-card">
                                <div class="program-topic-number" style="color: {{ $program['accent'] }};">{{ sprintf('%02d', $index + 1) }}</div>
                                <h3 class="h5 fw-bold text-dark mb-2">{{ $area['title'] }}</h3>
                                <p class="text-secondary mb-0" style="line-height: 1.75;">{{ $area['description'] }}</p>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="program-content-section program-soft-bg">
            <div class="container">
                <div class="program-section-heading">
                    <span class="program-section-kicker" style="color: {{ $program['accent'] }};">PENERAPAN KOMPETENSI</span>
                    <h2 class="h2 fw-bold text-dark mt-2 mb-2">Contoh proyek praktik</h2>
                    <p class="text-secondary mb-0">Contoh kegiatan berikut menunjukkan bagaimana materi keahlian dapat diterapkan dalam tugas dan studi kasus.</p>
                </div>
                <div class="row g-3 mt-2">
                    @foreach ($program['projects'] as $index => $project)
                        <div class="col-lg-4">
                            <article class="program-project-card">
                                <div class="program-project-icon" style="color: {{ $program['accent'] }}; background-color: color-mix(in srgb, {{ $program['accent'] }} 10%, white);">
                                    <i class="bi bi-kanban"></i>
                                </div>
                                <div class="program-project-label">PROYEK {{ sprintf('%02d', $index + 1) }}</div>
                                <h3 class="h5 fw-bold text-dark mb-2">{{ $project['title'] }}</h3>
                                <p class="text-secondary mb-0" style="line-height: 1.75;">{{ $project['description'] }}</p>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="program-content-section">
            <div class="container">
                <div class="program-cta d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
                    <div>
                        <div class="program-eyebrow mb-2">MULAI LANGKAH MASA DEPANMU</div>
                        <h2 class="h3 fw-bold mb-2">Tertarik dengan program {{ $program['short_name'] }}?</h2>
                        <p class="text-white-50 mb-0">Jelajahi informasi penerimaan peserta didik baru SMK Gema Cyber School.</p>
                    </div>
                    <a href="{{ route('beranda') }}#ppdb" class="btn btn-light rounded-pill px-4 py-3 fw-bold text-nowrap">
                        Informasi PPDB <i class="bi bi-arrow-up-right ms-1"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
