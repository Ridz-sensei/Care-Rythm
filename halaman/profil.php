<?php
include '../Data/dbconnection.php';

session_start();
$namaPengguna = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Pengguna';

$sqlStatement = "SELECT * FROM profil WHERE username = '$namaPengguna'";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

foreach ($data as $key => $isi){
  $username = $isi['username'];
  $email = $isi['email'];
  $tentang = $isi['tentang'] ?? 'Belum diisi';
  $foto = $isi['foto_profil'] ?? 'https://via.placeholder.com/120x120';
  $asal = $isi['asal'];
  $bergabung = $isi['bergabung'];
}

$waktu_bergabung = new DateTime($isi['bergabung']);
$sekarang = new DateTime();
$lama_bergabung = date_diff($waktu_bergabung,$sekarang);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil & Edit Profil</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #270e56;
      color: white;
      height: 100vh; /* Full screen height */
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .container {
      width: 80%;
      background: #6f42c1;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }
    
    /* Tombol Kembali */
    .back-button {
      position: absolute;
      top: 20px;
      left: 20px;
      background: #6f42c1;
      color: white;
      border: none;
      padding: 12px 16px;
      border-radius: 30px;
      font-size: 18px;
      cursor: pointer;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .back-button:hover {
      background-color: #5a2d8a;
      transform: scale(1.1);
    }

    .back-button:active {
      background-color: #4a1f6e;
    }

    /* Profil Header */
    .profile-header {
      display: flex;
      align-items: center;
      gap: 20px;
      padding: 20px;
      background: #6f42c1;
      border-bottom: 2px solid #ffffff;
    }

    .profile-photo {
      position: relative;
    }
    .profile-photo img {
      width: 120px;
      height: 120px;
      border-radius: 10px;
      background: #fff;
      padding: 5px;
    }

    .profile-details h2 {
      font-size: 24px;
      margin: 0;
    }

    .profile-details p {
      margin: 5px 0;
      font-size: 16px;
    }

    .tabs {
      display: flex;
      justify-content: space-between;
      padding: 10px 20px;
      background: #6f42c1;
    }

    .tabs a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .tabs a.active {
      text-decoration: underline;
    }

    .content {
      padding: 20px;
      background: #270e56;
    }

    .content p {
      margin: 5px 0;
      padding: 5px 0;
    }

    /* Angka dan Ikon Piala */
    .trophy-container {
      display: flex;
      align-items: center;
      gap: 5px;
      margin-top: 10px;
    }

    .trophy {
      font-size: 24px;
    }

    .trophy-icon {
      font-size: 24px;
    }

  </style>
</head>
<body>
  <div class="container">
    <!-- Profil Header -->
    <div class="profile-header">
      <!-- Tombol Kembali -->
      <button class="back-button" onclick="window.location.href='HalamanUtama1.php';">Kembali</button>
      <div class="profile-photo">
        <img src="../image/<?= $foto ?>" alt="https://via.placeholder.com/120">
      </div>
      <div class="profile-details">
        <h2><?= $username; ?></h2>
        <p><?= $email ?></p>

        <!-- Angka dan Ikon Piala -->
        <div class="trophy-container">
          <div class="trophy">0</div>
          <div class="trophy-icon">🏆</div>
        </div>
      </div>
    </div>
    
    <!-- Tab Navigasi -->
    <div class="tabs">
      <a href="#" class="active">Profil</a>
      <div>
        <p>
          <a href="editkatasandi.php">Ganti Kata Sandi</a>
          |
          <a href="editProfil.php" class="edit-button">Edit Profile</a>
        </p>
      </div>
    </div>

    <!-- Konten -->
    <div class="content">
      
      <h3>Status</h3>
      <p><?= $tentang ?></p>

      <div class="stats">
        <p><strong>Bergabung:</strong> <?= $bergabung ?></p>
        <p><strong>sudah bergabung selama:</strong></p>
        <p><?= $lama_bergabung->y ?> tahun <?= $lama_bergabung->m ?> bulan <?= $lama_bergabung->d ?> hari</p>
        <p><strong>Total Masuk:</strong></p>
        <p><strong>Terakhir Masuk:</strong> <?= date('Y-m-d H:i:s'); ?></p>
      </div>
    </div>
    <?php if (isset($_GET['Msg'])) { ?>
        <div class="alert alert-success" role="alert">
            <?= $_GET['Msg'] ?>
        </div>
    <?php } ?>
  </div>
</body>
</html>
