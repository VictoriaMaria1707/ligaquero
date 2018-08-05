<html>
    <head>
        <title>
            Menus
        </title>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <script src="../jquery-3.1.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
	   <title>Menu </title>
    </head>
       <?php   
    include_once("../vistas/menu.php");
    include_once("../clases/cls_alimentacion.php");
    $resi = new alimentacion();
    $row=$resi->consultar_ali($_GET['valor']);
    ?>
<form id="form1" action="../acciones/actualizar_alineacion2.php" method="post">
    <table>
        <tbody>
                <tr>
                    <th></th><th><input type="hidden" id="txt_ali" name="txt_ali" value="<?php echo $row["idalineacion"];?>" /></th>
                </tr>
                  <tr>
         <th><label for="txt_juga">Jugadores</label></th> 
            <th> <select id="txt_juga" name="txt_juga" required>
         <option value="<?php echo $row['idjugador'];?>"><?php echo $row['nombre1'];?></option>
            <?php
            $result=$resi->combojugador1();
            while($row1=mysqli_fetch_assoc($result)){ ?>
            <option value="<?php echo $row1['idjugador'];?>"><?php echo $row1['nombre1'];?></option>
            <?php }?>  
            </select></th>
        </tr>
        <tr><th>Numero de camiseta</th>
            <th><input type="text" id="txt_ami" name="txt_ami" required  maxlength="20" value="<?php echo $row['numerocamiseta'] ;?>" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="validaNumericos(this.value);"/></th>
        </tr>    
             <tr>
                <th></th>
                <th> <input id="btn_actualizar" type="submit" value="Actualizar"></th>
            </tr> 
        </tbody>
    </table>
    
 </form>
</html>