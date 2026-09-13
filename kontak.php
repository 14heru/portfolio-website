<?php

require_once 'includes/csrf.php';
require_once 'config/database.php';

$sukses = false;
$error = "";


// =====================================================
// PROSES FORM KONTAK
// =====================================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil input
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    $csrfToken = $_POST['csrf_token'] ?? '';


    // -------------------------------------------------
    // Validasi CSRF
    // -------------------------------------------------

    if (!verify_csrf_token($csrfToken)) {

        http_response_code(403);

        exit("Permintaan tidak valid.");
    }


    // -------------------------------------------------
    // Validasi field wajib
    // -------------------------------------------------

    if ($nama === '' || $email === '' || $pesan === '') {

        $error = "Semua field wajib diisi.";

    // -------------------------------------------------
    // Validasi email
    // -------------------------------------------------

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = "Format email tidak valid.";

    // -------------------------------------------------
    // Validasi panjang input
    // -------------------------------------------------

    } elseif (mb_strlen($nama) > 100) {

        $error = "Nama maksimal 100 karakter.";

    } elseif (mb_strlen($email) > 150) {

        $error = "Email maksimal 150 karakter.";

    } elseif (mb_strlen($pesan) > 2000) {

        $error = "Pesan maksimal 2000 karakter.";

    } else {

        // -------------------------------------------------
        // INSERT KE DATABASE
        // -------------------------------------------------

        $query = "
            INSERT INTO pesan_kontak
                (nama_pengirim, email_pengirim, pesan)
            VALUES
                (:nama, :email, :pesan)
        ";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([
            'nama' => $nama,
            'email' => $email,
            'pesan' => $pesan
        ]);

        $sukses = true;
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kontak - Heru Perdana Saputra</title>

    <style>
        :root {
            --bg: #070b16;
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

        .contact-wrapper {
            position: relative;

            max-width: 1120px;

            margin: 0 auto;
            padding: 85px 24px 100px;
        }

        /* Header */

        .contact-header {
            max-width: 720px;
            margin-bottom: 42px;
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

            box-shadow:
                0 0 12px var(--purple);
        }

        .contact-header h1 {
            margin: 0 0 18px;

            font-size: clamp(44px, 6vw, 70px);
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

        .contact-header p {
            margin: 0;

            max-width: 650px;

            color: var(--muted);

            font-size: 16px;
            line-height: 1.8;
        }

        /* Contact layout */

        .contact-layout {
            display: grid;

            grid-template-columns:
                minmax(0, 0.75fr)
                minmax(0, 1.25fr);

            gap: 24px;

            align-items: stretch;
        }

        /* Information card */

        .contact-info {
            position: relative;

            padding: 30px;

            min-height: 450px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            background:
                linear-gradient(
                    145deg,
                    rgba(124, 77, 255, 0.10),
                    rgba(8, 13, 25, 0.92) 48%
                ),
                var(--card);

            border: 1px solid var(--border);
            border-radius: 22px;

            overflow: hidden;
        }

        .contact-info::before {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            right: -80px;
            top: -80px;

            border-radius: 50%;

            background: rgba(124, 77, 255, 0.16);

            filter: blur(35px);
        }

        .contact-info-content {
            position: relative;
            z-index: 1;
        }

        .contact-info h2 {
            margin: 0 0 15px;

            color: #ffffff;

            font-size: 25px;
            font-weight: 700;
        }

        .contact-info p {
            margin: 0;

            color: #aab4c8;

            font-size: 14px;
            line-height: 1.8;
        }

        .contact-detail {
            position: relative;
            z-index: 1;

            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .detail-item {
            padding: 15px 17px;

            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 13px;

            background: rgba(255, 255, 255, 0.025);
        }

        .detail-label {
            display: block;

            margin-bottom: 4px;

            color: #77849c;

            font-size: 10px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .detail-value {
            color: #dce2ee;

            font-size: 13px;
        }

        /* Form card */

        .contact-form-card {
            padding: 30px;

            background:
                linear-gradient(
                    145deg,
                    rgba(15, 22, 38, 0.94),
                    rgba(8, 13, 25, 0.88)
                );

            border: 1px solid var(--border);
            border-radius: 22px;

            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.18);
        }

        .form-title {
            margin: 0 0 25px;

            color: #ffffff;

            font-size: 22px;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;

            margin-bottom: 8px;

            color: #c9d1df;

            font-size: 12px;
            font-weight: 600;
        }

        .form-control-custom {
            width: 100%;

            padding: 13px 15px;

            border: 1px solid rgba(255, 255, 255, 0.10);
            border-radius: 11px;

            outline: none;

            background: rgba(255, 255, 255, 0.035);

            color: #ffffff;

            font-family: inherit;
            font-size: 13px;

            transition:
                border-color 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        .form-control-custom::placeholder {
            color: #68758d;
        }

        .form-control-custom:focus {
            border-color: rgba(124, 77, 255, 0.70);

            background: rgba(124, 77, 255, 0.045);

            box-shadow:
                0 0 0 3px rgba(124, 77, 255, 0.10),
                0 0 25px rgba(124, 77, 255, 0.08);
        }

        textarea.form-control-custom {
            min-height: 155px;
            resize: vertical;
        }

        /* Alerts */

        .alert-custom {
            margin-bottom: 24px;

            padding: 13px 15px;

            border-radius: 11px;

            font-size: 13px;
            line-height: 1.6;
        }

        .alert-success-custom {
            border: 1px solid rgba(55, 210, 140, 0.25);

            background: rgba(55, 210, 140, 0.08);

            color: #9de9c5;
        }

        .alert-error-custom {
            border: 1px solid rgba(255, 90, 110, 0.25);

            background: rgba(255, 90, 110, 0.08);

            color: #ffb0bb;
        }

        /* Submit button */

        .submit-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            width: 100%;
            min-height: 46px;

            padding: 11px 18px;

            border: 0;
            border-radius: 11px;

            background:
                linear-gradient(
                    135deg,
                    #7146ef,
                    #875cff
                );

            color: #ffffff;

            font-family: inherit;
            font-size: 13px;
            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 10px 28px rgba(113, 70, 239, 0.24);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);

            box-shadow:
                0 13px 35px rgba(113, 70, 239, 0.38);
        }

        /* Responsive */

        /* =====================================================
        RESPONSIVE TABLET
        ===================================================== */

        @media screen and (max-width: 900px) {

            .contact-wrapper {
                width: 100%;
                max-width: 100%;

                margin: 0;
                padding: 80px 20px 80px;
            }

            .contact-header {
                width: 100%;
                max-width: 760px;

                margin-bottom: 42px;
            }

            .contact-layout {
                width: 100%;

                grid-template-columns: 1fr;

                gap: 20px;
            }

            .contact-info,
            .contact-form-card {
                width: 100%;
                max-width: 100%;

                min-width: 0;
            }

            .contact-info {
                min-height: auto;

                gap: 35px;
            }

            .contact-header h1 {
                font-size: clamp(
                    48px,
                    9vw,
                    70px
                );
            }
        }


        /* =====================================================
        MOBILE
        ===================================================== */

        @media screen and (max-width: 600px) {

            html,
            body {
                width: 100%;
                max-width: 100%;

                min-width: 0;

                overflow-x: hidden;
            }

            .contact-wrapper {
                width: 100%;
                max-width: 100%;

                margin: 0;

                padding:
                    92px 14px 60px;
            }

            .contact-header {
                width: 100%;
                max-width: 100%;

                margin-bottom: 32px;
            }

            .eyebrow {
                max-width: 100%;

                padding:
                    7px 12px;

                margin-bottom: 18px;

                font-size: 11px;
            }

            .contact-header h1 {
                width: 100%;
                max-width: 100%;

                margin:
                    0 0 16px;

                font-size:
                    clamp(
                        42px,
                        14vw,
                        62px
                    );

                line-height: 0.96;

                letter-spacing: -2.5px;

                overflow-wrap: normal;
            }

            .contact-header p {
                width: 100%;
                max-width: 100%;

                margin: 0;

                font-size: 14px;

                line-height: 1.75;

                overflow-wrap: anywhere;
            }


            /* =================================================
            CONTACT LAYOUT
            ================================================== */

            .contact-layout {
                width: 100%;
                max-width: 100%;

                display: flex;

                flex-direction: column;

                gap: 16px;
            }


            /* =================================================
            INFORMATION CARD
            ================================================== */

            .contact-info {
                width: 100%;
                max-width: 100%;

                min-width: 0;
                min-height: auto;

                padding:
                    22px 18px;

                border-radius: 18px;

                gap: 28px;
            }

            .contact-info h2 {
                margin-bottom: 12px;

                font-size: 22px;
            }

            .contact-info p {
                font-size: 13px;

                line-height: 1.75;

                overflow-wrap: anywhere;
            }

            .contact-detail {
                width: 100%;

                gap: 10px;
            }

            .detail-item {
                width: 100%;
                max-width: 100%;

                padding:
                    13px 14px;

                border-radius: 11px;

                min-width: 0;
            }

            .detail-value {
                display: block;

                font-size: 12px;

                line-height: 1.5;

                overflow-wrap: anywhere;
                word-break: break-word;
            }


            /* =================================================
            FORM CARD
            ================================================== */

            .contact-form-card {
                width: 100%;
                max-width: 100%;

                min-width: 0;

                padding:
                    22px 18px;

                border-radius: 18px;
            }

            .form-title {
                margin-bottom: 22px;

                font-size: 21px;
            }

            .form-group {
                width: 100%;

                margin-bottom: 17px;
            }

            .form-label {
                margin-bottom: 7px;

                font-size: 12px;
            }

            .form-control-custom {
                display: block;

                width: 100%;
                max-width: 100%;

                min-width: 0;

                padding:
                    12px 13px;

                font-size: 13px;

                border-radius: 10px;
            }

            textarea.form-control-custom {
                min-height: 145px;

                resize: vertical;
            }

            .alert-custom {
                width: 100%;
                max-width: 100%;

                margin-bottom: 20px;

                padding:
                    12px 13px;

                font-size: 12px;

                overflow-wrap: anywhere;
            }

            .submit-btn {
                width: 100%;
                max-width: 100%;

                min-height: 45px;

                font-size: 12px;
            }
        }


        /* =====================================================
        EXTRA SMALL PHONE
        320px - 380px
        ===================================================== */

        @media screen and (max-width: 380px) {

            .contact-wrapper {
                padding:
                    88px 11px 50px;
            }

            .contact-header {
                margin-bottom: 28px;
            }

            .contact-header h1 {
                font-size: 40px;

                letter-spacing: -2px;
            }

            .contact-header p {
                font-size: 13px;

                line-height: 1.7;
            }

            .contact-info {
                padding:
                    20px 15px;

                border-radius: 16px;
            }

            .contact-form-card {
                padding:
                    20px 15px;

                border-radius: 16px;
            }

            .contact-info h2 {
                font-size: 20px;
            }

            .contact-info p {
                font-size: 12px;
            }

            .detail-item {
                padding:
                    12px 13px;
            }

            .detail-value {
                font-size: 11px;
            }

            .form-title {
                font-size: 20px;
            }

            .form-control-custom {
                font-size: 12px;
            }

            textarea.form-control-custom {
                min-height: 135px;
            }
        }
    </style>
</head>

<body>

    <?php require_once 'includes/navbar.php'; ?>

    <main class="contact-wrapper">

        <header class="contact-header">

            <div class="eyebrow">
                <span class="eyebrow-dot"></span>
                Get In Touch
            </div>

            <h1>
                Hubungi<br>
                Saya.
            </h1>

            <p>
                Punya pertanyaan, ide project, atau ingin berdiskusi?
                Silakan kirim pesan melalui form di bawah.
            </p>

        </header>

        <section class="contact-layout">

            <div class="contact-info">

                <div class="contact-info-content">

                    <h2>Mari Terhubung.</h2>

                    <p>
                        Saya terbuka untuk berdiskusi mengenai project,
                        pengembangan website, maupun peluang kerja sama.
                    </p>

                </div>

                <div class="contact-detail">

                    <div class="detail-item">
                        <span class="detail-label">
                            Fokus
                        </span>

                        <span class="detail-value">
                            PHP & MySQL Web Development
                        </span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">
                            Status
                        </span>

                        <span class="detail-value">
                            Open to Work
                        </span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">
                            Response
                        </span>

                        <span class="detail-value">
                            Silakan kirim pesan melalui form
                        </span>
                    </div>

                </div>

            </div>

            <div class="contact-form-card">

                <h2 class="form-title">
                    Kirim Pesan
                </h2>

                <?php if ($sukses): ?>

                    <div class="alert-custom alert-success-custom">
                        Pesan berhasil dikirim!
                        Terima kasih sudah menghubungi saya.
                    </div>

                <?php endif; ?>

                <?php if ($error): ?>

                    <div class="alert-custom alert-error-custom">
                        <?= htmlspecialchars(
                            $error,
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </div>

                <?php endif; ?>

                <form method="POST">

                    <?= csrf_field() ?>

                    <div class="form-group">

                        <label class="form-label">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control-custom"
                            maxlength="100"
                            placeholder="Masukkan nama Anda"
                            required
                        >

                    </div>

                    <div class="form-group">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control-custom"
                            maxlength="150"
                            placeholder="nama@email.com"
                            required
                        >

                    </div>

                    <div class="form-group">

                        <label class="form-label">
                            Pesan
                        </label>

                        <textarea
                            name="pesan"
                            class="form-control-custom"
                            rows="6"
                            maxlength="2000"
                            placeholder="Tuliskan pesan Anda..."
                            required
                        ></textarea>

                    </div>

                    <button
                        type="submit"
                        class="submit-btn"
                    >
                        Kirim Pesan →
                    </button>

                </form>

            </div>

        </section>

    </main>

</body>
</html>