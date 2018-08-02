<?php
//para quitar la notice
include_once "../clases/cls_pitar.php";
$pitar= new pitar();
$result=$pitar->consultar();
//Estructura de una tabla
 echo "'<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'>";
    echo "<script src='../jquery-3.1.1.min.js'></script>";
     echo "<script src='../bootstrap/js/bootstrap.js'></script>";
echo"<table class='table'>
<thead class='thead-dark'>
        <tr>
            <th>Calendario</th>
            <th>Nombre del arbitro</th>
            <th>Modificar</th>
        </tr></thead>";
        
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["idcalendarioss"]."</td>
            <td>".$row["nombre"]."</td>
            <td align='center'><a href='../vistas/editar_pitar.php?valor=".$row["idcalearbi"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
        </tr>";
}
echo "</table>";
?>