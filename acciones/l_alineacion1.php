<?php
//para quitar la notice
include_once("../clases/cls_alimentacion.php");
$resi = new alimentacion();
$result=$resi->consultar1();
//Estructura de una tabla
 echo"<table class='table'>
<thead class='thead-dark'>
        <tr>
            <th>Jugador</th>
            <th>Numero de camiseta</th>
            <th>fecha</th>";
if(!isset($_SESSION)) 
    { 
        session_start(); 
}
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "<th>Modificar</th>
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
            <td>".$row["nombre1"]."</td>
            <td>".$row["numerocamiseta"]."</td>
            <td>".$row["fecha"]."</td>";
    
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "
            <td align='center'><a href='../vistas/editar_alineacion1.php?valor=".$row["idalineacion"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
        </tr>";}else{ 
       
    }
 }
else
{
     header('Location: ../vistas/login.php');
}
}
echo "</table>";
?>