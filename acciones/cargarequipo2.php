<?php
  include_once "../clases/cls_calendario.php";
        $cal= new calendario();
        $result=$cal->consultarequipo2($_GET["codigo"]); 
        
echo "<select name='txt_equipo2' id='txt_equipo2' required>";

while($row=mysqli_fetch_assoc($result))
{
    echo "<option value=".$row['idequipo2'].">".$row['nombreequipo']."</option>";
    
}
echo "</select>";

?>