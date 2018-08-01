<?php
//para quitar la notice
include_once "../clases/cls_calendario.php";
$cale= new calendario();
$result=$cale->consultar();
//Estructura de una tabla
 echo "'<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'>";
    echo "<script src='../jquery-3.1.1.min.js'></script>";
     echo "<script src='../bootstrap/js/bootstrap.js'></script>";
echo"<table class='table'>
<thead class='thead-dark'>
        <tr>
            <th>Fecha</th>
            <th>Equipo 1</th>
            <th>Equipo 2</th>
            <th>Temporada</th>
            <th>Cancha</th>
            <th>Arbitro</th>
        </tr></thead>";
        
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["fecha"]."</td>
            <td>".$row["idequipo1"]."</td>
            <td>".$row["idequipo2"]."</td>
            <td>".$row["nombre_temporada"]."</td>
            <td>".$row["nombre_cancha"]."</td>
            <td>".$row["nombre"]."</td>
            <td align='center'><a href='../vistas/editar_calendario.php?valor=".$row["idcachas"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
        </tr>";
}
echo "</table>";
?>