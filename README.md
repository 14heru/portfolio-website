# Portfolio Website

Website portfolio pribadi berbasis PHP dan MySQL untuk menampilkan profil, project, serta mengelola pesan kontak melalui dashboard admin.

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

## 🛠️ Teknologi

- PHP
- MySQL
- HTML
- CSS
- Bootstrap
- PDO
- Git & GitHub
- XAMPP untuk pengembangan lokal

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
└── .gitignore
```
