<?php 
// Mulai sesi
session_start();


// Cek apakah ada session login
if (isset($_SESSION['username'])) {
    header('Location: index.php');
}


// Hapus semua variabel sesi
session_unset();


// Hapus seluruh sesi
session_destroy();


// Redirect ke halaman login setelah logout
header("Location: login.php");
exit();


?>