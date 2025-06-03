<?php
// panggil isi koding dari header.php
include 'config/header.php';

// cek jika pengguna menekan tombol simpan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];
    $harga = $_POST['harga'];

    // siapkan query insert ke tabel buku
    $sql = "INSERT INTO data_buku (judul, kategori, penerbit, tahun_terbit, tanggal_pembelian, harga)
            VALUES ('$judul', '$kategori', '$penerbit', '$tahun_terbit', '$tanggal_pembelian', $harga)";

    // jalankan query dan cek error pada query
    if (!$conn->query($sql)) {
        die("Query Error: " . $conn->error);
    }
    header("Location: buku.php");
    exit();
}
?>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between">
        <h3>Tambah Buku</h3>
        <a href="buku.php" class="btn btn-danger my-1">Kembali</a>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Buku" required>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" name="kategori" required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <option value="Teknologi">Teknologi</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Fiksi">Fiksi</option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Psikologi">Psikologi</option>
                        <option value="Sains">Sains</option>
                        <option value="Sejarah">Sejarah</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Nama Penerbit" required>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" class="form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" required min="1900" max="2099">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Tanggal Pembelian</label>
                    <input type="date" class="form-control" name="tanggal_pembelian" required>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga (Rp)" required min="0">
                </div>
                <div class="col-12 mb-3 text-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<?php
// panggil isi koding dari footer.php
include 'config/footer.php';
?>