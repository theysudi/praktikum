<?php
    include 'koneksi.php';

    // Mengecek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $jurusan = $_POST['jurusan'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $alamat = $_POST['alamat'];
        $foto = '';

        // proses penyimpanan file
        $file = $_FILES['foto'];
        // cek jika file tidak error
        if ($file && !$file['error']) {
            // tampung tmp file yg dipilih
            $file_tmp = $file['tmp_name'];
            // buat string tempat penyimpanan file beserta dengan nama file dan tipenya
            $file_upload = 'upload/' . $nim . '-' . $file['name'];
            // lakukan perintah untuk memindahkan file dari tmp ke tempat penyimpanan file
            move_uploaded_file($file_tmp, $file_upload);

            // tampung nama file yg akan disimpan ke database
            $foto = $file_upload;
        }

        // Menyiapkan query SQL untuk menyimpan data
        $sql = "INSERT INTO mahasiswa (nim, nama, jk, jurusan, email, no_telp, alamat, foto) 
            VALUES ('$nim', '$nama', '$jenis_kelamin', '$jurusan', '$email', '$telepon', '$alamat', '$foto')";

        // Menjalankan query dan mengecek apakah data berhasil disimpan
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Data Berhasil Ditambah')</script>";
            // arahkan ke tabel data mahasiswa
            echo "<script>window.location.href = 'index.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambah!')</script>";
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="mb-4">Form Data Mahasiswa</h2>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="laki-laki" required>
                            <label class="form-check-label" for="laki">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" required>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" id="jurusan" name="jurusan" required>
                            <option selected disabled>Pilih Jurusan</option>
                            <option value="TI - MDI">TI - MDI</option>
                            <option value="TI - KAB">TI - KAB</option>
                            <option value="TI - Pariwisata">TI - Pariwisata</option>
                            <option value="DKV">DKV</option>
                            <option value="RSK">RSK</option>
                            <option value="BD">BD</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">No. Telepon</label>
                        <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Masukkan No. Telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukkan Foto" required>
                    </div>
                    <hr>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>