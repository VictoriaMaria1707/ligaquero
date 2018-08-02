<?php
require_once("../clases/cls_pitar.php");
$pit = new pitar();
$pit->insert($_POST['txt_arbitro'],$_POST['txt_idcalen']);
if ($pit)
    {
        
       header('Location: ../vistas/frm_pitar.php');
        
    }
    else
    {
        echo "error";
    }
?>