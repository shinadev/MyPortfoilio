<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Admin Dashboard') — Portfolio
    </title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        /* =========================================================
           ROOT
        ========================================================= */

        :root {
            --admin-bg: #080b12;
            --admin-bg-2: #0d111c;
            --admin-sidebar: #0a0e17;

            --admin-card: rgba(255, 255, 255, 0.045);
            --admin-card-hover: rgba(255, 255, 255, 0.07);

            --admin-border: rgba(255, 255, 255, 0.08);

            --admin-text: #f1f5f9;
            --admin-muted: #8994a7;

            --admin-primary: #378c3f;
            --admin-primary-light: #4caf50;

            --admin-cyan: #22d3ee;

            --sidebar-width: 270px;
            --sidebar-collapsed: 88px;

            --topbar-height: 76px;

            --radius: 16px;

            --shadow:
                0 20px 60px rgba(0, 0, 0, 0.35);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;

            font-family: 'Inter', sans-serif;

            color: var(--admin-text);

            background:
                radial-gradient(
                    circle at 10% 10%,
                    rgba(55, 140, 63, 0.09),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 90% 20%,
                    rgba(34, 211, 238, 0.06),
                    transparent 25%
                ),
                var(--admin-bg);

            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        textarea,
        select {
            font-family: inherit;
        }


        /* =========================================================
           APP WRAPPER
        ========================================================= */

        .admin-wrapper {
            min-height: 100vh;
        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .admin-sidebar {
            position: fixed;

            top: 0;
            left: 0;

            width: var(--sidebar-width);
            height: 100vh;

            z-index: 1050;

            background:
                linear-gradient(
                    180deg,
                    rgba(10, 14, 23, 0.98),
                    rgba(7, 10, 17, 0.98)
                );

            border-right: 1px solid var(--admin-border);

            box-shadow:
                15px 0 50px rgba(0, 0, 0, 0.25);

            transition:
                width .3s ease,
                transform .3s ease;
        }

        .sidebar-inner {
            height: 100%;

            display: flex;
            flex-direction: column;

            padding: 22px 14px;

            overflow-y: auto;
        }

        .sidebar-inner::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-inner::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 20px;
        }


        /* =========================================================
           BRAND
        ========================================================= */

        .admin-brand {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 5px 10px 25px;

            color: white;
        }

        .brand-icon {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background:
                linear-gradient(
                    135deg,
                    var(--admin-primary),
                    #24642a
                );

            color: white;

            font-size: 18px;

            box-shadow:
                0 8px 25px rgba(55, 140, 63, 0.28);
        }

        .brand-text {
            display: flex;
            flex-direction: column;

            line-height: 1.1;
        }

        .brand-name {
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -0.4px;
        }

        .brand-subtitle {
            margin-top: 5px;

            color: var(--admin-muted);

            font-size: 10px;
            font-weight: 600;

            text-transform: uppercase;
            letter-spacing: 1.4px;
        }


        /* =========================================================
           SIDEBAR SECTION
        ========================================================= */

        .sidebar-section-title {
            padding: 10px 12px 8px;

            color: #586477;

            font-size: 10px;
            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 1.4px;
        }


        /* =========================================================
           NAVIGATION
        ========================================================= */

        .admin-nav {
            list-style: none;

            padding: 0;
            margin: 0;
        }

        .admin-nav li {
            margin-bottom: 5px;
        }

        .admin-nav-link {
            position: relative;

            display: flex;
            align-items: center;

            min-height: 46px;

            padding: 0 13px;

            border-radius: 12px;

            color: #929daf;

            font-size: 13px;
            font-weight: 600;

            transition:
                color .2s ease,
                background .2s ease,
                transform .2s ease;
        }

        .admin-nav-link i {
            width: 22px;

            margin-right: 12px;

            text-align: center;

            font-size: 15px;

            color: #6f7a8d;

            transition: color .2s ease;
        }

        .admin-nav-link:hover {
            color: white;

            background:
                rgba(255, 255, 255, 0.045);

            transform: translateX(2px);
        }

        .admin-nav-link:hover i {
            color: var(--admin-primary-light);
        }

        .admin-nav-link.active {
            color: white;

            background:
                linear-gradient(
                    90deg,
                    rgba(55, 140, 63, 0.22),
                    rgba(55, 140, 63, 0.07)
                );

            border: 1px solid rgba(55, 140, 63, 0.18);

            box-shadow:
                inset 0 0 25px rgba(55, 140, 63, 0.035);
        }

        .admin-nav-link.active::before {
            content: "";

            position: absolute;

            left: 0;
            top: 9px;

            width: 3px;
            height: 28px;

            border-radius: 0 5px 5px 0;

            background: var(--admin-primary-light);

            box-shadow:
                0 0 14px rgba(76, 175, 80, 0.55);
        }

        .admin-nav-link.active i {
            color: var(--admin-primary-light);
        }


        /* =========================================================
           SIDEBAR BOTTOM
        ========================================================= */

        .sidebar-bottom {
            margin-top: auto;

            padding-top: 20px;
        }

        .admin-user-card {
            display: flex;
            align-items: center;

            gap: 11px;

            padding: 12px;

            border-radius: 14px;

            background:
                rgba(255, 255, 255, 0.035);

            border: 1px solid var(--admin-border);
        }

        .admin-avatar {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #1e293b,
                    #111827
                );

            border: 1px solid rgba(255,255,255,.08);

            color: #dbeafe;

            font-size: 14px;
        }

        .admin-user-info {
            min-width: 0;
            flex: 1;
        }

        .admin-user-name {
            color: white;

            font-size: 12px;
            font-weight: 700;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .admin-user-role {
            margin-top: 3px;

            color: var(--admin-muted);

            font-size: 10px;
        }

        .logout-btn {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 0;
            border-radius: 10px;

            background: rgba(239, 68, 68, 0.08);

            color: #f87171;

            transition: .2s ease;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.15);

            color: #fca5a5;

            transform: translateY(-1px);
        }


        /* =========================================================
           MAIN PANEL
        ========================================================= */

        .admin-main {
            min-height: 100vh;

            margin-left: var(--sidebar-width);

            transition: margin-left .3s ease;
        }


        /* =========================================================
           TOPBAR
        ========================================================= */

        .admin-topbar {
            position: sticky;

            top: 0;

            z-index: 1000;

            height: var(--topbar-height);

            display: flex;
            align-items: center;

            padding: 0 28px;

            background:
                rgba(8, 11, 18, 0.78);

            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            border-bottom: 1px solid var(--admin-border);
        }

        .topbar-left {
            display: flex;
            align-items: center;

            gap: 14px;
        }

        .mobile-menu-btn {
            width: 42px;
            height: 42px;

            display: none;

            align-items: center;
            justify-content: center;

            border: 1px solid var(--admin-border);

            border-radius: 12px;

            background: rgba(255,255,255,.04);

            color: white;

            cursor: pointer;
        }

        .page-heading {
            display: flex;
            flex-direction: column;
        }

        .page-heading small {
            color: var(--admin-muted);

            font-size: 11px;
            font-weight: 500;
        }

        .page-heading strong {
            margin-top: 2px;

            color: white;

            font-size: 17px;
            font-weight: 700;
        }

        .topbar-right {
            margin-left: auto;

            display: flex;
            align-items: center;

            gap: 12px;
        }

        .view-site {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 10px 15px;

            border: 1px solid var(--admin-border);
            border-radius: 11px;

            color: #aab4c4;

            background: rgba(255,255,255,.035);

            font-size: 12px;
            font-weight: 600;

            transition: .2s ease;
        }

        .view-site:hover {
            color: white;

            background: rgba(255,255,255,.06);

            border-color: rgba(255,255,255,.14);
        }


        /* =========================================================
           CONTENT
        ========================================================= */

        .admin-content {
            padding: 30px;

            min-height: calc(
                100vh - var(--topbar-height) - 80px
            );
        }


        /* =========================================================
           FLASH MESSAGE
        ========================================================= */

        .admin-alert {
            position: relative;

            display: flex;
            align-items: center;

            gap: 12px;

            padding: 14px 17px;

            margin-bottom: 24px;

            border-radius: 13px;

            background:
                rgba(55, 140, 63, 0.08);

            border: 1px solid rgba(55, 140, 63, 0.2);

            color: #b8e6bd;

            font-size: 13px;
        }

        .admin-alert i {
            color: var(--admin-primary-light);
        }


        /* =========================================================
           PAGE HEADER
        ========================================================= */

        .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            margin-bottom: 25px;
        }

        .content-title {
            margin: 0;

            color: white;

            font-size: 25px;
            font-weight: 800;

            letter-spacing: -0.7px;
        }

        .content-subtitle {
            margin-top: 6px;

            color: var(--admin-muted);

            font-size: 13px;
        }


        /* =========================================================
           GENERIC CARDS
        ========================================================= */

        .admin-card {
            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.052),
                    rgba(255,255,255,.025)
                );

            border: 1px solid var(--admin-border);

            border-radius: var(--radius);

            box-shadow: var(--shadow);

            overflow: hidden;
        }

        .admin-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            padding: 20px 22px;

            border-bottom: 1px solid var(--admin-border);
        }

        .admin-card-title {
            margin: 0;

            color: white;

            font-size: 15px;
            font-weight: 700;
        }

        .admin-card-body {
            padding: 22px;
        }


        /* =========================================================
           BUTTONS
        ========================================================= */

        .btn-admin-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 10px 17px;

            border: 0;
            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    var(--admin-primary),
                    #286b2e
                );

            color: white;

            font-size: 12px;
            font-weight: 700;

            box-shadow:
                0 8px 20px rgba(55, 140, 63, 0.18);

            transition: .2s ease;
        }

        .btn-admin-primary:hover {
            color: white;

            transform: translateY(-1px);

            box-shadow:
                0 12px 25px rgba(55, 140, 63, 0.28);
        }


        /* =========================================================
           FORMS
        ========================================================= */

        .admin-content .form-label {
            margin-bottom: 8px;

            color: #cbd5e1;

            font-size: 12px;
            font-weight: 600;
        }

        .admin-content .form-control,
        .admin-content .form-select {
            min-height: 44px;

            color: #e5e7eb;

            background:
                rgba(255,255,255,.035);

            border: 1px solid var(--admin-border);

            border-radius: 10px;

            font-size: 13px;
        }

        .admin-content textarea.form-control {
            min-height: 120px;
        }

        .admin-content .form-control:focus,
        .admin-content .form-select:focus {
            color: white;

            background:
                rgba(255,255,255,.045);

            border-color:
                rgba(55,140,63,.65);

            box-shadow:
                0 0 0 3px rgba(55,140,63,.10);
        }

        .admin-content .form-control::placeholder {
            color: #5f6b7d;
        }

        .admin-content .form-select option {
            color: #111827;
            background: white;
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .admin-table {
            width: 100%;

            margin: 0;

            color: #dbe3ef;

            vertical-align: middle;
        }

        .admin-table thead th {
            padding: 13px 15px;

            color: #7f8b9d;

            background: rgba(255,255,255,.025);

            border-bottom:
                1px solid var(--admin-border);

            font-size: 10px;
            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .8px;
        }

        .admin-table tbody td {
            padding: 15px;

            border-bottom:
                1px solid rgba(255,255,255,.045);

            color: #cbd5e1;

            font-size: 12px;
        }

        .admin-table tbody tr {
            transition: background .2s ease;
        }

        .admin-table tbody tr:hover {
            background:
                rgba(255,255,255,.025);
        }

        .admin-table tbody tr:last-child td {
            border-bottom: 0;
        }


        /* =========================================================
           BADGES
        ========================================================= */

        .admin-badge {
            display: inline-flex;
            align-items: center;

            padding: 5px 9px;

            border-radius: 999px;

            font-size: 10px;
            font-weight: 700;
        }

        .admin-badge-success {
            color: #86efac;

            background:
                rgba(34,197,94,.10);

            border: 1px solid rgba(34,197,94,.15);
        }

        .admin-badge-warning {
            color: #fde68a;

            background:
                rgba(234,179,8,.10);

            border: 1px solid rgba(234,179,8,.15);
        }

        .admin-badge-danger {
            color: #fca5a5;

            background:
                rgba(239,68,68,.10);

            border: 1px solid rgba(239,68,68,.15);
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .admin-footer {
            padding: 22px 30px;

            border-top: 1px solid var(--admin-border);

            color: #626d7e;

            font-size: 11px;

            text-align: center;
        }

        .admin-footer strong {
            color: #8994a7;
        }


        /* =========================================================
           MOBILE OVERLAY
        ========================================================= */

        .sidebar-overlay {
            position: fixed;

            inset: 0;

            z-index: 1040;

            background:
                rgba(0,0,0,.65);

            backdrop-filter: blur(3px);

            opacity: 0;
            visibility: hidden;

            transition: .25s ease;
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 991.98px) {

            .admin-sidebar {
                transform:
                    translateX(-100%);
            }

            .admin-sidebar.open {
                transform:
                    translateX(0);
            }

            .admin-main {
                margin-left: 0;
            }

            .mobile-menu-btn {
                display: inline-flex;
            }

            .admin-topbar {
                padding: 0 18px;
            }

            .admin-content {
                padding: 24px 18px;
            }

            .admin-footer {
                padding: 20px 18px;
            }

            .view-site span {
                display: none;
            }
        }


        @media (max-width: 575.98px) {

            :root {
                --topbar-height: 68px;
            }

            .admin-content {
                padding: 20px 14px;
            }

            .content-title {
                font-size: 21px;
            }

            .content-subtitle {
                font-size: 12px;
            }

            .content-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .admin-card-header,
            .admin-card-body {
                padding: 17px;
            }

            .topbar-right {
                gap: 6px;
            }

            .page-heading small {
                display: none;
            }

            .page-heading strong {
                font-size: 14px;
            }
        }

    </style>

    @stack('styles')

</head>


<body>

<div class="admin-wrapper">

    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

    <aside class="admin-sidebar" id="adminSidebar">

        <div class="sidebar-inner">

            <!-- Brand -->
            <a href="{{ url('admin') }}" class="admin-brand">

                <div class="brand-icon">
                    <i class="fa-solid fa-code"></i>
                </div>

                <div class="brand-text">
                    <span class="brand-name">
                        Portfolio
                    </span>

                    <span class="brand-subtitle">
                        Admin Panel
                    </span>
                </div>

            </a>


            <!-- Main Navigation -->

            <div class="sidebar-section-title">
                Management
            </div>

            <ul class="admin-nav">

                <!-- Dashboard -->
                <li>
                    <a href="{{ url('admin') }}"
                       class="admin-nav-link
                       {{ request()->is('admin') || request()->is('admin/dashboard') ? 'active' : '' }}">

                        <i class="fa-solid fa-chart-pie"></i>

                        <span>Dashboard</span>

                    </a>
                </li>


                <!-- About -->
                <li>
                    <a href="{{ url('admin/about') }}"
                       class="admin-nav-link
                       {{ request()->is('admin/about*') ? 'active' : '' }}">

                        <i class="fa-solid fa-user"></i>

                        <span>About</span>

                    </a>
                </li>


                <!-- Skills -->
                <li>
                    <a href="{{ url('admin/skills') }}"
                       class="admin-nav-link
                       {{ request()->is('admin/skills*') ? 'active' : '' }}">

                        <i class="fa-solid fa-layer-group"></i>

                        <span>Skills</span>

                    </a>
                </li>


                <!-- Projects -->
                <li>
                    <a href="{{ url('admin/project') }}"
                       class="admin-nav-link
                       {{ request()->is('admin/project*') ? 'active' : '' }}">

                        <i class="fa-solid fa-briefcase"></i>

                        <span>Projects</span>

                    </a>
                </li>


                <!-- Experience -->
                <li>
                    <a href="{{ url('admin/experience') }}"
                       class="admin-nav-link
                       {{ request()->is('admin/experience*') ? 'active' : '' }}">

                        <i class="fa-solid fa-timeline"></i>

                        <span>Experience</span>

                    </a>
                </li>


                <!-- Services -->
                <li>
                    <a href="{{ url('admin/services') }}"
                       class="admin-nav-link
                       {{ request()->is('admin/services*') ? 'active' : '' }}">

                        <i class="fa-solid fa-screwdriver-wrench"></i>

                        <span>Services</span>

                    </a>
                </li>


                <!-- Blog -->
                <li>
                    <a href="{{ url('admin/blog') }}"
                       class="admin-nav-link
                       {{ request()->is('admin/blog*') ? 'active' : '' }}">

                        <i class="fa-solid fa-newspaper"></i>

                        <span>Blog</span>

                    </a>
                </li>


                <!-- Contact -->
                <li>
                    <a href="{{ url('admin/contact') }}"
                       class="admin-nav-link
                       {{ request()->is('admin/contact*') ? 'active' : '' }}">

                        <i class="fa-solid fa-envelope"></i>

                        <span>Contact</span>

                    </a>
                </li>

            </ul>


            <!-- System -->

            <div class="sidebar-section-title mt-3">
                System
            </div>

            <ul class="admin-nav">

                <li>
                    <a href="{{ url('/') }}"
                       target="_blank"
                       class="admin-nav-link">

                        <i class="fa-solid fa-arrow-up-right-from-square"></i>

                        <span>View Website</span>

                    </a>
                </li>

            </ul>


            <!-- User -->

            <div class="sidebar-bottom">

                <div class="admin-user-card">

                    <div class="admin-avatar">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>

                    <div class="admin-user-info">

                        <div class="admin-user-name">
                            {{ auth()->user()->name ?? 'Administrator' }}
                        </div>

                        <div class="admin-user-role">
                            Administrator
                        </div>

                    </div>


                    <!-- Logout -->

                    <form action="{{ route('logout') }}"
                          method="POST">

                        @csrf

                        <button type="submit"
                                class="logout-btn"
                                title="Logout">

                            <i class="fa-solid fa-right-from-bracket"></i>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </aside>


    <!-- Mobile overlay -->

    <div class="sidebar-overlay"
         id="sidebarOverlay"></div>


    <!-- =========================================================
         MAIN
    ========================================================== -->

    <main class="admin-main">


        <!-- =====================================================
             TOPBAR
        ====================================================== -->

        <header class="admin-topbar">

            <div class="topbar-left">

                <!-- Mobile button -->

                <button type="button"
                        class="mobile-menu-btn"
                        id="mobileMenuBtn"
                        aria-label="Open menu">

                    <i class="fa-solid fa-bars"></i>

                </button>


                <div class="page-heading">

                    <small>
                        Administration
                    </small>

                    <strong>
                        @yield('page-title', 'Dashboard')
                    </strong>

                </div>

            </div>


            <div class="topbar-right">

                <a href="{{ url('/') }}"
                   target="_blank"
                   class="view-site">

                    <i class="fa-solid fa-globe"></i>

                    <span>
                        View Website
                    </span>

                </a>

            </div>

        </header>


        <!-- =====================================================
             CONTENT
        ====================================================== -->

        <section class="admin-content">


            <!-- Flash message -->

            @if(session('message'))

                <div class="admin-alert">

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        {{ session('message') }}
                    </span>

                </div>

            @endif


            @if(session('success'))

                <div class="admin-alert">

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            <!-- Page content -->

            @yield('content')

        </section>


        <!-- =====================================================
             FOOTER
        ====================================================== -->

        <footer class="admin-footer">

            © {{ date('Y') }}

            <strong>
                Portfolio Management System
            </strong>

            · All rights reserved.

        </footer>

    </main>

</div>


<!-- =============================================================
     BOOTSTRAP
============================================================== -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


<!-- =============================================================
     ADMIN JAVASCRIPT
============================================================== -->

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const sidebar =
            document.getElementById('adminSidebar');

        const menuButton =
            document.getElementById('mobileMenuBtn');

        const overlay =
            document.getElementById('sidebarOverlay');


        function openSidebar() {

            sidebar.classList.add('open');

            overlay.classList.add('show');

            document.body.style.overflow = 'hidden';

        }


        function closeSidebar() {

            sidebar.classList.remove('open');

            overlay.classList.remove('show');

            document.body.style.overflow = '';

        }


        if (menuButton) {

            menuButton.addEventListener(
                'click',
                openSidebar
            );

        }


        if (overlay) {

            overlay.addEventListener(
                'click',
                closeSidebar
            );

        }


        document.querySelectorAll(
            '.admin-nav-link'
        ).forEach(function (link) {

            link.addEventListener(
                'click',
                function () {

                    if (window.innerWidth <= 991) {

                        closeSidebar();

                    }

                }
            );

        });


        window.addEventListener(
            'resize',
            function () {

                if (window.innerWidth > 991) {

                    closeSidebar();

                }

            }
        );

    });

</script>


@stack('scripts')

</body>

</html>

