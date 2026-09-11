<?php

require_once '../includes/auth.php';
require_once '../includes/csrf.php';
require_once '../config/database.php';


// =====================================================
// PROSES HAPUS PROJECT
// =====================================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: dashboard.php");
    exit;
}


// -----------------------------------------------------
// Verifikasi CSRF
// -----------------------------------------------------

$csrfToken = $_POST['csrf_token'] ?? '';

if (!verify_csrf_token($csrfToken)) {
    http_response_code(403);
    exit("Permintaan tidak valid.");
}


// -----------------------------------------------------
// Validasi ID
// -----------------------------------------------------

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id <= 0) {
    header("Location: dashboard.php");
    exit;
}


// -----------------------------------------------------
// Hapus project
// -----------------------------------------------------

$query = "DELETE FROM projects WHERE id = :id";

$stmt = $koneksi->prepare($query);

$stmt->execute([
    'id' => $id
]);


// -----------------------------------------------------
// Kembali ke dashboard
// -----------------------------------------------------

header("Location: dashboard.php");
exit;

?>