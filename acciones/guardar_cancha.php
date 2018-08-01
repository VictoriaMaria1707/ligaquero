<?php
require_once("../clases/cls_canchas.php");
$can = new cancha();
$can->insertubi($_POST['txt_nomcach'],$_POST['txt_ubicacion']);
if ($can)
    {
        header("Location: ../vistas/frm_canchas.php");
    }else{
        echo "error";
    }
?>