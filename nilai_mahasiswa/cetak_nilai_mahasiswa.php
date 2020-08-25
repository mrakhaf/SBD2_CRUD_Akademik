<?php
    use Dompdf\Dompdf;

    require 'functions_nilai_mahasiswa.php';
    require_once "../dompdf/autoload.inc.php";

    
    $dompdf = new Dompdf();
    $nilai = query("SELECT * FROM nilai_mahasiswa");
    $html = '<center><h3>Data Nilai Mahasiswa</h3></center><hr/><br/>';
    $html .= '<table border="1" width="100%">
                <tr>
                <th><center>NIM</center></th>
                <th><center>Kode Mata Kuliah</center></th>
                <th><center>Nilai</center></th>
                </tr>';

    foreach ($nilai as $n){
        $html .= "<tr>
    <td><center>".$n->nim."</center></td>
    <td><center>".$n->kode_mk."</center></td>
    <td><center>".$n->nilai."</center></td>
    </tr>";
    }       
    $html .= "</html>";
    $dompdf->loadHtml($html);
    // Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'potrait');
    // Rendering dari HTML Ke PDF
    $dompdf->render();
    // Melakukan output file Pdf
    $dompdf->stream('data_nilai_mahasiswa.pdf');
    ?>
?>