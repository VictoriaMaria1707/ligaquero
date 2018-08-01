<?php
require_once "claseconexion.php";
class arbitro
{
    
    protected $codigo;
    protected $cedula;
    protected $nombre;
    protected $apellido;
    protected $direccion;
    protected $telefono;
    protected $celular;
    protected $correo;

    public function __construct(){
        $this->codigo="";
        $this->cedula="";
        $this->nombre="";
        $this->apellido="";
        $this->direccion="";
        $this->telefono="";
        $this->celular="";
        $this->correo="";
    }
    
    public function insert($cedula, $nombre, $apellido, $direccion, $telefono, $celular, $correo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("Insert into arbitros (cedula, nombre, apellido, direccion, telefono, celular, correo) values('%s','%s','%s','%s','%s','%s','%s')",$cedula, $nombre, $apellido, $direccion, $telefono, $celular, $correo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    
      public function consultar()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select * from arbitros";
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function consultar_dato($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from arbitros where idarbitro ='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
     
    public function actualizar($cedula, $nombre, $apellido, $direccion, $telefono, $celular, $correo, $codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update arbitros set cedula='%s', nombre='%s', apellido='%s', direccion='%s', telefono='%s', celular='%s', correo='%s' where idarbitro='%s'",$cedula, $nombre, $apellido, $direccion, $telefono, $celular, $correo, $codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function eliminar($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("delete from arbitros where idusuario='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    
}

?>