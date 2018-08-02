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
            <th>Equipo 1</th>
            <th>Equipo 2</th>
            <th>Temporada</th>
            <th>Cancha</th>
            <th>Arbitro</th>
            <th>Faltas</th>
            <th>Alineacion Equipo Uno</th>
            <th>Alineacion Equipo Dos</th>
            <th>Modificar</th>
        </tr></thead>";
        
while($row=mysqli_fetch_assoc($result) ){
echo "<tr>
            <td>".$row["fecha"]."</td>";
            while($row1=mysqli_fetch_assoc($result1) ){
           echo " <td>".$row1["nombreequipo"]."</td>";
            }
            while($row2=mysqli_fetch_assoc($result2) ){
            echo "<td>".$row2["nombreequipo"]."</td>";
            }
            echo "<td>".$row["nombre_temporada"]."</td>
            <td>".$row["nombre_cancha"]."</td>
            <td align='center'><a href='../vistas/frm_pitar.php?valor=".$row["idcalendario"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
            <td align='center'><a href='../vistas/frm_faltas.php?valor=".$row["idcalendario"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
            <td align='center'><a href='../vistas/frm_alineacion1.php?equipo1=".$row["idequipo1"]."&valor=".$row["idcalendario"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
             <td align='center'><a href='../vistas/frm_alineacion2.php?equipo2=".$row["idequipo2"]."&valor=".$row["idcalendario"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
            <td align='center'><a href='../vistas/editar_calendario.php?valor=".$row["idcachas"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
        </tr>";
}
echo "</table>";
?>