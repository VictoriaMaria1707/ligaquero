<?php
require_once("../clases/cls_equipo.php");
$equi = new equipo();
$equi->actualizarpas($_POST['txt_idtransferencia'],$_POST['txt_equipo']);
if ($equi)
    {
        
        header('Location: ../vistas/frm_equijugador.php');
        
    }
    else
    {
        echo "error";
    }
?>