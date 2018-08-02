<?php
require_once("../clases/cls_pitar.php");
$pit = new pitar();
$pit->actualizar($_POST['txt_arbitro'],$_POST['txt_idcalearbi']);
if ($equi)
    {
        
        header('Location: ../vistas/frm_pitar.php');
        
    }
    else
    {
        echo "error";
    }
?>