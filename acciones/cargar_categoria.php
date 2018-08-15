<?php
  include_once "../clases/clase_categorias.php";
        $cate= new categoria();
        $result=$cate->consultaridserie($_GET["codigo"]); 
        
echo "<select name='txt_categoria' id='txt_categoria' required>";

while($row=mysqli_fetch_assoc($result))
{
    echo "<option value=".$row['idcategorias'].">".$row['nombre_cate']."</option>";
    
}
echo "</select>";

?>