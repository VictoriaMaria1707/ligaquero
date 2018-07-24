<?php
session_start();

include_once "../clases/checklogin.php";
$log= new login();
$row=$log->verificar($_POST['txt_usuario'],$_POST['txt_clave']);




$_SESSION['ROL']= $row['rol'];
 if (isset($_SESSION['ROL']))
 {
 echo "si: ".$_SESSION['ROL'];
 }
else
{
    echo "nooooooooooooo".$_SESSION['ROL']." - ".$row['usuario'];
       //  header('Location: ../vistas/frm_usuario.php');

}
        ?>