<?php
require_once("../clases/cls_usuario.php");
$usu = new usuario();

$usu->insert($_POST['txt_usuario'],$_POST['txt_clave'],$_POST['txt_rol']);
    if ($usu)
    {
        header('Location: ../vistas/frm_usuario.php');
        
    }
    else
    {
        echo "error";
    }
?>