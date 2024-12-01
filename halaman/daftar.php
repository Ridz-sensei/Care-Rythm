<?php
include '../Data/dbconnection.php';

// Membuat data tambah barang
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $kataSandi = $_POST['password'];
    $role = 'user'; // Hanya user yang dapat mendaftar, admin diatur langsung lewat MySQL

    // Simpan data ke tabel akun
    $queryAkun = "INSERT INTO akun (username, email, kataSandi, role) VALUES ('$username', '$email', MD5('$kataSandi'), '$role')";

    if ($conn->query($queryAkun) === true) {
        // Data berhasil dimasukkan ke tabel akun, tambahkan data ke tabel profil
        $queryProfil = "INSERT INTO profil (username, email, tentang, foto_profil, asal, bergabung) 
                        VALUES ('$username', '$email', NULL, NULL, NULL, CURRENT_DATE)";
        
        if ($conn->query($queryProfil) === true) {
            $succesMsg = "pendaftaran akun dengan username " . $username . " berhasil";
            header("Location: masuk.php?successMsg=$succesMsg");
            exit(); 
        } else {
            echo "Error dalam menambahkan data ke tabel profil: " . $conn->error;
        }
    } else {
        echo "Error dalam menambahkan data ke tabel akun: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar - Care Rhythm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/masuk.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container-fluid d-flex justify-content-between align-items-center px-5">
            <a class="navbar-brand" href="landingpage.php"><img src="../image/logo.png" alt="logo" class="logo"></a>
        </div>
    </nav>
    
    <!-- Form Masuk -->
    <main class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 my-5 py-4 px-4" id="register-container">
                <div class="text-center mb-4">
                    <img src="../image/Logo_ungu.png" alt="logo" class="logoo">
                </div>
                <form action="#" method="POST">
                    <div class="form-group mb-2">
                        <label for="username" class="form-label"></label>
                        <input type="username" id="username" name="username" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="email" class="form-label"></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="form-label"></label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Kata sandi" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="submit" class="btn btn-primary w-100" value="Daftar" name="simpan">
                    </div>
                    <hr class="my-3">
                </form>
                <div class="d-grid">
                  <button class="btn btn-outline-danger" id="google-signup">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" >
                          <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
                      </svg>
                      Daftar dengan Google
                  </button>
              </div>
              <div class="text-center mt-3">
                    <p>sudah punya akun? <a href="masuk.php">masuk</a></p>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="../image/logo.png" alt="Care Rhythm Logo" class="footer-logo-img mb-2">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h5>Tentang</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Tentang Kami</a></li>
                                <li><a href="#">Fitur</a></li>
                                <li><a href="#">Kebijakan Privasi</a></li>
                                <li><a href="#">Persyaratan Layanan</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-center">
                            <h5>Ikuti</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Instagram</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
