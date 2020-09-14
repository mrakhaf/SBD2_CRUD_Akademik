<?php
    $conn = mysqli_connect("localhost", "mrakhafm_akademik", "12345", "mrakhafm_akademik");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_object($result)){
            $rows[] = $row;
        }
        return $rows;
    };

    
    function tambah($data){
        global $conn;

        $kode_fakultas = htmlspecialchars($data["kode_fakultas"]);
        $nama_fakultas = htmlspecialchars($data["nama_fakultas"]);

        $query = "INSERT INTO fakultas VALUES
                    ('$kode_fakultas', '$nama_fakultas')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function hapus($id){
        global $conn;

        $query = "DELETE FROM fakultas WHERE kode_fakultas='$id'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function ubah($data){
        global $conn;

        $kode_asal = $data["kode_asal"];
        $kode_fakultas = htmlspecialchars($data["kode_fakultas"]);
        $nama_fakultas = htmlspecialchars($data["nama_fakultas"]);

        $query = "UPDATE fakultas SET
                    kode_fakultas = '$kode_fakultas',
                    nama_fakultas = '$nama_fakultas'
                  WHERE kode_fakultas='$kode_asal'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };
?>