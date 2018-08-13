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
 ?>
    <body>
      <?php 
        include_once "../clases/cls_equipo.php";
        $equi= new equipo();
        $ider=$equi->consultar_dato($_GET['valor']);
        $resu=$equi->comboequipo();
 
    ?>
      <h1>Equipo <?php echo $ider['nombreequipo'];?></h1>
        
        <div id="lista">
 
</div>
<?php
        if(!isset($_SESSION)) 
    { 
        session_start(); 
}
if (isset($_SESSION['ROL']))
 {
    if ($_SESSION['ROL'] == 'secretaria'){
        ?>          

        <form id="form1" action="../acciones/actualizar_equijugador.php" method="post">    
<table>
    <tbody>
        <tr>
            <th></th><th><input type="hidden" id="txt_idtransferencia" name="txt_idtransferencia" value="<?php echo $_GET['valor'];?>" /></th>
        </tr>
        
    <tr><th> <label for="txt_equipo">Equipo</label> </th>    
        <th><select id="txt_equipo" name="txt_equipo" required>
            <option value="">--Seleccione--</option>
        <?php
            
                while($row=mysqli_fetch_assoc($resu))
            {
                    if($row["idequipo"]== $_GET["idequipo"])
                        {
                        
                            
                        }else{?>
                    
                  
            
        <option value="<?php echo $row['idequipo'];?>"><?php echo $row['nombreequipo'];?></option>
        
        <?php
                }}
            ?>
            
        </select> </th></tr>

    </tbody>
</table>
      
 <button id="btn_insertar" type="submit">Insertar</button>        
       
          </form>
         
<?php
        }else{ 
    } }
else
{
     header('Location: ../vistas/login.php');
} 
        ?>        
    </body>
</html>