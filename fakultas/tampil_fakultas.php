<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    //koneksi database
    require 'functions_fakultas.php'; 
    $fakultas = query("SELECT * FROM fakultas");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Fakultas</title>
</head>
<body>
    <h1>Daftar Fakultas</h1>
    <a href="tambah_fakultas.php">Tambah Data Fakultas</a>
    <br>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>    
            <td>Kode Fakultas</td>
            <td>Nama Fakultas</td>
            <td>Aksi</td>
        </tr>
        <?php foreach($fakultas as $fk){?>
        <tr>
            <td><?= $fk->kode_fakultas ?></td>
            <td><?= $fk->nama_fakultas ?></td>
            <td>
                <a href="ubah_fakultas.php?id=<?= $fk->kode_fakultas ?>">UBAH</a> | 
                <a href="hapus_fakultas.php?id=<?= $fk->kode_fakultas ?>" 
                onclick="return confirm('Yakin ingin menghapus?')">HAPUS</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>