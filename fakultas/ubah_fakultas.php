<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    require 'functions_fakultas.php';

    //ambil data dari url
    $id = $_GET["id"];

    //ambil data berdasarkan id
    $fk = query("SELECT * FROM fakultas WHERE kode_fakultas='$id'")[0];
    
    //cek
    if(isset($_POST["submit"])){
        if(ubah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'tampil_fakultas.php';
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
    <title>Ubah Data Fakultas</title>
</head>
<body>
    <a href="tampil_fakultas.php">Kembali</a>

    <h1>Ubah Data Fakultas</h1>

    <form action="" method="post">
        <input type="hidden" name="kode_asal" value="<?= $fk->kode_fakultas ?>">
        <ul>
            <li>
                <label for="kode_fakultas">Kode Fakultas : </label>
                <input type="text" name="kode_fakultas" id="kode_fakultas" required
                value="<?= $fk->kode_fakultas ?>">
            </li>
            <li>
                <label for="nama_fakultas">Nama Fakultas : </label>
                <input type="text" name="nama_fakultas" id="nama_fakultas" required
                value="<?= $fk->nama_fakultas ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>