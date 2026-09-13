<?php
// Halaman utama portfolio.
?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Portfolio Heru Perdana Saputra - Fresh Graduate Sistem Informasi dan Web Developer."
    >

    <title>Heru Perdana Saputra | Web Developer</title>


    <!-- Google Font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <style>

        /* =========================================================
           RESET
        ========================================================== */

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 0;

            overflow-x: hidden;
        }

        body {
            width: 100%;
            max-width: 100%;
            min-width: 0;

            margin: 0;
            padding: 0;

            min-height: 100vh;

            overflow-x: hidden;

            font-family:
                'Inter',
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            color: #f8fafc;

            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(124, 92, 255, 0.16),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 75%,
                    rgba(45, 212, 191, 0.10),
                    transparent 30%
                ),
                #070b17;
        }

        img {
            display: block;
            max-width: 100%;
        }

        a {
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }


        /* =========================================================
           NAVBAR
        ========================================================== */

        .portfolio-nav {
            position: fixed;

            top: 0;
            left: 0;

            width: 100%;

            z-index: 1000;

            padding: 15px 0;

            background:
                rgba(7, 11, 23, 0.90);

            border-bottom:
                1px solid
                rgba(255, 255, 255, 0.08);

            backdrop-filter:
                blur(16px);

            -webkit-backdrop-filter:
                blur(16px);
        }

        .nav-container {
            width: calc(100% - 40px);

            max-width: 1180px;

            margin: 0 auto;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }

        .brand {
            display: block;

            flex-shrink: 0;

            color: #ffffff;

            font-size: 1.15rem;

            font-weight: 800;

            letter-spacing: -0.5px;
        }

        .brand span {
            color: #a78bfa;
        }


        /* Desktop menu */

        .nav-links {
            display: flex;

            align-items: center;

            gap: 30px;
        }

        .nav-links a {
            color: #cbd5e1;

            font-size: 0.9rem;

            font-weight: 500;

            white-space: nowrap;
        }

        .nav-links a:hover {
            color: #ffffff;
        }


        /* Hamburger */

        .menu-toggle {
            display: none;

            width: 42px;
            height: 42px;

            padding: 0;

            border:
                1px solid
                rgba(255, 255, 255, 0.12);

            border-radius: 11px;

            background:
                rgba(255, 255, 255, 0.05);

            align-items: center;
            justify-content: center;

            flex-direction: column;

            gap: 5px;

            cursor: pointer;
        }

        .menu-toggle span {
            width: 18px;
            height: 2px;

            border-radius: 999px;

            background: #ffffff;

            transition:
                transform 0.25s ease,
                opacity 0.25s ease;
        }


        /* =========================================================
           HERO
        ========================================================== */

        .hero {
            position: relative;

            width: 100%;
            max-width: 100%;

            min-height: 100vh;

            padding:
                130px 20px 70px;

            overflow: hidden;
        }

        .hero-container {
            position: relative;

            width: 100%;
            max-width: 1180px;

            min-width: 0;

            margin: 0 auto;

            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                minmax(0, 0.9fr);

            align-items: center;

            gap: 50px;

            z-index: 2;
        }


        /* =========================================================
           CONTENT
        ========================================================== */

        .hero-content {
            width: 100%;
            min-width: 0;
            max-width: 100%;
        }

        .eyebrow {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding:
                8px 13px;

            margin-bottom: 22px;

            border:
                1px solid
                rgba(124, 92, 255, 0.35);

            border-radius: 999px;

            background:
                rgba(124, 92, 255, 0.08);

            color: #b9adff;

            font-size: 0.8rem;

            font-weight: 600;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;

            flex-shrink: 0;

            border-radius: 50%;

            background: #8b7cff;

            box-shadow:
                0 0 14px
                rgba(139, 124, 255, 0.9);
        }


        /* =========================================================
           TITLE
        ========================================================== */

        .hero h1 {
            width: 100%;
            max-width: 700px;

            margin: 0;

            font-size:
                clamp(3rem, 6vw, 5.7rem);

            line-height: 0.96;

            letter-spacing: -4px;

            font-weight: 800;

            overflow-wrap: normal;
        }

        .hero h1 .highlight {
            display: block;

            width: 100%;

            background:
                linear-gradient(
                    90deg,
                    #ffffff,
                    #a78bfa,
                    #6ee7d8
                );

            -webkit-background-clip: text;
            background-clip: text;

            -webkit-text-fill-color: transparent;
        }


        /* =========================================================
           ROLE
        ========================================================== */

        .hero-role {
            width: 100%;
            max-width: 680px;

            margin-top: 22px;

            color: #d7dcef;

            font-size:
                clamp(1rem, 2vw, 1.35rem);

            line-height: 1.5;

            font-weight: 600;

            overflow-wrap: anywhere;
        }

        .hero-role span {
            color: #a78bfa;
        }


        /* =========================================================
           DESCRIPTION
        ========================================================== */

        .hero-description {
            width: 100%;
            max-width: 620px;

            margin:
                17px 0 0;

            color: #a8b1c7;

            font-size: 0.96rem;

            line-height: 1.8;

            overflow-wrap: anywhere;
        }


        /* =========================================================
           BUTTONS
        ========================================================== */

        .hero-buttons {
            display: flex;

            align-items: center;

            flex-wrap: wrap;

            gap: 12px;

            margin-top: 28px;
        }

        .btn-main,
        .btn-outline {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 48px;

            padding:
                12px 22px;

            border-radius: 12px;

            font-size: 0.88rem;

            font-weight: 600;

            white-space: nowrap;
        }

        .btn-main {
            color: #ffffff;

            background:
                linear-gradient(
                    135deg,
                    #7c5cff,
                    #5f46d8
                );

            box-shadow:
                0 10px 30px
                rgba(124, 92, 255, 0.28);
        }

        .btn-outline {
            color: #e2e8f0;

            border:
                1px solid
                rgba(255, 255, 255, 0.14);

            background:
                rgba(255, 255, 255, 0.04);
        }


        /* =========================================================
           PROFILE
        ========================================================== */

        .hero-image-wrapper {
            position: relative;

            width: 100%;
            min-width: 0;

            min-height: 520px;

            display: flex;

            align-items: center;
            justify-content: center;

            overflow: visible;
        }

        .hero-glow {
            position: absolute;

            width: 420px;
            height: 420px;

            max-width: 90%;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(124, 92, 255, 0.25),
                    rgba(124, 92, 255, 0.08) 45%,
                    transparent 70%
                );

            filter:
                blur(30px);

            z-index: 0;
        }

        .profile-frame {
            position: relative;

            width: min(400px, 88%);

            aspect-ratio: 1 / 1;

            display: flex;

            align-items: center;
            justify-content: center;

            z-index: 2;
        }

        .profile-frame::before {
            content: "";

            position: absolute;

            width: 92%;
            height: 82%;

            border-radius:
                58% 42% 65% 35%
                /
                42% 58% 42% 58%;

            background:
                linear-gradient(
                    135deg,
                    #7c5cff,
                    #6847e8 55%,
                    #4f46c5
                );

            transform:
                rotate(-12deg);

            box-shadow:
                0 0 70px
                rgba(124, 92, 255, 0.28);

            z-index: 0;
        }

        .profile-frame::after {
            content: "";

            position: absolute;

            width: 55%;
            height: 48%;

            right: 0;
            top: 5%;

            border-radius:
                38% 62% 52% 48%
                /
                60% 40% 60% 40%;

            background:
                linear-gradient(
                    135deg,
                    rgba(110, 231, 216, 0.60),
                    rgba(59, 130, 246, 0.18)
                );

            transform:
                rotate(25deg);

            filter:
                blur(5px);

            z-index: 0;
        }

        .profile-inner {
            position: relative;

            width: 80%;
            max-width: 320px;

            aspect-ratio: 1 / 1;

            overflow: hidden;

            border-radius: 50%;

            background:
                #111827;

            border:
                2px solid
                rgba(255, 255, 255, 0.08);

            box-shadow:
                0 25px 60px
                rgba(0, 0, 0, 0.45);

            z-index: 2;
        }

        .profile-inner img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            object-position:
                center 28%;
        }


        /* =========================================================
           FLOATING CARD
        ========================================================== */

        .floating-card {
            position: absolute;

            right: 0;
            bottom: 55px;

            max-width: 165px;

            padding:
                12px 15px;

            border:
                1px solid
                rgba(255, 255, 255, 0.12);

            border-radius: 14px;

            background:
                rgba(15, 23, 42, 0.82);

            backdrop-filter:
                blur(14px);

            -webkit-backdrop-filter:
                blur(14px);

            box-shadow:
                0 15px 40px
                rgba(0, 0, 0, 0.35);

            z-index: 5;
        }

        .floating-card strong {
            display: block;

            color: #ffffff;

            font-size: 0.82rem;
        }

        .floating-card span {
            color: #94a3b8;

            font-size: 0.68rem;
        }


        /* =========================================================
           BACKGROUND DECORATION
        ========================================================== */

        .grid-background {
            position: fixed;

            inset: 0;

            width: 100%;
            height: 100%;

            opacity: 0.10;

            background-image:
                linear-gradient(
                    rgba(255, 255, 255, 0.04) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(255, 255, 255, 0.04) 1px,
                    transparent 1px
                );

            background-size: 60px 60px;

            pointer-events: none;

            z-index: 0;
        }

        .orb {
            position: fixed;

            border-radius: 50%;

            pointer-events: none;

            z-index: 0;
        }

        .orb-one {
            width: 180px;
            height: 180px;

            top: 20%;
            left: -100px;

            border:
                1px solid
                rgba(124, 92, 255, 0.15);
        }

        .orb-two {
            width: 220px;
            height: 220px;

            right: -130px;
            bottom: 5%;

            border:
                1px solid
                rgba(110, 231, 216, 0.10);
        }


        /* =========================================================
           TABLET
        ========================================================== */

        @media (max-width: 900px) {

            .hero {
                padding:
                    120px 24px 60px;
            }

            .hero-container {
                display: flex;

                flex-direction: column;

                gap: 25px;

                text-align: center;
            }

            .hero-content {
                order: 1;
            }

            .hero-image-wrapper {
                order: 2;

                min-height: 440px;
            }

            .eyebrow {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-role,
            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .floating-card {
                right: 5%;
            }
        }


        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 700px) {

            .portfolio-nav {
                padding:
                    10px 0;
            }

            .nav-container {
                width:
                    calc(100% - 28px);

                max-width:
                    none;
            }

            .menu-toggle {
                display: flex;
            }

            .nav-links {
                position: absolute;

                top:
                    calc(100% + 8px);

                left: 14px;
                right: 14px;

                width: auto;

                display: none;

                flex-direction: column;

                align-items: stretch;

                gap: 3px;

                padding: 9px;

                border:
                    1px solid
                    rgba(255, 255, 255, 0.10);

                border-radius: 15px;

                background:
                    rgba(8, 12, 25, 0.98);

                box-shadow:
                    0 20px 50px
                    rgba(0, 0, 0, 0.40);
            }

            .portfolio-nav.menu-open .nav-links {
                display: flex;
            }

            .nav-links a {
                width: 100%;

                padding:
                    12px;

                border-radius: 9px;

                font-size:
                    0.86rem;
            }


            /* Hero */

            .hero {
                width: 100%;

                padding:
                    95px 16px 45px;
            }

            .hero-container {
                width: 100%;
                max-width: 100%;

                margin: 0;

                gap: 25px;
            }


            /* Content */

            .hero-content {
                width: 100%;
                max-width: 100%;

                text-align: center;
            }

            .eyebrow {
                margin-bottom: 17px;

                padding:
                    7px 11px;

                font-size:
                    0.7rem;
            }


            /* Title */

            .hero h1 {
                width: 100%;
                max-width: 100%;

                font-size:
                    clamp(
                        2.5rem,
                        13vw,
                        3.5rem
                    );

                line-height:
                    0.94;

                letter-spacing:
                    -2.5px;
            }

            .hero h1 .highlight {
                width: 100%;
            }


            /* Role */

            .hero-role {
                width: 100%;
                max-width: 100%;

                margin-top: 17px;

                font-size:
                    clamp(
                        0.76rem,
                        3.2vw,
                        0.9rem
                    );

                line-height:
                    1.55;

                overflow-wrap:
                    anywhere;
            }


            /* Description */

            .hero-description {
                width: 100%;
                max-width: 100%;

                margin:
                    14px auto 0;

                font-size:
                    clamp(
                        0.74rem,
                        3vw,
                        0.84rem
                    );

                line-height:
                    1.75;

                overflow-wrap:
                    anywhere;
            }


            /* Buttons */

            .hero-buttons {
                width: 100%;
                max-width: 100%;

                margin-top: 23px;

                display: flex;

                flex-direction: column;

                gap: 8px;
            }

            .btn-main,
            .btn-outline {
                width: 100%;
                max-width: 100%;

                min-height: 44px;

                padding:
                    10px 14px;

                font-size:
                    0.8rem;
            }


            /* Profile */

            .hero-image-wrapper {
                width: 100%;
                max-width: 100%;

                min-height:
                    310px;

                overflow: hidden;
            }

            .hero-glow {
                width: 280px;
                height: 280px;

                max-width: 85%;
            }

            .profile-frame {
                width:
                    min(
                        285px,
                        82vw
                    );

                max-width:
                    100%;
            }

            .profile-inner {
                width: 76%;

                max-width:
                    225px;
            }

            .floating-card {
                right: 0;

                bottom: 4px;

                max-width:
                    125px;

                padding:
                    8px 10px;
            }

            .floating-card strong {
                font-size:
                    0.68rem;
            }

            .floating-card span {
                font-size:
                    0.58rem;
            }


            /* Decorations */

            .orb-one {
                width: 140px;
                height: 140px;

                left: -110px;
            }

            .orb-two {
                width: 170px;
                height: 170px;

                right: -115px;
            }
        }


        /* =========================================================
           SMALL PHONE
        ========================================================== */

        @media (max-width: 360px) {

            .nav-container {
                width:
                    calc(100% - 22px);
            }

            .hero {
                padding:
                    92px 12px 40px;
            }

            .hero h1 {
                font-size:
                    2.35rem;

                letter-spacing:
                    -2px;
            }

            .hero-role {
                font-size:
                    0.76rem;
            }

            .hero-description {
                font-size:
                    0.72rem;
            }

            .hero-image-wrapper {
                min-height:
                    285px;
            }

            .profile-frame {
                width:
                    255px;
            }

            .profile-inner {
                max-width:
                    200px;
            }

            .floating-card {
                max-width:
                    115px;

                padding:
                    7px 9px;
            }
        }


        /* =========================================================
           REDUCE MOTION
        ========================================================== */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
            }
        }

    </style>

</head>


<body>


    <!-- Background -->

    <div class="grid-background"></div>

    <div class="orb orb-one"></div>

    <div class="orb orb-two"></div>


    <!-- =========================================================
         NAVBAR
    ========================================================== -->

    <nav
        class="portfolio-nav"
        id="portfolioNav"
    >

        <div class="nav-container">

            <a
                href="index.php"
                class="brand"
            >
                Heru<span>.</span>
            </a>


            <button
                type="button"
                class="menu-toggle"
                id="menuToggle"
                aria-label="Buka menu navigasi"
                aria-expanded="false"
                aria-controls="navLinks"
            >

                <span></span>
                <span></span>
                <span></span>

            </button>


            <div
                class="nav-links"
                id="navLinks"
            >

                <a href="index.php">
                    Profil
                </a>

                <a href="projects.php">
                    Project
                </a>

                <a href="kontak.php">
                    Kontak
                </a>

            </div>

        </div>

    </nav>


    <!-- =========================================================
         HERO
    ========================================================== -->

    <main class="hero">

        <div class="hero-container">


            <!-- CONTENT -->

            <section class="hero-content">

                <div class="eyebrow">

                    <span class="eyebrow-dot"></span>

                    Open to Work

                </div>


                <h1>

                    Heru

                    <span class="highlight">
                        Perdana Saputra
                    </span>

                </h1>


                <div class="hero-role">

                    Fresh Graduate Sistem Informasi

                    <span>·</span>

                    Web Developer

                </div>


                <p class="hero-description">

                    Saya membangun aplikasi web menggunakan
                    PHP dan MySQL, dengan fokus pada
                    pengembangan fitur, pengelolaan database,
                    autentikasi, CRUD, validasi input, dan
                    penerapan keamanan dasar.

                </p>


                <div class="hero-buttons">

                    <a
                        href="projects.php"
                        class="btn-main"
                    >
                        Lihat Project
                    </a>

                    <a
                        href="kontak.php"
                        class="btn-outline"
                    >
                        Hubungi Saya
                    </a>

                </div>

            </section>


            <!-- PROFILE -->

            <section class="hero-image-wrapper">

                <div class="hero-glow"></div>

                <div class="profile-frame">

                    <div class="profile-inner">

                        <img
                            src="assets/img/profile.jpg"
                            alt="Foto profil Heru Perdana Saputra"
                        >

                    </div>

                </div>


                <div class="floating-card">

                    <strong>
                        PHP &amp; MySQL
                    </strong>

                    <span>
                        Web Development
                    </span>

                </div>

            </section>


        </div>

    </main>


    <!-- =========================================================
         MOBILE MENU
    ========================================================== -->

    <script>

        const nav =
            document.getElementById('portfolioNav');

        const toggle =
            document.getElementById('menuToggle');

        const links =
            document.getElementById('navLinks');


        if (nav && toggle && links) {

            toggle.addEventListener(
                'click',
                function () {

                    const open =
                        nav.classList.toggle(
                            'menu-open'
                        );

                    toggle.setAttribute(
                        'aria-expanded',
                        String(open)
                    );

                }
            );


            links
                .querySelectorAll('a')
                .forEach(function (link) {

                    link.addEventListener(
                        'click',
                        function () {

                            nav.classList.remove(
                                'menu-open'
                            );

                            toggle.setAttribute(
                                'aria-expanded',
                                'false'
                            );

                        }
                    );

                });


            window.addEventListener(
                'resize',
                function () {

                    if (
                        window.innerWidth > 700
                    ) {

                        nav.classList.remove(
                            'menu-open'
                        );

                        toggle.setAttribute(
                            'aria-expanded',
                            'false'
                        );

                    }

                }
            );

        }

    </script>


</body>

</html>