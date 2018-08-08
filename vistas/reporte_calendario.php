<?php
include_once('../clases/PDF.php');
include_once("../clases/cls_calendario.php");
/*$cale= new calendario();
$result=$cale->consultar();*/
 
$seleccion = new calendario();
 
$datosReporte = $seleccion->consultar();
 
$pdf = new PDF();
 
$pdf->AddPage();
 
$miCabecera = array( 'fecha', 'nombreetapa', 'nombreequipo');
 
$pdf->tablaHorizontal($miCabecera, $datosReporte);
 
$pdf->Output(); //Salida al navegador
?>
