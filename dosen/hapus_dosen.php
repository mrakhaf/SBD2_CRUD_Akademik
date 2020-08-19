<?php
    require 'functions_dosen.php';

    session_start();    

    if( !isset($_SESSION["login"])){
        echo "
                <script>
                    document.location.href = '../login.php';
                </script>";
    }

    $id = $_GET["id"];

    if (hapus($id) > 0){
        echo "
                <script>
                    alert('Data Berhasil Dihapus!');
                    document.location.href = 'tampil_dosen.php';
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