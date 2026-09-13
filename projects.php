<?php
require_once 'config/database.php';

$query = "SELECT * FROM projects ORDER BY created_at DESC";
$stmt = $koneksi->prepare($query);
$stmt->execute();

$daftar_project = $stmt->fetchAll(PDO::FETCH_ASSOC);

$jumlah_project = count($daftar_project);
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
        content="Project Heru Perdana Saputra - Web Developer."
    >

    <title>Project - Heru Perdana Saputra</title>


    <style>

        /* =====================================================
           ROOT
        ====================================================== */

        :root {
            --bg-main: #070b17;
            --bg-soft: #0d1222;

            --card: rgba(15, 22, 38, 0.88);

            --text-main: #f8fafc;
            --text-muted: #a8b1c7;

            --purple: #7c5cff;
            --purple-light: #a78bfa;

            --cyan: #6ee7d8;

            --border: rgba(255, 255, 255, 0.10);
        }


        /* =====================================================
           RESET
        ====================================================== */

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

            scroll-behavior: smooth;

            overflow-x: hidden;
        }

        body {
            width: 100%;
            max-width: 100%;

            min-width: 0;
            min-height: 100vh;

            margin: 0;
            padding: 0;

            overflow-x: hidden;

            font-family:
                Inter,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            color: var(--text-main);

            background:
                radial-gradient(
                    circle at 10% 15%,
                    rgba(124, 92, 255, 0.15),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 90% 75%,
                    rgba(45, 212, 191, 0.09),
                    transparent 28%
                ),
                var(--bg-main);

            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        a {
            -webkit-tap-highlight-color: transparent;
        }


        /* =====================================================
           DECORATIVE BACKGROUND
        ====================================================== */

        body::before {
            content: "";

            position: fixed;

            width: 300px;
            height: 300px;

            left: -150px;
            top: 230px;

            border:
                1px solid
                rgba(124, 92, 255, 0.20);

            border-radius: 50%;

            pointer-events: none;

            z-index: 0;
        }

        body::after {
            content: "";

            position: fixed;

            width: 300px;
            height: 300px;

            right: -150px;
            bottom: 80px;

            border:
                1px solid
                rgba(110, 231, 216, 0.12);

            border-radius: 50%;

            pointer-events: none;

            z-index: 0;
        }


        /* =====================================================
           PAGE
        ====================================================== */

        .projects-page {
            position: relative;

            width: 100%;
            max-width: 100%;

            min-height: 100vh;

            padding:
                125px 0 90px;

            overflow: hidden;
        }

        .projects-container {
            position: relative;

            z-index: 2;

            width:
                min(
                    1120px,
                    calc(100% - 48px)
                );

            max-width: 100%;

            min-width: 0;

            margin:
                0 auto;
        }


        /* =====================================================
           HEADER
        ====================================================== */

        .projects-header {
            width: 100%;
            max-width: 800px;

            margin-bottom: 60px;
        }

        .eyebrow {
            display: inline-flex;

            align-items: center;

            gap: 9px;

            max-width: 100%;

            padding:
                8px 14px;

            margin-bottom: 25px;

            border:
                1px solid
                rgba(124, 92, 255, 0.45);

            border-radius: 999px;

            background:
                rgba(124, 92, 255, 0.08);

            color: #b9adff;

            font-size: 13px;

            font-weight: 600;

            line-height: 1.2;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;

            flex-shrink: 0;

            border-radius: 50%;

            background: var(--purple-light);

            box-shadow:
                0 0 13px
                rgba(124, 92, 255, 0.90);
        }

        .projects-title {
            width: 100%;
            max-width: 800px;

            margin: 0;

            font-size:
                clamp(
                    4rem,
                    8vw,
                    6rem
                );

            line-height: 0.92;

            letter-spacing: -5px;

            font-weight: 800;
        }

        .projects-title span {
            background:
                linear-gradient(
                    90deg,
                    #ffffff,
                    #b9a7ff,
                    #8f82ff
                );

            -webkit-background-clip: text;
            background-clip: text;

            -webkit-text-fill-color: transparent;

            color: transparent;
        }

        .projects-intro {
            width: 100%;
            max-width: 720px;

            margin:
                28px 0 0;

            color: var(--text-muted);

            font-size: 17px;

            line-height: 1.8;

            overflow-wrap: anywhere;
        }


        /* =====================================================
           PROJECT GRID
        ====================================================== */

        .project-grid {
            display: grid;

            grid-template-columns:
                repeat(
                    2,
                    minmax(0, 1fr)
                );

            gap: 24px;

            width: 100%;
            max-width: 100%;

            min-width: 0;
        }

        .project-grid.single-project {
            grid-template-columns:
                minmax(0, 1fr);
        }


        /* =====================================================
           PROJECT CARD
        ====================================================== */

        .project-card {
            position: relative;

            display: flex;

            flex-direction: column;

            width: 100%;
            max-width: 100%;

            min-width: 0;

            min-height: 390px;

            padding: 30px;

            border:
                1px solid
                var(--border);

            border-radius: 22px;

            background:
                linear-gradient(
                    145deg,
                    rgba(124, 92, 255, 0.07),
                    rgba(8, 13, 25, 0.94) 45%
                ),
                var(--card);

            overflow: hidden;

            transition:
                transform 0.25s ease,
                border-color 0.25s ease,
                box-shadow 0.25s ease;
        }

        .project-grid.single-project
        .project-card {
            width: 100%;
            max-width: 100%;
        }

        .project-card::before {
            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            right: -130px;
            top: -130px;

            border-radius: 50%;

            background:
                rgba(124, 92, 255, 0.15);

            filter: blur(38px);

            pointer-events: none;
        }

        .project-card::after {
            content: "";

            position: absolute;

            width: 160px;
            height: 160px;

            left: -90px;
            bottom: -90px;

            border-radius: 50%;

            background:
                rgba(110, 231, 216, 0.07);

            filter: blur(35px);

            pointer-events: none;
        }

        .project-card:hover {
            transform:
                translateY(-5px);

            border-color:
                rgba(124, 92, 255, 0.42);

            box-shadow:
                0 20px 55px
                rgba(0, 0, 0, 0.30);
        }


        /* =====================================================
           NUMBER
        ====================================================== */

        .project-number {
            position: relative;

            z-index: 2;

            display: flex;

            align-items: center;
            justify-content: center;

            width: 50px;
            height: 50px;

            flex-shrink: 0;

            margin-bottom: 30px;

            border:
                1px solid
                rgba(124, 92, 255, 0.48);

            border-radius: 14px;

            background:
                rgba(124, 92, 255, 0.08);

            color: #bcaeff;

            font-size: 14px;

            font-weight: 700;
        }


        /* =====================================================
           CONTENT
        ====================================================== */

        .project-content {
            position: relative;

            z-index: 2;

            width: 100%;
            max-width: 100%;

            min-width: 0;

            flex: 1;
        }

        .project-title {
            width: 100%;
            max-width: 100%;

            margin:
                0 0 10px;

            color: #ffffff;

            font-size: 30px;

            line-height: 1.2;

            letter-spacing: -0.8px;

            font-weight: 800;

            overflow-wrap: anywhere;
            word-break: normal;
        }

        .project-role {
            width: 100%;
            max-width: 100%;

            margin-bottom: 22px;

            color: var(--cyan);

            font-size: 14px;

            line-height: 1.5;

            font-weight: 600;

            overflow-wrap: anywhere;
        }

        .project-description {
            width: 100%;
            max-width: 100%;

            margin:
                0 0 25px;

            color: #aab4c8;

            font-size: 15px;

            line-height: 1.8;

            overflow-wrap: anywhere;
            word-break: normal;
        }


        /* =====================================================
           TECHNOLOGY
        ====================================================== */

        .tech-list {
            display: flex;

            flex-wrap: wrap;

            align-items: flex-start;

            gap: 8px;

            width: 100%;
            max-width: 100%;

            margin-bottom: 28px;
        }

        .tech-tag {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            max-width: 100%;

            padding:
                7px 11px;

            border:
                1px solid
                rgba(110, 231, 216, 0.18);

            border-radius: 999px;

            background:
                rgba(110, 231, 216, 0.04);

            color: #9edff1;

            font-size: 11px;

            line-height: 1.3;

            font-weight: 600;

            overflow-wrap: anywhere;
        }


        /* =====================================================
           ACTIONS
        ====================================================== */

        .project-actions {
            position: relative;

            z-index: 2;

            display: flex;

            flex-wrap: wrap;

            gap: 10px;

            width: 100%;
            max-width: 100%;

            margin-top: auto;
        }

        .project-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 0;
            min-height: 42px;

            padding:
                10px 17px;

            border-radius: 11px;

            text-decoration: none;

            font-size: 12px;

            line-height: 1.2;

            font-weight: 700;

            white-space: nowrap;

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        .project-btn:hover {
            transform:
                translateY(-2px);
        }

        .btn-demo {
            color: #ffffff;

            background:
                linear-gradient(
                    135deg,
                    #7146ef,
                    #875cff
                );

            box-shadow:
                0 10px 28px
                rgba(113, 70, 239, 0.22);
        }

        .btn-demo:hover {
            color: #ffffff;

            box-shadow:
                0 12px 32px
                rgba(113, 70, 239, 0.35);
        }

        .btn-github {
            color: #d9deea;

            border:
                1px solid
                rgba(255, 255, 255, 0.13);

            background:
                rgba(255, 255, 255, 0.035);
        }

        .btn-github:hover {
            color: #ffffff;

            background:
                rgba(255, 255, 255, 0.08);
        }


        /* =====================================================
           FOOTER
        ====================================================== */

        .project-footer {
            position: relative;

            z-index: 2;

            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 20px;

            width: 100%;
            max-width: 100%;

            margin-top: 30px;
            padding-top: 21px;

            border-top:
                1px solid
                rgba(255, 255, 255, 0.08);
        }

        .project-meta-label {
            margin-bottom: 5px;

            color: #69748b;

            font-size: 10px;

            line-height: 1.2;

            font-weight: 700;

            letter-spacing: 0.12em;

            text-transform: uppercase;
        }

        .project-meta-value {
            color: #d4d9e7;

            font-size: 12px;

            line-height: 1.4;
        }

        .project-status {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            color: #aeeeff;

            font-size: 12px;

            line-height: 1.4;

            font-weight: 600;

            white-space: nowrap;
        }

        .project-status::before {
            content: "";

            width: 7px;
            height: 7px;

            flex-shrink: 0;

            border-radius: 50%;

            background: var(--cyan);

            box-shadow:
                0 0 12px
                rgba(110, 231, 216, 0.85);
        }


        /* =====================================================
           EMPTY STATE
        ====================================================== */

        .empty-project {
            width: 100%;
            max-width: 100%;

            padding:
                60px 30px;

            border:
                1px solid
                var(--border);

            border-radius: 22px;

            background:
                rgba(15, 22, 38, 0.72);

            text-align: center;
        }

        .empty-project h3 {
            margin:
                0 0 10px;

            color: #ffffff;

            font-size: 24px;
        }

        .empty-project p {
            margin: 0;

            color: var(--text-muted);

            line-height: 1.7;
        }


        /* =====================================================
           LARGE DESKTOP
        ====================================================== */

        @media (min-width: 1200px) {

            .projects-page {
                padding-top: 135px;
            }

            .projects-header {
                margin-bottom: 65px;
            }

            .projects-title {
                font-size: 92px;
            }
        }


        /* =====================================================
           TABLET
        ====================================================== */

        @media (max-width: 900px) {

            .projects-page {
                padding:
                    115px 0 80px;
            }

            .projects-container {
                width:
                    calc(100% - 40px);
            }

            .projects-header {
                margin-bottom: 45px;
            }

            .projects-title {
                font-size:
                    clamp(
                        3.6rem,
                        10vw,
                        5.5rem
                    );

                letter-spacing: -4px;
            }

            .projects-intro {
                font-size: 16px;
            }

            .project-grid {
                grid-template-columns: 1fr;
            }

            .project-card {
                min-height: 350px;
            }
        }


        /* =====================================================
           MOBILE
        ====================================================== */

        @media screen and (max-width: 600px) {

            html,
            body {
                width: 100% !important;
                max-width: 100% !important;

                min-width: 0 !important;

                margin: 0 !important;
                padding: 0 !important;

                overflow-x: hidden !important;
            }


            /* PAGE */

            .projects-page {
                width: 100% !important;
                max-width: 100% !important;

                min-width: 0 !important;

                padding:
                    100px 0 60px !important;

                overflow: hidden !important;
            }


            /* CONTAINER */

            .projects-container {
                width:
                    calc(100% - 28px) !important;

                max-width:
                    calc(100% - 28px) !important;

                min-width: 0 !important;

                margin:
                    0 auto !important;
            }


            /* HEADER */

            .projects-header {
                width: 100% !important;
                max-width: 100% !important;

                margin-bottom:
                    38px !important;
            }

            .eyebrow {
                padding:
                    7px 12px !important;

                margin-bottom:
                    20px !important;

                font-size:
                    11px !important;
            }

            .projects-title {
                width: 100% !important;
                max-width: 100% !important;

                font-size:
                    clamp(
                        3.1rem,
                        16vw,
                        4.4rem
                    ) !important;

                line-height:
                    0.92 !important;

                letter-spacing:
                    -3px !important;

                overflow-wrap:
                    normal !important;
            }

            .projects-intro {
                width: 100% !important;
                max-width: 100% !important;

                margin:
                    20px 0 0 !important;

                font-size:
                    0.88rem !important;

                line-height:
                    1.75 !important;

                overflow-wrap:
                    anywhere !important;
            }


            /* GRID */

            .project-grid,
            .project-grid.single-project {
                display: grid !important;

                grid-template-columns:
                    minmax(0, 1fr) !important;

                gap:
                    18px !important;

                width: 100% !important;
                max-width: 100% !important;

                min-width: 0 !important;
            }


            /* CARD */

            .project-card,
            .project-grid.single-project .project-card {
                width: 100% !important;
                max-width: 100% !important;

                min-width: 0 !important;

                min-height: auto !important;

                padding:
                    23px 19px !important;

                border-radius:
                    19px !important;
            }


            /* NUMBER */

            .project-number {
                width: 44px !important;
                height: 44px !important;

                margin-bottom:
                    22px !important;

                border-radius:
                    12px !important;

                font-size:
                    12px !important;
            }


            /* TITLE */

            .project-title {
                width: 100% !important;
                max-width: 100% !important;

                margin:
                    0 0 9px !important;

                font-size:
                    clamp(
                        1.45rem,
                        7vw,
                        1.75rem
                    ) !important;

                line-height:
                    1.2 !important;

                letter-spacing:
                    -0.5px !important;

                overflow-wrap:
                    anywhere !important;
            }


            /* ROLE */

            .project-role {
                width: 100% !important;
                max-width: 100% !important;

                margin-bottom:
                    16px !important;

                font-size:
                    0.76rem !important;

                line-height:
                    1.5 !important;

                overflow-wrap:
                    anywhere !important;
            }


            /* DESCRIPTION */

            .project-description {
                width: 100% !important;
                max-width: 100% !important;

                margin:
                    0 0 20px !important;

                font-size:
                    0.82rem !important;

                line-height:
                    1.75 !important;

                overflow-wrap:
                    anywhere !important;
            }


            /* TECHNOLOGY */

            .tech-list {
                width: 100% !important;
                max-width: 100% !important;

                gap:
                    6px !important;

                margin-bottom:
                    22px !important;
            }

            .tech-tag {
                max-width: 100% !important;

                padding:
                    6px 9px !important;

                font-size:
                    0.62rem !important;

                line-height:
                    1.3 !important;
            }


            /* ACTIONS */

            .project-actions {
                width: 100% !important;
                max-width: 100% !important;

                display: flex !important;

                flex-direction: column !important;

                align-items: stretch !important;

                gap:
                    8px !important;

                margin-top:
                    0 !important;
            }

            .project-btn {
                width: 100% !important;
                max-width: 100% !important;

                min-width: 0 !important;

                min-height:
                    42px !important;

                padding:
                    10px 14px !important;

                font-size:
                    0.72rem !important;

                white-space:
                    nowrap !important;
            }


            /* FOOTER */

            .project-footer {
                width: 100% !important;
                max-width: 100% !important;

                align-items:
                    flex-start !important;

                flex-direction:
                    column !important;

                gap:
                    13px !important;

                margin-top:
                    24px !important;

                padding-top:
                    18px !important;
            }

            .project-meta-label {
                font-size:
                    0.56rem !important;
            }

            .project-meta-value {
                font-size:
                    0.68rem !important;
            }

            .project-status {
                font-size:
                    0.68rem !important;

                white-space:
                    normal !important;
            }


            /* EMPTY */

            .empty-project {
                width: 100% !important;
                max-width: 100% !important;

                padding:
                    45px 20px !important;

                border-radius:
                    18px !important;
            }

            .empty-project h3 {
                font-size:
                    1.3rem !important;
            }

            .empty-project p {
                font-size:
                    0.82rem !important;

                line-height:
                    1.7 !important;
            }


            /* BACKGROUND DECORATION */

            body::before {
                width: 200px;
                height: 200px;

                left: -125px;

                top: 180px;
            }

            body::after {
                width: 200px;
                height: 200px;

                right: -125px;

                bottom: 80px;
            }
        }


        /* =====================================================
           SMALL PHONE
           320px - 380px
        ====================================================== */

        @media screen and (max-width: 380px) {

            .projects-page {
                padding:
                    95px 0 50px !important;
            }

            .projects-container {
                width:
                    calc(100% - 22px) !important;

                max-width:
                    calc(100% - 22px) !important;
            }

            .projects-title {
                font-size:
                    2.9rem !important;

                letter-spacing:
                    -2.5px !important;
            }

            .projects-intro {
                font-size:
                    0.78rem !important;
            }

            .project-card {
                padding:
                    21px 16px !important;

                border-radius:
                    17px !important;
            }

            .project-number {
                width: 41px !important;
                height: 41px !important;

                margin-bottom:
                    20px !important;
            }

            .project-title {
                font-size:
                    1.35rem !important;
            }

            .project-role {
                font-size:
                    0.70rem !important;
            }

            .project-description {
                font-size:
                    0.76rem !important;
            }

            .tech-tag {
                padding:
                    5px 8px !important;

                font-size:
                    0.57rem !important;
            }

            .project-btn {
                font-size:
                    0.68rem !important;
            }
        }


        /* =====================================================
           VERY SMALL PHONE
           <= 320px
        ====================================================== */

        @media screen and (max-width: 320px) {

            .projects-container {
                width:
                    calc(100% - 18px) !important;

                max-width:
                    calc(100% - 18px) !important;
            }

            .projects-title {
                font-size:
                    2.65rem !important;

                letter-spacing:
                    -2px !important;
            }

            .projects-intro {
                font-size:
                    0.74rem !important;
            }

            .project-card {
                padding:
                    19px 14px !important;
            }

            .project-title {
                font-size:
                    1.25rem !important;
            }

            .project-description {
                font-size:
                    0.72rem !important;
            }
        }


        /* =====================================================
           REDUCE MOTION
        ====================================================== */

        @media (prefers-reduced-motion: reduce) {

            html {
                scroll-behavior: auto;
            }

            .project-card,
            .project-btn {
                transition: none;
            }
        }

    </style>

</head>


<body>


<?php require_once 'includes/navbar.php'; ?>


<main class="projects-page">

    <div class="projects-container">


        <!-- =================================================
             HEADER
        ================================================== -->

        <header class="projects-header">

            <div class="eyebrow">

                <span class="eyebrow-dot"></span>

                Selected Projects

            </div>


            <h1 class="projects-title">

                Project<br>

                <span>Saya.</span>

            </h1>


            <p class="projects-intro">

                Beberapa project yang saya kerjakan menggunakan
                PHP, MySQL, dan teknologi web lainnya untuk
                membangun aplikasi yang fungsional, aman,
                dan mudah digunakan.

            </p>

        </header>


        <!-- =================================================
             PROJECT LIST
        ================================================== -->

        <?php if ($jumlah_project === 0): ?>


            <div class="empty-project">

                <h3>
                    Belum Ada Project
                </h3>

                <p>
                    Belum ada project yang ditambahkan
                    untuk ditampilkan.
                </p>

            </div>


        <?php else: ?>


            <div
                class="project-grid <?= $jumlah_project === 1 ? 'single-project' : '' ?>"
            >


                <?php foreach (
                    $daftar_project
                    as $index => $project
                ): ?>


                    <article class="project-card">


                        <!-- NUMBER -->

                        <div class="project-number">

                            <?= str_pad(
                                $index + 1,
                                2,
                                '0',
                                STR_PAD_LEFT
                            ) ?>

                        </div>


                        <!-- CONTENT -->

                        <div class="project-content">


                            <h2 class="project-title">

                                <?= htmlspecialchars(
                                    $project['judul'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>

                            </h2>


                            <div class="project-role">

                                Full-Stack Web Development

                            </div>


                            <p class="project-description">

                                <?= htmlspecialchars(
                                    $project['deskripsi'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>

                            </p>


                            <!-- TECHNOLOGY -->

                            <?php if (
                                !empty(
                                    $project['teknologi']
                                )
                            ): ?>


                                <div class="tech-list">


                                    <?php

                                    $teknologi = explode(
                                        ',',
                                        $project['teknologi']
                                    );

                                    ?>


                                    <?php foreach (
                                        $teknologi
                                        as $tech
                                    ): ?>


                                        <?php

                                        $tech = trim($tech);

                                        ?>


                                        <?php if (
                                            $tech !== ''
                                        ): ?>


                                            <span class="tech-tag">

                                                <?= htmlspecialchars(
                                                    $tech,
                                                    ENT_QUOTES,
                                                    'UTF-8'
                                                ) ?>

                                            </span>


                                        <?php endif; ?>


                                    <?php endforeach; ?>


                                </div>


                            <?php endif; ?>


                        </div>


                        <!-- ACTIONS -->

                        <?php if (
                            !empty($project['link_demo'])
                            ||
                            !empty($project['link_github'])
                        ): ?>


                            <div class="project-actions">


                                <?php if (
                                    !empty(
                                        $project['link_demo']
                                    )
                                ): ?>


                                    <a
                                        href="<?= htmlspecialchars(
                                            $project['link_demo'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>"
                                        class="project-btn btn-demo"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >

                                        Lihat Demo →

                                    </a>


                                <?php endif; ?>


                                <?php if (
                                    !empty(
                                        $project['link_github']
                                    )
                                ): ?>


                                    <a
                                        href="<?= htmlspecialchars(
                                            $project['link_github'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>"
                                        class="project-btn btn-github"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >

                                        GitHub ↗

                                    </a>


                                <?php endif; ?>


                            </div>


                        <?php endif; ?>


                        <!-- FOOTER -->

                        <div class="project-footer">


                            <div>

                                <div class="project-meta-label">
                                    Stack
                                </div>

                                <div class="project-meta-value">
                                    PHP · MySQL
                                </div>

                            </div>


                            <div class="project-status">

                                Active Project

                            </div>


                        </div>


                    </article>


                <?php endforeach; ?>


            </div>


        <?php endif; ?>


    </div>

</main>


</body>
</html>