<html>
    <head>
    
    <script src="../clases/todasfunciones.js"></script>
    </head>
    <?php
/*session_start();
    if (isset($_SESSION['ROL']))
 {
 echo "si: ".$_SESSION['ROL'];
 }
else
{
    echo "nooooooooooooo".$_SESSION['ROL']." - ".$row['usuario'];
       //  header('Location: ../vistas/frm_usuario.php');

}*/
    ?>
<form id="form1" action="../acciones/guardar_categoria.php" method="post">
    <br><br><br>
    <?php 
    include_once "../clases/clase_categorias.php";
        $cate= new categoria();
        $resu=$cate->combo(); 
   //  echo  $resu['nombreserie'];
    ?>
     <label for="txt_serie">Serie</label>     
        <select id="txt_serie" name="txt_serie" required onchange="cargar_categoria(this.value);">
            <option value="">--Seleccione--</option>
        <?php
                while($row1=mysqli_fetch_assoc($resu))
            {
                  
            ?>
        <option value="<?php echo $row1['idserie'];?>"><?php echo $row1['nombreserie'];?></option>
        
        <?php
                }
            ?>
        </select> 
    <br><br>
     <?php 
  
   //  echo  $resu['nombreserie'];
    ?>
    <label for="txt_categoria">Nombre de categoria</label>
       <select id="txt_categoria" name="txt_categoria" required>
            <option value="">--Seleccione--</option>
      
        </select> 
   
    <br><br>
 
   
    

     &ensp;&ensp;&ensp;<button id="btn_insertar" type="submit">Guardar</button>
</form>
    
   
</html>
