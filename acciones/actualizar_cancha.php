<?php
require_once("../clases/cls_canchas.php");
$can = new cancha();
$can->actualizar($_POST['txt_nomcach'],$_POST['txt_ubicacion'],$_POST['txt_idcachas'],$_POST['txt_idubicacion']);
if ($can)
    {
        
        header('Location: ../vistas/frm_canchas.php');
        
    }
    else
    {
        echo "error";
    }
?>