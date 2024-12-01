<?php
include '../Data/dbconnection.php';

session_start();
$namaPengguna = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Pengguna';

$sqlStatement = "SELECT * FROM profil";
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
                    <li class="nav-item"><a class="nav-link" href="">Halaman Utama</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Jadwal</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Kegiatan</a></li>
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
                            <img src="../image/<?= $foto ?>" alt="https://via.placeholder.com/120x120" class="" style="height: 75px; width: auto;">
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

    <!-- badan -->
    <div class="badan container-fluid px-5 px-md-0">
        <div class="row gap-0 px-0 mx-0">
            <!-- badan Kiri -->
            <div class="badan-kiri col-7 d-none d-md-block py-3">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-12 col-xl-6">
                            <!-- teman -->
                            <div class="mb-5">
                                <h5 class="align-self-start mb-3">Teman</h5>
                                <!-- tombol opsi teman -->
                                <div class="container d-flex justify-content-between px-3 px-xl-0 pb-1">
                                    <a href="">Tambah Teman</a>
                                    <a href="">Daftar Teman</a>
                                </div>
                                <!-- daftar teman -->
                                <div class="container d-flex mx-0 px-0 justify-content-between">
                                    <div class="card position-relative text-white overflow-hidden" style="width: 100px; height: 150px; background-image: url('../image/dongker.jpg'); background-size: cover; background-position: center;">
                                        <div class="card-overlay position-absolute bottom-0 start-0 w-100 py-1" style="background: rgba(0, 0, 0, 0.5); text-align: center;">
                                          <h6 class="m-0">Teman 1</h6>
                                        </div>
                                    </div>
                                    <div class="card position-relative text-white overflow-hidden" style="width: 100px; height: 150px; background-image: url('https://via.placeholder.com/200x300'); background-size: cover; background-position: center;">
                                        <div class="card-overlay position-absolute bottom-0 start-0 w-100 py-1" style="background: rgba(0, 0, 0, 0.5); text-align: center;">
                                          <h6 class="m-0">Teman 2</h6>
                                        </div>
                                    </div>
                                    <div class="card position-relative text-white overflow-hidden" style="width: 100px; height: 150px; background-image: url('https://via.placeholder.com/200x300'); background-size: cover; background-position: center;">
                                        <div class="card-overlay position-absolute bottom-0 start-0 w-100 py-1" style="background: rgba(0, 0, 0, 0.5); text-align: center;">
                                          <h6 class="m-0">Teman 3</h6>
                                        </div>
                                    </div>
                                    <div class="card position-relative text-white overflow-hidden d-none d-md-block d-xl-none" style="width: 100px; height: 150px; background-image: url('https://via.placeholder.com/200x300'); background-size: cover; background-position: center;">
                                        <div class="card-overlay position-absolute bottom-0 start-0 w-100 py-1" style="background: rgba(0, 0, 0, 0.5); text-align: center;">
                                          <h6 class="m-0">Teman 4</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- catatan kegiatan -->
                            <h5>Catatan Kegiatan</h5>
                            <div class="card">
                                a
                            </div>
                        </div>
                        <!-- rencana -->
                        <div class="col">
                            <h5 class="align-self-start mb-3">Rencana</h5>
                            <div class="card mb-3 text-start p-3">
                                <h6 class="my-0">Tugas Bersama</h6>
                                <p>catatan</p>
                                <div class="row">
                                    <div class="col">
                                        <p class="my-0">bersama</p>
                                        <p class="my-0">Teman 1</p>
                                        <p class="my-0">Teman 2</p>
                                    </div>
                                    <div class="col">
                                        <p class="my-0">waktu dan tempat</p>
                                        <p class="my-0">a</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                Rencana B
                            </div>
                            <!-- tombol opsi -->
                            <div class="container d-flex justify-content-between px-3 px-xl-0 pb-1">
                                <a href="">Tambah Rencana</a>
                                <a href="">Ajak Teman</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- badan Kanan -->
            <div class="jadwal col-12 col-md-5 text-center">
                <div class="container my-4">
                    <h3 class="text-center mb-4">Jadwal Kegiatan</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Senin</th>
                                    <th scope="col">Selasa</th>
                                    <th scope="col">Rabu</th>
                                    <th scope="col">Kamis</th>
                                    <th scope="col">Jumat</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="align-middle text-center">08:00 - 10:00</th>
                                    <td>
                                    <div class="card p-2">
                                        <h6 class="card-title">Rapat Tim</h6>
                                        <p class="card-text">Ruang Meeting A</p>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="card p-2">
                                        <h6 class="card-title">Diskusi Proyek</h6>
                                        <p class="card-text">Ruang 202</p>
                                    </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    <div class="card p-2">
                                        <h6 class="card-title">Presentasi</h6>
                                        <p class="card-text">Aula Utama</p>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-middle text-center">10:00 - 12:00</th>
                                    <td></td>
                                    <td>
                                    <div class="card p-2">
                                        <h6 class="card-title">Workshop</h6>
                                        <p class="card-text">Lab Komputer</p>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="card p-2">
                                        <h6 class="card-title">Rapat Divisi</h6>
                                        <p class="card-text">Ruang 303</p>
                                    </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-middle text-center">13:00 - 15:00</th>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    <div class="card p-2">
                                        <h6 class="card-title">Training</h6>
                                        <p class="card-text">Ruang 101</p>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="card p-2">
                                        <h6 class="card-title">Briefing</h6>
                                        <p class="card-text">Ruang Meeting B</p>
                                    </div>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- tombol opsi -->
                    <div class="container text-start px-0 my-1">
                        <button type="button" class="btn btn-primary rounded-pill">ⓘ Jadwal Darurat</button>
                    </div>
                </div>                                
            </div>
        </div>
    </div>
    


    <div class="footer text-center m-3">
        <div class="card rounded-pill">
            @Care Rythm
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>