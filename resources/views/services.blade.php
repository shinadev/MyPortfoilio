@extends('layouts.app')

@section('title', 'Services')

@section('content')

    <!-- FONT -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- FONT AWESOME -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        /* =====================================================
           ROOT
        ===================================================== */

        :root {
            --bg: #0a0e1a;
            --bg2: #0f1526;

            --card: rgba(255,255,255,.04);

            --accent: #378C3F;
            --accent2: #22d3ee;

            --text: #e8ecf4;
            --muted: #94a3b8;

            --border: rgba(255,255,255,.08);
        }


        /* =====================================================
           RESET
        ===================================================== */

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
           AURORA BACKGROUND
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

            background:
                radial-gradient(
                    circle,
                    #378C3F,
                    transparent 70%
                );

            animation:
                float1 14s ease-in-out infinite;
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

            animation:
                float2 18s ease-in-out infinite;
        }


        @keyframes float1 {

            0%,
            100% {
                transform: translate(0,0);
            }

            50% {
                transform: translate(80px,60px);
            }
        }


        @keyframes float2 {

            0%,
            100% {
                transform: translate(0,0);
            }

            50% {
                transform: translate(-60px,-80px);
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

            background:
                rgba(10,14,26,.72);

            backdrop-filter:
                blur(16px);

            -webkit-backdrop-filter:
                blur(16px);

            border-bottom:
                1px solid var(--border);
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

            background:
                linear-gradient(
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

            border:
                1px solid var(--accent) !important;

            border-radius:
                50px !important;

            padding:
                7px 20px !important;

            color:
                #fff !important;

            background:
                rgba(55,140,63,.15);

            transition: .3s;
        }


        .login-pill::after {
            display: none;
        }


        .login-pill:hover {

            background:
                var(--accent);

            box-shadow:
                0 0 25px
                rgba(55,140,63,.5);
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

        @media(max-width:991px) {

            .nav-links {

                position: fixed;

                top: 60px;

                right: -100%;

                width:
                    min(75vw,320px);

                height: 100vh;

                padding:
                    60px 30px;

                flex-direction: column;

                align-items:
                    flex-start;

                gap: 22px;

                background:
                    rgba(15,21,38,.98);

                border-left:
                    1px solid var(--border);

                transition:
                    right .4s
                    cubic-bezier(.77,0,.18,1);
            }


            .nav-links.open {
                right: 0;
            }


            .nav-toggle {
                display: block;
            }
        }


        /* =====================================================
           SERVICES WRAPPER
        ===================================================== */

        .services-wrap {

            max-width: 1200px;

            margin: auto;

            padding:
                140px
                24px
                100px;
        }


        /* =====================================================
           SECTION TITLE
        ===================================================== */

        .section-title {

            text-align: center;

            margin-bottom: 65px;
        }


        .section-title h2 {

            font-size:
                clamp(32px,5vw,48px);

            font-weight: 900;

            letter-spacing: -1px;
        }


        .section-title h2 span {

            background:
                linear-gradient(
                    90deg,
                    var(--accent),
                    var(--accent2)
                );

            -webkit-background-clip:
                text;

            background-clip:
                text;

            -webkit-text-fill-color:
                transparent;
        }


        .section-title p {

            color:
                var(--muted);

            font-size:
                15px;

            margin-top:
                10px;

            letter-spacing:
                1px;

            text-transform:
                uppercase;
        }


        .divider {

            width: 70px;

            height: 4px;

            margin:
                18px auto 0;

            border-radius:
                4px;

            background:
                linear-gradient(
                    90deg,
                    var(--accent),
                    var(--accent2)
                );
        }


        /* =====================================================
           SERVICE GRID
        ===================================================== */

        .services-grid {

            display: grid;

            grid-template-columns:
                repeat(
                    3,
                    1fr
                );

            gap: 26px;

            align-items: stretch;
        }


        /* =====================================================
           SERVICE CARD
        ===================================================== */

        .service-card {

            position: relative;

            display: flex;

            flex-direction: column;

            overflow: hidden;

            min-height:
                500px;

            padding:
                32px 28px 28px;

            background:
                var(--card);

            border:
                1px solid var(--border);

            border-radius:
                22px;

            backdrop-filter:
                blur(12px);

            -webkit-backdrop-filter:
                blur(12px);

            transition:
                .4s
                cubic-bezier(.25,.8,.25,1);
        }


        .service-card:hover {

            transform:
                translateY(-10px);

            border-color:
                rgba(55,140,63,.5);

            box-shadow:

                0 25px 55px
                rgba(0,0,0,.5),

                0 0 0 1px
                rgba(55,140,63,.2);
        }


        /* =====================================================
           CARD TOP LINE
        ===================================================== */

        .service-card::before {

            content: "";

            position: absolute;

            top: 0;
            left: 0;

            width: 100%;

            height: 3px;

            background:
                linear-gradient(
                    90deg,
                    var(--accent),
                    var(--accent2)
                );

            transform:
                scaleX(0);

            transform-origin:
                left;

            transition:
                .4s;
        }


        .service-card:hover::before {
            transform: scaleX(1);
        }


        /* =====================================================
           FEATURED PRO CARD
        ===================================================== */

        .service-card.featured {

            border-color:
                rgba(55,140,63,.4);

            background:
                linear-gradient(
                    145deg,
                    rgba(55,140,63,.09),
                    rgba(34,211,238,.035)
                );
        }


        .featured-badge {

            position: absolute;

            top: 20px;

            right: 20px;

            padding:
                6px 11px;

            border-radius:
                50px;

            color:
                #fff;

            font-size:
                9px;

            font-weight:
                800;

            letter-spacing:
                1px;

            text-transform:
                uppercase;

            background:
                linear-gradient(
                    135deg,
                    var(--accent),
                    var(--accent2)
                );

            box-shadow:
                0 6px 18px
                rgba(34,211,238,.2);
        }


        /* =====================================================
           SERVICE ICON
        ===================================================== */

        .service-icon {

            width:
                58px;

            height:
                58px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            margin-bottom:
                22px;

            border-radius:
                16px;

            color:
                #7ee2a0;

            font-size:
                22px;

            background:
                rgba(55,140,63,.12);

            border:
                1px solid
                rgba(55,140,63,.3);

            transition:
                .35s;
        }


        .service-card:hover
        .service-icon {

            color:
                #fff;

            background:
                linear-gradient(
                    135deg,
                    var(--accent),
                    var(--accent2)
                );

            border-color:
                transparent;

            transform:
                translateY(-3px)
                rotate(3deg);
        }


        /* =====================================================
           SERVICE NAME
        ===================================================== */

        .service-card h3 {

            color:
                var(--text);

            font-size:
                23px;

            font-weight:
                800;

            margin-bottom:
                8px;
        }


        .service-subtitle {

            color:
                var(--muted);

            font-size:
                13px;

            margin-bottom:
                22px;
        }


        /* =====================================================
           PRICE
        ===================================================== */

        .price {

            display:
                flex;

            align-items:
                baseline;

            gap:
                5px;

            margin-bottom:
                25px;
        }


        .currency {

            color:
                var(--accent2);

            font-size:
                18px;

            font-weight:
                700;
        }


        .amount {

            color:
                #fff;

            font-size:
                38px;

            font-weight:
                900;

            letter-spacing:
                -1px;
        }


        .price-label {

            color:
                var(--muted);

            font-size:
                12px;
        }


        /* =====================================================
           DIVIDER
        ===================================================== */

        .service-divider {

            height:
                1px;

            background:
                var(--border);

            margin-bottom:
                22px;
        }


        /* =====================================================
           FEATURES
        ===================================================== */

        .features {

            list-style:
                none;

            padding:
                0;

            margin:
                0;

            flex: 1;
        }


        .features li {

            display:
                flex;

            align-items:
                flex-start;

            gap:
                11px;

            color:
                var(--muted);

            font-size:
                13.5px;

            line-height:
                1.5;

            padding:
                8px 0;
        }


        .features li i {

            flex-shrink:
                0;

            margin-top:
                3px;

            color:
                #6ee7a0;

            font-size:
                12px;
        }


        /* =====================================================
           CTA
        ===================================================== */

        .service-button {

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                9px;

            width:
                100%;

            margin-top:
                25px;

            padding:
                13px 18px;

            border-radius:
                11px;

            color:
                #fff;

            text-decoration:
                none;

            font-size:
                13px;

            font-weight:
                700;

            border:
                1px solid
                rgba(55,140,63,.45);

            background:
                rgba(55,140,63,.1);

            transition:
                .35s;
        }


        .service-button i {

            font-size:
                11px;

            transition:
                .35s;
        }


        .service-button:hover {

            color:
                #fff;

            background:
                linear-gradient(
                    135deg,
                    var(--accent),
                    var(--accent2)
                );

            border-color:
                transparent;

            box-shadow:
                0 10px 25px
                rgba(34,211,238,.2);
        }


        .service-button:hover i {
            transform:
                translateX(4px);
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer-wrap {

            border-top:
                1px solid var(--border);

            background:
                rgba(15,21,38,.6);

            backdrop-filter:
                blur(12px);

            padding:
                44px
                20px
                30px;

            text-align:
                center;
        }


        .socials {

            display:
                flex;

            justify-content:
                center;

            gap:
                14px;

            list-style:
                none;

            margin:
                0 0 22px;

            padding:
                0;
        }


        .socials a {

            width:
                46px;

            height:
                46px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                12px;

            background:
                var(--card);

            border:
                1px solid
                var(--border);

            color:
                var(--muted);

            font-size:
                18px;

            transition:
                .35s;

            text-decoration:
                none;
        }


        .socials a:hover {

            background:
                linear-gradient(
                    135deg,
                    var(--accent),
                    var(--accent2)
                );

            color:
                #fff;

            transform:
                translateY(-5px);

            border-color:
                transparent;

            box-shadow:
                0 10px 25px
                rgba(34,211,238,.3);
        }


        .footer-copy {

            color:
                var(--muted);

            font-size:
                14px;
        }


        .footer-copy b {
            color:
                var(--text);
        }


        /* =====================================================
           REVEAL
        ===================================================== */

        .reveal {

            opacity:
                0;

            transform:
                translateY(30px);

            transition:
                .8s ease;
        }


        .reveal.show {

            opacity:
                1;

            transform:
                translateY(0);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width:950px) {

            .services-grid {

                grid-template-columns:
                    1fr 1fr;
            }

        }


        @media(max-width:700px) {

            .services-wrap {

                padding:
                    120px
                    18px
                    70px;
            }


            .section-title {

                margin-bottom:
                    45px;
            }


            .section-title h2 {

                font-size:
                    34px;
            }


            .services-grid {

                grid-template-columns:
                    1fr;

                gap:
                    22px;
            }


            .service-card {

                min-height:
                    auto;
            }

        }


        @media(max-width:500px) {

            .nav-inner {

                padding:
                    0 18px;
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
         SERVICES
    ===================================================== -->

    <main class="services-wrap">


        <div class="section-title reveal">

            <h2>
                My <span>Services</span>
            </h2>

            <p>
                I offer the following
            </p>

            <div class="divider"></div>

        </div>


        <div class="services-grid">


            <!-- =================================================
                 BASIC
            ================================================= -->

            <article
                class="service-card reveal">


                <div class="service-icon">

                    <i class="fa-solid fa-code"></i>

                </div>


                <h3>
                    Basic
                </h3>


                <p class="service-subtitle">

                    Perfect for getting started.

                </p>


                <div class="price">

                    <span class="currency">
                        $
                    </span>

                    <span class="amount">
                        99.99
                    </span>

                </div>


                <div class="service-divider"></div>


                <ul class="features">


                    @foreach($basic as $basics)

                        <li>

                            <i class="fa-solid fa-check"></i>

                            <span>
                                {{ $basics->service_name }}
                            </span>

                        </li>

                    @endforeach


                </ul>


                <a
                    href="<?php echo url('contact') ?>"
                    class="service-button">

                    Get Started

                    <i class="fa-solid fa-arrow-right"></i>

                </a>


            </article>



            <!-- =================================================
                 PRO
            ================================================= -->

            <article
                class="service-card featured reveal">


                <span class="featured-badge">

                    Popular

                </span>


                <div class="service-icon">

                    <i class="fa-solid fa-rocket"></i>

                </div>


                <h3>
                    Pro
                </h3>


                <p class="service-subtitle">

                    For growing projects and businesses.

                </p>


                <div class="price">

                    <span class="currency">
                        $
                    </span>

                    <span class="amount">
                        150.99
                    </span>

                </div>


                <div class="service-divider"></div>


                <ul class="features">


                    @foreach($pro as $pros)

                        <li>

                            <i class="fa-solid fa-check"></i>

                            <span>
                                {{ $pros->service_name }}
                            </span>

                        </li>

                    @endforeach


                </ul>


                <a
                    href="<?php echo url('contact') ?>"
                    class="service-button">

                    Start Project

                    <i class="fa-solid fa-arrow-right"></i>

                </a>


            </article>



            <!-- =================================================
                 PREMIUM
            ================================================= -->

            <article
                class="service-card reveal">


                <div class="service-icon">

                    <i class="fa-solid fa-crown"></i>

                </div>


                <h3>
                    Premium
                </h3>


                <p class="service-subtitle">

                    Complete solutions for serious projects.

                </p>


                <div class="price">

                    <span class="currency">
                        $
                    </span>

                    <span class="amount">
                        299.99
                    </span>

                </div>


                <div class="service-divider"></div>


                <ul class="features">


                    @foreach($premium as $premiums)

                        <li>

                            <i class="fa-solid fa-check"></i>

                            <span>
                                {{ $premiums->service_name }}
                            </span>

                        </li>

                    @endforeach


                </ul>


                <a
                    href="<?php echo url('contact') ?>"
                    class="service-button">

                    Go Premium

                    <i class="fa-solid fa-arrow-right"></i>

                </a>


            </article>


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
            .forEach(function(link) {

                link.addEventListener(
                    'click',
                    function() {

                        document
                            .getElementById('navLinks')
                            .classList
                            .remove('open');

                    }
                );

            });



        /* ==========================================
           PARTICLES
        ========================================== */

        const canvas =
            document.getElementById('particles');

        const ctx =
            canvas.getContext('2d');


        let W;
        let H;

        let parts = [];


        function resize() {

            W =
                canvas.width =
                window.innerWidth;

            H =
                canvas.height =
                window.innerHeight;

        }


        resize();


        window.addEventListener(
            'resize',
            resize
        );


        for (
            let i = 0;
            i < 70;
            i++
        ) {

            parts.push({

                x:
                    Math.random() *
                    window.innerWidth,

                y:
                    Math.random() *
                    window.innerHeight,

                r:
                    Math.random() *
                    1.6 + .4,

                vx:
                    (Math.random() - .5)
                    * .3,

                vy:
                    (Math.random() - .5)
                    * .3,

                o:
                    Math.random() *
                    .5 + .15

            });

        }


        (function draw() {

            ctx.clearRect(
                0,
                0,
                W,
                H
            );


            parts.forEach(
                function(p) {

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
                        `rgba(
                            120,
                            220,
                            150,
                            ${p.o}
                        )`;


                    ctx.fill();

                }
            );


            requestAnimationFrame(draw);

        })();



        /* ==========================================
           SCROLL REVEAL
        ========================================== */

        const observer =
            new IntersectionObserver(

                function(entries) {

                    entries.forEach(
                        function(entry) {

                            if (
                                entry.isIntersecting
                            ) {

                                entry.target
                                    .classList
                                    .add('show');

                            }

                        }
                    );

                },

                {
                    threshold: .1
                }

            );


        document
            .querySelectorAll('.reveal')
            .forEach(function(element) {

                observer.observe(element);

            });

    </script>
@endsection

