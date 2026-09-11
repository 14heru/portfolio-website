<?php

// includes/auth.php
// Melindungi seluruh halaman admin dari akses tanpa login.

// Pastikan session menggunakan konfigurasi cookie yang lebih aman.
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

// Cegah browser menyimpan halaman admin di cache.
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Expires: 0');

// Pastikan hanya admin yang sudah login yang dapat masuk.
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}