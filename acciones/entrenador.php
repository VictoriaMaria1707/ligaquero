<?php
require_once("../clases/cls_equipo.php");
$entre = new equipo();
$valor=$_GET['valor'];
$val= $entre->verifrentrenador($valor);
echo $val;
?>