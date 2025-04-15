<?php
// panggil isi koding dari file koneksi.php
include 'koneksi.php';

// query untuk mengambil semua data
$sql = "SELECT * FROM data_mahasiswa";

// jalankan query pada php
$result = mysqli_query($con, $sql);

// tutup koneksi database
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Mahasiswa</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
	<nav class="navbar bg-danger" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				<h1>DATA MAHASISWA</h1>
			</a>
		</div>
	</nav>

	<div class="py-2"></div>

	<div class="container-fluid px-5">
		<div class="row">
			<div class="col-12 text-end">
				<a href="tambah.php">Tambah</a>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>NIM</th>
							<th>NAMA</th>
							<th>JENIS KELAMIN</th>
							<th>ALAMAT</th>
							<th>TAHUN ANGKATAN</th>
							<th width="220px"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						// lakukan perulangan data yg didapatkan dari database
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							$aksi = "";

							// kondisi if untuk jenis kelamin
							if ($row['jk'] == "L") {
								$jk = "LAKI-LAKI";
							} else {
								$jk = "PEREMPUAN";
							}

							// bentuk format d-m-y pada tgl lahir
							$tgl_lahir = date('d-m-Y', strtotime($row['tgl_lahir']));

							// hitung umur
							$umur = date('Y') - date('Y', strtotime($row['tgl_lahir']));

							// buat tombol untuk aksi
							$aksi .= "<a href='detail.php?id=$id'>Detail</a> | ";
							$aksi .= "<a href='ubah.php?id=$id'>Ubah</a> | ";
							$aksi .= "<a href='#'>Hapus</a> ";

							// tampilkan baris data ke web
							echo "<tr>";
							echo "<td>" . $row['nim'] . "</td>";
							echo "<td>" . $row['nama'] . "</td>";
							echo "<td>" . $jk . "</td>";
							echo "<td>" . $row['alamat'] . "</td>";
							echo "<td>" . $row['angkatan'] . "</td>";
							echo "<td align='center'>" . $aksi . "</td>";
							echo "</tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>