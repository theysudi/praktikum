<?php
include 'koneksi.php';

// query untuk mengambil data yang dipilih
$id = $_GET['id'];
$sql = "SELECT * FROM data_mahasiswa WHERE id = $id";

// jalankan query pada php
$result = mysqli_query($con, $sql);

// tampung hasil query pada tabel (karena hasil hanya 1, maka tidak perlu menggunakan perulangan)
$row = mysqli_fetch_assoc($result);

// memproses data jika diperlukan untuk ditampilkan
if ($row['jk'] == "L") {
	$jk = "LAKI-LAKI";
} else {
	$jk = "PEREMPUAN";
}
$tgl_lahir = date('d-m-Y', strtotime($row['tgl_lahir']));
$umur = date('Y') - date('Y', strtotime($row['tgl_lahir']));

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
			<div class="col-12 d-flex justify-content-between">
				<div>
					<h3>BIODATA MAHASISWA</h3>
				</div>
				<div>
					<a href="index.php">Kembali</a>
				</div>
			</div>
			<div class="col-12 px-5">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td rowspan="6" align="center" width="370px">
								<img src="<?php echo $row['foto']; ?>" alt="Tidak Ada Foto" width="320px">
							</td>
							<td><?php echo $row['nim']; ?></td>
						</tr>
						<tr>
							<td><?php echo $row['nama']; ?></td>
						</tr>
						<tr>
							<td><?php echo $jk; ?></td>
						</tr>
						<tr>
							<td><?php echo $tgl_lahir; ?> (<?php echo $umur; ?> Tahun)</td>
						</tr>
						<tr>
							<td><?php echo $row['alamat']; ?></td>
						</tr>
						<tr>
							<td>Angkatan <?php echo $row['angkatan']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>