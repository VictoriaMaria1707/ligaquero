<?php
require_once "claseconexion.php";
class login
{
    
    protected $codigo;
    protected $rol;
    protected $usuario;
    protected $clave;
    
    public function __construct(){
        $this->codigo="";
        $this->rol="";
        $this->usuario="";
        $this->clave="";
    }
    
    public function verificar($usuario,$clave)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("SELECT rol,usuario from usuarios where usuario='%s' and clave='%s'",$usuario,$clave);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
}

?>

