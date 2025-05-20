<?php
// panggil isi koding dari header.php
include 'config/header.php';

// jalankan query select pada tabel buku
$buku = $conn->query("SELECT * FROM data_buku");
?>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between">
        <h3>Daftar Buku</h3>
        <a href="buku_tambah.php" class="btn btn-primary m-1">Tambah</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Tanggal Pembelian</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $buku->fetch_assoc()) {
                            // membuat tombol aksi
                            $id = $row['id'];
                            $aksi = "";
                            $aksi .= "<a class='btn btn-sm m-1 btn-info' href='#'>Detail</a>";
                            $aksi .= "<a class='btn btn-sm m-1 btn-warning' href='#'>Ubah</a>";
                            $aksi .= "<a class='btn btn-sm m-1 btn-danger' href='#'>Hapus</a> ";

                            // menampilkan baris data
                            echo "<tr>";
                            echo "<td>" . $row['judul'] . "</td>";
                            echo "<td>" . $row['kategori'] . "</td>";
                            echo "<td>" . $row['penerbit'] . "</td>";
                            echo "<td>" . $row['tahun_terbit'] . "</td>";
                            echo "<td>" . $row['tanggal_pembelian'] . "</td>";
                            echo "<td>" . $row['harga'] . "</td>";
                            echo "<td align='center'>" . $aksi . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// panggil isi koding dari footer.php
include 'config/footer.php';
?>