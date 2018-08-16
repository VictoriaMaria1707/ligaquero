
    <?php
include_once('../clases/PDF.php');
include_once("../clases/cls_temporada.php");

 
$seleccion = new temporada();
 
$datosReporte = $seleccion->reporte($_GET['valor']);
//$datosReporte1 = $seleccion->reporte($_GET['valor']);
//$datosReporte2 = $seleccion->reporequipo1($_GET['valor']);
//$datosReporte3 = $seleccion->reporequipo2($_GET['valor']);
$pdf = new PDF();
 
$pdf->AddPage();

$miCabecera = array( 'Temporada', 'Serie','Categoria');

//$miCabecera1 = array( 'Cancha','Arbitro','Marcador Equipo Uno','Marcador Equipo Dos');

//$miCabecera2 = array( 'Equipo Uno');
//$miCabecera3 = array( 'Equipo Dos');
 
$pdf->tablaHorizontal($miCabecera, $datosReporte);
//$pdf->tablaHorizontal1($miCabecera1, $datosReporte1);
//$pdf->tablaHorizontal2($miCabecera2, $datosReporte2);
//$pdf->tablaHorizontal3($miCabecera3, $datosReporte3);
$pdf->Output(); //Salida al navegador
?>

