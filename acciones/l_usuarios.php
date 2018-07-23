<?php
//para quitar la notice
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
include_once "../clases/cls_usuario.php";
$usu= new usuario();
$result=$usu->consultar();
//Estructura de una tabla
echo"<table>
        <tr>
            <th>Codigo</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Modificar</th>
             <th>Eliminar</th>
        </tr>";
        
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["cod_usuario"]."</td>
            <td>".$row["Usuario"]."</td>
            <td>".$row["Nombre"]."</td>
            <td align='center'><a href='../vistas/editar_usuario.php?valor=".$row["cod_usuario"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
            <td align='center'><a href='../acciones/eliminar_usuario.php?valor=".$row["cod_usuario"]."'><img src='../img/eliminar.jpg' width='20px' height='20px'></a></td>
        </tr>";
}
echo "</table>";
?>