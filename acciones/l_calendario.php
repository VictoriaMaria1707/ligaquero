<?php
//para quitar la notice
include_once "../clases/cls_calendario.php";
$cale= new calendario();
$result=$cale->consultar();
$result1=$cale->consultarequipo1();
$result2=$cale->consultarequipo2();
//Estructura de una tabla
 echo "'<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'>";
    echo "<script src='../jquery-3.1.1.min.js'></script>";
     echo "<script src='../bootstrap/js/bootstrap.js'></script>";
echo"<table class='table'>
<thead class='thead-dark'>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Temporada</th>
            <th>Cancha</th>
            <th>Arbitro</th>
            <th>Alineacion Equipo Uno</th>
            <th>Alineacion Equipo Dos</th>";
if(!isset($_SESSION)) 
    { 
        session_start(); 
}
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "  <th>Marcador Final</th>";}else{ 
    }
 }
else
{
     header('Location: ../vistas/login.php');
}
echo "  <th>Reporte</th>";
while($row=mysqli_fetch_assoc($result) ){
echo "<tr>
            <td>".$row["fecha"]."</td>
            <td>".$row["hora"]."</td>
            <td>".$row["nombre_temporada"]."</td>
            <td>".$row["nombre_cancha"]."</td>
            <td align='center'><a href='../vistas/frm_pitar.php?valor=".$row["idcalendario"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
            <td align='center'><a href='../vistas/frm_alineacion1.php?valor=".$row["idcalendario"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
             <td align='center'><a href='../vistas/frm_alineacion2.php?valor=".$row["idcalendario"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>";
    
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "             
            <td align='center'><a href='../vistas/frm_marcador.php?valor=".$row["idcalendario"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>";}else{ 
       
    }
 }
else
{
     header('Location: ../vistas/login.php');
}
 echo "             
    <td align='center'><a target='_blank' href='../vistas/reporte_calendario.php?valor=".$row["idcalendario"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>";

          
}
echo "</table>";
?>
