@extends('layouts.app')

@section('title', 'Experience')

@section('content')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* =====================================================
           ANIMATED BACKGROUND
        ===================================================== */

        .aurora {
            position: fixed;
            inset: 0;
            z-index: -2;
            overflow: hidden;
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

            background: radial-gradient(
                circle,
                #378C3F,
                transparent 70%
            );

            animation: float1 14s ease-in-out infinite;
        }

        .aurora::after {
            width: 500px;
            height: 500px;
            right: -100px;
            bottom: -150px;

            background: radial-gradient(
                circle,
                #1e40af,
                transparent 70%
            );

            animation: float2 18s ease-in-out infinite;
        }

        @keyframes float1 {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(80px, 60px);
            }
        }

        @keyframes float2 {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(-60px, -80px);
            }
        }

        #particles {
            position: fixed;
            inset: 0;
            z-index: -1;
            pointer-events: none;
        }

        /* =====================================================
           NAVBAR
        ===================================================== */

        .glass-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;

            z-index: 1000;

            padding: 14px 0;

            background: rgba(10, 14, 26, .72);

            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);

            border-bottom: 1px solid var(--border);
        }

        .nav-inner {
            max-width: 1200px;
            margin: auto;

            padding: 0 24px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            color: var(--text);
            text-decoration: none;

            font-size: 20px;
            font-weight: 900;

            letter-spacing: 1px;
        }

        .brand span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            align-items: center;

            gap: 28px;

            list-style: none;

            margin: 0;
            padding: 0;
        }

        .nav-links a {
            position: relative;

            color: var(--muted);
            text-decoration: none;

            font-size: 14px;
            font-weight: 600;

            letter-spacing: .5px;

            transition: .25s;
        }

        .nav-links a::after {
            content: "";

            position: absolute;

            left: 0;
            bottom: -6px;

            width: 0;
            height: 2px;

            border-radius: 2px;

            background: linear-gradient(
                90deg,
                var(--accent),
                var(--accent2)
            );

            transition: .3s;
        }

        .nav-links a:hover {
            color: #fff;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .login-pill {
            border: 1px solid var(--accent) !important;

            border-radius: 50px !important;

            padding: 7px 20px !important;

            color: #fff !important;

            background: rgba(55, 140, 63, .15);

            transition: .3s;
        }

        .login-pill::after {
            display: none;
        }

        .login-pill:hover {
            background: var(--accent);

            box-shadow:
                0 0 25px rgba(55, 140, 63, .5);
        }

        .nav-toggle {
            display: none;

            background: none;
            border: none;

            color: #fff;

            font-size: 22px;

            cursor: pointer;
        }

        /* =====================================================
           MOBILE NAVIGATION
        ===================================================== */

        @media(max-width: 991px) {

            .nav-links {
                position: fixed;

                top: 60px;
                right: -100%;

                width: min(75vw, 320px);
                height: 100vh;

                padding: 60px 30px;

                display: flex;
                flex-direction: column;

                align-items: flex-start;

                gap: 22px;

                background: rgba(15, 21, 38, .98);

                border-left: 1px solid var(--border);

                transition:
                    right .4s cubic-bezier(.77, 0, .18, 1);
            }

            .nav-links.open {
                right: 0;
            }

            .nav-toggle {
                display: block;
            }
        }

        /* =====================================================
           EXPERIENCE SECTION
        ===================================================== */

        .experience-wrap {
            max-width: 1200px;

            margin: 0 auto;

            padding: 140px 24px 100px;
        }

        /* =====================================================
           SECTION TITLE
        ===================================================== */

        .section-title {
            text-align: center;

            margin-bottom: 70px;
        }

        .section-title h2 {
            font-size: clamp(32px, 5vw, 48px);

            font-weight: 900;

            letter-spacing: -1px;
        }

        .section-title h2 span {
            background: linear-gradient(
                90deg,
                var(--accent),
                var(--accent2)
            );

            -webkit-background-clip: text;
            background-clip: text;

            -webkit-text-fill-color: transparent;
        }

        .section-title p {
            color: var(--muted);

            font-size: 15px;

            margin-top: 10px;

            letter-spacing: 1px;

            text-transform: uppercase;
        }

        .divider {
            width: 70px;
            height: 4px;

            margin: 18px auto 0;

            border-radius: 4px;

            background: linear-gradient(
                90deg,
                var(--accent),
                var(--accent2)
            );
        }

        /* =====================================================
           TIMELINE
        ===================================================== */

        .timeline {
            position: relative;

            max-width: 900px;

            margin: auto;
        }

        .timeline::before {
            content: "";

            position: absolute;

            top: 0;
            bottom: 0;

            left: 50%;

            width: 2px;

            transform: translateX(-50%);

            background: linear-gradient(
                to bottom,
                transparent,
                var(--accent),
                var(--accent2),
                transparent
            );

            opacity: .65;
        }

        .experience-item {
            position: relative;

            width: 50%;

            padding: 0 40px 50px;
        }

        .experience-item:nth-child(odd) {
            left: 0;

            text-align: right;
        }

        .experience-item:nth-child(even) {
            left: 50%;
        }

        /* =====================================================
           TIMELINE DOT
        ===================================================== */

        .timeline-dot {
            position: absolute;

            top: 8px;

            width: 16px;
            height: 16px;

            border-radius: 50%;

            background: var(--bg);

            border: 3px solid var(--accent);

            box-shadow:
                0 0 0 5px rgba(55, 140, 63, .12),
                0 0 20px rgba(55, 140, 63, .4);

            z-index: 2;
        }

        .experience-item:nth-child(odd) .timeline-dot {
            right: -8px;
        }

        .experience-item:nth-child(even) .timeline-dot {
            left: -8px;
        }

        /* =====================================================
           EXPERIENCE CARD
        ===================================================== */

        .experience-card {
            position: relative;

            padding: 28px;

            background: var(--card);

            border: 1px solid var(--border);

            border-radius: 20px;

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);

            transition:
                transform .4s ease,
                border-color .4s ease,
                box-shadow .4s ease;

            overflow: hidden;
        }

        .experience-card::before {
            content: "";

            position: absolute;

            top: 0;
            left: 0;

            width: 100%;
            height: 3px;

            background: linear-gradient(
                90deg,
                var(--accent),
                var(--accent2)
            );

            transform: scaleX(0);

            transform-origin: left;

            transition: .4s;
        }

        .experience-card:hover {
            transform: translateY(-8px);

            border-color: rgba(55, 140, 63, .45);

            box-shadow:
                0 20px 50px rgba(0, 0, 0, .45),
                0 0 0 1px rgba(55, 140, 63, .15);
        }

        .experience-card:hover::before {
            transform: scaleX(1);
        }

        /* =====================================================
           ICON
        ===================================================== */

        .experience-icon {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            margin-bottom: 18px;

            background: rgba(55, 140, 63, .12);

            border: 1px solid rgba(55, 140, 63, .3);

            color: #7ee2a0;

            font-size: 19px;
        }

        .experience-item:nth-child(odd) .experience-icon {
            margin-left: auto;
        }

        /* =====================================================
           CARD CONTENT
        ===================================================== */

        .experience-card h3 {
            color: var(--text);

            font-size: 20px;

            font-weight: 800;

            margin-bottom: 8px;
        }

        .company {
            color: #7ee2a0;

            font-size: 14px;

            font-weight: 700;

            letter-spacing: .5px;

            margin-bottom: 15px;
        }

        .experience-card p {
            color: var(--muted);

            font-size: 14px;

            line-height: 1.8;

            margin: 0;
        }

        .experience-number {
            position: absolute;

            right: 20px;
            bottom: 15px;

            font-size: 55px;

            font-weight: 900;

            color: rgba(255, 255, 255, .025);

            line-height: 1;

            pointer-events: none;
        }

        .experience-item:nth-child(odd) .experience-number {
            left: 20px;
            right: auto;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        .footer-wrap {
            border-top: 1px solid var(--border);

            background: rgba(15, 21, 38, .6);

            backdrop-filter: blur(12px);

            padding: 44px 20px 30px;

            text-align: center;
        }

        .socials {
            display: flex;

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

            border-radius: 12px;

            background: var(--card);

            border: 1px solid var(--border);

            color: var(--muted);

            font-size: 18px;

            transition: .35s;

            text-decoration: none;
        }

        .socials a:hover {
            background: linear-gradient(
                135deg,
                var(--accent),
                var(--accent2)
            );

            color: #fff;

            transform: translateY(-5px);

            border-color: transparent;

            box-shadow:
                0 10px 25px rgba(34, 211, 238, .3);
        }

        .footer-copy {
            color: var(--muted);

            font-size: 14px;
        }

        .footer-copy b {
            color: var(--text);
        }

        /* =====================================================
           REVEAL ANIMATION
        ===================================================== */

        .reveal {
            opacity: 0;

            transform: translateY(30px);

            transition: .8s ease;
        }

        .reveal.show {
            opacity: 1;

            transform: translateY(0);
        }

        /* =====================================================
           MOBILE EXPERIENCE
        ===================================================== */

        @media(max-width: 768px) {

            .experience-wrap {
                padding: 120px 18px 70px;
            }

            .section-title {
                margin-bottom: 50px;
            }

            .timeline::before {
                left: 15px;

                transform: none;
            }

            .experience-item,
            .experience-item:nth-child(even) {
                width: 100%;

                left: 0;

                padding:
                    0
                    0
                    35px
                    45px;

                text-align: left;
            }

            .experience-item:nth-child(odd) {
                text-align: left;
            }

            .timeline-dot,
            .experience-item:nth-child(odd) .timeline-dot,
            .experience-item:nth-child(even) .timeline-dot {
                left: 7px;
                right: auto;
            }

            .experience-item:nth-child(odd) .experience-icon {
                margin-left: 0;
            }

            .experience-card {
                padding: 23px;
            }

            .experience-number,
            .experience-item:nth-child(odd) .experience-number {
                right: 15px;
                left: auto;
            }
        }

        @media(max-width: 500px) {

            .nav-inner {
                padding: 0 18px;
            }

            .section-title h2 {
                font-size: 34px;
            }

            .experience-card h3 {
                font-size: 18px;
            }

            .socials {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

    <!-- =====================================================
         BACKGROUND
    ===================================================== -->

    <div class="aurora"></div>

    <canvas id="particles"></canvas>



    <!-- =====================================================
         EXPERIENCE
    ===================================================== -->

    <main class="experience-wrap">

        <div class="section-title reveal">

            <h2>
                Work <span>Experience</span>
            </h2>

            <p>
                Positions worked so far
            </p>

            <div class="divider"></div>

        </div>


        <div class="timeline">

            @foreach($experience as $experiences)

                <div class="experience-item reveal">

                    <span class="timeline-dot"></span>

                    <article class="experience-card">

                        <div class="experience-icon">

                            <i class="fa-solid fa-briefcase"></i>

                        </div>

                        <h3>
                            {{ $experiences->pos_name }}
                        </h3>

                        <div class="company">

                            <i class="fa-solid fa-building"></i>

                            {{ $experiences->pos_company }}

                        </div>

                        <p>
                            {{ $experiences->pos_descr }}
                        </p>

                        <span class="experience-number">
                            {{ sprintf('%02d', $loop->iteration) }}
                        </span>

                    </article>

                </div>

            @endforeach

        </div>

    </main>


   

    <!-- =====================================================
         JAVASCRIPT
    ===================================================== -->

    <script>

        /* ==========================================
           MOBILE MENU
        ========================================== */

        function toggleMenu() {

            document
                .getElementById('navLinks')
                .classList
                .toggle('open');

        }


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


        /* ==========================================
           PARTICLES
        ========================================== */

        const canvas =
            document.getElementById('particles');

        const ctx =
            canvas.getContext('2d');

        let W, H;

        let parts = [];


        function resize() {

            W = canvas.width = window.innerWidth;

            H = canvas.height = window.innerHeight;

        }


        resize();

        window.addEventListener(
            'resize',
            resize
        );


        for (let i = 0; i < 70; i++) {

            parts.push({

                x: Math.random() * window.innerWidth,

                y: Math.random() * window.innerHeight,

                r: Math.random() * 1.6 + .4,

                vx: (Math.random() - .5) * .3,

                vy: (Math.random() - .5) * .3,

                o: Math.random() * .5 + .15

            });

        }


        (function draw() {

            ctx.clearRect(
                0,
                0,
                W,
                H
            );


            parts.forEach(function (p) {

                p.x += p.vx;

                p.y += p.vy;


                if (p.x < 0)
                    p.x = W;

                if (p.x > W)
                    p.x = 0;

                if (p.y < 0)
                    p.y = H;

                if (p.y > H)
                    p.y = 0;


                ctx.beginPath();

                ctx.arc(
                    p.x,
                    p.y,
                    p.r,
                    0,
                    Math.PI * 2
                );


                ctx.fillStyle =
                    `rgba(120,220,150,${p.o})`;

                ctx.fill();

            });


            requestAnimationFrame(draw);

        })();


        /* ==========================================
           SCROLL REVEAL
        ========================================== */

        const observer =
            new IntersectionObserver(

                function (entries) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {

                            entry.target
                                .classList
                                .add('show');

                        }

                    });

                },

                {
                    threshold: .1
                }

            );


        document
            .querySelectorAll('.reveal')
            .forEach(function (element) {

                observer.observe(element);

            });

    </script>

@endsection
