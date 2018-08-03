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
   include_once("../clases/cls_canchas.php");
    $can= new cancha();
    $row=$can->consultar_dato($_GET['valor']);
    ?>
<form id="form1" action="../acciones/actualizar_cancha.php" method="post">
    <table>
        <tbody>
                <tr>
                    <th></th><th><input type="hidden" id="txt_idcachas" name="txt_idcachas" value="<?php echo $row["idcachas"];?>" maxlength="20" /></th>
                </tr>
                            <tr>
                    <th></th><th><input type="hidden" id="txt_idubicacion" name="txt_idubicacion" value="<?php echo $row["idubicacion"];?>" maxlength="20" /></th>
                </tr>
               <tr>
                    <th><label for="txt_ubicacion">Ubicacion</label> </th>
                    <th><input type="text" id="txt_ubicacion" name="txt_ubicacion" required  maxlength="20" value="<?php echo $row["Ubicacion"];?>" /></th>
                </tr>
                
                <tr>
                    <th><label for="txt_nomcach">Nombre de la cancha</label> </th>     
                    <th><input type="text" id="txt_nomcach" name="txt_nomcach" required  maxlength="20" value="<?php echo $row["nombre_cancha"];?>"/> </th> 
                </tr>
            <tr>
                <th></th>
                <th> <input id="btn_actualizar" type="submit" value="Actualizar"></th>
            </tr>        
      
        </tbody>
    </table>
 </form>
</html>