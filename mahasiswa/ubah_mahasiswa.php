<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    require 'functions_mahasiswa.php';

    //ambil data dari url
    $id = $_GET["id"];

    //ambil data berdasarkan id
    $mhs = query("SELECT * FROM mahasiswa WHERE nim='$id'")[0];
    
    //cek
    if(isset($_POST["submit"])){
        if(ubah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'tampil_mahasiswa.php';
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

    $prodi = query("SELECT * FROM prodi");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <a class="btn btn-primary" href="tampil_mahasiswa.php">Kembali</a>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="d-flex justify-content-center">Ubah Data Mahasiswa</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nim">NIP : </label>
                        <input class="form-control" type="text" name="nim" id="nim" required
                        value="<?= $mhs->nim ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama : </label>
                        <input class="form-control" type="text" name="nama" id="nama" required
                        value="<?= $mhs->nama ?>">
                    </div>
                    <div class="form-group">
                        <label for="thn_angkatan">Tahun Angkatan : </label>
                        <input class="form-control" type="text" name="thn_angkatan" id="thn_angkatan" required
                        value="<?= $mhs->thn_angkatan ?>">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi : </label>
                        <select class="form-control" name="prodi" id="prodi">
                            <?php foreach ($prodi as $p){?>
                            <option value="<?= $p->kode_prodi?>"><?= $p->kode_prodi?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>