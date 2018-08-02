<?php
require_once "claseconexion.php";
class pitar
{
    protected $codigo;
    protected $idcalendario;
    protected $idarbitro;
    
    public function __construct(){
        $this->codigo="";
        $this->idcalendario="";
        $this->idarbitro="";
    }
    
    public function insert($idarbitro, $idcalendario)
    {
       $conex= new conexion();
       $conexion= $conex->conectar();
       $sentencia=sprintf("Insert into calearbi (idarbitros, idcalendarioss) values('%s','%s')",$idarbitro, $idcalendario);      
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
     
    public function comboartri()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select * from arbitros";
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }

    
      public function consultar()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * from calearbi inner join arbitros on arbitros.idarbitro = calearbi.idarbitros ";
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function consultar_dato($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from calearbi inner join arbitros on arbitros.idarbitro = calearbi.idarbitros where idcalearbi = '%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
        
     
    public function actualizar($idarbitro, $codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update calearbi set idarbitros='%s' where idcalearbi='%s'",$idarbitro, $codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function eliminar($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("delete from usuarios where idusuario='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    
}

?>