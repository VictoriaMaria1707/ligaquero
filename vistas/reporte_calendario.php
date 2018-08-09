
    <?php
include_once('../clases/PDF.php');
include_once("../clases/cls_calendario.php");

 
$seleccion = new calendario();
 
$datosReporte = $seleccion->reporte($_GET['valor']);
 $datosReporte1 = $seleccion->reporte($_GET['valor']);
$datosReporte2 = $seleccion->reporte($_GET['valor']);
$pdf = new PDF();
 
$pdf->AddPage();
$y_axis_initial = 25;


$pdf->headeras();

$miCabecera = array( 'Temporada', 'Serie','Categoria','fecha','Cancha');

$miCabecera1 = array( 'Equipo Uno','Equipo Dos','Marcador Equipo Uno','Marcador Equipo Dos');

$miCabecera2 = array( 'Arbitro');
 
$pdf->tablaHorizontal($miCabecera, $datosReporte);
$pdf->tablaHorizontal1($miCabecera1, $datosReporte1);
$pdf->tablaHorizontal2($miCabecera2, $datosReporte2);
 
$pdf->Output(); //Salida al navegador
?>

