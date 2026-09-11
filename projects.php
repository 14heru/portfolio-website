<?php
require_once 'config/database.php';

$query = "SELECT * FROM projects ORDER BY created_at DESC";
$stmt = $koneksi->prepare($query);
$stmt->execute();
$daftar_project = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Project - Heru Perdana Saputra</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        :root {
            --bg: #070b16;
            --bg-soft: #0d1220;
            --card: rgba(15, 22, 38, 0.82);
            --border: rgba(255, 255, 255, 0.10);
            --text: #f5f7ff;
            --muted: #9da8bd;
            --purple: #7c4dff;
            --purple-light: #a78bfa;
            --cyan: #55d6ff;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(
                    circle at 10% 15%,
                    rgba(91, 62, 190, 0.18),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 90% 75%,
                    rgba(0, 180, 220, 0.10),
                    transparent 28%
                ),
                var(--bg);
            color: var(--text);
            font-family:
                Inter,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }

        /* Decorative background */

        body::before {
            content: "";
            position: fixed;
            width: 260px;
            height: 260px;
            left: -130px;
            top: 180px;
            border: 1px solid rgba(124, 77, 255, 0.25);
            border-radius: 50%;
            pointer-events: none;
        }

        body::after {
            content: "";
            position: fixed;
            width: 260px;
            height: 260px;
            right: -130px;
            bottom: 80px;
            border: 1px solid rgba(85, 214, 255, 0.15);
            border-radius: 50%;
            pointer-events: none;
        }

        .projects-wrapper {
            position: relative;
            max-width: 1120px;
            margin: 0 auto;
            padding: 90px 24px 100px;
        }

        /* Header */

        .projects-header {
            max-width: 720px;
            margin-bottom: 55px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            margin-bottom: 20px;

            border: 1px solid rgba(124, 77, 255, 0.45);
            border-radius: 999px;

            color: #bba9ff;
            background: rgba(124, 77, 255, 0.08);

            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.4px;
        }

        .eyebrow-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--purple-light);
            box-shadow: 0 0 12px var(--purple);
        }

        .projects-header h1 {
            margin: 0 0 18px;
            font-size: clamp(42px, 6vw, 70px);
            line-height: 0.98;
            font-weight: 800;
            letter-spacing: -3px;

            background: linear-gradient(
                90deg,
                #ffffff 0%,
                #ffffff 45%,
                #b9a7ff 100%
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .projects-header p {
            margin: 0;
            max-width: 650px;
            color: var(--muted);
            font-size: 16px;
            line-height: 1.8;
        }

        /* Project grid */

        /* Project grid */

        .project-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .project-card {
            position: relative;
            width: 100%;
            min-height: 290px;
            padding: 30px;

            background:
                linear-gradient(
                    145deg,
                    rgba(124, 77, 255, 0.07),
                    rgba(8, 13, 25, 0.92) 42%
                ),
                var(--card);

            border: 1px solid var(--border);
            border-radius: 22px;

            overflow: hidden;

            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                box-shadow 0.3s ease;
        }

        .project-card:only-child {
            grid-column: 1 / -1;
            max-width: 820px;
        }

            background:
                linear-gradient(
                    145deg,
                    rgba(124, 77, 255, 0.07),
                    rgba(8, 13, 25, 0.92) 42%
                ),
                var(--card);

            border: 1px solid var(--border);
            border-radius: 22px;

            overflow: hidden;

            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                box-shadow 0.3s ease;
        }

        .project-card::before {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            right: -75px;
            top: -75px;

            border-radius: 50%;
            background: rgba(124, 77, 255, 0.18);
            filter: blur(30px);
        }

        .project-card::after {
            content: "";
            position: absolute;
            width: 90px;
            height: 90px;
            left: -45px;
            bottom: -45px;

            border-radius: 50%;
            background: rgba(85, 214, 255, 0.10);
            filter: blur(25px);
        }

        .project-card:hover {
            transform: translateY(-7px);
            border-color: rgba(124, 77, 255, 0.45);
            box-shadow:
                0 18px 50px rgba(0, 0, 0, 0.30),
                0 0 35px rgba(124, 77, 255, 0.10);
        }

        .project-number {
            position: relative;
            z-index: 1;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            width: 42px;
            height: 42px;
            margin-bottom: 24px;

            border: 1px solid rgba(124, 77, 255, 0.35);
            border-radius: 12px;

            background: rgba(124, 77, 255, 0.08);
            color: #bcaeff;

            font-size: 13px;
            font-weight: 700;
        }

        .project-content {
            position: relative;
            z-index: 1;
        }

        .project-title {
            margin-bottom: 13px;

            color: #ffffff;
            font-size: 24px;
            line-height: 1.25;
            font-weight: 700;
        }

        .project-description {
            margin-bottom: 22px;

            color: #aab4c8;
            font-size: 14px;
            line-height: 1.75;
        }

        /* Technology */

        .tech-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 26px;
        }

        .tech-tag {
            display: inline-flex;
            align-items: center;

            padding: 7px 11px;

            border: 1px solid rgba(85, 214, 255, 0.16);
            border-radius: 999px;

            background: rgba(85, 214, 255, 0.05);
            color: #9edff1;

            font-size: 11px;
            font-weight: 600;
        }

        /* Buttons */

        .project-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .project-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-height: 40px;
            padding: 9px 16px;

            border-radius: 10px;

            text-decoration: none;
            font-size: 12px;
            font-weight: 600;

            transition: all 0.25s ease;
        }

        .btn-demo {
            background: linear-gradient(
                135deg,
                #7146ef,
                #875cff
            );
            color: white;

            box-shadow: 0 8px 25px rgba(113, 70, 239, 0.22);
        }

        .btn-demo:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(113, 70, 239, 0.35);
        }

        .btn-github {
            border: 1px solid rgba(255, 255, 255, 0.13);
            background: rgba(255, 255, 255, 0.035);
            color: #d9deea;
        }

        .btn-github:hover {
            color: white;
            border-color: rgba(255, 255, 255, 0.28);
            background: rgba(255, 255, 255, 0.08);
        }

        /* Empty state */

        .empty-project {
            padding: 55px 30px;

            border: 1px solid var(--border);
            border-radius: 22px;

            background: rgba(15, 22, 38, 0.70);

            text-align: center;
        }

        .empty-project h3 {
            margin-bottom: 10px;
            color: white;
            font-size: 22px;
        }

        .empty-project p {
            margin: 0;
            color: var(--muted);
        }

        /* Responsive */

        @media (max-width: 768px) {
            .projects-wrapper {
                padding: 65px 18px 70px;
            }

            .projects-header {
                margin-bottom: 38px;
            }

            .projects-header h1 {
                font-size: 48px;
                letter-spacing: -2px;
            }

            .project-grid {
                grid-template-columns: 1fr;
            }

            .project-card {
                padding: 25px;
            }
        }

        @media (max-width: 480px) {
            .projects-header h1 {
                font-size: 42px;
            }

            .project-actions {
                flex-direction: column;
            }

            .project-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <?php require_once 'includes/navbar.php'; ?>

    <main class="projects-wrapper">

        <header class="projects-header">

            <div class="eyebrow">
                <span class="eyebrow-dot"></span>
                Selected Projects
            </div>

            <h1>
                Project<br>
                Saya.
            </h1>

            <p>
                Beberapa project yang saya kerjakan menggunakan PHP, MySQL,
                dan teknologi web lainnya untuk membangun aplikasi yang
                fungsional dan mudah digunakan.
            </p>

        </header>

        <?php if (count($daftar_project) === 0): ?>

            <div class="empty-project">
                <h3>Belum Ada Project</h3>
                <p>Belum ada project yang ditambahkan untuk ditampilkan.</p>
            </div>

        <?php else: ?>

            <div class="project-grid">

                <?php foreach ($daftar_project as $index => $project): ?>

                    <article class="project-card">

                        <div class="project-number">
                            <?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?>
                        </div>

                        <div class="project-content">

                            <h2 class="project-title">
                                <?= htmlspecialchars(
                                    $project['judul'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>
                            </h2>

                            <p class="project-description">
                                <?= htmlspecialchars(
                                    $project['deskripsi'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>
                            </p>

                            <?php if (!empty($project['teknologi'])): ?>

                                <div class="tech-list">

                                    <?php
                                    $teknologi = explode(',', $project['teknologi']);
                                    ?>

                                    <?php foreach ($teknologi as $tech): ?>

                                        <?php $tech = trim($tech); ?>

                                        <?php if ($tech !== ''): ?>

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

                            <div class="project-actions">

                                <?php if (!empty($project['link_demo'])): ?>

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

                                <?php if (!empty($project['link_github'])): ?>

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

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </main>

</body>
</html>