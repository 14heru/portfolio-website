# Portfolio Website

Website portfolio pribadi berbasis PHP dan MySQL untuk menampilkan profil, project, serta mengelola pesan kontak melalui dashboard admin.

## 🌐 Live Demo

[Portfolio Website](https://heruperdanasaputra.infinityfree.io)

## ✨ Fitur

- Menampilkan profil pribadi
- Menampilkan daftar project
- Menampilkan teknologi yang digunakan pada project
- Form kontak untuk menerima pesan
- Dashboard admin
- Login admin dengan password yang di-hash
- Tambah project
- Edit project
- Hapus project
- Melihat pesan dari form kontak
- Proteksi CSRF pada form penting
- Validasi input pada sisi server
- Session authentication untuk halaman admin
- Logout dan perlindungan akses dashboard
- Responsive design untuk desktop, tablet, dan mobile

## 🛠️ Teknologi

- PHP
- MySQL
- HTML
- CSS
- Bootstrap
- PDO
- Git & GitHub
- XAMPP untuk pengembangan lokal

## 🔐 Keamanan

Project menerapkan beberapa mekanisme keamanan dasar, antara lain:

- Password admin disimpan menggunakan hashing
- PDO Prepared Statements untuk query database
- Validasi input pada sisi server
- Proteksi CSRF pada form yang membutuhkan perubahan data
- Session authentication untuk halaman admin
- Session ID regeneration setelah login
- Secure session cookie configuration
- Logout dengan penghancuran session
- Perlindungan akses halaman admin tanpa autentikasi
- `display_errors` dinonaktifkan pada environment production
- File konfigurasi database tidak disimpan di repository Git

## 📁 Struktur Project

```text
portfolio-website/
├── admin/
│   ├── dashboard.php
│   ├── edit.php
│   ├── hapus.php
│   ├── login.php
│   ├── logout.php
│   ├── pesan.php
│   └── tambah.php
|
├── assets/
│   ├── css/
│   └── img/
│
├── includes/
│   ├── auth.php
│   ├── csrf.php
│   └── navbar.php
│
├── config/
│   └── database.php
│
├── index.php
├── kontak.php
├── projects.php
├── .gitignore
└── README.md
```
