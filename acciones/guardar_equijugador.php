<?php
require_once("../clases/cls_equipo.php");
$equi = new equipo();
$equi->estadojuga($_POST['txt_jugador']);
$equi->insertequi($_POST['txt_jugador'],$_POST['txt_equipi']);
    if ($equi)
    {
    header("Location: ../vistas/frm_equijugador.php?valor=".urlencode($_POST['txt_equipi']));
        
    }
    else
    {
        echo "error";
    }
?>