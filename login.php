<?php 
// Menghidupkan session
session_start();

// Menghubungkan ke database
include 'config.php';

// Cek apakah ada session login
if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    // Menampung inputan ke dalam variable
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mencari data user di database berdasarkan username
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // Cek apakah data yang di cari ada
    if (mysqli_num_rows($query) > 0) {
        // Pecah hasil query agar bisa di akses datanya satu per satu
        $user = mysqli_fetch_assoc($query);

        // Cek apakah password yang kita masukkan sama dengan password pengguna di database
        if (password_verify($password, $user['password'])) {
            // Buat session pengguna
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role']; // Menyimpan role pengguna dalam session

            // Arahkan pengguna berdasarkan perannya
                header('Location: index.php'); // Default halaman

            // Menutup koneksi ke database
            exit();
        } else {
            // Buat pesan error
            $error = "Username atau password anda salah!";
            // Tetap di halaman ini dan membawa parameter error
            header('Location: login.php?error='.urlencode($error));
            exit();
        }
    } else {
        $error = "User dengan username '$username' tidak ditemukan!";
        header('Location: login.php?error='.urlencode($error));
        exit();
    }
}

//echo password_hash('User123',PASSWORD_DEFAULT);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pariwisata Lampung - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center vh-100 align-items-center">
            <div class="col-lg-4">
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h4>Pariwisata Lampung</h4>
                            <p>Silahkan login menggunakan akun admin</p>
                        </div>
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger mb-3" role="alert">
                                <?= $_GET['error']; ?>
                            </div>
                        <?php } ?>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="admin" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="********" name="password" required>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
