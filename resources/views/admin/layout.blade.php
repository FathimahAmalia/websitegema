<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - SMK Gema Cyber School</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --admin-sidebar-bg: #0f172a;
            --admin-sidebar-hover: #1e293b;
            --admin-sidebar-active: #2563eb;
            --admin-sidebar-text: #94a3b8;
            --admin-sidebar-width: 260px;
            --admin-header-height: 68px;
            --admin-primary: #2563eb;
            --admin-primary-dark: #1d4ed8;
            --admin-bg: #f8fafc;
            --admin-card-border: #e2e8f0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--admin-bg);
            color: #1e293b;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Sidebar Styling */
        .admin-sidebar {
            width: var(--admin-sidebar-width);
            background: var(--admin-sidebar-bg);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1030;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            height: var(--admin-header-height);
            display: flex;
            align-items: center;
            padding: 0 1.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            text-decoration: none;
        }

        .sidebar-brand .brand-logo {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            color: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            font-weight: 800;
            margin-right: 0.75rem;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
        }

        .sidebar-brand .brand-text {
            color: #ffffff;
            font-weight: 800;
            font-size: 0.95rem;
            line-height: 1.2;
            letter-spacing: -0.2px;
        }

        .sidebar-brand .brand-sub {
            color: #38bdf8;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            padding: 1rem 0.75rem;
            list-style: none;
            margin: 0;
            flex-grow: 1;
            overflow-y: auto;
        }

        .menu-label {
            color: #64748b;
            font-size: 0.68rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.9px;
            padding: 0.85rem 0.75rem 0.35rem;
            margin-top: 0.5rem;
        }

        .menu-label:first-child {
            margin-top: 0;
            padding-top: 0.25rem;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 0.65rem 0.85rem;
            color: var(--admin-sidebar-text);
            text-decoration: none;
            border-radius: 9px;
            font-size: 0.86rem;
            font-weight: 500;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            margin-bottom: 3px;
        }

        .sidebar-menu li a i {
            font-size: 1.1rem;
            margin-right: 0.75rem;
            width: 22px;
            text-align: center;
            color: #94a3b8;
            transition: color 0.2s ease, transform 0.2s ease;
        }

        .sidebar-menu li a:hover {
            color: #ffffff;
            background: var(--admin-sidebar-hover);
        }

        .sidebar-menu li a:hover i {
            color: #38bdf8;
            transform: translateX(2px);
        }

        .sidebar-menu li.active a {
            color: #ffffff;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            font-weight: 600;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.4);
        }

        .sidebar-menu li.active a i {
            color: #ffffff;
        }

        .sidebar-footer {
            padding: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.2);
        }

        /* Topbar Header */
        .admin-header {
            height: var(--admin-header-height);
            background: #ffffff;
            border-bottom: 1px solid var(--admin-card-border);
            position: fixed;
            top: 0;
            right: 0;
            left: var(--admin-sidebar-width);
            z-index: 1020;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.75rem;
            transition: left 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Main Content Wrapper */
        .admin-main {
            margin-left: var(--admin-sidebar-width);
            margin-top: var(--admin-header-height);
            padding: 1.75rem;
            min-height: calc(100vh - var(--admin-header-height));
            transition: margin-left 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Mobile Responsive */
        @media (max-width: 991.98px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-header {
                left: 0;
                padding: 0 1rem;
            }
            .admin-main {
                margin-left: 0;
                padding: 1.15rem;
            }
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(15, 23, 42, 0.65);
                backdrop-filter: blur(4px);
                z-index: 1025;
            }
            .sidebar-overlay.show {
                display: block;
            }
        }

        /* Card Styles */
        .card-stat {
            background: #ffffff;
            border: 1px solid var(--admin-card-border);
            border-radius: 16px;
            padding: 1.35rem;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
            height: 100%;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .card-stat:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
            border-color: #cbd5e1;
            color: inherit;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            flex-shrink: 0;
        }

        /* Modern Table Card System */
        .card-table {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.05);
            margin-bottom: 1.5rem;
        }

        .card-table .card-header {
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.15rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .table-admin {
            margin-bottom: 0;
            width: 100%;
        }

        .table-admin thead th {
            background-color: #f8fafc;
            color: #64748b;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .table-admin tbody td {
            padding: 1.05rem 1.25rem;
            vertical-align: middle;
            color: #1e293b;
            font-size: 0.875rem;
            border-bottom: 1px solid #f1f5f9;
            background-color: #ffffff;
            transition: background-color 0.15s ease;
        }

        .table-admin tbody tr:hover td {
            background-color: #f8fafc;
        }

        .table-admin tbody tr:last-child td {
            border-bottom: none;
        }

        /* Table Thumbnails */
        .table-thumb {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            overflow: hidden;
            border: 1.5px solid #e2e8f0;
            box-shadow: 0 2px 6px rgba(15, 23, 42, 0.06);
            flex-shrink: 0;
            background: #f1f5f9;
            display: inline-block;
            position: relative;
        }

        .table-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.25s ease;
        }

        .table-thumb:hover img {
            transform: scale(1.08);
        }

        /* Action Buttons */
        .action-cluster {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-action-icon {
            width: 34px;
            height: 34px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            font-size: 0.88rem;
            border: 1px solid transparent;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none;
        }

        .btn-action-view {
            background-color: #f0f9ff;
            color: #0284c7;
            border-color: #e0f2fe;
        }

        .btn-action-view:hover {
            background-color: #0284c7;
            color: #ffffff;
            border-color: #0284c7;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(2, 132, 199, 0.25);
        }

        .btn-action-edit {
            background-color: #eff6ff;
            color: #2563eb;
            border-color: #dbeafe;
        }

        .btn-action-edit:hover {
            background-color: #2563eb;
            color: #ffffff;
            border-color: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.25);
        }

        .btn-action-delete {
            background-color: #fef2f2;
            color: #dc2626;
            border-color: #fee2e2;
        }

        .btn-action-delete:hover {
            background-color: #dc2626;
            color: #ffffff;
            border-color: #dc2626;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(220, 38, 38, 0.25);
        }

        /* Filter Bar Card */
        .admin-filter-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
        }

        .admin-filter-card .form-control,
        .admin-filter-card .form-select {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.6rem 0.9rem;
            font-size: 0.875rem;
            color: #1e293b;
            background-color: #f8fafc;
            transition: all 0.2s ease;
        }

        .admin-filter-card .form-control:focus,
        .admin-filter-card .form-select:focus {
            background-color: #ffffff;
            border-color: #93c5fd;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .btn-admin-filter {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #ffffff;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.6rem 1.25rem;
            border: none;
            box-shadow: 0 3px 10px rgba(37, 99, 235, 0.2);
            transition: all 0.2s ease;
        }

        .btn-admin-filter:hover {
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.3);
            transform: translateY(-1px);
        }

        /* Buttons & Badges */
        .btn-admin-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 10px;
            padding: 0.65rem 1.25rem;
            border: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.25);
            text-decoration: none;
        }

        .btn-admin-primary:hover {
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
            color: #ffffff;
            box-shadow: 0 6px 18px rgba(37, 99, 235, 0.35);
            transform: translateY(-1px);
        }

        /* KPI Mini Cards */
        .kpi-mini-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 1.15rem 1.25rem;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.2s ease;
            text-decoration: none;
            color: inherit;
        }

        .kpi-mini-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.07);
            border-color: #cbd5e1;
            color: inherit;
        }

        .kpi-mini-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        /* Badges & Medals */
        .badge-year {
            background-color: #f8fafc;
            color: #475569;
            border: 1px solid #e2e8f0;
            font-family: 'JetBrains Mono', SFMono-Regular, monospace;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.25rem 0.65rem;
            border-radius: 6px;
        }

        .badge-medal-gold {
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            color: #92400e;
            border: 1px solid #fde68a;
            font-weight: 700;
            font-size: 0.78rem;
            padding: 0.38rem 0.75rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .badge-medal-silver {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #334155;
            border: 1px solid #cbd5e1;
            font-weight: 700;
            font-size: 0.78rem;
            padding: 0.38rem 0.75rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .badge-medal-bronze {
            background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
            color: #9a3412;
            border: 1px solid #fed7aa;
            font-weight: 700;
            font-size: 0.78rem;
            padding: 0.38rem 0.75rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .badge-medal-default {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
            font-weight: 600;
            font-size: 0.78rem;
            padding: 0.38rem 0.75rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .badge-level-nasional {
            background-color: #eff6ff;
            color: #1e40af;
            border: 1px solid #bfdbfe;
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.32rem 0.75rem;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .badge-level-internasional {
            background-color: #faf5ff;
            color: #6b21a8;
            border: 1px solid #e9d5ff;
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.32rem 0.75rem;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .badge-level-provinsi {
            background-color: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.32rem 0.75rem;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .badge-level-kota {
            background-color: #f0f9ff;
            color: #0369a1;
            border: 1px solid #bae6fd;
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.32rem 0.75rem;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* Modern Form Design System */
        .card-form {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.04);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .card-form .card-header {
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.15rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-form .card-body {
            padding: 1.5rem;
        }

        .form-label-modern {
            font-weight: 600;
            font-size: 0.82rem;
            color: #334155;
            margin-bottom: 0.45rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-control-modern,
        .form-select-modern {
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.65rem 0.95rem;
            font-size: 0.88rem;
            color: #1e293b;
            background-color: #f8fafc;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            width: 100%;
        }

        .form-control-modern:focus,
        .form-select-modern:focus {
            background-color: #ffffff;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
            outline: none;
        }

        .form-helper-text {
            font-size: 0.75rem;
            color: #64748b;
            margin-top: 0.35rem;
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Mobile Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Admin Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <!-- Brand Header -->
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <div class="brand-logo">
                <i class="bi bi-shield-check"></i>
            </div>
            <div>
                <div class="brand-text">SMK GEMA CYBER</div>
                <div class="brand-sub">ADMINISTRATOR CMS</div>
            </div>
        </a>

        <!-- Sidebar Navigation Menu -->
        <ul class="sidebar-menu">
            <li class="menu-label">Utama</li>
            <li class="{{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-label">Manajemen Konten & Akademik</li>
            <li class="{{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                <a href="{{ route('admin.berita.index') }}">
                    <i class="bi bi-newspaper"></i>
                    <span>Berita & Artikel</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.jurusan*') ? 'active' : '' }}">
                <a href="{{ route('admin.jurusan.index') }}">
                    <i class="bi bi-mortarboard-fill"></i>
                    <span>Program Keahlian</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.ekstrakurikuler*') ? 'active' : '' }}">
                <a href="{{ route('admin.ekstrakurikuler.index') }}">
                    <i class="bi bi-stars"></i>
                    <span>Ekstrakurikuler</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.prestasi*') ? 'active' : '' }}">
                <a href="{{ route('admin.prestasi.index') }}">
                    <i class="bi bi-trophy-fill"></i>
                    <span>Prestasi Siswa</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
                <a href="{{ route('admin.galeri.index') }}">
                    <i class="bi bi-images"></i>
                    <span>Galeri Dokumentasi</span>
                </a>
            </li>

            <li class="menu-label">Layanan Siswa & Publik</li>
            <li class="{{ request()->routeIs('admin.ppdb*') ? 'active' : '' }}">
                <a href="{{ route('admin.ppdb.index') }}" class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-lines-fill"></i>
                        <span>PPDB Online</span>
                    </div>
                    @php
                        $pendingCount = \App\Models\PpdbPendaftaran::where('status', 'Menunggu Verifikasi')->count();
                    @endphp
                    @if($pendingCount > 0)
                        <span class="badge bg-warning text-dark fw-bold rounded-pill px-2 py-0.5" style="font-size: 0.72rem;">{{ $pendingCount }}</span>
                    @endif
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.pesan*') ? 'active' : '' }}">
                <a href="{{ route('admin.pesan.index') }}" class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-envelope-fill"></i>
                        <span>Pesan Masuk</span>
                    </div>
                    @php
                        $unreadCount = \App\Models\PesanKontak::where('status_dibaca', false)->count();
                    @endphp
                    @if($unreadCount > 0)
                        <span class="badge bg-danger rounded-pill px-2 py-0.5" style="font-size: 0.72rem;">{{ $unreadCount }}</span>
                    @endif
                </a>
            </li>

            <li class="menu-label">Akses & Sistem</li>
            <li>
                <a href="{{ url('/') }}" target="_blank">
                    <i class="bi bi-box-arrow-up-right"></i>
                    <span>Buka Web Utama</span>
                </a>
            </li>
        </ul>

        <!-- Sidebar Footer Profile -->
        <div class="sidebar-footer">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2 overflow-hidden">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 36px; height: 36px; flex-shrink: 0; font-size: 0.9rem;">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="text-truncate">
                        <div class="text-white small fw-bold text-truncate">{{ Auth::user()->name ?? 'Administrator' }}</div>
                        <div class="text-white-50 text-truncate" style="font-size: 0.72rem;">{{ Auth::user()->email ?? 'admin@smkgemacyber.sch.id' }}</div>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" class="m-0" onsubmit="return confirm('Apakah Anda yakin ingin keluar dari panel admin?');">
                    @csrf
                    <button type="submit" class="btn btn-sm text-white-50 p-1.5 hover-danger border-0" title="Keluar / Logout">
                        <i class="bi bi-box-arrow-right fs-5"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Topbar Header -->
    <header class="admin-header">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-light d-lg-none p-1.5 px-2.5 border rounded-3" id="sidebarToggle" title="Menu Navigasi">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div>
                <h6 class="mb-0 fw-bold text-dark">@yield('page_title', 'Dashboard')</h6>
                <small class="text-muted d-none d-sm-block">SMK Gema Cyber School • Panel Administrator Terpadu</small>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2.5">
            <!-- Realtime Date Badge -->
            <div class="d-none d-md-flex align-items-center gap-2 bg-light border px-3 py-1.5 rounded-pill text-secondary small fw-medium">
                <i class="bi bi-calendar3 text-primary"></i>
                <span id="currentDateDisplay">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            </div>

            <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-secondary btn-sm d-none d-sm-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-3">
                <i class="bi bi-globe2 text-primary"></i>
                <span>Lihat Web</span>
            </a>

            <!-- User Menu Dropdown -->
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle d-flex align-items-center gap-2 border px-2.5 py-1.5 rounded-3" type="button" data-bs-toggle="dropdown">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 26px; height: 26px; font-size: 0.75rem;">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    <span class="d-none d-md-inline small fw-semibold text-dark">{{ Auth::user()->name ?? 'Admin' }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 rounded-3" style="min-width: 220px;">
                    <li class="px-3 py-2.5 border-bottom bg-light bg-opacity-50">
                        <p class="mb-0 fw-bold small text-dark">{{ Auth::user()->name ?? 'Administrator' }}</p>
                        <p class="mb-1 text-muted" style="font-size: 0.75rem;">{{ Auth::user()->email ?? 'admin@smkgemacyber.sch.id' }}</p>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle" style="font-size: 0.68rem;">Super Administrator</span>
                    </li>
                    <li>
                        <a class="dropdown-item py-2 small d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-grid-1x2 text-primary"></i>
                            <span>Ringkasan Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2 small d-flex align-items-center gap-2" href="{{ route('admin.ppdb.index') }}">
                            <i class="bi bi-person-lines-fill text-success"></i>
                            <span>Verifikasi PPDB Online</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2 small d-flex align-items-center gap-2" href="{{ url('/') }}" target="_blank">
                            <i class="bi bi-box-arrow-up-right text-info"></i>
                            <span>Buka Beranda Publik</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST" class="m-0" onsubmit="return confirm('Apakah Anda yakin ingin keluar dari panel admin?');">
                            @csrf
                            <button type="submit" class="dropdown-item py-2 small text-danger d-flex align-items-center gap-2">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Keluar (Logout)</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="admin-main">
        <!-- Flash Message Alerts -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-3 shadow-sm border-0 rounded-4 p-3 mb-4" role="alert">
                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center p-2" style="width: 32px; height: 32px; flex-shrink: 0;">
                    <i class="bi bi-check-lg fw-bold"></i>
                </div>
                <div class="small fw-semibold text-dark flex-grow-1">{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-3 shadow-sm border-0 rounded-4 p-3 mb-4" role="alert">
                <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center p-2" style="width: 32px; height: 32px; flex-shrink: 0;">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <div class="small fw-semibold text-dark flex-grow-1">{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show d-flex align-items-center gap-3 shadow-sm border-0 rounded-4 p-3 mb-4" role="alert">
                <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center p-2" style="width: 32px; height: 32px; flex-shrink: 0;">
                    <i class="bi bi-info-circle-fill"></i>
                </div>
                <div class="small fw-semibold text-dark flex-grow-1">{{ session('info') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 rounded-4 p-3 mb-4" role="alert">
                <div class="d-flex align-items-center gap-2 mb-2 text-danger">
                    <i class="bi bi-exclamation-octagon-fill fs-5"></i>
                    <strong class="small">Mohon periksa kembali formulir input Anda:</strong>
                </div>
                <ul class="mb-0 small ps-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Page Content -->
        @yield('content')
    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle mobile sidebar
        const sidebarToggle = document.getElementById('sidebarToggle');
        const adminSidebar = document.getElementById('adminSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (sidebarToggle && adminSidebar && sidebarOverlay) {
            sidebarToggle.addEventListener('click', function () {
                adminSidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
            });

            sidebarOverlay.addEventListener('click', function () {
                adminSidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
