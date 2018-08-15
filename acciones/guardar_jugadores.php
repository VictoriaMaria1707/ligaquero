<?php
require_once("../clases/cls_jugador.php");
$juga = new jugador();
$row = $juga->verificarcedula($_POST['txt_cedula']);
if($row['cedula']== $_POST['txt_cedula']){
    echo "El  jugador ya existe en la base de datos";
        header('Refresh: 2; ../vistas/frm_jugador.php');
}else{
$juga->insert($_POST['txt_cedula'],$_POST['txt_nombre1'],$_POST['txt_nombre2'],$_POST['txt_apellido1'],$_POST['txt_apellido2'],$_POST['txt_direccion'],$_POST['txt_lugarnaci'],$_POST['txt_parentesto'],$_POST['txt_lugarnacipari'],$_POST['txt_telefono'],$_POST['txt_celular'],$_POST['txt_correo'],$_POST['txt_genero'],$_POST['txt_edad']);
    if ($juga)
    {
    header('Location: ../vistas/frm_jugador.php');
        
    }
    else
    {
        echo "error";
    }}
?>