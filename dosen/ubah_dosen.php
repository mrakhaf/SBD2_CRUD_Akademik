<?php
    require 'functions_dosen.php';

    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    //ambil data dari url
    $id = $_GET["id"];

    //ambil data berdasarkan id
    $dsn = query("SELECT * FROM dosen WHERE nip='$id'")[0];
    
    //cek
    if(isset($_POST["submit"])){
        if(ubah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'tampil_dosen.php';
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
    <title>Ubah Data Dosen</title>
</head>
<body>
    <a href="tampil_dosen.php">Kembali</a>

    <h1>Ubah Data Dosen</h1>

    <form action="" method="post">
        <input type="hidden" name="nip_asal" value="<?= $dsn->nip ?>">
        <ul>
            <li>
                <label for="nim">NIP : </label>
                <input type="text" name="nip" id="nip" required
                value="<?= $dsn->nip ?>">
            </li>
            <li>
                <label for="nama_dosen">Nama Dosen : </label>
                <input type="text" name="nama_dosen" id="nama_dosen" required
                value="<?= $dsn->nama_dosen ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>