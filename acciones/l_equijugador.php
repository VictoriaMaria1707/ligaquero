<?php
//para quitar la notice
include_once "../clases/cls_equipo.php";
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
            <th>estado</th>
            <th>Modificar</th>
        </tr></thead>";
        
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["nombreequipo"]."</td>
            <td>".$row["nombre1"]." ".$row["apellido1"]."</td>";
            if ($row["estado"]== '1'){
                echo "<td>Activo</td>";
            }else{
                echo "<td>Desactivo</td>";
            }
echo "  <td align='center'><a href='../vistas/editar_jugador.php?valor=".$row["idtransferencia"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
        </tr>";
}
echo "</table>";
?>