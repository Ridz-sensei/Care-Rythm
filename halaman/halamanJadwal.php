<?php
include '../Template/mainheader.php';
?>

    <!-- Konten Kegiatan -->
    <div class="container mt-5">
      <h1 class="text-center mb-4">Jadwal</h1>
      <div class="d-flex justify-content-between align-items-center mb-3">
          <form action="tambahisijadwal.html">
              <button class="btn btn-success">+ Tambah Jadwal</button>
          </form>
          <form action="editjadwal.html">
              <button class="btn btn-success">Hari Ini</button>
          </form>
      </div>
  
    <!-- Daftar Jadwal -->
    <?php
    
    ?>
      <div class="mb-4">
          <!-- Kelas Bahasa Inggris -->
          <div class="card shadow-sm mb-3">
              <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                      <h5 class="card-title">Kelas Bahasa Inggris</h5>
                      <p class="card-text text-muted">07:30 - 08:30</p>
                  </div>
                  <form action="ubahisijadwal.html">
                      <button class="btn btn-outline-primary">
                        Edit
                      </button>
                  </form>
              </div>
          </div>
  
          <!-- Matematika -->
          <div class="card shadow-sm mb-3">
              <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                      <h5 class="card-title">Matematika</h5>
                      <p class="card-text text-muted">09:30 - 10:30</p>
                  </div>
                  <form action="ubahisijadwal.html">
                    <button class="btn btn-outline-primary w-100">
                      Edit
                    </button>
                </form>
              </div>
          </div>
  
          <!-- IPA -->
          <div class="card shadow-sm mb-3">
              <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                      <h5 class="card-title">IPA</h5>
                      <p class="card-text text-muted">11:30 - 12:30</p>
                  </div>
                  <form action="ubahisijadwal.html">
                      <button class="btn btn-outline-primary">
                        Edit
                      </button>
                  </form>
              </div>
          </div>
      </div>
  </div>

<?php
include '../Template/mainfooter.php';
?>