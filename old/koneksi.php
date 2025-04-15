<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_praktikum";

// inisiasi koneksi
$con = mysqli_connect($host, $user, $pass, $db);

// cek koneksi
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
