<?php
require_once("../clases/cls_jugador.php");
$juga = new jugador();

$juga->insert($_POST['txt_cedula'],$_POST['txt_nombre1'],$_POST['txt_nombre2'],$_POST['txt_apellido1'],$_POST['txt_apellido2'],$_POST['txt_direccion'],$_POST['txt_lugarnaci'],$_POST['txt_parentesto'],$_POST['txt_lugarnacipari'],$_POST['txt_telefono'],$_POST['txt_celular'],$_POST['txt_correo'],$_POST['txt_genero']);
    if ($juga)
    {
    header('Location: ../vistas/frm_jugador.php');
        
    }
    else
    {
        echo "error";
    }
?>