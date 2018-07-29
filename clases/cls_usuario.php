<?php
require_once "claseconexion.php";
class usuario
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
    
    public function insert($usuario,$clave,$rol)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("Insert into usuarios (usuario,clave,rol) values('%s','%s','%s')",$usuario,$clave,$rol);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    
    public function verificarusuario($usuario)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select usuario from usuarios where usuario ='%s'",$usuario);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
        public function consultar()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select * from usuarios";
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function consultar_dato($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from usuarios where idusuario ='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
     
    public function actualizar($usuario,$clave,$rol,$codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update usuarios set usuario='%s',clave='%s',rol='%s' where idusuario='%s'",$usuario,$clave,$rol,$codigo);
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
