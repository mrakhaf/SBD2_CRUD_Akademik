<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    //koneksi database
    require 'functions_prodi.php'; 
    $program_studi = query("SELECT * FROM prodi");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Prodi</title>
</head>
<body>
    <a href="../index.php">Kembali</a>
    <h1>Daftar Prodi</h1>
    <a href="tambah_prodi.php">Tambah Data Prodi</a>
    <br>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>    
            <td>Kode Prodi</td>
            <td>Nama Prodi</td>
            <td>Kode Fakultas</td>
            <td>Aksi</td>
        </tr>
        <?php foreach($program_studi as $prodi){?>
        <tr>
            <td><?= $prodi->kode_prodi ?></td>
            <td><?= $prodi->nama_prodi ?></td>
            <td><?= $prodi->kode_fakultas ?></td>
            <td>
                <a href="ubah_prodi.php?id=<?= $prodi->kode_prodi ?>">UBAH</a> | 
                <a href="hapus_prodi.php?id=<?= $prodi->kode_prodi ?>" 
                onclick="return confirm('Yakin ingin menghapus?')">HAPUS</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>