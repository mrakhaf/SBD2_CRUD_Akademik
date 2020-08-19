<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    require 'functions_nilai_mahasiswa.php';

    //ambil data dari url
    $id = $_GET["id"];

    //ambil data berdasarkan id
    $mhs = query("SELECT * FROM nilai_mahasiswa WHERE id_nilai=$id")[0];


    
    //cek
    if(isset($_POST["submit"])){
        if(ubah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'tampil_nilai_mahasiswa.php';
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
    <title>Ubah Data Nilai</title>
</head>
<body>
    <a href="tampil_nilai_mahasiswa.php">Kembali</a>

    <h1>Ubah Data Nilai</h1>

    <form action="" method="post">
        <input type="hidden" name="id_nilai" value="<?= $mhs->id_nilai ?>">
        <ul>
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" required
                value="<?= $mhs->nim ?>">
            </li>
            <li>
                <label for="kode_mk">Kode Mata Kuliah : </label>
                <input type="text" name="kode_mk" id="kode_mk" required
                value="<?= $mhs->kode_mk ?>">
            </li>
            <li>
                <label for="nilai">Nilai : </label>
                <input type="number" name="nilai" id="nilai" required
                value="<?= $mhs->nilai ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>