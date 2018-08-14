    <?php
include_once('../clases/pdf_temporada.php');
include_once "../clases/cls_temporada.php";
//$result=$equi->consultartransacciones(($_GET['valor']));
$seleccion = new temporada();
$heale = $seleccion ->consultar_dato($_GET['valor']);
//$datosReporte = $seleccion->consultar_datos($_GET['valor']);
//$datosReporte1 = $seleccion->consultartransacciones($_GET['valor']);
//$datosReporte2 = $seleccion->reporequipo1($_GET['valor']);
//$datosReporte3 = $seleccion->reporequipo2($_GET['valor']);
$pdf = new PDFtem();
 
$pdf->AddPage();

$miCabecera = array( 'Nombre del Equipo', 'Propietario','Entrenador','Serie','Categoria');

$miCabecera1 = array( 'Nombres','Apellidos','Edad','Direccion','Correo');

//$miCabecera2 = array( 'Equipo Uno');
//$miCabecera3 = array( 'Equipo Dos');
//$pdf->tablaHorizontal($miCabecera, $datosReporte);
//$pdf->tablaHorizontal1($miCabecera1, $datosReporte1);
//$pdf->tablaHorizontal2($miCabecera2, $datosReporte2);
//$pdf->tablaHorizontal3($miCabecera3, $datosReporte3);
$pdf->Output(); //Salida al navegador
?>
