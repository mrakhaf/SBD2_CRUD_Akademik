<?php
    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    require 'functions_mahasiswa.php';

    $id = $_GET["id"];

    if (hapus($id) > 0){
        echo "
                <script>
                    alert('Data Berhasil Dihapus!');
                    document.location.href = 'tampil_mahasiswa.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Ditambahkan!');
                </script>
            ";
    }
?>