<?php
include '../Data/dbconnection.php';

// session_start();
// $namaPengguna = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Pengguna';

$sqlStatement = "SELECT * FROM akun WHERE username = '$namaPengguna'";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

// print_r ($data);
foreach($data as $key => $isi){
    $id = $isi['id'];
    $username = $isi['username'];
}

$sqlStatement = "   SELECT a.username AS nama_teman, p.foto_profil
                    FROM akun AS a
                    JOIN profil AS p ON a.email = p.email
                    WHERE  
                        a.id IN (
                            SELECT 
                                CASE 
                                    WHEN user1_id = (SELECT id FROM akun WHERE username = '$username') 
                                    THEN user2_id
                                    ELSE user1_id
                                END
                            FROM pertemanan
                            WHERE user1_id = (SELECT id FROM akun WHERE username = '$username')
                            OR user2_id = (SELECT id FROM akun WHERE username = '$username')
                        );";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

// print_r ($data);

// Batasi pengulangan hanya 3 data
$data = array_slice($data, 0, 3);
?>