<?php
require_once("../clases/cls_arbitro.php");
$arbi = new arbitro();
$arbi->actualizar($_POST['txt_cedula'],$_POST['txt_nombre'],$_POST['txt_apellido'],$_POST['txt_direccion'],$_POST['txt_telefono'],$_POST['txt_celular'],$_POST['txt_correo'],$_POST['txt_idarbitro']);
if ($arbi)
    {
        
        header('Location: ../vistas/frm_arbitro.php');
        
    }
    else
    {
        echo "error";
    }
?>