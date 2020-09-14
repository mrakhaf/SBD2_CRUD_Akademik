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

        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $thn_angkatan = htmlspecialchars($data["thn_angkatan"]);
        $prodi = htmlspecialchars($data["prodi"]);

        $query = "INSERT INTO mahasiswa VALUES
                    ('$nim', '$nama', '$thn_angkatan', '$prodi')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function hapus($id){
        global $conn;

        $query = "DELETE FROM mahasiswa WHERE nim='$id'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function ubah($data){
        global $conn;

        $nim_asal = $data["nim_asal"];
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $thn_angkatan = htmlspecialchars($data["thn_angkatan"]);
        $prodi = htmlspecialchars($data["prodi"]);

        $query = "UPDATE mahasiswa SET
                    nim = '$nim',
                    nama = '$nama',
                    thn_angkatan = '$thn_angkatan',
                    prodi = '$prodi'
                  WHERE nim='$nim_asal'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };
?>