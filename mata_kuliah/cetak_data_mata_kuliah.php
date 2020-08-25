<?php
    use Dompdf\Dompdf;

    require 'functions_mata_kuliah.php';
    require_once "../dompdf/autoload.inc.php";

    
    $dompdf = new Dompdf();
    $matkul = query("SELECT * FROM mata_kuliah");
    $html = '<center><h3>Data Mata Kuliah</h3></center><hr/><br/>';
    $html .= '<table border="1" width="100%">
                <tr>
                <th><center>Kode Mata Kuliah</center></th>
                <th><center>Nama Mata Kuliah</center></th>
                <th><center>Kode Pengajar</center></th>
                </tr>';

    foreach ($matkul as $mk){
        $html .= "<tr>
    <td><center>".$mk->kode_mk."</center></td>
    <td><center>".$mk->nama_mk."</center></td>
    <td><center>".$mk->pengajar."</center></td>
    </tr>";
    }       
    $html .= "</html>";
    $dompdf->loadHtml($html);
    // Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'potrait');
    // Rendering dari HTML Ke PDF
    $dompdf->render();
    // Melakukan output file Pdf
    $dompdf->stream('data_mata_kuliah.pdf');
    ?>
?>