<?php
    use Dompdf\Dompdf;

    require 'functions_mahasiswa.php';
    require_once "../dompdf/autoload.inc.php";

    
    $dompdf = new Dompdf();
    $mahasiswa = query("SELECT * FROM mahasiswa");
    $html = '<center><h3>Data Mahasiswa</h3></center><hr/><br/>';
    $html .= '<table border="1" width="100%">
                <tr>
                <th><center>NIM</center></th>
                <th><center>Nama</center></th>
                <th><center>Tahun Angkatan</center></th>
                <th><center>Prodi</center></th>
                </tr>';

    foreach ($mahasiswa as $mhs){
        $html .= "<tr>
    <td><center>".$mhs->nim."</center></td>
    <td><center>".$mhs->nama."</center></td>
    <td><center>".$mhs->thn_angkatan."</center></td>
    <td><center>".$mhs->prodi."</center></td>
    </tr>";
    }       
    $html .= "</html>";
    $dompdf->loadHtml($html);
    // Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'potrait');
    // Rendering dari HTML Ke PDF
    $dompdf->render();
    // Melakukan output file Pdf
    $dompdf->stream('data_mahasiswa.pdf');
    ?>
?>