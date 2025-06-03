<?php
// panggil isi koding dari koneksi.php
include 'config/koneksi.php';

// cek jika pengguna menekan tombol login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // siapkan query select ke tabel user
    $sql = "SELECT * FROM data_user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Cek apakah user ditemukan
    if ($result) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
    
            $_SESSION['user'] = [
                'nama'      => $user['nama'],
                'username'  => $user['username'],
            ];
    
            header("Location: index.php");
            exit();
        } else {
            $notif = "Username atau Password Salah";
        }
    } else {
        $notif = "Query Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #d9d9d9;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background-color: #fbfbfb;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h4 class="text-center mb-4">Halaman Login</h4>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required />
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <div class="mt-3">
            <?php 
                if (isset($notif)) {
                    echo "
                        <div class='alert alert-danger' role='alert'>
                            $notif
                        </div>
                    ";
                }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>