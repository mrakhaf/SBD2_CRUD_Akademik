<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    //koneksi database
    require 'functions_dosen.php'; 
    $dosen = query("SELECT * FROM dosen");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dosen</title>
</head>
<body>
    <a href="../index.php">Kembali</a>
    <h1>Daftar Dosen</h1>
    <a href="tambah_dosen.php">Tambah Data Dosen</a>
    <br>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>    
            <td>NIP</td>
            <td>Nama Dosen</td>
            <td>Aksi</td>
        </tr>
        <?php foreach($dosen as $dsn){?>
        <tr>
            <td><?= $dsn->nip ?></td>
            <td><?= $dsn->nama_dosen ?></td>
            <td>
                <a href="ubah_dosen.php?id=<?= $dsn->nip ?>">UBAH</a> | 
                <a href="hapus_dosen.php?id=<?= $dsn->nip ?>" 
                onclick="return confirm('Yakin ingin menghapus?')">HAPUS</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>