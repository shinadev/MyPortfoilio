<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'Portfolio')
    </title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        /* =========================================================
           GLOBAL VARIABLES
        ========================================================= */

        :root {

            --bg: #0a0e1a;
            --bg2: #0f1526;

            --card: rgba(255, 255, 255, .04);

            --accent: #378C3F;
            --accent2: #22d3ee;

            --text: #e8ecf4;
            --muted: #94a3b8;

            --border: rgba(255, 255, 255, .08);

        }


        /* =========================================================
           RESET
        ========================================================= */

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

            background: var(--bg);

            color: var(--text);

            font-family: 'Inter', sans-serif;

            overflow-x: hidden;

        }


        a {
            text-decoration: none;
        }


        /* =========================================================
           ANIMATED BACKGROUND
        ========================================================= */

        .aurora {

            position: fixed;

            inset: 0;

            z-index: -2;

            overflow: hidden;

            pointer-events: none;

        }


        .aurora::before,
        .aurora::after {

            content: "";

            position: absolute;

            border-radius: 50%;

            filter: blur(120px);

            opacity: .35;

        }


        .aurora::before {

            width: 600px;

            height: 600px;

            top: -200px;

            left: -150px;

            background:
                radial-gradient(
                    circle,
                    var(--accent),
                    transparent 70%
                );

            animation: floatOne 14s ease-in-out infinite;

        }


        .aurora::after {

            width: 500px;

            height: 500px;

            right: -100px;

            bottom: -150px;

            background:
                radial-gradient(
                    circle,
                    #1e40af,
                    transparent 70%
                );

            animation: floatTwo 18s ease-in-out infinite;

        }


        @keyframes floatOne {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(80px, 60px);
            }

        }


        @keyframes floatTwo {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(-60px, -80px);
            }

        }


        /* =========================================================
           PARTICLES
        ========================================================= */

        #particles {

            position: fixed;

            inset: 0;

            width: 100%;

            height: 100%;

            z-index: -1;

            pointer-events: none;

        }


        /* =========================================================
           NAVBAR
        ========================================================= */

        .glass-nav {

            position: fixed;

            top: 0;

            left: 0;

            right: 0;

            z-index: 1000;

            padding: 14px 0;

            background: rgba(10, 14, 26, .70);

            border-bottom: 1px solid var(--border);

            backdrop-filter: blur(16px);

            -webkit-backdrop-filter: blur(16px);

        }


        .nav-inner {

            max-width: 1200px;

            margin: 0 auto;

            padding: 0 24px;

            display: flex;

            align-items: center;

            justify-content: space-between;

        }


        /* BRAND */

        .brand {

            color: var(--text);

            font-size: 20px;

            font-weight: 900;

            letter-spacing: 1px;

            text-decoration: none;

        }


        .brand span {

            color: var(--accent);

        }


        .brand:hover {

            color: #fff;

        }


        /* NAV LINKS */

        .nav-links {

            display: flex;

            align-items: center;

            gap: 26px;

            list-style: none;

            margin: 0;

            padding: 0;

        }


        .nav-links a {

            position: relative;

            color: var(--muted);

            font-size: 14px;

            font-weight: 600;

            letter-spacing: .4px;

            text-decoration: none;

            transition: .25s ease;

        }


        .nav-links a::after {

            content: "";

            position: absolute;

            left: 0;

            bottom: -7px;

            width: 0;

            height: 2px;

            border-radius: 2px;

            background:
                linear-gradient(
                    90deg,
                    var(--accent),
                    var(--accent2)
                );

            transition: .3s ease;

        }


        .nav-links a:hover {

            color: #fff;

        }


        .nav-links a:hover::after {

            width: 100%;

        }


        /* ACTIVE PAGE */

        .nav-links a.active {

            color: #fff;

        }


        .nav-links a.active::after {

            width: 100%;

        }


        /* LOGIN */

        .login-pill {

            padding: 7px 19px !important;

            border: 1px solid var(--accent) !important;

            border-radius: 50px !important;

            color: #fff !important;

            background: rgba(55, 140, 63, .15);

        }


        .login-pill::after {

            display: none !important;

        }


        .login-pill:hover {

            background: var(--accent) !important;

            box-shadow:
                0 0 25px
                rgba(55, 140, 63, .45);

        }


        /* MOBILE BUTTON */

        .nav-toggle {

            display: none;

            border: 0;

            background: transparent;

            color: #fff;

            font-size: 22px;

            cursor: pointer;

        }


        /* =========================================================
           MAIN CONTENT
        ========================================================= */

        .site-content {

            min-height: calc(100vh - 180px);

            padding-top: 80px;

        }


        /* =========================================================
           FLASH MESSAGE
        ========================================================= */

        .site-alert-wrapper {

            max-width: 1200px;

            margin: 25px auto 0;

            padding: 0 24px;

        }


        .site-alert {

            padding: 14px 18px;

            color: #d1fae5;

            background: rgba(55, 140, 63, .12);

            border: 1px solid rgba(55, 140, 63, .35);

            border-radius: 12px;

            backdrop-filter: blur(10px);

        }


        .site-alert strong {

            color: #fff;

            margin-right: 5px;

        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .footer-wrap {

            margin-top: 70px;

            padding: 44px 20px 30px;

            text-align: center;

            background: rgba(15, 21, 38, .60);

            border-top: 1px solid var(--border);

            backdrop-filter: blur(12px);

            -webkit-backdrop-filter: blur(12px);

        }


        .socials {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 14px;

            list-style: none;

            margin: 0 0 22px;

            padding: 0;

        }


        .socials a {

            width: 46px;

            height: 46px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--muted);

            font-size: 18px;

            background: var(--card);

            border: 1px solid var(--border);

            border-radius: 12px;

            transition: .35s ease;

        }


        .socials a:hover {

            color: #fff;

            background:
                linear-gradient(
                    135deg,
                    var(--accent),
                    var(--accent2)
                );

            border-color: transparent;

            transform: translateY(-5px);

            box-shadow:
                0 10px 25px
                rgba(34, 211, 238, .25);

        }


        .footer-copy {

            margin: 0;

            color: var(--muted);

            font-size: 14px;

        }


        .footer-copy b {

            color: var(--text);

        }


        /* =========================================================
           BACK TO TOP
        ========================================================= */

        .back-to-top {

            position: fixed;

            right: 25px;

            bottom: 25px;

            width: 44px;

            height: 44px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #fff;

            background: rgba(15, 21, 38, .85);

            border: 1px solid var(--border);

            border-radius: 13px;

            backdrop-filter: blur(12px);

            opacity: 0;

            visibility: hidden;

            transform: translateY(10px);

            transition: .3s ease;

            z-index: 900;

        }


        .back-to-top.show {

            opacity: 1;

            visibility: visible;

            transform: translateY(0);

        }


        .back-to-top:hover {

            color: var(--accent2);

            border-color: rgba(34, 211, 238, .4);

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 991px) {

            .nav-links {

                position: fixed;

                top: 63px;

                right: -100%;

                width: min(75vw, 320px);

                height: calc(100vh - 63px);

                flex-direction: column;

                align-items: flex-start;

                gap: 22px;

                padding: 60px 30px;

                background: rgba(15, 21, 38, .98);

                border-left: 1px solid var(--border);

                backdrop-filter: blur(20px);

                transition:
                    right .4s
                    cubic-bezier(.77, 0, .18, 1);

            }


            .nav-links.open {

                right: 0;

            }


            .nav-toggle {

                display: block;

            }

        }


        @media (max-width: 576px) {

            .nav-inner {

                padding: 0 18px;

            }


            .site-content {

                padding-top: 70px;

            }


            .site-alert-wrapper {

                padding: 0 15px;

            }


            .footer-wrap {

                margin-top: 45px;

            }


            .socials {

                gap: 9px;

            }


            .socials a {

                width: 40px;

                height: 40px;

                font-size: 15px;

            }


            .back-to-top {

                right: 15px;

                bottom: 15px;

            }

        }


        /* =========================================================
           OPTIONAL PAGE STACKS
        ========================================================= */

        @stack('styles')

    </style>

</head>


<body>

    <!-- =========================================================
         BACKGROUND
    ========================================================= -->

    <div class="aurora"></div>

    <canvas id="particles"></canvas>


    <!-- =========================================================
         NAVBAR
    ========================================================= -->

    <nav class="glass-nav">

        <div class="nav-inner">

            <!-- BRAND -->

            <a href="{{ url('/') }}" class="brand">

                PORT<span>FOLIO</span>

            </a>


            <!-- MOBILE TOGGLE -->

            <button
                type="button"
                class="nav-toggle"
                onclick="toggleMenu()"
                aria-label="Open navigation"
            >

                <i class="fa-solid fa-bars"></i>

            </button>


            <!-- NAVIGATION -->

            <ul class="nav-links" id="navLinks">

                <li>

                    <a
                        href="{{ url('about') }}"
                        class="{{ request()->is('about') ? 'active' : '' }}"
                    >
                        About
                    </a>

                </li>


                <li>

                    <a
                        href="{{ url('skills') }}"
                        class="{{ request()->is('skills') ? 'active' : '' }}"
                    >
                        Skills
                    </a>

                </li>


                <li>

                    <a
                        href="{{ url('projects') }}"
                        class="{{ request()->is('projects') ? 'active' : '' }}"
                    >
                        Projects
                    </a>

                </li>


                <li>

                    <a
                        href="{{ url('experience') }}"
                        class="{{ request()->is('experience') ? 'active' : '' }}"
                    >
                        Experience
                    </a>

                </li>


                <li>

                    <a
                        href="{{ url('blog') }}"
                        class="{{ request()->is('blog') ? 'active' : '' }}"
                    >
                        Blog
                    </a>

                </li>


                <li>

                    <a
                        href="{{ url('services') }}"
                        class="{{ request()->is('services') ? 'active' : '' }}"
                    >
                        Services
                    </a>

                </li>


                <li>

                    <a
                        href="{{ url('contact') }}"
                        class="{{ request()->is('contact') ? 'active' : '' }}"
                    >
                        Contact
                    </a>

                </li>


                <li>

                    <a
                        href="{{ route('login') }}"
                        class="login-pill"
                    >
                        Login
                    </a>

                </li>

            </ul>

        </div>

    </nav>


    <!-- =========================================================
         SUCCESS MESSAGE
    ========================================================= -->

    @if(session()->has('message'))

        <div class="site-alert-wrapper">

            <div class="site-alert">

                <strong>Success</strong>

                {{ session()->get('message') }}

            </div>

        </div>

    @endif


    <!-- =========================================================
         PAGE CONTENT
    ========================================================= -->

    <main class="site-content">

        @yield('content')

    </main>


    <!-- =========================================================
         FOOTER
    ========================================================= -->

    <footer class="footer-wrap">

        <ul class="socials">

            <li>

                <a href="#" aria-label="Facebook">

                    <i class="fa-brands fa-facebook-f"></i>

                </a>

            </li>


            <li>

                <a href="#" aria-label="Twitter">

                    <i class="fa-brands fa-x-twitter"></i>

                </a>

            </li>


            <li>

                <a href="#" aria-label="RSS">

                    <i class="fa-solid fa-rss"></i>

                </a>

            </li>


            <li>

                <a href="#" aria-label="YouTube">

                    <i class="fa-brands fa-youtube"></i>

                </a>

            </li>


            <li>

                <a href="#" aria-label="LinkedIn">

                    <i class="fa-brands fa-linkedin-in"></i>

                </a>

            </li>


            <li>

                <a href="#" aria-label="GitHub">

                    <i class="fa-brands fa-github"></i>

                </a>

            </li>

        </ul>


        <p class="footer-copy">

            &copy; {{ date('Y') }}

            <b>Portfolio</b>.

            All Rights Reserved.

        </p>

    </footer>


    <!-- =========================================================
         BACK TO TOP
    ========================================================= -->

    <a
        href="#"
        class="back-to-top"
        id="backToTop"
        aria-label="Back to top"
    >

        <i class="fa-solid fa-arrow-up"></i>

    </a>


    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- =========================================================
         GLOBAL JAVASCRIPT
    ========================================================= -->

    <script>

        /* =====================================================
           MOBILE MENU
        ===================================================== */

        function toggleMenu() {

            const navLinks =
                document.getElementById('navLinks');

            navLinks.classList.toggle('open');

        }


        /* Close menu after clicking a link */

        document
            .querySelectorAll('#navLinks a')
            .forEach(function (link) {

                link.addEventListener('click', function () {

                    document
                        .getElementById('navLinks')
                        .classList
                        .remove('open');

                });

            });


        /* =====================================================
           BACK TO TOP
        ===================================================== */

        const backToTop =
            document.getElementById('backToTop');


        window.addEventListener('scroll', function () {

            if (window.scrollY > 400) {

                backToTop.classList.add('show');

            } else {

                backToTop.classList.remove('show');

            }

        });


        backToTop.addEventListener('click', function (event) {

            event.preventDefault();

            window.scrollTo({

                top: 0,

                behavior: 'smooth'

            });

        });


        /* =====================================================
           PARTICLES
        ===================================================== */

        const canvas =
            document.getElementById('particles');

        const ctx =
            canvas.getContext('2d');


        let width;

        let height;

        let particles = [];


        function resizeCanvas() {

            width = canvas.width =
                window.innerWidth;

            height = canvas.height =
                window.innerHeight;

        }


        function createParticles() {

            particles = [];


            const count =
                Math.min(
                    70,
                    Math.floor(window.innerWidth / 18)
                );


            for (let i = 0; i < count; i++) {

                particles.push({

                    x: Math.random() * width,

                    y: Math.random() * height,

                    radius:
                        Math.random() * 1.6 + .4,

                    velocityX:
                        (Math.random() - .5) * .3,

                    velocityY:
                        (Math.random() - .5) * .3,

                    opacity:
                        Math.random() * .5 + .15

                });

            }

        }


        function drawParticles() {

            ctx.clearRect(
                0,
                0,
                width,
                height
            );


            particles.forEach(function (particle) {

                particle.x +=
                    particle.velocityX;

                particle.y +=
                    particle.velocityY;


                if (particle.x < 0) {

                    particle.x = width;

                }


                if (particle.x > width) {

                    particle.x = 0;

                }


                if (particle.y < 0) {

                    particle.y = height;

                }


                if (particle.y > height) {

                    particle.y = 0;

                }


                ctx.beginPath();


                ctx.arc(
                    particle.x,
                    particle.y,
                    particle.radius,
                    0,
                    Math.PI * 2
                );


                ctx.fillStyle =
                    `rgba(120,220,150,${particle.opacity})`;


                ctx.fill();

            });


            requestAnimationFrame(drawParticles);

        }


        resizeCanvas();

        createParticles();

        drawParticles();


        window.addEventListener(
            'resize',
            function () {

                resizeCanvas();

                createParticles();

            }
        );

    </script>


    @stack('scripts')

</body>

</html>

