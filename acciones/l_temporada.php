<?php
//para quitar la notice
include_once("../clases/cls_temporada.php");
$resi = new temporada();
$result=$resi->consultar();
//Estructura de una tabla
 echo "'<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'>";
    echo "<script src='../jquery-3.1.1.min.js'></script>";
     echo "<script src='../bootstrap/js/bootstrap.js'></script>";
echo"<table class='table'>
<thead class='thead-dark'>
        <tr>
            <th>Temporada</th>";
if(!isset($_SESSION)) 
    { 
        session_start(); 
}
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "<th>Modificar</th>";
        }else{ 
        
    }
 }
else
{
     header('Location: ../vistas/login.php');
} 
echo "<th>Reporte</th>
        </tr></thead>";
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["nombre_temporada"]."</td>";
    
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "
            <td align='center'><a href='../vistas/editar_temporada.php?valor=".$row["idtemporada"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>";}else{ 
       
    }
 }
else
{
     header('Location: ../vistas/login.php');
}
    echo "
            <td align='center'><a target='_blank' href='../vistas/reporte_temporada.php?valor=".$row["idtemporada"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
        </tr>";
}
echo "</table>";
?>