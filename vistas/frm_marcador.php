<html>
    <head>
        <title>
            Menus
        </title>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <script src="../jquery-3.1.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
        <script src="../clases/todasfunciones.js"></script>
	   <title>Menu </title>
    </head>
         <?php   
    include_once("../vistas/menu.php");
    include_once "../clases/cls_calendario.php";
$cale= new calendario();
$result=$cale->consultar_marca($_GET["valor"]);
 ?>
    <body class="container">
      <h1>Marcador </h1>

 <form id="form1" action="../acciones/guardar_marcador.php" method="post">    
<table>
   <tr>
    <th><input type="hidden" id="txt_idcalendario" name="txt_idcalendario" value=" <?php echo $_GET["valor"];?>" required maxlength="30"/></th>
   </tr>
    <tr>
    <th><label for="txt_marca1">Marcador equipo uno</label> </th>
    <th><input type="text" id="txt_marca1" name="txt_marca1" value=" <?php echo $result["Marcadorequi1"];?>" required maxlength="30"/></th>
   </tr>
    <tr>
    <th><label for="txt_marca2">Marcador equipo dos</label> </th>
    <th><input type="text" id="txt_marca2" name="txt_marca2" required value=" <?php echo $result["Marcadorequi2"];?>" maxlength="30"/></th>
   </tr>
    <tr><th><br></th></tr>
   <br>
   <tr><th>
<button id="btn_insertar" type="submit">Insertar</button></th><th>
     <a type="submit"  href='../vistas/frm_calendario.php'>Atras</a></th></tr>
    </table>
       </form>
        </body>
</html>