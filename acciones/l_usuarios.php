<?php
//para quitar la notice
include_once "../clases/cls_usuario.php";
$usu= new usuario();
$result=$usu->consultar();
//Estructura de una tabla
 echo "'<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'>";
    echo "<script src='../jquery-3.1.1.min.js'></script>";
     echo "<script src='../bootstrap/js/bootstrap.js'></script>";
echo"<table class='table'>
<thead class='thead-dark'>
        <tr>
            <th>usuario</th>
            <th>Rol</th>
            <th>Modificar</th>
             <th>Eliminar</th>
        </tr></thead>";
        
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["usuario"]."</td>
            <td>".$row["rol"]."</td>
            <td align='center'><a href='../vistas/editar_usuario.php?valor=".$row["idusuario"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
            <td align='center'><a href='../acciones/eliminar_usuario.php?valor=".$row["idusuario"]."'><img src='../img/eliminar.jpg' width='20px' height='20px'></a></td>
        </tr>";
}
echo "</table>";
?>