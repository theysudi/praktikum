<?php
// panggil isi koding dari koneksi.php
include 'config/koneksi.php';

// Cek Apakah Pengguna Sudah Login
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}

// ambil data user yang login
$user_login = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Praktikum Pemrograman Web</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 90vh;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            background-color: #343a40;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 10px 20px;
            display: block;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
            color: #fff;
        }

        .content {
            margin-left: 220px;
            margin-top: 55px;
            padding: 20px;
        }

        .navbar {
            z-index: 1031;
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Praktikum Pemrograman Web</span>
            <a class="btn btn-outline-light" href="logout.php">Logout</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="index.php">Beranda</a>
        <a href="buku.php">Daftar Buku</a>
        <a href="peminjaman.php">Peminjaman Buku</a>
    </div>

    <!-- Konten Utama -->
    <div class="content">