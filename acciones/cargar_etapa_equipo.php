<?php
  include_once "../clases/clase_calendario.php";
        $cal= new calendario();
        $result=$cal->consultaridcalendario($_GET["codigo"]); 
        
echo "<select name='txt_etapa' id='txt_etapa' required>";

while($row=mysqli_fetch_assoc($result))
{
    echo "<option value=".$row['idequipo'].">".$row['nombre_equipo']."</option>";
    
}
echo "</select>";

?>