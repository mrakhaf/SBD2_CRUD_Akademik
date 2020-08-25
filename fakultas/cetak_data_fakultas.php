<?php
    use Dompdf\Dompdf;

    require 'functions_fakultas.php';
    require_once "../dompdf/autoload.inc.php";

    
    $dompdf = new Dompdf();
    $fakultas = query("SELECT * FROM fakultas");
    $html = '<center><h3>Data Fakultas</h3></center><hr/><br/>';
    $html .= '<table border="1" width="100%">
                <tr>
                <th><center>Kode Fakultas</center></th>
                <th><center>Nama Fakultas</center></th>
                </tr>';

    foreach ($fakultas as $fk){
        $html .= "<tr>
    <td><center>".$fk->kode_fakultas."</center></td>
    <td><center>".$fk->nama_fakultas."</center></td>
    </tr>";
    }       
    $html .= "</html>";
    $dompdf->loadHtml($html);
    // Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'potrait');
    // Rendering dari HTML Ke PDF
    $dompdf->render();
    // Melakukan output file Pdf
    $dompdf->stream('data_fakultas.pdf');
    ?>
?>