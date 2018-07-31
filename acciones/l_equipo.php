<?php
//para quitar la notice
include_once "../clases/cls_equipo.php";
$equi= new equipo();
$result=$equi->consultar();
//Estructura de una tabla
 echo "'<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'>";
    echo "<script src='../jquery-3.1.1.min.js'></script>";
     echo "<script src='../bootstrap/js/bootstrap.js'></script>";
echo"<table class='table'>
<thead class='thead-dark'>
        <tr>
            <th>Nombre del equipo</th>
            <th>Numero de jugadores</th>
            <th>Nombre del dueño</th>
            <th>Nombre del entrenador</th>
            <th>categoria</th>
            <th>Ingresar jugadores</th>
            <th>Modificar</th>
        </tr></thead>";
        
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["nombreequipo"]."</td>
            <td>".$row["Numjugadores"]."</td>
            <td>".$row["nombredueno"]."</td>
            <td>".$row["nombreentrenador"]."</td>
            <td>".$row["nombre_cate"]."</td>
            <td align='center'><a href='../vistas/frm_equijugador.php?valor=".$row["idequipo"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
            <td align='center'><a href='../vistas/editar_equipo.php?valor=".$row["idequipo"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
        </tr>";
}
echo "</table>";
?>