<?php
require_once("../clases/cls_usuario.php");
$usu = new usuario();

$row=$usu->consultar_dato($_GET['valor']);
if($row["rol"]== 'secretaria'){
    echo "no se puede eliminar este usuario";
    header('Refresh: 2; ../vistas/frm_usuario.php');
    
}else{
    $usu->eliminar($_GET['valor']);
    if ($usu)
    {
        header('Location: ../vistas/frm_usuario.php');
        
    }
    else
    {
        echo "error";
    }}
?>