<html>
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
    
    <label for="txt_categoria">Nombre de categoria</label>
    <input type="text" id="txt_categoria" name="txt_categoria" required/>
    <br><br>
 
        <label for="txt_serie">Nombre de la serie</label>
    <input type="text" id="txt_serie" name="txt_serie" required/>
    <br><br>
    
<br><br>
     &ensp;&ensp;&ensp;<button id="btn_insertar" type="submit">Guardar</button>
</form>
    
   
</html>
