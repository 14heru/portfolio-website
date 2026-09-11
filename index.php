<?php
require_once 'includes/navbar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta
        name="description"
        content="Portfolio Heru Perdana Saputra - Fresh Graduate Sistem Informasi dan Web Developer."
    >

    <title>Heru Perdana Saputra | Web Developer</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

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
        :root {
            --bg-main: #070b17;
            --bg-secondary: #0c1224;
            --text-main: #f8fafc;
            --text-muted: #a8b1c7;
            --accent: #7c5cff;
            --accent-light: #9b8cff;
            --border: rgba(255, 255, 255, 0.10);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(124, 92, 255, 0.16),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 70%,
                    rgba(45, 212, 191, 0.10),
                    transparent 28%
                ),
                var(--bg-main);
            color: var(--text-main);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* =========================
           NAVBAR
        ========================== */

        .portfolio-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;

            padding: 18px 0;

            background: rgba(7, 11, 23, 0.72);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);

            border-bottom: 1px solid var(--border);
        }

        .nav-container {
            max-width: 1180px;
            margin: auto;
            padding: 0 24px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            color: #fff;
            text-decoration: none;
            font-size: 1.15rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .brand span {
            color: var(--accent-light);
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;

            transition:
                color 0.25s ease,
                transform 0.25s ease;
        }

        .nav-links a:hover {
            color: #fff;
            transform: translateY(-1px);
        }

        /* =========================
           HERO
        ========================== */

        .hero {
            position: relative;
            min-height: 100vh;

            display: flex;
            align-items: center;

            padding: 140px 24px 90px;

            overflow: hidden;
        }

        .hero-container {
            width: 100%;
            max-width: 1180px;
            margin: auto;

            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            align-items: center;
            gap: 70px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            padding: 8px 14px;
            margin-bottom: 22px;

            border: 1px solid rgba(124, 92, 255, 0.35);
            border-radius: 999px;

            background: rgba(124, 92, 255, 0.08);

            color: #b9adff;

            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #8b7cff;
            box-shadow: 0 0 14px #8b7cff;
        }

        .hero h1 {
            margin: 0;

            font-size: clamp(3rem, 6vw, 5.7rem);
            line-height: 0.98;
            letter-spacing: -4px;
            font-weight: 800;
        }

        .hero h1 .highlight {
            display: block;

            background:
                linear-gradient(
                    90deg,
                    #ffffff,
                    #9b8cff,
                    #6ee7d8
                );

            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-role {
            margin-top: 25px;

            font-size: clamp(1.1rem, 2vw, 1.45rem);
            font-weight: 600;
            color: #d7dcef;
        }

        .hero-role span {
            color: var(--accent-light);
        }

        .hero-description {
            max-width: 620px;
            margin-top: 20px;

            color: var(--text-muted);

            font-size: 1rem;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;

            margin-top: 32px;
        }

        .btn-main,
        .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 13px 22px;

            border-radius: 12px;

            text-decoration: none;

            font-size: 0.92rem;
            font-weight: 600;

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        .btn-main {
            color: white;

            background:
                linear-gradient(
                    135deg,
                    #7c5cff,
                    #5f46d8
                );

            box-shadow:
                0 10px 30px rgba(124, 92, 255, 0.28);
        }

        .btn-main:hover {
            color: white;
            transform: translateY(-3px);

            box-shadow:
                0 16px 35px rgba(124, 92, 255, 0.38);
        }

        .btn-outline {
            color: #e2e8f0;

            border: 1px solid rgba(255, 255, 255, 0.14);

            background: rgba(255, 255, 255, 0.04);
        }

        .btn-outline:hover {
            color: white;
            transform: translateY(-3px);

            background: rgba(255, 255, 255, 0.08);
        }

        /* =========================
           PROFILE IMAGE
        ========================== */

        .hero-image-wrapper {
            position: relative;

            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 580px;

            overflow: visible;
        }

        /* Glow lembut di belakang foto */
        .hero-glow {
            position: absolute;

            width: 430px;
            height: 430px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(124, 92, 255, 0.25),
                    rgba(124, 92, 255, 0.08) 45%,
                    transparent 70%
                );

            filter: blur(30px);

            animation: pulseGlow 4s ease-in-out infinite;

            z-index: 0;
        }

        /*
         * Wadah foto dibuat transparan.
         * Tidak ada frame yang mengelilingi foto.
         */
        .profile-frame {
            position: relative;

            width: min(400px, 80vw);
            height: 400px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: transparent;

            z-index: 1;
        }

        /* Bercak utama di belakang foto */
        .profile-frame::before {
            content: "";

            position: absolute;

            width: 370px;
            height: 330px;

            background:
                linear-gradient(
                    135deg,
                    #7c5cff,
                    #6847e8 55%,
                    #4f46c5
                );

            border-radius:
                58% 42% 65% 35%
                /
                42% 58% 42% 58%;

            transform:
                rotate(-12deg)
                translate(-10px, 10px);

            opacity: 0.9;

            filter: blur(0.3px);

            box-shadow:
                0 0 70px rgba(124, 92, 255, 0.28);

            z-index: 0;

            animation: blobMove 7s ease-in-out infinite;
        }

        /* Bercak kedua untuk memberi kedalaman */
        .profile-frame::after {
            content: "";

            position: absolute;

            width: 230px;
            height: 200px;

            background:
                linear-gradient(
                    135deg,
                    rgba(110, 231, 216, 0.60),
                    rgba(59, 130, 246, 0.18)
                );

            border-radius:
                38% 62% 52% 48%
                /
                60% 40% 60% 40%;

            transform:
                rotate(25deg)
                translate(100px, -75px);

            opacity: 0.65;

            filter: blur(5px);

            z-index: 0;

            animation: blobMoveTwo 8s ease-in-out infinite;
        }

        /* FOTO BULAT — tetap menggunakan foto asli */
        .profile-inner {
            position: relative;

            width: 320px;
            height: 320px;

            overflow: hidden;

            border-radius: 50%;

            background: #111827;

            /*
             * Border sangat tipis hanya untuk membantu
             * memisahkan foto dari bercak.
             * Bukan frame.
             */
            border: 2px solid rgba(255, 255, 255, 0.08);

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.45);

            z-index: 2;
        }

        /* Foto asli — tidak diedit */
        .profile-inner img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;
            object-position: center 28%;

            transition: transform 0.6s ease;
        }

        .profile-frame:hover .profile-inner img {
            transform: scale(1.04);
        }

        /* Badge */
        .floating-card {
            position: absolute;

            z-index: 5;

            right: 2%;
            bottom: 75px;

            padding: 14px 17px;

            border: 1px solid rgba(255, 255, 255, 0.12);

            border-radius: 15px;

            background:
                rgba(15, 23, 42, 0.78);

            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);

            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.35);
        }

        .floating-card strong {
            display: block;

            color: white;

            font-size: 0.88rem;
        }

        .floating-card span {
            color: #94a3b8;

            font-size: 0.72rem;
        }

        /* =========================
           DECORATIONS
        ========================== */

        .orb {
            position: absolute;

            border-radius: 50%;

            pointer-events: none;
        }

        .orb-one {
            width: 180px;
            height: 180px;

            top: 20%;
            left: -100px;

            border: 1px solid rgba(124, 92, 255, 0.15);
        }

        .orb-two {
            width: 240px;
            height: 240px;

            right: -140px;
            bottom: 8%;

            border: 1px solid rgba(110, 231, 216, 0.10);
        }

        .grid-background {
            position: absolute;
            inset: 0;

            opacity: 0.16;

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

            mask-image:
                linear-gradient(
                    to bottom,
                    black,
                    transparent 75%
                );

            pointer-events: none;
        }

        /* =========================
           ANIMATION
        ========================== */

        @keyframes pulseGlow {
            0%,
            100% {
                transform: scale(0.95);
                opacity: 0.65;
            }

            50% {
                transform: scale(1.05);
                opacity: 1;
            }
        }

        @keyframes blobMove {
            0%,
            100% {
                transform: rotate(-12deg) translate(-8px, 8px) scale(1);
            }

            50% {
                transform: rotate(-5deg) translate(4px, -4px) scale(1.05);
            }
        }

        @keyframes blobMoveTwo {
            0%,
            100% {
                transform: rotate(25deg) translate(95px, -80px) scale(1);
            }

            50% {
                transform: rotate(35deg) translate(105px, -70px) scale(1.08);
            }
        }

        @keyframes floating {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .floating-card {
            animation: floating 4s ease-in-out infinite;
        }

        /* =========================
           MOBILE
        ========================== */

        @media (max-width: 900px) {

            .hero {
                padding-top: 120px;
            }

            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 45px;
            }

            .hero-content {
                order: 1;
            }

            .hero-image-wrapper {
                order: 2;
                min-height: 520px;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .eyebrow {
                margin-left: auto;
                margin-right: auto;
            }

            .floating-card {
                right: 5%;
            }
        }

        @media (max-width: 600px) {

            .portfolio-nav {
                padding: 15px 0;
            }

            .nav-container {
                padding: 0 16px;
            }

            .nav-links {
                gap: 14px;
            }

            .nav-links a {
                font-size: 0.76rem;
            }

            .hero {
                padding-left: 18px;
                padding-right: 18px;
            }

            .hero h1 {
                letter-spacing: -2.5px;
            }

            .profile-frame {
                width: min(350px, 88vw);
                height: 350px;
            }

            .profile-frame::before {
                width: 320px;
                height: 285px;
            }

            .profile-frame::after {
                width: 205px;
                height: 175px;
            }

            .profile-inner {
                width: 275px;
                height: 275px;
            }

            .hero-image-wrapper {
                min-height: 420px;
            }

            .floating-card {
                right: 0;
                bottom: 25px;
            }
        }
    </style>
</head>

<body>

    <!-- Background -->
    <div class="grid-background"></div>

    <div class="orb orb-one"></div>
    <div class="orb orb-two"></div>

    <!-- Navbar -->
    <nav class="portfolio-nav">
        <div class="nav-container">

            <a href="index.php" class="brand">
                Heru<span>.</span>
            </a>

            <div class="nav-links">
                <a href="index.php">Profil</a>
                <a href="projects.php">Project</a>
                <a href="kontak.php">Kontak</a>
            </div>

        </div>
    </nav>

    <!-- Hero -->
    <main class="hero">

        <div class="hero-container">

            <!-- Content -->
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
                    Saya membangun aplikasi web menggunakan PHP dan MySQL,
                    dengan fokus pada pengembangan fitur, pengelolaan database,
                    autentikasi, CRUD, validasi input, dan penerapan keamanan
                    dasar.
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

            <!-- Profile -->
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

                    <strong>PHP & MySQL</strong>

                    <span>
                        Web Development
                    </span>

                </div>

            </section>

        </div>

    </main>

</body>
</html>