<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Portfolio')</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        /* =========================================
           GLOBAL
        ========================================= */

        :root {
            --bg: #0a0e1a;
            --bg2: #0f1526;

            --card: rgba(255, 255, 255, .045);
            --card-hover: rgba(255, 255, 255, .07);

            --accent: #378C3F;
            --accent2: #22d3ee;

            --text: #e8ecf4;
            --muted: #94a3b8;

            --border: rgba(255, 255, 255, .08);

            --shadow: 0 20px 60px rgba(0, 0, 0, .35);
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

            font-family: "Inter", sans-serif;

            color: var(--text);

            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(55, 140, 63, .12),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 90% 10%,
                    rgba(34, 211, 238, .10),
                    transparent 30%
                ),
                var(--bg);

            overflow-x: hidden;
        }


        a {
            text-decoration: none;
        }


        /* =========================================
           AURORA BACKGROUND
        ========================================= */

        .aurora {
            position: fixed;

            inset: 0;

            z-index: -3;

            overflow: hidden;

            pointer-events: none;
        }


        .aurora::before,
        .aurora::after {

            content: "";

            position: absolute;

            width: 500px;
            height: 500px;

            border-radius: 50%;

            filter: blur(110px);

            opacity: .12;

            animation: auroraFloat 12s ease-in-out infinite alternate;
        }


        .aurora::before {

            background: var(--accent);

            top: -180px;
            left: -150px;
        }


        .aurora::after {

            background: var(--accent2);

            right: -150px;
            bottom: -180px;

            animation-delay: -5s;
        }


        @keyframes auroraFloat {

            from {
                transform: translate(0, 0) scale(1);
            }

            to {
                transform: translate(80px, 50px) scale(1.15);
            }

        }


        /* =========================================
           PARTICLES
        ========================================= */

        #particles {

            position: fixed;

            inset: 0;

            z-index: -2;

            pointer-events: none;
        }


        /* =========================================
           NAVBAR
        ========================================= */

        .portfolio-navbar {

            position: fixed;

            top: 18px;
            left: 50%;

            transform: translateX(-50%);

            width: min(1180px, calc(100% - 30px));

            z-index: 1000;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 14px 20px;

            background: rgba(10, 14, 26, .72);

            border: 1px solid var(--border);

            border-radius: 18px;

            backdrop-filter: blur(18px);

            -webkit-backdrop-filter: blur(18px);

            box-shadow: var(--shadow);
        }


        .portfolio-brand {

            color: #fff;

            font-size: 19px;

            font-weight: 800;

            letter-spacing: .5px;
        }


        .portfolio-brand span {

            color: var(--accent2);
        }


        .portfolio-nav {

            display: flex;

            align-items: center;

            gap: 5px;
        }


        .portfolio-nav a {

            color: var(--muted);

            font-size: 13px;

            font-weight: 600;

            padding: 9px 12px;

            border-radius: 10px;

            transition: .25s ease;
        }


        .portfolio-nav a:hover {

            color: #fff;

            background: rgba(55, 140, 63, .13);
        }


        .portfolio-nav a.active {

            color: #fff;

            background: rgba(55, 140, 63, .15);
        }


        .portfolio-login {

            color: var(--accent2) !important;

            border: 1px solid rgba(34, 211, 238, .25);
        }


        .portfolio-login:hover {

            background: rgba(34, 211, 238, .10) !important;
        }


        /* MOBILE BUTTON */

        .portfolio-menu-button {

            display: none;

            border: 0;

            background: transparent;

            color: #fff;

            font-size: 21px;

            cursor: pointer;
        }


        /* =========================================
           MAIN CONTENT
        ========================================= */

        .portfolio-main {

            width: min(1180px, calc(100% - 30px));

            margin: 0 auto;

            padding-top: 125px;

            min-height: calc(100vh - 160px);
        }


        /* =========================================
           ALERT
        ========================================= */

        .portfolio-alert {

            margin: 0 auto 25px;

            padding: 14px 18px;

            max-width: 1180px;

            color: #d1fae5;

            background: rgba(55, 140, 63, .10);

            border: 1px solid rgba(55, 140, 63, .25);

            border-radius: 14px;

            backdrop-filter: blur(12px);

            font-size: 13px;
        }


        .portfolio-alert strong {

            color: #fff;

            margin-right: 5px;
        }


        /* =========================================
           FOOTER
        ========================================= */

        .portfolio-footer {

            margin-top: 70px;

            padding: 35px 20px;

            text-align: center;

            background: rgba(10, 14, 26, .65);

            border-top: 1px solid var(--border);

            backdrop-filter: blur(15px);
        }


        .portfolio-social {

            display: flex;

            justify-content: center;

            gap: 10px;

            list-style: none;

            margin-bottom: 20px;
        }


        .portfolio-social a {

            width: 42px;

            height: 42px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--muted);

            background: rgba(255, 255, 255, .025);

            border: 1px solid var(--border);

            border-radius: 12px;

            transition: .25s ease;
        }


        .portfolio-social a:hover {

            color: var(--accent2);

            border-color: rgba(34, 211, 238, .3);

            transform: translateY(-3px);
        }


        .portfolio-footer p {

            color: var(--muted);

            font-size: 12px;
        }


        .portfolio-footer strong {

            color: var(--text);
        }


        /* =========================================
           BACK TO TOP
        ========================================= */

        .portfolio-top {

            position: fixed;

            right: 25px;

            bottom: 25px;

            width: 44px;

            height: 44px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #fff;

            background: rgba(15, 21, 38, .82);

            border: 1px solid var(--border);

            border-radius: 13px;

            backdrop-filter: blur(12px);

            opacity: 0;

            visibility: hidden;

            transform: translateY(10px);

            transition: .3s ease;

            z-index: 500;
        }


        .portfolio-top.show {

            opacity: 1;

            visibility: visible;

            transform: translateY(0);
        }


        .portfolio-top:hover {

            color: var(--accent2);

            border-color: rgba(34, 211, 238, .3);
        }


        /* =========================================
           MOBILE
        ========================================= */

        @media (max-width: 900px) {

            .portfolio-navbar {

                padding: 13px 16px;
            }


            .portfolio-menu-button {

                display: block;
            }


            .portfolio-nav {

                display: none;

                position: absolute;

                top: calc(100% + 10px);

                left: 0;

                right: 0;

                flex-direction: column;

                align-items: stretch;

                gap: 3px;

                padding: 10px;

                background: rgba(10, 14, 26, .95);

                border: 1px solid var(--border);

                border-radius: 16px;

                backdrop-filter: blur(20px);
            }


            .portfolio-nav.show {

                display: flex;
            }


            .portfolio-nav a {

                padding: 12px 14px;
            }

        }


        @media (max-width: 520px) {

            .portfolio-navbar {

                width: calc(100% - 20px);

                top: 10px;
            }


            .portfolio-main {

                width: calc(100% - 20px);

                padding-top: 110px;
            }


            .portfolio-footer {

                margin-top: 45px;
            }


            .portfolio-social a {

                width: 38px;

                height: 38px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>

    <!-- =====================================
         BACKGROUND
    ====================================== -->

    <div class="aurora"></div>

    <canvas id="particles"></canvas>


    <!-- =====================================
         NAVIGATION
    ====================================== -->

    <nav class="portfolio-navbar">

        <a href="{{ url('/') }}" class="portfolio-brand">
            PORTFOLIO<span>.</span>
        </a>


        <div class="portfolio-nav" id="portfolioNav">

            <a href="{{ url('about') }}"
               class="{{ request()->is('about') ? 'active' : '' }}">
                About
            </a>


            <a href="{{ url('skills') }}"
               class="{{ request()->is('skills') ? 'active' : '' }}">
                Skills
            </a>


            <a href="{{ url('projects') }}"
               class="{{ request()->is('projects') ? 'active' : '' }}">
                Projects
            </a>


            <a href="{{ url('experience') }}"
               class="{{ request()->is('experience') ? 'active' : '' }}">
                Experience
            </a>


            <a href="{{ url('blog') }}"
               class="{{ request()->is('blog') ? 'active' : '' }}">
                Blog
            </a>


            <a href="{{ url('services') }}"
               class="{{ request()->is('services') ? 'active' : '' }}">
                Services
            </a>


            <a href="{{ url('contact') }}"
               class="{{ request()->is('contact') ? 'active' : '' }}">
                Contact
            </a>


            <a href="{{ route('login') }}" class="portfolio-login">
                Login
            </a>

        </div>


        <button
            type="button"
            class="portfolio-menu-button"
            onclick="togglePortfolioMenu()"
            aria-label="Toggle navigation">

            <i class="fa-solid fa-bars"></i>

        </button>

    </nav>


    <!-- =====================================
         SUCCESS MESSAGE
    ====================================== -->

    @if(session()->has('message'))

        <div class="portfolio-alert">

            <strong>Success</strong>

            {{ session()->get('message') }}

        </div>

    @endif


    <!-- =====================================
         PAGE CONTENT
    ====================================== -->

    <main class="portfolio-main">

        @yield('content')

    </main>


    <!-- =====================================
         FOOTER
    ====================================== -->

    <footer class="portfolio-footer">

        <ul class="portfolio-social">

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


        <p>
            &copy; {{ date('Y') }}
            <strong>Portfolio</strong>.
            All Rights Reserved.
        </p>

    </footer>


    <!-- =====================================
         BACK TO TOP
    ====================================== -->

    <a href="#" class="portfolio-top" id="portfolioTop">

        <i class="fa-solid fa-arrow-up"></i>

    </a>


    <!-- =====================================
         SCRIPTS
    ====================================== -->

    <script>

        /* =====================================
           MOBILE NAVIGATION
        ===================================== */

        function togglePortfolioMenu() {

            const nav = document.getElementById('portfolioNav');

            nav.classList.toggle('show');

        }


        /* =====================================
           CLOSE MOBILE MENU
        ===================================== */

        document.querySelectorAll('.portfolio-nav a').forEach(function(link) {

            link.addEventListener('click', function() {

                document
                    .getElementById('portfolioNav')
                    .classList
                    .remove('show');

            });

        });


        /* =====================================
           BACK TO TOP
        ===================================== */

        const portfolioTop =
            document.getElementById('portfolioTop');


        window.addEventListener('scroll', function() {

            if (window.scrollY > 400) {

                portfolioTop.classList.add('show');

            } else {

                portfolioTop.classList.remove('show');

            }

        });


        /* =====================================
           PARTICLES
        ===================================== */

        const canvas =
            document.getElementById('particles');

        const ctx =
            canvas.getContext('2d');


        let particles = [];


        function resizeParticles() {

            canvas.width = window.innerWidth;

            canvas.height = window.innerHeight;

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

                    x: Math.random() * canvas.width,

                    y: Math.random() * canvas.height,

                    size: Math.random() * 1.5 + .5,

                    speedX:
                        (Math.random() - .5) * .25,

                    speedY:
                        (Math.random() - .5) * .25

                });

            }

        }


        function animateParticles() {

            ctx.clearRect(
                0,
                0,
                canvas.width,
                canvas.height
            );


            particles.forEach(function(p) {

                p.x += p.speedX;

                p.y += p.speedY;


                if (
                    p.x < 0 ||
                    p.x > canvas.width
                ) {

                    p.speedX *= -1;

                }


                if (
                    p.y < 0 ||
                    p.y > canvas.height
                ) {

                    p.speedY *= -1;

                }


                ctx.beginPath();


                ctx.arc(
                    p.x,
                    p.y,
                    p.size,
                    0,
                    Math.PI * 2
                );


                ctx.fillStyle =
                    'rgba(148,163,184,.35)';


                ctx.fill();

            });


            requestAnimationFrame(
                animateParticles
            );

        }


        resizeParticles();

        createParticles();

        animateParticles();


        window.addEventListener(
            'resize',
            function() {

                resizeParticles();

                createParticles();

            }
        );

    </script>


    @stack('scripts')

</body>

</html>

