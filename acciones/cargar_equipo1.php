<?php
  include_once "../clases/cls_calendario.php";
        $cal= new calendario();
        $result=$cal->consultarequipo1($_GET["codigo"]); 
        
echo "<select name='txt_equipo1' id='txt_equipo1' required>";

while($row=mysqli_fetch_assoc($result))
{
    echo "<option value=".$row['idequipo1'].">".$row['nombreequipo']."</option>";
    
}
echo "</select>";

?>