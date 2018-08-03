<?php
require_once("../clases/cls_temporada.php");
$tem = new temporada();
$tem->actualizar($_POST['txt_nomtem'],$_POST['txt_idtemporada']);
if ($tem)
    {
        
        header('Location: ../vistas/frm_temporadas.php');
        
    }
    else
    {
        echo "error";
    }
?>