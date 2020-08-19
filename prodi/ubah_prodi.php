<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    require 'functions_prodi.php';

    //ambil data dari url
    $id = $_GET["id"];

    //ambil data berdasarkan id
    $prodi = query("SELECT * FROM prodi WHERE kode_prodi='$id'")[0];


    
    //cek
    if(isset($_POST["submit"])){
        if(ubah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'tampil_prodi.php';
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
    <title>Ubah Data Prodi</title>
</head>
<body>
    <a href="tampil_prodi.php">Kembali</a>

    <h1>Ubah Data Prodi</h1>

    <form action="" method="post">
        <input type="hidden" name="kode_asal" value="<?= $prodi->kode_prodi ?>">
        <ul>
            <li>
                <label for="kode_prodi">Kode Prodi : </label>
                <input type="text" name="kode_prodi" id="kode_prodi" required
                value="<?= $prodi->kode_prodi ?>">
            </li>
            <li>
                <label for="nama_prodi">Nama Prodi : </label>
                <input type="text" name="nama_prodi" id="nama_prodi" required
                value="<?= $prodi->nama_prodi ?>">
            </li>
            <li>
                <label for="kode_fakultas">Kode Fakultas : </label>
                <input type="text" name="kode_fakultas" id="kode_fakultas" required
                value="<?= $prodi->kode_fakultas ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>