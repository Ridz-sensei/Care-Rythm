<?php
include '../Data/dbconnection.php';

session_start();
$namaPengguna = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Pengguna';

$sqlStatement = "SELECT * FROM akun WHERE username = '$namaPengguna'";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

foreach ($data as $key => $isi){
    $username = $isi['username'];
    $kataSandi = $isi['kataSandi'];
}

if (isset($_POST['simpan'])) {
    $Oldpassword = MD5($_POST["old_password"]);
    $Newpassword = MD5($_POST["new_password"]);
    
    if ($Oldpassword == $kataSandi) {
        $sqlStatement = "UPDATE akun SET kataSandi='$Newpassword' WHERE username = '$namaPengguna'";
        mysqli_query($conn, $sqlStatement);
        
        $succesMsg = "Password berhasil diubah";
        header("location:profil.php?Msg=$succesMsg");
        mysqli_close($conn);
    } else {
        $errMsg = "password lama salah !" . mysqli_error($conn);
        header("location:profil.php?Msg=$errMsg");
        mysqli_close($conn);
    }

}
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kata sandi</title>
</head>
<body>
    <h2>Edit Kata sandi</h2>
    <form method="POST" action="">

        <label for="old_password">Password Lama:</label><br>
        <input type="password" id="old_password" name="old_password" required><br><br>

        <label for="new_password">Password Baru:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>

        <input type="submit" class="btn btn-primary w-100" value="ubah password" name="simpan">
    </form>
</body>
</html>