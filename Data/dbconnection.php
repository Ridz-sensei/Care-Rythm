<?php
$host = "localhost";
$username = "root";
$password = "";

$dbname = "CareRythm";

// create connection
$conn = new mysqli($host, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Koneksi gagal: " . $conn->connect_error);
} //else {
//     echo "koneksi berhasil<br>";
// }