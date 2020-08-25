<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    require 'functions_prodi.php';

    //cek
    if(isset($_POST["submit"])){
        if(tambah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'tampil_prodi.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan!'); 
                </script>
            ";
        };
    };

    $fakultas = query("SELECT * FROM fakultas");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <title>Tambah Data Prodi</title>
</head>
<body>
    <a class="btn btn-primary" href="tampil_prodi.php">Kembali</a>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="d-flex justify-content-center">Tambah Data Prodi</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <form action="" method="post">
                <div class="form-group">
                    <label for="kode_prodi">Kode Prodi : </label>
                    <input class="form-control" type="text" name="kode_prodi" id="kode_prodi" required>
                </div>
                <div class="form-group">
                    <label for="nama_prodi">Nama Prodi : </label>
                    <input class="form-control" type="text" name="nama_prodi" id="nama_prodi" required>
                </div>
                <div class="form-group">
                    <label for="kode_fakultas">Kode Fakultas : </label>
                        <select class="form-control" name="kode_fakultas" id="kode_fakultas">
                            <?php foreach ($fakultas as $fk){?>
                            <option value="<?= $fk->kode_fakultas?>"><?= $fk->kode_fakultas?></option>
                            <?php } ?>
                        </select>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
                
            </form>
            </div>
        </div>
    </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>