<?php
require_once '../includes/auth.php';
require_once '../config/database.php';

$query = "SELECT * FROM pesan_kontak ORDER BY created_at DESC";
$stmt = $koneksi->prepare($query);
$stmt->execute();
$daftar_pesan = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Pesan Kontak</h3>
            <a href="dashboard.php" class="btn btn-secondary btn-sm">Kembali ke Dashboard</a>
        </div>

        <?php if (count($daftar_pesan) === 0): ?>
            <p>Belum ada pesan masuk.</p>
        <?php else: ?>
            <?php foreach ($daftar_pesan as $pesan): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="card-title">
                            <?= htmlspecialchars($pesan['nama_pengirim']) ?>
                            <small class="text-muted">(<?= htmlspecialchars($pesan['email_pengirim']) ?>)</small>
                        </h6>
                        <p class="card-text"><?= nl2br(htmlspecialchars($pesan['pesan'])) ?></p>
                        <small class="text-muted">
                            <?= htmlspecialchars($pesan['created_at'], ENT_QUOTES, 'UTF-8') ?>
                        </small>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>