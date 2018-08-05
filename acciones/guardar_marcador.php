<?php
require_once("../clases/cls_calendario.php");
$cale = new calendario();
$cale->actualizarmarca($_POST['txt_marca1'],$_POST['txt_marca2'],$_POST['txt_idcalendario']);
    if ($cale)
    {
    header("Location: ../vistas/frm_calendario.php");
        
    }
    else
    {
        echo "error";
    }
?>