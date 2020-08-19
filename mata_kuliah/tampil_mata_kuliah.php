<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    //koneksi database
    require 'functions_mata_kuliah.php'; 
    $matkul = query("SELECT * FROM mata_kuliah");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah</title>
</head>
<body>
    <a href="../index.php">Kembali</a>
    <h1>Daftar Mata Kuliah</h1>
    <a href="tambah_mata_kuliah.php">Tambah Data Mata Kuliah</a>
    <br>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>    
            <td>Kode Mata Kuliah</td>
            <td>Nama Mata Kuliah</td>
            <td>Kode Pengajar</td>
            <td>Aksi</td>
        </tr>
        <?php foreach($matkul as $mk){?>
        <tr>
            <td><?= $mk->kode_mk ?></td>
            <td><?= $mk->nama_mk ?></td>
            <td><?= $mk->pengajar ?></td>
            <td>
                <a href="ubah_mata_kuliah.php?id=<?= $mk->kode_mk ?>">UBAH</a> | 
                <a href="hapus_mata_kuliah.php?id=<?= $mk->kode_mk ?>" 
                onclick="return confirm('Yakin ingin menghapus?')">HAPUS</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>