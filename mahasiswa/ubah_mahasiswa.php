<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    require 'functions_mahasiswa.php';

    //ambil data dari url
    $id = $_GET["id"];

    //ambil data berdasarkan id
    $mhs = query("SELECT * FROM mahasiswa WHERE nim='$id'")[0];
    
    //cek
    if(isset($_POST["submit"])){
        if(ubah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'tampil_mahasiswa.php';
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
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <a href="tampil_mahasiswa.php">Kembali</a>

    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post">
        <input type="hidden" name="nim_asal" value="<?= $mhs->nim ?>">
        <ul>
            <li>
                <label for="nim">NIP : </label>
                <input type="text" name="nim" id="nim" required
                value="<?= $mhs->nim ?>">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required
                value="<?= $mhs->nama ?>">
            </li>
            <li>
                <label for="thn_angkatan">Tahun Angkatan : </label>
                <input type="text" name="thn_angkatan" id="thn_angkatan" required
                value="<?= $mhs->thn_angkatan ?>">
            </li>
            <li>
                <label for="prodi">Prodi : </label>
                <input type="text" name="prodi" id="prodi" required
                value="<?= $mhs->prodi ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>