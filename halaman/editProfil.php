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
    $foto = $isi['foto_profil'];
    $asal = $isi['asal'];
    $bergabung = $isi['bergabung'];
}

if (isset($_POST['btnSimpan'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $asal = $_POST["asal"];
    $tentang = $_POST["tentang"] ?? 'Belum diisi';
    $foto = $_FILES['foto'];

    if (!empty($foto['name'])){
        $photoName = time(). '_' . $foto['name'];
        // echo $photoName;
        move_uploaded_file($foto['tmp_name'], '../image/'. $photoName);

        unlink("../image/" . $isi['foto_profil']);
    } else {
        $photoName = $isi['foto_profil'];
    }

    // Update data profil ke database
    $sqlStatement = "UPDATE profil SET username='$username', asal='$asal', foto_profil='$photoName', tentang='$tentang' WHERE email='$email'";
    $query = mysqli_query($conn, $sqlStatement);

    if ($query) {
        $succesMsg = "Data kamu berhasil diubah";
        header("location:profil.php?successMsg=$succesMsg");
    } else {
        $errMsg = "Pengubahan data kamu GAGAL !" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

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

    .form-container {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      background: white;
      color: black;
      border-radius: 10px;
      padding: 20px;
      margin-top: 20px;
    }

    .form-left, .form-right {
      display: flex;
      flex-direction: column;
      width: 400px;
      min-width: auto;
    }

    .form-left img {
      width: 100%;
      max-width: 200px;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-actions {
      display: flex;
      gap: 10px;
      margin-top: 20px;
    }

    .form-actions .save {
      align-items:center;
      width: 50px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background: #6f42c1;
      color: white;
      :hover {
        background: #8a2be2; 
      }
    }

    .form-actions .cancel {
      width: 50px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background: white;
      color: #6f42c1;
      :hover {
        background: #d4e3d7;
      }
    }

    input[type="submit"], input[type="reset"] {
    all: unset;
    cursor: pointer;
    padding: 10px 20px;
    border: 1px solid white;
    text-align: center;
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #5a2d8a;
        color: white;
    }

  </style>
</head>
<body>
  <div class="container">
    <!-- Profil Header -->
    <div class="profile-header">
      <!-- Tombol Kembali -->
      <button class="back-button" onclick="window.location.href='profil.php';">Kembali</button>
      <div class="profile-photo">
        <img src="../image/<?= $foto ?>" alt="Profil">
      </div>
      <div class="profile-details">
        <h2><?= $username ?></h2>
        <p><?= $email ?></p>
      </div>
    </div>

    <!-- Tab Navigasi -->
    <div class="tabs">
      <a href="#" class="active">Profil</a>
    </div>

    <!-- Form Edit Profile -->
    <form method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="form-container">
                <!-- Bagian Kiri -->
                <div class="form-left">
                    <img src="../image/<?= $foto ?>" alt="tidak ada foto" width="200">
                    <input type="file" class="form-control" id="foto" cols="50" name="foto" placeholder="foto">
                </div>
                <!-- Bagian Kanan -->
                <div class="form-right">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="username" name="username" value="<?= $username ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" size="10" disabled value="<?= $email ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="asal">Alamat</label>
                        <input type="text" id="asal" name="asal" value="<?= $asal ?>">
                    </div>
                    <div class="form-group">
                        <label for="tentang">Tentang</label>
                        <input type="text" id="tentang" name="tentang" value="<?= $tentang ?>">
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <input type="hidden" name="email" value="<?= $email ?>">
                <input type="submit" class="save" name="btnSimpan" value="Simpan">
                <input type="reset" class="cancel" value="Ulangi">
            </div>
        </div>
    </form>
  </div>
</body>
</html>