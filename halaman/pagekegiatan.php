<?php
include '../Template/mainheader.php';
?>

    <!-- Konten Kegiatan -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Kegiatan</h1>
        <div class="d-flex justify-content-between mb-3">
            <form action="tambahKegiatan.html">
                <button class="btn btn-success">+ Tambah Kegiatan</button>
            </form>
            <div class="d-flex gap-2">
                <select class="form-select" aria-label="Kategori" style="width: 150px;">
                    <option selected>Kategori</option>
                    <option value="1">Olahraga</option>
                    <option value="2">Membaca</option>
                </select>
                <button class="btn btn-outline-secondary">Filter</button>
            </div>
        </div>
        <div class="row">
            <!-- Kartu Kegiatan 1 -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <img class="ig" src="../image/baca-buku-111111.jpg" alt="Kegiatan">
                            <h5>Membaca</h5>
                            <p class="mb-0">Baca buku 10 halaman</p>
                            <small>Rabu, Kamis, Jumat</small>
                        </div>
                        <div class="text-end d-flex flex-column" id="crd">
                            <p class="mb-0" id="jm">08.30</p>
                            <form action="editKegiatan.html">
                                <button class="btn btn-success">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kartu Kegiatan 2 -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <img class="ig" src="../image/baca-buku-111111.jpg" alt="Kegiatan">
                            <h5>Membaca</h5>
                            <p class="mb-0">Baca buku 10 halaman</p>
                            <small>Rabu, Kamis, Jumat</small>
                        </div>
                        <div class="text-end d-flex flex-column" id="crd">
                            <p class="mb-0" id="jm">08.30</p>
                            <form action="editKegiatan.html">
                                <button class="btn btn-success">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kartu Kegiatan 3 -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <img class="ig" src="../image/baca-buku-111111.jpg" alt="Kegiatan">
                            <h5>Membaca</h5>
                            <p class="mb-0">Baca buku 10 halaman</p>
                            <small>Rabu, Kamis, Jumat</small>
                        </div>
                        <div class="text-end d-flex flex-column" id="crd">
                            <p class="mb-0" id="jm">08.30</p>
                            <form action="editKegiatan.html">
                                <button class="btn btn-success">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kartu Kegiatan 4 -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <img class="ig" src="../image/baca-buku-111111.jpg" alt="Kegiatan">
                            <h5>Membaca</h5>
                            <p class="mb-0">Baca buku 10 halaman</p>
                            <small>Rabu, Kamis, Jumat</small>
                        </div>
                        <div class="text-end d-flex flex-column" id="crd">
                            <p class="mb-0" id="jm">08.30</p>
                            <form action="editKegiatan.html">
                                <button class="btn btn-success">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php
include '../Template/mainfooter.php';
?>