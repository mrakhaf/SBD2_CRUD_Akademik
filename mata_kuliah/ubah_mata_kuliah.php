<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    require 'functions_mata_kuliah.php';

    //ambil data dari url
    $id = $_GET["id"];

    //ambil data berdasarkan id
    $mk = query("SELECT * FROM mata_kuliah WHERE kode_mk='$id'")[0];
    
    //cek
    if(isset($_POST["submit"])){
        if(ubah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'tampil_mata_kuliah.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Diubah!'); 
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
    <title>Ubah Data Mata Kuliah</title>
</head>
<body>
    <a href="tampil_mata_kuliah.php">Kembali</a>

    <h1>Ubah Data Mata Kuliah</h1>

    <form action="" method="post">
        <input type="hidden" name="kode_asal" value="<?= $mk->kode_mk ?>">
        <ul>
            <li>
                <label for="kode_mk">Kode Mata Kuliah : </label>
                <input type="text" name="kode_mk" id="kode_mk" required
                value="<?= $mk->kode_mk ?>">
            </li>
            <li>
                <label for="nama_mk">Nama Mata Kuliah : </label>
                <input type="text" name="nama_mk" id="nama_mk" required
                value="<?= $mk->nama_mk ?>">
            </li>
            <li>
                <label for="pengajar">Kode Pengajar : </label>
                <input type="text" name="pengajar" id="pengajar" required
                value="<?= $mk->pengajar ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>