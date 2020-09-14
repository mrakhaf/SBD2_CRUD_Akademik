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

        $kode_mk = htmlspecialchars($data["kode_mk"]);
        $nama_mk = htmlspecialchars($data["nama_mk"]);
        $pengajar = htmlspecialchars($data["pengajar"]);

        $query = "INSERT INTO mata_kuliah VALUES
                    ('$kode_mk', '$nama_mk', '$pengajar')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function hapus($id){
        global $conn;

        $query = "DELETE FROM mata_kuliah WHERE kode_mk='$id'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function ubah($data){
        global $conn;

        $kode_asal = $data["kode_asal"];
        $kode_mk = htmlspecialchars($data["kode_mk"]);
        $nama_mk = htmlspecialchars($data["nama_mk"]);
        $pengajar = htmlspecialchars($data["pengajar"]);

        $query = "UPDATE mata_kuliah SET
                    kode_mk = '$kode_mk',
                    nama_mk = '$nama_mk',
                    pengajar = '$pengajar'
                  WHERE kode_mk='$kode_asal'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

?>