<?php
include '../Data/dbconnection.php';

session_start();
$namaPengguna = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Pengguna';

$sqlStatement = "   SELECT j.nama_kegiatan, j.hari, j.jam
                    FROM jadwal j
                    JOIN akun a ON j.user_id = a.id
                    WHERE a.username = '$namaPengguna';";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

print_r($data);
?>