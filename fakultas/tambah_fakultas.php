<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    require 'functions_fakultas.php';

    //cek
    if(isset($_POST["submit"])){
        if(tambah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'tampil_fakultas.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan!'); 
                </script>
            ";
        };
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Fakultas</title>
</head>
<body>
    <a href="tampil_fakultas.php">Kembali</a>

    <h1>Tambah Data Fakultas</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="kode_fakultas">Kode Fakultas : </label>
                <input type="text" name="kode_fakultas" id="kode_fakultas" required>
            </li>
            <li>
                <label for="nama_dosen">Nama Fakultas : </label>
                <input type="text" name="nama_fakultas" id="nama_fakultas" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>