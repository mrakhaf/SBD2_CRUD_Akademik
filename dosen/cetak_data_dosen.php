<?php
    use Dompdf\Dompdf;

    require 'functions_dosen.php';
    require_once "../dompdf/autoload.inc.php";

    
    $dompdf = new Dompdf();
    $dosen = query("SELECT * FROM dosen");
    $html = '<center><h3>Data Dosen</h3></center><hr/><br/>';
    $html .= '<table border="1" width="100%">
                <tr>
                <th><center>NIP</center></th>
                <th><center>Nama Dosen</center></th>
                </tr>';

    foreach ($dosen as $d){
        $html .= "<tr>
    <td><center>".$d->nip."</center></td>
    <td><center>".$d->nama_dosen."</center></td>
    </tr>";
    }       
    $html .= "</html>";
    $dompdf->loadHtml($html);
    // Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'potrait');
    // Rendering dari HTML Ke PDF
    $dompdf->render();
    // Melakukan output file Pdf
    $dompdf->stream('data_dosen.pdf');
    ?>
?>