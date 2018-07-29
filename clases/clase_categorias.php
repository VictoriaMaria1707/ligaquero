<?php
require_once "claseconexion.php";
class categoria
{
    
    protected $codigo;
    protected $nombrecate;
    protected $idserie;
    
    public function __construct(){
        $this->codigo="";
        $this->nombrecate="";
        $this->idserie="";
    }
    
    public function consultaridserie($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * from categorias where idserie=".$codigo;
        $result= mysqli_query($conexion,$sentencia);
        //$row=mysqli_fetch_assoc($result);
        return $result;   
    }
        public function combo()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT idserie, nombreserie from series";
        $result= mysqli_query($conexion,$sentencia);
      //  $row=mysqli_fetch_assoc($result);
        return $result;   
    }
    
    
    
}

?>