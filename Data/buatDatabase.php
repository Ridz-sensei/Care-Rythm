<?php
include "dbconnection.php";

// Membuat tabel akun
$query = "CREATE TABLE IF NOT EXISTS akun (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    kataSandi VARCHAR(255) NOT NULL,
    email VARCHAR(25) NOT NULL UNIQUE,
    role ENUM('user', 'admin') NOT NULL
);";

// Mengecek apakah tabel akun berhasil dibuat
if ($conn->query($query) === TRUE) {
    echo "Tabel akun berhasil dibuat.<br>";
} else {
    echo "Error dalam membuat tabel akun: " . $conn->error . "<br>";
}

// Membuat tabel profil
$query = "CREATE TABLE IF NOT EXISTS profil (
    username VARCHAR(50) NOT NULL,
    email VARCHAR(25) PRIMARY KEY,
    tentang TEXT,
    foto_profil VARCHAR(255),
    asal VARCHAR(100),
    bergabung DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (email) REFERENCES akun(email) ON DELETE CASCADE
);";

// Mengecek apakah tabel profil berhasil dibuat
if ($conn->query($query) === TRUE) {
    echo "Tabel profil berhasil dibuat.<br>";
} else {
    echo "Error dalam membuat tabel profil: " . $conn->error . "<br>";
}

// Tabel Pertemanan
$query = "CREATE TABLE IF NOT EXISTS pertemanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user1_id INT NOT NULL,
    user2_id INT NOT NULL,
    status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
    tanggal_pertemanan DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (user1_id) REFERENCES akun(id) ON DELETE CASCADE,
    FOREIGN KEY (user2_id) REFERENCES akun(id) ON DELETE CASCADE
);";

if ($conn->query($query) === TRUE) {
    echo "Tabel pertemanan berhasil dibuat.<br>";
} else {
    echo "Error dalam membuat tabel pertemanan: " . $conn->error . "<br>";
}

// Tabel Rencana
$query = "CREATE TABLE IF NOT EXISTS rencana (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nama_rencana VARCHAR(100) NOT NULL,
    catatan TEXT,
    waktu DATETIME NOT NULL,
    tempat VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES akun(id) ON DELETE CASCADE
);";

if ($conn->query($query) === TRUE) {
    echo "Tabel rencana berhasil dibuat.<br>";
} else {
    echo "Error dalam membuat tabel rencana: " . $conn->error . "<br>";
}

// Tabel Rencana_Teman
$query = "CREATE TABLE IF NOT EXISTS rencana_teman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rencana_id INT NOT NULL,
    teman_id INT NOT NULL,
    FOREIGN KEY (rencana_id) REFERENCES rencana(id) ON DELETE CASCADE,
    FOREIGN KEY (teman_id) REFERENCES akun(id) ON DELETE CASCADE
);";

if ($conn->query($query) === TRUE) {
    echo "Tabel rencana_teman berhasil dibuat.<br>";
} else {
    echo "Error dalam membuat tabel rencana_teman: " . $conn->error . "<br>";
}

// Tabel Jadwal
$query = "CREATE TABLE IF NOT EXISTS jadwal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nama_kegiatan VARCHAR(100) NOT NULL,
    hari ENUM('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu') NOT NULL,
    jam TIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES akun(id) ON DELETE CASCADE
);";

if ($conn->query($query) === TRUE) {
    echo "Tabel jadwal berhasil dibuat.<br>";
} else {
    echo "Error dalam membuat tabel jadwal: " . $conn->error . "<br>";
}

// Tabel Target
$query = "CREATE TABLE IF NOT EXISTS target (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    kategori ENUM('mingguan', 'bulanan') NOT NULL,
    nama_target VARCHAR(100) NOT NULL,
    jumlah INT DEFAULT 1,
    tanggal_mulai DATE DEFAULT CURRENT_DATE,
    tanggal_selesai DATE,
    FOREIGN KEY (user_id) REFERENCES akun(id) ON DELETE CASCADE
);";

if ($conn->query($query) === TRUE) {
    echo "Tabel target berhasil dibuat.<br>";
} else {
    echo "Error dalam membuat tabel target: " . $conn->error . "<br>";
}

$conn->close();
?>
