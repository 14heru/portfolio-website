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
    <title>Project - Portfolio Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once 'includes/navbar.php'; ?>

    <div class="container">
        <h2 class="mb-4">Project Saya</h2>

        <?php if (count($daftar_project) === 0): ?>
            <p>Belum ada project untuk ditampilkan.</p>
        <?php else: ?>
            <div class="row">
                <?php foreach ($daftar_project as $project): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= htmlspecialchars($project['judul'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>

                                <p class="card-text">
                                    <?= htmlspecialchars($project['deskripsi'], ENT_QUOTES, 'UTF-8') ?>
                                </p>

                                <p class="text-muted">
                                    <small>
                                        <?= htmlspecialchars($project['teknologi'], ENT_QUOTES, 'UTF-8') ?>
                                    </small>
                                </p>

                                <?php if (!empty($project['link_demo'])): ?>
                                    <a
                                        href="<?= htmlspecialchars($project['link_demo'], ENT_QUOTES, 'UTF-8') ?>"
                                        class="btn btn-sm btn-primary"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Lihat Demo
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($project['link_github'])): ?>
                                    <a
                                        href="<?= htmlspecialchars($project['link_github'], ENT_QUOTES, 'UTF-8') ?>"
                                        class="btn btn-sm btn-dark"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        GitHub
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>