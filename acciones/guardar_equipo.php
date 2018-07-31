<?php
require_once("../clases/cls_equipo.php");
$equi = new equipo();

$equi->insert($_POST['txt_nomequipo'],$_POST['txt_numjuga'],$_POST['txt_nomdue'],$_POST['txt_nomentre'],$_POST['txt_categoria']);
    if ($equi)
    {
    header('Location: ../vistas/frm_equipo.php');
        
    }
    else
    {
        echo "error";
    }
?>