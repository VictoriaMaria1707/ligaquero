<?php
require_once("../clases/cls_equipo.php");
$equi = new equipo();
$equi->actualizarpas($_POST['txt_equipo'],$_POST['txt_idtransferencia']);
if ($equi)
    {
        
        header('Location: ../vistas/frm_equijugador.php?valor='.urlencode($_POST['txt_equipo']).'&categoria='.urlencode($_POST['txt_idtransferencia']));
        
    }
    else
    {
        echo "error";
    }
?> 