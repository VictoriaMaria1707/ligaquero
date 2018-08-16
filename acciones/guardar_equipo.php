<?php
require_once("../clases/cls_equipo.php");
$equi = new equipo();
//if ($_POST['txt_numjuga'] >15 || $_POST['txt_numjuga'] < 12 ){
    
  //  echo "El equipo solo puede tener hasta 15 jugadores y no menos de 12";
    // header('Refresh: 2; ../vistas/frm_equipo.php');
//}else{
$equi->insert($_POST['txt_nomequipo'],$_POST['txt_numjuga'],$_POST['txt_nomdue'],$_POST['txt_nomentre'],$_POST['txt_categoria']);
    if ($equi)
    {
    header('Location: ../vistas/frm_equipo.php');
        
    }
    else
    {
        echo "error";
    }
//}
?>