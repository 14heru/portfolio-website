<?php

require_once '../includes/auth.php';
require_once '../includes/csrf.php';
require_once '../config/database.php';

$error = "";


// =====================================================
// VALIDASI ID PROJECT
// =====================================================

$id = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

if ($id === false || $id === null || $id <= 0) {
    header("Location: dashboard.php");
    exit;
}


// =====================================================
// AMBIL DATA PROJECT
// =====================================================

$query = "SELECT * FROM projects WHERE id = :id";

$stmt = $koneksi->prepare($query);

$stmt->execute([
    'id' => $id
]);

$project = $stmt->fetch(PDO::FETCH_ASSOC);


// Jika project tidak ditemukan
if (!$project) {
    header("Location: dashboard.php");
    exit;
}


// =====================================================
// PROSES UPDATE PROJECT
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
    // Validasi input wajib
    // -------------------------------------------------

    if ($judul === '' || $deskripsi === '') {

        $error = "Judul dan deskripsi wajib diisi.";

    } else {

        // -------------------------------------------------
        // Validasi panjang input
        // -------------------------------------------------

        if (mb_strlen($judul) > 150) {

            $error = "Judul project maksimal 150 karakter.";

        } elseif (mb_strlen($deskripsi) > 2000) {

            $error = "Deskripsi project maksimal 2000 karakter.";

        } elseif (mb_strlen($teknologi) > 500) {

            $error = "Teknologi maksimal 500 karakter.";

        } else {

            // -------------------------------------------------
            // UPDATE DATABASE
            // -------------------------------------------------

            $query = "
                UPDATE projects
                SET
                    judul = :judul,
                    deskripsi = :deskripsi,
                    teknologi = :teknologi,
                    link_demo = :link_demo,
                    link_github = :link_github
                WHERE id = :id
            ";

            $stmt = $koneksi->prepare($query);

            $stmt->execute([
                'judul' => $judul,
                'deskripsi' => $deskripsi,
                'teknologi' => $teknologi,
                'link_demo' => $link_demo,
                'link_github' => $link_github,
                'id' => $id
            ]);


            // -------------------------------------------------
            // Kembali ke dashboard
            // -------------------------------------------------

            header("Location: dashboard.php");
            exit;
        }
    }


    // -------------------------------------------------
    // Pertahankan input apabila terjadi error
    // -------------------------------------------------

    $project['judul'] = $judul;
    $project['deskripsi'] = $deskripsi;
    $project['teknologi'] = $teknologi;
    $project['link_demo'] = $link_demo;
    $project['link_github'] = $link_github;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4" style="max-width: 600px;">
        <h3 class="mb-4">Edit Project</h3>

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
                    value="<?= htmlspecialchars($project['judul'], ENT_QUOTES, 'UTF-8') ?>"
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
                ><?= htmlspecialchars($project['deskripsi'], ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Teknologi</label>
                <input
                    type="text"
                    name="teknologi"
                    class="form-control"
                    maxlength="500"
                    value="<?= htmlspecialchars($project['teknologi'], ENT_QUOTES, 'UTF-8') ?>"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Link Demo</label>
                <input
                    type="url"
                    name="link_demo"
                    class="form-control"
                    value="<?= htmlspecialchars($project['link_demo'], ENT_QUOTES, 'UTF-8') ?>"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Link GitHub</label>
                <input
                    type="url"
                    name="link_github"
                    class="form-control"
                    value="<?= htmlspecialchars($project['link_github'], ENT_QUOTES, 'UTF-8') ?>"
                >
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="dashboard.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>