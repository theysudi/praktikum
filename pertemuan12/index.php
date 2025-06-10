<?php
// panggil isi koding dari header.php
include 'config/header.php';
?>

<div class="card shadow-sm">
    <div class="card-header">
        <h3>Selamat Datang, <?php echo $user_login['nama'] ?></h3>
    </div>
    <div class="card-body">
        <p>Ini adalah halaman utama dari project mata kuliah praktikum pemrograman web.</p>
    </div>
</div>

<?php
// panggil isi koding dari footer.php
include 'config/footer.php';
?>