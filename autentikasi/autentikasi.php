<?php
include "../Data/dbconnection.php";

$username = $_POST['username'];
$kataSandi = MD5($_POST['password']);

$sqlStatement = "SELECT * FROM akun WHERE username='$username'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);

if (!$row) {
    $errMsg = "Username tidak terdaftar";
    header("location:../halaman/masuk.php?errMsg=$errMsg");
} else {
    if ($kataSandi === $row['kataSandi']) { // username dan password benar
        session_start();
        $_SESSION['username'] = $row['username']; // Simpan username dalam sesi
        header("location:../halaman/HalamanUtama1.php");
    } else { // password salah
        $errMsg = "Password salah";
        header("location:../halaman/masuk.php?errMsg=$errMsg");
    }
}
?>
