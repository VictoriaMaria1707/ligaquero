<?php
require_once("../clases/cls_calendario.php");
$juga = new calendario();
$fecha=$_GET['fecha'];
$hora=$_GET['hora'];
$val= $juga->verihor($fecha,$hora);
echo $val;
?>