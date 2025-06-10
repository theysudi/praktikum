<?php
// panggil isi koding dari header.php
include 'config/header.php';

// jalankan query select pada tabel
$peminjaman = $conn->query("SELECT data_peminjaman.*, data_buku.judul 
    FROM data_peminjaman
    INNER JOIN data_buku
    ON data_peminjaman.id_buku = data_buku.id");
?>

<link href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css" rel="stylesheet">

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between">
        <h3>Data Peminjaman</h3>
        <a href="peminjaman_tambah.php" class="btn btn-primary m-1">Tambah</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered" id="mytable">
                    <thead>
                        <tr>
                            <th>Nama Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Tgl. Pinjam</th>
                            <th>Tgl. Kembali</th>
                            <th>Lama Pinjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $peminjaman->fetch_assoc()) {
                            // melakukan formatting data
                            $tgl_pinjam = new DateTime($row['tgl_pinjam']);
                            $tgl_kembali = new DateTime($row['tgl_kembali']);
                            $lama_pinjam = $tgl_pinjam->diff($tgl_kembali)->days + 1;

                            $tgl_pinjam = date("d-m-Y", strtotime($row['tgl_pinjam']));
                            $tgl_kembali = date("d-m-Y", strtotime($row['tgl_kembali']));

                            // membuat tombol aksi
                            $id = $row['id'];
                            $aksi = "";
                            $aksi .= "<a class='btn btn-sm m-1 btn-info' href='#'>Detail</a>";
                            $aksi .= "<a class='btn btn-sm m-1 btn-warning' href='#'>Ubah</a>";
                            $aksi .= "<a class='btn btn-sm m-1 btn-danger' href='#'>Hapus</a> ";

                            // menampilkan baris data
                            echo "<tr>";
                            echo "<td>" . $row['nama_peminjam'] . "</td>";
                            echo "<td>" . $row['judul'] . "</td>";
                            echo "<td>" . $tgl_pinjam . "</td>";
                            echo "<td>" . $tgl_kembali . "</td>";
                            echo "<td>" . $lama_pinjam . " hari</td>";
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

<script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#mytable').DataTable();
    });
</script>