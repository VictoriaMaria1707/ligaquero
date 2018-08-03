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
   include_once("../clases/cls_temporada.php");
    $tem = new temporada();
    $row=$tem->consultar_dato($_GET['valor']);
    ?>
<form id="form1" action="../acciones/actualizar_temporada.php" method="post">
    <table>
        <tbody>
                <tr>
                    <th></th><th><input type="hidden" id="txt_idtemporada" name="txt_idtemporada" value="<?php echo $row["idtemporada"];?>" /></th>
                </tr>
                <tr>
                    <th><label for="txt_nomtem">Nombre de Temporada</label> </th>
                    <th><input type="text" id="txt_nomtem" name="txt_nomtem" required value="<?php echo $row["nombre_temporada"];?>" /></th>
                </tr>

                
            <tr>
                <th></th>
                <th> <input id="btn_actualizar" type="submit" value="Actualizar"></th>
            </tr>        
      
        </tbody>
    </table>
 </form>
</html>
