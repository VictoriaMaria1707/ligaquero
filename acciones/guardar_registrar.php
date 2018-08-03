<?php
require_once("../clases/cls_usuario.php");
$usu = new usuario();
$row = $usu->verificarusuario($_POST['txt_usuario']);
if($row['usuario']== $_POST['txt_usuario']){
    echo "El nombre de usuario ya esta siendo usado";
        header('Refresh: 2; ../vistas/registrarse.php');
}else{
    $usu->insert($_POST['txt_usuario'],$_POST['txt_clave'],$_POST['txt_rol']);
    if ($usu)
    {
        header('Location: ../vistas/frm_usuario.php');
        
    }
    else
    {
        echo "error";
    }
}

?>