    <?php
include_once('../clases/pdf_calendariosemana.php');
include_once "../clases/cls_calendario.php";
//$result=$equi->consultartransacciones(($_GET['valor']));
$seleccion = new calendario();
 
$datosReporte = $seleccion->reporte1($_GET['valor']);
$datosReporte2 = $seleccion->reporequipo1($_GET['valor']);
$datosReporte3 = $seleccion->reporequipo2($_GET['valor']);
$pdf = new PDFcale();
 
$pdf->AddPage();

$miCabecera = array( 'Fecha','Hora');
$miCabecera2 = array( 'Equipo Uno');
$miCabecera3 = array( 'Equipo Dos');
 
$pdf->tablaHorizontal($miCabecera, $datosReporte);
$pdf->tablaHorizontal2($miCabecera2, $datosReporte2);
$pdf->tablaHorizontal3($miCabecera3, $datosReporte3);
$pdf->Output(); //Salida al navegador
?>