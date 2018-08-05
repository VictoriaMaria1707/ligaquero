<?php
include_once("../clases/cls_alimentacion.php");
$resi = new alimentacion();
$resi->actualizar($_POST['txt_juga'],$_POST['txt_ami'],$_POST['txt_ali']);
if ($can)
    {
        
        header('Location: ../vistas/frm_alineacion2.php');
        
    }
    else
    {
        echo "error";
    }
?>