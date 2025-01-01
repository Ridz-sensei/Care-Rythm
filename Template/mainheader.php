<?php
include '../Data/dbconnection.php';

session_start();
$namaPengguna = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Pengguna';

$sqlStatement = "SELECT * FROM profil WHERE username = '$namaPengguna'";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Care Rythm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/halamanutama1.css">
</head>
<body>
    <!-- topbar -->
    <div class="container px-3">
        <div class="d-flex align-items-end justify-content-between">
            <!-- logo -->
            <div class="logo py-3">
                <a href="">
                    <img src="../image/Logo_ungu.png" alt="" style="height: 75px; width: auto;">
                </a>
            </div>
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-light d-none d-lg-block py-0">
                <ul class="navbar-nav d-flex gap-3 px-0 my-0">
                    <li class="nav-item"><a class="nav-link" href="HalamanUtama1.php">Halaman Utama</a></li>
                    <li class="nav-item"><a class="nav-link" href="halamanjadwal.php">Jadwal</a></li>
                    <li class="nav-item"><a class="nav-link" href="pagekegiatan.php">Kegiatan</a></li>
                </ul>
            </nav>
            <!-- profil -->
            <div class="profil d-flex align-self-center py-3">
                <div class="nama-profil d-none d-md-block pe-3">
                    <?php foreach ($data as $key => $isi){
                        $username = $isi['username'];
                        $tentang = $isi['tentang'] ?? 'Deskripsi';
                        $foto = $isi['foto_profil'];

                        if ($username == $namaPengguna){ ?>
                            <h3><?= $username; ?></h3>
                            <p><?= $tentang; ?></p>
                        <?php }
                    } ?>
                </div>
                <div class="dropdown-center">
                    <a data-bs-toggle="dropdown">
                        <div class="rounded-circle overflow-hidden" style="width: 75px; height: 75px;">
                            <img src="../image/<?= $foto ?>" alt="foto profil" class="" style="height: 75px; width: auto;">
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                        <li><a class="dropdown-item" href="#">Pencapaian</a></li>
                        <li><a class="dropdown-item" href="../autentikasi/keluar.php">Keluar</a></li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>