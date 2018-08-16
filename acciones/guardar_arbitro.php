<?php
require_once("../clases/cls_arbitro.php");
$arbi = new arbitro();
$row = $arbi->verificarcedula($_POST['txt_cedula']);
if($row['cedula']== $_POST['txt_cedula']){
    echo "El  arbitro ya existe en la base de datos";
        header('Refresh: 1; ../vistas/frm_arbitro.php?modal1');
}else{
$arbi->insert($_POST['txt_cedula'],$_POST['txt_nombre'],$_POST['txt_apellido'],$_POST['txt_direccion'],$_POST['txt_telefono'],$_POST['txt_celular'],$_POST['txt_correo']);
    if ($arbi)
    {
    header('Location: ../vistas/frm_arbitro.php');
        
    }
    else
    {
        echo "error";
    }}
?>