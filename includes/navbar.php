<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<style>
    .site-navbar {
        position: relative;
        z-index: 1000;

        width: 100%;

        border-bottom: 1px solid rgba(255, 255, 255, 0.08);

        background: rgba(7, 11, 22, 0.88);

        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
    }

    .site-navbar-inner {
        max-width: 1120px;
        min-height: 70px;

        margin: 0 auto;
        padding: 0 24px;

        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .site-brand {
        color: #ffffff;
        text-decoration: none;

        font-size: 16px;
        font-weight: 800;
        letter-spacing: -0.4px;

        transition: opacity 0.25s ease;
    }

    .site-brand:hover {
        color: #ffffff;
        opacity: 0.8;
    }

    .site-nav {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .site-nav a {
        position: relative;

        color: #9da8bd;
        text-decoration: none;

        font-size: 12px;
        font-weight: 600;

        transition:
            color 0.25s ease,
            transform 0.25s ease;
    }

    .site-nav a::after {
        content: "";

        position: absolute;
        left: 0;
        bottom: -9px;

        width: 0;
        height: 2px;

        border-radius: 10px;

        background: linear-gradient(
            90deg,
            #7c4dff,
            #55d6ff
        );

        transition: width 0.25s ease;
    }

    .site-nav a:hover {
        color: #ffffff;
        transform: translateY(-1px);
    }

    .site-nav a:hover::after {
        width: 100%;
    }

    .site-nav a.active {
        color: #ffffff;
    }

    .site-nav a.active::after {
        width: 100%;
    }

    @media (max-width: 600px) {
        .site-navbar-inner {
            min-height: 64px;
            padding: 0 18px;
        }

        .site-nav {
            gap: 18px;
        }

        .site-nav a {
            font-size: 11px;
        }

        .site-brand {
            font-size: 15px;
        }
    }

    @media (max-width: 420px) {
        .site-navbar-inner {
            padding: 0 15px;
        }

        .site-nav {
            gap: 12px;
        }

        .site-nav a {
            font-size: 10px;
        }
    }
</style>

<nav class="site-navbar">

    <div class="site-navbar-inner">

        <a
            href="index.php"
            class="site-brand"
        >
            Heru.
        </a>

        <div class="site-nav">

            <a
                href="index.php"
                class="<?= $currentPage === 'index.php' ? 'active' : '' ?>"
            >
                Profil
            </a>

            <a
                href="projects.php"
                class="<?= $currentPage === 'projects.php' ? 'active' : '' ?>"
            >
                Project
            </a>

            <a
                href="kontak.php"
                class="<?= $currentPage === 'kontak.php' ? 'active' : '' ?>"
            >
                Kontak
            </a>

        </div>

    </div>

</nav>