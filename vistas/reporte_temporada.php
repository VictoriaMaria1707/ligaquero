    <?php
include_once('../clases/pdf_temporada.php');
include_once "../clases/cls_temporada.php";
//$result=$equi->consultartransacciones(($_GET['valor']));
$seleccion = new temporada();
$datosReporte = $seleccion ->reporte($_GET['valor']);


$pdf = new PDFtem();
 
$pdf->AddPage();

$miCabecera = array( 'Temporada', 'fechas','Arbitro','Cancha','hora');
$pdf->tablaHorizontal($miCabecera, $datosReporte);

$pdf->AddPage();
$datosReporte1 =$seleccion->consultartransacciones($_GET['valor']);
$miCabecera1 = array( 'Nombre equipo','Nonmbres','Apellidos','Edad','Telefono');



$pdf->tablaHorizontal1($miCabecera1, $datosReporte1);
$pdf->Output(); //Salida al navegador
?>
