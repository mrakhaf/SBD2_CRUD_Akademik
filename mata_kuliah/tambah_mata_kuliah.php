<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    require 'functions_mata_kuliah.php';

    //cek
    if(isset($_POST["submit"])){
        if(tambah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'tampil_mata_kuliah.php';
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
    <title>Tambah Data Mata Kuliah</title>
</head>
<body>
    <a href="tampil_mata_kuliah.php">Kembali</a>

    <h1>Tambah Data Mata Kuliah</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="kode_mk">Kode Mata Kuliah : </label>
                <input type="text" name="kode_mk" id="kode_mk" required>
            </li>
            <li>
                <label for="nama_mk">Nama Mata Kuliah : </label>
                <input type="text" name="nama_mk" id="nama_mk" required>
            </li>
            <li>
                <label for="pengajar">Kode Pengajar : </label>
                <input type="text" name="pengajar" id="pengajar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>