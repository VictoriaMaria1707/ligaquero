<html>
<head>
        <title>
            Login
        </title>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <script src="../jquery-3.1.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
	   <title>Login </title>
    </head>
<body class="container " >.
	<h1 class="blockquote text-center">Login de Usuarios</h1>

<form action="../acciones/secionrol.php" method="post" >
<table style="height: 200px;" >
    <tbody >
    <tr >
        <th ><label for="txt_usuario">Usuarios</label></th> 
        <th ><input type="text" id="txt_usuario" name="txt_usuario" required/></th>
        
    </tr>
        
    <tr >
        <th ><label for="txt_clave">Clave</label></th>
        <th ><input type="password" id="txt_clave" name="txt_clave" required/></th>
    </tr>
    <tr >
        <th ><input class="btn btn-link" type="submit" name="Submit" value="Login"></th>
        <th ><a class="btn btn-link" href="../vistas/registrarse.php">Registrarse</a></th>
    </tr>
    </tbody>
</table>
</form>
</body>
    
</html>