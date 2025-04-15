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
					<h3>TAMBAH MAHASISWA</h3>
				</div>
				<div>
					<a href="index.php">Kembali</a>
				</div>
			</div>
			<div class="col-12">
				<div class="row">
					<form action="" method="post" enctype="multipart/form-data" autocomplete="FALSE">
						<div class="col-12 my-3">
							<label>NIM :</label>
							<input type="text" id="nim" name="nim" value="">
						</div>
						<div class="col-12 my-3">
							<label>Nama :</label>
							<input type="text" id="nama" name="nama" value="">
						</div>
						<div class="col-12 my-3">
							<label>Jenis Kelamin :</label>
							<input type="radio" id="jkL" name="jk" value="L" checked>
							<label for="jkL">LAKI-LAKI</label>
							<input type="radio" id="jkP" name="jk" value="P">
							<label for="jkP">PEREMPUAN</label>
						</div>
						<div class="col-12 my-3">
							<label>Tanggal Lahir :</label>
							<input type="date" id="tgl_lahir" name="tgl_lahir" value="">
						</div>
						<div class="col-12 my-3">
							<label>Alamat :</label>
							<textarea name="alamat" id="alamat" cols="30" rows="2"></textarea>
						</div>
						<div class="col-12 my-3">
							<label>Angkatan :</label>
							<select name="angkatan" id="angkatan">
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
							</select>
						</div>
						<div class="col-12 my-3">
							<label>Foto :</label>
							<input type="file" id="foto" name="foto">
						</div>
						<div class="col-12 my-3">
							<input type="submit" name="submit" value="Simpan">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<?php
include 'koneksi.php';

// cek apakah user menekan tombol simpan
if (isset($_POST['submit'])) {
	// tampung semua data yg akan disimpan ke database
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$alamat = $_POST['alamat'];
	$angkatan = $_POST['angkatan'];
	$foto = '';

	// proses penyimpanan file
	$file = $_FILES['foto'];
	if (!$file['error']) {
		// tampung tmp file yg dipilih
		$file_tmp = $file['tmp_name'];
		// buat string tempat penyimpanan file beserta dengan nama file dan tipenya
		$file_upload = 'upload/' . $nim . $file['name'];
		// lakukan perintah untuk memindahkan file dari tmp ke tempat penyimpanan file
		move_uploaded_file($file_tmp, $file_upload);

		// tampung nama file yg akan disimpan ke database
		$foto = $file_upload;
	}

	// buat query insert
	$sql = "INSERT INTO data_mahasiswa (nim, nama, jk, tgl_lahir, alamat, angkatan, foto) 
		VALUES ('$nim', '$nama', '$jk', '$tgl_lahir', '$alamat', '$angkatan', '$foto')";
	// jalankan query insert pada php
	$result = mysqli_query($con, $sql);

	// tutup koneksi database
	mysqli_close($con);

	// cek hasil query
	if ($result) {
		echo "<script>alert('Data Berhasil Ditambah')</script>";
		// arahkan ke tabel data mahasiswa
		echo "<script>window.location.href = 'index.php'</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambah!')</script>";
	}
}
?>