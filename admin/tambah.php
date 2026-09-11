<?php

require_once '../includes/auth.php';
require_once '../includes/csrf.php';
require_once '../config/database.php';

$error = "";


// =====================================================
// PROSES TAMBAH PROJECT
// =====================================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil input
    $judul = trim($_POST['judul'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $teknologi = trim($_POST['teknologi'] ?? '');
    $link_demo = trim($_POST['link_demo'] ?? '');
    $link_github = trim($_POST['link_github'] ?? '');
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

    if ($judul === '' || $deskripsi === '') {

        $error = "Judul dan deskripsi wajib diisi.";

    } else {

        // -------------------------------------------------
        // INSERT project
        // -------------------------------------------------

        $query = "
            INSERT INTO projects
                (judul, deskripsi, teknologi, link_demo, link_github)
            VALUES
                (:judul, :deskripsi, :teknologi, :link_demo, :link_github)
        ";

        $stmt = $koneksi->prepare($query);

        $stmt->execute([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'teknologi' => $teknologi,
            'link_demo' => $link_demo,
            'link_github' => $link_github
        ]);


        // -------------------------------------------------
        // Kembali ke dashboard
        // -------------------------------------------------

        header("Location: dashboard.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4" style="max-width: 600px;">
        <h3 class="mb-4">Tambah Project</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Judul Project</label>
                <input
                    type="text"
                    name="judul"
                    class="form-control"
                    maxlength="150"
                    required
                >
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea
                    name="deskripsi"
                    class="form-control"
                    rows="4"
                    maxlength="2000"
                    required
                ></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Teknologi (pisahkan koma)</label>
                <input
                    type="text"
                    name="teknologi"
                    class="form-control"
                    placeholder="PHP, MySQL, Bootstrap"
                    maxlength="500"
                >
            </div>
            <div class="mb-3">
                <label class="form-label">Link Demo (opsional)</label>
                <input type="url" name="link_demo" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Link GitHub (opsional)</label>
                <input type="url" name="link_github" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="dashboard.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>