<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    //koneksi database
    require 'functions_nilai_mahasiswa.php'; 
    $mahasiswa = query("SELECT * FROM nilai_mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Mahasiswa</title>
</head>
<body>
    <a href="../index.php">Kembali</a>
    <h1>Daftar Nilai Mahasiswa</h1>
    <a href="tambah_nilai_mahasiswa.php">Tambah Data Nilai</a>
    <br>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>    
            <td>NIM</td>
            <td>Kode Mata Kuliah</td>
            <td>Nilai</td>
            <td>Aksi</td>
        </tr>
        <?php foreach($mahasiswa as $mhs){?>
        <tr>
            <td><?= $mhs->nim ?></td>
            <td><?= $mhs->kode_mk ?></td>
            <td><?= $mhs->nilai ?></td>
            <td>
                <a href="ubah_nilai_mahasiswa.php?id=<?= $mhs->id_nilai ?>">UBAH</a> | 
                <a href="hapus_nilai_mahasiswa.php?id=<?= $mhs->id_nilai ?>" 
                onclick="return confirm('Yakin ingin menghapus?')">HAPUS</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>