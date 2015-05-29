<?php 
tcpdf();
$obj_pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', true);
//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
//$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 7);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();

ob_start();
//echo $this->load->view("page/header_report",null,true); 
?>
<html>
    <body>
        <p><strong>PT. Spinmill Indah Industry</strong></p>
        <p><strong>Periode : <?php echo $periode; ?></strong></p>
        <?php echo $tabel; ?>                
    </body>
</html>
<?php 
//echo $this->load->view("page/footer_report",array('appJs'=>'appReportTimbangan'),true); 

$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, 0, true, 0);
$obj_pdf->Output('Laporan Absen Komulatif '.$periode.'.pdf', 'I');
?>