<?php
require_once "claseconexion.php";
class cancha
{
    
    protected $idubicacion;
    protected $Ubicacion;
    protected $idcanchas;
    protected $nombrecancha;
    
    public function __construct(){
        $this->idubicacion="";
        $this->Ubicacion="";
        $this->idcanchas="";
        $this->nombrecancha="";
    }
    
    public function insertubi($nombrecancha,$Ubicacion)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from ubicaciones where Ubicacion='%s'",$Ubicacion);
        $result3= mysqli_query($conexion,$sentencia);
        $row2=mysqli_fetch_assoc($result3);
        
        if ($row2['idubicacion']== 0){
            $sentencia=sprintf("Insert into ubicaciones (Ubicacion) values('%s')",$Ubicacion);
            $result1= mysqli_query($conexion,$sentencia);
            
            $sentencia=sprintf("select idubicacion from ubicaciones where Ubicacion = '%s'",$Ubicacion);
            $result2= mysqli_query($conexion,$sentencia);
            $row=mysqli_fetch_assoc($result2);
        
            $sentencia=sprintf("Insert into canchas (nombre_cancha,idubicacions) values('%s','%s')",$nombrecancha,$row['idubicacion']);
            $result= mysqli_query($conexion,$sentencia);
            
        }else{
            
            $sentencia=sprintf("select idubicacion from ubicaciones where Ubicacion = '%s'",$Ubicacion);
            $result2= mysqli_query($conexion,$sentencia);
            $row=mysqli_fetch_assoc($result2);

            $sentencia=sprintf("Insert into canchas (nombre_cancha,idubicacions) values('%s','%s')",$nombrecancha,$row['idubicacion']);
            $result= mysqli_query($conexion,$sentencia);
        }
        
        return $result;   
    }
    
        
      public function consultar()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="SELECT * FROM canchas INNER JOIN ubicaciones on canchas.idubicacions = ubicaciones.idubicacion";
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function consultar_dato($idcanchas)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("SELECT * FROM canchas INNER JOIN ubicaciones on canchas.idubicacions = ubicaciones.idubicacion where idcachas ='%s'",$idcanchas);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
     
    public function actualizar($nombrecancha, $Ubicacion, $idcanchas, $idubicacion)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update canchas set nombre_cancha='%s' where idcachas='%s'", $nombrecancha, $idcanchas);
        $result1= mysqli_query($conexion,$sentencia);
               
        $sentencia=sprintf("update ubicaciones set Ubicacion='%s' where idubicacion='%s'",$Ubicacion, $idubicacion);
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
