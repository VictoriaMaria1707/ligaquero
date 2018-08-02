<?php
require_once("../clases/cls_calendario.php");
$cale = new calendario();

$cale->insert($_POST['txt_equipo1'],$_POST['txt_equipo2'],$_POST['txt_temporada'],$_POST['txt_canchas'],$_POST['txt_etapas'],$_POST['txt_fecha']);
    if ($cale)
    {
    //    echo $_POST['txt_fecha'];
    header('Location: ../vistas/frm_calendario.php');
        
    }
    else
    {
        echo "error";
    }
?>