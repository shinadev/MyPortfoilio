@extends('layouts.app') 
@section('title', 'Blog') 
@section('content')

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
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

            color: #fff !important;

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
           MOBILE NAV
        ===================================================== */

        @media(max-width:991px) {

            .nav-links {

                position: fixed;

                top: 60px;

                right: -100%;

                width:
                    min(75vw,320px);

                height: 100vh;

                padding: 60px 30px;

                flex-direction: column;

                align-items: flex-start;

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
           BLOG WRAPPER
        ===================================================== */

        .blog-wrap {

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

            -webkit-background-clip: text;

            background-clip: text;

            -webkit-text-fill-color:
                transparent;
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

            margin:
                18px auto 0;

            border-radius: 4px;

            background:
                linear-gradient(
                    90deg,
                    var(--accent),
                    var(--accent2)
                );
        }


        /* =====================================================
           BLOG GRID
        ===================================================== */

        .blog-grid {

            display: grid;

            grid-template-columns:
                repeat(
                    auto-fit,
                    minmax(300px,1fr)
                );

            gap: 28px;
        }


        /* =====================================================
           BLOG CARD
        ===================================================== */

        .blog-card {

            position: relative;

            overflow: hidden;

            background:
                var(--card);

            border:
                1px solid var(--border);

            border-radius: 20px;

            backdrop-filter:
                blur(10px);

            -webkit-backdrop-filter:
                blur(10px);

            transition:
                .4s
                cubic-bezier(.25,.8,.25,1);
        }


        .blog-card:hover {

            transform:
                translateY(-9px);

            border-color:
                rgba(55,140,63,.5);

            box-shadow:

                0 20px 50px
                rgba(0,0,0,.5),

                0 0 0 1px
                rgba(55,140,63,.25);
        }


        /* =====================================================
           IMAGE
        ===================================================== */

        .blog-image {

            position: relative;

            height: 225px;

            overflow: hidden;

            background:
                var(--bg2);
        }


        .blog-image img {

            width: 100%;

            height: 100%;

            object-fit: cover;

            display: block;

            transition:
                transform .6s ease;
        }


        .blog-card:hover
        .blog-image img {

            transform:
                scale(1.08);
        }


        /* IMAGE OVERLAY */

        .blog-image::after {

            content: "";

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    180deg,
                    transparent 35%,
                    rgba(10,14,26,.85)
                );

            opacity: .35;

            transition: .4s;
        }


        .blog-card:hover
        .blog-image::after {

            opacity: .7;
        }


        /* =====================================================
           BLOG ICON
        ===================================================== */

        .blog-icon {

            position: absolute;

            top: 18px;

            right: 18px;

            z-index: 2;

            width: 44px;

            height: 44px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 12px;

            color: #fff;

            background:
                rgba(10,14,26,.65);

            border:
                1px solid
                rgba(255,255,255,.2);

            backdrop-filter:
                blur(8px);

            transition: .35s;
        }


        .blog-card:hover
        .blog-icon {

            background:
                linear-gradient(
                    135deg,
                    var(--accent),
                    var(--accent2)
                );

            border-color:
                transparent;

            transform:
                rotate(5deg)
                scale(1.05);
        }


        /* =====================================================
           BLOG BODY
        ===================================================== */

        .blog-body {

            padding:
                23px
                24px
                26px;
        }


        .blog-tag {

            display: inline-block;

            color: #7ee2a0;

            background:
                rgba(55,140,63,.12);

            border:
                1px solid
                rgba(55,140,63,.35);

            border-radius: 50px;

            padding:
                5px 12px;

            margin-bottom: 13px;

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        .blog-body h3 {

            color: var(--text);

            font-size: 20px;

            font-weight: 800;

            line-height: 1.35;

            margin-bottom: 11px;

            letter-spacing: -.3px;
        }


        .blog-description {

            color: var(--muted);

            font-size: 14px;

            line-height: 1.75;

            margin-bottom: 22px;

            display: -webkit-box;

            -webkit-line-clamp: 4;

            -webkit-box-orient: vertical;

            overflow: hidden;
        }


        /* =====================================================
           READ MORE
        ===================================================== */

        .read-more {

            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding:
                10px 17px;

            border-radius: 10px;

            color: #fff;

            text-decoration: none;

            font-size: 13px;

            font-weight: 700;

            border:
                1px solid
                rgba(55,140,63,.45);

            background:
                rgba(55,140,63,.1);

            transition: .35s;
        }


        .read-more i {

            font-size: 11px;

            transition: .35s;
        }


        .read-more:hover {

            color: #fff;

            background:
                linear-gradient(
                    135deg,
                    var(--accent),
                    var(--accent2)
                );

            border-color:
                transparent;

            box-shadow:
                0 8px 25px
                rgba(34,211,238,.2);
        }


        .read-more:hover i {

            transform:
                translateX(4px);
        }


        /* =====================================================
           EMPTY BLOG STATE
        ===================================================== */

        .empty-blog {

            text-align: center;

            padding: 70px 20px;

            border:
                1px solid var(--border);

            border-radius: 20px;

            background:
                var(--card);
        }


        .empty-blog i {

            font-size: 40px;

            color:
                var(--muted);

            margin-bottom: 18px;
        }


        .empty-blog p {

            color:
                var(--muted);

            font-size: 15px;
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

            text-align: center;
        }


        .socials {

            display: flex;

            justify-content: center;

            gap: 14px;

            list-style: none;

            margin:
                0 0 22px;

            padding: 0;
        }


        .socials a {

            width: 46px;

            height: 46px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 12px;

            background:
                var(--card);

            border:
                1px solid var(--border);

            color:
                var(--muted);

            font-size: 18px;

            transition: .35s;

            text-decoration: none;
        }


        .socials a:hover {

            background:
                linear-gradient(
                    135deg,
                    var(--accent),
                    var(--accent2)
                );

            color: #fff;

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

            font-size: 14px;
        }


        .footer-copy b {

            color:
                var(--text);
        }


        /* =====================================================
           SCROLL REVEAL
        ===================================================== */

        .reveal {

            opacity: 0;

            transform:
                translateY(30px);

            transition:
                .8s ease;
        }


        .reveal.show {

            opacity: 1;

            transform:
                translateY(0);
        }


        /* =====================================================
           MOBILE BLOG
        ===================================================== */

        @media(max-width:700px) {

            .blog-wrap {

                padding:
                    120px
                    18px
                    70px;
            }


            .section-title {

                margin-bottom: 45px;
            }


            .section-title h2 {

                font-size: 34px;
            }


            .blog-grid {

                grid-template-columns: 1fr;

                gap: 22px;
            }


            .blog-image {

                height: 210px;
            }
        }


        @media(max-width:500px) {

            .nav-inner {

                padding:
                    0 18px;
            }


            .blog-body {

                padding:
                    21px;
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
         BLOG
    ===================================================== -->

    <main class="blog-wrap">


        <div class="section-title reveal">

            <h2>
                My <span>Blog</span>
            </h2>

            <p>
                Some of my pieces
            </p>

            <div class="divider"></div>

        </div>


        @if($blog->count())


            <div class="blog-grid">


                @foreach($blog as $blogs)


                    <article
                        class="blog-card reveal">


                        <!-- IMAGE -->

                        <div class="blog-image">

                            <img
                                src="{{ $blogs->blog_image }}"
                                alt="{{ $blogs->blog_title }}"
                                loading="lazy">


                            <span class="blog-icon">

                                <i class="fa-solid fa-pen-nib"></i>

                            </span>

                        </div>


                        <!-- BODY -->

                        <div class="blog-body">


                            <span class="blog-tag">

                                Article

                            </span>


                            <h3>

                                {{ $blogs->blog_title }}

                            </h3>


                            <p class="blog-description">

                                {{ $blogs->blog_descr }}

                            </p>


                            <a
                                href="{{ $blogs->blog_link }}"
                                class="read-more"
                                target="_blank"
                                rel="noopener noreferrer">

                                Read Article

                                <i class="fa-solid fa-arrow-right"></i>

                            </a>


                        </div>


                    </article>


                @endforeach


            </div>


        @else


            <div class="empty-blog reveal">

                <i class="fa-regular fa-newspaper"></i>

                <p>
                    No blog posts available yet.
                </p>

            </div>


        @endif


    </main>


    <!-- =====================================================
         FOOTER
    ===================================================== -->

    <footer class="footer-wrap reveal">


        <ul class="socials">

            <li>
                <a href="" aria-label="Facebook">

                    <i class="fa-brands fa-facebook-f"></i>

                </a>
            </li>


            <li>
                <a href="" aria-label="Twitter">

                    <i class="fa-brands fa-x-twitter"></i>

                </a>
            </li>


            <li>
                <a href="" aria-label="RSS">

                    <i class="fa-solid fa-rss"></i>

                </a>
            </li>


            <li>
                <a href="" aria-label="YouTube">

                    <i class="fa-brands fa-youtube"></i>

                </a>
            </li>


            <li>
                <a href="" aria-label="LinkedIn">

                    <i class="fa-brands fa-linkedin-in"></i>

                </a>
            </li>


            <li>
                <a href="" aria-label="GitHub">

                    <i class="fa-brands fa-github"></i>

                </a>
            </li>

        </ul>


        <p class="footer-copy">

            &copy;

            <b>
                Copyright {{ date('Y') }}.
                All Rights Reserved.
            </b>

        </p>


    </footer>


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
                    (Math.random() - .5) *
                    .3,

                vy:
                    (Math.random() - .5) *
                    .3,

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

