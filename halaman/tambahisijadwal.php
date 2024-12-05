<?php
include '../Data/dbconnection.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Isi Jadwal</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #270e56, #6f42c1);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 400px;
            text-align: left;
        }

        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 14px;
        }

        .form-group .time-input {
            width: 45%;
            margin-right: 5%;
            text-align: center;
        }

        .form-group .time-input:last-child {
            margin-right: 0;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .actions button {
            padding: 8px 16px;
            font-size: 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .actions .add-btn {
            background-color: #6f42c1;
            color: white;
        }

        .actions .cancel-btn {
            background: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Jadwal</h1>
        <div class="form-group">
            <label for="subject">Nama Pelajaran/Matakuliah</label>
            <input type="text" id="subject" placeholder="Masukkan nama pelajaran/matakuliah">
        </div>
        <div class="form-group">
            <label>Waktu</label>
            <input type="text" class="time-input" placeholder="00.00">
            -
            <input type="text" class="time-input" placeholder="00.00">
        </div>
        <div class="actions">
            <button class="add-btn">Tambah</button>
            <button class="cancel-btn" onclick="window.location.href='HalamanUtama1.php';">Batal</button>
        </div>
    </div>
</body>
</html>
