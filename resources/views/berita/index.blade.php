@extends('berita.layout')

@section('title', 'Berita & Artikel Terkini')

@section('breadcrumb_extra')
    @if (!empty($currentCategory) && $currentCategory !== 'semua')
        <i class="bi bi-chevron-right opacity-50" style="font-size: 0.68rem;"></i>
        <span class="crumb-active text-capitalize">{{ $currentCategory }}</span>
    @elseif(!empty($currentTag))
        <i class="bi bi-chevron-right opacity-50" style="font-size: 0.68rem;"></i>
        <span class="crumb-active">#{{ $currentTag }}</span>
    @elseif(!empty($searchQuery))
        <i class="bi bi-chevron-right opacity-50" style="font-size: 0.68rem;"></i>
        <span class="crumb-active">Pencarian</span>
    @endif
@endsection

@section('banner_badge', 'PORTAL WARTA RESMI • SMK GEMA CYBER SCHOOL')

@section('banner_title')
    Kabar & Publikasi <span style="color: #60a5fa;">Terkini</span>
@endsection

@section('banner_desc')
    Temukan rilis informasi akademik, liputan prestasi kejuaraan, inovasi kejuruan, dan agenda terkini di lingkungan SMK Gema Cyber School.
@endsection

@section('content')

    <!-- Active Filter Notice -->
    @if (!empty($searchQuery) || (!empty($currentCategory) && $currentCategory !== 'semua') || !empty($currentTag))
        <div class="alert alert-light border rounded-4 py-2 px-3 d-flex align-items-center justify-content-between mb-4 shadow-sm" style="background-color: #f1f5f9;">
            <div class="d-flex align-items-center gap-2 small">
                <i class="bi bi-info-circle-fill text-primary"></i>
                <span>Menampilkan <strong>{{ $totalResults }}</strong> artikel untuk 
                    @if(!empty($searchQuery)) kata kunci <em>"{{ $searchQuery }}"</em> @endif
                    @if(!empty($currentCategory) && $currentCategory !== 'semua') kategori <strong>{{ ucfirst($currentCategory) }}</strong> @endif
                    @if(!empty($currentTag)) tag <strong>#{{ $currentTag }}</strong> @endif
                </span>
            </div>
            <a href="{{ route('berita.index') }}" class="btn btn-sm btn-outline-danger rounded-pill py-1 px-3 fw-bold small">
                <i class="bi bi-arrow-clockwise me-1"></i>Reset Filter
            </a>
        </div>
    @endif

    <div class="row g-4">
        
        <!-- ==========================================
             LEFT COLUMN: MAIN ARTICLES AREA (8 COLS)
             ========================================== -->
        <div class="col-lg-8">

            <!-- 1. FEATURED / HEADLINE ARTICLE (Only on default view) -->
            @if ($featuredArticle && empty($searchQuery) && empty($currentCategory) && empty($currentTag) && request('page', 1) == 1)
                <div class="news-featured-card">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="news-featured-img-box">
                                <span class="news-featured-badge">
                                    <span class="pulse-dot"></span>
                                    <span>BERITA UTAMA</span>
                                </span>
                                <img src="{{ asset($featuredArticle['image']) }}" alt="{{ $featuredArticle['title'] }}" class="news-featured-img">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="news-featured-body">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge {{ $featuredArticle['category_badge_class'] }} rounded-pill px-3 py-1 small fw-bold">
                                        {{ $featuredArticle['category'] }}
                                    </span>
                                    <span class="text-secondary small">
                                        <i class="bi bi-clock me-1"></i>{{ $featuredArticle['read_time'] }}
                                    </span>
                                </div>

                                <a href="{{ route('berita.show', $featuredArticle['slug']) }}" class="news-featured-title">
                                    {{ $featuredArticle['title'] }}
                                </a>

                                <p class="news-featured-excerpt">
                                    {{ $featuredArticle['excerpt'] }}
                                </p>

                                <div class="d-flex align-items-center justify-content-between pt-3 border-top border-light-subtle">
                                    <div class="small text-secondary d-flex align-items-center gap-2">
                                        <i class="bi bi-calendar-event text-primary"></i>
                                        <span>{{ $featuredArticle['date'] }}</span>
                                    </div>
                                    <a href="{{ route('berita.show', $featuredArticle['slug']) }}" class="btn btn-primary btn-sm rounded-pill px-3 fw-bold shadow-sm">
                                        <span>Baca Berita</span>
                                        <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- 2. ARTICLES GRID -->
            @if ($articles->count() > 0)
                <div class="d-flex align-items-center justify-content-between mb-3 mt-2">
                    <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2" style="font-size: 1.15rem;">
                        <i class="bi bi-grid-fill text-primary"></i>
                        <span>Semua Berita & Artikel Terkini</span>
                    </h5>
                    <span class="badge bg-white border text-secondary rounded-pill px-3 py-2 small shadow-sm">
                        <i class="bi bi-collection-fill text-primary me-1"></i>Menampilkan {{ $articles->total() }} Berita
                    </span>
                </div>

                <div class="row g-4 mb-4">
                    @foreach ($articles as $item)
                        <div class="col-md-6">
                            <div class="news-item-card">
                                <div class="news-item-thumb">
                                    <span class="position-absolute top-0 end-0 m-3 badge {{ $item['category_badge_class'] }} rounded-pill px-3 py-1 small fw-bold shadow-sm" style="z-index: 2;">
                                        {{ $item['category'] }}
                                    </span>
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="news-item-img">
                                </div>
                                <div class="news-item-body">
                                    <div class="news-item-meta">
                                        <span><i class="bi bi-calendar-event text-primary me-1"></i>{{ $item['date'] }}</span>
                                        <span>•</span>
                                        <span><i class="bi bi-clock me-1"></i>{{ $item['read_time'] }}</span>
                                    </div>

                                    <a href="{{ route('berita.show', $item['slug']) }}" class="news-item-title" title="{{ $item['title'] }}">
                                        {{ $item['title'] }}
                                    </a>

                                    <p class="news-item-desc">
                                        {{ $item['excerpt'] }}
                                    </p>

                                    <div class="news-item-footer">
                                        <span class="text-secondary small">
                                            <i class="bi bi-person-fill text-muted me-1"></i>{{ $item['author'] }}
                                        </span>
                                        <a href="{{ route('berita.show', $item['slug']) }}" class="news-readmore-link">
                                            <span>Selengkapnya</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- 3. PAGINATION -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $articles->links('pagination::bootstrap-5') }}
                </div>

            @else
                <!-- EMPTY STATE -->
                <div class="text-center py-5 bg-white rounded-4 border p-4 shadow-sm">
                    <div class="rounded-circle bg-light d-inline-flex p-4 mb-3 text-secondary">
                        <i class="bi bi-search display-5"></i>
                    </div>
                    <h4 class="fw-bold text-dark">Tidak Ada Berita Ditemukan</h4>
                    <p class="text-secondary small mb-3">
                        Maaf, tidak ada artikel atau pengumuman yang sesuai dengan kriteria filter yang Anda pilih.
                    </p>
                    <a href="{{ route('berita.index') }}" class="btn btn-primary rounded-pill px-4 fw-bold">
                        <i class="bi bi-arrow-clockwise me-1"></i>Tampilkan Semua Berita
                    </a>
                </div>
            @endif

        </div>

        <!-- ==========================================
             RIGHT COLUMN: SIDEBAR (4 COLS)
             ========================================== -->
        <div class="col-lg-4">

            <!-- 0. PENCARIAN BERITA WIDGET -->
            <div class="news-sidebar-card">
                <div class="news-sidebar-header">
                    <i class="bi bi-search text-primary fs-5"></i>
                    <span>Cari Berita</span>
                </div>
                <form action="{{ route('berita.index') }}" method="GET">
                    @if (!empty($currentCategory) && $currentCategory !== 'semua')
                        <input type="hidden" name="kategori" value="{{ $currentCategory }}">
                    @endif
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Kata kunci berita..." value="{{ $searchQuery }}">
                        @if (!empty($searchQuery) || !empty($currentCategory) || !empty($currentTag))
                            <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary" title="Reset Filter"><i class="bi bi-x-lg"></i></a>
                        @endif
                        <button class="btn btn-primary px-3" type="submit" title="Cari"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>

            <!-- 1. KATEGORI WIDGET -->
            <div class="news-sidebar-card">
                <div class="news-sidebar-header">
                    <i class="bi bi-folder2-open text-primary fs-5"></i>
                    <span>Kategori Berita</span>
                </div>
                <div>
                    @foreach ($categories as $cat)
                        @php
                            $isCatActive = ($currentCategory === $cat['slug']) || (empty($currentCategory) && $cat['slug'] === 'semua' && empty($searchQuery) && empty($currentTag));
                        @endphp
                        <a href="{{ $cat['slug'] === 'semua' ? route('berita.index') : route('berita.index', ['kategori' => $cat['slug']]) }}"
                           class="news-cat-item {{ $isCatActive ? 'active' : '' }}">
                            <span>{{ $cat['name'] }}</span>
                            <span class="news-cat-count">{{ $cat['count'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- 2. AGENDA & JADWAL KEGIATAN WIDGET -->
            <div class="news-sidebar-card">
                <div class="news-sidebar-header">
                    <i class="bi bi-calendar-check text-success fs-5"></i>
                    <span>Agenda Sekolah Mendatang</span>
                </div>
                <div>
                    @foreach ($upcomingEvents as $ev)
                        <div class="agenda-item-box">
                            <div class="agenda-calendar-box">
                                <span class="agenda-cal-day">{{ $ev['day'] }}</span>
                                <span class="agenda-cal-month">{{ $ev['month'] }}</span>
                            </div>
                            <div>
                                <div class="agenda-text-title">{{ $ev['title'] }}</div>
                                <div class="agenda-text-sub">
                                    <i class="bi bi-geo-alt-fill text-danger"></i>
                                    <span>{{ $ev['location'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

@endsection
