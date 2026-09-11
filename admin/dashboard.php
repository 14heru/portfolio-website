<?php

require_once '../includes/auth.php';
require_once '../includes/csrf.php';
require_once '../config/database.php';

// Ambil semua project, urutkan dari yang terbaru
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
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Dashboard Admin</h3>
            <div>
                <span class="me-3">
                    Halo, <?= htmlspecialchars($_SESSION['admin_username'], ENT_QUOTES, 'UTF-8') ?>
                </span>

                <a href="logout.php" class="btn btn-outline-danger btn-sm">
                    Logout
                </a>
            </div>
        </div>

        <a href="tambah.php" class="btn btn-primary mb-3">
            + Tambah Project
        </a>

        <a href="pesan.php" class="btn btn-outline-secondary mb-3 ms-2">
            Lihat Pesan Kontak
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Teknologi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (count($daftar_project) === 0): ?>

                    <tr>
                        <td colspan="3" class="text-center">
                            Belum ada project. Klik "Tambah Project" untuk mulai.
                        </td>
                    </tr>

                <?php else: ?>

                    <?php foreach ($daftar_project as $project): ?>

                        <tr>
                            <td>
                                <?= htmlspecialchars($project['judul'], ENT_QUOTES, 'UTF-8') ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($project['teknologi'], ENT_QUOTES, 'UTF-8') ?>
                            </td>

                            <td>
                                <a
                                    href="edit.php?id=<?= (int) $project['id'] ?>"
                                    class="btn btn-sm btn-warning"
                                >
                                    Edit
                                </a>

                                <form
                                    method="POST"
                                    action="hapus.php"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin hapus project ini?')"
                                >
                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?= (int) $project['id'] ?>"
                                    >

                                    <?= csrf_field() ?>

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                    >
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!--
        Cegah halaman dashboard lama ditampilkan
        melalui Back/Forward Cache (BFCache).
    -->
    <script>
        window.addEventListener('pageshow', function (event) {
            if (event.persisted) {
                window.location.reload();
            }
        });
    </script>

</body>
</html>