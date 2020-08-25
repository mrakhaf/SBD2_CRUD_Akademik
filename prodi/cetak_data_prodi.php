<?php
    use Dompdf\Dompdf;

    require 'functions_prodi.php';
    require_once "../dompdf/autoload.inc.php";

    
    $dompdf = new Dompdf();
    $prodi = query("SELECT * FROM prodi");
    $html = '<center><h3>Data Prodi</h3></center><hr/><br/>';
    $html .= '<table border="1" width="100%">
                <tr>
                <th><center>Kode Prodi</center></th>
                <th><center>Nama Prodi</center></th>
                <th><center>Kode Fakultas</center></th>
                </tr>';

    foreach ($prodi as $n){
        $html .= "<tr>
    <td><center>".$n->kode_prodi."</center></td>
    <td><center>".$n->nama_prodi."</center></td>
    <td><center>".$n->kode_fakultas."</center></td>
    </tr>";
    }       
    $html .= "</html>";
    $dompdf->loadHtml($html);
    // Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'potrait');
    // Rendering dari HTML Ke PDF
    $dompdf->render();
    // Melakukan output file Pdf
    $dompdf->stream('data_prodi.pdf');
    ?>
?>