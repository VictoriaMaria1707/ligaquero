    <?php
include_once('../clases/pdf_jugador.php');
include_once "../clases/cls_equipo.php";
//$result=$equi->consultartransacciones(($_GET['valor']));
$seleccion = new equipo();
 
$datosReporte = $seleccion->consultar_datos($_GET['valor']);
$datosReporte1 = $seleccion->consultartransacciones($_GET['valor']);
$pdf = new PDFjuga();
 
$pdf->AddPage();

$miCabecera = array( 'Nombre del Equipo', 'Propietario','Entrenador','Serie','Categoria');

$miCabecera1 = array( 'Nombres','Apellidos','Edad','Direccion','Correo');


 
$pdf->tablaHorizontal($miCabecera, $datosReporte);
$pdf->tablaHorizontal1($miCabecera1, $datosReporte1);
$pdf->Output(); //Salida al navegador
?>
