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

        $nim = htmlspecialchars($data["nim"]);
        $kode_mk = htmlspecialchars($data["kode_mk"]);
        $nilai = htmlspecialchars($data["nilai"]);

        $query = "INSERT INTO nilai_mahasiswa VALUES
                    ('', '$nim', '$kode_mk', $nilai)";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

    function hapus($id){
        global $conn;

        $query = "DELETE FROM nilai_mahasiswa WHERE id_nilai=$id";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;

        $id_nilai =$data["id_nilai"];
        $nim = htmlspecialchars($data["nim"]);
        $kode_mk = htmlspecialchars($data["kode_mk"]);
        $nilai = htmlspecialchars($data["nilai"]);

        $query = "UPDATE nilai_mahasiswa SET
                    nim = '$nim',
                    kode_mk = '$kode_mk',
                    nilai = $nilai
                  WHERE id_nilai= $id_nilai";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };

?>