<?php
    $host = 'localhost';
    $user = 'root';        
    $pass = '';            
    $db   = 'db_praktikum';

    // Inisiasi Koneksi Database
    $conn = new mysqli($host, $user, $pass, $db);

    // Cek Koneksi Database
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Memulai sesi
    session_start();
?>