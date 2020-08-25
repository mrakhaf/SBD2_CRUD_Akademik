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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <title>Halaman Utama</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Data Akademik</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="nilai_mahasiswa/tampil_nilai_mahasiswa.php" class="nav-link">Nilai Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a href="dosen/tampil_dosen.php" class="nav-link">Dosen</a>
                </li>
                <li class="nav-item">
                    <a href="mata_kuliah/tampil_mata_kuliah.php" class="nav-link">Mata Kuliah</a>
                </li>
                <li class="nav-item">
                    <a href="fakultas/tampil_fakultas.php" class="nav-link">Fakultas</a>
                </li>
                <li class="nav-item">
                    <a href="prodi/tampil_prodi.php" class="nav-link">Prodi</a>
                </li>
                <li class="nav-item">
                    <a href="mahasiswa/tampil_mahasiswa.php" class="nav-link">Mahasiswa</a>     
                </li>
            </ul>
            <a href="logout.php" class="btn btn-danger my-2 my-sm-0">Logout</a>
        </div>
    </nav>
    <br><br><br><br><br><br><br><br><br>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="d-flex justify-content-center">Halaman Utama Data Akademik</h1>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>