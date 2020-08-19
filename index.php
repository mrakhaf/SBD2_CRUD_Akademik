<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = 'login.php';
                </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>
<body>
    <h1>Data Akademik</h1>

    <ul>
        <li>
            <a href="nilai_mahasiswa/tampil_nilai_mahasiswa.php">Nilai Mahasiswa</a>
        </li>
        <li>
            <a href="dosen/tampil_dosen.php">Dosen</a>
        </li>
        <li>
            <a href="mata_kuliah/tampil_mata_kuliah.php">Mata Kuliah</a>
        </li>
        <li>
            <a href="fakultas/tampil_fakultas.php">Fakultas</a>
        </li>
        <li>
            <a href="prodi/tampil_prodi.php">Prodi</a>
        </li>
        <li>
            <a href="mahasiswa/tampil_mahasiswa.php">Mahasiswa</a>
        </li>
    </ul>

    <a href="logout.php">Logout</a>
</body>
</html>