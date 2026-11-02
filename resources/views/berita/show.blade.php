@extends('berita.layout')

@section('title', $article['title'])

@section('meta_description', Str::limit(strip_tags($article['excerpt']), 150))

@section('breadcrumb_extra')
    <i class="bi bi-chevron-right opacity-50" style="font-size: 0.68rem;"></i>
    <a href="{{ route('berita.index', ['kategori' => $article['category_slug']]) }}">{{ $article['category'] }}</a>
    <i class="bi bi-chevron-right opacity-50" style="font-size: 0.68rem;"></i>
    <span class="crumb-active">{{ Str::limit($article['title'], 35) }}</span>
@endsection

@section('banner_badge', 'BERITA & INFORMASI RESMI')

@section('banner_title')
    {{ Str::limit($article['title'], 65) }}
@endsection

@section('banner_desc')
    Publikasi resmi oleh {{ $article['author'] }} • Terbit pada {{ $article['date'] }} di SMK Gema Cyber School.
@endsection

@section('content')

    <div class="row g-4">
        
        <!-- ==========================================
             LEFT COLUMN: ARTICLE DETAIL (8 COLS)
             ========================================== -->
        <div class="col-lg-8">

            <article class="article-main-card">
                
                <!-- Category Badge -->
                <div class="d-flex align-items-center gap-2 mb-2">
                    <a href="{{ route('berita.index', ['kategori' => $article['category_slug']]) }}" class="badge {{ $article['category_badge_class'] }} rounded-pill px-3 py-1 small fw-bold text-decoration-none">
                        {{ $article['category'] }}
                    </a>
                    <span class="badge bg-light text-secondary border rounded-pill px-2 py-1 small">
                        <i class="bi bi-patch-check-fill text-primary me-1"></i>Rilis Resmi
                    </span>
                </div>

                <!-- Article Title -->
                <h1 class="article-title-lg">
                    {{ $article['title'] }}
                </h1>

                <!-- Article Metadata Bar -->
                <div class="article-meta-bar">
                    <div class="article-meta-item">
                        <i class="bi bi-person-circle text-primary"></i>
                        <span class="fw-semibold text-dark">{{ $article['author'] }}</span>
                    </div>
                    <div class="article-meta-item">
                        <i class="bi bi-calendar3 text-primary"></i>
                        <span>{{ $article['date'] }}</span>
                    </div>
                    <div class="article-meta-item">
                        <i class="bi bi-clock text-primary"></i>
                        <span>{{ $article['read_time'] }}</span>
                    </div>
                    <div class="article-meta-item">
                        <i class="bi bi-eye text-primary"></i>
                        <span>{{ number_format($article['views']) }} Kali Dibaca</span>
                    </div>
                </div>

                <!-- Featured Cover Image -->
                <div class="article-cover-box">
                    <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}" class="article-cover-img">
                    @if (!empty($article['image_caption']))
                        <div class="article-cover-caption">
                            <i class="bi bi-camera text-primary me-1"></i>
                            <span>{{ $article['image_caption'] }}</span>
                        </div>
                    @endif
                </div>

                <!-- Rich Article Body -->
                <div class="article-content-body">
                    {!! $article['body'] !!}
                </div>

                <!-- Previous / Next Navigation -->
                <div class="article-nav-wrapper">
                    @if ($prevArticle)
                        <a href="{{ route('berita.show', $prevArticle['slug']) }}" class="article-nav-box text-start">
                            <span class="article-nav-label">
                                <i class="bi bi-arrow-left"></i> Berita Sebelumnya
                            </span>
                            <span class="article-nav-title">
                                {{ $prevArticle['title'] }}
                            </span>
                        </a>
                    @else
                        <div class="article-nav-box opacity-50 bg-light">
                            <span class="article-nav-label"><i class="bi bi-dash"></i> Awal Berita</span>
                            <span class="article-nav-title text-muted">Ini adalah publikasi artikel pertama</span>
                        </div>
                    @endif

                    @if ($nextArticle)
                        <a href="{{ route('berita.show', $nextArticle['slug']) }}" class="article-nav-box text-end">
                            <span class="article-nav-label justify-content-end">
                                Berita Selanjutnya <i class="bi bi-arrow-right"></i>
                            </span>
                            <span class="article-nav-title">
                                {{ $nextArticle['title'] }}
                            </span>
                        </a>
                    @else
                        <div class="article-nav-box opacity-50 bg-light text-end">
                            <span class="article-nav-label justify-content-end">Akhir Berita <i class="bi bi-dash"></i></span>
                            <span class="article-nav-title text-muted">Ini adalah publikasi artikel terbaru</span>
                        </div>
                    @endif
                </div>

                <!-- Back to List Button -->
                <div class="text-center pt-2">
                    <a href="{{ route('berita.index') }}" class="btn btn-outline-primary rounded-pill px-4 fw-bold">
                        <i class="bi bi-arrow-left me-1"></i>Kembali ke Semua Berita
                    </a>
                </div>

            </article>

            <!-- ==========================================
                 RELATED ARTICLES SECTION
                 ========================================== -->
            @if ($relatedArticles->count() > 0)
                <div class="mb-5">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 small fw-bold">REKOMENDASI BACAAN</span>
                            <h3 class="fw-bold text-dark mt-2 mb-0" style="font-size: 1.35rem;">Berita & Publikasi Terkait</h3>
                        </div>
                        <a href="{{ route('berita.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="row g-4">
                        @foreach ($relatedArticles as $rel)
                            <div class="col-md-4">
                                <div class="news-item-card">
                                    <div class="news-item-thumb" style="height: 150px;">
                                        <img src="{{ asset($rel['image']) }}" alt="{{ $rel['title'] }}" class="news-item-img">
                                    </div>
                                    <div class="news-item-body p-3">
                                        <div class="news-item-meta mb-1" style="font-size: 0.7rem;">
                                            <span>{{ $rel['date'] }}</span>
                                        </div>
                                        <a href="{{ route('berita.show', $rel['slug']) }}" class="news-item-title" style="font-size: 0.9rem;" title="{{ $rel['title'] }}">
                                            {{ $rel['title'] }}
                                        </a>
                                        <a href="{{ route('berita.show', $rel['slug']) }}" class="news-readmore-link mt-auto pt-2" style="font-size: 0.76rem;">
                                            <span>Baca</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Kata kunci berita...">
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
                        <a href="{{ $cat['slug'] === 'semua' ? route('berita.index') : route('berita.index', ['kategori' => $cat['slug']]) }}"
                           class="news-cat-item {{ $article['category_slug'] === $cat['slug'] ? 'active' : '' }}">
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
