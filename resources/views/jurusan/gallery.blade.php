@extends('jurusan.layout')

@section('title', 'Galeri Kegiatan ' . $program['short_name'])
@section('meta_description', 'Galeri kegiatan dan pembelajaran jurusan ' . $program['name'] . ' SMK Gema Cyber School.')

@section('content')
    <main style="--program-accent: {{ $program['accent'] }};">
        <section class="program-gallery-hero" aria-labelledby="gallery-title">
            <img class="program-gallery-hero-image" src="{{ asset($program['gallery'][0]['image']) }}" alt="" aria-hidden="true">
            <div class="program-gallery-hero-overlay"></div>
            <div class="container program-gallery-hero-content">
                <a href="{{ route('jurusan.show', $program['slug']) }}" class="program-gallery-back">
                    <i class="bi bi-arrow-left"></i> Kembali ke detail {{ $program['short_name'] }}
                </a>
                <div class="program-section-kicker mt-4 mb-2">DOKUMENTASI KEGIATAN</div>
                <h1 id="gallery-title">Galeri Kegiatan<br><span>{{ $program['short_name'] }}</span></h1>
                <p class="mb-0">
                    Momen pembelajaran, praktik, dan kegiatan siswa {{ $program['short_name'] }} dalam dokumentasi foto.
                </p>
            </div>
        </section>

        <section class="program-content-section program-soft-bg">
            <div class="container">
                <div class="program-gallery-page-heading">
                    <div>
                        <span class="program-section-kicker" style="color: {{ $program['accent'] }};">MOMEN PEMBELAJARAN</span>
                        <h2 class="h3 fw-bold text-dark mt-2 mb-1">Dokumentasi Kegiatan</h2>
                        <p class="text-secondary mb-0">Jelajahi kegiatan dan lingkungan belajar program keahlian.</p>
                    </div>
                    <span class="program-gallery-count"><i class="bi bi-images me-2"></i><span data-gallery-count>{{ count($program['gallery']) }}</span> Foto</span>
                </div>

                @php
                    $galleryCategories = collect($program['gallery'])->pluck('category')->unique()->values();
                @endphp
                <div class="program-gallery-filters" role="group" aria-label="Filter kategori galeri">
                    <button type="button" class="program-gallery-filter active" data-gallery-filter="all" aria-pressed="true">
                        <i class="bi bi-grid me-1"></i> Semua
                    </button>
                    @foreach ($galleryCategories as $category)
                        <button type="button" class="program-gallery-filter" data-gallery-filter="{{ $category }}" aria-pressed="false">
                            <i class="bi bi-camera me-1"></i> {{ $category }}
                        </button>
                    @endforeach
                </div>

                <div class="row g-3 g-xl-4 mt-1" data-gallery-grid>
                    @foreach ($program['gallery'] as $index => $photo)
                        <div class="col-sm-6 col-xl-3" data-gallery-card data-category="{{ $photo['category'] }}">
                            <article class="program-gallery-card">
                                <button
                                    type="button"
                                    class="program-gallery-open"
                                    data-gallery-image="{{ asset($photo['image']) }}"
                                    data-gallery-alt="{{ $photo['alt'] }}"
                                    data-gallery-caption="{{ $photo['caption'] }}"
                                    aria-label="Perbesar foto: {{ $photo['caption'] }}"
                                >
                                    <img src="{{ asset($photo['image']) }}" alt="{{ $photo['alt'] }}" loading="{{ $index < 3 ? 'eager' : 'lazy' }}">
                                    <span class="program-gallery-zoom"><i class="bi bi-arrows-fullscreen"></i></span>
                                </button>
                                <div class="program-gallery-card-caption">
                                    <span class="program-gallery-category" style="--program-accent: {{ $program['accent'] }};">
                                        <i class="bi bi-camera me-1"></i>{{ $photo['category'] }}
                                    </span>
                                    <h3>{{ $photo['caption'] }}</h3>
                                    <span class="program-gallery-card-index">SMK Gema Cyber School</span>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <p class="program-gallery-empty" data-gallery-empty hidden>Tidak ada foto dalam kategori ini.</p>

                <div class="program-gallery-footer">
                    <a href="{{ route('jurusan.show', $program['slug']) }}" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-bold">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke detail jurusan
                    </a>
                </div>
            </div>
        </section>
    </main>

    <dialog class="program-lightbox" style="--program-accent: {{ $program['accent'] }};" aria-label="Pratinjau foto galeri">
        <div class="program-lightbox-content">
            <button type="button" class="program-lightbox-close" aria-label="Tutup pratinjau">
                <i class="bi bi-x-lg"></i>
            </button>
            <img class="program-lightbox-image" src="" alt="">
            <p class="program-lightbox-caption"></p>
        </div>
    </dialog>
@endsection

@section('extra_js')
    <script>
        (function() {
            const lightbox = document.querySelector('.program-lightbox');
            const cards = Array.from(document.querySelectorAll('[data-gallery-card]'));
            const count = document.querySelector('[data-gallery-count]');
            const emptyState = document.querySelector('[data-gallery-empty]');

            document.querySelectorAll('[data-gallery-filter]').forEach(function(filter) {
                filter.addEventListener('click', function() {
                    const category = filter.dataset.galleryFilter;
                    let visibleCount = 0;

                    document.querySelectorAll('[data-gallery-filter]').forEach(function(item) {
                        const active = item === filter;
                        item.classList.toggle('active', active);
                        item.setAttribute('aria-pressed', String(active));
                    });

                    cards.forEach(function(card) {
                        const visible = category === 'all' || card.dataset.category === category;
                        card.hidden = !visible;
                        visibleCount += visible ? 1 : 0;
                    });

                    if (count) {
                        count.textContent = visibleCount;
                    }
                    if (emptyState) {
                        emptyState.hidden = visibleCount > 0;
                    }
                });
            });

            if (!lightbox || typeof lightbox.showModal !== 'function') {
                return;
            }

            const image = lightbox.querySelector('.program-lightbox-image');
            const caption = lightbox.querySelector('.program-lightbox-caption');

            document.querySelectorAll('.program-gallery-open').forEach(function(button) {
                button.addEventListener('click', function() {
                    image.src = button.dataset.galleryImage;
                    image.alt = button.dataset.galleryAlt;
                    caption.textContent = button.dataset.galleryCaption;
                    lightbox.showModal();
                });
            });

            lightbox.querySelector('.program-lightbox-close').addEventListener('click', function() {
                lightbox.close();
            });

            lightbox.addEventListener('click', function(event) {
                if (event.target === lightbox) {
                    lightbox.close();
                }
            });
        })();
    </script>
@endsection
