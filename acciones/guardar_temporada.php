<?php
require_once("../clases/cls_temporada.php");
$tem = new temporada();
$fecha =date ('Y-m-j',strtotime ($_POST['txt_fechaini']." +6 month"));

$tem->insert($_POST['txt_temporada'],$_POST['txt_fechaini'],$fecha);
    if ($tem)
    {
    header("Location: ../vistas/frm_temporadas.php");
        
    }
    else
    {
        echo "error"; 
    }
?>