<?php
session_start();

include_once "../clases/checklogin.php";
$log= new login();
$row=$log->verificar($_POST['txt_usuario'],$_POST['txt_clave']);
$_SESSION['ROL']= $row['rol'];
$_SESSION['usuario']= $row['usuario'];
$_SESSION['codigo']= $row['idusuario'];
 if (isset($_SESSION['ROL']))
 {
     header('Location: ../vistas/menu.php');     
 }
else
{
    header('Location: ../vistas/login.php');
}
        ?>