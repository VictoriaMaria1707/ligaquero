<?php
require_once("../clases/cls_jugador.php");
$juga = new jugador();
$valor=$_GET['valor'];
$val= $juga->verificarcedulasss($valor);
echo $val;
?>