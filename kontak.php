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
    <title>Kontak - Portfolio Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once 'includes/navbar.php'; ?>

    <div class="container" style="max-width: 600px;">
        <h2 class="mb-4">Hubungi Saya</h2>

        <?php if ($sukses): ?>
            <div class="alert alert-success">Pesan berhasil dikirim! Terima kasih sudah menghubungi saya.</div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">

            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    maxlength="100"
                    required
                >
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    maxlength="150"
                    required
                >
            </div>
            <div class="mb-3">
                <label class="form-label">Pesan</label>
                <textarea
                    name="pesan"
                    class="form-control"
                    rows="5"
                    maxlength="2000"
                    required
                ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
        </form>
    </div>
</body>
</html>