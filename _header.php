<?php
session_start();
include "config.php";
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pariwisata Lampung - <?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="assets/images/labuhan-bajo.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item active">
                <img src="assets/images/danau-kelimutu.jpg" class="d-block w-100" alt="Foto Tidak Terbaca">
            </div>
            <!-- <div class="carousel-item">
                <img src="assets/images/teluk-kiluan.jpg" class="d-block w-100" alt="...">
            </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <nav class="navbar navbar-expand-lg navbar bg-primary mb-3">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= $title == 'Beranda' ? 'active' : '' ?>" href="index.php">Beranda</a>
                    </li>

                    <?php if ($_SESSION['role'] == 0) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $title == 'Pendaftaran Paket Wisata' ? 'active' : '' ?>" href="pendaftaran.php">Pendaftaran Paket Wisata</a>
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link <?= $title == 'Daftar Pesanan' ? 'active' : '' ?>" href="daftarpesanan.php">Daftar Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger fw-bold" href="logout.php">LogOut</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>