<?php

// =====================================================
// KONFIGURASI SESSION
// =====================================================

if (session_status() === PHP_SESSION_NONE) {

    $isHttps = (
        isset($_SERVER['HTTPS']) &&
        $_SERVER['HTTPS'] !== 'off'
    );

    session_set_cookie_params([
        'httponly' => true,
        'secure' => $isHttps,
        'samesite' => 'Lax'
    ]);

    session_cache_limiter('nocache');
    session_start();
}

// Cegah browser menyimpan halaman login di cache.
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Expires: 0');

// Jika sudah login, langsung ke dashboard.
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit;
}

require_once '../config/database.php';

$error = "";


// =====================================================
// PROSES LOGIN
// =====================================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil input dengan aman
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';


    // -------------------------------------------------
    // Validasi input dasar
    // -------------------------------------------------

    if ($username === '' || $password === '') {

        $error = "Username dan password wajib diisi.";

    } else {

        // -------------------------------------------------
        // Cari akun berdasarkan username
        // -------------------------------------------------

        $query = "
            SELECT id, username, password
            FROM admin_user
            WHERE username = :username
            LIMIT 1
        ";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([
            'username' => $username
        ]);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);


        // -------------------------------------------------
        // Verifikasi password
        // -------------------------------------------------

        if (
            $admin &&
            password_verify($password, $admin['password'])
        ) {

            // Regenerasi session ID setelah login berhasil
            session_regenerate_id(true);

            // Simpan informasi admin ke session
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];

            // Redirect ke dashboard
            header("Location: dashboard.php");
            exit;

        } else {

            // Pesan tetap generik agar tidak membocorkan
            // apakah username tertentu tersedia.
            $error = "Username atau password salah.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container" style="max-width: 400px; margin-top: 100px;">
        <h3 class="mb-4">Login Admin</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input
                    type="text"
                    name="username"
                    class="form-control"
                    required
                    maxlength="100"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>
        </form>
    </div>
</body>
</html>