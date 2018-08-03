<?php
require_once("../clases/cls_temporada.php");
$tem = new temporada();
$tem->insertequi($_POST['txt_temporada'],$_POST['txt_temporada']);
    if ($tem)
    {
    header("Location: ../vistas/frm_temporadas.php");
        
    }
    else
    {
        echo "error";
    }
?>