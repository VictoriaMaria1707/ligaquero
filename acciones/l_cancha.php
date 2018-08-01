<?php
//para quitar la notice
include_once "../clases/cls_canchas.php";
$can= new cancha();
$result=$can->consultar();
//Estructura de una tabla
 echo "'<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'>";
    echo "<script src='../jquery-3.1.1.min.js'></script>";
     echo "<script src='../bootstrap/js/bootstrap.js'></script>";
echo"<table class='table'>
<thead class='thead-dark'>
        <tr>
            <th>Ubicacion</th>
            <th>Nombre</th>
            <th>Modificar</th>
        </tr></thead>";
        
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["Ubicacion"]."</td>
            <td>".$row["nombre_cancha"]."</td>
            <td align='center'><a href='../vistas/editar_cancha.php?valor=".$row["idcachas"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
        </tr>";
}
echo "</table>";
?>