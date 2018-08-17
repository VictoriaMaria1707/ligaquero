<?php
require_once("../clases/cls_temporada.php");
$tem = new temporada();
$fecha =date ('Y-m-j',strtotime ($_POST['txt_fechaini']." +6 month"));
$tem->actualizar($_POST['txt_nomtem'],$_POST['txt_fechaini'],$fecha,$_POST['txt_idtemporada']);
if ($tem)
    {
        
        header('Location: ../vistas/frm_temporadas.php');
        
    }
    else
    {
        echo "error";
    }
?>