<?php
require_once("../clases/cls_usuario.php");
$usu = new usuario();
$usu->actualizar($_POST['txt_usuario'],$_POST['txt_clave'],$_POST['txt_rol'],$_POST['txt_idusuario']);
session_start();
if($_SESSION['usuario']==$_POST['txt_usuario'] ) {
$row=$usu->consultar_dato($_POST['txt_idusuario']);
$_SESSION['ROL']= $row['rol'];
}else{
    if ($usu)
    {
        
        header('Location: ../vistas/frm_usuario.php');
        
    }
    else
    {
        echo "error";
    }}
?>