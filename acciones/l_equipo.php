<?php

include_once "../clases/cls_equipo.php";
$equi= new equipo();
$result=$equi->consultar();
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
            <th>categoria</th>";
if(!isset($_SESSION)) 
    { 
        session_start(); 
}
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "<th>Ingresar jugadores</th>
            <th>Modificar equipo</th>
        </tr></thead>";
    }else{ 
        echo "<th>Ver jugadores</th>
        </tr></thead>";
    }
 }
else
{
     header('Location: ../vistas/login.php');
}           
            
        
while($row=mysqli_fetch_assoc($result)){
echo "<tr>
            <td>".$row["nombreequipo"]."</td>
            <td>".$row["Numjugadores"]."</td>
            <td>".$row["nombredueno"]."</td>
            <td>".$row["nombreentrenador"]."</td>
            <td>".$row["nombre_cate"]."</td>";
    
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        echo "<td align='center'><a href='../vistas/frm_equijugador.php?valor=".$row["idequipo"]."&categoria=".$row["nombre_cate"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
            <td align='center'><a href='../vistas/editar_equipo.php?valor=".$row["idequipo"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>
        </tr>";
    }else{ 
        echo "<td align='center'><a href='../acciones/l_equijugador.php?valor=".$row["idequipo"]."'><img src='../img/editar.png' width='20px' height='20px'></a></td>";
    }
 }
else
{
     header('Location: ../vistas/login.php');
}
          
}
echo "</table>";
?>