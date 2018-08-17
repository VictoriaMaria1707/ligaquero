
    <?php
include_once('../clases/pdf_categoria.php');
include_once("../clases/cls_equipo.php");

 $seleccion = new equipo();
 
$datosReporte = $seleccion->reportetemporada();
//$datosReporte1 = $seleccion->consultaridserie($_GET['valor']);
//$datosReporte2 = $seleccion->reporequipo1($_GET['valor']);
//$datosReporte3 = $seleccion->reporequipo2($_GET['valor']);
$pdf = new PDFcate();
 
$pdf->AddPage();

$miCabecera = array( 'Temporada', 'Serie','Categoria','Equipos');

//$miCabecera1 = array( 'Cancha','Arbitro','Marcador Equipo Uno','Marcador Equipo Dos');

//$miCabecera2 = array( 'Equipo Uno');
//$miCabecera3 = array( 'Equipo Dos');
 
$pdf->tablaHorizontal($miCabecera, $datosReporte);
//$pdf->tablaHorizontal1($miCabecera1, $datosReporte1);
//$pdf->tablaHorizontal2($miCabecera2, $datosReporte2);
//$pdf->tablaHorizontal3($miCabecera3, $datosReporte3);
$pdf->Output(); //Salida al navegador
?>

