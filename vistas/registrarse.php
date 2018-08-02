<html>
    <head>
        <title>
            Registro de Usuario
        </title>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <script src="../jquery-3.1.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
	   <title >Registro de Usuario </title>
    </head>
    <body class="container">
        <h1 class="blockquote text-center">Registro de Usuario</h1>
<form id="form1" action="../acciones/guardar_usuario.php" method="post">    
<table style="height: 200px;">
    <tbody>

        <tr>
            <th><label for="txt_usuario">Usuario</label> </th>     
            <th><input type="text" id="txt_usuario" name="txt_usuario" required  maxlength="20" /> </th> 
        </tr>
        <tr>
            <th><label for="txt_clave">Clave</label> </th>     
            <th><input type="password" id="txt_clave" name="txt_clave" required  maxlength="20" /> </th> 
        </tr>
        <tr>
            <th> </th>     
            <th><input type="hidden" id="txt_rol" name="txt_rol" required  value="usuario" /> </th> 
        </tr>
        <tr>
            <th><button class="btn btn-link" id="btn_insertar" type="submit">Insertar</button></th>
            <th><a class="btn btn-link" href="../vistas/login.php">Cerrar</a></th>
        </tr>
    </tbody>
</table>
</form>
    </body>
</html>