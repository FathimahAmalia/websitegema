@extends('jurusan.layout')

@section('title', 'Ekstrakurikuler & Pengembangan Bakat')
@section('meta_description', 'Jelajahi ragam pilihan ekstrakurikuler unggulan di SMK Gema Cyber School. Asah minat teknologi, kepemimpinan, olahraga, seni multimedia, bahasa, dan karakter islami.')

@section('extra_css')
<style>
    /* ==========================================================
       1. HERO SECTION STYLES
       ========================================================== */
    .ekskul-hero {
        position: relative;
        display: flex;
        align-items: center;
        min-height: 260px;
        padding: 6.5rem 0 3.25rem;
        background: radial-gradient(circle at 80% 20%, #1e3a8a 0%, #0c1e33 60%, #071220 100%);
        color: #fff;
        overflow: hidden;
    }

    .ekskul-hero-bg-img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center 30%;
        opacity: 0.22;
        mix-blend-mode: luminosity;
    }

    .ekskul-hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(7, 18, 32, 0.94) 0%, rgba(12, 30, 51, 0.88) 50%, rgba(15, 23, 42, 0.82) 100%);
    }

    .ekskul-hero-glow {
        position: absolute;
        top: -20%;
        right: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(37, 99, 235, 0.28) 0%, rgba(37, 99, 235, 0) 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .ekskul-hero-content {
        position: relative;
        z-index: 2;
    }

    .ekskul-breadcrumb {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 1rem;
    }

    .ekskul-breadcrumb a {
        color: #93c5fd;
        text-decoration: none;
        transition: color 0.15s ease;
    }

    .ekskul-breadcrumb a:hover {
        color: #fff;
    }

    .ekskul-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.45rem 1rem;
        background: rgba(37, 99, 235, 0.25);
        border: 1px solid rgba(147, 197, 253, 0.35);
        border-radius: 50rem;
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        color: #bfdbfe;
        text-transform: uppercase;
        margin-bottom: 1.25rem;
        backdrop-filter: blur(8px);
    }

    .ekskul-hero-title {
        font-size: clamp(2.3rem, 4.8vw, 3.6rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.035em;
        margin-bottom: 1.2rem;
    }

    .ekskul-hero-title .highlight {
        background: linear-gradient(135deg, #60a5fa, #38bdf8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .ekskul-hero-desc {
        max-width: 660px;
        font-size: 1.05rem;
        line-height: 1.75;
        color: rgba(255, 255, 255, 0.82);
        margin-bottom: 2rem;
    }

    .ekskul-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.9rem;
        margin-bottom: 0;
    }

    .btn-ekskul-primary {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.82rem 1.6rem;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #fff;
        border: none;
        border-radius: 50rem;
        font-size: 0.9rem;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.35);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-ekskul-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(37, 99, 235, 0.45);
        color: #fff;
    }

    .btn-ekskul-outline {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.82rem 1.45rem;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: #fff;
        border-radius: 50rem;
        font-size: 0.9rem;
        font-weight: 700;
        text-decoration: none;
        backdrop-filter: blur(8px);
        transition: background 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
    }

    .btn-ekskul-outline:hover {
        background: rgba(255, 255, 255, 0.16);
        border-color: rgba(255, 255, 255, 0.45);
        color: #fff;
        transform: translateY(-2px);
    }

    /* ==========================================================
       2. CATALOG FILTER & SEARCH BAR
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
        padding: 0.45rem 1rem;
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
        min-width: 260px;
    }

    .search-input-group i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 0.95rem;
        pointer-events: none;
    }

    .search-input-group input {
        width: 100%;
        padding: 0.52rem 1rem 0.52rem 2.45rem;
        border-radius: 50rem;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        font-size: 0.85rem;
        color: #1e293b;
        transition: border-color 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
    }

    .search-input-group input:focus {
        outline: none;
        background: #fff;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    /* ==========================================================
       4. EXTRACTED CARD COMPONENT
       ========================================================== */
    .ekskul-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease;
        position: relative;
    }

    .ekskul-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 36px rgba(15, 23, 42, 0.08);
        border-color: var(--club-color);
    }

    .ekskul-card-thumb {
        position: relative;
        height: 190px;
        overflow: hidden;
        background: #0f172a;
    }

    .ekskul-card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.4s ease;
    }

    .ekskul-card:hover .ekskul-card-img {
        transform: scale(1.06);
    }

    .ekskul-card-thumb-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(15, 23, 42, 0) 0%, rgba(15, 23, 42, 0.15) 100%);
    }

    .ekskul-card-badges {
        position: absolute;
        top: 0.85rem;
        left: 0.85rem;
        right: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 2;
    }

    .ekskul-category-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.35rem 0.8rem;
        border-radius: 50rem;
        font-size: 0.72rem;
        font-weight: 700;
        background: rgba(15, 23, 42, 0.85);
        color: #fff;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .ekskul-badge-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--club-color);
        color: #fff;
        font-size: 1.05rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
    }

    .ekskul-card-body {
        padding: 1.4rem 1.5rem 1rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .ekskul-card-title {
        font-size: 1.2rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 0.3rem;
        line-height: 1.3;
    }

    .ekskul-card-tagline {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--club-color);
        margin-bottom: 0.85rem;
    }

    .ekskul-card-desc {
        font-size: 0.87rem;
        line-height: 1.65;
        color: #64748b;
        margin-bottom: 1.25rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex-grow: 1;
    }

    .ekskul-card-footer {
        padding: 1rem 1.5rem 1.4rem;
        border-top: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 0.65rem;
        background: #fff;
    }

    .btn-card-detail {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        padding: 0.55rem 0.85rem;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        color: #334155;
        font-size: 0.8rem;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-card-detail:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
        color: #0f172a;
    }

    .btn-card-join {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        padding: 0.55rem 0.85rem;
        background: #2563eb;
        border: 1px solid #2563eb;
        border-radius: 10px;
        color: #fff;
        font-size: 0.8rem;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 3px 10px rgba(37, 99, 235, 0.22);
        transition: all 0.2s ease;
    }

    .btn-card-join:hover {
        background: #1d4ed8;
        border-color: #1d4ed8;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.35);
    }

    /* Empty state */
    .empty-catalog-state {
        padding: 4rem 1.5rem;
        text-align: center;
        background: #fff;
        border: 1px dashed #cbd5e1;
        border-radius: 20px;
    }

    /* ==========================================================
       5. WEEKLY TIMETABLE SECTION
       ========================================================== */
    .timetable-wrapper {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
    }

    .timetable-nav {
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        padding: 0.75rem 1.25rem;
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .timetable-day-tab {
        padding: 0.5rem 1.25rem;
        border-radius: 50rem;
        border: 1px solid transparent;
        background: transparent;
        color: #475569;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .timetable-day-tab:hover {
        color: #0f172a;
        background: rgba(0, 0, 0, 0.04);
    }

    .timetable-day-tab.active {
        background: #0f172a;
        color: #fff;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.25);
    }

    .timetable-content-body {
        padding: 2rem;
    }

    .timetable-item-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-left: 4px solid var(--item-color);
        border-radius: 14px;
        padding: 1.15rem 1.35rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        height: 100%;
    }

    .timetable-item-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
    }

    .timetable-item-time {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.76rem;
        font-weight: 700;
        color: var(--item-color);
        background: #fff;
        padding: 0.25rem 0.65rem;
        border-radius: 50rem;
        border: 1px solid #e2e8f0;
        margin-bottom: 0.6rem;
    }

    .timetable-item-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 0.4rem;
    }

    .timetable-item-meta {
        font-size: 0.8rem;
        color: #64748b;
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    /* ==========================================================
       6. HALL OF FAME / ACHIEVEMENTS
       ========================================================== */
    .achievement-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 1.45rem;
        height: 100%;
        display: flex;
        gap: 1.1rem;
        align-items: flex-start;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .achievement-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.07);
    }

    .achievement-icon {
        width: 48px;
        height: 48px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        font-size: 1.35rem;
        flex-shrink: 0;
        background: #eff6ff;
        color: #2563eb;
    }

    .achievement-badge {
        font-size: 0.68rem;
        font-weight: 700;
        padding: 0.22rem 0.6rem;
        border-radius: 50rem;
        background: #f1f5f9;
        color: #475569;
        display: inline-block;
        margin-bottom: 0.45rem;
    }

    .achievement-title {
        font-size: 0.96rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 0.25rem;
        line-height: 1.35;
    }

    .achievement-event {
        font-size: 0.78rem;
        color: #64748b;
        line-height: 1.45;
        margin-bottom: 0.35rem;
    }

    .achievement-club {
        font-size: 0.74rem;
        font-weight: 700;
        color: #2563eb;
    }

    /* ==========================================================
       7. HOW TO JOIN (STEPS)
       ========================================================== */
    .step-card {
        position: relative;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 1.75rem 1.5rem;
        height: 100%;
    }

    .step-number {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #2563eb;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
        font-weight: 800;
        margin-bottom: 1.2rem;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .step-card h4 {
        font-size: 1.02rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 0.5rem;
    }

    .step-card p {
        font-size: 0.83rem;
        line-height: 1.6;
        color: #64748b;
        margin: 0;
    }

    /* ==========================================================
       8. FAQ ACCORDION
       ========================================================== */
    .faq-accordion .accordion-item {
        border: 1px solid #e2e8f0;
        border-radius: 16px !important;
        margin-bottom: 0.85rem;
        overflow: hidden;
        background: #fff;
    }

    .faq-accordion .accordion-button {
        font-size: 0.95rem;
        font-weight: 700;
        color: #0f172a;
        padding: 1.15rem 1.35rem;
        background: #fff;
        box-shadow: none;
    }

    .faq-accordion .accordion-button:not(.collapsed) {
        color: #2563eb;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .faq-accordion .accordion-body {
        padding: 1.15rem 1.35rem;
        font-size: 0.88rem;
        line-height: 1.7;
        color: #475569;
        background: #fff;
    }

    /* ==========================================================
       9. CTA BANNER
       ========================================================== */
    .ekskul-cta-banner {
        background: radial-gradient(circle at 100% 50%, #1e40af 0%, #0c1e33 70%, #06111f 100%);
        border-radius: 24px;
        padding: 3rem 2.5rem;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .ekskul-cta-glow {
        position: absolute;
        top: -50px;
        left: -50px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(56, 189, 248, 0.25) 0%, transparent 70%);
        pointer-events: none;
    }

    /* ==========================================================
       10. MODAL DETAIL PREMIUM STYLES
       ========================================================== */
    .modal-cover-wrap {
        position: relative;
        height: 220px;
        background: #0c1e33;
        overflow: hidden;
    }

    .modal-cover-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.82;
    }

    .modal-cover-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(12, 30, 51, 0.25) 0%, rgba(12, 30, 51, 0.92) 100%);
    }

    .btn-close-modal-glass {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: rgba(15, 23, 42, 0.65);
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
        cursor: pointer;
        backdrop-filter: blur(8px);
        transition: all 0.2s ease;
        z-index: 10;
    }

    .btn-close-modal-glass:hover {
        background: rgba(239, 68, 68, 0.85);
        border-color: #ef4444;
        color: #fff;
        transform: rotate(90deg);
    }

    .modal-banner-info {
        position: absolute;
        bottom: 1.25rem;
        left: 1.5rem;
        right: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        z-index: 2;
    }

    .modal-banner-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: #fff;
        color: #2563eb;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.65rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.35);
        flex-shrink: 0;
    }

    .modal-banner-category-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.3rem 0.8rem;
        border-radius: 50rem;
        font-size: 0.72rem;
        font-weight: 700;
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        backdrop-filter: blur(8px);
        margin-bottom: 0.35rem;
    }

    .modal-banner-title {
        color: #fff;
        font-size: 1.45rem;
        font-weight: 800;
        line-height: 1.2;
        margin: 0;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .modal-tagline-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.38rem 0.95rem;
        border-radius: 50rem;
        font-size: 0.8rem;
        font-weight: 700;
        background: #eff6ff;
        color: #2563eb;
        border: 1px solid #bfdbfe;
        margin-bottom: 0.75rem;
    }

    .modal-meta-card {
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

    .modal-meta-card:hover {
        transform: translateY(-2px);
        border-color: #cbd5e1;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.07);
    }

    .modal-meta-icon {
        width: 46px;
        height: 46px;
        border-radius: 13px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .modal-meta-label {
        font-size: 0.68rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #94a3b8;
        display: block;
        margin-bottom: 0.15rem;
    }

    .modal-meta-value {
        font-size: 0.86rem;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.35;
        margin: 0;
    }

    .modal-section-title {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        font-size: 0.96rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 0.85rem;
    }

    .modal-section-icon-badge {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.88rem;
        background: #eff6ff;
        color: #2563eb;
    }

    .modal-activity-item {
        background: #f8fafc;
        border: 1px solid #edf2f7;
        border-radius: 12px;
        padding: 0.75rem 1rem;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        transition: all 0.18s ease;
    }

    .modal-activity-item:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
    }

    .modal-activity-bullet {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: #eff6ff;
        color: #2563eb;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.72rem;
        flex-shrink: 0;
        margin-top: 0.1rem;
    }

    .modal-activity-text {
        font-size: 0.85rem;
        color: #334155;
        font-weight: 600;
        line-height: 1.5;
        margin: 0;
    }

    .modal-achievement-card {
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
        border: 1px solid #fde68a;
        border-radius: 16px;
        padding: 1.15rem 1.25rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 4px 16px rgba(245, 158, 11, 0.08);
    }

    .modal-achievement-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: #fef08a;
        color: #b45309;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.45rem;
        flex-shrink: 0;
        box-shadow: 0 4px 10px rgba(180, 83, 9, 0.15);
    }

    .modal-achievement-label {
        font-size: 0.68rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #92400e;
        margin-bottom: 0.2rem;
    }

    .modal-achievement-text {
        font-size: 0.88rem;
        font-weight: 700;
        color: #78350f;
        line-height: 1.4;
        margin: 0;
    }

    .modal-requirement-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-left: 4px solid #2563eb;
        border-radius: 14px;
        padding: 1rem 1.2rem;
        display: flex;
        align-items: flex-start;
        gap: 0.85rem;
    }

    .modal-requirement-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: #eff6ff;
        color: #2563eb;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
        margin-top: 0.1rem;
    }

    .modal-requirement-label {
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #334155;
        margin-bottom: 0.2rem;
    }

    .modal-requirement-text {
        font-size: 0.83rem;
        color: #64748b;
        line-height: 1.55;
        margin: 0;
    }

    /* ==========================================================
       11. REGISTRATION FORM & SUCCESS MODAL STYLES (MODERN TECH)
       ========================================================== */
    .reg-modal-content {
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 25px 60px -15px rgba(15, 23, 42, 0.25);
        overflow: hidden;
        background: #ffffff;
    }

    .reg-modal-header {
        position: relative;
        background: linear-gradient(135deg, #091322 0%, #0f274a 50%, #1e3a8a 100%);
        padding: 1.4rem 1.65rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        overflow: hidden;
    }

    .reg-modal-header::before {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.35), transparent 70%);
        pointer-events: none;
    }

    .reg-modal-header-icon {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.18);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #60a5fa;
        font-size: 1.35rem;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .reg-modal-title {
        color: #ffffff;
        font-weight: 800;
        font-size: 1.25rem;
        letter-spacing: -0.01em;
        margin-bottom: 0.15rem;
    }

    .reg-modal-subtitle {
        color: #94a3b8;
        font-size: 0.8rem;
        font-weight: 500;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        flex-wrap: wrap;
    }

    .reg-modal-close-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        padding: 0;
        font-size: 0.95rem;
        cursor: pointer;
    }

    .reg-modal-close-btn:hover {
        background: rgba(255, 255, 255, 0.22);
        color: #ffffff;
        transform: rotate(90deg);
    }

    .reg-notice-box {
        background: #f0f7ff;
        border: 1px solid #bfdbfe;
        border-radius: 14px;
        padding: 0.85rem 1rem;
        display: flex;
        align-items: center;
        gap: 0.85rem;
        margin-bottom: 1.25rem;
    }

    .reg-notice-icon {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        background: #dbeafe;
        color: #2563eb;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .reg-notice-text {
        font-size: 0.8rem;
        color: #1e40af;
        font-weight: 600;
        line-height: 1.45;
        margin: 0;
    }

    .reg-form-label {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.82rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.45rem;
    }

    .reg-form-label-icon {
        color: #3b82f6;
        font-size: 0.95rem;
    }

    .reg-input {
        background-color: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.65rem 0.95rem;
        font-size: 0.88rem;
        font-weight: 500;
        color: #0f172a;
        transition: all 0.2s ease;
    }

    .reg-input:focus {
        background-color: #ffffff;
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        outline: none;
    }

    .reg-input::placeholder {
        color: #94a3b8;
        font-weight: 400;
        font-size: 0.84rem;
    }

    .reg-input-group-text {
        background-color: #f1f5f9;
        border: 1.5px solid #e2e8f0;
        border-right: none;
        border-radius: 12px 0 0 12px;
        padding: 0.65rem 0.85rem;
        font-size: 0.85rem;
        font-weight: 700;
        color: #475569;
    }

    .reg-input-with-group {
        border-radius: 0 12px 12px 0 !important;
        border-left: 1px solid #e2e8f0;
    }

    .reg-modal-footer {
        background: #f8fafc;
        border-top: 1px solid #edf2f7;
        padding: 1.15rem 1.65rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .reg-btn-cancel {
        border: 1.5px solid #e2e8f0;
        background: #ffffff;
        color: #64748b;
        font-weight: 700;
        font-size: 0.85rem;
        padding: 0.6rem 1.25rem;
        border-radius: 100px;
        transition: all 0.2s ease;
    }

    .reg-btn-cancel:hover {
        background: #f1f5f9;
        color: #0f172a;
        border-color: #cbd5e1;
    }

    .reg-btn-submit {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        color: #ffffff;
        border: none;
        font-weight: 700;
        font-size: 0.88rem;
        padding: 0.65rem 1.6rem;
        border-radius: 100px;
        box-shadow: 0 4px 14px rgba(37, 99, 235, 0.32);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s ease;
    }

    .reg-btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(37, 99, 235, 0.42);
        color: #ffffff;
    }

    /* Success Modal Styling */
    .success-modal-content {
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 25px 60px -15px rgba(15, 23, 42, 0.25);
        background: #ffffff;
        padding: 2.25rem 1.75rem;
        text-align: center;
    }

    .success-modal-badge {
        width: 76px;
        height: 76px;
        border-radius: 50%;
        background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
        border: 4px solid #f0fdf4;
        box-shadow: 0 8px 24px rgba(22, 163, 74, 0.2);
        color: #16a34a;
        font-size: 2.25rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.25rem;
    }

    .success-modal-title {
        font-size: 1.35rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 0.4rem;
    }

    .success-modal-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 1rem 1.15rem;
        font-size: 0.85rem;
        color: #475569;
        line-height: 1.55;
        margin-bottom: 1.25rem;
    }

    .btn-whatsapp-confirm {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #ffffff;
        font-weight: 700;
        font-size: 0.88rem;
        padding: 0.75rem 1.5rem;
        border-radius: 100px;
        box-shadow: 0 6px 18px rgba(16, 185, 129, 0.32);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-whatsapp-confirm:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(16, 185, 129, 0.42);
        color: #ffffff;
    }

    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .ekskul-hero {
            padding: 6.5rem 0 3.5rem;
            min-height: auto;
        }

        .ekskul-hero-title {
            font-size: 2.15rem;
        }

        .timetable-content-body {
            padding: 1.25rem;
        }

        .ekskul-cta-banner {
            padding: 2rem 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<main>
    <!-- ==========================================================
         HERO SECTION: INSPIRING, MODERN & HIGH-TECH
         ========================================================== -->
    <section class="ekskul-hero">
        <img class="ekskul-hero-bg-img" src="{{ asset('images/hero-students-hd.png') }}" alt="Siswa SMK Gema Cyber School" aria-hidden="true">
        <div class="ekskul-hero-overlay"></div>
        <div class="ekskul-hero-glow"></div>

        <div class="container ekskul-hero-content">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <h1 class="ekskul-hero-title mb-0">
                        Eksplorasi Minat, Asah Bakat,<br>
                        Raih <span class="highlight">Prestasi Tertinggi</span>
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================
         SECTION: KATALOG EKSKUL INTERAKTIF (FILTER & REALTIME SEARCH)
         ========================================================== -->
    <section class="py-5" id="katalog-ekskul">
        <div class="container py-lg-3">
            <div class="d-flex flex-column flex-lg-row align-items-lg-end justify-content-between gap-3 mb-4">
                <div>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 small fw-bold mb-2">
                        KATALOG RESMI EKSTRAKURIKULER
                    </span>
                    <h2 class="h2 fw-bold text-dark mt-2 mb-1">
                        Pilih Ekskul Sesuai Passion & Bakatmu
                    </h2>
                    <p class="text-secondary mb-0">
                        Klik kategori atau cari kegiatan yang paling relevan dengan cita-citamu di masa depan.
                    </p>
                </div>

                <div class="text-lg-end">
                    <div class="small text-muted fw-bold">
                        Menampilkan <span id="visibleCount" class="text-primary fw-bolder">{{ count($extracurriculars) }}</span> dari {{ count($extracurriculars) }} ekstrakurikuler
                    </div>
                </div>
            </div>

            <!-- Filter & Search Toolbar -->
            <div class="catalog-header-bar">
                <div class="row g-3 align-items-center">
                    <div class="col-xl-8 col-lg-7">
                        <div class="filter-pills-wrapper">
                            @foreach ($categories as $cat)
                                <button type="button" 
                                        class="filter-pill-btn {{ $loop->first ? 'active' : '' }}" 
                                        data-category="{{ $cat['id'] }}">
                                    <span>{{ $cat['label'] }}</span>
                                    <span class="count-badge">{{ $cat['count'] }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5">
                        <div class="search-input-group">
                            <i class="bi bi-search"></i>
                            <input type="text" id="ekskulSearchInput" placeholder="Cari nama ekskul, minat, atau pembina..." autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Extracurricular Cards Grid -->
            <div class="row g-4" id="ekskulCardsContainer">
                @foreach ($extracurriculars as $club)
                    <div class="col-md-6 col-lg-4 ekskul-card-col" 
                         data-category="{{ $club['category_slug'] }}" 
                         data-name="{{ strtolower($club['name']) }}" 
                         data-instructor="{{ strtolower($club['instructor']) }}"
                         data-description="{{ strtolower($club['description']) }}">
                        
                        <article class="ekskul-card" 
                                 style="--club-color: {{ $club['color'] }}; --club-bg: {{ $club['background'] }};">
                            
                            <!-- Cover Image -->
                            <div class="ekskul-card-thumb">
                                <img src="{{ asset($club['image']) }}" alt="{{ $club['name'] }}" class="ekskul-card-img" loading="lazy">
                                <div class="ekskul-card-thumb-overlay"></div>
                            </div>

                            <div class="ekskul-card-body">
                                <h3 class="ekskul-card-title">{{ $club['name'] }}</h3>
                                <div class="ekskul-card-tagline">{{ $club['tagline'] }}</div>
                                <p class="ekskul-card-desc">{{ $club['description'] }}</p>
                            </div>

                            <!-- Card Footer Actions -->
                            <div class="ekskul-card-footer">
                                <button type="button" 
                                        class="btn-card-detail btn-open-modal-detail"
                                        data-club-id="{{ $club['id'] }}"
                                        data-club-name="{{ $club['name'] }}"
                                        data-club-category="{{ $club['category'] }}"
                                        data-club-image="{{ asset($club['image']) }}"
                                        data-club-tagline="{{ $club['tagline'] }}"
                                        data-club-desc="{{ $club['description'] }}"
                                        data-club-schedule="{{ $club['schedule'] }}"
                                        data-club-location="{{ $club['location'] }}"
                                        data-club-instructor="{{ $club['instructor'] }} ({{ $club['instructor_role'] }})"
                                        data-club-activities="{{ json_encode($club['activities']) }}"
                                        data-club-curriculum="{{ json_encode($club['curriculum']) }}"
                                        data-club-achievements="{{ $club['achievements'] }}"
                                        data-club-requirements="{{ $club['requirements'] }}"
                                        data-club-members="{{ $club['members_count'] }}"
                                        data-club-color="{{ $club['color'] }}"
                                        data-club-icon="{{ $club['icon'] }}">
                                    <i class="bi bi-info-circle"></i>
                                    <span>Detail Lengkap</span>
                                </button>

                                <button type="button" 
                                        class="btn-card-join btn-open-modal-register"
                                        data-club-name="{{ $club['name'] }}">
                                    <i class="bi bi-send-fill"></i>
                                    <span>Daftar</span>
                                </button>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            <!-- Empty Search State (hidden by default) -->
            <div id="emptyCatalogState" class="empty-catalog-state d-none mt-4">
                <div class="display-6 text-muted mb-3"><i class="bi bi-search"></i></div>
                <h4 class="fw-bold text-dark">Tidak Ditemukan Ekstrakurikuler</h4>
                <p class="text-secondary mx-auto" style="max-width: 500px;">
                    Kata kunci atau filter yang Anda pilih tidak cocok dengan kegiatan yang ada. Silakan reset kata kunci pencarian.
                </p>
                <button type="button" id="btnResetFilter" class="btn btn-outline-primary rounded-pill px-4 py-2 mt-2 fw-bold">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Reset Pencarian & Filter
                </button>
            </div>
        </div>
    </section>

    <!-- ==========================================================
         SECTION 3: FAQ ACCORDION
         ========================================================== -->
    <section class="py-5" id="faq-ekskul" style="background: #f8fafc;">
        <div class="container py-lg-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 small fw-bold mb-2">
                            TANYA JAWAB UMUM
                        </span>
                        <h2 class="h2 fw-bold text-dark mt-2 mb-2">
                            Pertanyaan Seputar Ekstrakurikuler
                        </h2>
                        <p class="text-secondary">
                            Jawaban atas pertanyaan yang sering diajukan oleh calon anggota baru dan orang tua siswa.
                        </p>
                    </div>

                    <div class="accordion faq-accordion" id="faqEkskulAccordion">
                        @foreach ($faqs as $idx => $faq)
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="heading-faq-{{ $idx }}">
                                    <button class="accordion-button {{ $idx === 0 ? '' : 'collapsed' }}" 
                                            type="button" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#collapse-faq-{{ $idx }}" 
                                            aria-expanded="{{ $idx === 0 ? 'true' : 'false' }}" 
                                            aria-controls="collapse-faq-{{ $idx }}">
                                        {{ $faq['q'] }}
                                    </button>
                                </h3>
                                <div id="collapse-faq-{{ $idx }}" 
                                     class="accordion-collapse collapse {{ $idx === 0 ? 'show' : '' }}" 
                                     aria-labelledby="heading-faq-{{ $idx }}" 
                                     data-bs-parent="#faqEkskulAccordion">
                                    <div class="accordion-body">
                                        {{ $faq['a'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================
         SECTION 4: CTA BANNER
         ========================================================== -->
    <section class="py-5 pt-0">
        <div class="container">
            <div class="ekskul-cta-banner">
                <div class="ekskul-cta-glow"></div>
                <div class="row align-items-center position-relative z-1">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3 py-1 small fw-bold mb-3">
                            MULAI LANGKAH PRESTASIMU
                        </span>
                        <h2 class="h2 fw-bold text-white mb-2">
                            Siap Menemukan Bakat Terbaik & Berprestasi?
                        </h2>
                        <p class="text-white-50 mb-0" style="max-width: 600px; font-size: 0.95rem; line-height: 1.7;">
                            Pendaftaran ekstrakurikuler semester ini telah dibuka. Pilih kegiatan yang kamu sukai sekarang atau hubungi koordinator kesiswaan kami untuk konsultasi minat bakat.
                        </p>
                    </div>

                    <div class="col-lg-4 text-lg-end">
                        <div class="d-flex flex-column flex-sm-row flex-lg-column gap-2 justify-content-lg-end">
                            <button type="button" 
                                    class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalRegisterEkskul" 
                                    data-club-target="Umum">
                                <i class="bi bi-pencil-square me-2"></i>Daftar Ekskul Sekarang
                            </button>
                            <a href="https://wa.me/6281234567890?text=Halo%20Kesiswaan%20SMK%20Gema,%20saya%20ingin%20konsultasi%20mengenai%20pilihan%20ekstrakurikuler" 
                               target="_blank" 
                               class="btn btn-outline-light rounded-pill px-4 py-2 fw-bold">
                                <i class="bi bi-whatsapp me-2"></i>Tanya Pembina Kesiswaan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- ==========================================================
     MODAL 1: DETAIL LENGKAP EKSKUL (DYNAMIC)
     ========================================================== -->
<div class="modal fade" id="modalDetailEkskul" tabindex="-1" aria-labelledby="modalDetailEkskulLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
            <!-- Modal Cover Banner Image -->
            <div class="modal-cover-wrap">
                <img id="modalClubImg" src="" alt="Cover Ekskul" class="modal-cover-img">
                <div class="modal-cover-overlay"></div>
                
                <!-- Close Button -->
                <button type="button" class="btn-close-modal-glass" data-bs-dismiss="modal" aria-label="Tutup">
                    <i class="bi bi-x-lg"></i>
                </button>

                <!-- Floating Info on Banner -->
                <div class="modal-banner-info">
                    <span id="modalClubIconBox" class="modal-banner-icon">
                        <i class="bi bi-shield-lock-fill"></i>
                    </span>
                    <div>
                        <div class="modal-banner-category-badge">
                            <i class="bi bi-tag-fill text-warning"></i>
                            <span id="modalClubCategory">Kategori</span>
                        </div>
                        <h4 class="modal-banner-title" id="modalClubTitle">Nama Ekskul</h4>
                    </div>
                </div>
            </div>

            <div class="modal-body p-4 p-md-4">
                <!-- Tagline & Description -->
                <div class="mb-4">
                    <div class="modal-tagline-badge">
                        <i class="bi bi-stars"></i>
                        <span id="modalClubTagline">-</span>
                    </div>
                    <p class="text-secondary small mb-0" id="modalClubDesc" style="line-height: 1.75; font-size: 0.88rem;">-</p>
                </div>

                <!-- 4 Info Cards Grid -->
                <div class="row g-3 mb-4">
                    <!-- Jadwal -->
                    <div class="col-sm-6">
                        <div class="modal-meta-card">
                            <div class="modal-meta-icon" style="background: #eff6ff; color: #2563eb;">
                                <i class="bi bi-calendar2-week-fill"></i>
                            </div>
                            <div>
                                <span class="modal-meta-label">Jadwal Latihan</span>
                                <div class="modal-meta-value" id="modalClubSchedule">-</div>
                            </div>
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="col-sm-6">
                        <div class="modal-meta-card">
                            <div class="modal-meta-icon" style="background: #fef2f2; color: #ef4444;">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <span class="modal-meta-label">Tempat Latihan</span>
                                <div class="modal-meta-value" id="modalClubLocation">-</div>
                            </div>
                        </div>
                    </div>

                    <!-- Pembina -->
                    <div class="col-sm-6">
                        <div class="modal-meta-card">
                            <div class="modal-meta-icon" style="background: #ecfdf5; color: #10b981;">
                                <i class="bi bi-person-workspace"></i>
                            </div>
                            <div>
                                <span class="modal-meta-label">Pembina / Pelatih</span>
                                <div class="modal-meta-value" id="modalClubInstructor">-</div>
                            </div>
                        </div>
                    </div>

                    <!-- Anggota -->
                    <div class="col-sm-6">
                        <div class="modal-meta-card">
                            <div class="modal-meta-icon" style="background: #f5f3ff; color: #8b5cf6;">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div>
                                <span class="modal-meta-label">Jumlah Anggota</span>
                                <div class="modal-meta-value" id="modalClubMembers">-</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fokus Utama & Praktik Latihan -->
                <div class="mb-4">
                    <div class="modal-section-title">
                        <span class="modal-section-icon-badge" style="background: #eff6ff; color: #2563eb;">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </span>
                        <span>Fokus Utama & Praktik Latihan</span>
                    </div>
                    <ul class="list-unstyled d-flex flex-column gap-2 mb-0" id="modalClubActivitiesList">
                        <!-- Populated by JS -->
                    </ul>
                </div>

                <!-- Rekam Jejak Prestasi -->
                <div class="modal-achievement-card mb-4">
                    <div class="modal-achievement-icon">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="modal-achievement-label">Rekam Jejak & Prestasi Terkini</div>
                        <div class="modal-achievement-text" id="modalClubAchievements">-</div>
                    </div>
                </div>

                <!-- Syarat & Ketentuan Bergabung -->
                <div class="modal-requirement-card mb-2">
                    <div class="modal-requirement-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <div class="modal-requirement-label">Syarat & Ketentuan Bergabung</div>
                        <p class="modal-requirement-text" id="modalClubRequirements">-</p>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-light border-0 p-3 px-4 d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4 py-2 btn-sm fw-bold" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary rounded-pill px-4 py-2 btn-sm fw-bold shadow-sm d-inline-flex align-items-center gap-2" id="btnModalGoRegister">
                    <i class="bi bi-pencil-square"></i>
                    <span>Daftar Ekskul Ini</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ==========================================================
     MODAL 2: FORM PENDAFTARAN EKSKUL ONLINE
     ========================================================== -->
<div class="modal fade" id="modalRegisterEkskul" tabindex="-1" aria-labelledby="modalRegisterEkskulLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content reg-modal-content">
            <div class="reg-modal-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="reg-modal-header-icon">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <div>
                            <h5 class="reg-modal-title" id="modalRegisterEkskulLabel">Formulir Pendaftaran Ekskul</h5>
                            <p class="reg-modal-subtitle">
                                <span class="badge bg-primary-subtle text-primary-emphasis px-2 py-0.5 rounded-pill" style="font-size: 0.68rem; font-weight: 700;">T.A. 2026/2027</span>
                                <span>• SMK Gema Cyber School</span>
                            </p>
                        </div>
                    </div>
                    <button type="button" class="reg-modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>

            <form id="formEkskulRegister" onsubmit="handleRegistrationSubmit(event)">
                <div class="modal-body p-4">
                    <div class="reg-notice-box">
                        <div class="reg-notice-icon">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <p class="reg-notice-text">
                            Pastikan data NIS dan nomor WhatsApp aktif untuk memudahkan verifikasi pembina & undangan grup ekskul.
                        </p>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label class="reg-form-label">
                            <i class="bi bi-person-fill reg-form-label-icon"></i>
                            <span>Nama Lengkap Siswa</span>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control reg-input" name="student_name" placeholder="Contoh: Muhammad Farhan Pratama" required>
                    </div>

                    <!-- NIS & Kelas -->
                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label class="reg-form-label">
                                <i class="bi bi-card-heading reg-form-label-icon"></i>
                                <span>NIS / NISN</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control reg-input" name="student_nis" placeholder="Contoh: 242510045" required>
                        </div>
                        <div class="col-sm-6">
                            <label class="reg-form-label">
                                <i class="bi bi-mortarboard-fill reg-form-label-icon"></i>
                                <span>Kelas & Jurusan</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select reg-input" name="student_class" required>
                                <option value="" disabled selected>Pilih Kelas...</option>
                                <option value="X TJKT">X TJKT (Jaringan & Cyber)</option>
                                <option value="X AKL">X AKL (Akuntansi)</option>
                                <option value="X MPLB">X MPLB (Perkantoran)</option>
                                <option value="X Logistik">X Logistik</option>
                                <option value="XI TJKT">XI TJKT</option>
                                <option value="XI AKL">XI AKL</option>
                                <option value="XI MPLB">XI MPLB</option>
                                <option value="XI Logistik">XI Logistik</option>
                                <option value="XII TJKT">XII TJKT</option>
                                <option value="XII AKL">XII AKL</option>
                                <option value="XII MPLB">XII MPLB</option>
                                <option value="XII Logistik">XII Logistik</option>
                            </select>
                        </div>
                    </div>

                    <!-- Pilihan Ekskul Utama -->
                    <div class="mb-3">
                        <label class="reg-form-label">
                            <i class="bi bi-star-fill text-warning"></i>
                            <span>Pilihan Ekskul Utama</span>
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select reg-input" id="selectPrimaryClub" name="primary_club" required>
                            <option value="" disabled selected>Pilih salah satu ekskul...</option>
                            @foreach ($extracurriculars as $c)
                                <option value="{{ $c['name'] }}">{{ $c['name'] }} ({{ $c['category'] }})</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilihan Ekskul Kedua -->
                    <div class="mb-3">
                        <label class="reg-form-label">
                            <i class="bi bi-plus-circle text-muted"></i>
                            <span>Pilihan Ekskul Kedua</span>
                            <span class="text-muted fw-normal" style="font-size: 0.76rem;">(Opsional)</span>
                        </label>
                        <select class="form-select reg-input" name="secondary_club">
                            <option value="" selected>-- Tidak ada (Hanya 1 ekskul) --</option>
                            @foreach ($extracurriculars as $c)
                                <option value="{{ $c['name'] }}">{{ $c['name'] }} ({{ $c['category'] }})</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nomor WhatsApp -->
                    <div class="mb-3">
                        <label class="reg-form-label">
                            <i class="bi bi-whatsapp text-success"></i>
                            <span>Nomor WhatsApp Aktif</span>
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text reg-input-group-text">
                                <span class="me-1">🇮🇩</span> +62
                            </span>
                            <input type="tel" class="form-control reg-input reg-input-with-group" name="student_wa" placeholder="81234567890" required>
                        </div>
                    </div>

                    <!-- Alasan & Motivasi -->
                    <div class="mb-1">
                        <label class="reg-form-label">
                            <i class="bi bi-chat-left-quote-fill reg-form-label-icon"></i>
                            <span>Alasan & Motivasi Bergabung</span>
                        </label>
                        <textarea class="form-control reg-input" name="motivation" rows="2" placeholder="Ceritakan singkat minat & bakat yang ingin kamu kembangkan..."></textarea>
                    </div>
                </div>

                <div class="reg-modal-footer">
                    <button type="button" class="btn reg-btn-cancel" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn reg-btn-submit">
                        <i class="bi bi-send-check-fill"></i>
                        <span>Kirim Pendaftaran</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ==========================================================
     MODAL 3: NOTIFIKASI BERHASIL SUBMIT PENDAFTARAN
     ========================================================== -->
<div class="modal fade" id="modalRegistrationSuccess" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
        <div class="modal-content success-modal-content">
            <div class="success-modal-badge">
                <i class="bi bi-check-lg"></i>
            </div>
            <h5 class="success-modal-title">Pendaftaran Terkirim!</h5>
            <div class="success-modal-card" id="successMessageDetail">
                Data pendaftaran Anda telah berhasil dicatat. Silakan hubungi admin pembina via WhatsApp untuk konfirmasi dan bergabung ke grup latihan.
            </div>
            <div class="d-grid gap-2">
                <a href="#" id="btnConfirmWhatsApp" target="_blank" class="btn btn-whatsapp-confirm">
                    <i class="bi bi-whatsapp fs-5"></i>
                    <span>Konfirmasi ke WhatsApp Pembina</span>
                </a>
                <button type="button" class="btn reg-btn-cancel w-100" data-bs-dismiss="modal">
                    Tutup Halaman Ini
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
        // 1. FILTER CATEGORY & LIVE SEARCH
        // ==========================================================
        const filterPills = document.querySelectorAll('.filter-pill-btn');
        const searchInput = document.getElementById('ekskulSearchInput');
        const cardCols = document.querySelectorAll('.ekskul-card-col');
        const visibleCountSpan = document.getElementById('visibleCount');
        const emptyState = document.getElementById('emptyCatalogState');
        const btnResetFilter = document.getElementById('btnResetFilter');

        let currentCategory = 'all';
        let searchQuery = '';

        function updateCatalogView() {
            let visibleCount = 0;

            cardCols.forEach(function (card) {
                const cardCat = card.getAttribute('data-category');
                const cardName = card.getAttribute('data-name') || '';
                const cardInstructor = card.getAttribute('data-instructor') || '';
                const cardDesc = card.getAttribute('data-description') || '';

                const matchesCat = (currentCategory === 'all' || cardCat === currentCategory);
                const matchesSearch = searchQuery === '' || 
                    cardName.includes(searchQuery) || 
                    cardInstructor.includes(searchQuery) || 
                    cardDesc.includes(searchQuery);

                if (matchesCat && matchesSearch) {
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

        filterPills.forEach(function (pill) {
            pill.addEventListener('click', function () {
                filterPills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                currentCategory = this.getAttribute('data-category');
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
                filterPills.forEach(p => p.classList.remove('active'));
                if (filterPills[0]) filterPills[0].classList.add('active');
                updateCatalogView();
            });
        }

        // ==========================================================
        // 2. DETAIL MODAL POPULATION
        // ==========================================================
        const modalDetailEl = document.getElementById('modalDetailEkskul');
        const modalDetail = new bootstrap.Modal(modalDetailEl);

        const modalClubImg = document.getElementById('modalClubImg');
        const modalClubTitle = document.getElementById('modalClubTitle');
        const modalClubCategory = document.getElementById('modalClubCategory');
        const modalClubTagline = document.getElementById('modalClubTagline');
        const modalClubDesc = document.getElementById('modalClubDesc');
        const modalClubSchedule = document.getElementById('modalClubSchedule');
        const modalClubLocation = document.getElementById('modalClubLocation');
        const modalClubInstructor = document.getElementById('modalClubInstructor');
        const modalClubMembers = document.getElementById('modalClubMembers');
        const modalClubActivitiesList = document.getElementById('modalClubActivitiesList');
        const modalClubAchievements = document.getElementById('modalClubAchievements');
        const modalClubRequirements = document.getElementById('modalClubRequirements');
        const modalClubIconBox = document.getElementById('modalClubIconBox');
        const btnModalGoRegister = document.getElementById('btnModalGoRegister');

        let activeDetailClubName = '';

        document.querySelectorAll('.btn-open-modal-detail').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const name = this.getAttribute('data-club-name');
                const category = this.getAttribute('data-club-category');
                const image = this.getAttribute('data-club-image');
                const tagline = this.getAttribute('data-club-tagline');
                const desc = this.getAttribute('data-club-desc');
                const schedule = this.getAttribute('data-club-schedule');
                const location = this.getAttribute('data-club-location');
                const instructor = this.getAttribute('data-club-instructor');
                const members = this.getAttribute('data-club-members');
                const achievements = this.getAttribute('data-club-achievements');
                const requirements = this.getAttribute('data-club-requirements');
                const color = this.getAttribute('data-club-color');
                const icon = this.getAttribute('data-club-icon');

                activeDetailClubName = name;

                if (modalClubImg) modalClubImg.src = image;
                if (modalClubTitle) modalClubTitle.textContent = name;
                if (modalClubCategory) {
                    modalClubCategory.textContent = category;
                    modalClubCategory.style.backgroundColor = color;
                }
                if (modalClubTagline) modalClubTagline.textContent = tagline;
                if (modalClubDesc) modalClubDesc.textContent = desc;
                if (modalClubSchedule) modalClubSchedule.textContent = schedule;
                if (modalClubLocation) modalClubLocation.textContent = location;
                if (modalClubInstructor) modalClubInstructor.textContent = instructor;
                if (modalClubMembers) modalClubMembers.textContent = members;
                if (modalClubAchievements) modalClubAchievements.textContent = achievements;
                if (modalClubRequirements) modalClubRequirements.textContent = requirements;

                if (modalClubIconBox) {
                    modalClubIconBox.innerHTML = `<i class="bi ${icon}"></i>`;
                    modalClubIconBox.style.color = color;
                }

                // Parse activities JSON
                let activities = [];
                try {
                    activities = JSON.parse(this.getAttribute('data-club-activities') || '[]');
                } catch (e) {
                    activities = [];
                }

                if (modalClubActivitiesList) {
                    modalClubActivitiesList.innerHTML = '';
                    if (activities.length > 0) {
                        activities.forEach(function (act) {
                            const li = document.createElement('li');
                            li.className = 'modal-activity-item';
                            li.innerHTML = `
                                <span class="modal-activity-bullet" style="background: color-mix(in srgb, ${color} 15%, white); color: ${color};">
                                    <i class="bi bi-check2"></i>
                                </span>
                                <span class="modal-activity-text">${act}</span>
                            `;
                            modalClubActivitiesList.appendChild(li);
                        });
                    }
                }

                modalDetail.show();
            });
        });

        if (btnModalGoRegister) {
            btnModalGoRegister.addEventListener('click', function () {
                modalDetail.hide();
                setTimeout(function () {
                    openRegistrationWithClub(activeDetailClubName);
                }, 350);
            });
        }

        // ==========================================================
        // 3. REGISTRATION MODAL CONTROLLER
        // ==========================================================
        const modalRegisterEl = document.getElementById('modalRegisterEkskul');
        const modalRegister = new bootstrap.Modal(modalRegisterEl);
        const selectPrimaryClub = document.getElementById('selectPrimaryClub');

        function openRegistrationWithClub(clubName) {
            if (selectPrimaryClub) {
                let found = false;
                for (let i = 0; i < selectPrimaryClub.options.length; i++) {
                    if (selectPrimaryClub.options[i].value === clubName) {
                        selectPrimaryClub.selectedIndex = i;
                        found = true;
                        break;
                    }
                }
                if (!found && selectPrimaryClub.options.length > 0) {
                    selectPrimaryClub.selectedIndex = 0;
                }
            }
            modalRegister.show();
        }

        document.querySelectorAll('.btn-open-modal-register').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const clubName = this.getAttribute('data-club-name');
                openRegistrationWithClub(clubName);
            });
        });
    });

    // Form submission simulation
    function handleRegistrationSubmit(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        const name = formData.get('student_name');
        const nis = formData.get('student_nis');
        const studentClass = formData.get('student_class');
        const primaryClub = formData.get('primary_club');
        const studentWa = formData.get('student_wa');

        // Close register modal
        const modalRegisterEl = document.getElementById('modalRegisterEkskul');
        const modalRegister = bootstrap.Modal.getInstance(modalRegisterEl);
        if (modalRegister) {
            modalRegister.hide();
        }

        // Setup WhatsApp redirect link
        const waText = encodeURIComponent(
            `Halo Pembina Kesiswaan SMK Gema Cyber School,\n\n` +
            `Saya telah mengisi formulir pendaftaran ekskul di website:\n` +
            `• Nama: ${name}\n` +
            `• NIS: ${nis}\n` +
            `• Kelas: ${studentClass}\n` +
            `• Pilihan Ekskul: ${primaryClub}\n` +
            `• No. WA: 0${studentWa}\n\n` +
            `Mohon informasi jadwal latihan perdana dan link grup WhatsApp. Terima kasih!`
        );

        const btnConfirmWhatsApp = document.getElementById('btnConfirmWhatsApp');
        if (btnConfirmWhatsApp) {
            btnConfirmWhatsApp.href = `https://wa.me/6281234567890?text=${waText}`;
        }

        const successMessageDetail = document.getElementById('successMessageDetail');
        if (successMessageDetail) {
            successMessageDetail.innerHTML = `Terima kasih <strong>${name}</strong> (${studentClass}). Pendaftaran untuk <strong>${primaryClub}</strong> berhasil dicatat. Silakan kirim konfirmasi ke WhatsApp kesiswaan di bawah ini.`;
        }

        // Show success modal
        const modalSuccessEl = document.getElementById('modalRegistrationSuccess');
        const modalSuccess = new bootstrap.Modal(modalSuccessEl);
        setTimeout(function () {
            modalSuccess.show();
            form.reset();
        }, 350);
    }
</script>
@endsection
