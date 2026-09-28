@extends('layouts.app')

@section('title', 'Contact')

@section('content')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --bg: #0a0e1a;
            --bg2: #0f1526;
            --card: rgba(255, 255, 255, 0.045);
            --card-hover: rgba(255, 255, 255, 0.07);

            --accent: #378C3F;
            --accent2: #22d3ee;

            --text: #e8ecf4;
            --muted: #94a3b8;

            --border: rgba(255, 255, 255, 0.08);
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
            font-family: "Inter", sans-serif;
            background:
                radial-gradient(circle at 10% 20%, rgba(55, 140, 63, .12), transparent 30%),
                radial-gradient(circle at 90% 10%, rgba(34, 211, 238, .10), transparent 30%),
                var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* =========================
           AURORA BACKGROUND
        ========================= */

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
            filter: blur(100px);
            opacity: .12;
            animation: float 12s ease-in-out infinite alternate;
        }

        .aurora::before {
            background: var(--accent);
            top: -180px;
            left: -150px;
        }

        .aurora::after {
            background: var(--accent2);
            bottom: -180px;
            right: -150px;
            animation-delay: -5s;
        }

        @keyframes float {
            from {
                transform: translate(0, 0) scale(1);
            }

            to {
                transform: translate(80px, 50px) scale(1.15);
            }
        }

        /* =========================
           PARTICLES
        ========================= */

        #particles {
            position: fixed;
            inset: 0;
            z-index: -2;
            pointer-events: none;
        }

        /* =========================
           NAVBAR
        ========================= */

        .topnav {
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

        .topnav > a:first-child {
            color: #fff;
            text-decoration: none;
            font-size: 19px;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .topnav > a:first-child::after {
            content: ".";
            color: var(--accent2);
        }

        #myLinks {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        #myLinks a {
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;

            padding: 9px 12px;
            border-radius: 10px;

            transition: .25s ease;
        }

        #myLinks a:hover,
        #myLinks a.active {
            color: #fff;
            background: rgba(55, 140, 63, .13);
        }

        #myLinks a:last-child {
            border: 1px solid rgba(34, 211, 238, .25);
            color: var(--accent2);
        }

        #myLinks a:last-child:hover {
            background: rgba(34, 211, 238, .1);
        }

        .topnav .icon {
            display: none;
            color: #fff;
            font-size: 21px;
            text-decoration: none;
        }

        /* =========================
           MAIN
        ========================= */

        main {
            width: min(1180px, calc(100% - 30px));
            margin: 0 auto;
            padding-top: 135px;
        }

        /* =========================
           TITLE
        ========================= */

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title .eyebrow {
            color: var(--accent2);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .section-title h1 {
            font-size: clamp(36px, 5vw, 58px);
            line-height: 1.1;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .section-title h1 span {
            background: linear-gradient(90deg, var(--accent), var(--accent2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-title p {
            color: var(--muted);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.7;
            font-size: 15px;
        }

        .divider {
            width: 70px;
            height: 3px;
            margin: 22px auto 0;
            border-radius: 20px;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
        }

        /* =========================
           CONTACT GRID
        ========================= */

        .contact-grid {
            display: grid;
            grid-template-columns: .85fr 1.15fr;
            gap: 25px;
            margin-bottom: 70px;
        }

        .contact-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 32px;

            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            box-shadow: var(--shadow);

            transition: .3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            background: var(--card-hover);
            border-color: rgba(34, 211, 238, .15);
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 28px;
        }

        .card-title .icon-box {
            width: 46px;
            height: 46px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: rgba(55, 140, 63, .12);
            color: var(--accent2);

            border: 1px solid rgba(34, 211, 238, .12);
        }

        .card-title h2 {
            font-size: 20px;
            font-weight: 700;
        }

        .card-title p {
            color: var(--muted);
            font-size: 12px;
            margin-top: 3px;
        }

        /* =========================
           CONTACT INFORMATION
        ========================= */

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;

            padding: 16px;

            border: 1px solid var(--border);
            background: rgba(255, 255, 255, .025);
            border-radius: 15px;

            transition: .25s ease;
        }

        .info-item:hover {
            border-color: rgba(55, 140, 63, .35);
            transform: translateX(4px);
        }

        .info-icon {
            min-width: 40px;
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background: rgba(55, 140, 63, .11);
            color: var(--accent2);
        }

        .info-content small {
            display: block;
            color: var(--muted);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .info-content span,
        .info-content a {
            color: var(--text);
            font-size: 14px;
            line-height: 1.6;
            text-decoration: none;
            word-break: break-word;
        }

        .info-content a:hover {
            color: var(--accent2);
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            color: var(--muted);
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;

            padding: 14px 16px;

            color: var(--text);
            background: rgba(255, 255, 255, .035);

            border: 1px solid var(--border);
            border-radius: 13px;

            outline: none;
            font-family: inherit;
            font-size: 14px;

            transition: .25s ease;
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .form-control:focus {
            border-color: rgba(34, 211, 238, .55);
            background: rgba(255, 255, 255, .055);
            box-shadow: 0 0 0 3px rgba(34, 211, 238, .06);
        }

        textarea.form-control {
            min-height: 145px;
            resize: vertical;
        }

        .send-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            border: 0;
            border-radius: 13px;

            padding: 14px 24px;

            color: #fff;
            background: linear-gradient(135deg, var(--accent), #286b30);

            font-family: inherit;
            font-size: 13px;
            font-weight: 700;

            cursor: pointer;
            text-decoration: none;

            box-shadow: 0 10px 25px rgba(55, 140, 63, .18);

            transition: .3s ease;
        }

        .send-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(55, 140, 63, .25);
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            border-top: 1px solid var(--border);
            background: rgba(10, 14, 26, .6);
            backdrop-filter: blur(15px);
            padding: 35px 20px;
            text-align: center;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
            list-style: none;
            margin-bottom: 20px;
        }

        .social-icons a {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--muted);

            border: 1px solid var(--border);
            border-radius: 12px;

            text-decoration: none;

            background: rgba(255, 255, 255, .025);

            transition: .25s ease;
        }

        .social-icons a:hover {
            color: var(--accent2);
            border-color: rgba(34, 211, 238, .3);
            transform: translateY(-3px);
        }

        footer p {
            color: var(--muted);
            font-size: 12px;
        }

        footer strong {
            color: var(--text);
        }

        /* =========================
           BACK TO TOP
        ========================= */

        .back-top {
            position: fixed;
            right: 25px;
            bottom: 25px;

            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #fff;
            background: rgba(15, 21, 38, .8);

            border: 1px solid var(--border);
            border-radius: 13px;

            text-decoration: none;

            backdrop-filter: blur(12px);

            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);

            transition: .3s ease;
        }

        .back-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-top:hover {
            color: var(--accent2);
            border-color: rgba(34, 211, 238, .3);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 850px) {

            .topnav {
                padding: 13px 16px;
            }

            #myLinks {
                display: none;

                position: absolute;
                top: calc(100% + 10px);
                left: 0;
                right: 0;

                flex-direction: column;
                align-items: stretch;
                gap: 3px;

                padding: 10px;

                background: rgba(10, 14, 26, .94);
                border: 1px solid var(--border);
                border-radius: 16px;

                backdrop-filter: blur(20px);
            }

            #myLinks.show {
                display: flex;
            }

            #myLinks a {
                padding: 12px 14px;
            }

            .topnav .icon {
                display: block;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            main {
                padding-top: 115px;
            }
        }

        @media (max-width: 520px) {

            .topnav {
                width: calc(100% - 20px);
                top: 10px;
            }

            main {
                width: calc(100% - 20px);
            }

            .section-title {
                margin-bottom: 35px;
            }

            .section-title h1 {
                font-size: 38px;
            }

            .contact-card {
                padding: 22px;
                border-radius: 20px;
            }

            .info-item {
                padding: 13px;
            }

            .social-icons a {
                width: 38px;
                height: 38px;
            }
        }
    </style>
</head>

<body>

    <!-- BACKGROUND -->
    <div class="aurora"></div>
    <canvas id="particles"></canvas>

   


    <!-- MAIN -->
    <main>

        <!-- TITLE -->
        <section class="section-title">

            <div class="eyebrow">
                Let's Connect
            </div>

            <h1>
                Get In <span>Touch</span>
            </h1>

            <p>
                Have a question, project idea, or something you'd like to discuss?
                Send me a message and I'll get back to you.
            </p>

            <div class="divider"></div>

        </section>


        <!-- CONTACT -->
        <section class="contact-grid">

            <!-- CONTACT INFORMATION -->
            <div class="contact-card">

                <div class="card-title">

                    <div class="icon-box">
                        <i class="fa-solid fa-address-card"></i>
                    </div>

                    <div>
                        <h2>Contact Information</h2>
                        <p>Ways you can reach me</p>
                    </div>

                </div>


                <div class="contact-info">

                    @foreach($contact as $contacts)

                        <div class="info-item">

                            <div class="info-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>

                            <div class="info-content">

                                <small>Address</small>

                                <span>
                                    {{ $contacts->contact_address }}
                                </span>

                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>

                            <div class="info-content">

                                <small>Email</small>

                                <a href="mailto:{{ $contacts->contact_email }}">
                                    {{ $contacts->contact_email }}
                                </a>

                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>

                            <div class="info-content">

                                <small>Phone</small>

                                <span>
                                    {{ $contacts->contact_no }}
                                </span>

                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-icon">
                                <i class="fa-solid fa-globe"></i>
                            </div>

                            <div class="info-content">

                                <small>Website</small>

                                <a href="{{ $contacts->contact_website }}" target="_blank">
                                    {{ $contacts->contact_website }}
                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


            <!-- MESSAGE FORM -->
            <div class="contact-card">

                <div class="card-title">

                    <div class="icon-box">
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>

                    <div>
                        <h2>Send a Message</h2>
                        <p>I'll get back to you as soon as possible</p>
                    </div>

                </div>


                <form action="" method="POST" class="contact_form" id="contact_form">

                    @csrf

                    <div class="returnmessage"
                        data-success="Your message has been received. We will contact you soon.">
                    </div>

                    <div class="empty_notice">
                        <span>Please fill all required fields.</span>
                    </div>


                    <div class="form-group">

                        <label for="name">
                            Your Name
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            class="form-control"
                            placeholder="Enter your name"
                            required>

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Your Email
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            class="form-control"
                            placeholder="Enter your email"
                            required>

                    </div>


                    <div class="form-group">

                        <label for="message">
                            Your Message
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            class="form-control"
                            placeholder="Write your message..."
                            required></textarea>

                    </div>


                    <button type="submit" class="send-btn">

                        <i class="fa-solid fa-paper-plane"></i>

                        Send Message

                    </button>

                </form>

            </div>

        </section>

    </main>


   


    <!-- BACK TO TOP -->
    <a href="#" class="back-top" id="backTop">
        <i class="fa-solid fa-arrow-up"></i>
    </a>


    <script>

        /* =========================
           MOBILE MENU
        ========================= */

        function toggleMenu() {

            const menu = document.getElementById("myLinks");

            menu.classList.toggle("show");

        }


        /* =========================
           BACK TO TOP
        ========================= */

        const backTop = document.getElementById("backTop");

        window.addEventListener("scroll", function () {

            if (window.scrollY > 400) {

                backTop.classList.add("show");

            } else {

                backTop.classList.remove("show");

            }

        });


        /* =========================
           PARTICLES
        ========================= */

        const canvas = document.getElementById("particles");
        const ctx = canvas.getContext("2d");

        let particles = [];

        function resizeCanvas() {

            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

        }

        function createParticles() {

            particles = [];

            const count = Math.min(
                70,
                Math.floor(window.innerWidth / 18)
            );

            for (let i = 0; i < count; i++) {

                particles.push({

                    x: Math.random() * canvas.width,

                    y: Math.random() * canvas.height,

                    size: Math.random() * 1.5 + .5,

                    speedX: (Math.random() - .5) * .25,

                    speedY: (Math.random() - .5) * .25

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

            particles.forEach(p => {

                p.x += p.speedX;
                p.y += p.speedY;


                if (p.x < 0 || p.x > canvas.width) {
                    p.speedX *= -1;
                }

                if (p.y < 0 || p.y > canvas.height) {
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

                ctx.fillStyle = "rgba(148,163,184,.35)";

                ctx.fill();

            });

            requestAnimationFrame(animateParticles);

        }


        resizeCanvas();

        createParticles();

        animateParticles();


        window.addEventListener("resize", function () {

            resizeCanvas();

            createParticles();

        });

    </script>

@endsection

