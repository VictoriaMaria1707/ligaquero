<?php
//para quitar la notice
include_once "../clases/cls_arbitro.php";
$arbi= new arbitro();
$result=$arbi->consultar();
//Estructura de una tabla
 echo "'<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'>";
    echo "<script src='../jquery-3.1.1.min.js'></script>";
     echo "<script src='../bootstrap/js/bootstrap.js'></script>";
echo"<table class='table'>
<thead class='thead-dark'>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>Correo</th>";
if(!isset($_SESSION)) 
    { 
        session_start(); 
}
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "            
            <th>Modificar</th>
        </tr></thead>";}else{ 
    }
 }
else
{
     header('Location: ../vistas/login.php');
}         
        
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["nombre"]."</td>
            <td>".$row["apellido"]."</td>
            <td>".$row["cedula"]."</td>
            <td>".$row["direccion"]."</td>
            <td>".$row["telefono"]."</td>
            <td>".$row["celular"]."</td>
            <td>".$row["correo"]."</td>";
    
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "            
            <td align='center'><a href='../vistas/editar_arbitro.php?valor=".$row["idarbitro"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
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