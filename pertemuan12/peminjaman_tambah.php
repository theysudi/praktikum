<?php
// panggil isi koding dari header.php
include 'config/header.php';

// cek jika pengguna menekan tombol simpan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_buku = $_POST['id_buku'];
    $nama_peminjam = $_POST['nama_peminjam'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    // siapkan query insert ke tabel peminjaman
    $sql = "INSERT INTO data_peminjaman (id_buku, nama_peminjam, tgl_pinjam, tgl_kembali)
            VALUES ('$id_buku', '$nama_peminjam', '$tgl_pinjam', '$tgl_kembali')";

    // jalankan query dan cek error pada query
    if (!$conn->query($sql)) {
        die("Query Error: " . $conn->error);
    }
    header("Location: peminjaman.php");
    exit();
}

// jalankan query select pada tabel
$buku = $conn->query("SELECT * FROM data_buku");
?>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between">
        <h3>Tambah Peminjaman</h3>
        <a href="peminjaman.php" class="btn btn-danger my-1">Kembali</a>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label">Nama Peminjam</label>
                    <input type="text" class="form-control" name="nama_peminjam" placeholder="Masukkan Nama Peminjam" required>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Buku</label>
                    <select class="form-select" name="id_buku" required>
                        <option value="" disabled selected>-- Pilih Buku --</option>
                        <?php
                            while ($row = $buku->fetch_assoc()) {
                                // menampilkan daftar buku dalam pilihan
                                echo '<option value="' . $row["id"] . '">' . $row["judul"] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Tanggal Pinjam</label>
                    <input type="date" class="form-control" name="tgl_pinjam" required>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Tanggal Kembali</label>
                    <input type="date" class="form-control" name="tgl_kembali" required>
                </div>
                <div class="col-12 mb-3 text-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
// panggil isi koding dari footer.php
include 'config/footer.php';
?>