<?php
require_once("../clases/cls_temporada.php");
$tem = new temporada();
$tem->insert($_POST['txt_temporada'],$_POST['txt_fechaini'],$_POST['txt_fechafin']);
    if ($tem)
    {
    header("Location: ../vistas/frm_temporadas.php");
        
    }
    else
    {
        echo "error"; 
    }
?>