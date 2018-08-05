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
            <th>Marcador equipo uno</th>
            <th>Marcador equipo dos</th>";

while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["fecha"]."</td>
            <td>".$row["Marcadorequi1"]."</td>
            <td>".$row["Marcadorequi2"]."</td>";
}
echo "</table>";
?>