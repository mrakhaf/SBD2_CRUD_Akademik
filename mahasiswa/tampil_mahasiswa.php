<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    //koneksi database
    require 'functions_mahasiswa.php'; 
    $mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <a href="../index.php">Kembali</a>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah_mahasiswa.php">Tambah Data Mahasiswa</a>
    <br>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>    
            <td>NIM</td>
            <td>Nama</td>
            <td>Tahun Angkatan</td>
            <td>Prodi</td>
            <td>Aksi</td>
        </tr>
        <?php foreach($mahasiswa as $mhs){?>
        <tr>
            <td><?= $mhs->nim ?></td>
            <td><?= $mhs->nama ?></td>
            <td><?= $mhs->thn_angkatan ?></td>
            <td><?= $mhs->prodi ?></td>
            <td>
                <a href="ubah_mahasiswa.php?id=<?= $mhs->nim ?>">UBAH</a> | 
                <a href="hapus_mahasiswa.php?id=<?= $mhs->nim ?>" 
                onclick="return confirm('Yakin ingin menghapus?')">HAPUS</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>