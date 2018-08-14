<?php
        include_once "../clases/cls_calendario.php";
        $cale = new calendario();
        $result=$cale->comboequipo2($_GET["codigo1"]);
        
echo "<select name='txt_equipo2' id='txt_equipo2' required>";

while($row=mysqli_fetch_assoc($result))
{
    echo "<option value=".$row['idequipo'].">".$row['nombreequipo']."</option>";
    
}
echo "</select>";

?>