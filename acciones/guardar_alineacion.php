<?php
include_once("../clases/cls_alimentacion.php");
$resi = new alimentacion();
$resi->insert($_POST['txt_juga'],$_POST['txt_calen'],$_POST['txt_numcami']);
if ($resi)
    {
        
     header('Location: ../vistas/frm_calendario.php');
        
    }
    else
    {
        echo "error";
    }
?>