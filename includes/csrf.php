<?php

/**
 * includes/csrf.php
 *
 * Menyediakan CSRF token untuk melindungi
 * request POST yang mengubah data.
 */

// Pastikan session sudah aktif.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// =====================================================
// MEMBUAT TOKEN
// =====================================================

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


// =====================================================
// MENGAMBIL TOKEN
// =====================================================

function csrf_token(): string
{
    return $_SESSION['csrf_token'];
}


// =====================================================
// MEMBUAT INPUT HIDDEN
// =====================================================

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' .
        htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') .
        '">';
}


// =====================================================
// MEMERIKSA TOKEN
// =====================================================

function verify_csrf_token(?string $token): bool
{
    if (
        empty($token) ||
        empty($_SESSION['csrf_token'])
    ) {
        return false;
    }

    return hash_equals(
        $_SESSION['csrf_token'],
        $token
    );
}