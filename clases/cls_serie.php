<?php
require_once "claseconexion.php";
class serie
{
    
    protected $codigo;
    protected $nombreserie;
    protected $idserie;
    
    public function __construct(){
        $this->codigo="";
        $this->nombreserie="";
        $this->idserie="";
    }
    
    public function consultar()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * from series";
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
}

?>