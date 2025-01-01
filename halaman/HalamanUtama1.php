<?php
include '../Template/mainheader.php';
?>
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
                                <?php
                                include 'pertemanan.php';
                                foreach($data as $key => $isi){
                                    $namateman = $isi['nama_teman'];
                                    $foto = $isi['foto_profil']; ?>
                                        <div class="card position-relative text-white overflow-hidden" style="width: 100px; height: 150px; background-image: url('../image/<?= $foto ?>'); background-size: cover; background-position: center;">
                                            <div class="card-overlay position-absolute bottom-0 start-0 w-100 py-1" style="background: rgba(0, 0, 0, 0.5); text-align: center;">
                                              <h6 class="m-0"><?= $namateman ?></h6>
                                            </div>
                                        </div>
                                        <?php } ?>
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
                    <div style="text-align: left; margin-bottom: 5px;">
                        <a href="tambahisijadwal.php">tambah jadwal</a>
                    </div>
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
    


<?php
include '../Template/mainfooter.php';
?>