<?php
require_once "claseconexion.php";
class jugador
{
    
    protected $codigo;
    protected $cedula;
    protected $nombre1;
    protected $nombre2;
    protected $apellido1;
    protected $apellido2;
    protected $direccion;
    protected $lugarnacimi;
    protected $parentesto;
    protected $lugarnaciparen;
    protected $telefono;
    protected $celular;
    protected $correo;
    protected $idgenero;
    protected $genero;
    
    public function __construct(){
        $this->codigo="";
        $this->cedula="";
        $this->nombre1="";
        $this->nombre2="";
        $this->apellido1="";
        $this->apellido2="";
        $this->direccion="";
        $this->lugarnacimi="";
        $this->parentesto="";
        $this->lugarnaciparen="";
        $this->telefono="";
        $this->celular="";
        $this->correo="";
        $this->idgenero="";
        $this->genero="";
    }
    
    public function insert($cedula, $nombre1, $nombre2, $apellido1, $apellido2, $direccion, $lugarnacimi, $parentesto, $lugarnaciparen, $telefono, $celular, $correo, $idgenero)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("Insert into jugadores (cedula, nombre1, nombre2, apellido1, apellido2, direccion, lugarnacimi, parentesto, lugarnaciparen, telefono, celular, correo, idgenero,esta) values('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','1')",$cedula, $nombre1, $nombre2, $apellido1, $apellido2, $direccion, $lugarnacimi, $parentesto, $lugarnaciparen, $telefono, $celular, $correo, $idgenero);
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
     public function combogenero()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select * from generos";
        $result= mysqli_query($conexion,$sentencia);
        return $result;   
    }
    
      public function consultar()
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia="select * from jugadores";
        $result= mysqli_query($conexion,$sentencia);
        return $result;  
    }
    
     public function consultar_dato($codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("select * from jugadores inner join generos on generos.idgenero = jugadores.idgenero where idjugador ='%s'",$codigo);
        $result= mysqli_query($conexion,$sentencia);
        $row=mysqli_fetch_assoc($result);
        return $row;   
    }
     
    public function actualizar($cedula, $nombre1, $nombre2, $apellido1, $apellido2, $direccion, $lugarnacimi, $parentesto, $lugarnaciparen, $telefono, $celular, $correo, $idgenero, $codigo)
    {
       $conex= new conexion();
        $conexion= $conex->conectar();
        $sentencia=sprintf("update jugadores set cedula='%s', nombre1='%s', nombre2='%s', apellido1='%s', apellido2='%s', direccion='%s', lugarnacimi='%s', parentesto='%s', lugarnaciparen='%s', telefono='%s', celular='%s', correo='%s', idgenero='%s' where idjugador='%s'",$cedula, $nombre1, $nombre2, $apellido1, $apellido2, $direccion, $lugarnacimi, $parentesto, $lugarnaciparen, $telefono, $celular, $correo, $idgenero, $codigo);
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
