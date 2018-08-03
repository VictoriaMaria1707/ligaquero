<?php
//para quitar la notice
include_once "../clases/cls_equipo.php";
include_once "../vistas/menu.php";
$equi= new equipo();
$result=$equi->consultartransacciones(($_GET['valor']));
//Estructura de una tabla
 echo "'<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'>";
    echo "<script src='../jquery-3.1.1.min.js'></script>";
     echo "<script src='../bootstrap/js/bootstrap.js'></script>";
echo"<table class='table'>
<thead class='thead-dark'>
        <tr>
            <th>Nombre del equipo</th>
            <th>Nombre del jugador</th>
            <th>estado</th>";
if(!isset($_SESSION)) 
    { 
        session_start(); 
}
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "
            <th>pase a otro equipo</th>
        </tr></thead>";
         }else{ 
    }
 }
else
{
     header('Location: ../vistas/login.php');
}           

        
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["nombreequipo"]."</td>
            <td>".$row["nombre1"]." ".$row["apellido1"]."</td>";
            if ($row["estado"]== '1'){
                echo "<td>Activo</td>";
            }else{
                echo "<td>Desactivo</td>";
            }
    if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "
            <td align='center'><a href='../vistas/frm_passes.php?valor=".$row["idtransferencia"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
        </tr>"; }else{ 

    }
 }
else
{
     header('Location: ../vistas/login.php');
}
    
}
echo "</table>";

?>