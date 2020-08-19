<?php
    $conn = mysqli_connect("localhost", "root", "", "akademik");

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

        $kode_prodi = htmlspecialchars($data["kode_prodi"]);
        $nama_prodi = htmlspecialchars($data["nama_prodi"]);
        $kode_fakultas = htmlspecialchars($data["kode_fakultas"]);

        $query = "INSERT INTO prodi VALUES
                    ('$kode_prodi', '$nama_prodi', '$kode_fakultas')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function hapus($id){
        global $conn;

        $query = "DELETE FROM prodi WHERE kode_prodi='$id'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function ubah($data){
        global $conn;

        $kode_asal = $data["kode_asal"];
        $kode_prodi = htmlspecialchars($data["kode_prodi"]);
        $nama_prodi = htmlspecialchars($data["nama_prodi"]);
        $kode_fakultas = htmlspecialchars($data["kode_fakultas"]);

        $query = "UPDATE prodi SET
                    kode_prodi = '$kode_prodi',
                    nama_prodi = '$nama_prodi',
                    kode_fakultas = '$kode_fakultas'
                  WHERE kode_prodi='$kode_asal'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };
?>