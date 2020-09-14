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

        $nip = htmlspecialchars($data["nip"]);
        $nama_dosen = htmlspecialchars($data["nama_dosen"]);

        $query = "INSERT INTO dosen VALUES
                    ('$nip', '$nama_dosen')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function hapus($id){
        global $conn;

        $query = "DELETE FROM dosen WHERE nip='$id'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function ubah($data){
        global $conn;

        $nip_asal = $data["nip_asal"];
        $nip = htmlspecialchars($data["nip"]);
        $nama_dosen = htmlspecialchars($data["nama_dosen"]);

        $query = "UPDATE dosen SET
                    nip = '$nip',
                    nama_dosen = '$nama_dosen'
                  WHERE nip='$nip_asal'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };
?>